<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ url(app()->getLocale()) }}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('assets/img/logo.png') }}" alt="My Place In This World">
        <!-- <h1 class="sitename">My Place In This World</h1> -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li>
            <a class="nav-link" href="{{ route('home', app()->getLocale()) }}">
              {{ t('nav.home', 'Home') }}
            </a>
          </li>

          <li>
            <a class="nav-link" href="{{ route('about', app()->getLocale()) }}">
              {{ t('nav.about', 'About Us') }}
            </a>
          </li>

          <li>
            <a class="nav-link" href="{{ route('membership', app()->getLocale()) }}">
              {{ t('nav.membership', 'Membership') }}
            </a>
          </li>

          <li>
            <a class="nav-link" href="{{ route('gallery.index', app()->getLocale()) }}">
              {{ t('nav.gallery', 'Gallery of Growth') }}
            </a>
          </li>

          <li>
            <a class="nav-link" href="{{ route('division.of.learning', app()->getLocale()) }}">
              {{ t('nav.divisions', 'Divisions of Learning') }}
            </a>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <ul class="auth-menu">
        @guest
            <li>
              <a class="nav-link" href="{{ route('login', app()->getLocale()) }}">
                {{ t('nav.login', 'Login') }}
              </a>
            </li>
        @endguest

        @auth
            <li>
                <a href="{{ route('dashboard', ['locale' => app()->getLocale()]) }}">
                    {{ t('nav.dashboard', 'Dashboard') }}
                </a>
            </li>
        @endauth
      </ul>

      @include('partials.lang-switcher')

    </div>
  </header>
  <div class="header-texture">
    <div class="textured-img"></div>
  </div>