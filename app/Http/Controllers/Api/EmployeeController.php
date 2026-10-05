<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('employee_id', 'asc')->get();

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|string|max:50|unique:employees,employee_id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees,email',

            // Exactly 11 digits
            'phone' => 'required|digits:11',

            'department' => 'required|string|max:255',
            'designation' => 'required|string|max:255',

            // No fixed digit limit before or after decimal
            'salary' => [
                'required',
                'regex:/^\d+(\.\d+)?$/'
            ],

            'status' => 'required|in:active,inactive',
        ], [
            'phone.digits' => 'Phone number must be exactly 11 digits.',
            'salary.regex' => 'Salary must contain only numbers and an optional decimal point.',
        ]);

        Employee::create($validated);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee added successfully!');
    }

    public function show($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

        dd($employee->toArray());
    }

    public function edit($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

        return view('employees.edit', [
            'employee' => $employee
        ]);
    }

    public function update(Request $request, $employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',

            // Exactly 11 digits
            'phone' => 'required|digits:11',

            'department' => 'required|string|max:255',
            'designation' => 'required|string|max:255',

            // No fixed digit limit before or after decimal
            'salary' => [
                'required',
                'regex:/^\d+(\.\d+)?$/'
            ],

            'status' => 'required|in:active,inactive',
        ], [
            'phone.digits' => 'Phone number must be exactly 11 digits.',
            'salary.regex' => 'Salary must contain only numbers and an optional decimal point.',
        ]);

        $employee->update($validated);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee updated successfully!');
    }

    public function destroy($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee deleted successfully!');
    }
}