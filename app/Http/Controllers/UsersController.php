<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Reservation;
use App\User;
use Auth;

class UsersController extends Controller
{// receptionist 
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
    	$array_of_clients=array();
    	$clients = User::where('approved_by','=',$request->user()->id)->get();
    	//dd($clients->id);
    	foreach ($clients as $client) {
    		# code...
    	
    	    	$reservations = Reservation::where('user_id','=',$client->id)->first();
    	    	array_push($array_of_clients, $reservations);
    	}
    
    	return view('receptionist.reservations',['reservations'=> $array_of_clients]);
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
    //***********************************
    //Admin 
    public function showClients(){
    	$users = User::all();
    	return view('admin.showClients',['users' => $users]);

    }
    public function addUser(){

    }
    public function editUser($id){


    }
    public function deleteUser($id){
    	User::find($id)->delete();
    	return redirect(''); // admin hom

    }
}
