@extends('layouts.admin') {{-- change to your admin layout --}}

@section('content')
<div class="container-fluid">

  <div class="d-flex align-items-center justify-content-between mb-3">
    <h3 class="mb-0">
      {{ t('admin.contacts.contact','Contact') }} #{{ $contactMessage->id }}
    </h3>

    <a href="{{ route('admin.contacts.index') }}" class="btn btn-light">
      ← {{ t('common.back','Back') }}
    </a>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @php $status = $contactMessage->ticket_status ?? 'open'; @endphp

  <div class="row g-3">

    <div class="col-lg-5">

      <div class="card">

        <div class="card-body">

          <div class="mb-4">

            <h5 class="mb-3">
              {{ t('common.status','Status') }}
            </h5>

            <div class="mb-3">
              {{ t('common.current','Current') }}:

              <span class="badge
                {{ $status==='open' ? 'bg-warning' : '' }}
                {{ $status==='closed' ? 'bg-secondary' : '' }}
                {{ $status==='resolved' ? 'bg-success' : '' }}
              ">
                {{ t('admin.contacts.status_'.$status, ucfirst($status)) }}
              </span>

            </div>

            <form method="POST" action="{{ route('admin.contacts.status', $contactMessage) }}">
              @csrf
              @method('PATCH')

              <button name="ticket_status"
                      value="open"
                      class="btn btn-sm btn-warning"
                      type="submit">

                {{ t('admin.contacts.mark_open','Mark Open') }}

              </button>

              <button name="ticket_status"
                      value="resolved"
                      class="btn btn-sm btn-success"
                      type="submit">

                {{ t('admin.contacts.mark_resolved','Mark Resolved') }}

              </button>

              <button name="ticket_status"
                      value="closed"
                      class="btn btn-sm btn-secondary"
                      type="submit">

                {{ t('admin.contacts.mark_closed','Mark Closed') }}

              </button>

            </form>

          </div>

          <hr>

          <div class="mb-2">
            <strong>{{ t('common.category','Category') }}:</strong>
            {{ $contactMessage->category }}
          </div>

          <div class="mb-2">
            <strong>{{ t('common.from','From') }}:</strong>
            {{ $contactMessage->name }} ({{ $contactMessage->email }})
          </div>

          @if($contactMessage->phone)
            <div class="mb-2">
              <strong>{{ t('common.phone','Phone') }}:</strong>
              {{ $contactMessage->phone }}
            </div>
          @endif

          <div class="mb-3">
            <strong>{{ t('common.date','Date') }}:</strong>
            {{ optional($contactMessage->created_at)->format('M d, Y h:i A') }}
          </div>

        </div>

      </div>

    </div>


    <div class="col-lg-7">

      <div class="card">

        <div class="card-body">

          <h5 class="mb-3">
            {{ t('common.message','Message') }}
          </h5>

          <div class="p-3 bg-light rounded">
            {!! nl2br(e($contactMessage->message)) !!}
          </div>

        </div>

      </div>

    </div>

  </div>

</div>
@endsection