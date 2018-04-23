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
<form method="post" action="/rooms" > 
{{csrf_field()}}
  <div class="form-group">
    <label>Room Number</label>
    <input type="number" name="number" class="form-control"  placeholder="Room Number">
  </div>

  <div class="form-group">
    <label>Room Capacity</label>
    <input type="number" name="capacity" class="form-control"  placeholder="Room Capacity">
  </div>

    <div class="form-group">
    <label>Room Price</label>
    <input type="text" name="price" class="form-control"  placeholder="Room Price">
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

  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>

</div>
</div>


 @endsection