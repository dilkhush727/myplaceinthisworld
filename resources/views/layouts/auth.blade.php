{{-- resources/views/layouts/auth.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Auth') - My Place In This World</title>

    <link rel="icon" href="{{ asset('favicon.png') }}">

  {{-- Bootstrap + your theme css --}}
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <style>
    body { background:#f6f7fb; }

    .auth-shell{
      min-height: 100vh;
      display: flex;
      align-items: center;
      padding: 24px;
      background: linear-gradient(#d0000096, #d0000096), url(assets/img/texture2.png);
      background-size: contain;
      background-position: center;
    }

    .auth-card{
      width:100%;
      max-width:1200px;
      margin:0 auto;
      border-radius:26px;
      overflow:hidden;
      box-shadow:0 18px 45px rgba(0,0,0,.10);
      background:#fff;
      /* background-image: url(assets/img/hand-prints.svg); */
    }

    .auth-left{
      position:relative;
      min-height:520px;
      background:#fff;
      text-align: center
    }

    .auth-left img{
      width:50%;
      height:100%;
      object-fit:contain;
    }

    /* subtle gold lines bottom-left */
    .auth-left::after{
      content:"";
      position:absolute;
      left:-60px;
      bottom:-60px;
      width:320px;
      height:320px;
      background:
        repeating-linear-gradient(
          135deg,
          rgba(245,166,35,.25) 0,
          rgba(245,166,35,.25) 2px,
          transparent 2px,
          transparent 10px
        );
      border-radius:50%;
      filter: blur(.2px);
      pointer-events:none;
      opacity:.55;
    }

    .auth-right{
      padding:42px 46px;
      position:relative;
      background:#ffffff85;
    }
    .auth-right .hand-img{
      position: absolute;
      bottom: 0;
      right: 0;
      width: 150px;
      opacity: 0.5;
      top: 0;
    }

    .auth-navlink{
    font-size:.9rem;
    font-weight:600;
    color:#0f172a;
    text-decoration:none;
    padding:8px 10px;
    border-radius:999px;
    background:#e8eff7;
    }

    .auth-navlink:hover{
    background:#d6e2f0;
    text-decoration:none;
    }

    .brand-row{
      display:flex;
      align-items:center;
      gap:12px;
      margin:10px;
    }

    .brand-badge{
      width: 180px;
    }

    .auth-title{
      font-size:2rem;
      font-weight:800;
      margin:10px 0 6px;
      color:#CC2028;
    }

    .auth-subtitle{
      color:#6b7280;
      margin-bottom:26px;
    }

    .form-control.auth-input{
      height:48px;
      border-radius:12px;
      border:1px solid #e5e7eb;
      padding-left:14px;
      padding-right:44px;
      font-size:.95rem;
      border-color: #000 !important;
      box-shadow: none !important;
    }

    .input-icon{
      position:relative;
    }

    .auth-link{
      color:#2563eb;
      text-decoration:none;
      font-weight:600;
      font-size:.9rem;
    }
    .auth-link:hover{ text-decoration:underline; }

    .btn-auth{
      height:48px;
      border-radius:12px;
      font-weight:700;
      border:none;
      background:#f6c744; /* yellow */
      color:#111;
    }
    .btn-auth:hover{ filter:brightness(.97); }

    .signup-line{
      margin-top:18px;
      color:#6b7280;
      text-align:center;
    }

    .signup-line a{
      color:#111;
      text-decoration:none;
      font-weight:800;
      position:relative;
      padding-bottom:2px;
    }
    .signup-line a::after{
      content:"";
      position:absolute;
      left:0;
      right:0;
      bottom:-2px;
      height:6px;
      background:rgba(0,0,0,.12);
      border-radius:10px;
      transform:skewX(-12deg);
      z-index:-1;
    }

    @media (max-width: 991.98px){
      .auth-right{ padding:32px 26px; }
      .auth-left{ min-height:260px; }
      .auth-left::after{ display:none; }
      .auth-title{ font-size:1.6rem; }
    }
  </style>

  @stack('styles')
</head>
<body>

  <div class="auth-shell">
    <div class="auth-card">
      
    <header>
          {{-- Logo / brand --}}
      <div class="brand-row">
        <div class="brand-badge">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo-light.png') }}" class="img-fluid" alt="Logo">
            </a>
        </div>
      </div>
    </header>

      <div class="row g-0">
        {{-- LEFT IMAGE --}}
        <div class="col-lg-6 d-none d-lg-block auth-left">
          {{-- change this image path to your own --}}
          <img src="{{ asset('assets/img/login-image.png') }}" class="img-fluid" alt="Auth side image">
        </div>

        {{-- RIGHT FORM --}}
        <div class="col-lg-6 auth-right">

          @yield('content')
          
          <img src="{{ asset('assets/img/hand-1.png') }}" alt="Hand prints" class="img-fluid hand-img">
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  @stack('scripts')

  @once
    @include('partials.translate-scripts')
  @endonce

</body>
</html>
