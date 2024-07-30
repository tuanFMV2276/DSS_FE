<?php

namespace App\Http\Controllers\Customer;

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
        $material = $request->query('material', '');
        $shape = $request->query('shape', '');
        $carat = $request->query('carat', '');
        $cut = $request->query('cut', '');
        $color = $request->query('color', '');
        $clarity = $request->query('clarity', '');

        $products = collect(Http::get('http://127.0.0.1:8000/api/product')->json());

        $products = $products->filter(function ($product) {
            return $product['status'] != 0;
        });

        if ($productName) {
            $products = $products->filter(function ($product) use ($productName) {
                return $product['product_name'] == $productName;
            });
        }

        if ($priceRange) {
            list($minPrice, $maxPrice) = explode('-', $priceRange) + [0, INF];
            $products = $products->filter(function ($product) use ($minPrice, $maxPrice) {
                return $product['total_price'] >= $minPrice && $product['total_price'] <= $maxPrice;
            });
        }

        if ($material) {
            $products = $products->filter(function ($product) use ($material) {
                return $product['material_name'] == $material;
            });
        }

        if ($shape) {
            $products = $products->filter(function ($product) use ($shape) {
                return $product['shape'] == $shape;
            });
        }

        if ($carat) {
            list($minCarat, $maxCarat) = explode('-', $carat) + [0, INF];
            $products = $products->filter(function ($product) use ($minCarat, $maxCarat) {
                $productCarat = $product['cara_weight'];
                return $productCarat >= $minCarat && $productCarat <= $maxCarat;
            });
        }

        if ($cut) {
            $products = $products->filter(function ($product) use ($cut) {
                return $product['cut'] == $cut;
            });
        }

        if ($color) {
            $products = $products->filter(function ($product) use ($color) {
                return $product['color'] == $color;
            });
        }

        if ($clarity) {
            $products = $products->filter(function ($product) use ($clarity) {
                return $product['clarity'] == $clarity;
            });
        }

        if ($sort === 'price_desc') {
            $products = $products->sortByDesc('total_price');
        } else {
            $products = $products->sortBy('total_price');
        }

        return view('Customer.ListProduct.ListProductPage', ['products' => $products]);
    }

    /**
     * Filter products based on request parameters and return JSON response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filterProducts(Request $request)
    {
        $sort = $request->query('sort', 'price_asc');
        $priceRange = $request->query('price_range', '');
        $productName = $request->query('product_name', '');
        $material = $request->query('material', '');
        $shape = $request->query('shape', '');
        $carat = $request->query('carat', '');
        $cut = $request->query('cut', '');
        $color = $request->query('color', '');
        $clarity = $request->query('clarity', '');

        $products = collect(Http::get('http://127.0.0.1:8000/api/product')->json());

        $products = $products->filter(function ($product) {
            return $product['status'] != 0;
        });

        if ($productName) {
            $products = $products->filter(function ($product) use ($productName) {
                return $product['product_name'] == $productName;
            });
        }

        if ($priceRange) {
            list($minPrice, $maxPrice) = explode('-', $priceRange) + [0, INF];
            $products = $products->filter(function ($product) use ($minPrice, $maxPrice) {
                return $product['total_price'] >= $minPrice && $product['total_price'] <= $maxPrice;
            });
        }

        if ($material) {
            $products = $products->filter(function ($product) use ($material) {
                return $product['material_name'] == $material;
            });
        }

        if ($shape) {
            $products = $products->filter(function ($product) use ($shape) {
                return $product['shape'] == $shape;
            });
        }

        if ($carat) {
            list($minCarat, $maxCarat) = explode('-', $carat) + [0, INF];
            $products = $products->filter(function ($product) use ($minCarat, $maxCarat) {
                $productCarat = $product['cara_weight'];
                return $productCarat >= $minCarat && $productCarat <= $maxCarat;
            });
        }

        if ($cut) {
            $products = $products->filter(function ($product) use ($cut) {
                return $product['cut'] == $cut;
            });
        }

        if ($color) {
            $products = $products->filter(function ($product) use ($color) {
                return $product['color'] == $color;
            });
        }

        if ($clarity) {
            $products = $products->filter(function ($product) use ($clarity) {
                return $product['clarity'] == $clarity;
            });
        }

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