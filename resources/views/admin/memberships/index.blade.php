@extends('layouts.admin')

@section('title', 'School Memberships')

@section('content')
<div class="container-fluid py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">School Memberships</h1>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-middle">
          <thead>
            <tr>
              <th>School</th>
              <th>Primary</th>
              <th>Junior/Intermediate</th>
              <th>High School</th>
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
                        return '<span class="badge bg-secondary">None</span>';
                    }
                    if ($m->status === 'active') {
                        return '<span class="badge bg-success">Active</span>';
                    }
                    if ($m->status === 'cancelled') {
                        return '<span class="badge bg-danger">Cancelled</span>';
                    }
                    if ($m->status === 'expired') {
                        return '<span class="badge bg-dark">Expired</span>';
                    }
                    return '<span class="badge bg-light text-muted">'.e($m->status).'</span>';
                };
              @endphp

              <tr>
                <td>
                  <div class="fw-semibold">{{ $school->name }}</div>
                  <div class="small text-muted">{{ $school->email ?? '' }}</div>
                </td>
                <td>{!! $badge($primary) !!}</td>
                <td>{!! $badge($ji) !!}</td>
                <td>{!! $badge($highschool) !!}</td>
                <td class="text-end">
                  <a href="{{ route('admin.memberships.show', $school->id) }}" class="btn btn-sm btn-outline-primary">
                    View / Manage
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center text-muted">
                  No schools found.
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
