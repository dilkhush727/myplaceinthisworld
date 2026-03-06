@extends('layouts.admin')

@php use Illuminate\Support\Str; @endphp

@section('title', t('admin.learning_progress.course_title', 'Course Progress') . ' – ' . t('db.course.title.'.$course->id, $course->title))

@section('content')
<div class="container-fluid py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h4 mb-1">{{ t('admin.learning_progress.course_progress', 'Course Progress') }}</h1>
      <p class="text-muted mb-0">
        {{ t('db.course.title.'.$course->id, $course->title) }} &mdash;
        @switch($course->division)
          @case('primary') {{ t('division.primary', 'Primary') }} @break
          @case('ji') {{ t('division.ji', 'Junior–Intermediate') }} @break
          @case('highschool') {{ t('division.highschool', 'High School') }} @break
          @default {{ ucfirst($course->division) }}
        @endswitch
      </p>
    </div>

    <a href="{{ route('admin.learning-progress.index') }}" class="btn btn-outline-secondary btn-sm">
      &larr; {{ t('admin.learning_progress.back', 'Back to Learning Progress') }}
    </a>
  </div>

  <div class="card mb-3">
    <div class="card-body d-flex justify-content-between align-items-center">
      <div>
        <div class="fw-semibold mb-1">
          {{ t('db.course.title.'.$course->id, $course->title) }}
        </div>
        @if($course->summary)
          <div class="text-muted small">
            {{ Str::limit($course->summary, 120) }}
          </div>
        @endif
      </div>
      <div class="text-end">
        <div class="small text-muted">{{ t('admin.learning_progress.total_tasks', 'Total Tasks') }}</div>
        <div class="h5 mb-0">{{ $totalTasks }}</div>
        <a href="{{ route('courses.show', $course->id) }}" target="_blank" class="btn btn-sm btn-primary mt-2">
          {{ t('admin.learning_progress.open_course_player', 'Open course player') }}
        </a>
      </div>
    </div>
  </div>

  @if($rows->isEmpty())
    <div class="alert alert-info">
      {{ t('admin.learning_progress.no_activity_course', 'There is no activity for this course yet.') }}
    </div>
  @else
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table align-middle">
            <thead>
              <tr>
                <th>{{ t('admin.learning_progress.school', 'School') }}</th>
                <th>{{ t('admin.learning_progress.teacher', 'Teacher') }}</th>
                <th>{{ t('common.email', 'Email') }}</th>
                <th class="text-center">{{ t('admin.learning_progress.completed_total', 'Completed / Total') }}</th>
                <th class="text-center">{{ t('admin.learning_progress.progress', 'Progress') }}</th>
                <th class="text-center">{{ t('admin.learning_progress.last_activity', 'Last Activity') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rows as $row)
                @php
                  $user           = $row['user'];
                  $school         = $row['school'];
                  $completedTasks = $row['completed_tasks'];
                  $totalTasks     = $row['total_tasks'];
                  $percent        = $row['percent'];
                  $lastActivity   = $row['last_activity'];
                @endphp
                <tr>
                  <td>
                    {{ $school?->name ?? '—' }}
                  </td>
                  <td>
                    {{ $user->name }}
                  </td>
                  <td>
                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                  </td>
                  <td class="text-center">
                    {{ $completedTasks }} / {{ $totalTasks }}
                  </td>
                  <td class="text-center" style="min-width: 160px;">
                    <div class="d-flex flex-column align-items-center">
                      <div class="progress w-100 mb-1" style="height: 6px;">
                        <div class="progress-bar"
                             role="progressbar"
                             style="width: {{ $percent }}%;"></div>
                      </div>
                      <small>{{ $percent }}%</small>
                    </div>
                  </td>
                  <td class="text-center">
                    @if($lastActivity)
                      {{ \Carbon\Carbon::parse($lastActivity)->format('Y-m-d H:i') }}
                    @else
                      <span class="text-muted">{{ t('admin.learning_progress.no_activity', 'No activity') }}</span>
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