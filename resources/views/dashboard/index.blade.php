@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">📊 Investment Dashboard</h2>

    <div class="row g-4">
        <!-- Total Investments -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Investments</h5>
                    <p class="card-text fs-4 fw-semibold text-primary">₹{{ number_format($totalInvestmentsValue, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Stocks -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Stocks</h5>
                    <p class="card-text fs-4 fw-semibold text-success">₹{{ number_format($totalStocksValue, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Properties -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Properties</h5>
                    <p class="card-text fs-4 fw-semibold text-warning">₹{{ number_format($totalPropertiesValue, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Fixed Deposits -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Fixed Deposits</h5>
                    <p class="card-text fs-4 fw-semibold text-info">₹{{ number_format($totalFixedDepositsValue, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <!-- Investment Breakdown Chart -->
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-center">Investment Breakdown</h5>
                    <canvas id="investmentChart" width="100" height="100"></canvas> <!-- Medium size (400px by 400px) -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('investmentChart').getContext('2d');
    const investmentChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Stocks', 'Properties', 'Fixed Deposits'],
            datasets: [{
                label: 'Investment Breakdown',
                data: [{{ $totalStocksValue }}, {{ $totalPropertiesValue }}, {{ $totalFixedDepositsValue }}],
                backgroundColor: ['#ff6f61', '#4caf50', '#3f51b5'],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return '₹' + context.raw.toFixed(2);
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
