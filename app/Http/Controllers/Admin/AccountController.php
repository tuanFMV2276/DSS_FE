<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AccountController extends Controller
{
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/customer');
        $customers = $response->json();

        // Giả sử bạn có thêm employees API
        $response = Http::get('http://127.0.0.1:8000/api/employee');
        $employees = $response->json();

        // Lọc employees có role_ic không bằng 1
        $filteredEmployees = array_filter($employees, function ($employee) {
            return $employee['role_id'] != 1;
        });

        return view('HomeAdmin.accounts.index', compact('customers', 'filteredEmployees'));
    }

    public function create()
    {
        return view('HomeAdmin.accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:employee,customer',
        ]);

        $response = Http::post('http://127.0.0.1:8000/api/' . $request->role, [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($response->successful()) {
            return redirect()->route('HomeAdmin.accounts.index')->with('success', 'Account created successfully.');
        }

        return back()->with('error', 'Failed to create account.');
    }

    public function edit($id)
    {
        $response = Http::get("http://127.0.0.1:8000/api/customer/{$id}");
        $account = $response->json();

        return view('HomeAdmin.accounts.edit', compact('account'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:employee,customer',
        ]);

        $response = Http::put("http://127.0.0.1:8000/api/{$request->role}/{$id}", [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : null,
        ]);

        if ($response->successful()) {
            return redirect()->route('HomeAdmin.accounts.index')->with('success', 'Account updated successfully.');
        }

        return back()->with('error', 'Failed to update account.');
    }

    public function destroy($id)
    {
        $response = Http::delete("http://127.0.0.1:8000/api/customer/{$id}");

        if ($response->successful()) {
            return redirect()->route('HomeAdmin.accounts.index')->with('success', 'Account deleted successfully.');
        }

        return back()->with('error', 'Failed to delete account.');
    }

    public function showEmployeeDetail($id)
    {
        $employee = Http::get("http://127.0.0.1:8000/api/employee/{$id}")->json();
        return view('HomeAdmin.EmployeeDetail', ['employee' => $employee]);
    }

    public function updateEmployee(Request $request, $id)
    {
        $response = Http::put("http://127.0.0.1:8000/api/employee/{$id}", $request->all());

        return redirect('/admin/accounts');
    }
    public function addNewEmployee()
    {
        return view('HomeAdmin.AddNewEmployee');
    }
    public function storeNewEmployee(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/employee', $request->all());
        return redirect()->route('admin.accounts.index')->with('success', 'New Employee created successfully.');
    }
    public function destroyEmployee($id)
    {
        $response = Http::delete("http://127.0.0.1:8000/api/employee/{$id}");
        return redirect()->route('admin.accounts.index')->with('success', 'Employee deleted successfully.');
    }
    public function showCustomerDetail($id)
    {
        $customer = Http::get("http://127.0.0.1:8000/api/customer/{$id}")->json();
        return view('HomeAdmin.EmployeeDetail', ['customer' => $customer]);
    }

}