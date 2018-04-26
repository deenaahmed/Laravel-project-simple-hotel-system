<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Http\File;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;



class ManagersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */


    public function index()
    {
        // $managers = User::where('name', '=', 'manager')->paginate(2);
        return view('managers.index'); 
   }
   public function getdata()
    {
          
        return Datatables::of(User::query())
        ->addColumn('action', function($query){
        $ret =  "<a href='managers/" . $query->id . "/edit' class='btn btn-xs btn-primary'><i class='glyphicon glyphicon-edit'></i> Edit</a>";
         $ret .= "<button type='button' target='".$query->id."'  class='delete btn-xs btn btn-danger' > DELETE </button>";
            return $ret;
    })->rawcolumns(['action']) ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = User::where('name', '=', 'manager');
        return view('managers.create',[
            'admins' => $admins
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
            ]);

       return redirect(route('managers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $managers = User::where('id', $request->id)->first();
        return view('managers.show',[
            'managers' => $managers
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
        $managers = User::where('id', '=', $id)->first();
		return view('managers.update',[
            'managers' => $managers
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
        $managers = User::where('id', $request->id)->first();
        if($request->file('photo')==null){
			 $managers->update([
                'name' => $request->name,
				'email' => $request->email,
                'national_id' => $request->national_id,
        ]);
        }
        else{
            Storage::delete($managers->photo);
            $path = Storage::putFile('avatars2', $request->file('avatar_image'));
             Storage::setVisibility($path, 'public');
                 $managers->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'avatar_image' => $path,
                    'national_id' => $request->national_id,
            ]);
        }
        
       return redirect(route('managers.index')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $managers = User::where('id', $request->id)->first();
        Storage::delete($managers->photo);
        $managers->delete();
        return redirect(route('managers.index')); 
    }
}
