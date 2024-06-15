<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MainDiamond;
use App\Models\ExtraDiamond;
use App\Models\DiamondShell;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $mainDiamonds = MainDiamond::all();
        $extraDiamonds = ExtraDiamond::all();
        $diamondShells = DiamondShell::all();
        return view('products.create', compact('mainDiamonds', 'extraDiamonds', 'diamondShells'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required|unique:products',
            'product_name' => 'required',
            'main_diamond_id' => 'required|exists:main_diamonds,id',
            'extra_diamond_id' => 'required|exists:extra_diamonds,id',
            'diamond_shell_id' => 'required|exists:diamond_shells,id',
            'price_rate' => 'required|numeric',
            'quantity' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $mainDiamonds = MainDiamond::all();
        $extraDiamonds = ExtraDiamond::all();
        $diamondShells = DiamondShell::all();
        return view('products.edit', compact('product', 'mainDiamonds', 'extraDiamonds', 'diamondShells'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_code' => 'required|unique:products,product_code,' . $product->id,
            'product_name' => 'required',
            'main_diamond_id' => 'required|exists:main_diamonds,id',
            'extra_diamond_id' => 'required|exists:extra_diamonds,id',
            'diamond_shell_id' => 'required|exists:diamond_shells,id',
            'price_rate' => 'required|numeric',
            'quantity' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

