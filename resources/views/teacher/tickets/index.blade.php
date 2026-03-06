@extends('layouts.admin')

@section('title', t('tickets.my_support_tickets','My Support Tickets'))

@section('content')
<div class="container py-4">

  <h1 class="h3 mb-3">{{ t('tickets.my_support_tickets','My Support Tickets') }}</h1>

  <div class="mb-3">
    <form method="GET" class="d-flex flex-wrap gap-2 align-items-center">
      <label class="me-2 mb-0">{{ t('common.status','Status') }}:</label>

      <select name="status" class="form-select w-auto">
        <option value="">{{ t('common.all','All') }}</option>

        <option value="open" {{ request('status') === 'open' ? 'selected' : '' }}>
          {{ t('tickets.open','Open') }}
        </option>

        <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>
          {{ t('tickets.closed','Closed') }}
        </option>
      </select>

      <button class="btn btn-primary btn-sm ms-2" type="submit">
        {{ t('common.filter','Filter') }}
      </button>

      <a href="{{ route('teacher.tickets.index') }}" class="btn btn-outline-secondary btn-sm ms-2">
        {{ t('common.reset','Reset') }}
      </a>
    </form>
  </div>

  <div class="card">
    <div class="card-body table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>{{ t('tickets.ticket_number','Ticket #') }}</th>
            <th>{{ t('tickets.category','Category') }}</th>
            <th>{{ t('common.status','Status') }}</th>
            <th>{{ t('common.created','Created') }}</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          @forelse($tickets as $ticket)
            <tr>
              <td>{{ $ticket->ticket_number }}</td>

              <td>{{ $ticket->category }}</td>

              <td>
                @if($ticket->ticket_status === 'open')
                  <span class="badge bg-success">{{ t('tickets.open','Open') }}</span>
                @else
                  <span class="badge bg-secondary">{{ t('tickets.closed','Closed') }}</span>
                @endif
              </td>

              <td>{{ $ticket->created_at->format('Y-m-d') }}</td>

              <td class="text-end">
                <a href="{{ route('teacher.tickets.show', $ticket) }}"
                   class="btn btn-sm btn-outline-primary">
                  {{ t('common.view','View') }}
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center text-muted">
                {{ t('tickets.no_tickets','You have no support tickets yet.') }}
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>

      <div class="mt-3">
        {{ $tickets->links() }}
      </div>

    </div>
  </div>

</div>
@endsection