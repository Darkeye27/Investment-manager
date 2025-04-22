@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Fixed Deposit</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fixed-deposits.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="bank">Bank</label>
            <input type="text" name="bank" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="maturity_date">Maturity Date</label>
            <input type="date" name="maturity_date" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="interest_rate">Interest Rate (%)</label>
            <input type="number" step="0.01" name="interest_rate" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('fixed-deposits.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
