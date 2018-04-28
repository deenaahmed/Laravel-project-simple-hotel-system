<?php

namespace App;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Room ;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class User extends Authenticatable implements BannableContract
{
    protected $table_id="datatables_data";
    use Notifiable;
    use HasRoles;
    use Bannable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name', 'email', 'password','gender','country' , 'avatar_image', 'national_id','is_approved','approved_by','mobile','creator'



    ];

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



 public function routeNotificationForMail($notification)
    {
        return $this->email;
    }

    // relation many to many

    public function rooms()
    {
        return $this->belongsToMany(Room::class,'reservations')->withPivot('user_id', 'room_id','clientpaidprice','created_at','updated_at','accompanynumber');

    }
    public function user()
    {
        return $this->belongsTo(User::class,'creator');
    }


 public function reservations()
    {
        return $this->belongsTo(Reservations::class);

    }

    










}

