@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">Submit New Gallery</h2>

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

    <form action="{{ route('teacher.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card p-4">

            <div class="mb-3">
                <label class="form-label fw-bold">Gallery Title *</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Category</label>
                <input type="text" name="category" class="form-control" placeholder="Events, Achievements, etc.">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="content" rows="4" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tags (comma separated)</label>
                <input type="text" name="tags" class="form-control" placeholder="growth, learning, 2025">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Images *</label>
                <input type="file" name="images[]" multiple class="form-control" required>
                <small class="text-muted">You can upload multiple images</small>
            </div>

            <button class="btn btn-primary">Submit for Review</button>

        </div>

    </form>

</div>
@endsection
