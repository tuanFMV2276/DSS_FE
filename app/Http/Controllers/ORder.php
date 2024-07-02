<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ORder extends Controller
{
    public function statusDisplay(Request $request,$status){
        $order =  Http::get("http://127.0.0.1:8000/order/status/{$status}")->json();
        return view('order_filter', ['order' => $order], ['status' => $status]);
    }

    public function searchByName(Request $request, $name){
        $order = Http::get("http://127.0.0.1:8000/api/order")->json();
        
        return view('',compact($order));
    }
}
