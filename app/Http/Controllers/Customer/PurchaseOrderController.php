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

        // Lọc các đơn hàng của khách hàng đã đăng nhập
        $customerOrders = array_filter($orders, function($order) use ($customerId) {
            return $order['customer_id'] == $customerId;
        });

        // Phân loại đơn hàng theo trạng thái
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

        // Truyền dữ liệu tới view
        return view('Customer.PurchaseOrder.PurchaseOrder', [
            'orders' => $statuses,
            'orderDetails' => $orderDetails,
            'products' => $products
        ]);
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