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
Route::get('/sellproduct',[SellProductController::class,'index'])->name("sellproduct.index");
