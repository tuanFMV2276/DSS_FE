<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
{
    $employees = Http::get('http://127.0.0.1:8000/api/employee')->json();
    $employees = collect($employees)->whereNotIn('role_id', [1, 3]);

    $products = Http::get('http://127.0.0.1:8000/api/product')->json();

    return view('HomeStaff_Manh.HomeManager', compact('employees', 'products'));
}
    
}
