{{-- resources/views/includes/admin/sidebar.blade.php --}}
@php
    /** @var \App\Models\User|null $user */
    $user = auth()->user();
@endphp

<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-headerOLD bg-dark text-center">
      <a href="{{ url('/') }}" class="b-brand text-primary">
        <img src="{{ asset('assets/img/logo.png') }}" alt="" width="190" class="logo img-fluid" />
      </a>
    </div>

    <div class="navbar-content">
      <ul class="pc-navbar">
        {{-- ========= ADMIN-ONLY ========= --}}
        @if($user && $user->hasRole('admin'))
        
        <li class="pc-item">
          <a href="{{ route('admin.dashboard') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>

        <li class="pc-item {{ request()->is('admin/galleries*') ? 'active' : '' }}">
            <a href="{{ route('admin.gallery.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-photo"></i></span>
                <span class="pc-mtext">Gallery of Growth</span>
            </a>
        </li>

        <li class="pc-item {{ request()->is('admin/courses*') ? 'active' : '' }}">
          <a href="{{ route('admin.courses.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-book"></i></span>
              <span class="pc-mtext">Divisions of Learning</span>
          </a>
        </li>

        <li class="pc-item {{ request()->is('admin/learning-progress*') ? 'active' : '' }}">
          <a href="{{ route('admin.learning-progress.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-chart-bar"></i></span>
            <span class="pc-mtext">Learning Progress</span>
          </a>
        </li>

        <li class="pc-item {{ request()->is('admin/users*') ? 'active' : '' }}">
          <a href="{{ route('admin.users.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-users"></i></span>
            <span class="pc-mtext">Manage Users</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="{{ route('admin.memberships.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-id"></i></span>
            <span class="pc-mtext">Memberships</span>
          </a>
        </li>

        <li class="pc-item pc-hasmenu">
          <a href="javascript:;" class="pc-link">
            <span class="pc-micon"><i class="ti ti-settings"></i></span>
            <span class="pc-mtext">Contacts</span>
            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
          </a>
          
          <ul class="pc-submenu">
            <li class="pc-item">
              <a href="{{ route('admin.contacts.index') }}" class="pc-link">
                <span class="pc-mtext">Contact Us</span>
              </a>
            </li>
            <li class="pc-item">
              <a href="{{ route('admin.tickets.index') }}" class="pc-link">
                <span class="pc-mtext">Tickets</span>
              </a>
            </li>
          </ul>
        </li>
        
        @endif

        {{-- ========= SCHOOL-ONLY ========= --}}
        @if($user && $user->hasRole('school'))
        
        <li class="pc-item">
          <a href="{{ route('school.dashboard') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>

        <li class="pc-item {{ request()->is('school/galleries*') ? 'active' : '' }}">
            <a href="{{ route('school.gallery.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-photo"></i></span>
                <span class="pc-mtext">Gallery of Growth</span>
            </a>
        </li>

        <li class="pc-item {{ request()->is('divisions*') ? 'active' : '' }}">
          <a href="{{ route('divisions.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-book"></i></span>
            <span class="pc-mtext">Divisions of Learning</span>
          </a>
        </li>

        <li class="pc-item {{ request()->is('school/learning-progress*') ? 'active' : '' }}">
          <a href="{{ route('school.learning-progress.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-chart-bar"></i></span>
            <span class="pc-mtext">Learning Progress</span>
          </a>
        </li>

        <li class="pc-item {{ request()->is('school/teachers*') ? 'active' : '' }}">
          <a href="{{ route('school.teachers.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-users"></i></span>
            <span class="pc-mtext">Teachers</span>
          </a>
        </li>

        <li class="pc-item pc-hasmenu">
          <a href="javascript:;" class="pc-link">
            <span class="pc-micon"><i class="ti ti-settings"></i></span>
            <span class="pc-mtext">Membership</span>
            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item"><a href="{{ route('school.memberships.manage') }}" class="pc-link">Manage</a></li>
            <li class="pc-item"><a href="{{ route('school.memberships.upgrade') }}" class="pc-link">Upgrade</a></li>
          </ul>
        </li>
        
        <li class="pc-item {{ request()->routeIs('school.tickets.*') ? 'active' : '' }}">
          <a href="{{ route('school.tickets.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-mail"></i></span>
            <span class="pc-mtext">Support Tickets</span>
          </a>
        </li>

        @endif

        {{-- ========= TEACHER-ONLY ========= --}}
        @if($user && $user->hasRole('teacher'))
        
        <li class="pc-item">
          <a href="{{ route('teacher.dashboard') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>

        <li class="pc-item {{ request()->is('teacher/galleries*') ? 'active' : '' }}">
            <a href="{{ route('teacher.gallery.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-photo"></i></span>
                <span class="pc-mtext">Gallery of Growth</span>
            </a>
        </li>

        <li class="pc-item {{ request()->is('divisions*') ? 'active' : '' }}">
          <a href="{{ route('divisions.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-book"></i></span>
            <span class="pc-mtext">Divisions of Learning</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="{{ route('teacher.learning-progress.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-book"></i></span>
            <span class="pc-mtext">My Learning</span>
          </a>
        </li>
        
        <li class="pc-item">
          <a href="{{ route('teacher.tickets.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-mail"></i></span>
            <span class="pc-mtext">Tickets</span>
          </a>
        </li>
        @endif

        {{-- ========= ADMIN + SCHOOL (example shared nav) ========= --}}
        @if($user && $user->hasAnyRole(['admin', 'school']))
          <!-- <li class="pc-item">
            <a href="#" class="pc-link">
              <span class="pc-micon"><i class="ti ti-report-analytics"></i></span>
              <span class="pc-mtext">Reports</span>
            </a>
          </li> -->
        @endif

        <li class="pc-item">
          <a href="javascript:;" class="pc-link"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span class="pc-micon"><i class="ti ti-logout"></i></span>
              <span class="pc-mtext">Logout</span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
      </li>

      </ul>

      <div class="w-100 text-center">
        <div class="badge theme-version badge rounded-pill bg-light text-dark f-12"></div>
      </div>
    </div>
  </div>
</nav>
