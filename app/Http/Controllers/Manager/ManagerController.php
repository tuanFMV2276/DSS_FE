<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;

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
        $employees = collect(Http::get('http://127.0.0.1:8000/api/user')->json())->whereIn('role', ["salestaff", "deliverystaff"]);
        $products = collect(Http::get('http://127.0.0.1:8000/api/product')->json())->reverse();
        // $customers = Http::get('http://127.0.0.1:8000/api/customer')->json();
        $payments = Http::get('http://127.0.0.1:8000/api/payment')->json();
        $maindiamonds = collect(Http::get('http://127.0.0.1:8000/api/maindiamond')->json())->sortBy('id');
        $exdiamonds = Http::get('http://127.0.0.1:8000/api/exdiamond')->json();
        $shelldiamonds = collect(Http::get('http://127.0.0.1:8000/api/diamondshell')->json())->sortBy('id');
        $material = Http::get('http://127.0.0.1:8000/api/material')->json();
        $diamondpricelists = Http::get('http://127.0.0.1:8000/api/diamondpricelist')->json();
        $product_data = Http::get('http://127.0.0.1:8000/home_manager/product/data')->json();
        $product_for_sale = $product_data['for_sale_product'][0]['total_product'];
        $available_product = $product_data['available_product'][0]['total_product'];
        $total_user_data = Http::get('http://127.0.0.1:8000/home_manager/user/data')->json();
        $total_user = $total_user_data[0]['total_user'];
        $total_sale = Http::get('http://127.0.0.1:8000/home_manager/for_sale/data')->json();
        
        $orders = collect(Http::get('http://127.0.0.1:8000/api/order')->json())->reverse();
        $recentOrders = $orders->sortByDesc('order_date')->take(5);

  
        return view('HomeManager.HomeManager', compact('employees', 'products', 'payments', 'maindiamonds', 'exdiamonds', 'shelldiamonds', 'material', 'orders', 'diamondpricelists', 'product_for_sale', 'available_product', 'total_user', 'total_sale', 'recentOrders'));
    }

    //Employee function

    public function showEmployeeDetail($id)
    {
        $employee = Http::get("http://127.0.0.1:8000/api/user/{$id}")->json();
        return view('HomeManager.EmployeeDetail', ['employee' => $employee]);
    }

    public function updateEmployee(Request $request, $id)
    {
        $response = Http::put("http://127.0.0.1:8000/api/user/{$id}", $request->all());

        return redirect('/home-manager');
    }

    //Orders CRUD section

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

        $orders = Http::get("http://127.0.0.1:8000/order/search/{$request->customer_Name}/{$request->order_Date}")->json();

        return response()->json(['orders' => $orders], 200);
    }

    //Product CRUD section

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
        $mainDiamonds = collect(Http::get('http://127.0.0.1:8000/api/maindiamond')->json())->sortBy('id');
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
        $mainDiamonds = collect(Http::get('http://127.0.0.1:8000/api/maindiamond')->json())->sortBy('id');
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
        $response = Http::put("http://127.0.0.1:8000/api/product/{$id}", ['status' => 0]);
        return redirect()->route('manager.home')->with('success', 'Product deleted successfully.');
    }

    //Price CRUD section

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

    //Main Diamond CRUD section

    public function createMainDiamond()
    {
        return view('HomeManager.createMainDiamond');
    }

    public function storeMainDiamond(Request $request)
    {
        //image upload function
        if ($request->hasFile('image')) {
            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageSize = $image->getSize();
            $image->move(public_path('Picture_Product'), $imageName);
        } else {
            $imageName = null;
        }
        $newMeasurements = $request->measurements . " mm";
        $response = Http::post('http://127.0.0.1:8000/api/maindiamond/', [
            "shape" => $request->shape,
            "origin" => $request->origin,
            "cara_weight" => $request->cara_weight,
            "clarity" => $request->clarity,
            "color" => $request->color,
            "image" => $imageName,
            "describe" => $request->describe,
            "quantity" => $request->quantity,
            "cut" => $request->cut,
            "polish" => $request->polish,
            "symmetry" => $request->symmetry,
            "measurements" => $newMeasurements,
            "culet" => $request->culet,
            "fluorescence" => $request->fluorescence,
            "status" => $request->status,
        ]);
        return redirect()->route('manager.home')->with('success', 'Main Diamond created successfully.');
    }

    public function editMainDiamond($id)
    {
        $main_diamond = Http::get("http://127.0.0.1:8000/api/maindiamond/{$id}")->json();
        return view('HomeManager.updateMainDiamond', compact('main_diamond'));
    }

    public function updateMainDiamond(Request $request, $id)
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

        $response = Http::put("http://127.0.0.1:8000/api/maindiamond/{$id}", [
            "shape" => $request->shape,
            "origin" => $request->origin,
            "cara_weight" => $request->cara_weight,
            "clarity" => $request->clarity,
            "color" => $request->color,
            "image" => $imageName,
            "describe" => $request->describe,
            "quantity" => $request->quantity,
            "cut" => $request->cut,
            "polish" => $request->polish,
            "symmetry" => $request->symmetry,
            "measurements" => $request->measurements,
            "culet" => $request->culet,
            "fluorescence" => $request->fluorescence,
            "status" => $request->status,
        ]);
        return redirect()->route('manager.home')->with('success', 'Main Diamond updated successfully.');
    }

    public function deleteMainDiamond($id)
    {
        $response = Http::put("http://127.0.0.1:8000/api/maindiamond/{$id}", ['status' => 0]);

        if ($response->successful()) {
            return redirect()->route('manager.home')->with('success', 'Main Diamond deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete main diamond.');
        }
    }

    //Extra Diamond CRUD section

    public function createExDiamond()
    {
        return view('HomeManager.createExDiamond');
    }

    public function storeExDiamond(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/exdiamond/', $request->all());
        return redirect()->route('manager.home')->with('success', 'Extra Diamond created successfully.');
    }

    public function editExDiamond($id)
    {
        $ex_diamond = Http::get("http://127.0.0.1:8000/api/exdiamond/{$id}")->json();
        return view('HomeManager.updateExDiamond', compact('ex_diamond'));
    }

    public function updateExDiamond(Request $request, $id)
    {
        $response = Http::put("http://127.0.0.1:8000/api/exdiamond/{$id}", $request->all());
        return redirect()->route('manager.home')->with('success', 'Extra Diamond updated successfully.');
    }

    public function deleteExDiamond($id)
    {
        $response = Http::put("http://127.0.0.1:8000/api/exdiamond/{$id}", ['status' => 0]);

        if ($response->successful()) {
            return redirect()->route('manager.home')->with('success', 'Order status updated successfully.');
        } else {
            return back()->with('error', 'Failed to update order status.');
        }
    }

    //Diamond Shell CRUD section

    public function storeDiamondShell(Request $request)
    {
        if ($request->hasFile('image')) {
            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageSize = $image->getSize();
            $image->move(public_path('Picture_Product'), $imageName);
        } else {
            $imageName = null;
        }

        $shelldiamonds = Http::get('http://127.0.0.1:8000/api/diamondshell')->json();
        $total_maleShell = 0;
        $total_femaleShell = 0;

        foreach ($shelldiamonds as $key => $value) {
            $pattern = '/\b(Nữ|Nam)\b/';
            preg_match($pattern, $value['name'], $matches);
            $result = !empty($matches) ? $matches[0] : "";

            if ($result === "Nam") {
                $total_maleShell++;
            } else if ($result === "Nữ") {
                $total_femaleShell++;
            }
        }

        preg_match($pattern, $request->name, $matches);
        $filter = !empty($matches) ? $matches[0] : null;
        if ($filter == "Nam") {
            $complete_name = $request->name . ' ' . 'R' . ($total_maleShell + 1);
        } else {
            $complete_name = $request->name . ' ' . 'R' . ($total_femaleShell + 1);
        }

        $response = Http::post('http://127.0.0.1:8000/api/diamondshell/', [
            'name' => $complete_name,
            'image' => $imageName,
            'weight' => $request->weight,
            'status' => $request->status,
            'material_id' => $request->material_id,
        ]);

        return redirect()->route('manager.home')->with('success', 'Diamond Shell created successfully.');
    }

    public function editDiamondShell($id)
    {
        $diamond_shell = Http::get("http://127.0.0.1:8000/api/diamondshell/{$id}")->json();
        $material = Http::get("http://127.0.0.1:8000/api/material")->json();
        return view('HomeManager.updateDiamondShell', compact('diamond_shell', 'material'));
    }

    public function updateDiamondShell(Request $request, $id)
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

        if ($request->name != $request->old_name) {
            $shelldiamonds = Http::get('http://127.0.0.1:8000/api/diamondshell')->json();

            $pattern = '/\s*R\d*$/';
            preg_match($pattern, $request->old_name, $matches);
            $result = !empty($matches) ? $matches[0] : "";

            // Remove existing tail if present
            $request->name = preg_replace($pattern, '', $request->name);

            // Append the new tail
            $request->name .= ' ' . $result;

        }

        $response = Http::put("http://127.0.0.1:8000/api/diamondshell/{$id}", [
            'name' => $request->name,
            'image' => $imageName,
            'weight' => $request->weight,
            'status' => $request->status,
            'material_id' => $request->material_id,
        ]);
        return redirect()->route('manager.home')->with('success', 'Diamond Shell updated successfully.');
    }

    public function deleteDiamondShell(Request $request, $id)
    {
        $response = Http::put("http://127.0.0.1:8000/api/diamondshell/{$id}", ['status' => 0]);

        if ($response->successful()) {
            return redirect()->route('manager.home')->with('success', 'Shell status updated successfully.');
        } else {
            return back()->with('error', 'Failed to update order status.');
        }
    }

    //Material CRUD section

    public function createMaterial()
    {
        return view('HomeManager.createMaterial');
    }

    public function storeMaterial(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/material/', [
            'material_name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
        ]);
        return redirect()->route('manager.home')->with('success', 'Material created successfully.');
    }

    public function editMaterial($id)
    {
        $material = Http::get("http://127.0.0.1:8000/api/material/{$id}")->json();
        return view('HomeManager.updateMaterial', compact('material'));
    }

    // public function updateMaterial(Request $request, $id)
    // {

    //     $response = Http::put("http://127.0.0.1:8000/api/material/{$request->$id}", [
    //         'material_name' => $request->name,
    //         'price' => $request->price,
    //         'status' => $request->status,
    //     ]);
    //     return redirect()->route('manager.home')->with('success', 'Material created successfully.');
    // }
    public function updateMaterial(Request $request, $id)
    {
        return $response = Http::put("http://127.0.0.1:8000/api/material/{$id}", [
            'price' => $request->price,
        ]);
    }

    public function deleteMaterial(Request $request, $id)
    {
        $response = Http::put("http://127.0.0.1:8000/api/material/{$id}", ['status' => 0]);

        if ($response->successful()) {
            return redirect()->route('manager.home')->with('success', 'Order status updated successfully.');
        } else {
            return back()->with('error', 'Failed to update order status.');
        }
    }
    public function generatePDF($id)
    {
        // Lấy thông tin giấy bảo hành
        $warranty = Http::get("http://127.0.0.1:8000/api/warrantycertificate/{$id}")->json();
        $productId = $warranty['product_id'];

        // Lấy thông tin sản phẩm dựa trên productId
        $product = Http::get("http://127.0.0.1:8000/api/product/{$productId}")->json(); // Sửa URL nếu cần

        // Lấy thông tin chi tiết đơn hàng
        $existingOrderDetails = Http::get("http://127.0.0.1:8000/api/orderdetail")->json();
        $existing = false;

        foreach ($existingOrderDetails as $orderdetail) {
            if ($orderdetail['product_id'] == $product['id']) {
                $existing = true;
                $Orderid = $orderdetail['order_id'];
                break;
            }
        }

        if ($existing) {
            // Lấy thông tin đơn hàng dựa trên order_id
            $order = Http::get("http://127.0.0.1:8000/api/order/{$Orderid}")->json(); // Sửa URL nếu cần
        } else {
            $order = null;
        }

        // Load view và truyền dữ liệu vào
        $pdf = PDF::loadView('HomeManager.warrantyPDF', compact('warranty', 'product', 'order'));

        // Tải về file PDF
        return $pdf->download('warranty.pdf');
    }
    public function download(Request $request, $id)
    {
        $certificate = WarrantyCertificate::find($id);

        if (!$certificate) {
            return response()->json(['error' => 'Certificate not found'], 404);
        }

        $pathToFile = storage_path('app/public/' . $certificate->file_path);

        return response()->download($pathToFile);
    }
}
