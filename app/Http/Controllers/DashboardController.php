<?php

namespace App\Http\Controllers;

use App\Models\BuyProduct;
use App\Models\LendsMoney;
use App\Models\ReceiveMoney;
use App\Models\SellProduct;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totallSale  = SellProduct::all();
        $totallSales = $totallSale->sum('totalPrice');

        $totallBuy  = BuyProduct::all();
        $tatallBuys = $totallBuy->sum('totalPrice');

        $totalLendsMoney = LendsMoney::sum('amount');
        $totalReceivedMoney = ReceiveMoney::sum('amount');
        return view('dashboard.index',compact('totallSales','tatallBuys','totalLendsMoney','totalReceivedMoney'));
    }
}
