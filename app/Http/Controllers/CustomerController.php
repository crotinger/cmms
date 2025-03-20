<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:customers,email',
            'phone'   => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        Customer::create($validated);

        return redirect()->route('customer.customers.index')->with('success', 'Customer created.');
    }

    public function show(Customer $customer)
    {
        return view('customer.customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customer.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:customers,email,' . $customer->id,
            'phone'   => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $customer->update($validated);

        return redirect()->route('customer.customers.index')->with('success', 'Customer updated.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.customers.index')->with('success', 'Customer deleted.');
    }
}
