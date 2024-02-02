<?php

use App\Http\Controllers\BuyProduct\BuyProductController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Friends\FriendsController;
use App\Http\Controllers\Lends\LendsMoneyController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Report\ReportController;
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
Route::get('/all-supplier',[SupplierController::class,'viewAllSupplier'])->name("allsupplier.view");
Route::get('/supplier/edit/{id}',[SupplierController::class,'editSupplier'])->name("supplier.edit");
Route::post('/supplier/update/{id}',[SupplierController::class,'updateSupplier'])->name("supplier.update");
Route::get('/supplier/delete/{id}',[SupplierController::class,'deleteSupplier'])->name("delete.update");
//supplier end here

//supplier start here
Route::get('/customer',[CustomerController::class,'index'])->name("customer.view");
Route::post('/customer/store',[CustomerController::class,'store'])->name("customer.store");
Route::get('/all-customer',[CustomerController::class,'viewAllCustomer'])->name("allcustomer.view");
Route::get('/customer/edit/{id}',[CustomerController::class,'editCustomer'])->name("customer.edit");
Route::post('/customer/update/{id}',[CustomerController::class,'updateCustomer'])->name("customer.update");
Route::get('/customer/delete/{id}',[CustomerController::class,'deleteCustomer'])->name("customer.update");
//supplier end here

//product start here
Route::get('/product',[ProductController::class,'index'])->name("product.index");
Route::get('/product/create',[ProductController::class,'create'])->name("product.create");
Route::post('/product/store',[ProductController::class,'store'])->name("product.store");
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name("product.edit");
Route::post('/product/update/{id}',[ProductController::class,'update'])->name("product.update");
Route::delete('/product/delete/{id}',[ProductController::class,'delete'])->name("product.delete");
//product end here


Route::get('/buyproduct',[BuyProductController::class,'index'])->name("buyproduct.index");
Route::get('/buyproduct/create',[BuyProductController::class,'create'])->name("buyproduct.create");
Route::post('/buyproduct/store',[BuyProductController::class,'store'])->name("buyproduct.store");
Route::get('/buyproduct/edit/{id}',[BuyProductController::class,'edit'])->name("buyproduct.edit");
Route::post('/buyproduct/update/{id}',[BuyProductController::class,'update'])->name("buyproduct.update");
Route::delete('/buyproduct/delete/{id}',[BuyProductController::class,'delete'])->name("buyproduct.delete");


Route::get('/sellproduct',[SellProductController::class,'index'])->name("sellproduct.index");
Route::get('/sellproduct/create',[SellProductController::class,'create'])->name("sellproduct.create");
Route::get('/sellproduct/select/{id}',[SellProductController::class,'selectProduct'])->name("selectproduct.select");
Route::post('/sellproduct/store',[SellProductController::class,'store'])->name("sellproduct.store");
Route::get('/sellproduct/edit/{id}',[SellProductController::class,'edit'])->name("sellproduct.edit");
Route::post('/sellproduct/update/{id}',[SellProductController::class,'update'])->name("sellproduct.update");
Route::delete('/sellproduct/delete/{id}',[SellProductController::class,'delete'])->name("sellproduct.delete");

Route::get('/report',[ReportController::class,'index'])->name("report.index");

Route::get('/friends',[FriendsController::class,'index'])->name("friends.index");
Route::get('/friends/create',[FriendsController::class,'create'])->name("friends.create");
Route::post('/friends/store',[FriendsController::class,'store'])->name("friends.store");
Route::get('/friends/edit/{id}',[FriendsController::class,'edit'])->name("friends.edit");
Route::post('/friends/update/{id}',[FriendsController::class,'update'])->name("friends.update");
Route::delete('/friends/delete/{id}',[FriendsController::class,'delete'])->name("friends.delete");

Route::get('/lends',[LendsMoneyController::class,'index'])->name("lends.index");
Route::post('/lends/money/store',[LendsMoneyController::class,'store'])->name("lends.store");
Route::get('/all-lendsMoney',[LendsMoneyController::class,'viewAllLendsMoney'])->name("lends.view.all");
Route::post('/lends/money/receive',[LendsMoneyController::class,'receiveMoney'])->name("lends.receiveMoney");


