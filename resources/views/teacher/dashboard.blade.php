@extends('layouts.admin')

@section('title', t('teacher.dashboard','Teacher Dashboard'))

@section('content')
<div class="container-fluid">

  <div class="d-flex align-items-center justify-content-between mb-4">
    <div>
      <h2 class="mb-1">{{ t('teacher.dashboard','Teacher Dashboard') }}</h2>
      <p class="text-muted mb-0">{{ t('teacher.dashboard_subtitle','Your shortcuts, progress, and what to do next.') }}</p>
    </div>
    <div class="d-flex gap-2">
      <a href="{{ route('divisions.index') }}" class="btn btn-primary">
        {{ t('divisions.title','Division of Learning') }}
      </a>
      <a href="{{ route('teacher.tickets.index') }}" class="btn btn-light border">
        {{ t('common.support','Support') }}
      </a>
    </div>
  </div>

  <div class="row g-3 mb-3">
    <div class="col-xl-3 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="text-muted">{{ __('labels.tasks') }} {{ t('teacher.todo','To Do') }}</div>
          <div class="h2 mb-0">{{ $toDoCount }}</div>
          <div class="small text-muted mt-1">
            {{ t('teacher.based_on_tasks','Based on your available') }} {{ __('labels.tasks') }}
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="text-muted">{{ t('teacher.completed_this_month','Completed (This Month)') }}</div>
          <div class="h2 mb-0">{{ $completedThisMonthCount }}</div>
          <div class="small text-muted mt-1">{{ t('teacher.keep_going','Nice work — keep it going') }}</div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="text-muted">{{ t('teacher.my_notes','My Notes') }}</div>
          <div class="h2 mb-0">{{ $notesCount }}</div>
          <div class="small text-muted mt-1">{{ t('teacher.notes_saved','Notes you saved on tasks') }}</div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="text-muted">{{ t('teacher.overall_progress','Overall Progress') }}</div>
          <div class="h2 mb-2">{{ $completionRate }}%</div>
          <div class="progress" style="height:10px;">
            <div class="progress-bar" role="progressbar" style="width: {{ $completionRate }}%"></div>
          </div>
          <div class="small text-muted mt-1">
            {{ $completedTotal }} {{ t('common.done','done') }} {{ t('common.out_of','out of') }} {{ $availableTasksCount }} {{ __('labels.tasks') }}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-3">
    <div class="col-lg-12">

        <div class="card">
            
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">{{ t('teacher.recent_activities','Recent Activities') }}</h5>

                <div class="d-flex gap-2">
                  <a href="{{ route('teacher.learning-progress.index') }}" class="btn btn-sm btn-outline-primary">
                    {{ t('teacher.my_learning','My Learning') }}
                  </a>

                  <a href="{{ url('/teacher/tickets') }}" class="btn btn-sm btn-outline-secondary">
                    {{ t('teacher.support_tickets','Support Tickets') }}
                  </a>
                </div>
            </div>

            <div class="card-body">
                @forelse($recentCompletions as $c)
                @php
                    $task = $c->task;
                    $lesson = $task?->lesson;
                    $courseId = $lesson?->course_id;
                    $taskId = $task?->id;
                    $time = $c->completed_at ?? $c->created_at;
                @endphp

                <div class="mb-3">
                    @if($courseId && $taskId)
                    <a class="fw-semibold"
                        href="{{ route('courses.tasks.show', ['course' => $courseId, 'task' => $taskId]) }}">
                        {{ t('teacher.completed','Completed') }}: {{ $task->title }} ({{ __('labels.lesson') }}: {{ $lesson->title }})
                    </a>
                    @else
                    <div class="fw-semibold">
                      {{ t('teacher.completed','Completed') }}: {{ $task->title ?? __('labels.task') }}
                    </div>
                    @endif

                    <div class="text-muted small">{{ optional($time)->diffForHumans() }}</div>
                </div>
                @empty
                <p class="text-muted mb-0">{{ t('teacher.no_activity','No recent activity yet.') }}</p>
                @endforelse
            </div>
        </div>

    </div>
  </div>

</div>
@endsection