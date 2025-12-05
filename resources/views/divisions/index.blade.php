@extends('layouts.admin')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Divisions of Learning</h1>

    <p class="mb-4">
        School: <strong>{{ $school->name }}</strong>
    </p>

    <div class="row g-4">

        {{-- Primary Division --}}
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Primary</h5>
                    <p class="card-text flex-grow-1">
                        Access teaching and learning resources for the Primary division.
                    </p>

                    @php
                        $hasPrimary = $school->hasActiveMembership('primary');
                    @endphp

                    @if($hasPrimary)
                        <span class="badge bg-success mb-2">Active</span>
                        <a href="{{ route('divisions.primary') }}" class="btn btn-primary">
                            View Primary Resources
                        </a>
                    @else
                        <span class="badge bg-secondary mb-2">Locked</span>

                        @if(auth()->user()->hasRole('school'))
                            <a href="{{ route('school.memberships.manage') }}" class="btn btn-outline-primary">
                                Unlock Primary
                            </a>
                        @else
                            <button class="btn btn-outline-secondary" disabled>
                                Contact your school to access
                            </button>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        {{-- Junior–Intermediate Division --}}
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Junior–Intermediate</h5>
                    <p class="card-text flex-grow-1">
                        Access resources tailored for the Junior–Intermediate division.
                    </p>

                    @php
                        $hasJi = $school->hasActiveMembership('ji');
                    @endphp

                    @if($hasJi)
                        <span class="badge bg-success mb-2">Active</span>
                        <a href="{{ route('divisions.ji') }}" class="btn btn-primary">
                            View JI Resources
                        </a>
                    @else
                        <span class="badge bg-secondary mb-2">Locked</span>

                        @if(auth()->user()->hasRole('school'))
                            <a href="{{ route('school.memberships.manage') }}" class="btn btn-outline-primary">
                                Unlock JI
                            </a>
                        @else
                            <button class="btn btn-outline-secondary" disabled>
                                Contact your school to access
                            </button>
                        @endif
                    @endif

                </div>
            </div>
        </div>

        {{-- High School Division --}}
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">High School</h5>
                    <p class="card-text flex-grow-1">
                        Access all High School teaching and learning resources.
                    </p>

                    @php
                        $hasHs = $school->hasActiveMembership('highschool');
                    @endphp

                    @if($hasHs)
                        <span class="badge bg-success mb-2">Active (Included)</span>
                        <a href="{{ route('divisions.highschool') }}" class="btn btn-primary">
                            View High School Resources
                        </a>
                    @else
                        <span class="badge bg-danger mb-2">Unexpected: Not Active</span>
                        <a href="{{ route('school.memberships.manage') }}" class="btn btn-outline-danger">
                            Contact Support
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
