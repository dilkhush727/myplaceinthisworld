@extends('layouts.admin')

@section('title', t('admin.dashboard.title', 'Admin Dashboard'))

@section('content')
<div class="container-fluid">

  <div class="d-flex align-items-center justify-content-between mb-3">
    <h3 class="mb-0">{{ t('admin.dashboard.heading', 'Admin Dashboard') }}</h3>

    <div class="d-flex gap-2">
      @if(Route::has('admin.schools.index'))
        <a href="{{ route('admin.schools.index') }}" class="btn btn-sm btn-outline-primary">{{ t('admin.dashboard.schools', 'Schools') }}</a>
      @endif
      @if(Route::has('admin.memberships.index'))
        <a href="{{ route('admin.memberships.index') }}" class="btn btn-sm btn-outline-primary">{{ t('admin.dashboard.memberships', 'Memberships') }}</a>
      @endif
      @if(Route::has('admin.tickets.index'))
        <a href="{{ route('admin.tickets.index') }}" class="btn btn-sm btn-outline-primary">{{ t('admin.dashboard.tickets', 'Tickets') }}</a>
      @endif
    </div>
  </div>

  {{-- KPI CARDS --}}
  <div class="row g-3 mb-3">
    <div class="col-xl-3 col-md-6">
      <div class="card"><div class="card-body">
        <div class="text-muted">{{ t('admin.dashboard.kpi_schools', 'Schools') }}</div>
        <div class="fs-2 fw-bold">{{ $totalSchools }}</div>
      </div></div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card"><div class="card-body">
        <div class="text-muted">{{ t('admin.dashboard.kpi_teachers', 'Teachers') }}</div>
        <div class="fs-2 fw-bold">{{ $totalTeachers }}</div>
      </div></div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card"><div class="card-body">
        <div class="text-muted">{{ t('admin.dashboard.kpi_active_memberships', 'Active Memberships') }}</div>
        <div class="fs-2 fw-bold">{{ $activeMembershipsCount }}</div>
        <div class="small text-muted">{{ t('admin.dashboard.kpi_expiring', 'Expiring (30d):') }} {{ $expiringMembershipsCount }}</div>
      </div></div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card"><div class="card-body">
        <div class="text-muted">{{ t('admin.dashboard.kpi_tickets', 'Tickets') }}</div>
        <div class="fs-2 fw-bold">{{ $totalTickets }}</div>
        <div class="small">
            <span class="badge bg-danger">{{ t('admin.dashboard.no_admin_reply', 'No Admin Reply:') }} {{ $ticketsNoAdminReplyCount }}</span>
        </div>
      </div></div>
    </div>

  </div>

  {{-- CHARTS --}}
  <div class="row g-3 mb-3">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header"><strong>{{ t('admin.dashboard.tickets_last_14', 'Tickets (last 14 days)') }}</strong></div>
        <div class="card-body">
          <div id="ticketsChart" style="height: 320px;"></div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card">
        <div class="card-header"><strong>{{ t('admin.dashboard.membership_status', 'Membership Status') }}</strong></div>
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
          <strong>{{ t('admin.dashboard.no_admin_reply_title', 'Tickets with No Admin Reply') }}</strong>
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
                    <th>{{ t('admin.tickets.table.ticket', 'Ticket') }}</th>
                    <th>{{ t('admin.tickets.table.user', 'User') }}</th>
                    <th>{{ t('admin.tickets.table.category', 'Category') }}</th>
                    <th>{{ t('admin.tickets.table.created', 'Created') }}</th>
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
            <div class="p-3 text-muted">{{ t('admin.dashboard.no_pending', 'No pending tickets') }}</div>
          @endif
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
          <strong>{{ t('admin.dashboard.recent_tickets', 'Recent Tickets') }}</strong>
          @if(Route::has('admin.tickets.index'))
            <a href="{{ route('admin.tickets.index') }}" class="btn btn-sm btn-outline-secondary">{{ t('admin.dashboard.view_all', 'View All') }}</a>
          @endif
        </div>

        <div class="card-body p-0">
          @if($recentTickets->count())
            <div class="table-responsive">
              <table class="table mb-0 align-middle">
                <thead>
                  <tr>
                    <th>{{ t('admin.tickets.table.ticket', 'Ticket') }}</th>
                    <th>{{ t('admin.tickets.table.category', 'Category') }}</th>
                    <th>{{ t('admin.tickets.table.status', 'Status') }}</th>
                    <th>{{ t('admin.tickets.table.created', 'Created') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($recentTickets as $t)
                    <tr>
                      <td class="fw-semibold">
                        {{ $t->ticket_number ?? ('#'.$t->id) }}
                      </td>

                      <td>
                        {{ $t->category ?? t('admin.common.na', '—') }}
                      </td>

                      <td>
                        <span class="badge bg-{{ in_array($t->ticket_status, ['closed','resolved']) ? 'secondary' : 'warning' }}">
                          {{ $t->ticket_status ?? t('admin.tickets.status.open', 'open') }}
                        </span>
                      </td>

                      <td>
                        {{ optional($t->created_at)->diffForHumans() }}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <div class="p-3 text-muted">
              {{ t('admin.tickets.none_found', 'No tickets found.') }}
            </div>
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
        <strong>
          {{ t('admin.dashboard.most_active_schools', 'Most Active Schools (Last 30 Days)') }}
        </strong>

        @if(Route::has('admin.schools.index'))
          <a href="{{ route('admin.schools.index') }}" class="btn btn-sm btn-outline-secondary">
            {{ t('admin.common.view_all', 'View All') }}
          </a>
        @endif
      </div>

      <div class="card-body p-0">
        @if($mostActiveSchools->count())
          <div class="table-responsive">
            <table class="table mb-0 align-middle">
              <thead>
                <tr>
                  <th>{{ t('admin.common.school', 'School') }}</th>
                  <th class="text-center">{{ t('admin.common.tickets', 'Tickets') }}</th>
                  <th class="text-center">{{ t('admin.common.completions', 'Completions') }}</th>
                  <th class="text-center">{{ t('admin.common.score', 'Score') }}</th>
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
          <div class="p-3 text-muted">
            {{ t('admin.dashboard.no_activity_data', 'No activity data yet.') }}
          </div>
        @endif
      </div>
    </div>
  </div>


  <div class="col-lg-6">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <strong>
          {{ t('admin.dashboard.expiring_memberships', 'Expiring Memberships (Next 30 Days)') }}
        </strong>

        @if(Route::has('admin.memberships.index'))
          <a href="{{ route('admin.memberships.index') }}" class="btn btn-sm btn-outline-secondary">
            {{ t('admin.common.view_all', 'View All') }}
          </a>
        @endif
      </div>

      <div class="card-body p-0">
        @if($expiringMemberships->count())
          <div class="table-responsive">
            <table class="table mb-0 align-middle">
              <thead>
                <tr>
                  <th>{{ t('admin.common.school', 'School') }}</th>
                  <th>{{ t('admin.common.type', 'Type') }}</th>
                  <th>{{ t('admin.common.ends_at', 'Ends At') }}</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($expiringMemberships as $m)
                  <tr>
                    <td class="fw-semibold">
                      {{ $m->school?->name ?? t('admin.common.na', '—') }}
                    </td>
                    <td>
                      {{ $m->type ?? t('admin.common.na', '—') }}
                    </td>
                    <td>
                      {{ optional($m->ends_at)->format('M d, Y') }}
                    </td>
                    <td class="text-end">
                      @if(Route::has('admin.memberships.edit'))
                        <a class="btn btn-sm btn-outline-primary"
                           href="{{ route('admin.memberships.edit', $m->id) }}">
                          {{ t('admin.common.edit', 'Edit') }}
                        </a>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <div class="p-3 text-muted">
            {{ t('admin.dashboard.no_expiring_memberships', 'No memberships expiring soon.') }}
          </div>
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
        <strong>
          {{ t('admin.dashboard.division_content', 'Division Content') }}
        </strong>

        <div class="text-muted small">
          {{ __('labels.courses') }} /
          {{ __('labels.lessons') }} /
          {{ __('labels.tasks') }}
          {{ t('admin.dashboard.grouped_by_division', 'grouped by division/type column (auto-detected)') }}
        </div>
      </div>

      <div class="card-body">
        <div class="row g-3">
          @foreach($divisionStats as $d)
            <div class="col-xl-3 col-md-6">
              <div class="border rounded p-3 h-100">
                <div class="fw-bold mb-2">
                  {{ t('divisions.' . strtolower($d['division']), $d['division']) }}
                </div>

                <div class="d-flex justify-content-between">
                  <span class="text-muted">{{ __('labels.courses') }}</span>
                  <span class="fw-semibold">{{ $d['courses'] }}</span>
                </div>

                <div class="d-flex justify-content-between">
                  <span class="text-muted">{{ __('labels.lessons') }}</span>
                  <span class="fw-semibold">{{ $d['lessons'] }}</span>
                </div>

                <div class="d-flex justify-content-between">
                  <span class="text-muted">{{ __('labels.tasks') }}</span>
                  <span class="fw-semibold">{{ $d['tasks'] }}</span>
                </div>

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
