@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">Edit Gallery</h2>

    {{-- Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.gallery.update', $gallery->id) }}" 
          method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card p-4">

            <div class="mb-3">
                <label class="form-label fw-bold">Gallery Title *</label>
                <input type="text" name="name" class="form-control" value="{{ $gallery->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Category</label>
                <input type="text" name="category" class="form-control" value="{{ $gallery->category }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="content" rows="4" class="form-control">{{ $gallery->content }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tags (comma separated)</label>
                <input type="text" name="tags" class="form-control" value="{{ is_array($gallery->tags) ? implode(',', $gallery->tags) : '' }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Add More Images</label>
                <input type="file" name="images[]" multiple class="form-control">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Existing Images</label>
                <div class="row g-3">
                    @foreach($gallery->images as $img)
                        <div class="col-3">
                            <div class="gallery-edit-image-block">
                                <img src="{{ asset('storage/'.$img->image_path) }}" 
                                 class="img-fluid rounded">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button class="btn btn-primary">Save Changes</button>

        </div>

    </form>

</div>

<style>
    .gallery-edit-image-block {
        width: 100%;
        height: 150px;
        overflow: hidden;
    }

    .gallery-edit-image-block img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* crop to fill */
        border-radius: 6px;
    }
</style>
@endsection
