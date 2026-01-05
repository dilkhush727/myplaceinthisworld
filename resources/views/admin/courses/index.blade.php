@extends('layouts.admin') {{-- change to your admin layout if you have one --}}

@section('title', __('labels.courses'))

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">{{ __('labels.courses') }}</h1>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
      + Add {{ __('labels.course') }}
    </a>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card">
    <div class="card-body table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Division</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Published</th>
            <th>Updated</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @forelse($courses as $course)
          <tr>
            <td>{{ $course->id }}</td>
            <td class="text-capitalize">{{ $course->division }}</td>
            <td>{{ $course->title }}</td>
            <td>{{ $course->slug }}</td>
            <td>
              @if($course->is_published)
                <span class="badge bg-success">Yes</span>
              @else
                <span class="badge bg-secondary">No</span>
              @endif
            </td>
            <td>{{ $course->updated_at->format('Y-m-d') }}</td>
            <td class="text-end">
                <a href="{{ route('admin.courses.lessons.index', $course) }}"
                    class="btn btn-sm btn-outline-secondary me-1">
                    {{ __('labels.lessons') }}
                </a>
                <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-outline-primary me-1">
                    Edit
                </a>
                <form action="{{ route('admin.courses.destroy', $course) }}"
                        method="POST" class="d-inline"
                        onsubmit="return confirm('Delete this course?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center text-muted">No courses yet.</td>
          </tr>
        @endforelse
        </tbody>
      </table>

      <div class="mt-3">
        {{ $courses->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
