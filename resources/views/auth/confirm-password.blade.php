{{-- resources/views/auth/confirm-password.blade.php --}}
@extends('layouts.auth')

@section('title', 'Confirm Password')

@section('content')
  <h1 class="auth-title">Confirm your password</h1>
  <p class="auth-subtitle">
    This is a secure area. Please confirm your password before continuing.
  </p>

  <form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    {{-- Password --}}
    <div class="mb-4">
      <label for="password" class="form-label fw-semibold">Password</label>
      <div class="input-icon">
        <input id="password"
               type="password"
               name="password"
               required
               autocomplete="current-password"
               class="form-control auth-input @error('password') is-invalid @enderror"
               placeholder="••••••••">

        @error('password')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <button type="submit" class="btn btn-auth w-100">
      Confirm
    </button>

    <div class="signup-line">
      Back to
      <a href="{{ route('login') }}">Login</a>
    </div>
  </form>
@endsection
