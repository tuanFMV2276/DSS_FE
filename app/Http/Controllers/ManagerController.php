<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index(){return $employees = Http::get('http://127.0.0.1:8000/api/employee')->json();}
    
}
