@extends('layouts.admin')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">{{ t('school.memberships.manage_title', 'Manage Memberships') }}</h1>

    <p class="mb-3">
        {{ t('school.memberships.school', 'School') }}:
        <strong>{{ $school->name }}</strong>
    </p>

    <div class="card shadow-sm">
        <div class="card-header">
            <strong>{{ t('school.memberships.your_memberships', 'Your Memberships') }}</strong>
        </div>

        <div class="card-body">

            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>{{ t('school.memberships.type', 'Type') }}</th>
                        <th>{{ t('school.memberships.billing', 'Billing') }}</th>
                        <th>{{ t('school.memberships.status', 'Status') }}</th>
                        <th>{{ t('school.memberships.starts_at', 'Starts At') }}</th>
                        <th>{{ t('school.memberships.ends_at', 'Ends At') }}</th>
                        <th>{{ t('school.memberships.actions', 'Actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($memberships as $m)
                    <tr>
                        <td>{{ ucfirst($m->type) }}</td>

                        <td>
                            @if($m->is_free)
                                <span class="badge bg-success">
                                    {{ t('school.memberships.free', 'Free') }}
                                </span>
                            @else
                                {{ ucfirst($m->billing_period) }}
                            @endif
                        </td>

                        <td>
                            @if($m->status === 'active')
                                <span class="badge bg-success">
                                    {{ t('school.memberships.active', 'Active') }}
                                </span>
                            @elseif($m->status === 'cancelled')
                                <span class="badge bg-danger">
                                    {{ t('school.memberships.cancelled', 'Cancelled') }}
                                </span>
                            @elseif($m->status === 'expired')
                                <span class="badge bg-secondary">
                                    {{ t('school.memberships.expired', 'Expired') }}
                                </span>
                            @endif
                        </td>

                        <td>
                            {{ $m->starts_at ? $m->starts_at->format('M d, Y') : '—' }}
                        </td>

                        <td>
                            {{ $m->ends_at ? $m->ends_at->format('M d, Y') : '—' }}
                        </td>

                        <td>
                            @if(!$m->is_free && $m->status === 'active')

                                <form method="POST" action="{{ route('school.memberships.renew') }}" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="type" value="{{ $m->type }}">
                                    <input type="hidden" name="billing_period" value="{{ $m->billing_period }}">
                                    <button class="btn btn-sm btn-primary">
                                        {{ t('school.memberships.renew', 'Renew') }}
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('school.memberships.changeBilling') }}" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="type" value="{{ $m->type }}">

                                    @if($m->billing_period === 'monthly')
                                        <input type="hidden" name="billing_period" value="annual">
                                        <button class="btn btn-sm btn-warning">
                                            {{ t('school.memberships.switch_annual', 'Switch to Annual') }}
                                        </button>
                                    @else
                                        <input type="hidden" name="billing_period" value="monthly">
                                        <button class="btn btn-sm btn-warning">
                                            {{ t('school.memberships.switch_monthly', 'Switch to Monthly') }}
                                        </button>
                                    @endif
                                </form>

                                <form method="POST" action="{{ route('school.memberships.cancel') }}" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="type" value="{{ $m->type }}">
                                    <button class="btn btn-sm btn-danger">
                                        {{ t('school.memberships.cancel', 'Cancel') }}
                                    </button>
                                </form>

                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            {{ t('school.memberships.none', 'No memberships found.') }}
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>

    <a href="{{ route('school.memberships.upgrade') }}" class="btn btn-outline-primary mt-4">
        {{ t('school.memberships.buy_more', 'Buy Additional Memberships') }}
    </a>

</div>
@endsection