@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ t('school.memberships.upgrade_title', 'Upgrade Membership') }}</h1>

    <p>
        {{ t('school.memberships.school', 'Your school') }}:
        <strong>{{ $school->name }}</strong>
    </p>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            {{ t('school.memberships.available_addons', 'Available Add-Ons') }}
        </div>

        <div class="card-body">

        {{-- Primary Membership --}}
        <div class="mb-4">
            <h5>{{ t('school.memberships.primary', 'Primary Membership') }}</h5>

            <p>{{ t('school.memberships.price', '$399.99 / year or $39.99 / month') }}</p>

            <form method="POST" action="{{ route('school.memberships.purchase') }}">
                @csrf
                <input type="hidden" name="type" value="primary">

                <button name="billing_period" value="monthly" class="btn btn-primary btn-sm">
                    {{ t('school.memberships.buy_monthly', 'Buy Monthly') }}
                </button>

                <button name="billing_period" value="annual" class="btn btn-outline-primary btn-sm">
                    {{ t('school.memberships.buy_annual', 'Buy Annual') }}
                </button>
            </form>
        </div>

        {{-- Junior Intermediate Membership --}}
        <div class="mb-4">
            <h5>{{ t('school.memberships.ji', 'Junior Intermediate Membership') }}</h5>

            <p>{{ t('school.memberships.price', '$399.99 / year or $39.99 / month') }}</p>

            <form method="POST" action="{{ route('school.memberships.purchase') }}">
                @csrf
                <input type="hidden" name="type" value="ji">

                <button name="billing_period" value="monthly" class="btn btn-primary btn-sm">
                    {{ t('school.memberships.buy_monthly', 'Buy Monthly') }}
                </button>

                <button name="billing_period" value="annual" class="btn btn-outline-primary btn-sm">
                    {{ t('school.memberships.buy_annual', 'Buy Annual') }}
                </button>
            </form>
        </div>

        </div>
    </div>

</div>
@endsection