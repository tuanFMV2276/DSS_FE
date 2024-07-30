<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
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
    $paymentMethod = $request->input('paymentMethod');
    $status = ($paymentMethod == 'paypal') ? 1 : 0;

    $orderData = [
        'customer_id' => Session()->get('id'),
        'order_date' => Carbon::today()->format('Y-m-d'),
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'address' => $request->input('address'),
        'phone' => $request->input('phone'),
        'total_price' => $request->input('total_price'),
        'status' => $status,
    ];

        $orderResponse = Http::post('http://127.0.0.1:8000/api/order', $orderData);

        $product_code = $request->input('product_code');
        $size = floatval($request->input('size'));
        $url = "http://127.0.0.1:8000/api/product/update/{$product_code}";
        $response = Http::get($url);
        $id = $response->json('id');

        if ($orderResponse->successful()) {
            $order = $orderResponse->json();
            $orderId = $order['id'];
            $orderDetailData = [
                'order_id' => $orderId,
                'product_id' => $id,
                'unit_price' => $request->input('unitprice'),
            ];
            $orderDetailResponse = Http::post('http://127.0.0.1:8000/api/orderdetail', $orderDetailData);

            if ($orderDetailResponse->successful()) {
                $paymentData = [
                    'order_id' => $orderId,
                    'payment_method' => $request->input('paymentMethod'),
                    'date_time' => Carbon::now()->format('Y-m-d H:i:s'),
                ];

                $paymentResponse = Http::post('http://127.0.0.1:8000/api/payment', $paymentData);

                if ($paymentResponse->successful()) {
                    $productUpdateData = [
                        'size' => $size,
                        'status' => 0,
                    ];
    
                    $productUpdateUrl = "http://127.0.0.1:8000/api/product/{$id}";
                    $productUpdateResponse = Http::put($productUpdateUrl, $productUpdateData);
    
                    if ($productUpdateResponse->successful()) {
                        $userId = Session::get('id');
                        session()->forget("cart_{$userId}");
                        return view('Customer.PaymentSuccessful.PaymentSuccessful', ['orderId' => $orderId]);
                    } else {
                        Http::delete("http://127.0.0.1:8000/api/order/{$orderId}");
                        return back()->withErrors('Error updating product.');
                    }
                } else {
                    Http::delete("http://127.0.0.1:8000/api/order/{$orderId}");
                    return back()->withErrors('Error saving payment.');
                }
            } else {
                Http::delete("http://127.0.0.1:8000/api/order/{$orderId}");
                return back()->withErrors('Error creating order detail.');
            }
        } else {
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