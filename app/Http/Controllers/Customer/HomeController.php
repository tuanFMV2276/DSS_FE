<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Modules\Admin\Repositories\BaseRepository\BaseRepository;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        // Fetch data from API endpoints
        $products = collect(Http::get('http://127.0.0.1:8000/api/product')->json());
        $mainDiamonds = collect(Http::get('http://127.0.0.1:8000/api/maindiamond')->json());
        $extraDiamonds = collect(Http::get('http://127.0.0.1:8000/api/exdiamond')->json());
        $diamondShells = collect(Http::get('http://127.0.0.1:8000/api/diamondshell')->json());
        $diamondPriceList = collect(Http::get('http://127.0.0.1:8000/api/diamondpricelist')->json());

        // Get the last 6 products
        $latestProducts = $products->slice(-5)->values();

        // Return the diamond shells to the view
        return view('Customer/Homepage/HomePage', ['products' => $latestProducts]);
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