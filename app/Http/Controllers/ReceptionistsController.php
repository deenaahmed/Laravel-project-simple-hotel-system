<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Http\File;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;

class ReceptionistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receps = User::where('type', '=', 3)->paginate(2);
        return view('receptionists.index',[

            'receps' => $receps
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $receps = User::where('type', '=', 3);
        return view('receptionists.create',[
            'receps' => $receps
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if($request->file('avatar_image')==null){
        $path='/avatars2/Nophoto.jpg';
        }
        else{
        $path = Storage::putFile('avatars2', $request->file('avatar_image'));
        }
        Storage::setVisibility($path, 'public');
		User::create([
			'name' => $request->name,
			'email' => $request->email,
            'password' => $request->password,
            'national_id' => $request->national_id,
            'avatar_image' => $path,
            'type' => 3,
        ])->assignRole('receptionist');;

       return redirect(route('receptionists.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $receps = User::where('id', $request->id)->first();
        return view('receptionists.show',[
            'receps' => $receps
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receps = User::where('id', '=', $id)->first();
		return view('receptionists.update',[
            'receps' => $receps
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $receps = User::where('id', $request->id)->first();
        if($request->file('photo')==null){
			 $receps->update([
                'name' => $request->name,
				'email' => $request->email,
                'national_id' => $request->national_id,
                'type' => 3,
        ]);
        }
        else{
            Storage::delete($receps->photo);
            $path = Storage::putFile('avatars2', $request->file('avatar_image'));
             Storage::setVisibility($path, 'public');
                 $receps->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'avatar_image' => $path,
                    'national_id' => $request->national_id,
                    'type' => 3,
            ]);
        }
        
       return redirect(route('receptionists.index')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $receps = User::where('id', $request->id)->first();
        Storage::delete($receps->photo);
        $receps->delete();
        return redirect(route('receptionists.index')); 
    }
}
