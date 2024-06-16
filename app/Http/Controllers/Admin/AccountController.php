<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/customer');
        $customers = $response->json();
        
        // Giả sử bạn có thêm employees API
        $response = Http::get('http://127.0.0.1:8000/api/employee');
        $employees = $response->json();

        return view('HomeAdmin.accounts.index', compact('customers', 'employees'));
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
}
