<?php
namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\StoreFloorRequest;
use Illuminate\Database\Eloquent\Model;
use App\Room;
use App\Floor;
use App\User;

class FloorsController extends Controller
{
  public function index(){
    return view('floors.index',[
      'errors' => '',
    ]);
  }

public function getdatatable(){
  header("Access-Control-Allow-Origin: *");
  $floors = Floor::with('user')->get();
  return datatables()->of($floors)
  ->addColumn('action', function ($data) {
    return "<a class='btn btn-xs btn-primary' href='/floors/$data->id/edit'>Edit</a> 
    <a class='btn btn-xs btn-danger delete ' csrf_token() id='delete' post='$data->id' href='/floors/$data->id'>Delete </a>
    ";
    })
    ->make(true);
 }

public function create(){
  $users=User::all();
  return view('floors.create',[
     'users'=>$users
    ]);
  }

public function store(StoreFloorRequest $request){
  $floor = Floor::create([
    'name' => $request->name,
    'user_id' =>$request->user,
  ]);
  return redirect('floors');
  }

public function edit($id){
  $floor=Floor::find($id);
  $users=User::all();
   return view('floors.edit',[
        'users'=> $users,
        'floor'=> $floor,
      ]);
  }
public function update(StoreFloorRequest $request){
  Floor::where('id',$request->id)->update([
    'name'=> $request->name,
    'user_id'=> $request->user,     
  ]);
  return redirect('floors');
 } 
 
public function delete($id){
  $rooms=Room::all();
  $rooms_in_floor=$rooms->where('floor_id',$id);
  if (sizeof($rooms_in_floor)!=0)
  {
    return view('floors.index',[
      'errors' => "This Floor Has Room You Can't Delete it"
    ]);
  }
  Floor::destroy($id);
  return redirect('floors');
  }       
}