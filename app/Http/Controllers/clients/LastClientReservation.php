<?php

namespace App\Http\Controllers\clients;

use App\Reservation;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LastClientReservation extends Controller
{
    //


    public function index()
    {

        $user=User::where('id',1);
        dd(datatables()->of($user)->toJson());


        // return Datatables::of(User::query())->make(true);
        return view('client.ShowLastClientReservation');



    }

    public function show($id)
    {
       // return Datatables::of(User::query())->make(true);


         //return datatables()->of(Reservation::query())->toJson();

  //      $posts = DB::table('posts')->join('users', 'users.id', '=', 'reservations.user_id')
    //        ->select(['posts.id', 'posts.title', 'users.name', 'users.email', 'posts.created_at', 'posts.updated_at']);

        $user=User::where('id',1);

        return  datatables()->of($user)->toJson();

    }


}
