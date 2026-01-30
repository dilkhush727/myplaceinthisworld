@extends('layouts.admin')

@section('title', 'Add ' . __('labels.course'))

@section('content')
<div class="container py-4">
  <h1 class="h4 mb-3">Add {{ __('labels.course') }}</h1>

  <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label class="form-label">Division</label>
      <select name="division" class="form-select @error('division') is-invalid @enderror">
        <option value="">Select division</option>
        @foreach($divisions as $value => $label)
          <option value="{{ $value }}" {{ old('division') === $value ? 'selected' : '' }}>
            {{ $label }}
          </option>
        @endforeach
      </select>
      @error('division') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" value="{{ old('title') }}"
             class="form-control @error('title') is-invalid @enderror">
      @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Slug (optional)</label>
      <input type="text" name="slug" value="{{ old('slug') }}" class="form-control">
      <div class="form-text">Leave blank to auto-generate from title.</div>
    </div>

    <div class="mb-3">
      <label class="form-label">Summary (for card)</label>
      <textarea name="summary" rows="3" class="form-control">{{ old('summary') }}</textarea>
    </div>

    <!-- <div class="mb-3">
      <label class="form-label">Image Path (optional)</label>
      <input type="text" name="image_path" value="{{ old('image_path') }}" class="form-control">
      <div class="form-text">Later we can switch this to real image upload.</div>
    </div> -->

    <div class="mb-3">
      <label class="form-label">Course Image</label>
      <input
        type="file"
        name="image"
        accept="image/*"
        class="form-control @error('image') is-invalid @enderror"
      >
      @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
      <div class="form-text">JPG, PNG, WEBP up to 2MB.</div>
    </div>

    <div class="mb-3">
      <label class="form-label">Estimated Minutes (optional)</label>
      <input type="number" name="estimated_minutes" value="{{ old('estimated_minutes') }}" class="form-control">
    </div>

    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" value="1" id="is_published" name="is_published"
             {{ old('is_published', true) ? 'checked' : '' }}>
      <label class="form-check-label" for="is_published">
        Published
      </label>
    </div>

    <button class="btn btn-primary" type="submit">Save {{ __('labels.course') }}</button>
    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
