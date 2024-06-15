<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Http::get('http://127.0.0.1:8000/api/product')->json();
        // return view('HomeStaff_Manh.HomeManager', ['products' => $products]);
        return redirect('/home-manager');
    }

    public function create()
    {
        return view('HomeStaff_Manh.createProduct');
    }

    public function store(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/product', $request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Http::get("http://127.0.0.1:8000/api/product/{$id}")->json();
        return view('HomeStaff_Manh.updateProduct', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $response = Http::put("http://127.0.0.1:8000/api/product/{$id}", $request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $response = Http::delete("http://127.0.0.1:8000/api/product/{$id}");
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
