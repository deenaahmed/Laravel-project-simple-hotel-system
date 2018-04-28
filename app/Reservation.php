<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{


	protected $fillable = [
		
		'status',
		'clientpaidprice',
        'user_id',
        'room_number',
        'room_id',
        'accompanynumber'
    ];

    public function user() {
        return $this ->belongsTo(User::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }




     public function user()
     {
        //User::class == 'App\User'
        return $this->belongsTo(User::class);
     }
     public function room()
     {
    //     //User::class == 'App\User'
         return $this->belongsTo(Room::class);
     }
    




}
