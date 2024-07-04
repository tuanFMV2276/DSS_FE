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
        // Retrieve query parameters
        $sort = $request->query('sort', 'price_asc');
        $priceRange = $request->query('price_range', '');
        $productName = $request->query('product_name', '');
        $shape = $request->query('shape', '');
        $carat = $request->query('carat', '');
        $cut = $request->query('cut', '');
        $color = $request->query('color', '');
        $clarity = $request->query('clarity', '');

        // Fetch products from API
        $products = collect(Http::get('http://127.0.0.1:8000/api/product')->json());

        // Exclude products with a status of 0
        $products = $products->filter(function ($product) {
            return $product['status'] != 0;
        });

        // Filter by product name if provided
        if ($productName) {
            $products = $products->filter(function ($product) use ($productName) {
                return $product['product_name'] == $productName;
            });
        }

        // Filter by price range if provided
        if ($priceRange) {
            list($minPrice, $maxPrice) = explode('-', $priceRange) + [0, INF];
            $products = $products->filter(function ($product) use ($minPrice, $maxPrice) {
                return $product['total_price'] >= $minPrice && $product['total_price'] <= $maxPrice;
            });
        }

        // Filter by shape if provided
        if ($shape) {
            $products = $products->filter(function ($product) use ($shape) {
                // Assuming shape is stored in the product data
                return $product['shape'] == $shape;
            });
        }

        // Filter by carat if provided
        if ($carat) {
            list($minCarat, $maxCarat) = explode('-', $carat) + [0, INF];
            $products = $products->filter(function ($product) use ($minCarat, $maxCarat) {
                // Assuming carat range is stored in the product data
                $productCarat = $product['cara_weight'];
                return $productCarat >= $minCarat && $productCarat <= $maxCarat;
            });
        }

        // Filter by cut if provided
        if ($cut) {
            $products = $products->filter(function ($product) use ($cut) {
                // Assuming cut is stored in the product data
                return $product['cut'] == $cut;
            });
        }

        // Filter by color if provided
        if ($color) {
            $products = $products->filter(function ($product) use ($color) {
                // Assuming color is stored in the product data
                return $product['color'] == $color;
            });
        }

        // Filter by clarity if provided
        if ($clarity) {
            $products = $products->filter(function ($product) use ($clarity) {
                // Assuming clarity is stored in the product data
                return $product['clarity'] == $clarity;
            });
        }

        // Sort products
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
        // Retrieve query parameters
        $sort = $request->query('sort', 'price_asc');
        $priceRange = $request->query('price_range', '');
        $productName = $request->query('product_name', '');
        $shape = $request->query('shape', '');
        $carat = $request->query('carat', '');
        $cut = $request->query('cut', '');
        $color = $request->query('color', '');
        $clarity = $request->query('clarity', '');

        // Fetch products from API
        $products = collect(Http::get('http://127.0.0.1:8000/api/product')->json());

        // Exclude products with a status of 0
        $products = $products->filter(function ($product) {
            return $product['status'] != 0;
        });

        // Filter by product name if provided
        if ($productName) {
            $products = $products->filter(function ($product) use ($productName) {
                return $product['product_name'] == $productName;
            });
        }

        // Filter by price range if provided
        if ($priceRange) {
            list($minPrice, $maxPrice) = explode('-', $priceRange) + [0, INF];
            $products = $products->filter(function ($product) use ($minPrice, $maxPrice) {
                return $product['total_price'] >= $minPrice && $product['total_price'] <= $maxPrice;
            });
        }

        // Filter by shape if provided
        if ($shape) {
            $products = $products->filter(function ($product) use ($shape) {
                // Assuming shape is stored in the product data
                return $product['shape'] == $shape;
            });
        }

        // Filter by carat if provided
        if ($carat) {
            list($minCarat, $maxCarat) = explode('-', $carat) + [0, INF];
            $products = $products->filter(function ($product) use ($minCarat, $maxCarat) {
                // Assuming carat range is stored in the product data
                $productCarat = $product['cara_weight'];
                return $productCarat >= $minCarat && $productCarat <= $maxCarat;
            });
        }

        // Filter by cut if provided
        if ($cut) {
            $products = $products->filter(function ($product) use ($cut) {
                // Assuming cut is stored in the product data
                return $product['cut'] == $cut;
            });
        }

        // Filter by color if provided
        if ($color) {
            $products = $products->filter(function ($product) use ($color) {
                // Assuming color is stored in the product data
                return $product['color'] == $color;
            });
        }

        // Filter by clarity if provided
        if ($clarity) {
            $products = $products->filter(function ($product) use ($clarity) {
                // Assuming clarity is stored in the product data
                return $product['clarity'] == $clarity;
            });
        }

        // Sort products
        if ($sort === 'price_desc') {
            $products = $products->sortByDesc('total_price');
        } else {
            $products = $products->sortBy('total_price');
        }

        // Return filtered products as JSON response
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