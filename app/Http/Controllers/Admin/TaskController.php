<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Task;
use App\Models\TaskResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    // List tasks for one lesson
    public function index(Course $course, Lesson $lesson)
    {
        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        $tasks = $lesson->tasks()->orderBy('sort_order')->get();

        return view('admin.tasks.index', compact('course', 'lesson', 'tasks'));
    }

    // Show form to create a task
    public function create(Course $course, Lesson $lesson)
    {
        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        return view('admin.tasks.create', compact('course', 'lesson'));
    }

    // Store new task
    public function store(Request $request, Course $course, Lesson $lesson)
    {
        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'slug'       => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'body'       => 'nullable|string',

            // resources
            'resource_type'   => 'array',
            'resource_type.*' => 'nullable|string|max:50',
            'resource_title'  => 'array',
            'resource_title.*'=> 'nullable|string|max:255',
            'resource_url'    => 'array',
            'resource_url.*'  => 'nullable|string|max:2048',
            'resource_order'  => 'array',
            'resource_order.*'=> 'nullable|integer',
            'resource_file'   => 'array',
            'resource_file.*' => 'nullable|file', // you can tighten this to mimes:pdf,doc,docx,ppt,pptx
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['lesson_id']  = $lesson->id;

        $task = Task::create($data);

        // Save resources
        $this->syncResources($request, $task);

        return redirect()
            ->route('admin.courses.lessons.tasks.index', [$course, $lesson])
            ->with('success', 'Task created successfully.');
    }

    // Edit form
    public function edit(Course $course, Lesson $lesson, Task $task)
    {
        if ($lesson->course_id !== $course->id || $task->lesson_id !== $lesson->id) {
            abort(404);
        }

        // eager load resources
        $task->load('resources');

        return view('admin.tasks.edit', compact('course', 'lesson', 'task'));
    }

    // Update task
    public function update(Request $request, Course $course, Lesson $lesson, Task $task)
    {
        if ($lesson->course_id !== $course->id || $task->lesson_id !== $lesson->id) {
            abort(404);
        }

        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'slug'       => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'body'       => 'nullable|string',

            // resources
            'resource_type'   => 'array',
            'resource_type.*' => 'nullable|string|max:50',
            'resource_title'  => 'array',
            'resource_title.*'=> 'nullable|string|max:255',
            'resource_url'    => 'array',
            'resource_url.*'  => 'nullable|string|max:2048',
            'resource_order'  => 'array',
            'resource_order.*'=> 'nullable|integer',
            'resource_file'   => 'array',
            'resource_file.*' => 'nullable|file', // you can tighten this to mimes:pdf,doc,docx,ppt,pptx
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data['sort_order'] = $data['sort_order'] ?? 0;

        $task->update($data);

        // Re-sync resources
        $this->syncResources($request, $task);

        return redirect()
            ->route('admin.courses.lessons.tasks.index', [$course, $lesson])
            ->with('success', 'Task updated successfully.');
    }

    // Delete task
    public function destroy(Course $course, Lesson $lesson, Task $task)
    {
        if ($lesson->course_id !== $course->id || $task->lesson_id !== $lesson->id) {
            abort(404);
        }

        $task->delete();

        return redirect()
            ->route('admin.courses.lessons.tasks.index', [$course, $lesson])
            ->with('success', 'Task deleted.');
    }

    /**
     * Create/update resources for a task from request arrays
     */
    protected function syncResources(Request $request, Task $task): void
    {
        $types   = $request->input('resource_type', []);
        $titles  = $request->input('resource_title', []);
        $urls    = $request->input('resource_url', []);
        $orders  = $request->input('resource_order', []);
        $files   = $request->file('resource_file', []);

        // Clear existing resources
        $task->resources()->delete();

        foreach ($types as $index => $type) {
            $type  = trim($type ?? '');
            $title = trim($titles[$index] ?? '');
            $url   = trim($urls[$index] ?? '');

            // If a file was uploaded for this row, store it and use its URL
            if (isset($files[$index]) && $files[$index]) {
                $path = $files[$index]->store('task-resources', 'public'); // storage/app/public/task-resources
                $url  = '/storage/' . $path;
            }

            // Skip completely empty rows
            if ($type === '' && $title === '' && $url === '') {
                continue;
            }

            TaskResource::create([
                'task_id'    => $task->id,
                'type'       => $type ?: 'link',
                'title'      => $title ?: $url,
                'url'        => $url,
                'sort_order' => isset($orders[$index]) ? (int) $orders[$index] : $index,
            ]);
        }
    }
    
}
