<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;


class Floor extends Model
{
    
    use AutoNumberTrait;
    protected $fillable=[
        'name','user_id'
    ];
    public function user() {
        return $this ->belongsTo(User::class);
    }
   
    public function rooms(){
        return $this->hasMany(Room::class);
    }
    public function creator() {
        return $this ->belongsTo(User::class);
    }

    public function getAutoNumberOptions()
    {
        return [
            'number' => [
                'format' => '?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 4 // The number of digits in an autonumber
            ]
        ];
    }
    
}
