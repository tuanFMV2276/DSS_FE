<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function index()
    {
        // $orders = Order::all();
        // return view('orders.index', compact('orders'));
        return redirect('/home-manager');
    }

    public function updateStatus(Request $request, $id)
    {

        $response = Http::put("http://127.0.0.1:8000/api/order/{$id}", [
            'status' => $request->status,
        ]);

        if ($response->successful()) {
            return redirect()->route('orders.index')->with('success', 'Order status updated successfully.');
        } else {
            return back()->with('error', 'Failed to update order status.');
        }
    }

    public function destroy($id)
    {
        $response = Http::delete("http://127.0.0.1:8000/api/order/{$id}");

        if ($response->successful()) {
            return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete order.');
        }
    }
    public function show($id)
    {
        $response = Http::get("http://127.0.0.1:8000/api/order/{$id}");

        if ($response->successful()) {
            $order = $response->json();
            return view('HomeStaff_Manh.orderIndex', compact('order'));
        } else {
            return redirect()->route('orders.index')->with('error', 'Failed to fetch order details.');
        }
    }
}
