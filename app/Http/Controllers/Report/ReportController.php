<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\BuyProduct;
use App\Models\SellProduct;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request){
        $buyProducts = BuyProduct::with(['supplier', 'product']);

        if (!empty($request->month)) {
            $buyProducts->whereMonth('updated_at', $request->month);
        }

        $buyProducts = $buyProducts->get();
        $buyTotalPriceSum = $buyProducts->sum('totalPrice');


        $sellProducts = SellProduct::with(['customer','product']);

        if (!empty($request->month)) {
            $sellProducts->whereMonth('updated_at', $request->month);
        }

        $sellProducts = $sellProducts->get();
        $sellTotalPriceSum = $sellProducts->sum('totalPrice');

        return view('dashboard.admin.report.index',compact('buyProducts','sellProducts','buyTotalPriceSum','sellTotalPriceSum'));
    }
}
