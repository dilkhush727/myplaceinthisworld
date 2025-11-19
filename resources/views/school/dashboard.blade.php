@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">School Dashboard</h1>

    <div class="mb-3">
        <strong>Welcome:</strong> {{ auth()->user()->name }}<br>
        <strong>School:</strong> {{ $school->name }}
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <strong>Your Active Memberships</strong>
        </div>
        <div class="card-body">

            @if($activeMemberships->isEmpty())
                <p class="text-muted mb-0">
                    No active memberships found.
                </p>
            @else
                <ul class="list-unstyled mb-0">
                    @foreach($activeMemberships as $membership)
                        <li class="mb-2">
                            <strong>{{ ucfirst($membership->type) }}</strong>

                            @if($membership->is_free)
                                <span class="badge bg-success ms-2">Free</span>
                            @else
                                <span class="badge bg-primary ms-2">
                                    {{ ucfirst($membership->billing_period) }}
                                </span>

                                @if(!$membership->is_free && $membership->ends_at)
                                    <span class="text-muted ms-2">
                                        Expires: {{ $membership->ends_at->format('M d, Y') }}
                                    </span>
                                @endif
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>

    <a href="{{ route('school.memberships.upgrade') }}"
       class="btn btn-outline-primary">
        Upgrade Membership
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">
            Logout
        </button>
    </form>

</div>
@endsection
