@extends('layouts.admin')

@section('title', 'Lessons for '.$course->title)

@section('content')
<div class="container py-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h4 mb-1">Lessons – {{ $course->title }}</h1>
      <div class="text-muted text-capitalize">Division: {{ $course->division }}</div>
    </div>
    <div>
      <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary btn-sm me-2">
        &larr; Back to Courses
      </a>
      <a href="{{ route('admin.courses.lessons.create', $course) }}" class="btn btn-primary">
        + Add Lesson
      </a>
    </div>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card">
    <div class="card-body table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>Order</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Created</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @forelse($lessons as $lesson)
          <tr>
            <td>{{ $lesson->sort_order }}</td>
            <td>{{ $lesson->title }}</td>
            <td>{{ $lesson->slug }}</td>
            <td>{{ $lesson->created_at->format('Y-m-d') }}</td>
            <td class="text-end">
              <a href="{{ route('admin.courses.lessons.tasks.index', [$course, $lesson]) }}"
                class="btn btn-sm btn-outline-secondary me-1">
                Tasks
              </a>
              <a href="{{ route('admin.courses.lessons.edit', [$course, $lesson]) }}"
                class="btn btn-sm btn-outline-primary me-1">
                Edit
              </a>
              <form action="{{ route('admin.courses.lessons.destroy', [$course, $lesson]) }}"
                    method="POST" class="d-inline"
                    onsubmit="return confirm('Delete this lesson? This will also delete its tasks.');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center text-muted">No lessons yet.</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection
