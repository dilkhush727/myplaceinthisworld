{{-- resources/views/includes/admin/header.blade.php --}}
<header class="pc-header">
  <div class="header-wrapper">
    {{-- Mobile controls --}}
    <div class="me-auto pc-mob-drp">
      <ul class="list-unstyled">
        <li class="pc-h-item header-mobile-collapse">
          <a href="#" class="pc-head-link head-link-secondary ms-0" id="sidebar-hide">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="pc-h-item pc-sidebar-popup">
          <a href="#" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
      </ul>
    </div>

    <div class="ms-auto">
      <ul class="list-unstyled">
        {{-- User profile --}}
        <li class="dropdown pc-h-item header-user-profile">
          <a class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0"
             data-bs-toggle="dropdown"
             href="#"
             role="button"
             aria-haspopup="false"
             aria-expanded="false">
            <img src="{{ auth()->user()->profile_photo_url }}" alt="user-image" class="rounded-circle js-profile-avatar user-avtar" height="34px" />
            <span><i class="ti ti-settings"></i></span>
          </a>
          <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
            <div class="dropdown-header">
              <h4>
                {{-- You can use auth user here --}}
                <span class="small text-muted">{{ auth()->user()->name ?? 'Admin' }}</span>
              </h4>
              <p class="text-muted">{{ auth()->user()->designation ?? 'Admin' }}</p>
              <hr />
              <div class="profile-notification-scroll position-relative"
                   style="max-height: calc(100vh - 280px)">
                {{-- You can remove this "Buy" card --}}
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                  <i class="ti ti-settings"></i>
                  <span>Account Settings</span>
                </a>

                <a href="javascript:;" class="dropdown-item">
                  <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0 m-0">
                    @csrf
                    <button type="submit" class="btn p-0 m-0 text-start w-100">
                      <i class="ti ti-logout"></i>
                      <span>Logout</span>
                    </button>
                  </form>
                </a>
                
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</header>
