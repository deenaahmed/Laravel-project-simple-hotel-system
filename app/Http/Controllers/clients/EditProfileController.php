<?php

namespace App\Http\Controllers\clients;

use App\Http\Requests\UpdateUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class EditProfileController extends Controller
{
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $User = User::where('id',$id)->first();
        $countries=countries();
        return view('client.editprofile', ['user' => $User,'countries'=>$countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        //


        if (empty($request->file('avatar'))) {
            $image = User::where('id',$id)->first()->avatar_image;


        } else {
            $image=$request->file('avatar')->store('public/clients/images');
        }
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'country' => $request->country,
            'avatar' => $image
        ]);
        return redirect('/');

    }

}
