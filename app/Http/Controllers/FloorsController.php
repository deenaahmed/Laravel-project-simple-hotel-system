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
use Auth;

class FloorsController extends Controller
{
  public function index(){
    return view('floors.index',[    
    ]);
  }

public function getdatatable(){
  header("Access-Control-Allow-Origin: *");
  $floors = Floor::with('user')->get();
  return datatables()->of($floors)
  ->addColumn('action', function ($data) {
    if(Auth::user()->id == $data->user_id  || Auth::user()->hasRole('admin')){
    return "<a class='btn btn-xs btn-primary' href='/floors/$data->id/edit'>Edit</a> 
    <button class='btn btn-xs btn-danger delete '  floor='$data->id' id='delete' >Delete </button>
    ";}
    else{
      return " ";
      }
    })
    ->make(true);
 }

public function create(){
  $users=User::all();
  return view('floors.create');
  }

public function store(StoreFloorRequest $request){
  $floor = Floor::create([
    'name' => $request->name,
    'user_id' =>Auth::user()->id,
  ]);
  return redirect('floors');
  }

public function edit($id){
  $floor=Floor::find($id);
  $users=User::all();
   return view('floors.edit',[
        'floor'=> $floor,
      ]);
  }
public function update(StoreFloorRequest $request){
  Floor::where('id',$request->id)->update([
    'name'=> $request->name,    
  ]);
  return redirect('floors');
 } 
 
public function delete($id){
  $rooms=Room::all();
  $rooms_in_floor=$rooms->where('floor_id',$id);
  if (sizeof($rooms_in_floor)!=0)
  {
    return redirect()->back()->with('alert', 'Sorry ! you cant delete this floor , it has rooms ');
  }
  Floor::destroy($id);
  
  } 
}