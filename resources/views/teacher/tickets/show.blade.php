@extends('layouts.admin')

@section('title', t('tickets.ticket','Ticket').' '.$ticket->ticket_number)

@section('content')
<div class="container py-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h4 mb-1">
        {{ t('tickets.ticket','Ticket') }} #{{ $ticket->ticket_number }}
      </h1>

      <div class="text-muted">
        {{ $ticket->category }} •

        @if($ticket->ticket_status === 'open')
          <span class="badge bg-success">{{ t('tickets.open','Open') }}</span>
        @else
          <span class="badge bg-secondary">{{ t('tickets.closed','Closed') }}</span>
        @endif
      </div>
    </div>

    <a href="{{ route('teacher.tickets.index') }}" class="btn btn-link btn-sm">
      &larr; {{ t('tickets.back_to_tickets','Back to tickets') }}
    </a>
  </div>

  <div class="card mb-4">
    <div class="card-header">
      {{ t('tickets.original_message','Your original message') }}
    </div>

    <div class="card-body">
      <p class="mb-0" style="white-space: pre-wrap;">{{ $ticket->message }}</p>

      <small class="text-muted d-block mt-2">
        {{ t('tickets.submitted_at','Submitted at') }}:
        {{ $ticket->created_at->format('Y-m-d H:i') }}
      </small>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header">{{ t('tickets.conversation','Conversation') }}</div>

    <div class="card-body">
      @forelse($ticket->replies as $reply)

        <div class="mb-3">
          <div class="d-flex justify-content-between">
            <div>
              @if($reply->user_type === 'admin')
                <strong>{{ t('tickets.admin','Admin') }}</strong>
              @else
                <strong>{{ t('tickets.you','You') }}</strong>
              @endif
            </div>

            <small class="text-muted">
              {{ $reply->created_at->format('Y-m-d H:i') }}
            </small>
          </div>

          <p class="mb-0 mt-1" style="white-space: pre-wrap;">
            {{ $reply->message }}
          </p>

          <hr>
        </div>

      @empty
        <p class="text-muted mb-0">
          {{ t('tickets.no_replies','No replies yet.') }}
        </p>
      @endforelse
    </div>
  </div>

  @if($ticket->ticket_status === 'open')
    <div class="card">
      <div class="card-header">
        {{ t('tickets.reply_admin','Reply to Admin') }}
      </div>

      <div class="card-body">

        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('teacher.tickets.reply', $ticket) }}">
          @csrf

          <div class="mb-3">
            <label for="message" class="form-label">
              {{ t('tickets.your_message','Your message') }}
            </label>

            <textarea name="message"
                      id="message"
                      rows="4"
                      class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>

            @error('message')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <button class="btn btn-primary" type="submit">
            {{ t('tickets.send_reply','Send Reply') }}
          </button>

        </form>
      </div>
    </div>

  @else

    <div class="alert alert-info">
      {{ t('tickets.ticket_closed','This ticket is closed. You cannot add new replies.') }}
    </div>

  @endif

</div>
@endsection