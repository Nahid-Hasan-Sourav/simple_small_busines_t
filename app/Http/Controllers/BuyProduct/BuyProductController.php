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
    public function index(Request $request)
    {
        $suppliers = Supplier::all();
        $buyProducts = BuyProduct::with(['supplier', 'product']);
    
        if (!empty($request->supplier_id)) {
            $buyProducts->where('supplier_id', $request->supplier_id);
        }
    
        if (!empty($request->month)) {
            $buyProducts->whereMonth('updated_at', $request->month);
        }
    
        $buyProducts = $buyProducts->get();
    
        return view('dashboard.admin.buyproduct.index', compact('buyProducts', 'suppliers'));
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

    public function edit($id){
        $products  = Product::all();
        $suppliers = Supplier::all();

        $buyProduct = BuyProduct::find($id);

        return view('dashboard.admin.buyproduct.edit',compact('buyProduct','products','suppliers'));
    }

    public function update(Request $request,$id){
        $buyProduct = BuyProduct::find($id);

        $buyProduct->product_id   = $request->product_id;
        $buyProduct->supplier_id  = $request->supplier_id;
        $buyProduct->quantity     = $request->quantity;
        $buyProduct->unitPrice    = $request->unit_price;
        $buyProduct->totalPrice   = $request->unit_price * $request->quantity;
        $buyProduct->save();

        $product = Product::find($request->product_id);
        $product->quantity = $request->quantity;
        $product->save();

        return redirect()->route('buyproduct.index')->with('message', 'Buy Product update successfully');

    }
}
