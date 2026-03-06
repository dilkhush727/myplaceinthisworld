@extends('layouts.admin')

@section('title', t('admin.tickets.ticket','Ticket').' '.$ticket->ticket_number)

@section('content')
<div class="container-fluid py-4">

  {{-- Top bar --}}
  <div class="d-flex justify-content-between align-items-center mb-3">

    <div>
      <h1 class="h4 mb-1">
        {{ t('admin.tickets.ticket','Ticket') }} #{{ $ticket->ticket_number }}
      </h1>

      <div class="text-muted">
        {{ $ticket->category }} •

        @if($ticket->ticket_status === 'open')
          <span class="badge bg-success">
            {{ t('status.open','Open') }}
          </span>
        @else
          <span class="badge bg-secondary">
            {{ t('status.closed','Closed') }}
          </span>
        @endif
      </div>
    </div>


    <div>

      {{-- Status toggle form --}}
      <form method="POST"
            action="{{ route('admin.tickets.updateStatus', $ticket) }}"
            class="d-inline">
        @csrf
        @method('PATCH')

        <input type="hidden"
               name="status"
               value="{{ $ticket->ticket_status === 'open' ? 'closed' : 'open' }}">

        @if($ticket->ticket_status === 'open')

          <button class="btn btn-outline-danger btn-sm" type="submit">
            {{ t('admin.tickets.close_ticket','Close Ticket') }}
          </button>

        @else

          <button class="btn btn-outline-success btn-sm" type="submit">
            {{ t('admin.tickets.reopen_ticket','Reopen Ticket') }}
          </button>

        @endif

      </form>

      <a href="{{ route('admin.tickets.index') }}"
         class="btn btn-link btn-sm">

        &larr; {{ t('admin.tickets.back_to_tickets','Back to tickets') }}

      </a>

    </div>

  </div>


  {{-- Original message --}}
  <div class="card mb-4">

    <div class="card-header">

      {{ t('common.from','From') }}:
      <strong>{{ $ticket->name }}</strong>
      &lt;{{ $ticket->email }}&gt;

      @if($ticket->phone)
        <span class="ms-3">
          {{ t('common.phone','Phone') }}: {{ $ticket->phone }}
        </span>
      @endif

    </div>


    <div class="card-body">

      <p class="mb-0" style="white-space: pre-wrap;">
        {{ $ticket->message }}
      </p>

      <small class="text-muted d-block mt-2">

        {{ t('admin.tickets.submitted_at','Submitted at') }}:
        {{ $ticket->created_at->format('Y-m-d H:i') }}

      </small>

    </div>

  </div>


  {{-- Replies thread --}}
  <div class="card mb-4">

    <div class="card-header">
      {{ t('admin.tickets.conversation','Conversation') }}
    </div>

    <div class="card-body">

      @forelse($ticket->replies as $reply)

        <div class="mb-3">

          <div class="d-flex justify-content-between">

            <div>

              <strong>
                {{ ucfirst($reply->user_type) }}
              </strong>

              @if($reply->user_type === 'admin')
                <span class="badge bg-primary ms-1">
                  {{ t('common.admin','Admin') }}
                </span>
              @endif

            </div>

            <small class="text-muted">
              {{ $reply->created_at->format('Y-m-d H:i') }}
            </small>

          </div>

          <div class="mt-1">
            <p class="mb-0" style="white-space: pre-wrap;">
              {{ $reply->message }}
            </p>
          </div>

          <hr>

        </div>

      @empty

        <p class="text-muted mb-0">
          {{ t('admin.tickets.no_replies','No replies yet.') }}
        </p>

      @endforelse

    </div>

  </div>


  {{-- Reply form --}}
  <div class="card">

    <div class="card-header">
      {{ t('admin.tickets.admin_reply','Admin Reply') }}
    </div>

    <div class="card-body">

      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif


      <form method="POST"
            action="{{ route('admin.tickets.reply', $ticket) }}">

        @csrf


        <div class="mb-3">

          <label for="message" class="form-label">
            {{ t('admin.tickets.your_reply','Your reply') }}
          </label>

          <textarea name="message"
                    id="message"
                    rows="5"
                    class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>

          @error('message')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror

        </div>


        <div class="form-check mb-3">

          <input class="form-check-input"
                 type="checkbox"
                 value="1"
                 id="close_after_reply"
                 name="close_after_reply">

          <label class="form-check-label" for="close_after_reply">
            {{ t('admin.tickets.close_after_reply','Close ticket after sending this reply') }}
          </label>

        </div>


        <button class="btn btn-primary" type="submit">
          {{ t('admin.tickets.send_reply','Send Reply') }}
        </button>

      </form>

    </div>

  </div>

</div>
@endsection