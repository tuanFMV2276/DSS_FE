<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Repositories\BaseRepository\BaseRepository;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $customerId = Session::get('id');

    $orders = Http::get('http://127.0.0.1:8000/api/order')->json();
    $orderDetails = Http::get('http://127.0.0.1:8000/api/orderdetail')->json();
    $products = Http::get('http://127.0.0.1:8000/api/product')->json();

    $customerOrders = array_filter($orders, function($order) use ($customerId) {
        return $order['customer_id'] == $customerId;
    });

    $statuses = [
        'all' => [],
        'pending' => [],
        'preparing' => [],
        'delivering' => [],
        'finished' => [],
        'cancelled' => []
    ];

    foreach ($customerOrders as $order) {
        $statuses['all'][] = $order;
        switch ($order['status']) {
            case 0:
            case 1:
                $statuses['pending'][] = $order;
                break;
            case 2:
                $statuses['preparing'][] = $order;
                break;
            case 3:
                $statuses['delivering'][] = $order;
                break;
            case 4:
                $statuses['finished'][] = $order;
                break;
            case 5:
                $statuses['cancelled'][] = $order;
                break;
        }
    }

    return view('Customer.PurchaseOrder.PurchaseOrder', [
        'orders' => $statuses,
        'orderDetails' => $orderDetails,
        'products' => $products
    ]);
}

public function cancelOrder(Request $request)
{
    $orderId = $request->input('order_id');
    $response = Http::put("http://127.0.0.1:8000/api/order/$orderId", [
        'status' => 5
    ]);

    if ($response->successful()) {
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false], 500);
    }
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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