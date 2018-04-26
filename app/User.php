<?php

namespace App;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Room ;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name', 'email', 'password','gender','country' , 'avatar_image', 'national_id','is_approved','approved_by','mobile'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




    // relation many to many

    public function rooms()
    {
        return $this->belongsToMany(Room::class,'reservations')->withPivot('user_id', 'room_id','clientpaidprice','created_at','updated_at','accompanynumber');

    }










}
