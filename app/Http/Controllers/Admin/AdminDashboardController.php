<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\School;
use App\Models\SchoolMembership;
use App\Models\Task;
use App\Models\TaskCompletion;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // ---------------------------
        // KPI COUNTS
        // ---------------------------
        $totalSchools = School::count();
        $totalTeachers = User::role('teacher')->count();
        $totalSchoolUsers = User::role('school')->count();


        // Membership breakdown (for the card)
            $freeMembershipsCount = SchoolMembership::where('is_free', 1)->count();

            $expiredMembershipsCount = SchoolMembership::where(function ($q) {
                    $q->where('status', 'expired')
                    ->orWhere(function ($qq) {
                        $qq->whereNotNull('ends_at')->where('ends_at', '<', now());
                    });
                })
                ->count();

            // Ticket breakdown (for the card)
            $resolvedTickets = ContactMessage::where('is_ticket', 1)
                ->whereIn('ticket_status', ['resolved', 'closed'])
                ->count();

        $totalTickets = ContactMessage::where('is_ticket', 1)->count();

        // Tickets with no admin reply
        $ticketsNoAdminReplyCount = DB::table('contact_messages as cm')
            ->leftJoin('ticket_replies as tr', function ($join) {
                $join->on('cm.id', '=', 'tr.contact_message_id')
                    ->where('tr.user_type', '=', 'admin');
            })
            ->where('cm.is_ticket', 1)
            ->whereNull('tr.id')
            ->distinct('cm.id')
            ->count('cm.id');

        // Active memberships (ends_at)
        $activeMembershipsCount = SchoolMembership::where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('ends_at')->orWhere('ends_at', '>=', now());
            })
            ->count();

        // Expiring in next 30 days
        $expiringMemberships = SchoolMembership::query()
            ->with('school')
            ->where('status', 'active')
            ->whereNotNull('ends_at')
            ->whereBetween('ends_at', [now(), now()->addDays(30)])
            ->orderBy('ends_at')
            ->take(10)
            ->get();

        $expiringMembershipsCount = SchoolMembership::where('status', 'active')
            ->whereNotNull('ends_at')
            ->whereBetween('ends_at', [now(), now()->addDays(30)])
            ->count();

        // ---------------------------
        // CHART DATA (ApexCharts)
        // ---------------------------

        // Tickets per day (last 14 days)
        $ticketsByDay = ContactMessage::where('is_ticket', 1)
            ->where('created_at', '>=', now()->subDays(14))
            ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        $ticketLabels = $ticketsByDay->pluck('day')
            ->map(fn ($d) => \Carbon\Carbon::parse($d)->format('M d'))
            ->toArray();

        $ticketCounts = $ticketsByDay->pluck('total')->toArray();

        // Membership status donut
        $membershipStatus = SchoolMembership::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $membershipLabels = $membershipStatus->keys()->map(fn ($s) => ucfirst($s))->toArray();
        $membershipCounts = $membershipStatus->values()->toArray();

        // ---------------------------
        // LISTS
        // ---------------------------

        // Tickets with no admin reply (list)
        $ticketsNoAdminReply = DB::table('contact_messages as cm')
            ->leftJoin('ticket_replies as tr', function ($join) {
                $join->on('cm.id', '=', 'tr.contact_message_id')
                    ->where('tr.user_type', '=', 'admin');
            })
            ->leftJoin('users as u', 'cm.user_id', '=', 'u.id')
            ->where('cm.is_ticket', 1)
            ->whereNull('tr.id')
            ->select([
                'cm.id',
                'cm.ticket_number',
                'cm.ticket_status',
                'cm.category',
                'cm.created_at',
                'cm.email',
                'u.name as user_name',
            ])
            ->orderByDesc('cm.created_at')
            ->limit(8)
            ->get();

        // Recent tickets (all)
        $recentTickets = ContactMessage::where('is_ticket', 1)
            ->orderByDesc('created_at')
            ->take(8)
            ->get();

        // ---------------------------
        // MOST ACTIVE SCHOOLS (last 30 days)
        // Activity score = tickets_30 + completions_30
        // ---------------------------
        $completionTable = (new TaskCompletion())->getTable();
        $hasCompletedAt = Schema::hasColumn($completionTable, 'completed_at');

        $since = now()->subDays(30);

        $mostActiveSchools = School::query()
            ->leftJoin('users', 'users.school_id', '=', 'schools.id')
            ->leftJoin('contact_messages as cm', function ($join) use ($since) {
                $join->on('cm.user_id', '=', 'users.id')
                     ->where('cm.is_ticket', '=', 1)
                     ->where('cm.created_at', '>=', $since);
            })
            ->leftJoin('task_completions as tc', function ($join) use ($since, $hasCompletedAt) {
                $join->on('tc.user_id', '=', 'users.id');

                if ($hasCompletedAt) {
                    $join->whereNotNull('tc.completed_at')
                         ->where('tc.completed_at', '>=', $since);
                } else {
                    $join->where('tc.created_at', '>=', $since);
                }
            })
            ->groupBy('schools.id', 'schools.name')
            ->selectRaw('schools.id, schools.name,
                        COUNT(DISTINCT cm.id) as tickets_30,
                        COUNT(DISTINCT tc.id) as completions_30,
                        (COUNT(DISTINCT cm.id) + COUNT(DISTINCT tc.id)) as activity_score')
            ->orderByDesc('activity_score')
            ->limit(8)
            ->get();

        // ---------------------------
        // DIVISION CONTENT (group counts)
        // We detect division column in courses or lessons if exists.
        // ---------------------------
        $divisionCandidates = ['division', 'type', 'level', 'grade_band', 'membership_type'];

        $courseTable = (new Course())->getTable();
        $lessonTable = (new Lesson())->getTable();

        $courseDivisionCol = $this->firstExistingColumn($courseTable, $divisionCandidates);
        $lessonDivisionCol = $this->firstExistingColumn($lessonTable, $divisionCandidates);

        $divisionStats = collect();

        if ($courseDivisionCol) {
            // group by course division
            $divisionStats = Course::query()
                ->selectRaw("$courseDivisionCol as division, COUNT(*) as courses_count")
                ->groupBy('division')
                ->get()
                ->map(function ($row) use ($courseDivisionCol) {
                    $division = $row->division ?: 'Unknown';

                    $courseIds = Course::where($courseDivisionCol, $row->division)->pluck('id');

                    $lessonsCount = Lesson::whereIn('course_id', $courseIds)->count();
                    $tasksCount = Task::whereHas('lesson', fn($q) => $q->whereIn('course_id', $courseIds))->count();

                    return [
                        'division' => $division,
                        'courses'  => (int) $row->courses_count,
                        'lessons'  => (int) $lessonsCount,
                        'tasks'    => (int) $tasksCount,
                    ];
                })
                ->sortByDesc('tasks')
                ->values();

        } elseif ($lessonDivisionCol) {
            // group by lesson division
            $divisionStats = Lesson::query()
                ->selectRaw("$lessonDivisionCol as division, COUNT(*) as lessons_count")
                ->groupBy('division')
                ->get()
                ->map(function ($row) use ($lessonDivisionCol) {
                    $division = $row->division ?: 'Unknown';

                    $lessonIds = Lesson::where($lessonDivisionCol, $row->division)->pluck('id');
                    $tasksCount = Task::whereIn('lesson_id', $lessonIds)->count();

                    return [
                        'division' => $division,
                        'courses'  => 0,
                        'lessons'  => (int) $row->lessons_count,
                        'tasks'    => (int) $tasksCount,
                    ];
                })
                ->sortByDesc('tasks')
                ->values();
        } else {
            // fallback: overall counts only
            $divisionStats = collect([
                [
                    'division' => 'All Content',
                    'courses'  => Course::count(),
                    'lessons'  => Lesson::count(),
                    'tasks'    => Task::count(),
                ]
            ]);
        }

        return view('admin.dashboard', compact(
            'totalSchools',
            'totalTeachers',
            'totalSchoolUsers',
            'totalTickets',
            'ticketsNoAdminReplyCount',
            'activeMembershipsCount',
            'expiringMembershipsCount',
            'expiringMemberships',

            'ticketLabels',
            'ticketCounts',
            'membershipLabels',
            'membershipCounts',

            'ticketsNoAdminReply',
            'recentTickets',

            'mostActiveSchools',
            'divisionStats'
        ));
    }

    private function firstExistingColumn(string $table, array $candidates): ?string
    {
        foreach ($candidates as $col) {
            if (Schema::hasColumn($table, $col)) return $col;
        }
        return null;
    }
}
