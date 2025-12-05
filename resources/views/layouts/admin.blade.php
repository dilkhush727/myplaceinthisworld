{{-- resources/views/layouts/admin.blade.php --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>@yield('title', 'Dashboard') | {{ config('app.name') }}</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="description"
      content="Berry is trending dashboard template made using Bootstrap 5 design framework."
    />
    <meta
      name="keywords"
      content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel"
    />
    <meta name="author" content="codedthemes" />

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('assets/admin/images/favicon.svg') }}" type="image/x-icon" />

    {{-- Google Font --}}
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
          id="main-font-link" />

    {{-- Icon Fonts --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/fonts/phosphor/duotone/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/fonts/tabler-icons.min.css') }}" />
    <link rel="stylesheet href="{{ asset('assets/admin/fonts/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/fonts/material.css') }}" />

    {{-- Template CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style-preset.css') }}" />

    {{-- Page-specific styles --}}
    @stack('styles')
  </head>

  <body>
    {{-- Preloader (optional – keep or remove as you like) --}}
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>

    {{-- Sidebar --}}
    @include('includes.admin.sidebar')

    {{-- Header --}}
    @include('includes.admin.header')

    {{-- Main content wrapper --}}
    <div class="pc-container">
      <div class="pc-content">
        @yield('content')
      </div>
    </div>

    {{-- Footer --}}
    @include('includes.admin.footer')

    {{-- Core JS --}}
    <script src="{{ asset('assets/admin/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/icon/custom-font.js') }}"></script>
    <script src="{{ asset('assets/admin/js/script.js') }}"></script>
    <script src="{{ asset('assets/admin/js/theme.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/feather.min.js') }}"></script>

    <script>
      layout_change('light');
      font_change('Roboto');
      change_box_container('false');
      layout_caption_change('true');
      layout_rtl_change('false');
      preset_change('preset-1');
    </script>

    {{-- Page-specific JS --}}
    @stack('scripts')
  </body>
</html>
