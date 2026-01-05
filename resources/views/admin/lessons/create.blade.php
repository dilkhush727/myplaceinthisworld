@extends('layouts.admin')

@section('title', 'Add ' . __('labels.lesson') . ' – '.$course->title)

@section('content')
<div class="container py-4">
  <h1 class="h4 mb-3">Add {{ __('labels.lesson') }} – {{ $course->title }}</h1>

  <form method="POST" action="{{ route('admin.courses.lessons.store', $course) }}">
    @csrf

    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title"
             value="{{ old('title') }}"
             class="form-control @error('title') is-invalid @enderror">
      @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Slug (optional)</label>
      <input type="text" name="slug" value="{{ old('slug') }}" class="form-control">
      <div class="form-text">Leave blank to auto-generate from title.</div>
    </div>

    <div class="mb-3">
      <label class="form-label">Sort Order</label>
      <input type="number" name="sort_order"
             value="{{ old('sort_order', 0) }}"
             class="form-control">
      <div class="form-text">Lower numbers appear first in the sidebar.</div>
    </div>

    <button class="btn btn-primary" type="submit">Save {{ __('labels.lesson') }}</button>
    <a href="{{ route('admin.courses.lessons.index', $course) }}" class="btn btn-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
