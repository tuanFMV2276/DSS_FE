<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        // Gửi request PUT để cập nhật trạng thái của đơn hàng tới API
        $response = Http::put("http://127.0.0.1:8000/api/order/{$id}/update-status", [
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
        // Gửi request DELETE để xóa đơn hàng tới API
        $response = Http::delete("http://127.0.0.1:8000/api/order/{$id}");

        if ($response->successful()) {
            return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete order.');
        }
    }
}