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
   
        return view('client.ShowLastClientReservation');



    }

    public function show($id)
    {


        $rooms=\DB::table('rooms')

            ->join('reservations','reservations.room_id','=','rooms.id')
            ->select('rooms.number','reservations.clientpaidprice','reservations.accompanynumber')
            ->where(['reservations.user_id' => $id])
            ->get();

        
       return datatables()::of($rooms)->toJson();


    }


}
