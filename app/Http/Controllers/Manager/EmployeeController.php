<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeeController extends Controller
{
    public function index()
    {
        // $employees = Http::get('http://127.0.0.1:8000/api/employee')->json();
        // $employees = collect($employees)->whereNotIn('role_id', [1, 3]);
        // return view('HomeStaff_Manh/HomeManager', ['employees' => $employees]);
        return redirect('/home-manager');
    }

    public function store(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/employee', $request->all());
        return redirect()->route('employees.index');

    }

    public function show($id)
    {
        $employee = Http::get("http://127.0.0.1:8000/api/employee/{$id}")->json();
        return view('HomeStaff_Manh.EmployeeDetail', ['employee' => $employee]);
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required|integer',
        ]);
        $response = Http::put("http://127.0.0.1:8000/api/employee/{$id}", $request->all());

        if ($response->successful()) {
            return redirect()->route('employees.index')->with('success', 'Role updated successfully.');
        } else {
            return redirect()->route('employees.index')->with('error', 'Failed to update role.');
        }
    }

    public function deleteEmployee($id)
    {
        $response = Http::delete("http://127.0.0.1:8000/api/employee/{$id}");
        return redirect()->route('employees.index');
    }

}
