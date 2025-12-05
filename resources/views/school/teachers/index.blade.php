@extends('layouts.admin')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Manage Teachers</h1>

    <a href="{{ route('school.teachers.create') }}" class="btn btn-primary mb-3">
        Add Teacher
    </a>

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Added</th>
                <th style="width:150px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->created_at->format('M d, Y') }}</td>
                    <td>
                        <a href="{{ route('school.teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning mb-1">
                            Edit
                        </a>
                        <form action="{{ route('school.teachers.destroy', $teacher->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm" onclick="return confirm('Remove this teacher?')">
                                Remove
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No teachers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
