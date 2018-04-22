<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function floor() {
        return $this ->belongsTo(Floor::class);
    }
}
