<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\TaskCompletion;
use Illuminate\Http\Request;

class LearningProgressController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        // Optional division filter: primary / ji / highschool
        $divisionFilter = $request->input('division');

        $coursesQuery = Course::query()
            ->with(['lessons', 'tasks'])
            ->where('is_published', true)
            ->orderBy('division')
            ->orderBy('title');

        if ($divisionFilter) {
            $coursesQuery->where('division', $divisionFilter);
        }

        $courses = $coursesQuery->get();

        $stats = collect();

        foreach ($courses as $course) {
            $taskIds    = $course->tasks->pluck('id');
            $totalTasks = $taskIds->count();

            if ($totalTasks === 0) {
                $stats->push([
                    'course'             => $course,
                    'total_tasks'        => 0,
                    'completed_tasks'    => 0,
                    'completion_percent' => 0,
                    'last_activity'      => null,
                ]);
                continue;
            }

            $completions = TaskCompletion::where('user_id', $user->id)
                ->whereIn('task_id', $taskIds)
                ->orderBy('updated_at', 'desc')
                ->get();

            $completedTasks = $completions->pluck('task_id')->unique()->count();
            $percent        = round(($completedTasks / $totalTasks) * 100);
            $lastActivity   = $completions->max('updated_at');

            $stats->push([
                'course'             => $course,
                'total_tasks'        => $totalTasks,
                'completed_tasks'    => $completedTasks,
                'completion_percent' => $percent,
                'last_activity'      => $lastActivity,
            ]);
        }

        return view('teacher.learning_progress.index', [
            'teacher'        => $user,
            'divisionFilter' => $divisionFilter,
            'stats'          => $stats,
        ]);
    }
}
