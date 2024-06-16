<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Cart extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         $cart = session()->get('cart', []);
 
         // Calculate total price
         $totalPrice = array_reduce($cart, function ($carry, $item) {
             return $carry + $item['price'];
         }, 0);
 
         return view('Cart_Hoa.CartPage', ['cart' => $cart, 'totalPrice' => $totalPrice]);
     }
 
     public function add(Request $request)
     {
         $item = [
             'id' => uniqid(),
             'type' => $request->input('type', 'product'), // default to 'product' if 'type' is not specified
             'image' => $request->input('image'),
             'name' => $request->input('name'),
             'price' => $request->input('price'),
         ];
 
         if ($item['type'] == 'diamond') {
             $item['carat'] = $request->input('carat');
             $item['color'] = $request->input('color');
             $item['clarity'] = $request->input('clarity');
             $item['cut'] = $request->input('cut');
         } else if ($item['type'] == 'product') {
             $item['ringsize'] = $request->input('ringsize');
         }
 
         $cart = session()->get('cart', []);
         $cart[] = $item;
         session()->put('cart', $cart);
 
         return redirect()->route('cart.index');
     }
 
     public function remove($id)
{
    $cart = session()->get('cart', []);

    // Find the item by id and remove it
    $index = array_search($id, array_column($cart, 'id'));
    if ($index !== false) {
        unset($cart[$index]);
        $cart = array_values($cart); // Re-index array
        session()->put('cart', $cart);
    }

    return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
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