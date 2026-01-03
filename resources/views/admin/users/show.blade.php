@extends('layouts.admin')

@section('title', 'User Details')

@section('content')
@php
  $roleName = $user->getRoleNames()->first() ?? '—';
  $avatar = $user->profile_photo_url ?? asset('assets/admin/images/user/avatar-2.jpg');
  $social = is_array($user->social_links) ? $user->social_links : [];
@endphp

<div class="container-fluid">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h3 mb-1">User Details</h1>
      <div class="text-muted small">Full profile + school + memberships</div>
    </div>
    <a href="{{ route('admin.users.index') }}" class="btn btn-light">← Back</a>
  </div>

  <div class="row g-3">
    <div class="col-12 col-lg-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="d-flex align-items-center gap-3">
            <img src="{{ $avatar }}" class="rounded-circle border" style="width:84px;height:84px;object-fit:cover;" alt="avatar">
            <div>
              <div class="fw-semibold fs-5">{{ $user->name }}</div>
              <div class="text-muted">{{ $user->email }}</div>
              <div class="mt-1">
                <span class="badge bg-dark">{{ ucfirst($roleName) }}</span>
              </div>
            </div>
          </div>

          <hr>
            <div class="text-muted mt-2">
                {{ $user->bio ?: '—' }}
            </div>
          <hr>

          <div class="small text-muted mb-1">Phone</div>
          <div class="mb-2">{{ $user->phone ?? '—' }}</div>

          <div class="small text-muted mb-1">Address</div>
          <div class="mb-2">{{ $user->address ?? '—' }}</div>

          <div class="small text-muted mb-1">Designation</div>
          <div class="mb-2">{{ $user->designation ?? '—' }}</div>

          <div class="small text-muted mb-1">Level</div>
          <div class="mb-2">{{ $user->level ?? '—' }}</div>

          <div class="small text-muted mb-1">Joined</div>
          <div class="mb-0">{{ optional($user->created_at)->format('M d, Y') }}</div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-8">
      <div class="card shadow-sm mb-3">
        <div class="card-header"><h5 class="mb-0">School</h5></div>
        <div class="card-body">
          @if($user->school)
            <div class="fw-semibold">{{ $user->school->name }}</div>
            <div class="text-muted small">
              {{ $user->school->city ?? '' }} {{ $user->school->province ?? '' }}
            </div>
          @else
            <div class="text-muted">—</div>
          @endif
        </div>
      </div>

      <div class="card shadow-sm">
        <div class="card-header"><h5 class="mb-0">Active Memberships</h5></div>
        <div class="card-body">
          @if($user->school && $activeMemberships->count())
            <div class="d-flex flex-wrap gap-2">
              @foreach($activeMemberships as $m)
                <span class="badge bg-success">
                  {{ ucfirst($m->type) }}
                  @if($m->billing_period) • {{ $m->billing_period }} @endif
                  @if($m->is_free) • Free @endif
                </span>
              @endforeach
            </div>
          @else
            <div class="text-muted">No active membership.</div>
          @endif

          @if($user->school)
            <div class="mt-3">
              <a href="{{ route('admin.memberships.show', $user->school) }}" class="btn btn-sm btn-outline-primary">
                Manage Membership
              </a>
            </div>
          @endif
        </div>
      </div>

      <div class="card shadow-sm mt-3">
        <div class="card-header"><h5 class="mb-0">Social Links</h5></div>
        <div class="card-body">
          
            <div class="social-links mt-3">
                <div class="list-group list-group-flush">

                    @if(!empty($social))
                        @php
                            $icons = [
                                'linkedin'  => 'ti ti-brand-linkedin',
                                'github'    => 'ti ti-brand-github',
                                'website'   => 'ti ti-world',
                                'instagram' => 'ti ti-brand-instagram',
                                'facebook'  => 'ti ti-brand-facebook',
                                'twitter'   => 'ti ti-brand-twitter',
                                'x'         => 'ti ti-brand-twitter',
                            ];
                        @endphp

                        @foreach($social as $key => $url)
                            <a href="{{ $url }}" target="_blank" rel="noopener"
                            class="list-group-item p-2 list-group-item-action">
                            
                                <div class="d-flex align-items-center">

                                    <div class="flex-shrink-0">
                                        <i class="{{ $icons[$key] ?? 'ti ti-link' }} f-20"></i>
                                    </div>

                                    <div class="flex-grow-1 mx-3">
                                        <h5 class="m-0">{{ ucfirst($key) }}</h5>
                                    </div>

                                    <div class="flex-shrink-0 text-end" style="max-width: 180px;">
                                        <small class="text-muted text-truncate d-block"
                                            title="{{ $url }}">
                                            {{ $url }}
                                        </small>
                                    </div>

                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="text-muted p-2">—</div>
                    @endif

                </div>
            </div>

        </div>
      </div>

    </div>
  </div>

</div>
@endsection
