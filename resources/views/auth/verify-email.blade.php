{{-- resources/views/auth/verify-email.blade.php --}}
@extends('layouts.admin')

@section('title', 'Verify Email')

@section('content')
  <h1 class="auth-title">Verify your email address</h1>

  <p class="auth-subtitle">
    Thanks for signing up! Before getting started, please verify your email
    address by clicking on the link we just emailed to you.
    If you didn't receive the email, we can send you another one.
  </p>

  @if (session('status') === 'verification-link-sent')
    <div class="alert alert-success mb-4">
      A new verification link has been sent to the email address you provided during registration.
    </div>
  @endif

  <div class="d-flex justify-content-between align-items-center mt-4">
    {{-- Resend Verification Email --}}
    <form method="POST" action="{{ route('verification.send') }}">
      @csrf
      <button type="submit" class="btn btn-dark">
        Resend Verification Email
      </button>
    </form>
  </div>
@endsection
