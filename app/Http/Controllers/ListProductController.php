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
        $productName = $request->query('product_name', '');

        $products = collect(Http::get('http://127.0.0.1:8000/api/product')->json());
        $mainDiamonds = collect(Http::get('http://127.0.0.1:8000/api/maindiamond')->json());
        $extraDiamonds = collect(Http::get('http://127.0.0.1:8000/api/exdiamond')->json());
        $diamondShells = collect(Http::get('http://127.0.0.1:8000/api/diamondshell')->json());
        $diamondPriceList = collect(Http::get('http://127.0.0.1:8000/api/diamondpricelist')->json());

        if ($productName) {
            $products = $products->filter(function ($product) use ($productName) {
                // Điều kiện lọc theo tên sản phẩm
                return $product['product_name'] == $productName;
            });
        }

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
    $productName = $request->query('product_name', '');

    $products = collect(Http::get('http://127.0.0.1:8000/api/product')->json());

    // Lọc sản phẩm theo product_name nếu có
    if ($productName) {
        $products = $products->filter(function ($product) use ($productName) {
            return $product['product_name'] == $productName;
        });
    }

    // Lọc sản phẩm theo price_range nếu có
    if ($priceRange) {
        list($minPrice, $maxPrice) = explode('-', $priceRange) + [0, INF];
        $products = $products->filter(function ($product) use ($minPrice, $maxPrice) {
            return $product['total_price'] >= $minPrice && $product['total_price'] <= $maxPrice;
        });
    }

    // Sắp xếp sản phẩm
    if ($sort === 'price_desc') {
        $products = $products->sortByDesc('total_price');
    } else {
        $products = $products->sortBy('total_price');
    }

    return response()->json($products->values()->all());
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