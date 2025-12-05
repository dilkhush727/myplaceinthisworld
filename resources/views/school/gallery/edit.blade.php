@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">Edit Gallery</h2>

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


    <form action="{{ route('school.gallery.update', $gallery->id) }}" 
          method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card p-4">

            <div class="mb-3">
                <label class="form-label fw-bold">Gallery Title *</label>
                <input type="text" name="name" value="{{ $gallery->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Category</label>
                <input type="text" name="category" value="{{ $gallery->category }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="content" rows="4" class="form-control">{{ $gallery->content }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tags (comma separated)</label>
                <input type="text" name="tags" 
                       value="{{ is_array($gallery->tags) ? implode(',', $gallery->tags) : '' }}"
                       class="form-control">
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
                            <img src="{{ asset('storage/'.$img->image_path) }}" class="img-fluid rounded">
                        </div>
                    @endforeach
                </div>
            </div>

            <button class="btn btn-primary">Update Gallery</button>

        </div>

    </form>

</div>
@endsection
