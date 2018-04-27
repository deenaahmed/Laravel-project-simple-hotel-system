
<html>
<head>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>
<body>

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
<form method="post" action="/rooms" enctype="multipart/form-data"> 
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

  <br>
 Image: <input type="file" name="image" class="form-control" />
  <button type="submit" class="btn btn-success">Submit</button>
</form>

</div>
</div>

</body>
</html>