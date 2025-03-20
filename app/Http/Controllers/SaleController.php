<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of sales.
     */
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new sale.
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created sale in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'pivot_model'   => 'required|string|max:255',
            'amount'        => 'required|numeric',
            'sale_date'     => 'required|date',
        ]);

        Sale::create($validated);

        return redirect()->route('sales.index')
                         ->with('success', 'Sale created successfully.');
    }

    /**
     * Display the specified sale.
     */
    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified sale.
     */
    public function edit(Sale $sale)
    {
        return view('sales.edit', compact('sale'));
    }

    /**
     * Update the specified sale in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'pivot_model'   => 'required|string|max:255',
            'amount'        => 'required|numeric',
            'sale_date'     => 'required|date',
        ]);

        $sale->update($validated);

        return redirect()->route('sales.index')
                         ->with('success', 'Sale updated successfully.');
    }

    /**
     * Remove the specified sale from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sales.index')
                         ->with('success', 'Sale deleted successfully.');
    }
}
