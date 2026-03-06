{{-- resources/views/auth/reset-password.blade.php --}}
@extends('layouts.auth')

@section('title', t('auth.reset.page_title', 'Reset Password'))

@section('content')

  <h1 class="auth-title">
    {{ t('auth.reset.heading', 'Reset your password') }}
  </h1>

  <p class="auth-subtitle">
    {{ t('auth.reset.subtitle', 'Create a new password for your account.') }}
  </p>

  <form method="POST" action="{{ route('password.store') }}">
    @csrf

    {{-- Password Reset Token --}}
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    {{-- Email --}}
    <div class="mb-3">
      <label for="email" class="form-label fw-semibold">
        {{ t('auth.reset.email_label', 'Email Address') }}
      </label>

      <div class="input-icon">
        <input id="email"
               type="email"
               name="email"
               value="{{ old('email', $request->email) }}"
               required
               autofocus
               autocomplete="username"
               class="form-control auth-input @error('email') is-invalid @enderror"
               placeholder="{{ t('auth.reset.email_placeholder', 'name@example.com') }}">

        @error('email')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    {{-- New Password --}}
    <div class="mb-3">
      <label for="password" class="form-label fw-semibold">
        {{ t('auth.reset.new_password_label', 'New Password') }}
      </label>

      <div class="input-icon">
        <input id="password"
               type="password"
               name="password"
               required
               autocomplete="new-password"
               class="form-control auth-input @error('password') is-invalid @enderror"
               placeholder="{{ t('auth.reset.new_password_placeholder', 'Create a new password') }}">

        @error('password')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    {{-- Confirm Password --}}
    <div class="mb-4">
      <label for="password_confirmation" class="form-label fw-semibold">
        {{ t('auth.reset.confirm_password_label', 'Confirm New Password') }}
      </label>

      <div class="input-icon">
        <input id="password_confirmation"
               type="password"
               name="password_confirmation"
               required
               autocomplete="new-password"
               class="form-control auth-input @error('password_confirmation') is-invalid @enderror"
               placeholder="{{ t('auth.reset.confirm_password_placeholder', 'Re-enter new password') }}">

        @error('password_confirmation')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <button type="submit" class="btn btn-auth w-100">
      {{ t('auth.reset.button', 'Reset Password') }}
    </button>

    <div class="signup-line">
      {{ t('auth.reset.back_to', 'Back to') }}
      <a href="{{ route('login') }}">
        {{ t('auth.reset.login', 'Login') }}
      </a>
    </div>

  </form>

@endsection