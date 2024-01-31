<?php

namespace App\Http\Controllers\BuyProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuyProductController extends Controller
{
    public function index(){
        return view('dashboard.admin.buyproduct.index');
    }
}
