<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DetailShell extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Fetch data from API endpoints
    $products = collect(Http::get('http://127.0.0.1:8000/api/product')->json());
    $mainDiamonds = collect(Http::get('http://127.0.0.1:8000/api/maindiamond')->json());
    $extraDiamonds = collect(Http::get('http://127.0.0.1:8000/api/exdiamond')->json());
    $diamondShells = collect(Http::get('http://127.0.0.1:8000/api/diamondshell')->json());
    $diamondPriceList = collect(Http::get('http://127.0.0.1:8000/api/diamondpricelist')->json());

    // Prepare a mapping for diamond prices
    $diamondPrices = [];
    foreach ($diamondPriceList as $price) {
        $key = "{$price['origin']}_{$price['clarity']}_{$price['color']}_{$price['cut']}_{$price['cara_weight']}";
        $diamondPrices[$key] = $price['price'];
    }

    // Calculate prices for each product
    $products = $products->map(function ($product) use ($mainDiamonds, $extraDiamonds, $diamondShells, $diamondPrices) {
        $mainDiamond = $mainDiamonds->firstWhere('id', $product['main_diamond_id']);
        $extraDiamond = $extraDiamonds->firstWhere('id', $product['extra_diamond_id']);
        $diamondShell = $diamondShells->firstWhere('id', $product['diamond_shell_id']);

        // Ensure all necessary data exists
        if ($mainDiamond && $extraDiamond && $diamondShell) {
            $key = "{$mainDiamond['origin']}_{$mainDiamond['clarity']}_{$mainDiamond['color']}_{$mainDiamond['cut']}_{$mainDiamond['cara_weight']}";
            $mainDiamondPrice = $diamondPrices[$key] ?? 0;

            $extraDiamondPrice = $extraDiamond['price'] ?? 0;
            $diamondShellPrice = $diamondShell['price'] ?? 0;

            // Calculate the final price
            $product['price'] = ($mainDiamondPrice + ($extraDiamondPrice * $product['number_ex_diamond']) + $diamondShellPrice) * $product['price_rate'];
        } else {
            $product['price'] = 0; // Set price to 0 if data is incomplete
        }

        return $product;
    });

    // Return the updated products to the view
    return view('DetailShell_Manh/DetailShell', ['products' => $products]);
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
        $response = Http::get("http://127.0.0.1:8000/api/product/{$id}");
        $product = $response->json();

        return view('DetailShell_Manh/DetailShell', ['product' => $product]);
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