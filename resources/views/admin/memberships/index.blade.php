@extends('layouts.admin')

@section('title', t('admin.memberships.title','School Memberships'))

@section('content')
<div class="container-fluid py-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">
      {{ t('admin.memberships.title','School Memberships') }}
    </h1>
  </div>

  <div class="card">
    <div class="card-body">

      <div class="table-responsive">

        <table class="table align-middle">

          <thead>
            <tr>
              <th>{{ t('admin.memberships.school','School') }}</th>
              <th>{{ t('division.primary','Primary') }}</th>
              <th>{{ t('division.ji','Junior/Intermediate') }}</th>
              <th>{{ t('division.highschool','High School') }}</th>
              <th></th>
            </tr>
          </thead>

          <tbody>

            @forelse($schools as $school)

              @php
                $primary    = $school->memberships->where('type', 'primary')->sortByDesc('starts_at')->first();
                $ji         = $school->memberships->where('type', 'ji')->sortByDesc('starts_at')->first();
                $highschool = $school->memberships->where('type', 'highschool')->sortByDesc('starts_at')->first();

                $badge = function($m) {

                    if (!$m) {
                        return '<span class="badge bg-secondary">'.t('admin.memberships.none','None').'</span>';
                    }

                    if ($m->status === 'active') {
                        return '<span class="badge bg-success">'.t('admin.memberships.active','Active').'</span>';
                    }

                    if ($m->status === 'cancelled') {
                        return '<span class="badge bg-danger">'.t('admin.memberships.cancelled','Cancelled').'</span>';
                    }

                    if ($m->status === 'expired') {
                        return '<span class="badge bg-dark">'.t('admin.memberships.expired','Expired').'</span>';
                    }

                    return '<span class="badge bg-light text-muted">'.e($m->status).'</span>';
                };
              @endphp

              <tr>

                <td>
                  <div class="fw-semibold">
                    {{ $school->name }}
                  </div>

                  <div class="small text-muted">
                    {{ $school->email ?? '' }}
                  </div>
                </td>

                <td>{!! $badge($primary) !!}</td>

                <td>{!! $badge($ji) !!}</td>

                <td>{!! $badge($highschool) !!}</td>

                <td class="text-end">
                  <a href="{{ route('admin.memberships.show', $school->id) }}"
                     class="btn btn-sm btn-outline-primary">

                    {{ t('admin.memberships.view_manage','View / Manage') }}

                  </a>
                </td>

              </tr>

            @empty

              <tr>
                <td colspan="5" class="text-center text-muted">
                  {{ t('admin.memberships.no_schools','No schools found.') }}
                </td>
              </tr>

            @endforelse

          </tbody>

        </table>

      </div>

      <div class="mt-3">
        {{ $schools->links() }}
      </div>

    </div>
  </div>

</div>
@endsection