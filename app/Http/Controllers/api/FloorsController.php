<?php

namespace App\Http\Controllers\api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFloorRequest;
use App\Floor;
use App\User;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;

class FloorsController extends Controller
{
    public function store(StoreFloorRequest $request){
        $floor = Floor::create([
            'name' => $request->get('name'),
            'user_id' =>$request->get('user'),
          ]);
        $floor = Floor::first();
        $token = JWTAuth::fromUser($floor);
        
        return Response::json(compact('token')); 
 }
 public function index(){
     $floors=Floor::all();
     return $floors;
    }
}
