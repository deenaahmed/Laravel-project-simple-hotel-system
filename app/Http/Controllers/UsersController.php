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
    	$array_of_clients = array();
    	$clients = User::where('approved_by','=',$request->user()->id)->get();
    	//dd($clients->id);
    	foreach ($clients as $client) {
    		# code...php
    	
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
    public function createClient(){
        return view('admin.createClient');
    }

    public function storeClient(Request $request)
    {
         //dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'country' => $request->country,
            'avatarimage' => $request->image,
            'password' => $request->password,

        ]);
        
       return redirect('admin/clients'); 
    }

    public function editClient($id){
    	$user = User::find($id);
    	return view('admin.updateClient',['user' => $user]);

    }


    public function updateClient($id,Request $request){
        //$post = Post::find($id);
       

        User::find($id)->update(['name'=>$request->name,
            'email' => $request->email,
            'avatarimage' => $request->image,
            'country' => $request->country,
            'gender' => $request->gender,
            'password' => $request->password]);
        return redirect('/admin/clients');

}
    public function deleteClient($id){
    	User::find($id)->delete();
    	return redirect('/admin/clients'); // admin hom

    }
}
