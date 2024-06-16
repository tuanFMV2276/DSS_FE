<?php

namespace App\Http\Controllers\DeliveryStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeliveryStaffController extends Controller
{
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/order');
        $orders = $response->json();
        

        // Filter orders based on status
        $filteredOrders = collect($orders)->groupBy('status');

        return view('DeliveryStaff.orders', compact('filteredOrders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $response = Http::put("http://127.0.0.1:8000/api/order/{$id}", [
            'status' => $request->status,
        ]);

        if ($response->successful()) {
            return redirect()->route('delivery-staff.orders')->with('success', 'Order status updated successfully.');
        } else {
            return back()->with('error', 'Failed to update order status.');
        }
    }

    public function show($id)
{
    $orderDetailsResponse = Http::get("http://127.0.0.1:8000/api/orderdetail/{$id}");
    $orderDetails = $orderDetailsResponse->json();

    // Get product details
    $productResponse = Http::get("http://127.0.0.1:8000/api/product/{$orderDetails['product_id']}");
    $product = $productResponse->json();

    // Get main diamond details
    $maindiamondResponse = Http::get("http://127.0.0.1:8000/api/maindiamond/{$product['main_diamond_id']}");
    $maindiamond = $maindiamondResponse->json();

    // Get order details
    $orderResponse = Http::get("http://127.0.0.1:8000/api/order/{$id}");
    $order = $orderResponse->json();

    // Get customer details
    $customerResponse = Http::get("http://127.0.0.1:8000/api/customer/{$order['customer_id']}");
    $customer = $customerResponse->json();

    return view('DeliveryStaff.orderdetail', compact('orderDetails', 'customer', 'order', 'product', 'maindiamond'));
}
}