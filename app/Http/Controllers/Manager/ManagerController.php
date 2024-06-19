<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ManagerController extends Controller
{
    //manage employees
    public function index()
    {
        return redirect('/home-manager');
    }

    public function showEmployeeDetail($id)
    {
        $employee = Http::get("http://127.0.0.1:8000/api/employee/{$id}")->json();
        return view('HomeStaff_Manh.EmployeeDetail', ['employee' => $employee]);
    }

    public function updateEmployee(Request $request, $id)
    {
        $response = Http::put("http://127.0.0.1:8000/api/employee/{$id}", $request->all());

        return redirect('/home-manager');
    }
    

    // manage orders
    public function updateOrderStatus(Request $request, $id)
    {

        $response = Http::put("http://127.0.0.1:8000/api/order/{$id}", [
            'status' => $request->status,
        ]);

        if ($response->successful()) {
            return redirect()->route('manager.home')->with('success', 'Order status updated successfully.');
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

    public function destroyOrder($id)
    {
        $response = Http::delete("http://127.0.0.1:8000/api/order/{$id}");

        if ($response->successful()) {
            return redirect()->route('manager.home')->with('success', 'Order deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete order.');
        }
    }

    // manage product

    public function createProduct()
    {
        return view('HomeStaff_Manh.createProduct');
    }

    public function storeProduct(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/product', $request->all());
        return redirect()->route('manager.home')->with('success', 'Product created successfully.');
    }

    public function editProduct($id)
    {
        $product = Http::get("http://127.0.0.1:8000/api/product/{$id}")->json();
        return view('HomeStaff_Manh.updateProduct', ['product' => $product]);
    }

    public function updateProduct(Request $request, $id)
    {
        $response = Http::put("http://127.0.0.1:8000/api/product/{$id}", $request->all());
        return redirect()->route('manager.home')->with('success', 'Product updated successfully.');
    }

    public function destroyProduct($id)
    {
        $response = Http::delete("http://127.0.0.1:8000/api/product/{$id}");
        return redirect()->route('manager.home')->with('success', 'Product deleted successfully.');
    }
}


