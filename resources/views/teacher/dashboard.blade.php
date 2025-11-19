@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Teacher Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">
            Logout
        </button>
    </form>
</div>
@endsection
