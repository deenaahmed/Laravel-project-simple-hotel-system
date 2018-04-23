@extends('layouts.master')
@section('content')
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Receptionist info</h5>
    <img src=" {{URL::asset($receps['avatar_image'])}}"></img>
    <h6 class="card-subtitle mb-2 text-muted">Receptionist Name: {{$receps['name']}}</h6>
    <p class="card-text"> Receptionist Email: {{$receps['email']}}</p>
    <p class="card-text"> Receptionist National ID: {{$receps['national_id']}}</p>
	<p class="card-text"> Receptionist Creation: {{\Carbon\Carbon::parse($receps->created_at)->format('l  \\of F Y h:i:s A')}}</p>
  </div>
</div>
<div class="card" style="width: 18rem;">
@endsection
