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
    ];


public function room()
{
    $this->hasOne('App\Room');

}


}
