<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\User;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'national_id'=>'11111111111'
        ]);
        $user = User::first();
        $token = JWTAuth::fromUser($user);
        
        return Response::json(compact('token'));
    }
}