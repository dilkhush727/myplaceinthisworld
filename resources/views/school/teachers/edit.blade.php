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
            <strong>There were errors with your submission:</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <h1 class="mb-4">Edit Teacher</h1>

    {{-- UPDATE PROFILE --}}
    <form action="{{ route('school.teachers.updateProfile', $teacher->id) }}" method="POST" class="mb-5">
        @csrf
        @method('PUT')

        <h4>Teacher Details</h4>

        <div class="mb-3">
            <label class="form-label">Teacher Name</label>
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
            <label class="form-label">Teacher Email</label>
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

        <button class="btn btn-primary">Save Details</button>
    </form>


    {{-- UPDATE PASSWORD --}}
    <form action="{{ route('school.teachers.updatePassword', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h4>Change Password</h4>

        <div class="mb-3">
            <label class="form-label">New Password</label>
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
            <label class="form-label">Confirm New Password</label>
            <input 
                type="password" 
                name="password_confirmation" 
                class="form-control"
                required
            >
        </div>

        <button class="btn btn-warning">Update Password</button>
    </form>

</div>
@endsection
