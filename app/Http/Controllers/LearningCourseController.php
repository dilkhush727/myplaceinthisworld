<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Task;
use App\Models\TaskCompletion;
use App\Models\TaskNote;
use Illuminate\Http\Request;

class LearningCourseController extends Controller
{
    // Show course with first task
    public function show(Course $course)
    {
        $course->load([
            'lessons' => fn ($q) => $q->orderBy('sort_order'),
            'lessons.tasks' => fn ($q) => $q->orderBy('sort_order'),
            'lessons.tasks.resources',
        ]);

        // $currentTask = optional($course->lessons->first())->tasks->first();
        $currentTask = $course->lessons->first()?->tasks->first();

        return $this->renderCourseView($course, $currentTask);
    }

    // Show a specific task (full page OR partial for AJAX)
    public function showTask(Request $request, Course $course, Task $task)
    {
        if ($task->lesson->course_id !== $course->id) {
            abort(404);
        }

        $course->load([
            'lessons' => fn ($q) => $q->orderBy('sort_order'),
            'lessons.tasks' => fn ($q) => $q->orderBy('sort_order'),
            'lessons.tasks.resources',
        ]);

        // If it's an AJAX/partial request, only return the task panel HTML
        if ($request->boolean('partial') || $request->ajax()) {
            return view('courses.partials.task_panel', $this->buildCourseViewData($course, $task));
        }

        // Normal full-page render
        return $this->renderCourseView($course, $task);
    }

    // Toggle completion for a task
    public function toggleTaskCompletion(Request $request, Course $course, Task $task)
    {
        if ($task->lesson->course_id !== $course->id) {
            abort(404);
        }

        $userId = auth()->id();

        $existing = TaskCompletion::where('user_id', $userId)
            ->where('task_id', $task->id)
            ->first();

        if ($existing) {
            $existing->delete(); // mark as incomplete
        } else {
            TaskCompletion::create([
                'user_id'      => $userId,
                'task_id'      => $task->id,
                'completed_at' => now(),
            ]);
        }

        // Load fresh course info so we can recalc progress
        $course->load([
            'lessons' => fn ($q) => $q->orderBy('sort_order'),
            'lessons.tasks' => fn ($q) => $q->orderBy('sort_order'),
        ]);

        // Use the same helper that builds view data
        $data = $this->buildCourseViewData($course, $task);

        // If this is an AJAX/request-for-JSON, return JSON
        if ($request->ajax() || $request->wantsJson()) {
            $lessonId = $task->lesson_id;
            $lp       = $data['lessonProgress'][$lessonId] ?? ['completed' => 0, 'total' => 0];

            return response()->json([
                'status'                     => 'ok',
                'task_completed'             => $data['currentTaskIsCompleted'],
                'course_completed_tasks'     => $data['completedTasks'],
                'course_total_tasks'         => $data['totalTasks'],
                'course_completion_percent'  => $data['completionPercent'],
                'lesson_id'                  => $lessonId,
                'lesson_completed'           => $lp['completed'],
                'lesson_total'               => $lp['total'],
                'completed_task_ids'         => $data['completedTaskIds'],
            ]);
        }

        // Fallback: normal redirect if not AJAX
        return redirect()
            ->route('courses.tasks.show', [$course->id, $task->id])
            ->with('success', 'Task progress updated.');
    }

    // Save notes via AJAX
    public function saveNotes(Request $request, Course $course, Task $task)
    {
        if ($task->lesson->course_id !== $course->id) {
            abort(404);
        }

        $userId = auth()->id();

        $data = $request->validate([
            'content' => 'nullable|string',
        ]);

        $note = TaskNote::updateOrCreate(
            [
                'user_id' => $userId,
                'task_id' => $task->id,
            ],
            [
                'content' => $data['content'] ?? '',
            ]
        );

        return response()->json([
            'status'     => 'ok',
            'updated_at' => $note->updated_at ? $note->updated_at->toDateTimeString() : null,
        ]);
    }

    // ---------- internal helpers ----------

    protected function renderCourseView(Course $course, ?Task $currentTask)
    {
        return view('courses.show', $this->buildCourseViewData($course, $currentTask));
    }

    protected function buildCourseViewData(Course $course, ?Task $currentTask): array
    {
        $userId = auth()->id();

        // All task IDs for this course
        $taskIds = $course->tasks()->pluck('tasks.id');

        // Completed tasks for this user
        $completedTaskIds = TaskCompletion::where('user_id', $userId)
            ->whereIn('task_id', $taskIds)
            ->pluck('task_id')
            ->toArray();

        $totalTasks        = $taskIds->count();
        $completedTasks    = count($completedTaskIds);
        $completionPercent = $totalTasks > 0
            ? round($completedTasks / $totalTasks * 100)
            : 0;

        $currentTaskIsCompleted = $currentTask
            ? in_array($currentTask->id, $completedTaskIds)
            : false;

        // ---- NEW: per-lesson progress map ----
        $lessonProgress = []; // [lesson_id => ['completed' => X, 'total' => Y]]

        foreach ($course->lessons as $lesson) {
            $lessonTotal     = 0;
            $lessonCompleted = 0;

            foreach ($lesson->tasks as $taskModel) {
                $lessonTotal++;
                if (in_array($taskModel->id, $completedTaskIds)) {
                    $lessonCompleted++;
                }
            }

            $lessonProgress[$lesson->id] = [
                'completed' => $lessonCompleted,
                'total'     => $lessonTotal,
            ];
        }

        // Notes for current task
        $noteContent   = '';
        $noteUpdatedAt = null;

        if ($currentTask) {
            $note = TaskNote::where('user_id', $userId)
                ->where('task_id', $currentTask->id)
                ->first();

            if ($note) {
                $noteContent   = $note->content;
                $noteUpdatedAt = $note->updated_at;
            }
        }

        return [
            'course'                 => $course,
            'currentTask'            => $currentTask,
            'totalTasks'             => $totalTasks,
            'completedTasks'         => $completedTasks,
            'completionPercent'      => $completionPercent,
            'completedTaskIds'       => $completedTaskIds,
            'currentTaskIsCompleted' => $currentTaskIsCompleted,
            'noteContent'            => $noteContent,
            'noteUpdatedAt'          => $noteUpdatedAt,
            'lessonProgress'         => $lessonProgress,   // <-- NEW
        ];
    }
    
}
