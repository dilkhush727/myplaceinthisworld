@extends('layouts.admin')

@section('content')
<div class="container py-5">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- VALIDATION ERRORS --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>{{ t('common.form_errors', 'There were errors with your submission:') }}</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class="mb-4">{{ t('school.teachers.edit_title', 'Edit Teacher') }}</h1>

    {{-- UPDATE PROFILE --}}
    <form action="{{ route('school.teachers.updateProfile', $teacher->id) }}" method="POST" class="mb-5">
        @csrf
        @method('PUT')

        <h4>{{ t('school.teachers.details', 'Teacher Details') }}</h4>

        <div class="mb-3">
            <label class="form-label">{{ t('school.teachers.name', 'Teacher Name') }}</label>
            <input 
                type="text" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $teacher->name) }}"
                required
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ t('school.teachers.email', 'Teacher Email') }}</label>
            <input 
                type="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $teacher->email) }}"
                required
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">
            {{ t('common.save_details', 'Save Details') }}
        </button>
    </form>

    {{-- UPDATE PASSWORD --}}
    <form action="{{ route('school.teachers.updatePassword', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h4>{{ t('school.teachers.change_password', 'Change Password') }}</h4>

        <div class="mb-3">
            <label class="form-label">{{ t('school.teachers.new_password', 'New Password') }}</label>
            <input 
                type="password" 
                name="password" 
                class="form-control @error('password') is-invalid @enderror"
                required
            >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ t('school.teachers.confirm_password', 'Confirm New Password') }}</label>
            <input 
                type="password" 
                name="password_confirmation" 
                class="form-control"
                required
            >
        </div>

        <button class="btn btn-warning">
            {{ t('school.teachers.update_password', 'Update Password') }}
        </button>
    </form>

</div>
@endsection