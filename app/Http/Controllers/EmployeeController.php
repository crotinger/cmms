<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of employees.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created employee in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'name'     => 'required|string|max:255',
           'email'    => 'required|email|unique:employees,email',
           'phone'    => 'nullable|string|max:20',
           'position' => 'nullable|string|max:255',
        ]);

        Employee::create($validated);

        return redirect()->route('admin.employees.index')
                         ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified employee.
     */
    public function show(Employee $employee)
    {
        // Optionally implement a detail view.
        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified employee.
     */
    public function edit(Employee $employee)
    {
        return view('admin.employees.edit', compact('employee'));
    }

    /**
     * Update the specified employee in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
           'name'     => 'required|string|max:255',
           'email'    => 'required|email|unique:employees,email,' . $employee->id,
           'phone'    => 'nullable|string|max:20',
           'position' => 'nullable|string|max:255',
        ]);

        $employee->update($validated);

        return redirect()->route('admin.employees.index')
                         ->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified employee from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('admin.employees.index')
                         ->with('success', 'Employee deleted successfully.');
    }
}
