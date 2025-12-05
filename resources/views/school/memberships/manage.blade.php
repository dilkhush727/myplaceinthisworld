@extends('layouts.admin')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Manage Memberships</h1>

    <p class="mb-3">School: <strong>{{ $school->name }}</strong></p>

    <div class="card shadow-sm">
        <div class="card-header">
            <strong>Your Memberships</strong>
        </div>

        <div class="card-body">

            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Billing</th>
                        <th>Status</th>
                        <th>Starts At</th>
                        <th>Ends At</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($memberships as $m)
                    <tr>
                        <td>{{ ucfirst($m->type) }}</td>

                        <td>
                            @if($m->is_free)
                                <span class="badge bg-success">Free</span>
                            @else
                                {{ ucfirst($m->billing_period) }}
                            @endif
                        </td>

                        <td>
                            @if($m->status === 'active')
                                <span class="badge bg-success">Active</span>
                            @elseif($m->status === 'cancelled')
                                <span class="badge bg-danger">Cancelled</span>
                            @elseif($m->status === 'expired')
                                <span class="badge bg-secondary">Expired</span>
                            @endif
                        </td>

                        <td>
                            {{ $m->starts_at ? $m->starts_at->format('M d, Y') : '—' }}
                        </td>

                        <td>
                            {{ $m->ends_at ? $m->ends_at->format('M d, Y') : '—' }}
                        </td>

                        <td>
                            {{-- SHOW ACTIONS FOR PAID MEMBERS ONLY --}}
                            @if(!$m->is_free && $m->status === 'active')

                                {{-- RENEW --}}
                                <form method="POST" action="{{ route('school.memberships.renew') }}" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="type" value="{{ $m->type }}">
                                    <input type="hidden" name="billing_period" value="{{ $m->billing_period }}">

                                    <button class="btn btn-sm btn-primary">Renew</button>
                                </form>

                                {{-- CHANGE BILLING --}}
                                <form method="POST" action="{{ route('school.memberships.changeBilling') }}" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="type" value="{{ $m->type }}">

                                    @if($m->billing_period === 'monthly')
                                        <input type="hidden" name="billing_period" value="annual">
                                        <button class="btn btn-sm btn-warning">Switch to Annual</button>
                                    @else
                                        <input type="hidden" name="billing_period" value="monthly">
                                        <button class="btn btn-sm btn-warning">Switch to Monthly</button>
                                    @endif
                                </form>

                                {{-- CANCEL --}}
                                <form method="POST" action="{{ route('school.memberships.cancel') }}" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="type" value="{{ $m->type }}">
                                    <button class="btn btn-sm btn-danger">Cancel</button>
                                </form>

                            @endif

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            No memberships found.
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>

        </div>
    </div>

    <a href="{{ route('school.memberships.upgrade') }}" class="btn btn-outline-primary mt-4">
        Buy Additional Memberships
    </a>

</div>
@endsection
