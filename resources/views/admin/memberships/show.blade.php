@extends('layouts.admin')

@section('title', 'Memberships – ' . $school->name)

@section('content')
<div class="container-fluid py-4">

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h4 mb-1">Memberships</h1>
      <p class="text-muted mb-0">
        School: <strong>{{ $school->name }}</strong>
      </p>
    </div>

    <a href="{{ route('admin.memberships.index') }}" class="btn btn-outline-secondary btn-sm">
      &larr; Back to all schools
    </a>
  </div>

  {{-- Current / past memberships --}}
  <div class="card mb-4">
    <div class="card-header fw-semibold">
      Membership History
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-middle">
          <thead>
            <tr>
              <th>Type</th>
              <th>Billing</th>
              <th>Status</th>
              <th>Starts At</th>
              <th>Ends At</th>
              <th class="text-end">Admin Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($school->memberships as $m)
              <tr>
                <td class="text-capitalize">{{ $m->type }}</td>
                <td>
                  @if($m->is_free)
                    <span class="badge bg-success">Free</span>
                  @else
                    <span class="badge bg-light text-dark text-capitalize">
                      {{ $m->billing_period }}
                    </span>
                  @endif
                </td>
                <td>
                  @if($m->status === 'active')
                    <span class="badge bg-success">Active</span>
                  @elseif($m->status === 'cancelled')
                    <span class="badge bg-danger">Cancelled</span>
                  @elseif($m->status === 'expired')
                    <span class="badge bg-dark">Expired</span>
                  @else
                    <span class="badge bg-light text-muted">{{ $m->status }}</span>
                  @endif
                </td>
                <td>{{ $m->starts_at ? $m->starts_at->format('M d, Y') : '—' }}</td>
                <td>{{ $m->ends_at ? $m->ends_at->format('M d, Y') : '—' }}</td>
                <td class="text-end">

                  {{-- Status buttons --}}
                  <form method="POST" action="{{ route('admin.memberships.updateStatus', $m->id) }}"
                        class="d-inline">
                    @csrf
                    <input type="hidden" name="status" value="active">
                    <button class="btn btn-sm btn-outline-success"
                            {{ $m->status === 'active' ? 'disabled' : '' }}>
                      Mark Active
                    </button>
                  </form>

                  <form method="POST" action="{{ route('admin.memberships.updateStatus', $m->id) }}"
                        class="d-inline">
                    @csrf
                    <input type="hidden" name="status" value="expired">
                    <button class="btn btn-sm btn-outline-dark"
                            {{ $m->status === 'expired' ? 'disabled' : '' }}>
                      Mark Expired
                    </button>
                  </form>

                  <form method="POST" action="{{ route('admin.memberships.updateStatus', $m->id) }}"
                        class="d-inline">
                    @csrf
                    <input type="hidden" name="status" value="cancelled">
                    <button class="btn btn-sm btn-outline-danger"
                            {{ $m->status === 'cancelled' ? 'disabled' : '' }}>
                      Cancel
                    </button>
                  </form>

                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center text-muted">
                  No memberships found for this school.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- Grant new membership --}}
  <div class="card">
    <div class="card-header fw-semibold">
      Grant / Extend Membership
    </div>
    <div class="card-body">
      <p class="text-muted small">
        Use this form to grant a new Primary / JI / High School membership or extend an existing one.
        For pilot schools, mark it as free.
      </p>

      <form method="POST" action="{{ route('admin.memberships.grant', $school->id) }}" class="row g-3 align-items-end">
        @csrf

        <div class="col-md-3">
          <label class="form-label">Type</label>
          <select name="type" class="form-select" required>
            <option value="primary">Primary</option>
            <option value="ji">Junior/Intermediate</option>
            <option value="highschool">High School</option>
          </select>
        </div>

        <div class="col-md-3">
          <label class="form-label">Billing Period</label>
          <select name="billing_period" class="form-select" required>
            <option value="monthly">Monthly</option>
            <option value="annual">Annual</option>
            <option value="free">Free (no end date)</option>
          </select>
        </div>

        <div class="col-md-3">
          <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" value="1" id="is_free" name="is_free">
            <label class="form-check-label" for="is_free">
              Mark as free / pilot
            </label>
          </div>
        </div>

        <div class="col-md-3 text-end">
          <button type="submit" class="btn btn-primary">
            Grant Membership
          </button>
        </div>
      </form>
    </div>
  </div>

</div>
@endsection
