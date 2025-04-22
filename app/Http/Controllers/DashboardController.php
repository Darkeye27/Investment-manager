<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Property;
use App\Models\FixedDeposit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get all investments for the logged-in user
        $stocks = Stock::where('user_id', auth()->id())->get();
        $properties = Property::where('user_id', auth()->id())->get();
        $fixedDeposits = FixedDeposit::where('user_id', auth()->id())->get();

        // Calculate totals for each investment type
        $totalStocksValue = $stocks->sum(function ($stock) {
            return $stock->shares * $stock->price_per_share; // Example: quantity * buy price
        });
        $totalPropertiesValue = $properties->sum('value');
        $totalFixedDepositsValue = $fixedDeposits->sum('amount');

        // Total value of all investments
        $totalInvestmentsValue = $totalStocksValue + $totalPropertiesValue + $totalFixedDepositsValue;

        // Return the dashboard view with data
        return view('dashboard.index', compact(
            'totalInvestmentsValue',
            'totalStocksValue',
            'totalPropertiesValue',
            'totalFixedDepositsValue',
            'stocks',
            'properties',
            'fixedDeposits'
        ));
    }
}
