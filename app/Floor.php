<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable=[
        'number','createdby'
    ];

   
    public function rooms(){
        return $this->hasMany(Room::class);
    }
    public function creator() {
        return $this ->belongsTo(User::class);
    }
}
