@extends('layouts.admin')

@section('title', 'Edit ' . __('labels.course'))

@section('content')
<div class="container py-4">
  <h1 class="h4 mb-3">Edit {{ __('labels.course') }}</h1>

  <form method="POST" action="{{ route('admin.courses.update', $course) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Division</label>
      <select name="division" class="form-select @error('division') is-invalid @enderror">
        <option value="">Select division</option>
        @foreach($divisions as $value => $label)
          <option value="{{ $value }}" {{ old('division', $course->division) === $value ? 'selected' : '' }}>
            {{ $label }}
          </option>
        @endforeach
      </select>
      @error('division') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title"
             value="{{ old('title', $course->title) }}"
             class="form-control @error('title') is-invalid @enderror">
      @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Slug (optional)</label>
      <input type="text" name="slug" value="{{ old('slug', $course->slug) }}" class="form-control">
      <div class="form-text">Leave blank to auto-generate from title.</div>
    </div>

    <div class="mb-3">
      <label class="form-label">Summary (for card)</label>
      <textarea name="summary" rows="3" class="form-control">{{ old('summary', $course->summary) }}</textarea>
    </div>

    {{-- Current image preview --}}
    @if($course->image_path)
      <div class="mb-3">
        <label class="form-label d-block">Current Image</label>
        <img
          src="{{ Storage::url($course->image_path) }}"
          alt="{{ $course->title }}"
          class="img-thumbnail"
          style="max-width: 260px;"
        >
      </div>
    @endif

    {{-- Upload new image --}}
    <div class="mb-3">
      <label class="form-label">Replace Image</label>
      <input
        type="file"
        name="image"
        accept="image/*"
        class="form-control @error('image') is-invalid @enderror"
      >
      @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
      <div class="form-text">JPG, PNG, WEBP up to 2MB.</div>
    </div>

    {{-- Optional: remove image --}}
    @if($course->image_path)
      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="remove_image" name="remove_image">
        <label class="form-check-label" for="remove_image">
          Remove current image
        </label>
      </div>
    @endif

    <div class="mb-3">
      <label class="form-label">Estimated Minutes (optional)</label>
      <input type="number" name="estimated_minutes"
             value="{{ old('estimated_minutes', $course->estimated_minutes) }}"
             class="form-control">
    </div>

    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" value="1" id="is_published" name="is_published"
             {{ old('is_published', $course->is_published) ? 'checked' : '' }}>
      <label class="form-check-label" for="is_published">
        Published
      </label>
    </div>

    <button class="btn btn-primary" type="submit">Update {{ __('labels.course') }}</button>
    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
