@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">
        {{ t('school.gallery.submit_title', 'Submit New Gallery') }}
    </h2>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Success --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <form action="{{ route('school.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card p-4">

            <div class="mb-3">
                <label class="form-label fw-bold">
                    {{ t('school.gallery.title_label', 'Gallery Title *') }}
                </label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    {{ t('school.gallery.category', 'Category') }}
                </label>
                <input type="text" name="category" class="form-control"
                       placeholder="{{ t('school.gallery.category_placeholder', 'Events, Achievements, etc.') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    {{ t('school.gallery.description', 'Description') }}
                </label>
                <textarea name="content" rows="4" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    {{ t('school.gallery.tags', 'Tags (comma separated)') }}
                </label>
                <input type="text" name="tags" class="form-control"
                       placeholder="{{ t('school.gallery.tags_placeholder', 'growth, learning, 2025') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    {{ t('school.gallery.images', 'Images *') }}
                </label>
                <input type="file" name="images[]" multiple class="form-control" required>
                <small class="text-muted">
                    {{ t('school.gallery.multi_upload', 'You can upload multiple images') }}
                </small>
            </div>

            <button class="btn btn-primary">
                {{ t('school.gallery.submit_review', 'Submit for Review') }}
            </button>

        </div>

    </form>

</div>
@endsection