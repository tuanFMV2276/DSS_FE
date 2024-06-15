<?php


namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function dashboard()
    {
        return view('HomeStaff_Manh.manager.dashboard');
    }

    public function productManagement()
    {
        return view('HomeStaff_Manh.manager.product_management');
    }
}

