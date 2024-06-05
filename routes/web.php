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
    return view('HomePage_Hoa/HomePage');
});

// Route::get('/Login', function () {
//     return view('Login_Hoa/Login');
// });


Route::get('/NaturalDiamondPage', function () {
    return view('NaturalDiamondPage_Hoa/NaturalDiamondPage');
});

Route::get('/LabDiamondPage', function () {
    return view('LabDiamondPage_Hoa/LabDiamondPage');
});

// Route::get('/DetailDiamondPage', function () {
//     return view('DetailDiamond_Hoa/DetailDiamondPage');
// });


// Route::get('/CompletedProduct', function () {
//     return view('CompletedProduct_Hoa/CompletedProduct');
// });

// Route::get('/', function () {
//     return view('DeliveryStaffPage_Hoa/DeliveryStaffPage');
// });

Route::get('/PaymentSuccessful', function () {
    return view('PaymentSuccessful_Hoa/PaymentSuccessful');
});