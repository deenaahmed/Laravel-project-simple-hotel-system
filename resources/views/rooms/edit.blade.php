@extends('layouts.master')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<br>
<div class="row">
<div class="col-2"> </div>
<dic class="col-8">

<form method="post" action="/rooms/{{$room->id}}" > 

{{csrf_field()}}
<input type="hidden" name="_method" value="PATCH">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
    <label>Room Number</label>
    <input type="number" name="number" class="form-control" value={{$room->number}}>
  </div>

<div class="form-group">
    <label>Room Capacity</label>
    <input type="number" name="capacity" class="form-control" value={{$room->capacity}}>
  </div>


    <div class="form-group">
    <label>Room Price</label>
    <input type="text" name="price" class="form-control"  value={{$room->price}}>
  </div>

 <div class="form-group">
    <label >Floor</label>
    <select class="form-control" name="floor">
    @foreach ($floors as $floor)
      <option value="{{$floor->id}}" >{{ $floor->name }}</option>
@endforeach
    </select>

  </div>

 <div class="form-group">
    <label >Room Creator</label>
    <select class="form-control" name="user">
    @foreach ($users as $user)
      <option value="{{$user->id}}" >{{ $user->name }}</option>
@endforeach
    </select>

  <button type="submit" class="btn btn-success">Submit</button>
 
</form>

 @endsection
