<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Modules\Admin\Repositories\BaseRepository\BaseRepository;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $cart = session()->get('cart', []);
    return view('Customer.Cart.CartPage', ['cart' => $cart]);
}

public function add(Request $request)
{
    $product_code = $request->input('product_code'); // Lấy giá trị product_code từ request
    $url = "http://127.0.0.1:8000/api/product/update/{$product_code}"; // Tạo URL với product_code
    $response = Http::get($url); // Gửi yêu cầu GET đến URL
    $id = $response->json('id');
    
    $product = [
        'id' => $id, // Ensure unique ID for each cart item
        'product_name' => $request->input('name'),
        'total_price' => $request->input('total_price'),
        'ringsize' => $request->input('ringsize'),
        'image' => $request->input('image'),
        'product_code' => $request->input('product_code'),
    ];

    $cart = session()->get('cart', []);
    $cart[] = $product;
    session()->put('cart', $cart);

    return redirect()->route('cart.index')->with('success', 'Product added to cart!');
}

public function remove($index)
{
    $cart = session()->get('cart', []);
    if (isset($cart[$index])) {
        unset($cart[$index]);
        session()->put('cart', array_values($cart)); // Re-index array
    }

    return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
}

public function payment()
{
    $cartItems = session()->get('cart', []);
    return view('Customer.Payment.Payment', compact('cartItems'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}