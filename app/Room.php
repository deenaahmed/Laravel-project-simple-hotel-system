<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
    
    protected $fillable=[
        'number','capacity','price','user_id' ,'floor_id' ,'isavailable' ,'image'
    ];
    
    public function floor() {
        return $this ->belongsTo(Floor::class);
    }

    public function user() {
       return $this->belongsTo(User::class);
  //  return $this->belongsToMany(User::class,'reservations')->withPivot('user_id', 'room_id','clientpaidprice','created_at','updated_at');

    }
    public function getPriceAttribute($value)
    {
        return ($value/100);
    }
}


