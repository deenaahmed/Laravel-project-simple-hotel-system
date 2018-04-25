<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room ;

use Cartalyst\Stripe\Laravel\StripeServiceProvider;
use Cartalyst\Stripe\Laravel\Facades\Stripe;




class ClientReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        $this->middleware('auth', ['except' => ['show' , 'index']]);
    }


    public function index()
    {
        //
        $rooms=Room::where('isavailable','true')->get();
        return view('client.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("client.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $room=Room::where('id',$id)->first();
        return view('client.edit' , compact('room','id'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room=Room::find($id)->first();

        $stripe =Stripe::setApiKey('sk_test_zyzFKYxort7alJrqjacsBWtR');

            $stripe->charges()->create([

            'currency' => 'USD',
            'amount'   => $room->price,
            'source' => $request->stripeToken ,
            'description' => 'book room number'.$room->number
        ]);

            return view('clients.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
