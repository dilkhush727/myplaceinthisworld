{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.auth')

@section('title', t('auth.login.page_title', 'Login'))

@section('content')

  <h1 class="auth-title">
    {{ t('auth.login.heading', 'Good to see you again!') }}
  </h1>

  <p class="auth-subtitle">
    {{ t('auth.login.subtitle', 'Unlock a world of education with a single click!') }}
  </p>

  @if (session('status'))
    <div class="alert alert-success mb-3">{{ session('status') }}</div>
  @endif

  <form method="POST" action="{{ route('login') }}">
    @csrf

    {{-- Email --}}
    <div class="mb-3">
      <label for="email" class="form-label fw-semibold">
        {{ t('auth.login.email_label', 'Email Address') }}
      </label>

      <div class="input-icon">
        <input id="email"
               type="email"
               name="email"
               value="{{ old('email') }}"
               required
               autofocus
               autocomplete="username"
               class="form-control auth-input @error('email') is-invalid @enderror"
               placeholder="{{ t('auth.login.email_placeholder', 'name@example.com') }}">

        @error('email')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    {{-- Password --}}
    <div class="mb-2">
      <label for="password" class="form-label fw-semibold">
        {{ t('auth.login.password_label', 'Password') }}
      </label>

      <div class="input-icon">
        <input id="password"
               type="password"
               name="password"
               required
               autocomplete="current-password"
               class="form-control auth-input @error('password') is-invalid @enderror"
               placeholder="{{ t('auth.login.password_placeholder', '••••••••') }}">

        @error('password')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
        <label class="form-check-label" for="remember_me">
          {{ t('auth.login.remember_me', 'Remember me') }}
        </label>
      </div>

      @if (Route::has('password.request'))
        <a class="auth-link" href="{{ route('password.request') }}">
          {{ t('auth.login.forgot_password', 'Forgot Password?') }}
        </a>
      @endif
    </div>

    <button type="submit" class="btn btn-auth w-100">
      {{ t('auth.login.button', 'Login') }}
    </button>

    <div class="signup-line">
      {{ t('auth.login.no_account', "Don't have an account?") }}
      <a href="{{ route('register') }}">
        {{ t('auth.login.signup', 'Sign Up For Free') }}
      </a>
    </div>

  </form>

@endsection