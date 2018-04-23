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
}