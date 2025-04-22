@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Fixed Deposit</h2>

    <form action="{{ route('fixed-deposits.update', $fixedDeposit->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Bank Name</label>
            <input type="text" name="bank" class="form-control" value="{{ $fixedDeposit->bank }}" required>
        </div>

        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" class="form-control" value="{{ $fixedDeposit->amount }}" required>
        </div>

        <div class="mb-3">
            <label>Interest Rate (%)</label>
            <input type="number" step="0.01" name="interest_rate" class="form-control" value="{{ $fixedDeposit->interest_rate }}" required>
        </div>

        <div class="mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ $fixedDeposit->start_date }}" required>
        </div>

        <div class="mb-3">
            <label>Maturity Date</label>
            <input type="date" name="maturity_date" class="form-control" value="{{ $fixedDeposit->maturity_date }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('fixed-deposits.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
