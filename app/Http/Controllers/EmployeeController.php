<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Display the list of employees
    public function index()
    {
        $employees = Employee::whereNotIn('role_id', [1, 2])->get();
        return view('HomeStaff_Manh.HomeManager', compact('employees'));
    }

    // Show the form for creating a new employee
    public function create()
    {
        return view('HomeStaff_Manh.create');
    }

    // Store a newly created employee in storage
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'status' => 'required',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    // Display the specified employee
    public function show(Employee $employee)
    {
        return view('HomeStaff_Manh.show', compact('employee'));
    }

    // Show the form for editing the specified employee
    public function edit(Employee $employee)
    {
        return view('HomeStaff_Manh.edit', compact('employee'));
    }

    // Update the specified employee in storage
    public function update(Request $request, Employee $employee)
{
    $request->validate([
        'user_name' => 'required',
        'email' => 'required|email',
        'role_id' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'date_of_birth' => 'required',
        'gender' => 'required',
        'status' => 'required',
    ]);

    $employee->update($request->only([
        'user_name', 'email', 'role_id', 'phone', 'address', 'date_of_birth', 'gender', 'status'
    ]));

    return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
}


    // Remove the specified employee from storage
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}