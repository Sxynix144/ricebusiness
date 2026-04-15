<?php

namespace App\Http\Controllers;

use App\Models\RiceItem;
use Illuminate\Http\Request;

class RiceController extends Controller
{
    // DELETE the __construct method entirely

    public function index()
    {
        $rices = RiceItem::all();
        return view('rices.index', compact('rices'));
    }

    public function create()
    {
        return view('rices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'description' => 'nullable|string'
        ]);

        RiceItem::create($request->all());
        return redirect()->route('rices.index')->with('success', 'Rice product added.');
    }

    public function edit(RiceItem $rice)
    {
        return view('rices.edit', compact('rice'));
    }

    public function update(Request $request, RiceItem $rice)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'description' => 'nullable|string'
        ]);

        $rice->update($request->all());
        return redirect()->route('rices.index')->with('success', 'Rice product updated.');
    }

    public function destroy(RiceItem $rice)
    {
        $rice->delete();
        return redirect()->route('rices.index')->with('success', 'Rice product deleted.');
    }
}