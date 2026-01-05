@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">

  <div class="d-flex align-items-center justify-content-between mb-3">
    <h3 class="mb-0">Admin Dashboard</h3>

    <div class="d-flex gap-2">
      @if(Route::has('admin.schools.index'))
        <a href="{{ route('admin.schools.index') }}" class="btn btn-sm btn-outline-primary">Schools</a>
      @endif
      @if(Route::has('admin.memberships.index'))
        <a href="{{ route('admin.memberships.index') }}" class="btn btn-sm btn-outline-primary">Memberships</a>
      @endif
      @if(Route::has('admin.tickets.index'))
        <a href="{{ route('admin.tickets.index') }}" class="btn btn-sm btn-outline-primary">Tickets</a>
      @endif
    </div>
  </div>

  {{-- KPI CARDS --}}
  <div class="row g-3 mb-3">
    <div class="col-xl-3 col-md-6">
      <div class="card"><div class="card-body">
        <div class="text-muted">Schools</div>
        <div class="fs-2 fw-bold">{{ $totalSchools }}</div>
      </div></div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card"><div class="card-body">
        <div class="text-muted">Teachers</div>
        <div class="fs-2 fw-bold">{{ $totalTeachers }}</div>
      </div></div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card"><div class="card-body">
        <div class="text-muted">Active Memberships</div>
        <div class="fs-2 fw-bold">{{ $activeMembershipsCount }}</div>
        <div class="small text-muted">Expiring (30d): {{ $expiringMembershipsCount }}</div>
      </div></div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card"><div class="card-body">
        <div class="text-muted">Tickets</div>
        <div class="fs-2 fw-bold">{{ $totalTickets }}</div>
        <div class="small">
            <span class="badge bg-danger">No Admin Reply: {{ $ticketsNoAdminReplyCount }}</span>
        </div>
      </div></div>
    </div>

  </div>

  {{-- CHARTS --}}
  <div class="row g-3 mb-3">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header"><strong>Tickets (last 14 days)</strong></div>
        <div class="card-body">
          <div id="ticketsChart" style="height: 320px;"></div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card">
        <div class="card-header"><strong>Membership Status</strong></div>
        <div class="card-body">
          <div id="membershipChart" style="height: 320px;"></div>
        </div>
      </div>
    </div>
  </div>

  {{-- ROW: NO ADMIN REPLY + RECENT TICKETS --}}
  <div class="row g-3 mb-3">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
          <strong>Tickets with No Admin Reply</strong>
          @if(Route::has('admin.tickets.index'))
            <a href="{{ route('admin.tickets.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
          @endif
        </div>

        <div class="card-body p-0">
          @if($ticketsNoAdminReply->count())
            <div class="table-responsive">
              <table class="table mb-0 align-middle">
                <thead>
                  <tr>
                    <th>Ticket</th>
                    <th>User</th>
                    <th>Category</th>
                    <th>Created</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($ticketsNoAdminReply as $t)
                    <tr>
                      <td class="fw-semibold">{{ $t->ticket_number ?? ('#'.$t->id) }}</td>
                      <td>{{ $t->user_name ?? $t->email ?? '—' }}</td>
                      <td>{{ $t->category ?? '—' }}</td>
                      <td>{{ \Carbon\Carbon::parse($t->created_at)->diffForHumans() }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <div class="p-3 text-muted">No pending tickets 🎉</div>
          @endif
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
          <strong>Recent Tickets</strong>
          @if(Route::has('admin.tickets.index'))
            <a href="{{ route('admin.tickets.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
          @endif
        </div>

        <div class="card-body p-0">
          @if($recentTickets->count())
            <div class="table-responsive">
              <table class="table mb-0 align-middle">
                <thead>
                  <tr>
                    <th>Ticket</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Created</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($recentTickets as $t)
                    <tr>
                      <td class="fw-semibold">{{ $t->ticket_number ?? ('#'.$t->id) }}</td>
                      <td>{{ $t->category ?? '—' }}</td>
                      <td>
                        <span class="badge bg-{{ in_array($t->ticket_status, ['closed','resolved']) ? 'secondary' : 'warning' }}">
                          {{ $t->ticket_status ?? 'open' }}
                        </span>
                      </td>
                      <td>{{ optional($t->created_at)->diffForHumans() }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <div class="p-3 text-muted">No tickets found.</div>
          @endif
        </div>
      </div>
    </div>
  </div>

  {{-- ROW: MOST ACTIVE SCHOOLS + EXPIRING MEMBERSHIPS --}}
  <div class="row g-3 mb-3">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
          <strong>Most Active Schools (Last 30 Days)</strong>
          @if(Route::has('admin.schools.index'))
            <a href="{{ route('admin.schools.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
          @endif
        </div>

        <div class="card-body p-0">
          @if($mostActiveSchools->count())
            <div class="table-responsive">
              <table class="table mb-0 align-middle">
                <thead>
                  <tr>
                    <th>School</th>
                    <th class="text-center">Tickets</th>
                    <th class="text-center">Completions</th>
                    <th class="text-center">Score</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($mostActiveSchools as $s)
                    <tr>
                      <td class="fw-semibold">
                        {{ $s->name }}
                      </td>
                      <td class="text-center">{{ $s->tickets_30 }}</td>
                      <td class="text-center">{{ $s->completions_30 }}</td>
                      <td class="text-center fw-bold">{{ $s->activity_score }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <div class="p-3 text-muted">No activity data yet.</div>
          @endif
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
          <strong>Expiring Memberships (Next 30 Days)</strong>
          @if(Route::has('admin.memberships.index'))
            <a href="{{ route('admin.memberships.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
          @endif
        </div>

        <div class="card-body p-0">
          @if($expiringMemberships->count())
            <div class="table-responsive">
              <table class="table mb-0 align-middle">
                <thead>
                  <tr>
                    <th>School</th>
                    <th>Type</th>
                    <th>Ends At</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($expiringMemberships as $m)
                    <tr>
                      <td class="fw-semibold">{{ $m->school?->name ?? '—' }}</td>
                      <td>{{ $m->type ?? '—' }}</td>
                      <td>{{ optional($m->ends_at)->format('M d, Y') }}</td>
                      <td class="text-end">
                        @if(Route::has('admin.memberships.edit'))
                          <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.memberships.edit', $m->id) }}">Edit</a>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <div class="p-3 text-muted">No memberships expiring soon.</div>
          @endif
        </div>
      </div>
    </div>
  </div>

  {{-- DIVISION CONTENT --}}
  <div class="row g-3">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <strong>Division Content</strong>
          <div class="text-muted small">{{ __('labels.courses') }} / {{ __('labels.lessons') }} / {{ __('labels.tasks') }} grouped by division/type column (auto-detected)</div>
        </div>

        <div class="card-body">
          <div class="row g-3">
            @foreach($divisionStats as $d)
              <div class="col-xl-3 col-md-6">
                <div class="border rounded p-3 h-100">
                  <div class="fw-bold mb-2">{{ $d['division'] }}</div>
                  <div class="d-flex justify-content-between"><span class="text-muted">{{ __('labels.courses') }}</span><span class="fw-semibold">{{ $d['courses'] }}</span></div>
                  <div class="d-flex justify-content-between"><span class="text-muted">{{ __('labels.lessons') }}</span><span class="fw-semibold">{{ $d['lessons'] }}</span></div>
                  <div class="d-flex justify-content-between"><span class="text-muted">{{ __('labels.tasks') }}</span><span class="fw-semibold">{{ $d['tasks'] }}</span></div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
  const ticketLabels = @json($ticketLabels);
  const ticketCounts = @json($ticketCounts);

  const membershipLabels = @json($membershipLabels);
  const membershipCounts = @json($membershipCounts);

  new ApexCharts(document.querySelector("#ticketsChart"), {
    chart: { type: 'area', height: 320, toolbar: { show: false } },
    series: [{ name: 'Tickets', data: ticketCounts }],
    xaxis: { categories: ticketLabels },
    dataLabels: { enabled: false },
    stroke: { curve: 'smooth', width: 3 },
    grid: { strokeDashArray: 4 }
  }).render();

  new ApexCharts(document.querySelector("#membershipChart"), {
    chart: { type: 'donut', height: 320 },
    series: membershipCounts,
    labels: membershipLabels,
    legend: { position: 'bottom' }
  }).render();
</script>
@endpush
