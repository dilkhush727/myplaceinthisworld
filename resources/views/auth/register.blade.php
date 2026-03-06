{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.auth')

@section('title', t('auth.register.page_title', 'Register'))

@section('content')

  <h1 class="auth-title">
    {{ t('auth.register.heading', 'Create your account') }}
  </h1>

  <p class="auth-subtitle">
    {{ t('auth.register.subtitle', 'Join My Place In This World to access activities.') }}
  </p>

  <form method="POST" action="{{ route('register') }}">
    @csrf

    {{-- Name --}}
    <div class="mb-3">
      <label for="name" class="form-label fw-semibold">
        {{ t('auth.register.name_label', 'Name') }}
      </label>

      <div class="input-icon">
        <input id="name"
               type="text"
               name="name"
               value="{{ old('name') }}"
               required
               autofocus
               autocomplete="name"
               class="form-control auth-input @error('name') is-invalid @enderror"
               placeholder="{{ t('auth.register.name_placeholder', 'Your full name') }}">

        @error('name')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    {{-- School Name --}}
    <div class="mb-3">
      <label for="school_name" class="form-label fw-semibold">
        {{ t('auth.register.school_label', 'School Name') }}
      </label>

      <div class="input-icon">
        <input id="school_name"
               type="text"
               name="school_name"
               value="{{ old('school_name') }}"
               required
               autocomplete="organization"
               class="form-control auth-input @error('school_name') is-invalid @enderror"
               placeholder="{{ t('auth.register.school_placeholder', 'Enter your school name') }}">

        @error('school_name')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    {{-- Email --}}
    <div class="mb-3">
      <label for="email" class="form-label fw-semibold">
        {{ t('auth.register.email_label', 'Email Address') }}
      </label>

      <div class="input-icon">
        <input id="email"
               type="email"
               name="email"
               value="{{ old('email') }}"
               required
               autocomplete="username"
               class="form-control auth-input @error('email') is-invalid @enderror"
               placeholder="{{ t('auth.register.email_placeholder', 'name@example.com') }}">

        @error('email')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    {{-- Password --}}
    <div class="mb-3">
      <label for="password" class="form-label fw-semibold">
        {{ t('auth.register.password_label', 'Password') }}
      </label>

      <div class="input-icon">
        <input id="password"
               type="password"
               name="password"
               required
               autocomplete="new-password"
               class="form-control auth-input @error('password') is-invalid @enderror"
               placeholder="{{ t('auth.register.password_placeholder', 'Create a password') }}">

        @error('password')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    {{-- Confirm Password --}}
    <div class="mb-4">
      <label for="password_confirmation" class="form-label fw-semibold">
        {{ t('auth.register.confirm_password_label', 'Confirm Password') }}
      </label>

      <div class="input-icon">
        <input id="password_confirmation"
               type="password"
               name="password_confirmation"
               required
               autocomplete="new-password"
               class="form-control auth-input @error('password_confirmation') is-invalid @enderror"
               placeholder="{{ t('auth.register.confirm_password_placeholder', 'Re-enter password') }}">

        @error('password_confirmation')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <button type="submit" class="btn btn-auth w-100">
      {{ t('auth.register.button', 'Create account') }}
    </button>

    <div class="signup-line">
      {{ t('auth.register.already_registered', 'Already registered?') }}
      <a href="{{ route('login') }}">
        {{ t('auth.register.login', 'Log in') }}
      </a>
    </div>

  </form>

@endsection