<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class WebAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('Login_Register_ForgotPass/Register/Register');
    }

    public function register(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if ($response->successful()) {
            return redirect('/login')->with('success', 'Đăng ký thành công. Vui long đăng nhập.');
        } else {
            return back()->withErrors(['error' => 'Đăng ký thật bại.']);
        }
    }

    public function showLoginForm()
    {
        return view('Login_Register_ForgotPass/Login/Login');
    }

    public function login(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            if ($data['data']['status'] == 0) {
                return back()->withErrors(['error' => 'Tài khoản của bạn đã bị khóa.']);
            }
            Session::put('access_token', $data['access_token']);
            //  dd($data);
            Session::put('access_token', $data['access_token']);
            $role = $data['data']['role'];
            $name = $data['data']['name'];
            $userId = $data['data']['id'];
            Session::put('role', $role);
            Session::put('name', $name);
            Session::put('id', $userId);
            if($role == "manager"){
                return redirect('/home-manager');
            }
            if($role == "salestaff"){
                return redirect('/home-salestaff');
            }
            if($role == "admin"){
                return redirect('/home-admin');
            }
            if($role == "deliverystaff"){
                return redirect('/home-deliverystaff');
            }
            return redirect('/'); // Chuyển hướng đến trang sản phẩm
        } else {
            return back()->withErrors(['error' => 'Đăng nhập thất bại.']);
        }
    }

    public function logout()
    {
        $token = Session::get('access_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://127.0.0.1:8000/api/logout');

        if ($response->successful()) {
            Session::forget('access_token');
            return redirect('/login')->with('success', 'Logged out successfully.');
        } else {
            return back()->withErrors(['error' => 'Logout failed.']);
        }
    }
}