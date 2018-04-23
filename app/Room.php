<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    
    protected $fillable=[
        'number','capacity','price','user_id' ,'floor_id' ,'isavailable'
    ];
    
    public function floor() {
        return $this ->belongsTo(Floor::class);
    }

    public function user() {
        return $this ->belongsTo(User::class);
    }
   
}
