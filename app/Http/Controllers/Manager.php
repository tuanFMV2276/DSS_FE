<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Manager extends Controller
{
    public function index(){
        $employee = Http::get('http://127.0.0.1:8000/api/employee')->json();
        return view('');
    }

    
}
