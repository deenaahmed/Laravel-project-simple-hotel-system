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
    return view('floors.index');
}

public function store(){
  $floor = Floor::create([
    'name' => 'Aya',
    'createdby' => 'sas2',
  ]);
}
public function getdatatable(){
  return datatables()->of(Floor::query())->toJson();
}
}