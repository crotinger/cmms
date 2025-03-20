<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use Illuminate\Http\Request;

class InventoryItemController extends Controller
{
    public function index()
    {
        $items = InventoryItem::all();
        return view('inventory.items.index', compact('items'));
    }

    public function create()
    {
        return view('inventory.items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'part_number' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity'    => 'required|integer|min:0',
            'unit_cost'   => 'required|numeric|min:0',
        ]);

        InventoryItem::create($validated);

        return redirect()->route('inventory.items.index')->with('success', 'Item added.');
    }

    public function show(InventoryItem $item)
    {
        return view('inventory.items.show', compact('item'));
    }

    public function edit(InventoryItem $item)
    {
        return view('inventory.items.edit', compact('item'));
    }

    public function update(Request $request, InventoryItem $item)
    {
        $validated = $request->validate([
            'part_number' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity'    => 'required|integer|min:0',
            'unit_cost'   => 'required|numeric|min:0',
        ]);

        $item->update($validated);

        return redirect()->route('inventory.items.index')->with('success', 'Item updated.');
    }

    public function destroy(InventoryItem $item)
    {
        $item->delete();
        return redirect()->route('inventory.items.index')->with('success', 'Item deleted.');
    }
}
