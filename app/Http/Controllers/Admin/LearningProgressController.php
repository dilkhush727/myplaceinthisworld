<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\TaskCompletion;
use Illuminate\Http\Request;

class LearningProgressController extends Controller
{
    public function index(Request $request)
    {
        $divisionFilter = $request->input('division'); // primary, ji, highschool

        $coursesQuery = Course::query()
            ->with(['lessons', 'tasks'])
            ->orderBy('division')
            ->orderBy('title');

        if ($divisionFilter) {
            $coursesQuery->where('division', $divisionFilter);
        }

        $courses = $coursesQuery->get();

        // Map course_id => task_ids
        $taskIdsByCourse = [];
        foreach ($courses as $course) {
            $taskIdsByCourse[$course->id] = $course->tasks->pluck('id');
        }

        $allTaskIds = collect($taskIdsByCourse)->flatten()->unique();

        // If there are no tasks at all, just pass empty stats
        if ($allTaskIds->isEmpty()) {
            return view('admin.learning_progress.index', [
                'divisionFilter' => $divisionFilter,
                'stats'          => collect(),
            ]);
        }

        // Get all completions for those tasks & group by task_id
        $completionsByTask = TaskCompletion::whereIn('task_id', $allTaskIds)
            ->orderBy('updated_at', 'desc')
            ->get()
            ->groupBy('task_id');

        $stats = collect();

        foreach ($courses as $course) {
            $taskIds    = $taskIdsByCourse[$course->id];
            $totalTasks = $taskIds->count();

            // Gather all completions across tasks in this course
            $courseCompletions = collect();
            foreach ($taskIds as $taskId) {
                $courseCompletions = $courseCompletions
                    ->merge($completionsByTask->get($taskId, collect()));
            }

            $userGroups     = $courseCompletions->groupBy('user_id');
            $uniqueUsers    = $userGroups->count();
            $totalCompletions = $courseCompletions->count();

            // Average completion % per user for this course
            $avgCompletionPercent = 0;
            if ($uniqueUsers > 0 && $totalTasks > 0) {
                $sumPercent = 0;
                foreach ($userGroups as $userId => $userCompletions) {
                    $userCompletedTasks = $userCompletions->pluck('task_id')->unique()->count();
                    $sumPercent += ($userCompletedTasks / $totalTasks) * 100;
                }
                $avgCompletionPercent = round($sumPercent / $uniqueUsers);
            }

            $lastActivity = $courseCompletions->max('updated_at');

            $stats->push([
                'course'                 => $course,
                'total_tasks'            => $totalTasks,
                'unique_users'           => $uniqueUsers,
                'total_completions'      => $totalCompletions,
                'avg_completion_percent' => $avgCompletionPercent,
                'last_activity'          => $lastActivity,
            ]);
        }

        return view('admin.learning_progress.index', [
            'divisionFilter' => $divisionFilter,
            'stats'          => $stats,
        ]);
    }

    public function showCourse(Course $course)
    {
        // Load tasks for this course
        $course->load(['lessons', 'tasks']);
        $taskIds    = $course->tasks->pluck('id');
        $totalTasks = $taskIds->count();

        $rows = collect();

        if ($totalTasks > 0) {
            // All completions for this course (any user)
            $completionsByUser = TaskCompletion::whereIn('task_id', $taskIds)
                ->with(['user.school'])
                ->orderBy('updated_at', 'desc')
                ->get()
                ->groupBy('user_id');

            $rows = $completionsByUser->map(function ($userCompletions) use ($totalTasks) {
                $sample = $userCompletions->first();
                $user   = $sample->user;
                $school = $user->school ?? null;

                $completedTasks = $userCompletions->pluck('task_id')->unique()->count();
                $percent        = $totalTasks > 0
                    ? round($completedTasks / $totalTasks * 100)
                    : 0;
                $lastActivity   = $userCompletions->max('updated_at');

                return [
                    'user'            => $user,
                    'school'          => $school,
                    'completed_tasks' => $completedTasks,
                    'total_tasks'     => $totalTasks,
                    'percent'         => $percent,
                    'last_activity'   => $lastActivity,
                ];
            })->values(); // reindex
        }

        return view('admin.learning_progress.course_show', [
            'course'     => $course,
            'rows'       => $rows,
            'totalTasks' => $totalTasks,
        ]);
    }
}
