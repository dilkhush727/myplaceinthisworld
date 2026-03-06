@extends('layouts.admin')

@section('title', t('admin.users.title','Users'))

@section('content')
<div class="container-fluid">

  <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h3 mb-1">{{ t('admin.users.title','Users') }}</h1>
      <div class="text-muted small">
        {{ t('admin.users.subtitle','Manage admin, school, and teacher accounts') }}
      </div>
    </div>
  </div>

  <div class="card shadow-sm mb-3">
    <div class="card-body">

      <form method="GET" action="{{ route('admin.users.index') }}" class="row g-2 align-items-end">

        <div class="col-12 col-md-3">
          <label class="form-label">{{ t('admin.users.role','Role') }}</label>
          <select name="role" class="form-select">
            <option value="all" {{ ($role ?? 'all') === 'all' ? 'selected' : '' }}>
              {{ t('common.all','All') }}
            </option>

            <option value="admin" {{ ($role ?? '') === 'admin' ? 'selected' : '' }}>
              {{ t('roles.admin','Admin') }}
            </option>

            <option value="school" {{ ($role ?? '') === 'school' ? 'selected' : '' }}>
              {{ t('roles.school','School') }}
            </option>

            <option value="teacher" {{ ($role ?? '') === 'teacher' ? 'selected' : '' }}>
              {{ t('roles.teacher','Teacher') }}
            </option>
          </select>
        </div>


        <div class="col-12 col-md-3">
          <label class="form-label">
            {{ t('admin.users.school_teacher','School (teachers only)') }}
          </label>

          <select name="school_id" class="form-select" {{ ($role ?? '') !== 'teacher' ? 'disabled' : '' }}>
            <option value="">{{ t('admin.users.all_schools','All schools') }}</option>

            @foreach($schools as $s)
              <option value="{{ $s->id }}" {{ (string)$schoolId === (string)$s->id ? 'selected' : '' }}>
                {{ t('db.school.name.'.$s->id,$s->name) }}
              </option>
            @endforeach
          </select>
        </div>


        <div class="col-12 col-md-4">
          <label class="form-label">{{ t('common.search','Search') }}</label>

          <input type="text"
                 name="q"
                 value="{{ $q }}"
                 class="form-control"
                 placeholder="{{ t('admin.users.search_placeholder','Name or email...') }}">
        </div>


        <div class="col-12 col-md-2 d-flex gap-2">

          <button class="btn btn-primary w-100" type="submit">
            {{ t('common.filter','Filter') }}
          </button>

          <a class="btn btn-outline-secondary w-100" href="{{ route('admin.users.index') }}">
            {{ t('common.reset','Reset') }}
          </a>

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
              <th>{{ t('admin.users.user','User') }}</th>
              <th style="width:140px;">{{ t('admin.users.role','Role') }}</th>
              <th>{{ t('admin.users.school','School') }}</th>
              <th style="width:160px;">{{ t('admin.users.created','Created') }}</th>
              <th style="width:120px;" class="text-end">
                {{ t('common.action','Action') }}
              </th>
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

                    <img src="{{ $avatar }}"
                         class="rounded-circle border"
                         style="width:34px;height:34px;object-fit:cover;"
                         alt="avatar">

                    <div>
                      <div class="fw-semibold">{{ $u->name }}</div>
                      <div class="text-muted small">{{ $u->email }}</div>
                    </div>

                  </div>
                </td>


                <td>
                  <span class="badge {{ $badge }}">
                    {{ t('roles.'.$roleKey, ucfirst($roleName)) }}
                  </span>
                </td>


                <td>{{ $u->school?->name ?? '—' }}</td>


                <td class="text-muted">
                  {{ $u->created_at->format('Y-m-d H:i') }}
                </td>


                <td class="text-end">

                  <a href="{{ route('admin.users.show', $u) }}"
                     class="btn btn-sm btn-outline-primary">

                    {{ t('common.view','View') }}

                  </a>

                </td>

              </tr>

            @empty

              <tr>
                <td colspan="6" class="text-center text-muted py-4">
                  {{ t('admin.users.empty','No users found.') }}
                </td>
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