<?php

namespace App\Http\Controllers\SaleStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class SaleStaffController extends Controller
{
    public function index()
    {
        return redirect('/home-salestaff');
    }
    public function homeSalestaff()
    {
        // Gọi API để lấy dữ liệu
        $customers = Http::get('http://127.0.0.1:8000/api/customer')->json();
        $payments = Http::get('http://127.0.0.1:8000/api/payment')->json();      
        // Phân trang cho orders
        $orders = Http::get('http://127.0.0.1:8000/api/order')->json();
        $orders = collect($orders);

        // Số dòng trên mỗi trang
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $orders->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $ordersPaginated = new LengthAwarePaginator($currentItems, $orders->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);
        return view('HomeStaff_Manh.HomeSaleStaff', compact( 'ordersPaginated', 'customers', 'payments'));
    }
    public function updateOrderStatus(Request $request, $id)
    {

        $response = Http::put("http://127.0.0.1:8000/api/order/{$id}", [
            'status' => $request->status,
        ]);

        if ($response->successful()) {
            return redirect()->route('salestaff.home')->with('success', 'Order status updated successfully.');
        } else {
            return back()->with('error', 'Failed to update order status.');
        }
    }
}
