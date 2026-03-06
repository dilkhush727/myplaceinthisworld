{{-- resources/views/auth/verify-email.blade.php --}}
@extends('layouts.admin')

@section('title', t('auth.verify.page_title', 'Verify Email'))

@section('content')

  <h1 class="auth-title">
    {{ t('auth.verify.heading', 'Verify your email address') }}
  </h1>

  <p class="auth-subtitle">
    {{ t(
        'auth.verify.subtitle',
        "Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just emailed to you. If you didn't receive the email, we can send you another one."
    ) }}
  </p>

  @if (session('status') === 'verification-link-sent')
    <div class="alert alert-success mb-4">
      {{ t(
          'auth.verify.link_sent',
          'A new verification link has been sent to the email address you provided during registration.'
      ) }}
    </div>
  @endif

  <div class="d-flex justify-content-between align-items-center mt-4">

    {{-- Resend Verification Email --}}
    <form method="POST" action="{{ route('verification.send') }}">
      @csrf
      <button type="submit" class="btn btn-dark">
        {{ t('auth.verify.resend_button', 'Resend Verification Email') }}
      </button>
    </form>

  </div>

@endsection