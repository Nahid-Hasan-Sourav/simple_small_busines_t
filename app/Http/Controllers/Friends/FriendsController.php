<?php

namespace App\Http\Controllers\Friends;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function index(){
        $allFriends = Friend::all();
        return view('dashboard.admin.friends.index',compact('allFriends'));
    }

    public function create(){
        return view('dashboard.admin.friends.create');
    }

    public function store(Request $request){
        $friend = new Friend();

        $friend->name        = $request->name;
        $friend->email       = $request->email;
        $friend->phoneNumber = $request->p_number;
        $friend->address     = $request->address;
        $friend->save();


        return redirect()->route('friends.index')->with('message', 'Friend Info added successfully');



    }

    public function edit($id){
        $friend = Friend::find($id);

        return view('dashboard.admin.friends.edit',compact('friend'));
    }

    public function update(Request $request,$id){
        $friend = Friend::find($id);

        $friend->name        = $request->name;
        $friend->email       = $request->email;
        $friend->phoneNumber = $request->p_number;
        $friend->address     = $request->address;
        $friend->save();

        return redirect()->route('friends.index')->with('message', 'Friend info update successfully');

    }

    public function delete($id){
        $delete = Friend::find($id);

        $delete->delete();

        return redirect()->route('friends.index')->with('message', 'Friend info delete successfully');


    }
}
