@extends('layouts.admin')

@section('title', t('admin.learning_progress.title', 'Learning Progress'))

@section('content')
<div class="container-fluid py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h4 mb-1">{{ t('admin.learning_progress.title', 'Learning Progress') }}</h1>
      <p class="text-muted mb-0">
        {{ t('admin.learning_progress.description', 'Overview of course usage and completion across all divisions.') }}
      </p>
    </div>

    {{-- Division filter --}}
    <form method="GET" action="{{ route('admin.learning-progress.index') }}" class="d-flex align-items-center">
      <label for="division" class="me-2 mb-0 text-muted small">{{ t('admin.learning_progress.division', 'Division') }}:</label>
      <select name="division" id="division" class="form-select form-select-sm" onchange="this.form.submit()">
        <option value="">{{ t('common.all', 'All') }}</option>
        <option value="primary" {{ request('division') === 'primary' ? 'selected' : '' }}>
          {{ t('division.primary', 'Primary') }}
        </option>
        <option value="ji" {{ request('division') === 'ji' ? 'selected' : '' }}>
          {{ t('division.ji', 'Junior–Intermediate') }}
        </option>
        <option value="highschool" {{ request('division') === 'highschool' ? 'selected' : '' }}>
          {{ t('division.highschool', 'High School') }}
        </option>
      </select>
    </form>
  </div>

  @if($stats->isEmpty())
    <div class="alert alert-info">
      {{ t('admin.learning_progress.no_activity', 'No course activity has been recorded yet.') }}
    </div>
  @else
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table align-middle">
            <thead>
              <tr>
                <th>{{ t('admin.courses.course', 'Course') }}</th>
                <th>{{ t('admin.courses.division', 'Division') }}</th>
                <th class="text-center">{{ t('admin.learning_progress.total_tasks', 'Total Tasks') }}</th>
                <th class="text-center">{{ t('admin.learning_progress.users_with_activity', 'Users with Activity') }}</th>
                <th class="text-center">{{ t('admin.learning_progress.total_completions', 'Total Completions') }}</th>
                <th class="text-center">{{ t('admin.learning_progress.avg_completion', 'Avg Completion') }}</th>
                <th class="text-center">{{ t('admin.learning_progress.last_activity', 'Last Activity') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($stats as $row)
                @php
                  $course       = $row['course'];
                  $division     = $course->division;
                  $totalTasks   = $row['total_tasks'];
                  $uniqueUsers  = $row['unique_users'];
                  $totalCompletions = $row['total_completions'];
                  $avgPercent   = $row['avg_completion_percent'];
                  $lastActivity = $row['last_activity'];
                @endphp
                <tr>
                  <td>
                    <div class="fw-semibold">
                      <a href="{{ route('admin.learning-progress.course', $course->id) }}">
                        {{ t('db.course.title.'.$course->id, $course->title) }}
                      </a>
                    </div>
                    @if($course->summary)
                      <div class="small text-muted">
                        {{ Str::limit($course->summary, 80) }}
                      </div>
                    @endif

                    <div class="small mt-1">
                      <a href="{{ route('courses.show', $course->id) }}" target="_blank">
                        {{ t('admin.learning_progress.open_course_player', 'Open course player') }}
                      </a>
                    </div>
                  </td>

                  <td class="text-capitalize">
                    @switch($division)
                      @case('primary') {{ t('division.primary', 'Primary') }} @break
                      @case('ji') {{ t('division.ji', 'Junior–Intermediate') }} @break
                      @case('highschool') {{ t('division.highschool', 'High School') }} @break
                      @default {{ $division }}
                    @endswitch
                  </td>

                  <td class="text-center">
                    {{ $totalTasks }}
                  </td>

                  <td class="text-center">
                    {{ $uniqueUsers }}
                  </td>

                  <td class="text-center">
                    {{ $totalCompletions }}
                  </td>

                  <td class="text-center">
                    @if($totalTasks > 0 && $uniqueUsers > 0)
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
                      <span class="text-muted">{{ t('admin.learning_progress.no_activity_short', 'No activity') }}</span>
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