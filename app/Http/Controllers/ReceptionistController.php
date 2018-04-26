<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\User;
use Auth;
class ReceptionistController extends Controller
{
    public function home(){
    	return view('receptionist.home');
    }

    public function manageClients(){
    	$users = User::where('is_approved','=' ,0)->get();
    	//dd($reservation);
    	 return view('receptionist.manageClients',[
            'users' => $users
            ]); 

    }
    public function approvedClients(Request $request){
    	$approved=User::where('is_approved','=',1)->where('approved_by','=',$request->user()->id)->get();
    	return view('receptionist.approvedClients',['approved'=> $approved]);

    }
    public function reservations(Request $request){
    	$clients = User::where('approved_by','=',$request->user()->id)->get();
    	foreach ($clients as $client) {
    		# code...
    	
    	$reservations = Reservation::where('user_id','=',$client->id)->get();
    }	
    	dd($reservations);
    
    	return view('receptionist.reservations',['reservations'=> $reservations]);
    }
    public function approve(Request $request,$id){
    	//dd( $id);
    	 User::find($id)->update(['is_approved' => '1',
    	 	'approved_by' => $request->user()->id
            ]);
        return redirect('/receptionist/manage');

    }
    public function delete($id){
    	User::find($id)->delete();
    	 return redirect('/receptionist/manage');
    }
}
