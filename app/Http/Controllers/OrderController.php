<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;


class OrderController extends Controller
{
    public function index() {
        $order = Order::paginate(5);

        // Trả về dữ liệu cho view
        return view('index',compact('order'))->with('i', (request()->input('page', 1) -1) *5);
    }
}
