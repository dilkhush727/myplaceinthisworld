@extends('layouts.admin')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">High School Division</h1>

    <p class="mb-3">
        School: <strong>{{ $school->name }}</strong>
    </p>

    <p class="text-muted">
        Below is where the High School resources will appear.
    </p>

    {{-- Placeholder --}}
    <div class="alert alert-info">
        High School resources will go here.
    </div>

</div>
@endsection