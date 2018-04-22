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
 $order = Floor::create([
  'name' => 'Aya',
  'createdby' => 'sas2',
]);
/*
  return view ('floors.index',[
        'floors' =>  $floors,
  ]);
*/
$floors=Floor::all();
   return $floors;
}

public function store(){
  $floor = Floor::create([
    'name' => 'Aya',
    'createdby' => 'sas2',
  ]);
}

}