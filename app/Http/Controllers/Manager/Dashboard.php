<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function retrieveDataChart(Request $Request){
        $orders = Http::get('http://127.0.0.1:8000/api/order')->json();
        $order_price_list = array();
        $list_orders_date = array();
        $data = array();
        foreach ($orders as $or){
            $order_detail = Http::get("http://127.0.0.1:8000/api/orderdetail/{$orders->id}");
            $list_orders[$or->id] = $order_date;
            array_push($list_orders_date, $list_orders[],$list_orders[$key]);
            array_push($order_price_list,$order_detail->price);
        }
        if($request->input('filter') == 'day'){
            $input_month = $request->input('selectedMonth');
            foreach($list_orders_date as $li){
                $newDate = date("m", strtotime($li));
                if($newDate == $input_month){
                    array_push($data,$li);
                }
            }
        }
        else if($request->filter == 'month'){

        }
        else if($request->filter == 'year'){

        }
        else{

        }
        return view('HomeManager.HomeManager', compact('data','order_price_list'));
    }
}
