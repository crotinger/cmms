<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class ServiceOrderController extends Controller
{
    public function index()
    {
        $orders = ServiceOrder::all();
        return view('service.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('service.orders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'pivot_model'   => 'required|string|max:255',
            'service_date'  => 'required|date',
            'status'        => 'required|string|max:50',
            'notes'         => 'nullable|string',
        ]);

        ServiceOrder::create($validated);

        return redirect()->route('service.orders.index')->with('success', 'Service order created.');
    }

    public function show(ServiceOrder $order)
    {
        return view('service.orders.show', compact('order'));
    }

    public function edit(ServiceOrder $order)
    {
        return view('service.orders.edit', compact('order'));
    }

    public function update(Request $request, ServiceOrder $order)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'pivot_model'   => 'required|string|max:255',
            'service_date'  => 'required|date',
            'status'        => 'required|string|max:50',
            'notes'         => 'nullable|string',
        ]);

        $order->update($validated);

        return redirect()->route('service.orders.index')->with('success', 'Service order updated.');
    }

    public function destroy(ServiceOrder $order)
    {
        $order->delete();

        return redirect()->route('service.orders.index')->with('success', 'Service order deleted.');
    }
}

