<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = Http::get('http://127.0.0.1:8000/api/order')->json();
        return view('Order_Hoa.OrderPage', ['order' => $order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'firstName' => 'required|string',
    //         'lastName' => 'required|string',
    //         'address' => 'required|string',
    //         'phone' => 'required|string',
    //         'paymentMethod' => 'required|string',
    //     ]);
    
    //     try {
    //         // Create the order
    //         $order = new Order();
    //         $order->customer_id = auth()->id(); // Assuming user is authenticated
    //         $order->order_date = now();
    //         $order->total_price = $request->total_price;
    //         $order->status = 'Pending';
    //         $order->name = $request->firstName . ' ' . $request->lastName;
    //         $order->address = $request->address;
    //         $order->phoneNumber = $request->phone;
    //         $order->email = $request->email;
    //         $order->save();
    
    //         // Create order details
    //         $cartItems = json_decode($request->cartItems, true);
    //         foreach ($cartItems as $item) {
    //             $orderDetail = new OrderDetail();
    //             $orderDetail->order_id = $order->id;
    //             $orderDetail->product_id = $item['id'];
    //             $orderDetail->quantity = $item['quantity'];
    //             $orderDetail->unit_price = $item['price'];
    //             $orderDetail->save();
    //         }
    
    //         // Create payment
    //         $payment = new Payment();
    //         $payment->order_id = $order->id;
    //         $payment->payment_method = $request->paymentMethod;
    //         $payment->date_time = now();
    //         $payment->save();
    
    //         return redirect('/PaymentSuccessful');
    //     } catch (\Exception $e) {
    //         // Log error for debugging
    //         \Log::error('Order creation failed: ' . $e->getMessage());
    
    //         return redirect()->back()->with('error', 'Something went wrong. Please try again.')->withInput();
    //     }
    // }


    public function store(Request $request){

        
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}