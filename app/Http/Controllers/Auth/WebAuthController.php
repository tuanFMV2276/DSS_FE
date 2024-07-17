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
        return view('Login_Register_ForgotPass/Register/Tuan_Register');
    }

    public function register(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if ($response->successful()) {
            return redirect('/login')->with('success', 'Registration successful! Please login.');
        } else {
            return back()->withErrors(['error' => 'Registration failed.']);
        }
    }

    public function showLoginForm()
    {
        return view('Login_Register_ForgotPass/login/Tuan_Login');
    }

    public function login(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            //  dd($data);
            Session::put('access_token', $data['access_token']);
            $role = $data['data']['role'];
            $name = $data['data']['name'];
            $userId = $data['data']['id'];
            Session::put('role', $role);
            Session::put('name', $name);
            Session::put('id', $userId);
            return redirect('/'); 
        } else {
            return back()->withErrors(['error' => 'Login failed.']);
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
