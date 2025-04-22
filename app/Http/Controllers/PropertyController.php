<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    // use AuthorizesRequests;

    public function index()
    {
        $properties = Property::where('user_id', Auth::id())->get();
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'value' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        Property::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'location' => $request->location,
            'value' => $request->value,
            'purchase_date' => $request->purchase_date,
        ]);

        return redirect()->route('properties.index')->with('success', 'Property added successfully.');
    }

    public function edit(Property $property)
    {
        // $this->authorize('update', $property);
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        // $this->authorize('update', $property);

        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'value' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        $property->update($request->all());

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        $this->authorize('delete', $property);
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
