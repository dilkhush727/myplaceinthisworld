<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png" alt="My Place In This World">
        <!-- <h1 class="sitename">My Place In This World</h1> -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}" class="active">Home</a></li>
          <li><a href="{{ route('about') }}">About Us</a></li>
          <li><a href="{{ route(name: 'membership') }}">Membership</a></li>
          <li><a href="{{ route('gallery.index') }}">Gallery of Growth</a></li>
          <li><a href="javascript:;">Division of Learning</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <ul class="auth-menu">
        <li>
            <a href="{{ route(name: 'login') }}">Sign In</a>
        </li>
      </ul>

    </div>
  </header>
  <div class="header-texture">
    <div class="textured-img"></div>
  </div>