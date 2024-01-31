<?php

namespace App\Http\Controllers\SellProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellProductController extends Controller
{
    public function index(){
        return view('dashboard.admin.sellproduct.index');
    }
}
