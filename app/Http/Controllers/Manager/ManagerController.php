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

        return view('HomeManager.HomeManager', compact('employees', 'products', 'customers', 'payments', 'maindiamonds', 'exdiamonds', 'shelldiamonds', 'orders', 'diamondpricelists'));
    }

    public function showEmployeeDetail($id)
    {
        $employee = Http::get("http://127.0.0.1:8000/api/employee/{$id}")->json();
        return view('HomeManager.EmployeeDetail', ['employee' => $employee]);
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

        return view('HomeManager.orderdetail', compact('orderDetails', 'customer', 'order', 'product', 'maindiamond', 'payments', 'exiamond', 'diamondshell', 'warrantycertificate'));

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
        if ($name != null) {
            $orders = Http::get("http://127.0.0.1:8000/api/order/search/{$name}")->json();
        } else {
            $orders = Http::get("http://127.0.0.1:8000/api/order")->json();
        }

        return response()->json(['orders' => $orders], 200);
    }

    public function createProduct()
    {
        // Get all products
        $response = Http::get('http://127.0.0.1:8000/api/product');
        $products = $response->json();

        // Find the latest product code
        $latestProductCode = '';
        foreach ($products as $product) {
            if ($latestProductCode == '' || $product['product_code'] > $latestProductCode) {
                $latestProductCode = $product['product_code'];
            }
        }

        // Generate the new product code
        $number = (int) substr($latestProductCode, 2); // Get the numeric part
        $newNumber = $number + 1;
        $newProductCode = 'PD' . str_pad($newNumber, 3, '0', STR_PAD_LEFT); // Format the new code

        // Fetch data for the dropdowns
        $mainDiamonds = Http::get("http://127.0.0.1:8000/api/maindiamond")->json();
        $extraDiamonds = Http::get("http://127.0.0.1:8000/api/exdiamond")->json();
        $diamondShells = Http::get("http://127.0.0.1:8000/api/diamondshell")->json();

        return view('HomeManager.createProduct', compact('newProductCode', 'mainDiamonds', 'extraDiamonds', 'diamondShells'));
    }

    public function storeProduct(Request $request)
    {
        //image upload function
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Picture_Product'), $imageName);
        } else {
            $imageName = null;
        }

        //main diamond status function
        Http::put("http://127.0.0.1:8000/api/maindiamond/{$request->main_diamond_id}", ['status' => 0]);

        //shell diamond status function
        Http::put("http://127.0.0.1:8000/api/diamondshell/{$request->diamond_shell_id}", ['status' => 0]);

        //extra diamond status function
        if ($request->extra_diamond_id != null) {
            $extraDiamond = Http::get("http://127.0.0.1:8000/api/exdiamond/{$request->extra_diamond_id}")->json();
            $update_number = $extraDiamond['quantity'] - $request->number_ex_diamond;
            Http::put("http://127.0.0.1:8000/api/exdiamond/{$request->extra_diamond_id}", ['quantity' => $update_number]);
        }

        $response = Http::post('http://127.0.0.1:8000/api/product', [
            "product_code" => $request->product_code,
            "product_name" => $request->product_name,
            "main_diamond_id" => $request->main_diamond_id,
            "extra_diamond_id" => $request->extra_diamond_id,
            "number_ex_diamond" => $request->number_ex_diamond,
            "quantity" => $request->quantity,
            "diamond_shell_id" => $request->diamond_shell_id,
            "size" => $request->size,
            "price_rate" => $request->price_rate,
            "status" => $request->status,
            'image' => $imageName,
        ]);

        return redirect()->route('manager.home')->with('success', 'Product created successfully.');
    }

    public function editProduct($id)
    {
        $product = Http::get("http://127.0.0.1:8000/api/product/{$id}")->json();
        $mainDiamonds = Http::get("http://127.0.0.1:8000/api/maindiamond")->json();
        $extraDiamonds = Http::get("http://127.0.0.1:8000/api/exdiamond")->json();
        $diamondShells = Http::get("http://127.0.0.1:8000/api/diamondshell")->json();
        return view('HomeManager.updateProduct', compact('product', 'mainDiamonds', 'extraDiamonds', 'diamondShells'));
    }

    public function updateProduct(Request $request, $id)
    {
        //image upload function
        if ($request->hasFile('image')) {
            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageSize = $image->getSize();
            $image->move(public_path('Picture_Product'), $imageName);

            // Delete the old image if exists
            if ($request->image) {
                $oldImagePath = public_path('Picture_Product/' . $request->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        } else {
            $imageName = $request->image;
        }

        //main diamond status function
        if ($request->old_main_diamond != $request->main_diamond_id) {
            Http::put("http://127.0.0.1:8000/api/maindiamond/{$request->old_main_diamond}", ['status' => 1]);
            Http::put("http://127.0.0.1:8000/api/maindiamond/{$request->main_diamond_id}", ['status' => 0]);
        }

        //shell diamond status function
        if ($request->old_shell_diamond != $request->diamond_shell_id) {
            Http::put("http://127.0.0.1:8000/api/diamondshell/{$request->old_shell_diamond}", ['status' => 1]);
            Http::put("http://127.0.0.1:8000/api/diamondshell/{$request->diamond_shell_id}", ['status' => 0]);
        }

        //extra diamond status function
        if ($request->extra_diamond_id == $request->old_ex_diamond) {
            $change_value = $request->number_ex_diamond - $request->old_number_ex_diamond;
            $extraDiamond = Http::get("http://127.0.0.1:8000/api/exdiamond/{$request->extra_diamond_id}")->json();
            $update_number = $extraDiamond['quantity'] - $change_value;
            Http::put("http://127.0.0.1:8000/api/exdiamond/{$request->extra_diamond_id}", ['quantity' => $update_number]);
        } else if ($request->extra_diamond_id == null && $request->old_ex_diamond != null) {
            $extraDiamond = Http::get("http://127.0.0.1:8000/api/exdiamond/{$request->old_ex_diamond}")->json();
            $update_number = $extraDiamond['quantity'] + $request->old_number_ex_diamond;
            Http::put("http://127.0.0.1:8000/api/exdiamond/{$request->old_ex_diamond}", ['quantity' => $update_number]);
        } else if ($request->extra_diamond_id != null && $request->old_ex_diamond == null) {
            $extraDiamond = Http::get("http://127.0.0.1:8000/api/exdiamond/{$request->extra_diamond_id}")->json();
            $update_number = $extraDiamond['quantity'] - $request->number_ex_diamond;
            Http::put("http://127.0.0.1:8000/api/exdiamond/{$request->extra_diamond_id}", ['quantity' => $update_number]);
        } else {
            $extraDiamond = Http::get("http://127.0.0.1:8000/api/exdiamond/{$request->extra_diamond_id}")->json();
            $oldExtra = Http::get("http://127.0.0.1:8000/api/exdiamond/{$request->old_ex_diamond}")->json();
            $old_value = $oldExtra['quantity'] + $request->old_number_ex_diamond;
            $new_value = $extraDiamond['quantity'] - $request->number_ex_diamond;
            Http::put("http://127.0.0.1:8000/api/exdiamond/{$request->extra_diamond_id}", ['quantity' => $new_value]);
            Http::put("http://127.0.0.1:8000/api/exdiamond/{$request->old_ex_diamond}", ['quantity' => $old_value]);
        }

        $response = Http::put("http://127.0.0.1:8000/api/product/{$id}", [
            "product_name" => $request->product_name,
            "main_diamond_id" => $request->main_diamond_id,
            "extra_diamond_id" => $request->extra_diamond_id,
            "number_ex_diamond" => $request->number_ex_diamond,
            "quantity" => $request->quantity,
            "diamond_shell_id" => $request->diamond_shell_id,
            "size" => $request->size,
            "price_rate" => $request->price_rate,
            "status" => $request->status,
            'image' => $imageName,
        ]);
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
    public function createPrice()
    {
        return view('HomeManager.createPrice');
    }

    public function storePrice(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/diamondpricelist', $request->all());
        return redirect()->route('manager.home')->with('success', 'New price created successfully.');
    }
    public function destroyPrice($id)
    {
        $response = Http::delete("http://127.0.0.1:8000/api/diamondpricelist/{$id}");
        return redirect()->route('manager.home')->with('success', 'Old price deleted successfully.');
    }

    public function createMainDiamond(Request $request)
    {
        //image upload function
        if ($request->hasFile('image')) {
            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageSize = $image->getSize();
            $image->move(public_path('Picture_Product'), $imageName);
        } else {
            $imageName = NULL;
        }
        return $response = Http::post('http://127.0.0.1:8000/api/maindiamond/', [
            'image' => $imageName
        ] ,$request->all());
    }

    public function updateMainDiamond(Request $request)
    {
        if ($request->hasFile('image')) {
            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageSize = $image->getSize();
            $image->move(public_path('Picture_Product'), $imageName);

            // Delete the old image if exists
            if ($request->image) {
                $oldImagePath = public_path('Picture_Product/' . $request->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        } else {
            $imageName = $request->image;
        }

        return $response = Http::put("http://127.0.0.1:8000/api/maindiamond/{$request->$id}", ['image' => $imageName] ,$request->all());
    }

    public function deleteMainDiamond($id){
        $response = Http::delete("http://127.0.0.1:8000/api/maindiamond/{$id}");

        if ($response->successful()) {
            return redirect()->route('manager.home')->with('success', 'Order status updated successfully.');
        } else {
            return back()->with('error', 'Failed to update order status.');
        }
    }

    public function createExDiamond(Request $request){
        if ($request->hasFile('image')) {
            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageSize = $image->getSize();
            $image->move(public_path('Picture_Product'), $imageName);
        } else {
            $imageName = NULL;
        }

        return $response = Http::post('http://127.0.0.1:8000/api/exdiamond/', [
            'image' => $imageName,
            ] ,$request->all());
    }

    public function updateExDiamond(Request $request){
        if ($request->hasFile('image')) {
            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageSize = $image->getSize();
            $image->move(public_path('Picture_Product'), $imageName);

            // Delete the old image if exists
            if ($request->image) {
                $oldImagePath = public_path('Picture_Product/' . $request->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        } else {
            $imageName = $request->image;
        }

        return $response = Http::put("http://127.0.0.1:8000/api/exdiamond/{$request->$id}", ['image' => $imageName] ,$request->all());
    }

    public function deleteExDiamond(Request $request){
        $response = Http::delete("http://127.0.0.1:8000/api/exdiamond/{$id}");

        if ($response->successful()) {
            return redirect()->route('manager.home')->with('success', 'Order status updated successfully.');
        } else {
            return back()->with('error', 'Failed to update order status.');
        }
    }

    public function createDiamondShell(Request $request){
        if ($request->hasFile('image')) {
            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageSize = $image->getSize();
            $image->move(public_path('Picture_Product'), $imageName);
        } else {
            $imageName = NULL;
        }

        return $response = Http::post('http://127.0.0.1:8000/api/diamondshell/', [
            'image' => $imageName,
            ] ,$request->all());
    }

    public function updateDiamondShell(Request $request){
        if ($request->hasFile('image')) {
            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageSize = $image->getSize();
            $image->move(public_path('Picture_Product'), $imageName);

            // Delete the old image if exists
            if ($request->image) {
                $oldImagePath = public_path('Picture_Product/' . $request->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        } else {
            $imageName = $request->image;
        }

        return $response = Http::put("http://127.0.0.1:8000/api/diamondshell/{$request->$id}", ['image' => $imageName] ,$request->all());
    }

    public function deleteDiamondShell(Request $request){
        $response = Http::delete("http://127.0.0.1:8000/api/diamondshell/{$id}");

        if ($response->successful()) {
            return redirect()->route('manager.home')->with('success', 'Order status updated successfully.');
        } else {
            return back()->with('error', 'Failed to update order status.');
        }
    }

}
