<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

	protected $fillable = [
		
		'number',
		'price',
        'capacity',
        'isavailable',
        'floorid',
        'createdby',
        
       
        
        
    ];
    public function user() {
     return $this->belongsToMany(User::class,'reservations')->withPivot('user_id', 'room_id','clientpaidprice','created_at','updated_at');
}
}