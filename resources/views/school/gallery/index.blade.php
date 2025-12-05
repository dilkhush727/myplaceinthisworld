@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">My Gallery Submissions</h2>

        <a href="{{ route('school.gallery.create') }}" class="btn btn-primary">
            + Add New Gallery
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
                        <th>ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Images</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($galleries as $gallery)
                        <tr>
                            <td>{{ $gallery->id }}</td>
                            <td>{{ $gallery->name }}</td>

                            <td>
                                @if($gallery->status === 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @elseif($gallery->status === 'pending')
                                    <span class="badge bg-warning">Pending Review</span>
                                @else
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </td>

                            <td>{{ $gallery->images->count() }}</td>

                            <td class="text-end">

                                {{-- Edit --}}
                                <a href="{{ route('school.gallery.edit', $gallery->id) }}" 
                                   class="btn btn-sm btn-primary">
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('school.gallery.destroy', $gallery->id) }}" 
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this gallery?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        Delete
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
