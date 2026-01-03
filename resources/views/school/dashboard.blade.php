@extends('layouts.admin') {{-- change this if your school layout file is different --}}

@section('title', 'School Dashboard')

@section('content')

<div class="container-fluid">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h2 class="mb-1">School Dashboard</h2>
            <p class="text-muted mb-0">Quick overview of your school activity and progress.</p>
        </div>

        {{-- Optional quick actions --}}
        <div class="d-flex gap-2">
            <a href="{{ route('school.tickets.index') }}" class="btn btn-light border">View Tickets</a>
            <a href="{{ route('divisions.index') }}" class="btn btn-primary">Division of Learning</a>
        </div>
    </div>

    {{-- TOP STATS CARDS --}}
    <div class="row g-3">

        {{-- Teachers --}}
        <div class="col-xl-4 col-md-6">
            <div class="card bg-danger dashnum-card text-white overflow-hidden">
                <span class="round small"></span>
                <span class="round big"></span>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="avtar avtar-lg">
                                <i class="text-white ti ti-users"></i>
                            </div>
                        </div>
                        <div class="col-auto">
                            <span class="badge bg-light text-dark">Teachers</span>
                        </div>
                    </div>

                    <span class="text-white d-block f-34 f-w-500 my-2">
                        {{ $teachersCount }}
                        <i class="ti ti-arrow-up-right-circle opacity-50"></i>
                    </span>
                    <p class="mb-0 opacity-75">Total teachers connected to your school</p>
                </div>
            </div>
        </div>

        {{-- Active Memberships --}}
        <div class="col-xl-4 col-md-6">
            <div class="card bg-success dashnum-card text-white overflow-hidden">
                <span class="round small"></span>
                <span class="round big"></span>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="avtar avtar-lg">
                                <i class="text-white ti ti-id"></i>
                            </div>
                        </div>
                        <div class="col-auto">
                            <span class="badge bg-light text-dark">Memberships</span>
                        </div>
                    </div>

                    <span class="text-white d-block f-34 f-w-500 my-2">
                        {{ $activeMembershipsCount }}
                        <i class="ti ti-arrow-up-right-circle opacity-50"></i>
                    </span>
                    <p class="mb-0 opacity-75">Active memberships running</p>
                </div>
            </div>
        </div>

        {{-- Open Tickets --}}
        <div class="col-xl-4 col-md-12">
            <div class="card bg-warning dashnum-card text-white overflow-hidden">
                <span class="round small"></span>
                <span class="round big"></span>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="avtar avtar-lg">
                                <i class="text-white ti ti-message-report"></i>
                            </div>
                        </div>
                        <div class="col-auto">
                            <span class="badge bg-light text-dark">Support</span>
                        </div>
                    </div>

                    <span class="text-white d-block f-34 f-w-500 my-2">
                        {{ $openTickets }}
                        <i class="ti ti-arrow-up-right-circle opacity-50"></i>
                    </span>
                    <p class="mb-0 opacity-75">Open support tickets</p>
                </div>
            </div>
        </div>

    </div>


    {{-- SECOND ROW --}}
    <div class="row g-3 mt-1">

        {{-- Total Tickets --}}
        <div class="col-xl-4 col-md-6">
            <div class="card dashnum-card overflow-hidden">
                <span class="round bg-warning small"></span>
                <span class="round bg-warning big"></span>
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="avtar avtar-lg bg-light-warning">
                            <i class="text-warning ti ti-inbox"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1">{{ $totalTickets }}</h4>
                            <p class="mb-0 opacity-75 text-sm">Total tickets created</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Lessons --}}
        <div class="col-xl-4 col-md-6">
            <div class="card dashnum-card overflow-hidden">
                <span class="round bg-info small"></span>
                <span class="round bg-info big"></span>
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="avtar avtar-lg bg-light">
                            <i class="text-info ti ti-book"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1">{{ $lessonsCount }}</h4>
                            <p class="mb-0 opacity-75 text-sm">Total lessons available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tasks --}}
        <div class="col-xl-4 col-md-12">
            <div class="card dashnum-card overflow-hidden">
                <span class="round bg-success small"></span>
                <span class="round bg-success big"></span>
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="avtar avtar-lg bg-light">
                            <i class="text-success ti ti-checklist"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-1">{{ $tasksCount }}</h4>
                            <p class="mb-0 opacity-75 text-sm">Total tasks available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    {{-- PROGRESS + COMPLETIONS --}}
    <div class="row g-3 mt-1">

        {{-- Completed Tasks --}}
        <div class="col-xl-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h5 class="mb-0">Tasks Completed</h5>
                        <span class="badge bg-light text-dark">School-wide</span>
                    </div>

                    <div class="d-flex align-items-end justify-content-between">
                        <div>
                            <div class="text-muted">Completed</div>
                            <div class="h2 mb-0">{{ $completedTasksCount }}</div>
                        </div>
                        <div class="text-end">
                            <div class="text-muted">Completion Rate</div>
                            <div class="h3 mb-0">{{ $completionRate }}%</div>
                        </div>
                    </div>

                    <div class="progress mt-3" style="height: 10px;">
                        <div class="progress-bar" role="progressbar"
                             style="width: {{ min(100, max(0, $completionRate)) }}%;"
                             aria-valuenow="{{ $completionRate }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Summary Box --}}
        <div class="col-xl-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Quick Summary</h5>

                    <div class="row g-3">
                        <div class="col-6">
                            <div class="p-3 border rounded">
                                <div class="text-muted">Teachers</div>
                                <div class="h4 mb-0">{{ $teachersCount }}</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 border rounded">
                                <div class="text-muted">Open Tickets</div>
                                <div class="h4 mb-0">{{ $openTickets }}</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 border rounded">
                                <div class="text-muted">Lessons</div>
                                <div class="h4 mb-0">{{ $lessonsCount }}</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 border rounded">
                                <div class="text-muted">Memberships</div>
                                <div class="h4 mb-0">{{ $activeMembershipsCount }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <a href="{{ route('school.teachers.index') }}" class="btn btn-outline-secondary w-50">Manage Teachers</a>
                        <a href="{{ route('school.learning-progress.index') }}" class="btn btn-outline-primary w-50">Learning Progress</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
