{{-- resources/views/auth/reset-password.blade.php --}}
@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
  <h1 class="auth-title">Reset your password</h1>
  <p class="auth-subtitle">
    Create a new password for your account.
  </p>

  <form method="POST" action="{{ route('password.store') }}">
    @csrf

    {{-- Password Reset Token --}}
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    {{-- Email --}}
    <div class="mb-3">
      <label for="email" class="form-label fw-semibold">Email Address</label>
      <div class="input-icon">
        <input id="email"
               type="email"
               name="email"
               value="{{ old('email', $request->email) }}"
               required
               autofocus
               autocomplete="username"
               class="form-control auth-input @error('email') is-invalid @enderror"
               placeholder="name@example.com">

        @error('email')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    {{-- New Password --}}
    <div class="mb-3">
      <label for="password" class="form-label fw-semibold">New Password</label>
      <div class="input-icon">
        <input id="password"
               type="password"
               name="password"
               required
               autocomplete="new-password"
               class="form-control auth-input @error('password') is-invalid @enderror"
               placeholder="Create a new password">

        @error('password')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    {{-- Confirm Password --}}
    <div class="mb-4">
      <label for="password_confirmation" class="form-label fw-semibold">Confirm New Password</label>
      <div class="input-icon">
        <input id="password_confirmation"
               type="password"
               name="password_confirmation"
               required
               autocomplete="new-password"
               class="form-control auth-input @error('password_confirmation') is-invalid @enderror"
               placeholder="Re-enter new password">

        @error('password_confirmation')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <button type="submit" class="btn btn-auth w-100">
      Reset Password
    </button>

    <div class="signup-line">
      Back to
      <a href="{{ route('login') }}">Login</a>
    </div>
  </form>
@endsection
