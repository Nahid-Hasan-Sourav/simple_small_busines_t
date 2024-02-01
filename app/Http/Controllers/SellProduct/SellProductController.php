<?php

namespace App\Http\Controllers\SellProduct;

use App\Http\Controllers\Controller;
use App\Models\BuyProduct;
use App\Models\Customer;
use App\Models\Product;
use App\Models\SellProduct;
use Illuminate\Http\Request;

class SellProductController extends Controller
{
    public function index(Request $request){
        $customers = Customer::all();
        $sellProducts = SellProduct::with(['customer','product']);
        if (!empty($request->customer_id)) {
            $sellProducts->where('customer_id', $request->customer_id);
        }

        if (!empty($request->month)) {
            $sellProducts->whereMonth('updated_at', $request->month);
        }

        $sellProducts = $sellProducts->get();
        return view('dashboard.admin.sellproduct.index',compact('customers','sellProducts'));
    }
    public function create(){

        $customers = Customer::all();
        $buyProducts  = BuyProduct::with(['product'])->get();
        return view('dashboard.admin.sellproduct.create',compact('customers','buyProducts'));

    }

    public function selectProduct($id){
        $product = BuyProduct::with(['product'])->find($id);

        return response()->json([
            "status" => "success",
            "data" =>$product
        ]);
    }

    public function store(Request $request){
        $sellProduct = new SellProduct();
        $sellProduct->customer_id = $request->customer_id;
        $sellProduct->product_id  = $request->product_id;
        $sellProduct->quantity = $request->sell_quantity;
        $sellProduct->unitPrice = $request->sell_unit_price;
        $sellProduct->totalPrice = $request->sell_unit_price * $request->sell_quantity;
        $sellProduct->save();
 
        $product = Product::find($request->product_id);
      
        if ($product) {
            $product->sellQuantity = $sellProduct->quantity;
            $product->save();
        } 
        return redirect()->route('sellproduct.index')->with('message', 'Product sell successfully');

    }
    
    public function delete($id){
        $sellProduct = SellProduct::find($id);
        $sellProduct->delete();

        $product = Product::find($sellProduct->product_id);
        $product->sellQuantity = 0;
        
        $product->save();

        return redirect()->route('sellproduct.index')->with('message', 'Product delete successfully');


    }
}
