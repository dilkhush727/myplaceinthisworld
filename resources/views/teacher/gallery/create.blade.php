@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">{{ t('gallery.submit_new','Submit New Gallery') }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teacher.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card p-4">

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('gallery.title','Gallery Title') }} *</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('gallery.category','Category') }}</label>
                <input type="text" name="category" class="form-control" placeholder="{{ t('gallery.category_placeholder','Events, Achievements, etc.') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('common.description','Description') }}</label>
                <textarea name="content" rows="4" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('gallery.tags','Tags (comma separated)') }}</label>
                <input type="text" name="tags" class="form-control" placeholder="{{ t('gallery.tags_placeholder','growth, learning, 2025') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('gallery.images','Images') }} *</label>
                <input type="file" name="images[]" multiple class="form-control" required>
                <small class="text-muted">{{ t('gallery.upload_multiple','You can upload multiple images') }}</small>
            </div>

            <button class="btn btn-primary">
                {{ t('gallery.submit_review','Submit for Review') }}
            </button>

        </div>

    </form>

</div>
@endsection