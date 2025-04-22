@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Stock</h2>
    <form action="{{ route('stocks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Company</label>
            <input name="company" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="shares" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Buy Price</label>
            <input type="number" step="0.01" name="price_per_share" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Purchase Date</label>
            <input type="date" name="purchase_date" class="form-control" required>
        </div>
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
