@extends('layouts.admin')

@section('title', 'Edit Task – '.$lesson->title)

@section('content')
<div class="container py-4">
  <h1 class="h4 mb-3">Edit Task – {{ $lesson->title }}</h1>

  <form method="POST"
        action="{{ route('admin.courses.lessons.tasks.update', [$course, $lesson, $task]) }}"
        enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title"
             value="{{ old('title', $task->title) }}"
             class="form-control @error('title') is-invalid @enderror">
      @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Slug (optional)</label>
      <input type="text" name="slug"
             value="{{ old('slug', $task->slug) }}"
             class="form-control">
      <div class="form-text">Leave blank to auto-generate from title.</div>
    </div>

    <div class="mb-3">
      <label class="form-label">Sort Order</label>
      <input type="number" name="sort_order"
             value="{{ old('sort_order', $task->sort_order) }}"
             class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">Task Content (Body)</label>
      <textarea name="body" rows="6" class="form-control">{{ old('body', $task->body) }}</textarea>
    </div>

    {{-- RESOURCES SECTION --}}
    <hr class="my-4">

    <h2 class="h5 mb-3">Resources</h2>
    <div class="mb-2 small text-muted">
      Add PDFs, videos, links, Google Slides, etc. Each row is one resource.
    </div>

    <div id="resources-wrapper">
      @if($task->resources->isEmpty())
        {{-- show one empty row if no resources --}}
        <div class="row g-2 align-items-end resource-row mb-2">
          <div class="col-md-2">
            <label class="form-label">Type</label>
            <select name="resource_type[]" class="form-select">
              <option value="link">Link</option>
              <option value="pdf">PDF</option>
              <option value="video">Video</option>
              <option value="slides">Slides</option>
              <option value="doc">Doc</option>
              <option value="other">Other</option>
            </select>
          </div>

          <div class="col-md-3">
            <label class="form-label">Title</label>
            <input type="text" name="resource_title[]" class="form-control"
                   placeholder="e.g., Teacher Guide PDF">
          </div>

          <div class="col-md-4">
            <label class="form-label">URL (optional)</label>
            <input type="text" name="resource_url[]" class="form-control"
                   placeholder="https://... (or leave blank if uploading)">
          </div>

          <div class="col-md-2">
            <label class="form-label">File (optional)</label>
            <input type="file" name="resource_file[]" class="form-control">
            <small class="text-muted d-block" style="font-size: 0.75rem;">
              PDF, DOCX, PPTX, etc.
            </small>
          </div>

          <div class="col-md-1">
            <label class="form-label d-none d-md-block">&nbsp;</label>
            <button type="button"
                    class="btn btn-outline-danger w-100 btn-remove-resource">
              &times;
            </button>
          </div>

          <input type="hidden" name="resource_order[]" value="0">
        </div>
      @else
        @foreach($task->resources as $index => $resource)
          <div class="row g-2 align-items-end resource-row mb-2">
            <div class="col-md-2">
              <label class="form-label">Type</label>
              @php
                $type = old("resource_type.$index", $resource->type);
              @endphp
              <select name="resource_type[]" class="form-select">
                <option value="link"   {{ $type === 'link' ? 'selected' : '' }}>Link</option>
                <option value="pdf"    {{ $type === 'pdf' ? 'selected' : '' }}>PDF</option>
                <option value="video"  {{ $type === 'video' ? 'selected' : '' }}>Video</option>
                <option value="slides" {{ $type === 'slides' ? 'selected' : '' }}>Slides</option>
                <option value="doc"    {{ $type === 'doc' ? 'selected' : '' }}>Doc</option>
                <option value="other"  {{ $type === 'other' ? 'selected' : '' }}>Other</option>
              </select>
            </div>

            <div class="col-md-3">
              <label class="form-label">Title</label>
              <input type="text" name="resource_title[]"
                     value="{{ old("resource_title.$index", $resource->title) }}"
                     class="form-control">
            </div>

            <div class="col-md-4">
              <label class="form-label">URL (optional)</label>
              @php
                $url = old("resource_url.$index", $resource->url);
              @endphp
              <input type="text" name="resource_url[]"
                     value="{{ $url }}"
                     class="form-control"
                     placeholder="https://... (or leave blank if uploading)">
              @if($resource->url)
                <small class="text-muted d-block" style="font-size: 0.75rem;">
                  Current: <a href="{{ $resource->url }}" target="_blank">Open</a>
                </small>
              @endif
            </div>

            <div class="col-md-2">
              <label class="form-label">Replace File</label>
              <input type="file" name="resource_file[]" class="form-control">
              <small class="text-muted d-block" style="font-size: 0.75rem;">
                Leave empty to keep current file.
              </small>
            </div>

            <div class="col-md-1">
              <label class="form-label d-none d-md-block">&nbsp;</label>
              <button type="button"
                      class="btn btn-outline-danger w-100 btn-remove-resource">
                &times;
              </button>
            </div>

            <input type="hidden" name="resource_order[]"
                   value="{{ $resource->sort_order ?? $index }}">
          </div>
        @endforeach
      @endif
    </div>

    <button type="button"
            class="btn btn-outline-primary btn-sm mb-3"
            id="btn-add-resource">
      + Add Resource
    </button>

    <div class="mt-3">
      <button class="btn btn-primary" type="submit">Update Task</button>
      <a href="{{ route('admin.courses.lessons.tasks.index', [$course, $lesson]) }}"
         class="btn btn-secondary ms-2">Cancel</a>
    </div>
  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.getElementById('resources-wrapper');
    const addBtn  = document.getElementById('btn-add-resource');

    if (!wrapper || !addBtn) return;

    addBtn.addEventListener('click', function () {
      const rows = wrapper.querySelectorAll('.resource-row');
      const lastIndex = rows.length;

      const firstRow = rows[0];
      const newRow = firstRow.cloneNode(true);

      // clear values
      newRow.querySelectorAll('input').forEach((input) => {
        if (input.name === 'resource_order[]') {
          input.value = String(lastIndex);
        } else {
          input.value = '';
        }
      });

      // reset selects to default
      newRow.querySelectorAll('select').forEach((select) => {
        select.selectedIndex = 0;
      });

      wrapper.appendChild(newRow);
      bindRemoveButtons();
    });

    function bindRemoveButtons() {
      wrapper.querySelectorAll('.btn-remove-resource').forEach(function (btn) {
        btn.onclick = function () {
          const rows = wrapper.querySelectorAll('.resource-row');
          if (rows.length === 1) {
            // just clear the last row instead of removing
            rows[0].querySelectorAll('input').forEach((input) => {
              if (input.name !== 'resource_order[]') input.value = '';
            });
            rows[0].querySelectorAll('select').forEach((select) => {
              select.selectedIndex = 0;
            });
            return;
          }
          btn.closest('.resource-row').remove();
        };
      });
    }

    bindRemoveButtons();
  });
</script>
@endsection
