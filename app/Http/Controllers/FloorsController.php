<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Room;
use App\Floor;
use App\User;


class FloorsController extends Controller
{
  public function index(){
  // $floors=datatables(Floor::all())->toJson();
    $floors=Floor::all();
 //   return $floors;
  return view ('floors.index',[
        'floors' =>  $floors,
  ]);

}
}