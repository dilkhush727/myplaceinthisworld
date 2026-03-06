@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">{{ t('school.gallery.edit_title', 'Edit Gallery') }}</h2>

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
                <label class="form-label fw-bold">
                    {{ t('school.gallery.title_label', 'Gallery Title *') }}
                </label>
                <input type="text" name="name" value="{{ $gallery->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    {{ t('school.gallery.category', 'Category') }}
                </label>
                <input type="text" name="category" value="{{ $gallery->category }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    {{ t('school.gallery.description', 'Description') }}
                </label>
                <textarea name="content" rows="4" class="form-control">{{ $gallery->content }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    {{ t('school.gallery.tags', 'Tags (comma separated)') }}
                </label>
                <input type="text" name="tags" 
                       value="{{ is_array($gallery->tags) ? implode(',', $gallery->tags) : '' }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    {{ t('school.gallery.add_images', 'Add More Images') }}
                </label>
                <input type="file" name="images[]" multiple class="form-control">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">
                    {{ t('school.gallery.existing_images', 'Existing Images') }}
                </label>

                <div class="row g-3">
                    @foreach($gallery->images as $img)
                        <div class="col-3">
                            <img src="{{ asset('storage/'.$img->image_path) }}" class="img-fluid rounded">
                        </div>
                    @endforeach
                </div>
            </div>

            <button class="btn btn-primary">
                {{ t('school.gallery.update', 'Update Gallery') }}
            </button>

        </div>

    </form>

</div>
@endsection