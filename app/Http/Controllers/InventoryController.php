<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display the inventory index.
     */
    public function index()
    {
        // TODO: Replace [] with your actual Inventory model query
        $items = [];

        return view('inventory.index', compact('items'));
    }
}
