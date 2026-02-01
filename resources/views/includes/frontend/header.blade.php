<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png" alt="My Place In This World">
        <!-- <h1 class="sitename">My Place In This World</h1> -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <!-- <li><a href="{{ url('/') }}" class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">Home</a></li> -->
          <li><a href="{{ route('about') }}" class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">About Us</a></li>
          <li><a href="{{ route('membership') }}" class="{{ Route::currentRouteName() == 'membership' ? 'active' : '' }}">Membership</a></li>
          <li><a href="{{ route('gallery.index') }}" class="{{ Route::currentRouteName() == 'gallery.index' ? 'active' : '' }}">Gallery of Growth</a></li>
          <li><a href="{{ route('division.of.learning') }}" class="{{ Route::currentRouteName() == 'division.of.learning' ? 'active' : '' }}">Divisions of Learning</a></li>
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <ul class="auth-menu">
        @guest
            <li>
                <a href="{{ route('login') }}">Login</a>
            </li>
        @endguest

        @auth
            <li>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
        @endauth
      </ul>

      @include('partials.lang-switcher')

    </div>
  </header>
  <div class="header-texture">
    <div class="textured-img"></div>
  </div>