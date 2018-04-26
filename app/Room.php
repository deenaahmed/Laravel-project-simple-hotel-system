<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;


class Room extends Model
{


    protected $fillable = [
        'number', 'capacity', 'createdby','floorid','isavailable' , 'price'
    ];


    // relation many to many
    public function  users()
    {

       return $this->belongsToMany(User::class,'reservations')->withPivot('user_id', 'room_id','clientpaidprice','created_at','updated_at');
    }


    public function getPriceAttribute($value)
    {
        return ($value/100);
    }



}

