<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function Payment1()
    {
        // Your logic for the payment page
        return view('Quan_Payment1/Payment1');
    }
    public function Payment2()
    {
        // Your logic for the payment page
        return view('Quan_Payment2/Payment2');
    }
    public function Payment3()
    {
        // Your logic for the payment page
        return view('Quan_Payment3/Payment3');
    }
    public function CartPage()
    {
        // Your logic for the payment page
        return view('Quan_CartPage/CartPage');
    }
}