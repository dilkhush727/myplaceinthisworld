@extends('layouts.admin')

@section('title', 'Edit Lesson – '.$course->title)

@section('content')
<div class="container py-4">
  <h1 class="h4 mb-3">Edit Lesson – {{ $course->title }}</h1>

  <form method="POST" action="{{ route('admin.courses.lessons.update', [$course, $lesson]) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title"
             value="{{ old('title', $lesson->title) }}"
             class="form-control @error('title') is-invalid @enderror">
      @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Slug (optional)</label>
      <input type="text" name="slug"
             value="{{ old('slug', $lesson->slug) }}"
             class="form-control">
      <div class="form-text">Leave blank to auto-generate from title.</div>
    </div>

    <div class="mb-3">
      <label class="form-label">Sort Order</label>
      <input type="number" name="sort_order"
             value="{{ old('sort_order', $lesson->sort_order) }}"
             class="form-control">
    </div>

    <button class="btn btn-primary" type="submit">Update Lesson</button>
    <a href="{{ route('admin.courses.lessons.index', $course) }}" class="btn btn-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
