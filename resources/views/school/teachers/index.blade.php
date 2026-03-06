@extends('layouts.admin')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">{{ t('school.teachers.manage_title', 'Manage Teachers') }}</h1>

    <a href="{{ route('school.teachers.create') }}" class="btn btn-primary mb-3">
        {{ t('school.teachers.add', 'Add Teacher') }}
    </a>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>{{ t('common.name', 'Name') }}</th>
                        <th>{{ t('common.email', 'Email') }}</th>
                        <th>{{ t('school.teachers.added', 'Added') }}</th>
                        <th style="width:150px;">{{ t('common.actions', 'Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('school.teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning">
                                    {{ t('common.edit', 'Edit') }}
                                </a>

                                <form action="{{ route('school.teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('{{ t('school.teachers.confirm_remove', 'Remove this teacher?') }}')">
                                        {{ t('common.remove', 'Remove') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                {{ t('school.teachers.none', 'No teachers found.') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection