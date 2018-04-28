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
     public function index(){
     $floors=Floor::all();
     return $floors;
    }
}
