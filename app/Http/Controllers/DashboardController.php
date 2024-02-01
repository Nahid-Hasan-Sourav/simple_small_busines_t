<?php

namespace App\Http\Controllers;

use App\Models\BuyProduct;
use App\Models\SellProduct;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totallSale  = SellProduct::all();
        $totallSales = $totallSale->sum('totalPrice');

        $totallBuy  = BuyProduct::all();
        $tatallBuys = $totallBuy->sum('totalPrice');

        return view('dashboard.index',compact('totallSales','tatallBuys'));
    }
}
