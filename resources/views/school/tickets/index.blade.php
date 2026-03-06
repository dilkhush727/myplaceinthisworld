@extends('layouts.admin')

@section('title', t('school.tickets.title', 'My Support Tickets'))

@section('content')
<div class="container py-4">
  <h1 class="h3 mb-3">{{ t('school.tickets.title', 'My Support Tickets') }}</h1>

  <div class="mb-3">
    <form method="GET">
      <select name="status" class="form-select w-auto d-inline-block">
        <option value="">{{ t('school.tickets.all_statuses', 'All statuses') }}</option>
        <option value="open" {{ request('status') === 'open' ? 'selected' : '' }}>
          {{ t('school.tickets.open', 'Open') }}
        </option>
        <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>
          {{ t('school.tickets.closed', 'Closed') }}
        </option>
      </select>

      <button class="btn btn-primary btn-sm">
        {{ t('common.filter', 'Filter') }}
      </button>
    </form>
  </div>

  <div class="card">
    <div class="card-body table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>{{ t('school.tickets.number', 'Ticket #') }}</th>
            <th>{{ t('school.tickets.category', 'Category') }}</th>
            <th>{{ t('school.tickets.status', 'Status') }}</th>
            <th>{{ t('school.tickets.created', 'Created') }}</th>
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
                  <span class="badge bg-success">
                    {{ t('school.tickets.open', 'Open') }}
                  </span>
                @else
                  <span class="badge bg-secondary">
                    {{ t('school.tickets.closed', 'Closed') }}
                  </span>
                @endif
              </td>

              <td>{{ $ticket->created_at->format('Y-m-d') }}</td>

              <td class="text-end">
                <a href="{{ route('school.tickets.show', $ticket) }}" class="btn btn-sm btn-outline-primary">
                  {{ t('common.view', 'View') }}
                </a>
              </td>
            </tr>

          @empty
            <tr>
              <td colspan="5" class="text-center text-muted">
                {{ t('school.tickets.none', 'No tickets yet.') }}
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