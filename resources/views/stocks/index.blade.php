@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">📈 My Stocks</h2>
        <a href="{{ route('stocks.create') }}" class="btn btn-primary">
            ➕ Add Stock
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
                        <th>Company</th>
                        <th>Quantity</th>
                        <th>Buy Price</th>
                        <th>Purchase Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stocks as $stock)
                        <tr>
                            <td>{{ $stock->company }}</td>
                            <td>{{ $stock->shares }}</td>
                            <td>₹{{ number_format($stock->price_per_share, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($stock->purchase_date)->format('d M, Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                  Edit
                                </a>
                                <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this stock?')">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No stocks added yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
