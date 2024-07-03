<?php

namespace App\Http\Controllers\DeliveryStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeliveryStaffController extends Controller
{
    public function index()
    {
        
        $orders = Http::get('http://127.0.0.1:8000/api/order')->json();
        $orders = collect($orders)->whereNotIn('status', [0, 1])->values()->all();
        $payments = Http::get('http://127.0.0.1:8000/api/payment')->json();

        return view('DeliveryStaff.orders', compact('orders','payments'));
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
    $exdiamondResponse = Http::get("http://127.0.0.1:8000/api/exdiamond/{$product['extra_diamond_id']}");
    $exiamond = $exdiamondResponse->json();

    $diamondshellResponse = Http::get("http://127.0.0.1:8000/api/diamondshell/{$product['diamond_shell_id']}");
    $diamondshell = $diamondshellResponse->json();

    // Get order details
    $orderResponse = Http::get("http://127.0.0.1:8000/api/order/{$id}");
    $order = $orderResponse->json();

    // Get customer details
    $customerResponse = Http::get("http://127.0.0.1:8000/api/customer/{$order['customer_id']}");
    $customer = $customerResponse->json();

    $paymentResponse = Http::get("http://127.0.0.1:8000/api/payment");
    $payments = $paymentResponse->json();

    return view('DeliveryStaff.orderdetail', compact('orderDetails', 'customer', 'order', 'product', 'maindiamond', 'payments','exiamond','diamondshell'));
}
}