<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('HomeSaleStaff_Manh/HomeSaleStaff');
});

Route::get('/DoNi', function () {
    return view('DoNi_Manh/DoNi');
});
Route::get('/PriceGold', function () {
    return view('PriceGold_Manh/PriceGold');
});
Route::get('/PriceDiamond', function () {
    return view('PriceDiamond_Manh/PriceDiamond');
});
Route::get('/DetailShell', function () {
    return view('DetailShell_Manh/DetailShell');
});
