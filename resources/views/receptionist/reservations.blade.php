@extends('admin.admin_template')

@section('content')

<head>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>
<body>
<h1>Approved Reservations</h1>
<button onclick="location.href='{{ url('/receptionist') }}'">Home</button>
{{csrf_field()}}
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table id="reservations-table" class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>client Name</th>
      <th>client Accompany number</th>
      <th>room number</th>
      <th>client paid price</th>


    </tr>
  </thead>

<script>
    $(function() {
        $('#reservations-table').DataTable({
           processing: true,
           serverSide: true,
            ajax: 'http://localhost:8000/receptionist/reservations/getdatatable' ,
            data : {'_token' : '{{csrf_token()}}'},
            columns: [
            {data: 'id'},
            {data: 'user.name'},
            {data: 'user.national_id'}, 
            {data: 'room.number'},  
            {data: 'clientpaidprice'},  
            
        ]
        });
    });
</script>
</body>
@endsection
