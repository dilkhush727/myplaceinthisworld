<div class="card h-100">
  <div class="card-body">

    @if($currentTask)

      {{-- Tabs --}}
      <ul class="nav nav-tabs mb-3" id="taskTabs" role="tablist">

        <li class="nav-item" role="presentation">
          <button class="nav-link active"
                  id="overview-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#task-overview"
                  type="button" role="tab">
            {{ t('courses.tabs.overview','Overview') }}
          </button>
        </li>

        <li class="nav-item" role="presentation">
          <button class="nav-link"
                  id="resources-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#task-resources"
                  type="button" role="tab">
            {{ t('courses.tabs.resources','Resources') }}
          </button>
        </li>

        <li class="nav-item" role="presentation">
          <button class="nav-link"
                  id="notes-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#task-notes"
                  type="button" role="tab">
            {{ t('courses.tabs.notes','Notes') }}
          </button>
        </li>

      </ul>


      <div class="tab-content" id="taskTabsContent">

        {{-- Overview tab --}}
        <div class="tab-pane fade show active" id="task-overview" role="tabpanel">

          <h2 class="h4 mb-3">
            {{ t('db.task.title.'.$currentTask->id,$currentTask->title) }}
          </h2>

          <div class="task-body" style="min-height: 200px;">

            @if($currentTask->body)

              {!! t('db.task.body.'.$currentTask->id,$currentTask->body) !!}

            @else

              <p class="text-muted">
                {{ t('courses.no_task_content','No content has been added for this task yet.') }}
              </p>

            @endif

          </div>


          {{-- Mark complete / incomplete --}}
          <form method="POST"
                action="{{ route('courses.tasks.toggle-complete', [$course->id, $currentTask->id]) }}"
                class="mt-4 d-inline"
                id="task-complete-form">
            @csrf

            <button type="submit"
                    id="task-complete-button"
                    class="btn {{ $currentTaskIsCompleted ? 'btn-outline-secondary' : 'btn-success' }}">

              {{ $currentTaskIsCompleted
                    ? t('courses.mark_incomplete','Mark as Incomplete')
                    : t('courses.mark_complete','Mark as Complete') }}

            </button>

          </form>

        </div>


        {{-- Resources tab --}}
        <div class="tab-pane fade" id="task-resources" role="tabpanel">

          <div class="d-flex justify-content-between align-items-center mb-2">

            <h2 class="h5 mb-0">
              {{ t('courses.resources.title','Resources') }}
            </h2>

          </div>


          @if($currentTask->resources && $currentTask->resources->count())

            <ul class="list-group mb-3">

              @foreach($currentTask->resources as $resource)

                <li class="list-group-item d-flex justify-content-between align-items-center">

                  <div>

                    <span class="badge me-2
                      @switch($resource->type)
                        @case('pdf') bg-danger @break
                        @case('video') bg-primary @break
                        @case('slides') bg-success @break
                        @case('doc') bg-info @break
                        @default bg-secondary
                      @endswitch">

                      {{ strtoupper($resource->type) }}

                    </span>

                    <a href="{{ $resource->url }}" target="_blank" rel="noopener">

                      {{ t('db.resource.title.'.$resource->id,$resource->title) }}

                    </a>

                  </div>

                  <i class="bi bi-box-arrow-up-right"></i>

                </li>

              @endforeach

            </ul>

          @endif

        </div>


        {{-- Notes tab --}}
        <div class="tab-pane fade" id="task-notes" role="tabpanel">

          <div class="d-flex justify-content-between align-items-center mb-2">

            <h2 class="h5 mb-0">
              {{ t('courses.notes.title','My Notes') }}
            </h2>

            <small id="notes-status" class="text-muted">

              @if($noteUpdatedAt)

                {{ t('courses.notes.last_saved','Last saved at') }}
                {{ $noteUpdatedAt->format('Y-m-d H:i') }}

              @else

                {{ t('courses.notes.not_saved','Not saved yet') }}

              @endif

            </small>

          </div>


          <textarea id="task-notes-textarea"
                    class="form-control"
                    rows="10"
                    data-save-url="{{ route('courses.tasks.notes.save', [$course->id, $currentTask->id]) }}"
                    data-csrf="{{ csrf_token() }}">{{ $noteContent }}</textarea>


          <small class="text-muted d-block mt-1">

            {{ t('courses.notes.autosave','Notes are saved automatically as you type.') }}

          </small>

        </div>

      </div>


    @else

      <p class="text-muted mb-0">
        {{ t('courses.no_tasks_course',"This course doesn't have any tasks yet. Please ask the admin to add content.") }}
      </p>

    @endif

  </div>
</div>