@extends('layouts.base')

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
<input type="hidden" name="_method" value="PUT">
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
    <label>Room Price ($) </label>
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

<br>
    <label >Room Image </label>

<input type="file" name="image" class="form-control" />
<br>
<br>
  <button type="submit" class="btn btn-success">Submit</button>
 
</form>

@stop
@push('scripts')
  <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <script src="{{asset('js/jquery.js')}}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.js" type="text/javascript"></script>
    
  @endpush   