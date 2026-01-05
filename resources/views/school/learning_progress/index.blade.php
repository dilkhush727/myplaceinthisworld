@extends('layouts.admin') {{-- or layouts.admin if you reuse it --}}

@php use Illuminate\Support\Str; @endphp

@section('title', 'Learning Progress')

@section('content')
<div class="container-fluid py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h4 mb-1">Learning Progress</h1>
      <p class="text-muted mb-0">
        See how your teachers are engaging with courses in each division.
      </p>
    </div>

    {{-- Division filter --}}
    <form method="GET" action="{{ route('school.learning-progress.index') }}" class="d-flex align-items-center">
      <label for="division" class="me-2 mb-0 text-muted small">Division:</label>
      <select name="division" id="division" class="form-select form-select-sm" onchange="this.form.submit()">
        <option value="">All</option>
        <option value="primary"     {{ request('division') === 'primary' ? 'selected' : '' }}>Primary</option>
        <option value="ji"          {{ request('division') === 'ji' ? 'selected' : '' }}>Junior–Intermediate</option>
        <option value="highschool"  {{ request('division') === 'highschool' ? 'selected' : '' }}>High School</option>
      </select>
    </form>
  </div>

  @if($stats->isEmpty())
    <div class="alert alert-info">
      There is no course activity for your teachers yet.
    </div>
  @else
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table align-middle">
            <thead>
              <tr>
                <th>{{ __('labels.course') }}</th>
                <th>Division</th>
                <th class="text-center">Total {{ __('labels.tasks') }}</th>
                <th class="text-center">Teachers with Activity</th>
                <th class="text-center">Total Completions</th>
                <th class="text-center">Avg Completion</th>
                <th class="text-center">Last Activity</th>
              </tr>
            </thead>
            <tbody>
              @foreach($stats as $row)
                @php
                  $course       = $row['course'];
                  $division     = $course->division;
                  $totalTasks   = $row['total_tasks'];
                  $teachersUsed = $row['teachers_with_activity'];
                  $totalCompletions = $row['total_completions'];
                  $avgPercent   = $row['avg_completion_percent'];
                  $lastActivity = $row['last_activity'];
                @endphp
                <tr>
                  <td>
                    <div class="fw-semibold">
                      <a href="{{ route('school.learning-progress.course', $course->id) }}">
                        {{ $course->title }}
                      </a>
                    </div>
                    @if($course->summary)
                      <div class="small text-muted">
                        {{ Str::limit($course->summary, 80) }}
                      </div>
                    @endif

                    <div class="small mt-1">
                      <a href="{{ route('courses.show', $course->id) }}" target="_blank">
                        Open course player
                      </a>
                    </div>
                  </td>
                  <td class="text-capitalize">
                    @switch($division)
                      @case('primary') Primary @break
                      @case('ji') Junior–Intermediate @break
                      @case('highschool') High School @break
                      @default {{ $division }}
                    @endswitch
                  </td>
                  <td class="text-center">
                    {{ $totalTasks }}
                  </td>
                  <td class="text-center">
                    {{ $teachersUsed }}
                  </td>
                  <td class="text-center">
                    {{ $totalCompletions }}
                  </td>
                  <td class="text-center">
                    @if($totalTasks > 0 && $teachersUsed > 0)
                      <span class="badge bg-primary">
                        {{ $avgPercent }}%
                      </span>
                    @else
                      <span class="text-muted">—</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @if($lastActivity)
                      {{ \Carbon\Carbon::parse($lastActivity)->format('Y-m-d H:i') }}
                    @else
                      <span class="text-muted">No activity</span>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @endif
</div>
@endsection
