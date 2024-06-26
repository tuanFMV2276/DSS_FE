<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Modules\Admin\Repositories\BaseRepository\BaseRepository;

class ListProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'price_asc');
        $priceRange = $request->query('price_range', '');

        $products = collect(Http::get('http://127.0.0.1:8000/api/product')->json());
        $mainDiamonds = collect(Http::get('http://127.0.0.1:8000/api/maindiamond')->json());
        $extraDiamonds = collect(Http::get('http://127.0.0.1:8000/api/exdiamond')->json());
        $diamondShells = collect(Http::get('http://127.0.0.1:8000/api/diamondshell')->json());
        $diamondPriceList = collect(Http::get('http://127.0.0.1:8000/api/diamondpricelist')->json());

        if ($priceRange) {
            list($min, $max) = strpos($priceRange, '-') !== false ? explode('-', $priceRange) : [$priceRange, PHP_INT_MAX];
            $products = $products->filter(function ($product) use ($min, $max) {
                $productPrice = $product['total_price'];
                return $productPrice >= $min && $productPrice <= $max;
            });
        }

        if ($sort == 'price_asc') {
            $products = $products->sortBy('total_price');
        } elseif ($sort == 'price_desc') {
            $products = $products->sortByDesc('total_price');
        }

        return view('Customer.ListProduct.ListProductPage', ['products' => $products]);
    }

    public function filterProducts(Request $request)
    {
        $sort = $request->query('sort', 'price_asc');
        $priceRange = $request->query('price_range', '');
    
        $products = collect(Http::get('http://127.0.0.1:8000/api/product')->json());
        
        if ($priceRange) {
            list($min, $max) = strpos($priceRange, '-') !== false ? explode('-', $priceRange) : [$priceRange, PHP_INT_MAX];
            $products = $products->filter(function ($product) use ($min, $max) {
                $productPrice = $product['total_price'];
                return $productPrice >= $min && $productPrice <= $max;
            });
        }
    
        if ($sort == 'price_asc') {
            $products = $products->sortBy('total_price');
        } elseif ($sort == 'price_desc') {
            $products = $products->sortByDesc('total_price');
        }
    
        return response()->json($products->values()->all()); // Ensure it's an array
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