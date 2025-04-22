@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Stock</h2>
    <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Company</label>
            <input name="company" class="form-control" value="{{ $stock->company }}" required>
        </div>
      
        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="shares" class="form-control" value="{{ $stock->shares }}" required>
        </div>
        <div class="mb-3">
            <label>Buy Price</label>
            <input type="number" step="0.01" name="price_per_share" class="form-control" value="{{ $stock->price_per_share}}" required>
        </div>
        <div class="mb-3">
            <label>Purchase Date</label>
            <input type="date" name="purchase_date" class="form-control" value="{{ $stock->purchase_date }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
