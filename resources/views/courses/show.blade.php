@extends('layouts.admin') {{-- or your teacher/school layout --}}

@section('title', $course->title)

@section('content')


<style>
  @media (min-width: 768px) {

  /* Sticky LEFT column */
  .col-md-4.col-lg-3.mb-4 {
    position: sticky;
    top: 85px;
    height: calc(100vh - 80px);
    align-self: flex-start;
  }

  /* Card fills the column */
  .col-md-4.col-lg-3.mb-4 .card {
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  /* Header stays fixed */
  .col-md-4.col-lg-3.mb-4 .card-header {
    flex-shrink: 0;
    position: sticky;
    top: 0;
    z-index: 2;
    background: #fff;
  }

  /* THIS is where scrolling happens */
  .col-md-4.col-lg-3.mb-4 .card-body {
    flex: 1;
    overflow-y: auto;
  }
</style>


<div class="container-fluid py-4">

  {{-- Flash message --}}
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  {{-- Top bar --}}
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h3 mb-1">{{ $course->title }}</h1>
      <div class="text-muted text-capitalize">
        Division: {{ $course->division }}
      </div>
    </div>

    <div class="card shadow-sm" style="min-width: 260px;">
      <div class="card-body">
        <div class="fw-bold mb-1">{{ __('labels.course') }} Progress</div>
        <div class="small text-muted mb-2" id="course-progress-text">
          {{ $completedTasks }} / {{ $totalTasks }} {{ __('labels.tasks') }} complete
          ({{ $completionPercent }}%)
        </div>
        <div class="progress mb-2" style="height: 6px;">
          <div class="progress-bar" role="progressbar"
               id="course-progress-bar"
               style="width: {{ $completionPercent }}%;"></div>
        </div>
      </div>
    </div>
  </div>

  {{-- Layout: sidebar + content --}}
  <div class="row">
    {{-- Sidebar: lessons & tasks --}}
    <div class="col-md-4 col-lg-3 mb-4">
      <div class="card h-100">
        <div class="card-header fw-bold">
          {{ __('labels.course') }} Content
        </div>
        <div class="card-body p-0">
          <div class="list-group list-group-flush" id="course-task-list">
            @forelse($course->lessons as $lesson)
              @php
                $lp = $lessonProgress[$lesson->id] ?? ['completed' => 0, 'total' => 0];
              @endphp
              <div class="list-group-item px-3 py-2 bg-light fw-semibold"
                   data-lesson-id="{{ $lesson->id }}">
                <div class="d-flex justify-content-between align-items-center">
                  <span>{{ $lesson->title }}</span>
                  @if($lp['total'] > 0)
                    <small class="text-muted lesson-progress"
                           data-lesson-id="{{ $lesson->id }}">
                      {{ $lp['completed'] }} / {{ $lp['total'] }}
                    </small>
                  @endif
                </div>
              </div>

              @forelse($lesson->tasks as $task)
                @php
                  $isActive    = $currentTask && $currentTask->id === $task->id;
                  $isCompleted = in_array($task->id, $completedTaskIds ?? []);
                @endphp
                <a href="{{ route('courses.tasks.show', [$course->id, $task->id]) }}"
                   data-task-link="1"
                   data-task-id="{{ $task->id }}"
                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center
                          {{ $isActive ? 'active' : '' }}">
                  <span>{{ $task->title }}</span>
                  <span class="badge border-0 {{ $isCompleted ? 'bg-success' : 'bg-light text-muted' }}">
                    {!! $isCompleted ? '&#10003;' : '&#9711;' !!}
                  </span>
                </a>
              @empty
                <div class="list-group-item px-3 py-2 text-muted small">
                  No tasks in this lesson yet.
                </div>
              @endforelse
            @empty
              <div class="list-group-item px-3 py-2 text-muted">
                No lessons have been added to this course yet.
              </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>

    {{-- Main content: current task (replaceable panel) --}}
    <div class="col-md-8 col-lg-9">
      <div id="task-panel-container">
        @include('courses.partials.task_panel')
      </div>
    </div>
  </div>

</div>

{{-- JS: init notes + AJAX task switching + AJAX complete --}}
<script>
  // Re-attach notes auto-save + mark-complete AJAX to current task panel
  window.initTaskPanel = function () {
    var textarea = document.getElementById('task-notes-textarea');
    if (!textarea) return;

    var saveUrl  = textarea.getAttribute('data-save-url');
    var csrf     = textarea.getAttribute('data-csrf');
    var statusEl = document.getElementById('notes-status');
    var saveTimer = null;

    function updateStatus(text, isError) {
      if (!statusEl) return;
      statusEl.textContent = text;
      if (isError) {
        statusEl.classList.remove('text-muted');
        statusEl.classList.add('text-danger');
      } else {
        statusEl.classList.remove('text-danger');
        statusEl.classList.add('text-muted');
      }
    }

    // ---------- NOTES AUTO-SAVE ----------
    async function saveNotes() {
      var content = textarea.value;
      updateStatus('Saving...', false);

      try {
        var response = await fetch(saveUrl, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrf
          },
          body: JSON.stringify({ content: content })
        });

        if (!response.ok) {
          throw new Error('HTTP ' + response.status);
        }

        var data = await response.json();

        if (data && data.updated_at) {
          updateStatus('Saved at ' + data.updated_at, false);
        } else {
          updateStatus('Saved', false);
        }
      } catch (e) {
        console.error('Error saving notes:', e);
        updateStatus('Error saving notes', true);
      }
    }

    textarea.addEventListener('input', function () {
      updateStatus('Typing...', false);
      if (saveTimer) clearTimeout(saveTimer);
      saveTimer = setTimeout(saveNotes, 1000);
    });

    // ---------- MARK COMPLETE (AJAX) ----------
    var completeForm   = document.getElementById('task-complete-form');
    var completeButton = document.getElementById('task-complete-button');

    if (completeForm && completeButton) {
      completeForm.addEventListener('submit', function (e) {
        e.preventDefault();

        var action = completeForm.getAttribute('action');
        if (!action) {
          // fallback
          completeForm.submit();
          return;
        }

        completeButton.disabled = true;

        fetch(action, {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrf,
            'X-Requested-With': 'XMLHttpRequest'
          },
          body: new FormData(completeForm)
        })
          .then(function (response) {
            if (!response.ok) {
              throw new Error('HTTP ' + response.status);
            }
            return response.json();
          })
          .then(function (data) {
            // Update button label & style
            if (data.task_completed) {
              completeButton.textContent = 'Mark as Incomplete';
              completeButton.classList.remove('btn-success');
              completeButton.classList.add('btn-outline-secondary');
            } else {
              completeButton.textContent = 'Mark as Complete';
              completeButton.classList.add('btn-success');
              completeButton.classList.remove('btn-outline-secondary');
            }

            // Update top course progress
            var progressText = document.getElementById('course-progress-text');
            var progressBar  = document.getElementById('course-progress-bar');
            if (progressText && progressBar) {
              progressText.textContent =
                data.course_completed_tasks + ' / ' +
                data.course_total_tasks + ' tasks complete (' +
                data.course_completion_percent + '%)';
              progressBar.style.width = data.course_completion_percent + '%';
            }

            // Update lesson-level progress
            if (data.lesson_id !== undefined && data.lesson_id !== null) {
              document.querySelectorAll('.lesson-progress[data-lesson-id="' + data.lesson_id + '"]')
                .forEach(function (el) {
                  el.textContent = data.lesson_completed + ' / ' + data.lesson_total;
                });
            }

            // Update all task badges in sidebar
            if (Array.isArray(data.completed_task_ids)) {
              document.querySelectorAll('#course-task-list a[data-task-link="1"]').forEach(function (a) {
                var taskId = parseInt(a.getAttribute('data-task-id'), 10);
                var badge  = a.querySelector('.badge');
                if (!badge || isNaN(taskId)) return;

                if (data.completed_task_ids.includes(taskId)) {
                  badge.classList.remove('bg-light', 'text-muted');
                  badge.classList.add('bg-success');
                  badge.innerHTML = '&#10003;';
                } else {
                  badge.classList.add('bg-light', 'text-muted');
                  badge.classList.remove('bg-success');
                  badge.innerHTML = '&#9711;';
                }
              });
            }

            completeButton.disabled = false;
          })
          .catch(function (err) {
            console.error('Error toggling task completion via AJAX:', err);
            // If something breaks, fall back to full submit
            completeButton.disabled = false;
            completeForm.submit();
          });
      });
    }
  };

  document.addEventListener('DOMContentLoaded', function () {
    var sidebar        = document.getElementById('course-task-list');
    var panelContainer = document.getElementById('task-panel-container');

    // init notes + complete toggle for first rendered task
    window.initTaskPanel();

    if (!sidebar || !panelContainer) return;

    sidebar.addEventListener('click', function (e) {
      var link = e.target.closest('a[data-task-link="1"]');
      if (!link) return;

      e.preventDefault();
      var url = link.href;

      // Update active state in sidebar
      sidebar.querySelectorAll('a[data-task-link="1"]').forEach(function (a) {
        a.classList.remove('active');
      });
      link.classList.add('active');

      // Fetch partial HTML for this task
      fetch(url + '?partial=1', {
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
        .then(function (response) {
          if (!response.ok) {
            throw new Error('HTTP ' + response.status);
          }
          return response.text();
        })
        .then(function (html) {
          panelContainer.innerHTML = html;
          window.initTaskPanel(); // re-bind notes & complete toggle for new task
          window.history.pushState({}, '', url);
        })
        .catch(function (err) {
          console.error('Error loading task via AJAX:', err);
          // Fallback to full navigation if something breaks
          window.location.href = url;
        });
    });

    // Simple handling for browser back/forward: reload full page
    window.addEventListener('popstate', function () {
      window.location.reload();
    });
  });
</script>
@endsection
