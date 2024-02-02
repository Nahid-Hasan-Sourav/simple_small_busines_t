<?php

namespace App\Http\Controllers\Lends;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\LendsMoney;
use App\Models\ReceiveMoney;
use Carbon\Carbon;
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

    public function viewAllLendsMoney(Request $request){
        $currentMonthName='';
        $data = LendsMoney::with('friend','receivedMoney');

        $totalLendsMoney = 0;
        $totalReceivedMoney = 0;

        $totalReceivedMoney = ReceiveMoney::sum('amount');

        if(!empty($request->id)) {
            $data->whereMonth('updated_at', $request->id);
            $totalReceivedMoney = ReceiveMoney::whereMonth('updated_at', $request->id)->sum('amount');
        }

        $data = $data->get();
        if (!$data->isEmpty()) {
            $currentMonthName = Carbon::parse($data[0]['created_at'])->monthName;
        }
        $totalLendsMoney = $data->sum('amount');

        return response()->json([
            "status"             => "success",
            "data"               => $data,
            "totalLendsMoney"    => $totalLendsMoney,
            "totalReceivedMoney" => $totalReceivedMoney,
            "currentMonthName"   => $currentMonthName
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
