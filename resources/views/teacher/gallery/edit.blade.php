@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">{{ t('gallery.edit','Edit Gallery') }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teacher.gallery.update', $gallery->id) }}" 
          method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card p-4">

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('gallery.title','Gallery Title') }} *</label>
                <input type="text" name="name" value="{{ $gallery->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('gallery.category','Category') }}</label>
                <input type="text" name="category" value="{{ $gallery->category }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('common.description','Description') }}</label>
                <textarea name="content" rows="4" class="form-control">{{ $gallery->content }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('gallery.tags','Tags (comma separated)') }}</label>
                <input type="text" name="tags"
                       value="{{ is_array($gallery->tags) ? implode(',', $gallery->tags) : '' }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">{{ t('gallery.add_images','Add More Images') }}</label>
                <input type="file" name="images[]" multiple class="form-control">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">{{ t('gallery.existing_images','Existing Images') }}</label>

                <div class="row g-3">
                    @foreach($gallery->images as $img)
                        <div class="col-3">
                            <img src="{{ asset('storage/'.$img->image_path) }}" class="img-fluid rounded">
                        </div>
                    @endforeach
                </div>
            </div>

            <button class="btn btn-primary">
                {{ t('gallery.update','Update Gallery') }}
            </button>

        </div>

    </form>

</div>
@endsection