<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Modules\Admin\Repositories\BaseRepository\BaseRepository;

class DetailProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $products = collect(Http::get('http://127.0.0.1:8000/api/product')->json());

    return view('Customer/DetailProduct/DetailProductPage', ['products' => $products]);
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

        $mainDiamondId = $product['main_diamond_id'];
        $mainDiamondResponse = Http::get("http://127.0.0.1:8000/api/maindiamond/{$mainDiamondId}");
        $mainDiamond = $mainDiamondResponse->json();

        return view('Customer.DetailProduct.DetailProductPage', [
            'product' => $product,
            'mainDiamond' => $mainDiamond
        ]);
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