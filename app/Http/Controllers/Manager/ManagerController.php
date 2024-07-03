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
    public function homeManager()
    {
        // Gọi API để lấy dữ liệu
        $employees = collect(Http::get('http://127.0.0.1:8000/api/employee')->json())->whereIn('role_id', [3, 4]);
        $products = Http::get('http://127.0.0.1:8000/api/product')->json();
        $customers = Http::get('http://127.0.0.1:8000/api/customer')->json();
        $payments = Http::get('http://127.0.0.1:8000/api/payment')->json();
        $maindiamonds = Http::get('http://127.0.0.1:8000/api/maindiamond')->json();
        $exdiamonds = Http::get('http://127.0.0.1:8000/api/exdiamond')->json();
        $shelldiamonds = Http::get('http://127.0.0.1:8000/api/diamondshell')->json();
        $diamondpricelists = Http::get('http://127.0.0.1:8000/api/diamondpricelist')->json();
        // Phân trang cho orders
        $orders = Http::get('http://127.0.0.1:8000/api/order')->json();
        $orders = collect($orders);

        // Số dòng trên mỗi trang

        return view('HomeStaff_Manh.HomeManager', compact('employees', 'products', 'customers', 'payments', 'maindiamonds', 'exdiamonds', 'shelldiamonds', 'orders', 'diamondpricelists'));
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

        return view('HomeStaff_Manh.orderdetail', compact('orderDetails', 'customer', 'order', 'product', 'maindiamond', 'payments', 'exiamond', 'diamondshell'));

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

    public function searchOrdersAjax(Request $request)
    {
        $name = $request->customer_name;
        if($name!=null)
            $orders = Http::get("http://127.0.0.1:8000/api/order/search/{$name}")->json();
        else
            $orders = Http::get("http://127.0.0.1:8000/api/order")->json();
        return response()->json(['orders' => $orders], 200);
    }

    // public function searchOrdersAjax(Request $request)
    // {
    //     $orderResponse = Http::get('http://127.0.0.1:8000/api/order', [
    //         'order_date' => $request->order_date
    //     ]);

    //     $orders = $orderResponse->json();

    //     $customerResponse = Http::get('http://127.0.0.1:8000/api/customer',[
    //         'customer_name' => $request->customer_name
    //     ]);
    //     $customers = $customerResponse->json();

    //     $paymentResponse = Http::get('http://127.0.0.1:8000/api/payment');
    //     $payments = $paymentResponse->json();

    //     // $jointable= $order->map(function ($orders, $id) {
    //     //     $single_customer = $customers->where('id',$order->customer_id);
    //     //     return collect($order)->merge($single_customer);
    //     // });

    //     return response()->json([
    //          'jointable' => $jointable,
    //         // 'orders' => $orders,
    //         // 'customers' => $customer,
    //         // 'payments' => $payments,
    //     ]);
    // }

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
        $mainDiamonds = Http::get("http://127.0.0.1:8000/api/maindiamond")->json();
        $extraDiamonds = Http::get("http://127.0.0.1:8000/api/exdiamond")->json();
        $diamondShells = Http::get("http://127.0.0.1:8000/api/diamondshell")->json();
        return view('HomeStaff_Manh.updateProduct', compact('product', 'mainDiamonds', 'extraDiamonds', 'diamondShells'));
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

    public function updatePricelist(Request $request, $id)
    {
        return $response = Http::put("http://127.0.0.1:8000/api/diamondpricelist/{$id}", [
            'price' => $request->price,
        ]);
    }

}