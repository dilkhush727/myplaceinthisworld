@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Upgrade Membership</h1>

    <p>Your school: <strong>{{ $school->name }}</strong></p>

    <div class="card mb-4">
        <div class="card-header">
            Available Add-Ons
        </div>
        <div class="card-body">

        {{-- Primary Membership --}}
        <div class="mb-4">
            <h5>Primary Membership</h5>
            <p>$399.99 / year or $39.99 / month</p>

            <form method="POST" action="{{ route('school.memberships.purchase') }}">
                @csrf
                <input type="hidden" name="type" value="primary">

                <button name="billing_period" value="monthly" class="btn btn-primary btn-sm">
                    Buy Monthly
                </button>

                <button name="billing_period" value="annual" class="btn btn-outline-primary btn-sm">
                    Buy Annual
                </button>
            </form>
        </div>

        {{-- Junior Intermediate Membership --}}
        <div class="mb-4">
            <h5>Junior Intermediate Membership</h5>
            <p>$399.99 / year or $39.99 / month</p>

            <form method="POST" action="{{ route('school.memberships.purchase') }}">
                @csrf
                <input type="hidden" name="type" value="ji">

                <button name="billing_period" value="monthly" class="btn btn-primary btn-sm">
                    Buy Monthly
                </button>

                <button name="billing_period" value="annual" class="btn btn-outline-primary btn-sm">
                    Buy Annual
                </button>
            </form>
        </div>


        </div>
    </div>

</div>
@endsection
