@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">🏦 My Fixed Deposits</h2>
        <a href="{{ route('fixed-deposits.create') }}" class="btn btn-primary">
            ➕ Add Fixed Deposit
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Bank</th>
                        <th>Amount</th>
                        <th>Interest Rate (%)</th>
                        <th>Start Date</th>
                        <th>Maturity Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fixedDeposits as $fd)
                        <tr>
                            <td>{{ $fd->bank }}</td>
                            <td>₹{{ number_format($fd->amount, 2) }}</td>
                            <td>{{ $fd->interest_rate }}%</td>
                            <td>{{ \Carbon\Carbon::parse($fd->start_date)->format('d M, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($fd->maturity_date)->format('d M, Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('fixed-deposits.edit', $fd->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('fixed-deposits.destroy', $fd->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this fixed deposit?')">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No fixed deposit records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
