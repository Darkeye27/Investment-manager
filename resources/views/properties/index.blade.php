@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">🏘️ My Properties</h2>
        <a href="{{ route('properties.create') }}" class="btn btn-primary">
            ➕ Add Property
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
                        <th>Name</th>
                        <th>Location</th>
                        <th>Value</th>
                        <th>Purchase Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($properties as $property)
                        <tr>
                            <td>{{ $property->name }}</td>
                            <td>{{ $property->location }}</td>
                            <td>₹{{ number_format($property->value, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($property->purchase_date)->format('d M, Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('properties.destroy', $property->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this property?')">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No properties added yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
