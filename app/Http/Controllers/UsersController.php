<?php

namespace App\Http\Controllers;
use App\Notifications\NotifyClient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Reservation;
use App\User;
use Yajra\Datatables\Datatables;
use Auth;
use URL;


class UsersController extends Controller
{// receptionist 
    public function home(){
    	return view('receptionist.home');
    }

    public function getdatatable(){
    header("Access-Control-Allow-Origin: *");
    
    $users = User::role('client')->where('is_approved','=' ,0)->get();
    return datatables()->of($users)->addColumn('action', function ($data) {
    return "<a class='btn btn-xs btn-primary' href='/receptionist/$data->id/approve'>Approve</a> 
    <button class='btn btn-xs btn-danger delete '  user='$data->id' id='delete' >Delete </button>
    ";
    })->make(true);
 }



    public function manageClients(){
    	
    	 return view('receptionist.manageClients'); 

    }



    public function approvedClients(){
       
    	return view('receptionist.approvedClients');

    }


    public function getdatatableApproved(Request $request){
    header("Access-Control-Allow-Origin: *");
    $approved=User::where('is_approved','=',1)->where('approved_by','=',$request->user()->id)->get();
    //return $approved;
    return datatables()->of($approved)->make(true);
 }







    public function reservations(){
    	
    
    	return view('receptionist.reservations');
    }

    public function getdatatableReservations(Request $request){
        header("Access-Control-Allow-Origin: *");

        $array_of_clients = array();
       
        $clients = User::where('approved_by','=',$request->user()->id)->get();
       
        foreach ($clients as $client) {
        
          

             array_push($array_of_clients, $client->id);
           
        }
             $reservations= Reservation::whereIn('user_id',$array_of_clients)->with('user','room')->get();

                    return Datatables::of($reservations)->make(true);

        
 }


    public function approve(Request $request,$id){
    	//dd( $id);
        $user = User::find($id);
    	 User::find($id)->update(['is_approved' => '1',
    	 	'approved_by' => $request->user()->id
            ]);
         $user->notify(new NotifyClient("this is a notification msg"));
        return redirect('/receptionist/manage');

    }
    public function delete($id){
    	User::find($id)->delete();
    	 //return redirect('/receptionist/manage');
    }
    //***********************************
    //Admin 
    public function showClients(){
    	//$users = User::all();
    	return view('admin.showClients');

    }


    public function getdatatableClients(){
        header("Access-Control-Allow-Origin: *");
        $users = User::all();
        return datatables()->of($users)->addColumn('action', function ($data) {
        return "<a class='btn btn-xs btn-primary' href='/admin/clients/$data->id/edit'>edit</a> 
        <button class='btn btn-xs btn-danger delete '  user='$data->id' id='delete' >Delete </button>
        ";
         })->make(true);
 }



    public function createClient(){
        return view('admin.createClient');
    }

    public function storeClient(StoreUserRequest $request)
    {
         if(!($request->file('image'))){
            $request->avatar_image = 'user-default.png';
               // dd(URL::asset('/storage/clients/images/CdrEZNHmbxwUlGq8srjxun3mnCHA7slWrBrRXuls.png'));
         }else{
        //dd($request->file('image'));
        $image = $request->file('image')->store('public/clients/images');
        //dd($image);
         $name = $request->file('image')->hashName();
         $request->avatar_image = $name;
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'national_id' => $request->national_id,

            'gender' => $request->gender,
            'country' => $request->country,
            'avatar_image' => $request->avatar_image,
            'password' => Hash::make($request->password)

        ]);
        
        
       return redirect('admin/clients'); 
    }

    public function editClient($id){
    	$user = User::find($id);
    	return view('admin.updateClient',['user' => $user]);

    }


    public function updateClient($id,StoreUserRequest $request){
        if(!$request->file('image')) {
            $user=User::find($id);
           $name= $user->avatar_image;
           
        }
        else
        {

       $image = $request->file('image')->store('public/clients/images');
        //dd($image);
         $name = $request->file('image')->hashName();
        }

        User::find($id)->update(['name'=>$request->name,
            'email' => $request->email,
            'avatar_image' => $name,
            'national_id' => $request->national_id,

            'country' => $request->country,
            'gender' => $request->gender,
            'password' => Hash::make($request->password)]);
        return redirect('/admin/clients');

}
    public function deleteClient($id){
    	User::find($id)->delete();
    	return redirect('/admin/clients'); // admin hom

    }
}
