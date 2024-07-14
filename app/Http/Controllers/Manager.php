<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Manager extends Controller
{
    public function index(){
        $employee = Http::get('http://127.0.0.1:8000/api/employee')->json();
        return view('');
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

    public function createMainDiamond(){
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
            $imageName = NULL;
        }
        $newMeasurements = $request->measurements." mm";
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

    public function editMainDiamond($id){
        $main_diamond = Http::get("http://127.0.0.1:8000/api/maindiamond/{$id}")->json();
        return view('HomeManager.updateMainDiamond', compact('main_diamond'));
    }

    public function updateMainDiamond(Request $request,$id)
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

    public function deleteMainDiamond($id){
        $response = Http::put("http://127.0.0.1:8000/api/maindiamond/{$id}", ['status' => 0]);

        if ($response->successful()) {
            return redirect()->route('manager.home')->with('success', 'Main Diamond deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete main diamond.');
        }
    }

    //Extra Diamond CRUD section

    public function createExDiamond(){
        return view('HomeManager.createExDiamond');
    }

    public function storeExDiamond(Request $request){
        $response = Http::post('http://127.0.0.1:8000/api/exdiamond/' ,$request->all());
        return redirect()->route('manager.home')->with('success', 'Extra Diamond created successfully.');
    }

    public function editExDiamond($id){
        $ex_diamond = Http::get("http://127.0.0.1:8000/api/exdiamond/{$id}")->json();
        return view('HomeManager.updateExDiamond', compact('ex_diamond'));
    }

    public function updateExDiamond(Request $request,$id){
        $response = Http::put("http://127.0.0.1:8000/api/exdiamond/{$id}", $request->all());
        return redirect()->route('manager.home')->with('success', 'Extra Diamond updated successfully.');
    }

    public function deleteExDiamond($id){
        $response = Http::put("http://127.0.0.1:8000/api/exdiamond/{$id}", ['status' => 0]);

        if ($response->successful()) {
            return redirect()->route('manager.home')->with('success', 'Order status updated successfully.');
        } else {
            return back()->with('error', 'Failed to update order status.');
        }
    }

    //Diamond Shell CRUD section

    public function createDiamondShell(){
        return view('HomeManager.createDiamondShell');
    }

    public function storeDiamondShell(Request $request){
        if ($request->hasFile('image')) {
            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageSize = $image->getSize();
            $image->move(public_path('Picture_Product'), $imageName);
        } else {
            $imageName = NULL;
        }

        $response = Http::post('http://127.0.0.1:8000/api/diamondshell/', [
            'name' => $request->name,
            'image' => $imageName,
            'price' => $request->price,
            'status' => $request->status,
            'weight' => $request->weight,
            'material_id' => $request->material_id,
        ]);
        return redirect()->route('manager.home')->with('success', 'Diamond Shell created successfully.');
    }

    public function editDiamondShell($id){
        $diamond_shell = Http::get("http://127.0.0.1:8000/api/diamondshell/{$id}")->json();
        return view('HomeManager.updateDiamondShell', compact('diamond_shell'));
    }

    public function updateDiamondShell(Request $request,$id){
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

        $response = Http::put("http://127.0.0.1:8000/api/diamondshell/{$request->$id}", [
            'name' => $request->name,
            'image' => $imageName,
            'price' => $request->price,
            'status' => $request->status,
            'weight' => $request->weight,
            'material_id' => $request->material_id,
        ]);
        return redirect()->route('manager.home')->with('success', 'Diamond Shell updated successfully.');
    }

    public function deleteDiamondShell(Request $request,$id){
        $response = Http::put("http://127.0.0.1:8000/api/diamondshell/{$id}",['status' => 0]);

        if ($response->successful()) {
            return redirect()->route('manager.home')->with('success', 'Order status updated successfully.');
        } else {
            return back()->with('error', 'Failed to update order status.');
        }
    }

    //Material CRUD section

    public function createMaterial(){
        return view('HomeManager.createDiamondShell');
    }

    public function storeMaterial(Request $request){
        if ($request->hasFile('image')) {
            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageSize = $image->getSize();
            $image->move(public_path('Picture_Product'), $imageName);
        }

        $response = Http::post('http://127.0.0.1:8000/api/diamondshell/', [
            'name' => $request->name,
            'image' => $imageName,
            'price' => $request->price,
            'status' => $request->status,
        ]);
        return redirect()->route('manager.home')->with('success', 'Extra Diamond created successfully.');
    }

    public function editMaterial($id){
        $diamond_shell = Http::get("http://127.0.0.1:8000/api/diamondshell/{$id}")->json();
        return view('HomeManager.updateDiamondShell', compact('diamond_shell'));
    }

    public function updateMaterial(Request $request,$id){
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

        return $response = Http::put("http://127.0.0.1:8000/api/diamondshell/{$request->$id}", [
            'name' => $request->name,
            'image' => $imageName,
            'price' => $request->price,
            'status' => $request->status,
            'weight' => $request->weight,
            'material_id' => $request->material_id,
        ]);
    }

    public function deleteMaterial(Request $request,$id){
        $response = Http::put("http://127.0.0.1:8000/api/diamondshell/{$id}",['status' => 0]);

        if ($response->successful()) {
            return redirect()->route('manager.home')->with('success', 'Order status updated successfully.');
        } else {
            return back()->with('error', 'Failed to update order status.');
        }
    }
    

    
}
