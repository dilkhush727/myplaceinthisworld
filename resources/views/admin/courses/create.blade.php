@extends('layouts.admin')

@section('title', t('admin.courses.add_title', 'Add Course'))

@section('content')
<div class="container py-4">
  <h1 class="h4 mb-3">{{ t('admin.courses.add_course', 'Add Course') }}</h1>

  <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label class="form-label">{{ t('admin.courses.division', 'Division') }}</label>
      <select name="division" class="form-select @error('division') is-invalid @enderror">
        <option value="">{{ t('admin.courses.select_division', 'Select division') }}</option>
        @foreach($divisions as $value => $label)
          <option value="{{ $value }}" {{ old('division') === $value ? 'selected' : '' }}>
            {{ $label }}
          </option>
        @endforeach
      </select>
      @error('division') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">{{ t('common.title', 'Title') }}</label>
      <input type="text" name="title" value="{{ old('title') }}"
             class="form-control @error('title') is-invalid @enderror">
      @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">{{ t('admin.courses.slug_optional', 'Slug (optional)') }}</label>
      <input type="text" name="slug" value="{{ old('slug') }}" class="form-control">
      <div class="form-text">{{ t('admin.courses.slug_help', 'Leave blank to auto-generate from title.') }}</div>
    </div>

    <div class="mb-3">
      <label class="form-label">{{ t('admin.courses.summary', 'Summary (for card)') }}</label>
      <textarea name="summary" rows="3" class="form-control">{{ old('summary') }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">{{ t('admin.courses.image', 'Image') }}</label>
      <input
        type="file"
        name="image"
        accept="image/*"
        class="form-control @error('image') is-invalid @enderror"
      >
      @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
      <div class="form-text">{{ t('admin.courses.image_help', 'JPG, PNG, WEBP up to 2MB.') }}</div>
    </div>

    <div class="mb-3">
      <label class="form-label">{{ t('admin.courses.estimated_minutes', 'Estimated Minutes (optional)') }}</label>
      <input type="number" name="estimated_minutes" value="{{ old('estimated_minutes') }}" class="form-control">
    </div>

    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" value="1" id="is_published" name="is_published"
             {{ old('is_published', true) ? 'checked' : '' }}>
      <label class="form-check-label" for="is_published">
        {{ t('common.published', 'Published') }}
      </label>
    </div>

    <button class="btn btn-primary" type="submit">{{ t('common.save', 'Save') }} {{ t('admin.courses.course', 'Course') }}</button>
    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary ms-2">{{ t('common.cancel', 'Cancel') }}</a>
  </form>
</div>
@endsection