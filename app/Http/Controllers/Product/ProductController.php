<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('dashboard.admin.product.index',compact('products'));
    }

    public function create(){
        return view('dashboard.admin.product.create');
    }

    public function store(StoreProductRequest $request){
        $validatedData = $request->validated();
        
        $product = new Product();
        $product->name         =  $validatedData ['name'];
        // $product->quantity     =  $validatedData ['quantity'];
        // $product->unit_price   =  $validatedData ['unit_price'];

        $product->save();

        return redirect()->route('product.index')->with('message', 'Product added successfully');


    }

    public function edit($id){
        $product = Product::find($id);

        return view('dashboard.admin.product.edit',compact('product'));
    }

    public function update(Request $request,$id){
        $product = Product::find($id);

        $product->name         =  $request->name;
        // $product->quantity     =  $request->quantity;
        // $product->unit_price   =  $request->unit_price;

        $product->save();

        return redirect()->route('product.index')->with('message', 'Product update successfully');
    }
    public function delete($id){
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index')->with('message', 'Product delete successfully');
    } 
}
