@extends('layouts.admin')

@section('title', 'My Support Tickets')

@section('content')
<div class="container py-4">
  <h1 class="h3 mb-3">My Support Tickets</h1>

  <div class="mb-3">
    <form method="GET">
      <select name="status" class="form-select w-auto d-inline-block">
        <option value="">All statuses</option>
        <option value="open" {{ request('status') === 'open' ? 'selected' : '' }}>Open</option>
        <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>Closed</option>
      </select>
      <button class="btn btn-primary btn-sm">Filter</button>
    </form>
  </div>

  <div class="card">
    <div class="card-body table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>Ticket #</th>
            <th>Category</th>
            <th>Status</th>
            <th>Created</th>
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
                  <span class="badge bg-success">Open</span>
                @else
                  <span class="badge bg-secondary">Closed</span>
                @endif
              </td>
              <td>{{ $ticket->created_at->format('Y-m-d') }}</td>
              <td class="text-end">
                <a href="{{ route('school.tickets.show', $ticket) }}" class="btn btn-sm btn-outline-primary">
                  View
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center text-muted">No tickets yet.</td>
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
