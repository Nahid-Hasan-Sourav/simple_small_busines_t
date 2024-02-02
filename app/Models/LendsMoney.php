<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LendsMoney extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function friend(){
        return $this->belongsTo(Friend::class,'friend_id','id');
    }

    public function receivedMoney(){
        return $this->hasMany(ReceiveMoney::class,'lends_money_id','id');
    }
}
