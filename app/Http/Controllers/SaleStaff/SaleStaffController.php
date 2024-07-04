<?php

namespace App\Http\Controllers\SaleStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class SaleStaffController extends Controller
{
    public function index()
    {
        return redirect('/home-salestaff');
    }
    public function homeSalestaff()
    {
        // Gọi API để lấy dữ liệu
        $customers = Http::get('http://127.0.0.1:8000/api/customer')->json();
        $payments = Http::get('http://127.0.0.1:8000/api/payment')->json();      
        // Phân trang cho orders
        $orders = Http::get('http://127.0.0.1:8000/api/order')->json();
        $orders = collect($orders);

        
       
        return view('HomeStaff_Manh.HomeSaleStaff', compact( 'orders', 'customers', 'payments'));
    }
    public function updateOrderStatus(Request $request, $id)
    {

        $response = Http::put("http://127.0.0.1:8000/api/order/{$id}", [
            'status' => $request->status,
        ]);

        if ($response->successful()) {
            return redirect()->route('salestaff.home')->with('success', 'Order status updated successfully.');
        } else {
            return back()->with('error', 'Failed to update order status.');
        }
    }
    public function showOrderDetail($id)
    {

        $orderDetailsResponse = Http::get("http://127.0.0.1:8000/api/orderdetail/{$id}");
    $orderDetails = $orderDetailsResponse->json();

    // Get product details
    $productResponse = Http::get("http://127.0.0.1:8000/api/product/{$orderDetails['product_id']}");
    $product = $productResponse->json();

    // Check if a warranty already exists for the product
    $existingWarranties = Http::get("http://127.0.0.1:8000/api/warrantycertificate")->json();
    $warrantyExists = false;
    $warrantyId = null;
    $warrantycertificate = null;

    foreach ($existingWarranties as $warranty) {
        if ($warranty['product_id'] == $product['id']) {
            $warrantyExists = true;
            $warrantyId = $warranty['id'];
            break;
        }
    }

    if ($warrantyExists) {
        $warrantycertificate = Http::get("http://127.0.0.1:8000/api/warrantycertificate/{$warrantyId}")->json();
    }

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

    return view('HomeStaff_Manh.orderdetail1', compact('orderDetails', 'customer', 'order', 'product', 'maindiamond', 'payments','exiamond','diamondshell', 'warrantycertificate'));

    }
}
