<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;


class Floor extends Model
{
    
    use AutoNumberTrait;
    protected $fillable=[
        'name','createdby'
    ];

   
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
                'format' => '1?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 3 // The number of digits in an autonumber
            ]
        ];
    }
    
}
