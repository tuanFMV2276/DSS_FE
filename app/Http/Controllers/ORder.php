<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ORder extends Controller
{
    public function statusDisplay(Request $request,$status){
        $order =  Http::get("http://127.0.0.1:8000/order/status/{$status}")->json();
        return view('status', ['order' => $order], ['status' => $status]);
    }
}
