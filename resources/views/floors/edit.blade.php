
<html>
<head>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>
<body>
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



  
<form method="post" action="/floors/{{$floor->id}}" > 

{{csrf_field()}}
<input type="hidden" name="_method" value="PATCH">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
    <label>Floor Name</label>
    <input type="text" name="name" class="form-control" value={{$floor->name}} >
  </div>

 <div class="form-group">
    <label >Floor Creator</label>
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

</body>
</html>
