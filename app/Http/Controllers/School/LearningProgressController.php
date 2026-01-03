<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\TaskCompletion;
use App\Models\User;
use Illuminate\Http\Request;

class LearningProgressController extends Controller
{
    public function index(Request $request)
    {
        $user   = auth()->user();
        $school = $user->school;

        if (! $school) {
            abort(403, 'No school associated with this user.');
        }

        $divisionFilter = $request->input('division'); // primary, ji, highschool

        // All teachers for this school (assuming users have school_id + role teacher)
        $teacherUserIds = User::role('teacher')
            ->where('school_id', $school->id)
            ->pluck('id');

        // If no teachers yet, just show empty state
        if ($teacherUserIds->isEmpty()) {
            return view('school.learning_progress.index', [
                'school'         => $school,
                'divisionFilter' => $divisionFilter,
                'stats'          => collect(),
            ]);
        }

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

        if ($allTaskIds->isEmpty()) {
            return view('school.learning_progress.index', [
                'school'         => $school,
                'divisionFilter' => $divisionFilter,
                'stats'          => collect(),
            ]);
        }

        // Get completions for this school's teachers only
        $completionsByTask = TaskCompletion::whereIn('task_id', $allTaskIds)
            ->whereIn('user_id', $teacherUserIds)
            ->orderBy('updated_at', 'desc')
            ->get()
            ->groupBy('task_id');

        $stats = collect();

        foreach ($courses as $course) {
            $taskIds    = $taskIdsByCourse[$course->id];
            $totalTasks = $taskIds->count();

            // All completions for this course by this school's teachers
            $courseCompletions = collect();
            foreach ($taskIds as $taskId) {
                $courseCompletions = $courseCompletions
                    ->merge($completionsByTask->get($taskId, collect()));
            }

            $userGroups       = $courseCompletions->groupBy('user_id');
            $teachersWithUse  = $userGroups->count();
            $totalCompletions = $courseCompletions->count();

            // Average completion % per teacher (within this school)
            $avgCompletionPercent = 0;
            if ($teachersWithUse > 0 && $totalTasks > 0) {
                $sumPercent = 0;
                foreach ($userGroups as $teacherId => $teacherCompletions) {
                    $teacherCompletedTasks = $teacherCompletions
                        ->pluck('task_id')
                        ->unique()
                        ->count();

                    $sumPercent += ($teacherCompletedTasks / $totalTasks) * 100;
                }
                $avgCompletionPercent = round($sumPercent / $teachersWithUse);
            }

            $lastActivity = $courseCompletions->max('updated_at');

            $stats->push([
                'course'                 => $course,
                'total_tasks'            => $totalTasks,
                'teachers_with_activity' => $teachersWithUse,
                'total_completions'      => $totalCompletions,
                'avg_completion_percent' => $avgCompletionPercent,
                'last_activity'          => $lastActivity,
            ]);
        }

        return view('school.learning_progress.index', [
            'school'         => $school,
            'divisionFilter' => $divisionFilter,
            'stats'          => $stats,
        ]);
    }

    public function showCourse(Course $course)
    {
        $user   = auth()->user();
        $school = $user->school;

        if (! $school) {
            abort(403, 'No school associated with this user.');
        }

        $course->load(['lessons', 'tasks']);
        $taskIds    = $course->tasks->pluck('id');
        $totalTasks = $taskIds->count();

        // Teachers belonging to this school
        $teacherIds = User::role('teacher')
            ->where('school_id', $school->id)
            ->pluck('id');

        $rows = collect();

        if ($totalTasks > 0 && $teacherIds->isNotEmpty()) {
            $completionsByUser = TaskCompletion::whereIn('task_id', $taskIds)
                ->whereIn('user_id', $teacherIds)
                ->with('user')
                ->orderBy('updated_at', 'desc')
                ->get()
                ->groupBy('user_id');

            $rows = $completionsByUser->map(function ($userCompletions) use ($totalTasks) {
                $sample = $userCompletions->first();
                $user   = $sample->user;

                $completedTasks = $userCompletions->pluck('task_id')->unique()->count();
                $percent        = $totalTasks > 0
                    ? round($completedTasks / $totalTasks * 100)
                    : 0;
                $lastActivity   = $userCompletions->max('updated_at');

                return [
                    'user'            => $user,
                    'completed_tasks' => $completedTasks,
                    'total_tasks'     => $totalTasks,
                    'percent'         => $percent,
                    'last_activity'   => $lastActivity,
                ];
            })->values();
        }

        return view('school.learning_progress.course_show', [
            'school'     => $school,
            'course'     => $course,
            'rows'       => $rows,
            'totalTasks' => $totalTasks,
        ]);
    }
}
