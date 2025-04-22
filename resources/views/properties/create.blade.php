@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Property</h2>
    <form action="{{ route('properties.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Location</label>
            <input name="location" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Value</label>
            <input type="number" name="value" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Purchase Date</label>
            <input type="date" name="purchase_date" class="form-control" required>
        </div>
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
