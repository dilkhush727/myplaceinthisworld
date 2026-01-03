<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\SchoolMembership;
use App\Models\Task;
use App\Models\TaskCompletion;
use App\Models\TaskNote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $teacher  = auth()->user();
        $schoolId = $teacher->school_id;

        // ---------- Membership types available to this school ----------
        $activeTypes = SchoolMembership::where('school_id', $schoolId)
            ->where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('ends_at')->orWhere('ends_at', '>=', now());
            })
            ->pluck('type')
            ->map(fn ($t) => strtolower(trim($t)))
            ->filter()
            ->unique()
            ->values()
            ->toArray();

        // High School free base — ensure included (keep a few common variants)
        foreach (['high school', 'high_school', 'highschool'] as $hs) {
            if (!in_array($hs, $activeTypes)) {
                $activeTypes[] = $hs;
            }
        }

        // ---------- Detect where division/type is stored ----------
        $courseTable = (new Course())->getTable();
        $lessonTable = (new Lesson())->getTable();

        $divisionCandidates = ['division', 'type', 'level', 'grade_band', 'membership_type'];

        $courseDivisionCol = $this->firstExistingColumn($courseTable, $divisionCandidates);
        $lessonDivisionCol = $this->firstExistingColumn($lessonTable, $divisionCandidates);

        // ---------- Available lessons/tasks for THIS teacher (based on school access) ----------
        $availableLessonIds = collect();
        $availableTaskIds   = collect();

        if ($courseDivisionCol) {
            // courses.{divisionCol} exists
            $availableLessonIds = Lesson::whereHas('course', function ($q) use ($courseDivisionCol, $activeTypes) {
                $q->whereIn(DB::raw("LOWER($courseDivisionCol)"), array_map('strtolower', $activeTypes));
            })->pluck('id');

            $availableTaskIds = Task::whereHas('lesson.course', function ($q) use ($courseDivisionCol, $activeTypes) {
                $q->whereIn(DB::raw("LOWER($courseDivisionCol)"), array_map('strtolower', $activeTypes));
            })->pluck('id');

        } elseif ($lessonDivisionCol) {
            // lessons.{divisionCol} exists
            $availableLessonIds = Lesson::whereIn(DB::raw("LOWER($lessonDivisionCol)"), array_map('strtolower', $activeTypes))
                ->pluck('id');

            $availableTaskIds = Task::whereHas('lesson', function ($q) use ($lessonDivisionCol, $activeTypes) {
                $q->whereIn(DB::raw("LOWER($lessonDivisionCol)"), array_map('strtolower', $activeTypes));
            })->pluck('id');

        } else {
            // Fallback: if no division columns exist, treat as all content
            $availableLessonIds = Lesson::pluck('id');
            $availableTaskIds   = Task::pluck('id');
        }

        $availableLessonsCount = $availableLessonIds->count();
        $availableTasksCount   = $availableTaskIds->count();

        // ---------- Completed + To-do ----------
        $completionTable = (new TaskCompletion())->getTable();
        $hasCompletedAt  = Schema::hasColumn($completionTable, 'completed_at');

        $completedQuery = TaskCompletion::where('user_id', $teacher->id)
            ->whereIn('task_id', $availableTaskIds);

        if ($hasCompletedAt) {
            $completedQuery->whereNotNull('completed_at');
        }

        $completedTaskIds = $completedQuery->pluck('task_id')->unique();
        $completedTotal   = $completedTaskIds->count();

        $toDoCount = max(0, $availableTasksCount - $completedTotal);

        $completedThisMonthQuery = TaskCompletion::where('user_id', $teacher->id)
            ->whereIn('task_id', $availableTaskIds);

        if ($hasCompletedAt) {
            $completedThisMonthQuery
                ->whereNotNull('completed_at')
                ->whereBetween('completed_at', [now()->startOfMonth(), now()]);
        } else {
            $completedThisMonthQuery
                ->whereBetween('created_at', [now()->startOfMonth(), now()]);
        }

        $completedThisMonthCount = $completedThisMonthQuery->count();

        // ---------- Notes ----------
        $notesCount = TaskNote::where('user_id', $teacher->id)->count();

        // ---------- Recent activity list (last 6 completions) ----------
        $recentCompletions = TaskCompletion::with(['task.lesson.course'])
            ->where('user_id', $teacher->id)
            ->whereIn('task_id', $availableTaskIds)
            ->when($hasCompletedAt, fn ($q) => $q->whereNotNull('completed_at'))
            ->orderByDesc($hasCompletedAt ? 'completed_at' : 'created_at')
            ->take(6)
            ->get();

        // ---------- Progress ----------
        $completionRate = $availableTasksCount > 0
            ? (int) round(($completedTotal / $availableTasksCount) * 100)
            : 0;

        return view('teacher.dashboard', compact(
            'availableLessonsCount',
            'availableTasksCount',
            'toDoCount',
            'completedTotal',
            'completedThisMonthCount',
            'notesCount',
            'completionRate',
            'recentCompletions'
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
