@extends('layouts.admin')

@section('title', 'Users')

@section('content')
<div class="container-fluid">

  <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h3 mb-1">Users</h1>
      <div class="text-muted small">Manage admin, school, and teacher accounts</div>
    </div>
  </div>

  <div class="card shadow-sm mb-3">
    <div class="card-body">
      <form method="GET" action="{{ route('admin.users.index') }}" class="row g-2 align-items-end">
        <div class="col-12 col-md-3">
          <label class="form-label">Role</label>
          <select name="role" class="form-select">
            <option value="all" {{ ($role ?? 'all') === 'all' ? 'selected' : '' }}>All</option>
            <option value="admin" {{ ($role ?? '') === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="school" {{ ($role ?? '') === 'school' ? 'selected' : '' }}>School</option>
            <option value="teacher" {{ ($role ?? '') === 'teacher' ? 'selected' : '' }}>Teacher</option>
          </select>
        </div>

        <div class="col-12 col-md-3">
          <label class="form-label">School (teachers only)</label>
          <select name="school_id" class="form-select" {{ ($role ?? '') !== 'teacher' ? 'disabled' : '' }}>
            <option value="">All schools</option>
            @foreach($schools as $s)
              <option value="{{ $s->id }}" {{ (string)$schoolId === (string)$s->id ? 'selected' : '' }}>
                {{ $s->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="col-12 col-md-4">
          <label class="form-label">Search</label>
          <input type="text" name="q" value="{{ $q }}" class="form-control" placeholder="Name or email...">
        </div>

        <div class="col-12 col-md-2 d-flex gap-2">
          <button class="btn btn-primary w-100" type="submit">Filter</button>
          <a class="btn btn-outline-secondary w-100" href="{{ route('admin.users.index') }}">Reset</a>
        </div>
      </form>
    </div>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th style="width:60px;">#</th>
              <th>User</th>
              <th style="width:140px;">Role</th>
              <th>School</th>
              <th style="width:160px;">Created</th>
              <th style="width:120px;" class="text-end">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse($users as $u)
              @php
                $roleName = $u->getRoleNames()->first() ?? '—';
                $roleKey = strtolower($roleName);
                $badge = match($roleKey) {
                  'admin' => 'bg-danger',
                  'school' => 'bg-primary',
                  'teacher' => 'bg-success',
                  default => 'bg-secondary',
                };
                $avatar = $u->profile_photo_url ?? asset('assets/admin/images/user/avatar-2.jpg');
              @endphp
              <tr>
                <td class="text-muted">{{ $u->id }}</td>
                <td>
                  <div class="d-flex align-items-center gap-2">
                    <img src="{{ $avatar }}" class="rounded-circle border" style="width:34px;height:34px;object-fit:cover;" alt="avatar">
                    <div>
                      <div class="fw-semibold">{{ $u->name }}</div>
                      <div class="text-muted small">{{ $u->email }}</div>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="badge {{ $badge }}">{{ ucfirst($roleName) }}</span>
                </td>
                <td>{{ $u->school?->name ?? '—' }}</td>
                <td class="text-muted">{{ optional($u->created_at)->format('M d, Y') }}</td>
                <td class="text-end">
                  <a href="{{ route('admin.users.show', $u) }}" class="btn btn-sm btn-outline-primary">View</a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center text-muted py-4">No users found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="mt-3">
        {{ $users->links() }}
      </div>
    </div>
  </div>

</div>

<script>
  // UX: if role changes to teacher, enable school dropdown; otherwise disable it
  document.addEventListener('DOMContentLoaded', function () {
    const roleSelect = document.querySelector('select[name="role"]');
    const schoolSelect = document.querySelector('select[name="school_id"]');

    if (roleSelect && schoolSelect) {
      roleSelect.addEventListener('change', function () {
        const isTeacher = roleSelect.value === 'teacher';
        schoolSelect.disabled = !isTeacher;
        if (!isTeacher) schoolSelect.value = '';
      });
    }
  });
</script>
@endsection
