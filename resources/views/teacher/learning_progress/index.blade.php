@extends('layouts.admin')

@php use Illuminate\Support\Str; @endphp

@section('title', t('learning.my_learning','My Learning'))

@section('content')
<div class="container-fluid py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h4 mb-1">{{ t('learning.my_learning','My Learning') }}</h1>
      <p class="text-muted mb-0">
        {{ t('learning.progress_subtitle','See your progress in each course and continue where you left off.') }}
      </p>
    </div>

    <form method="GET" action="{{ route('teacher.learning-progress.index') }}" class="d-flex align-items-center">
      <label for="division" class="me-2 mb-0 text-muted small">{{ t('learning.division','Division') }}:</label>
      <select name="division" id="division" class="form-select form-select-sm" onchange="this.form.submit()">
        <option value="">{{ t('common.all','All') }}</option>
        <option value="primary" {{ request('division') === 'primary' ? 'selected' : '' }}>
          {{ t('divisions.primary','Primary') }}
        </option>
        <option value="ji" {{ request('division') === 'ji' ? 'selected' : '' }}>
          {{ t('divisions.ji','Junior–Intermediate') }}
        </option>
        <option value="highschool" {{ request('division') === 'highschool' ? 'selected' : '' }}>
          {{ t('divisions.highschool','High School') }}
        </option>
      </select>
    </form>
  </div>

  @if($stats->isEmpty())
    <div class="alert alert-info">
      {{ t('learning.no_courses','There are no published courses available yet.') }}
    </div>
  @else
    <div class="row g-3">
      @foreach($stats as $row)
        @php
          $course          = $row['course'];
          $totalTasks      = $row['total_tasks'];
          $completedTasks  = $row['completed_tasks'];
          $percent         = $row['completion_percent'];
          $lastActivity    = $row['last_activity'];
          $division        = $course->division;
        @endphp

        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body d-flex flex-column">
              <div class="mb-2 text-uppercase small text-muted">
                @switch($division)
                  @case('primary') {{ t('divisions.primary','Primary') }} @break
                  @case('ji') {{ t('divisions.ji','Junior–Intermediate') }} @break
                  @case('highschool') {{ t('divisions.highschool','High School') }} @break
                  @default {{ $division }}
                @endswitch
              </div>

              <h2 class="h5 mb-1">{{ $course->title }}</h2>

              @if($course->summary)
                <p class="small text-muted mb-2">
                  {{ Str::limit($course->summary, 110) }}
                </p>
              @endif

              <div class="mt-auto">
                <div class="small text-muted mb-1">
                  {{ $completedTasks }} / {{ $totalTasks }} {{ __('labels.tasks') }} {{ t('learning.complete','complete') }}
                  ({{ $percent }}%)
                </div>

                <div class="progress mb-2" style="height: 6px;">
                  <div class="progress-bar"
                       role="progressbar"
                       style="width: {{ $percent }}%;"></div>
                </div>

                <div class="d-flex justify-content-between align-items-center small mb-2">
                  @if($lastActivity)
                    <span class="text-muted">
                      {{ t('learning.last_activity','Last activity') }}:
                      {{ \Carbon\Carbon::parse($lastActivity)->format('Y-m-d H:i') }}
                    </span>
                  @else
                    <span class="text-muted">{{ t('learning.not_started','Not started yet') }}</span>
                  @endif

                  @if($percent === 100)
                    <span class="badge bg-success">{{ t('learning.completed','Completed') }}</span>
                  @elseif($percent > 0)
                    <span class="badge bg-warning text-dark">{{ t('learning.in_progress','In progress') }}</span>
                  @else
                    <span class="badge bg-secondary">{{ t('learning.not_started','Not started') }}</span>
                  @endif
                </div>

                <a href="{{ route('courses.show', $course->id) }}"
                   class="btn btn-primary w-100">
                  {{ $percent > 0 
                      ? t('learning.continue_course','Continue').' '. __('labels.course') 
                      : t('learning.start_course','Start').' '. __('labels.course') }}
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>
@endsection