<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    // use AuthorizesRequests;

    public function index()
    {
        $stocks = Stock::where('user_id', Auth::id())->get();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        return view('stocks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'shares' => 'required|integer',
            'price_per_share' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        Stock::create([
            'user_id' => Auth::id(),
            'company' => $request->company,
            'shares' => $request->shares,
            'price_per_share' => $request->price_per_share,
            'purchase_date' => $request->purchase_date,
        ]);

        return redirect()->route('stocks.index')->with('success', 'Stock added successfully.');
    }

    public function edit(Stock $stock)
    {
        // $this->authorize('update', $stock);
        return view('stocks.edit', compact('stock'));
    }

    public function update(Request $request, Stock $stock)
    {
        // $this->authorize('update', $stock);

        $request->validate([
            'company' => 'required',
            'shares' => 'required|integer',
            'price_per_share' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        $stock->update($request->all());

        return redirect()->route('stocks.index')->with('success', 'Stock updated successfully.');
    }

    public function destroy(Stock $stock)
    {
        $this->authorize('delete', $stock);
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully.');
    }
}
