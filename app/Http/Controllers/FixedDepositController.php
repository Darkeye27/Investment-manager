<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\FixedDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FixedDepositController extends Controller
{
    // use AuthorizesRequests;

    public function index()
    {
        $fixedDeposits = FixedDeposit::where('user_id', Auth::id())->get();
        return view('fixed_deposits.index', compact('fixedDeposits'));
    }

    public function create()
    {
        return view('fixed_deposits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank' => 'required',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'maturity_date' => 'required|date',
            'interest_rate' => 'required|numeric',
        ]);

        FixedDeposit::create([
            'user_id' => Auth::id(),
            'bank' => $request->bank,
            'amount' => $request->amount,
            'start_date' => $request->start_date,
            'maturity_date' => $request->maturity_date,
            'interest_rate' => $request->interest_rate,
        ]);

        return redirect()->route('fixed-deposits.index')->with('success', 'Fixed Deposit added successfully.');
    }

    public function edit(FixedDeposit $fixedDeposit)
    {
        // $this->authorize('update', $fixedDeposit);
        return view('fixed_deposits.edit', compact('fixedDeposit'));
    }

    public function update(Request $request, FixedDeposit $fixedDeposit)
    {
        // $this->authorize('update', $fixedDeposit);

        $request->validate([
            'bank' => 'required',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'maturity_date' => 'required|date',
            'interest_rate' => 'required|numeric',
        ]);

        $fixedDeposit->update($request->all());

        return redirect()->route('fixed-deposits.index')->with('success', 'Fixed Deposit updated successfully.');
    }

    public function destroy(FixedDeposit $fixedDeposit)
    {
        $this->authorize('delete', $fixedDeposit);
        $fixedDeposit->delete();
        return redirect()->route('fixed-deposits.index')->with('success', 'Fixed Deposit deleted successfully.');
    }
}
