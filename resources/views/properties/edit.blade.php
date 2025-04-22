@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Property</h2>
    <form action="{{ route('properties.update', $property->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" value="{{ $property->name }}" required>
        </div>
        <div class="mb-3">
            <label>Location</label>
            <input name="location" class="form-control" value="{{ $property->location }}" required>
        </div>
        <div class="mb-3">
            <label>Value</label>
            <input type="number" name="value" class="form-control" value="{{ $property->value }}" required>
        </div>
        <div class="mb-3">
            <label>Purchase Date</label>
            <input type="date" name="purchase_date" class="form-control" value="{{ $property->purchase_date }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
