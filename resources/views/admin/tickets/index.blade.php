@extends('layouts.admin')

@section('title', t('admin.tickets.title','Tickets'))

@section('content')
<div class="container-fluid py-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">
      {{ t('admin.tickets.title','Tickets') }}
    </h1>
  </div>


  {{-- Filters --}}
  <div class="card mb-4">
    <div class="card-body">

      <form class="row g-3" method="GET" action="{{ route('admin.tickets.index') }}">

        <div class="col-md-3">
          <label class="form-label">
            {{ t('common.category','Category') }}
          </label>

          <select name="category" class="form-select">
            <option value="">
              {{ t('common.all','All') }}
            </option>

            @foreach($categories as $category)
              <option value="{{ $category }}"
                      {{ request('category') === $category ? 'selected' : '' }}>

                {{ $category }}

              </option>
            @endforeach
          </select>
        </div>


        <div class="col-md-3">
          <label class="form-label">
            {{ t('common.status','Status') }}
          </label>

          <select name="status" class="form-select">

            <option value="">
              {{ t('common.all','All') }}
            </option>

            <option value="open"
                    {{ request('status') === 'open' ? 'selected' : '' }}>

              {{ t('status.open','Open') }}

            </option>

            <option value="closed"
                    {{ request('status') === 'closed' ? 'selected' : '' }}>

              {{ t('status.closed','Closed') }}

            </option>

          </select>
        </div>


        <div class="col-md-3">
          <label class="form-label">
            {{ t('common.search','Search') }}
          </label>

          <input type="text"
                 name="search"
                 class="form-control"
                 placeholder="{{ t('admin.tickets.search_placeholder','Ticket #, name, email') }}"
                 value="{{ request('search') }}">
        </div>


        <div class="col-md-3 d-flex align-items-end">

          <button class="btn btn-primary me-2" type="submit">
            {{ t('common.filter','Filter') }}
          </button>

          <a href="{{ route('admin.tickets.index') }}"
             class="btn btn-outline-secondary">

            {{ t('common.reset','Reset') }}

          </a>

        </div>

      </form>

    </div>
  </div>


  {{-- Tickets table --}}
  <div class="card">

    <div class="card-body table-responsive">

      <table class="table align-middle">

        <thead>
          <tr>
            <th>{{ t('admin.tickets.ticket_number','Ticket #') }}</th>
            <th>{{ t('common.category','Category') }}</th>
            <th>{{ t('common.from','From') }}</th>
            <th>{{ t('common.status','Status') }}</th>
            <th>{{ t('common.created','Created') }}</th>
            <th></th>
          </tr>
        </thead>

        <tbody>

        @forelse($tickets as $ticket)

          <tr>

            <td>
              <a href="{{ route('admin.tickets.show', $ticket) }}">
                {{ $ticket->ticket_number ?? '—' }}
              </a>
            </td>


            <td>
              {{ $ticket->category }}
            </td>


            <td>
              <div class="fw-semibold">
                {{ $ticket->name }}
              </div>

              <small class="text-muted">
                {{ $ticket->email }}
              </small>
            </td>


            <td>

              @if($ticket->ticket_status === 'open')

                <span class="badge bg-success">
                  {{ t('status.open','Open') }}
                </span>

              @else

                <span class="badge bg-secondary">
                  {{ t('status.closed','Closed') }}
                </span>

              @endif

            </td>


            <td>
              {{ $ticket->created_at->format('Y-m-d H:i') }}
            </td>


            <td class="text-end">

              <a href="{{ route('admin.tickets.show', $ticket) }}"
                 class="btn btn-sm btn-outline-primary">

                {{ t('common.view','View') }}

              </a>

            </td>

          </tr>


        @empty

          <tr>
            <td colspan="6" class="text-center text-muted">

              {{ t('admin.tickets.empty','No tickets found.') }}

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