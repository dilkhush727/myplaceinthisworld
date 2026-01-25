@extends('layouts.admin')

@section('content')
<div class="container pb-5">

    <h1 class="mb-5 pb-5">Divisions of Learning</h1>

    <div class="row g-4 justify-content-center dol-v2 mt-5">

        {{-- Primary Division --}}
        <div class="col-md-4">
            <div class="card h-100 dol-card dol-primary">
                <div class="dol-avatar">
                    <img src="{{ asset('assets/img/person/primary-avatar.png') }}" alt="Primary" class="img-fluid">
                </div>
                <div class="dol-paper"></div>
                <div class="card-body d-flex flex-column dol-body">
                    <div class="text-center mb-2">
                        <h4 class="card-title"><strong>Primary</strong></h4>
                        <h5>Grade (1-3)</h5>
                    </div>
                    <p class="card-text flex-grow-1">
                        Primary students will become familiar with some African Kings and Queens. The hands-on activities will engage students as they begin to learn about African heritage through the lens of African Kings and Queens. This curriculum will also give students a sense of connectedness, create a new understanding of Black people and culture, and develop a sense of belonging, especially for Black students.
                    </p>

                    @php
                        $hasPrimary = $school->hasActiveMembership('primary');
                    @endphp

                    @if($hasPrimary)
                        <span class="badge bg-success">Active</span>
                        <a href="{{ route('divisions.primary') }}" class="btn btn-success">
                            View Primary Resources
                        </a>
                    @else
                        <span class="badge bg-danger">Locked</span>

                        @if(auth()->user()->hasRole('school'))
                            <a href="{{ route('school.memberships.manage') }}" class="btn btn-outline-danger">
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
            <div class="card h-100 dol-card dol-junior">
                <div class="dol-avatar">
                    <img src="{{ asset('assets/img/person/junior-avatar.png') }}" alt="Junior" class="img-fluid">
                </div>
                <div class="dol-paper"></div>
                <div class="card-body d-flex flex-column dol-body">
                    <div class="text-center mb-2">
                        <h4 class="card-title"><strong>Junior/Intermediate</strong></h4>
                        <h5>Grade (4-6)</h5>
                    </div>
                    <p class="card-text flex-grow-1">
                        As Junior/Intermediate students get to know the African Kings and Queens presented, the hands-on activities will engage them. The familiar learning platforms and the use of social media tools will keep them motivated. This curriculum will also give students a sense of connectedness, create a new understanding of Black people and culture, and develop a sense of belonging, especially for Black students.
                    </p>

                    @php
                        $hasJi = $school->hasActiveMembership('ji');
                    @endphp

                    @if($hasJi)
                        <span class="badge bg-success">Active</span>
                        <a href="{{ route('divisions.ji') }}" class="btn btn-success">
                            View JI Resources
                        </a>
                    @else
                        <span class="badge bg-danger">Locked</span>

                        @if(auth()->user()->hasRole('school'))
                            <a href="{{ route('school.memberships.manage') }}" class="btn btn-outline-danger">
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
            <div class="card h-100 dol-card dol-high">
                <div class="dol-avatar">
                    <img src="{{ asset('assets/img/person/high-avatar.png') }}" alt="High School" class="img-fluid">
                </div>
                <div class="dol-paper"></div>
                <div class="card-body d-flex flex-column dol-body">
                    <div class="text-center mb-2">
                        <h4 class="card-title"><strong>High School</strong></h4>
                        <h5>Grade (9-12)</h5>
                    </div>
                    <p class="card-text flex-grow-1">
                        The High School curriculum goes deeper and touches on rich content and sometimes controversial issues related to African Kings and Queens and their heritage. Students will engage in critical thinking and make relevant connections to their own environment and lived experiences and to global competencies.
                    </p>

                    @php
                        $hasHs = $school->hasActiveMembership('highschool');
                    @endphp

                    @if($hasHs)
                        <span class="badge bg-success">Active (Included)</span>
                        <a href="{{ route('divisions.highschool') }}" class="btn btn-success">
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
