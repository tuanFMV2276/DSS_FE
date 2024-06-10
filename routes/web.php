<?php

use App\Http\Controllers\Customer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomePage;
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
// Các route đã được sắp xếp theo thứ tự coreflow


// Route::get('/Login', [Login::class, 'login']);

Route::get('/', [HomePage::class, 'index']);

// Route::get('/NaturalDiamondPage', [PageController::class, 'naturalDiamond']);

// Route::get('/LabDiamondPage', [PageController::class, 'labDiamond']);

// Route::get('/DetailDiamondPage', [PageController::class, 'detailDiamond']);

// Route::get('/ListShell', [PageController::class, 'listShell']);

// Route::get('/DetailShell', [PageController::class, 'detailShell']);

// Route::get('/CompletedProduct', [PageController::class, 'completedProduct']);

// Route::get('/Cart', [PageController::class, 'cart']);

// Route::get('/Payment', [PageController::class, 'payment']);

// Route::get('/PaymentSuccessful', [PageController::class, 'paymentSuccessful']);

// Route::get('/HomeSaleStaff', [PageController::class, 'homeSaleStaff']);

// Route::get('/DeliveryStaffPage', [PageController::class, 'deliveryStaff']);

// Route::get('/DoNi', [PageController::class, 'doNi']);

// Route::get('/PriceGold', [PageController::class, 'priceGold']);

// Route::get('/PriceDiamond', [PageController::class, 'priceDiamond']);

// Route::get('/customer', [Customer::class, 'index']);

// Route::get('/author', [ViewsController::class, 'index'])->name('author.index');

// Route::get('/author/create', [ViewsController::class, 'create'])->name('author.create');

// Route::get('/author/{id}/edit', [ViewsController::class, 'edit'])->name('author.edit');

// Route::Post('/author/store', [ViewsController::class, 'store'])->name('author.store');

// Route::put('/author/{id}}', [ViewsController::class, 'update'])->name('author.update');

// Route::delete('/author/{id}}', [ViewsController::class, 'destroy'])->name('author.destroy');