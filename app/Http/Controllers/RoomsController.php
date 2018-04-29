<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Room;
use App\Floor;
use App\User;
use Auth;
class RoomsController extends Controller
{
public function index(){
    return view('rooms.index');
   
}

public function getdatatable(){
    header("Access-Control-Allow-Origin: *");
   $rooms =Room::with('floor','user')->get();
    return datatables()->of($rooms)
    ->addColumn('action', function ($data) {
      if(Auth::user()->id == $data->user_id || Auth::user()->hasRole('admin')){
    return "<a class='btn btn-xs btn-primary' href='/rooms/$data->id/edit'>Edit</a> 
    <button class='btn btn-xs btn-danger delete ' csrf_token() id='delete' room='$data->id'>Delete </a>
    "; }
    else{
    return " ";
    }
   })
    ->make(true);
  } 
  
public function create(){
  $users=User::all();
  $floors=Floor::all();
    return view('rooms.create',[
       'floors'=>$floors,
   ]);
}
  
public function store(StoreRoomRequest $request){
  $image = $request->file('image');
  $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
  $destinationPath = public_path('/room_images');
  $image->move($destinationPath, $input['imagename']);

  $room = Room::create([
      'number' => $request->number,
      'capacity' =>$request->capacity,
      'price'=>$request->price,
      'floor_id'=> $request->floor,
      'user_id'=> Auth::user()->id,
      'isavailable'=> 'true',
      'image'=> $input['imagename']
       ]);
    return redirect('rooms');
  }  

public function edit($id){
  $room=Room::find($id);
  $users=User::all();
  $floors=Floor::all();
    return view('rooms.edit',[
      'room'=> $room,
      'floors'=>$floors,
    ]);
}
public function update(UpdateRoomRequest $request){
  if ($requests->image ==null){
    $photo='default_room.jpg';
  }
  else {
    $image = $request->file('image');
    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/room_images');
    $image->move($destinationPath, $input['imagename']);
    $photo=$input['imagename'];
  }
Room::where('id',$request->id)->update([
  'number' => $request->number,
  'capacity' =>$request->capacity,
  'price'=>$request->price*100,
  'floor_id'=> $request->floor,
  'image' => $photo
]);
return redirect('rooms');
  }

  public function delete($id){
    $room=Room::find($id);
    if ($room->isavailable=="false"){
      return redirect()->back()->with('alert', 'Sorry ! you cant delete this room , it is reserved ');
    }
  Room::destroy($id);
    }     

}
