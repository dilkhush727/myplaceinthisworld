<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Lesson;
use App\Models\SchoolMembership;
use App\Models\Task;
use App\Models\TaskCompletion;
use App\Models\User;

class SchoolDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $schoolId = $user->school_id;

        // All users belonging to this school (school account + teachers)
        $schoolUserIds = User::where('school_id', $schoolId)->pluck('id');

        // Teachers (Spatie role)
        $teachersCount = User::role('teacher')
            ->where('school_id', $schoolId)
            ->count();

        // Active memberships (ends_at, not expires_at)
        $activeMembershipsCount = SchoolMembership::where('school_id', $schoolId)
            ->where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('ends_at')
                  ->orWhere('ends_at', '>=', now());
            })
            ->count();

        // Tickets (contact_messages)
        $totalTickets = ContactMessage::whereIn('user_id', $schoolUserIds)
            ->where('is_ticket', 1)
            ->count();

        // If ticket_status is NULL sometimes, treat it as "open"
        $openTickets = ContactMessage::whereIn('user_id', $schoolUserIds)
            ->where('is_ticket', 1)
            ->where(function ($q) {
                $q->whereNull('ticket_status')
                  ->orWhereNotIn('ticket_status', ['closed', 'resolved']);
            })
            ->count();

        // Lessons/Tasks Progress
        $lessonsCount = Lesson::count();
        $tasksCount   = Task::count();

        // Completed tasks by your school users (teachers/school)
        $completedTasksCount = TaskCompletion::whereIn('user_id', $schoolUserIds)->count();

        // Completion rate (basic)
        // If you want “per task per school” you’d need a mapping of tasks assigned to this school.
        $completionRate = ($tasksCount > 0)
            ? round(($completedTasksCount / $tasksCount) * 100)
            : 0;

        return view('school.dashboard', compact(
            'teachersCount',
            'activeMembershipsCount',
            'totalTickets',
            'openTickets',
            'lessonsCount',
            'tasksCount',
            'completedTasksCount',
            'completionRate'
        ));
    }
}
