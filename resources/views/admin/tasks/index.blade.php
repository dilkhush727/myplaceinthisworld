@extends('layouts.admin')

@section('title', 'Tasks – '.$lesson->title.' ('.$course->title.')')

@section('content')
<div class="container py-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h4 mb-1">Tasks – {{ $lesson->title }}</h1>
      <div class="text-muted">
        Course: {{ $course->title }} • Division: {{ ucfirst($course->division) }}
      </div>
    </div>
    <div>
      <a href="{{ route('admin.courses.lessons.index', $course) }}"
         class="btn btn-outline-secondary btn-sm me-2">
        &larr; Back to Lessons
      </a>
      <a href="{{ route('admin.courses.lessons.tasks.create', [$course, $lesson]) }}"
         class="btn btn-primary">
        + Add Task
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
        @forelse($tasks as $task)
          <tr>
            <td>{{ $task->sort_order }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->slug }}</td>
            <td>{{ $task->created_at->format('Y-m-d') }}</td>
            <td class="text-end">
              <a href="{{ route('admin.courses.lessons.tasks.edit', [$course, $lesson, $task]) }}"
                 class="btn btn-sm btn-outline-primary me-1">
                Edit
              </a>
              <form action="{{ route('admin.courses.lessons.tasks.destroy', [$course, $lesson, $task]) }}"
                    method="POST"
                    class="d-inline"
                    onsubmit="return confirm('Delete this task?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center text-muted">No tasks yet.</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection
