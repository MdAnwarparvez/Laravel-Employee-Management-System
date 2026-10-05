<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Employee List
    public function index()
    {
        $employees = Employee::orderBy('employee_id', 'asc')->get();

        return view('employees.index', compact('employees'));
    }

    // Add Employee Page
    public function create()
    {
        return view('employees.create');
    }

    // Save Employee
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|string|max:50|unique:employees,employee_id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees,email',
            'phone' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        Employee::create([
            'employee_id' => $request->employee_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department' => $request->department,
            'designation' => $request->designation,
            'salary' => $request->salary,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee added successfully!');
    }

    // View Employee
    public function show($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

        return view('employees.show', compact('employee'));
    }

    // Edit Employee Page
    public function edit($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

        return view('employees.edit', compact('employee'));
    }

    // Update Employee
    public function update(Request $request, $employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department' => $request->department,
            'designation' => $request->designation,
            'salary' => $request->salary,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee updated successfully!');
    }

    // Delete Employee
    public function destroy($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee deleted successfully!');
    }
}