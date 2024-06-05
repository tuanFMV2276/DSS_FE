<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
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

Route::get('/', function(){
    return view('Quan_CartPage/CartPage');
});
Route::get('/cartpage', [PaymentController::class, 'CartPage'])->name('CartPage');
Route::get('/cartpage/payment1', [PaymentController::class, 'Payment1'])->name('Payment1');
Route::get('/cartpage/payment2', [PaymentController::class, 'Payment2'])->name('Payment2');
Route::get('/cartpage/payment3', [PaymentController::class, 'Payment3'])->name('Payment3');
