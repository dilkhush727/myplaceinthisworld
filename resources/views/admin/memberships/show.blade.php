@extends('layouts.admin')

@section('title', t('admin.memberships.title','Memberships') . ' – ' . t('db.school.name.'.$school->id,$school->name))

@section('content')
<div class="container-fluid py-4">

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h4 mb-1">
        {{ t('admin.memberships.title','Memberships') }}
      </h1>

      <p class="text-muted mb-0">
        {{ t('admin.memberships.school','School') }}:
        <strong>{{ $school->name }}</strong>
      </p>
    </div>

    <a href="{{ route('admin.memberships.index') }}" class="btn btn-outline-secondary btn-sm">
      &larr; {{ t('admin.memberships.back_all','Back to all schools') }}
    </a>
  </div>


  {{-- Membership History --}}
  <div class="card mb-4">
    <div class="card-header fw-semibold">
      {{ t('admin.memberships.history','Membership History') }}
    </div>

    <div class="card-body">

      <div class="table-responsive">

        <table class="table align-middle">

          <thead>
            <tr>
              <th>{{ t('admin.memberships.type','Type') }}</th>
              <th>{{ t('admin.memberships.billing','Billing') }}</th>
              <th>{{ t('admin.memberships.status','Status') }}</th>
              <th>{{ t('admin.memberships.starts','Starts At') }}</th>
              <th>{{ t('admin.memberships.ends','Ends At') }}</th>
              <th class="text-end">{{ t('admin.memberships.actions','Admin Actions') }}</th>
            </tr>
          </thead>

          <tbody>

            @forelse($school->memberships as $m)

              <tr>

                <td class="text-capitalize">
                  {{ t('division.'.$m->type, $m->type) }}
                </td>

                <td>
                  @if($m->is_free)
                    <span class="badge bg-success">
                      {{ t('admin.memberships.free','Free') }}
                    </span>
                  @else
                    <span class="badge bg-light text-dark text-capitalize">
                      {{ t('billing.'.$m->billing_period,$m->billing_period) }}
                    </span>
                  @endif
                </td>

                <td>
                  @if($m->status === 'active')
                    <span class="badge bg-success">{{ t('admin.memberships.active','Active') }}</span>

                  @elseif($m->status === 'cancelled')
                    <span class="badge bg-danger">{{ t('admin.memberships.cancelled','Cancelled') }}</span>

                  @elseif($m->status === 'expired')
                    <span class="badge bg-dark">{{ t('admin.memberships.expired','Expired') }}</span>

                  @else
                    <span class="badge bg-light text-muted">
                      {{ $m->status }}
                    </span>
                  @endif
                </td>

                <td>
                  {{ $m->starts_at ? $m->starts_at->format('M d, Y') : '—' }}
                </td>

                <td>
                  {{ $m->ends_at ? $m->ends_at->format('M d, Y') : '—' }}
                </td>

                <td class="text-end">

                  {{-- Mark Active --}}
                  <form method="POST"
                        action="{{ route('admin.memberships.updateStatus', $m->id) }}"
                        class="d-inline">
                    @csrf
                    <input type="hidden" name="status" value="active">

                    <button class="btn btn-sm btn-outline-success"
                            {{ $m->status === 'active' ? 'disabled' : '' }}>
                      {{ t('admin.memberships.mark_active','Mark Active') }}
                    </button>
                  </form>


                  {{-- Mark Expired --}}
                  <form method="POST"
                        action="{{ route('admin.memberships.updateStatus', $m->id) }}"
                        class="d-inline">
                    @csrf
                    <input type="hidden" name="status" value="expired">

                    <button class="btn btn-sm btn-outline-dark"
                            {{ $m->status === 'expired' ? 'disabled' : '' }}>
                      {{ t('admin.memberships.mark_expired','Mark Expired') }}
                    </button>
                  </form>


                  {{-- Cancel --}}
                  <form method="POST"
                        action="{{ route('admin.memberships.updateStatus', $m->id) }}"
                        class="d-inline">
                    @csrf
                    <input type="hidden" name="status" value="cancelled">

                    <button class="btn btn-sm btn-outline-danger"
                            {{ $m->status === 'cancelled' ? 'disabled' : '' }}>
                      {{ t('admin.memberships.cancel','Cancel') }}
                    </button>
                  </form>

                </td>

              </tr>

            @empty

              <tr>
                <td colspan="6" class="text-center text-muted">
                  {{ t('admin.memberships.none_school','No memberships found for this school.') }}
                </td>
              </tr>

            @endforelse

          </tbody>

        </table>

      </div>

    </div>
  </div>


  {{-- Grant Membership --}}
  <div class="card">

    <div class="card-header fw-semibold">
      {{ t('admin.memberships.grant_extend','Grant / Extend Membership') }}
    </div>

    <div class="card-body">

      <p class="text-muted small">
        {{ t('admin.memberships.grant_help','Use this form to grant a new Primary / JI / High School membership or extend an existing one. For pilot schools, mark it as free.') }}
      </p>

      <form method="POST"
            action="{{ route('admin.memberships.grant', $school->id) }}"
            class="row g-3 align-items-end">

        @csrf

        <div class="col-md-3">

          <label class="form-label">
            {{ t('admin.memberships.type','Type') }}
          </label>

          <select name="type" class="form-select" required>
            <option value="primary">{{ t('division.primary','Primary') }}</option>
            <option value="ji">{{ t('division.ji','Junior/Intermediate') }}</option>
            <option value="highschool">{{ t('division.highschool','High School') }}</option>
          </select>

        </div>


        <div class="col-md-3">

          <label class="form-label">
            {{ t('admin.memberships.billing','Billing Period') }}
          </label>

          <select name="billing_period" class="form-select" required>
            <option value="monthly">{{ t('billing.monthly','Monthly') }}</option>
            <option value="annual">{{ t('billing.annual','Annual') }}</option>
            <option value="free">{{ t('admin.memberships.free_no_end','Free (no end date)') }}</option>
          </select>

        </div>


        <div class="col-md-3">

          <div class="form-check mt-4">
            <input class="form-check-input"
                   type="checkbox"
                   value="1"
                   id="is_free"
                   name="is_free">

            <label class="form-check-label" for="is_free">
              {{ t('admin.memberships.mark_free','Mark as free / pilot') }}
            </label>
          </div>

        </div>


        <div class="col-md-3 text-end">

          <button type="submit" class="btn btn-primary">
            {{ t('admin.memberships.grant','Grant Membership') }}
          </button>

        </div>

      </form>

    </div>

  </div>

</div>
@endsection