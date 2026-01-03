<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('division')->latest()->paginate(20);

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $divisions = [
            'primary'    => 'Primary',
            'ji'         => 'Junior Intermediate',
            'highschool' => 'High School',
        ];

        return view('admin.courses.create', compact('divisions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'division'          => 'required|in:primary,ji,highschool',
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:courses,slug',
            'summary'           => 'nullable|string',
            'image_path'        => 'nullable|string|max:255',
            'estimated_minutes' => 'nullable|integer|min:0',
            'is_published'      => 'sometimes|boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data['is_published'] = $request->boolean('is_published');

        Course::create($data);

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        $divisions = [
            'primary'    => 'Primary',
            'ji'         => 'Junior Intermediate',
            'highschool' => 'High School',
        ];

        return view('admin.courses.edit', compact('course', 'divisions'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'division'          => 'required|in:primary,ji,highschool',
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:courses,slug,' . $course->id,
            'summary'           => 'nullable|string',
            'image_path'        => 'nullable|string|max:255',
            'estimated_minutes' => 'nullable|integer|min:0',
            'is_published'      => 'sometimes|boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data['is_published'] = $request->boolean('is_published');

        $course->update($data);

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Course deleted.');
    }
}
