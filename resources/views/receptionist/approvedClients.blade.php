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
<h1>My Approved Clients</h1>
<button onclick="location.href='{{ url('/receptionist') }}'">Home</button>
{{csrf_field()}}
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table id="approved-table" class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>client Name</th>
      <th>email</th>
      <th>mobile</th>
      <th>Country</th>
      <th>gender</th>

     
    </tr>
  </thead>
</table>

<script>
    $(function() {
        $('#approved-table').DataTable({
           processing: true,
           serverSide: true,
            ajax: 'http://localhost:8000/receptionist/approved/getdatatable' ,
            data : {'_token' : '{{csrf_token()}}'},
            columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'email'}, 
            {data: 'mobile'},  
            {data: 'country'},  
            {data: 'gender',orderable: false, searchable: false},  

        ]
        });
    });
</script>
</body>
@endsection