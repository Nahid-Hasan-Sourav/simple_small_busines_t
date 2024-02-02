<?php

namespace App\Http\Controllers\Lends;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\LendsMoney;
use App\Models\ReceiveMoney;
use Illuminate\Http\Request;

class LendsMoneyController extends Controller
{
    public function index(){
        $friends = Friend::all();

        return view('dashboard.admin.lends.index',compact('friends'));
    }

    public function store(Request $request){
        $sendMoney = new LendsMoney();

        $sendMoney->friend_id = $request->friendId;
        $sendMoney->amount = $request->amount;
        $sendMoney->date = $request->backDate;

        $sendMoney->save();

        return response()->json([
            "status" => "success"
        ]);
    }

    public function viewAllLendsMoney(){
        $data = LendsMoney::with('friend')->get();

        return response()->json([
            "status"=>"success",
            "data" => $data
        ]);
    }

    public function receiveMoney(Request $request){
        $data = LendsMoney::find($request->id);

        $receivedMoney = new ReceiveMoney();
        $receivedMoney->lends_money_id =$request->id;
        $receivedMoney->friend_id =$data->friend_id;
        $receivedMoney->amount = $request->receiveAmount;

        $receivedMoney->save();

        return response()->json([
            "status"=>"success",
            
        ]);
    }
}
