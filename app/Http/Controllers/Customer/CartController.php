<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
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
    $userId = Session::get('id');
    $cart = session()->get("cart_{$userId}", []);
    return view('Customer.Cart.CartPage', ['cart' => $cart]);
}

public function add(Request $request)
    {
        $userId = Session::get('id');
        $product_code = $request->input('product_code');
        $url = "http://127.0.0.1:8000/api/product/update/{$product_code}";
        $response = Http::get($url);
        $id = $response->json('id');

        $product = [
            'id' => $id,
            'product_name' => $request->input('name'),
            'total_price' => $request->input('total_price'),
            'ringsize' => $request->input('ringsize'),
            'image' => $request->input('image'),
            'product_code' => $request->input('product_code'),
        ];

        $cart = session()->get("cart_{$userId}", []);
        $cart[] = $product;
        session()->put("cart_{$userId}", $cart);

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function remove($index)
    {
        $userId = Session::get('id');
        $cart = session()->get("cart_{$userId}", []);
        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put("cart_{$userId}", array_values($cart));
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

    public function payment()
    {
        $userId = Session::get('id');
        $cartItems = session()->get("cart_{$userId}", []);
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