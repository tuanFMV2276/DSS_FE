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

Route::get('/HomeSaleStaff', function () {
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


Route::get('/', function () {
    return view('HomePage_Hoa/HomePage');
});

Route::get('/Login', function () {
    return view('Login_Hoa/Login');
});


Route::get('/NaturalDiamondPage', function () {
    return view('NaturalDiamondPage_Hoa/NaturalDiamondPage');
});

Route::get('/LabDiamondPage', function () {
    return view('LabDiamondPage_Hoa/LabDiamondPage');
});

Route::get('/DetailDiamondPage', function () {
    return view('DetailDiamond_Hoa/DetailDiamondPage');
});
Route::get('/DeliveryStaffPage', function () {
    return view('DeliveryStaffPage_Hoa/DeliveryStaffPage');
});
Route::get('/CompletedProduct', function () {
    return view('CompletedProduct_Hoa/CompletedProduct');
});


