@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Gallery Management</h2>

        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
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
                        <th>Category</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Likes</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($galleries as $gallery)
                        <tr>
                            <td>{{ $gallery->id }}</td>
                            <td>{{ $gallery->name }}</td>
                            <td>{{ $gallery->category ?? '-' }}</td>

                            <td>
                                @if($gallery->status === 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @elseif($gallery->status === 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @else
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </td>

                            <td>{{ $gallery->user->name ?? 'Unknown' }}</td>

                            <td>{{ $gallery->likes()->count() }}</td>

                            <td class="text-end">

                                {{-- Approve / Reject Buttons --}}
                                @if($gallery->status !== 'approved')
                                    <form action="{{ route('admin.gallery.approve', $gallery->id) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-sm btn-success">Approve</button>
                                    </form>
                                @endif

                                @if($gallery->status !== 'rejected')
                                    <form action="{{ route('admin.gallery.reject', $gallery->id) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-sm btn-warning">Reject</button>
                                    </form>
                                @endif

                                {{-- Edit --}}
                                <a href="{{ route('admin.gallery.edit', $gallery->id) }}" 
                                   class="btn btn-sm btn-primary">
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" 
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
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
