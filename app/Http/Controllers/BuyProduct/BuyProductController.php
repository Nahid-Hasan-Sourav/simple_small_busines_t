<?php

namespace App\Http\Controllers\BuyProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuyProductRequest;
use App\Models\BuyProduct;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BuyProductController extends Controller
{
    public function index(){
        $buyProducts = BuyProduct::with(['supplier','product'])->get();
        return view('dashboard.admin.buyproduct.index',compact('buyProducts'));
    }

    public function create(){
        $products  = Product::all();
        $suppliers = Supplier::all();
        return view('dashboard.admin.buyproduct.create',compact('products','suppliers'));

    }

    public function store(StoreBuyProductRequest $request){
        $validatedData = $request->validated();

        $buyProduct = new BuyProduct();

        $buyProduct->product_id   = $validatedData['product_id'];
        $buyProduct->supplier_id  = $validatedData['supplier_id'];
        $buyProduct->quantity     = $validatedData['quantity'];
        $buyProduct->unitPrice    = $validatedData['unit_price'];
        $buyProduct->totalPrice   = $validatedData['unit_price']*$validatedData['quantity'];
        $buyProduct->save();

        $product = Product::find($validatedData['product_id']);
        $product->quantity = $validatedData['quantity'];
        $product->save();


        return redirect()->route('buyproduct.index')->with('message', 'Product buy successfully');

    }
}
