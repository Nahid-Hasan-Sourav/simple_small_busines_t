<?php

use App\Http\Controllers\BuyProduct\BuyProductController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\SellProduct\SellProductController;
use App\Http\Controllers\Supplier\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[DashboardController::class,'index'])->name("dashboard");
//supplier start here
Route::get('/supplier',[SupplierController::class,'index'])->name("supplier.view");
Route::post('/supplier/store',[SupplierController::class,'store'])->name("supplier.store");
//supplier end here

Route::get('/customer',[CustomerController::class,'index'])->name("customer.view");
Route::get('/product',[ProductController::class,'index'])->name("product.view");
Route::get('/buyproduct',[BuyProductController::class,'index'])->name("buyproduct.view");
Route::get('/sellproduct',[SellProductController::class,'index'])->name("sellproduct.view");
