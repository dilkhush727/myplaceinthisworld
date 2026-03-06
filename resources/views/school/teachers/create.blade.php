@extends('layouts.admin')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">{{ t('school.teachers.add_title', 'Add New Teacher') }}</h1>

    <form action="{{ route('school.teachers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">{{ t('school.teachers.name', 'Teacher Name') }}</label>
            <input type="text" name="name" class="form-control" required/>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ t('school.teachers.email', 'Teacher Email') }}</label>
            <input type="email" name="email" class="form-control" required/>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ t('school.teachers.password', 'Password') }}</label>
            <input type="password" name="password" class="form-control" required/>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ t('school.teachers.password_confirm', 'Confirm Password') }}</label>
            <input type="password" name="password_confirmation" class="form-control" required/>
        </div>

        <button class="btn btn-primary">
            {{ t('school.teachers.add', 'Add Teacher') }}
        </button>
    </form>

</div>
@endsection