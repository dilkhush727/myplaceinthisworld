@extends('layouts.admin')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Primary Division</h1>

    <p class="mb-3">
        School: <strong>{{ $school->name }}</strong>
    </p>

    <p class="text-muted">
        Below is where the Primary Division resources will appear.
    </p>

    {{-- Placeholder --}}
    <div class="alert alert-info">
        Primary resources will go here.
    </div>

</div>
@endsection