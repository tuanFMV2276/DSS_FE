<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NaturalDiamondList extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainDiamond =Http::get('http://127.0.0.1:8000/api/maindiamond')->json();
        $diamondPriceList = Http::get('http://127.0.0.1:8000/api/diamondpricelist')->json();

        $ListDiamond = [];

        foreach ($mainDiamonds as $mainDiamond) {
            foreach ($diamondPriceLists as $diamondPrice) {
                if ($mainDiamond['cut'] === $diamondPrice['cut'] &&
                    $mainDiamond['color'] === $diamondPrice['color'] &&
                    $mainDiamond['clarity'] === $diamondPrice['clarity'] &&
                    $mainDiamond['carat_weight'] === $diamondPrice['carat_weight']) {
    
                    // Add the matched diamond to the list
                    $mainDiamond['price'] = $diamondPrice['price'];
                    $ListDiamond[] = $mainDiamond;
                }
            }
        }
    
        return view('join.index', compact('ListDiamond'));

        // Fetch data from API endpoints
        $customersResponse = Http::get('http://127.0.0.1:8000/api/customers');
        $ordersResponse = Http::get('http://127.0.0.1:8000/api/orders');

        // Extract data from responses
        $customers = $customersResponse->json();
        $orders = $ordersResponse->json();

        // Join data as needed
        $joinedData = [];

        foreach ($customers as $customer) {
            $customerOrders = [];

            foreach ($orders as $order) {
                if ($order['customer_id'] === $customer['id']) {
                    $customerOrders[] = $order;
                }
            }

            $customer['orders'] = $customerOrders;
            $joinedData[] = $customer;
        }

        return view('join.index', compact('joinedData'));
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