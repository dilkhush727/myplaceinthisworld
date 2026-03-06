@extends('layouts.admin') {{-- change to your admin layout if you have one --}}

@section('title', t('admin.courses.title', 'Courses'))

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">{{ t('admin.courses.title', 'Courses') }}</h1>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
      {{ t('admin.courses.add', '+ Add') }} {{ t('admin.courses.course', 'Course') }}
    </a>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card">
    <div class="card-body table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>{{ t('common.id', 'ID') }}</th>
            <th>{{ t('admin.courses.division', 'Division') }}</th>
            <th>{{ t('common.title', 'Title') }}</th>
            <th>{{ t('common.slug', 'Slug') }}</th>
            <th>{{ t('common.published', 'Published') }}</th>
            <th>{{ t('common.updated', 'Updated') }}</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @forelse($courses as $course)
          <tr>
            <td>{{ $course->id }}</td>
            <td class="text-capitalize">
              {{ t('course.division.'.$course->id, $course->division) }}
            </td>
            <td>{{ t('course.title.'.$course->id, $course->title) }}</td>
            <td>{{ $course->slug }}</td>
            <td>
              @if($course->is_published)
                <span class="badge bg-success">{{ t('common.yes', 'Yes') }}</span>
              @else
                <span class="badge bg-secondary">{{ t('common.no', 'No') }}</span>
              @endif
            </td>
            <td>{{ $course->updated_at->format('Y-m-d') }}</td>
            <td class="text-end">
                <a href="{{ route('admin.courses.lessons.index', $course) }}"
                    class="btn btn-sm btn-outline-secondary me-1">
                    {{ t('admin.lessons.title', 'Lessons') }}
                </a>
                <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-outline-primary me-1">
                    {{ t('common.edit', 'Edit') }}
                </a>
                <form action="{{ route('admin.courses.destroy', $course) }}"
                        method="POST" class="d-inline"
                        onsubmit="return confirm('{{ t('admin.courses.confirm_delete', 'Delete this course?') }}');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">{{ t('common.delete', 'Delete') }}</button>
                </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center text-muted">{{ t('admin.courses.empty', 'No courses yet.') }}</td>
          </tr>
        @endforelse
        </tbody>
      </table>

      <div class="mt-3">
        {{ $courses->links() }}
      </div>
    </div>
  </div>
</div>
@endsection