<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    // List lessons for one course
    public function index(Course $course)
    {
        $lessons = $course->lessons()->orderBy('sort_order')->get();

        return view('admin.lessons.index', compact('course', 'lessons'));
    }

    // Show form to create a lesson for a course
    public function create(Course $course)
    {
        return view('admin.lessons.create', compact('course'));
    }

    // Store new lesson
    public function store(Request $request, Course $course)
    {
        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'slug'       => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['course_id']  = $course->id;

        Lesson::create($data);

        return redirect()
            ->route('admin.courses.lessons.index', $course)
            ->with('success', 'Lesson created successfully.');
    }

    // Edit form
    public function edit(Course $course, Lesson $lesson)
    {
        // extra safety: ensure this lesson belongs to the course
        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        return view('admin.lessons.edit', compact('course', 'lesson'));
    }

    // Update lesson
    public function update(Request $request, Course $course, Lesson $lesson)
    {
        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'slug'       => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data['sort_order'] = $data['sort_order'] ?? 0;

        $lesson->update($data);

        return redirect()
            ->route('admin.courses.lessons.index', $course)
            ->with('success', 'Lesson updated successfully.');
    }

    // Delete lesson
    public function destroy(Course $course, Lesson $lesson)
    {
        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        $lesson->delete();

        return redirect()
            ->route('admin.courses.lessons.index', $course)
            ->with('success', 'Lesson deleted.');
    }
}
