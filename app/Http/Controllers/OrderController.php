<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Modules\Admin\Repositories\BaseRepository\BaseRepository;


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
        // $order = Http::get('http://127.0.0.1:8000/api/order')->json();
        // return view('Order_Hoa.OrderPage', ['order' => $order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderData = [
            'order_date' => Carbon::today()->format('Y-m-d'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'total_price' => $request->input('total_price'),
            'status' => 0,
        ];

        $orderResponse = Http::post('http://127.0.0.1:8000/api/order', $orderData);

        $product_code = $request->input('product_code'); // Lấy giá trị product_code từ request
        $url = "http://127.0.0.1:8000/api/product/update/{$product_code}"; // Tạo URL với product_code
        $response = Http::get($url); // Gửi yêu cầu GET đến URL
        $id = $response->json('id');

        if ($orderResponse->successful()) {
            // Lấy lại ID của đơn hàng vừa tạo
            $order = $orderResponse->json();
            $orderId = $order['id']; // Giả sử API trả về ID của đơn hàng mới trong trường 'id'
            $orderDetailData = [
                'order_id' => $orderId,
                'product_id' => $id,
                'unit_price' => $request->input('unitprice'),
            ];
            $orderDetailResponse = Http::post('http://127.0.0.1:8000/api/orderdetail', $orderDetailData);

            if ($orderDetailResponse->successful()) {
                $paymentMethod = $request->input('paymentMethod');
                $paymentStatus = ($paymentMethod === 'paypal') ? 1 : 0;
                // Save payment information
                $paymentData = [
                    'order_id' => $orderId,
                    'payment_method' => $request->input('paymentMethod'),
                    'status' => $paymentStatus,
                    'date_time' => Carbon::today()->format('Y-m-d'),
                ];

                $paymentResponse = Http::post('http://127.0.0.1:8000/api/payment', $paymentData);

                if ($paymentResponse->successful()) {
                    return view('Customer.PaymentSuccessful.PaymentSuccessful', ['orderId' => $orderId]);
                } else {
                    // Rollback if payment save fails
                    Http::delete("http://127.0.0.1:8000/api/order/{$orderId}");
                    return back()->withErrors('Error saving payment.');
                }
            } else {
                // Rollback if order detail save fails
                Http::delete("http://127.0.0.1:8000/api/order/{$orderId}");
                return back()->withErrors('Error creating order detail.');
            }
        } else {
            // Handle error if creating order fails
            return back()->withErrors('Error creating order.');
        }
        
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