{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.auth')

@section('title', 'Register')

@section('content')
  <h1 class="auth-title">Create your account</h1>
  <p class="auth-subtitle">
    Join My Place In This World to access activities.
  </p>

  <form method="POST" action="{{ route('register') }}">
    @csrf

    {{-- Name --}}
    <div class="mb-3">
      <label for="name" class="form-label fw-semibold">Name</label>
      <div class="input-icon">
        <input id="name"
               type="text"
               name="name"
               value="{{ old('name') }}"
               required
               autofocus
               autocomplete="name"
               class="form-control auth-input @error('name') is-invalid @enderror"
               placeholder="Your full name">

        @error('name')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    {{-- School Name --}}
    <div class="mb-3">
      <label for="school_name" class="form-label fw-semibold">School Name</label>

      <div class="input-icon">
        <input id="school_name"
              type="text"
              name="school_name"
              value="{{ old('school_name') }}"
              required
              autocomplete="organization"
              class="form-control auth-input @error('school_name') is-invalid @enderror"
              placeholder="Enter your school name">

        @error('school_name')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    {{-- Email --}}
    <div class="mb-3">
      <label for="email" class="form-label fw-semibold">Email Address</label>
      <div class="input-icon">
        <input id="email"
               type="email"
               name="email"
               value="{{ old('email') }}"
               required
               autocomplete="username"
               class="form-control auth-input @error('email') is-invalid @enderror"
               placeholder="name@example.com">

        @error('email')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    {{-- Password --}}
    <div class="mb-3">
      <label for="password" class="form-label fw-semibold">Password</label>
      <div class="input-icon">
        <input id="password"
               type="password"
               name="password"
               required
               autocomplete="new-password"
               class="form-control auth-input @error('password') is-invalid @enderror"
               placeholder="Create a password">

        @error('password')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    {{-- Confirm Password --}}
    <div class="mb-4">
      <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
      <div class="input-icon">
        <input id="password_confirmation"
               type="password"
               name="password_confirmation"
               required
               autocomplete="new-password"
               class="form-control auth-input @error('password_confirmation') is-invalid @enderror"
               placeholder="Re-enter password">

        @error('password_confirmation')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <button type="submit" class="btn btn-auth w-100">Create account</button>

    <div class="signup-line">
      Already registered?
      <a href="{{ route('login') }}">Log in</a>
    </div>
  </form>
@endsection
