{{-- resources/views/admin/contacts/index.blade.php --}}
@extends('layouts.admin') {{-- change if your admin layout name is different --}}

@section('title', 'Contacts')

@section('content')
<div class="container-fluid">

  <div class="d-flex align-items-center justify-content-between mb-3">
    <div>
      <h3 class="mb-0">Contacts</h3>
      <p class="text-muted mb-0">Manage contact form queries</p>
    </div>

    {{-- Filter --}}
    <form method="GET" action="{{ route('admin.contacts.index') }}">
      <select name="status" class="form-select" onchange="this.form.submit()">
        @php($statusFilter = request('status', 'all'))
        <option value="all" {{ $statusFilter==='all' ? 'selected' : '' }}>All</option>
        <option value="open" {{ $statusFilter==='open' ? 'selected' : '' }}>Open</option>
        <option value="resolved" {{ $statusFilter==='resolved' ? 'selected' : '' }}>Resolved</option>
        <option value="closed" {{ $statusFilter==='closed' ? 'selected' : '' }}>Closed</option>
      </select>
    </form>
  </div>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card">
    <div class="card-body">

      <div class="table-responsive">
        <table class="table align-middle mb-0">
          <thead>
            <tr>
              <th style="width:70px;">#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Category</th>
              <th style="width:140px;">Status</th>
              <th style="width:160px;">Created</th>
              <th class="text-end" style="width:160px;">Action</th>
            </tr>
          </thead>

          <tbody>
            @forelse($contacts as $row)
              @php($status = $row->ticket_status ?? 'open')
              <tr>
                <td>{{ $row->id }}</td>
                <td class="fw-semibold">{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->category ?? '-' }}</td>

                <td>
                  <span class="badge
                    @if($status === 'open') bg-warning text-dark
                    @elseif($status === 'resolved') bg-success
                    @elseif($status === 'closed') bg-secondary
                    @else bg-light text-dark
                    @endif
                  ">
                    {{ ucfirst($status) }}
                  </span>
                </td>

                <td>
                  {{ optional($row->created_at)->format('M d, Y') }}
                </td>

                <td class="text-end">
                  <div class="btn-group">
                    <a href="{{ route('admin.contacts.show', $row) }}" class="btn btn-sm btn-outline-primary">
                      View
                    </a>

                    <button type="button"
                            class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                      <span class="visually-hidden">Toggle Dropdown</span>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                      <li class="dropdown-header">Change Status</li>

                      {{-- Open --}}
                      <li>
                        <form method="POST" action="{{ route('admin.contacts.status', $row) }}">
                          @csrf
                          @method('PATCH')
                          <input type="hidden" name="ticket_status" value="open">
                          <button class="dropdown-item" type="submit" {{ $status === 'open' ? 'disabled' : '' }}>
                            Mark Open
                          </button>
                        </form>
                      </li>

                      {{-- Resolved --}}
                      <li>
                        <form method="POST" action="{{ route('admin.contacts.status', $row) }}">
                          @csrf
                          @method('PATCH')
                          <input type="hidden" name="ticket_status" value="resolved">
                          <button class="dropdown-item" type="submit" {{ $status === 'resolved' ? 'disabled' : '' }}>
                            Mark Resolved
                          </button>
                        </form>
                      </li>

                      {{-- Closed --}}
                      <li>
                        <form method="POST" action="{{ route('admin.contacts.status', $row) }}">
                          @csrf
                          @method('PATCH')
                          <input type="hidden" name="ticket_status" value="closed">
                          <button class="dropdown-item" type="submit" {{ $status === 'closed' ? 'disabled' : '' }}>
                            Mark Closed
                          </button>
                        </form>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center py-5 text-muted">
                  No contacts found.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      @if(method_exists($contacts, 'links'))
        <div class="mt-3">
          {{ $contacts->withQueryString()->links() }}
        </div>
      @endif

    </div>
  </div>

</div>
@endsection
