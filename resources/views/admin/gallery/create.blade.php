@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">{{ t('admin.gallery.create_title', 'Add New Gallery') }}</h2>

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

    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card p-4">

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('admin.gallery.fields.title', 'Gallery Title *') }}</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('admin.gallery.fields.category', 'Category') }}</label>
                <input type="text" name="category" class="form-control" placeholder="{{ t('admin.gallery.placeholders.category', 'Events, Achievements, etc.') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('admin.gallery.fields.description', 'Description') }}</label>
                <textarea name="content" rows="4" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('admin.gallery.fields.tags', 'Tags (comma separated)') }}</label>
                <input type="text" name="tags" class="form-control" placeholder="{{ t('admin.gallery.placeholders.tags', 'growth, learning, 2025') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('admin.gallery.fields.images', 'Images *') }}</label>
                <input type="file" name="images[]" multiple class="form-control" required>
                <small class="text-muted">{{ t('admin.gallery.help.multiple_images', 'You can upload multiple images') }}</small>
            </div>

            <button class="btn btn-primary">{{ t('admin.gallery.actions.create', 'Create Gallery') }}</button>

        </div>

    </form>

</div>
@endsection