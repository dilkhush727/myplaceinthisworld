@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">
            {{ t('gallery.my_submissions','My Gallery Submissions') }}
        </h2>

        <a href="{{ route('teacher.gallery.create') }}" class="btn btn-primary">
            + {{ t('gallery.add_new','Add New Gallery') }}
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body p-0">

            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>{{ t('common.id','ID') }}</th>
                        <th>{{ t('common.title','Title') }}</th>
                        <th>{{ t('common.status','Status') }}</th>
                        <th>{{ t('gallery.images','Images') }}</th>
                        <th class="text-end">{{ t('common.actions','Actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($galleries as $gallery)
                        <tr>
                            <td>{{ $gallery->id }}</td>
                            <td>{{ $gallery->name }}</td>

                            <td>
                                @if($gallery->status === 'approved')
                                    <span class="badge bg-success">
                                        {{ t('gallery.approved','Approved') }}
                                    </span>

                                @elseif($gallery->status === 'pending')
                                    <span class="badge bg-warning">
                                        {{ t('gallery.pending_review','Pending Review') }}
                                    </span>

                                @else
                                    <span class="badge bg-danger">
                                        {{ t('gallery.rejected','Rejected') }}
                                    </span>
                                @endif
                            </td>

                            <td>{{ $gallery->images->count() }}</td>

                            <td class="text-end">

                                {{-- Edit --}}
                                <a href="{{ route('teacher.gallery.edit', $gallery->id) }}" 
                                   class="btn btn-sm btn-primary">
                                    {{ t('common.edit','Edit') }}
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('teacher.gallery.destroy', $gallery->id) }}" 
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('{{ t('gallery.delete_confirm','Are you sure you want to delete this gallery?') }}')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger">
                                        {{ t('common.delete','Delete') }}
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

    <div class="mt-3">
        {{ $galleries->links() }}
    </div>

</div>
@endsection