{{-- resources/views/auth/forgot-password.blade.php --}}
@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
  <h1 class="auth-title">Forgot your password?</h1>
  <p class="auth-subtitle">
    No problem. Enter your email and we’ll send you a reset link.
  </p>

  {{-- Session Status --}}
  @if (session('status'))
    <div class="alert alert-success mb-3">
      {{ session('status') }}
    </div>
  @endif

  <form method="POST" action="{{ route('password.email') }}">
    @csrf

    {{-- Email --}}
    <div class="mb-4">
      <label for="email" class="form-label fw-semibold">Email Address</label>
      <div class="input-icon">
        <input id="email"
               type="email"
               name="email"
               value="{{ old('email') }}"
               required
               autofocus
               class="form-control auth-input @error('email') is-invalid @enderror"
               placeholder="name@example.com">

        @error('email')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <button type="submit" class="btn btn-auth w-100">
      Email Password Reset Link
    </button>

    <div class="signup-line">
      Remembered your password?
      <a href="{{ route('login') }}">Back to login</a>
    </div>
  </form>
@endsection
