@extends('layouts.admin')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Junior–Intermediate Division</h1>

    <p class="mb-3">
        School: <strong>{{ $school->name }}</strong>
    </p>

    <p class="text-muted">
        Below is where the Junior–Intermediate resources will appear.
    </p>

    {{-- Placeholder --}}
    <div class="alert alert-info">
        Junior–Intermediate resources will go here.
    </div>

</div>
@endsection