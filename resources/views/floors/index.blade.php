
<html>
<head>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>
<body>
@section('content')

@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif

<br>
<br>
   <button type="button" class="btn btn-success" onclick="window.location.href='floors/create'" >Create Floor</button>

<br>
<br>
{{csrf_field()}}
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table id="users-table" class="table">
<thead>
    <tr>
    <td>Id</td>
    <td>Number </td>
    <td>Name </td>
    <td> Manger </td>
    <td id="actions"> Actions  </td>
    </tr>
</thead>
</table>

<script>
    $(function() {
        $('#users-table').DataTable({
           processing: true,
           serverSide: true,
            ajax: 'http://localhost:8000/floors/getdatatable' ,
            data : {'_token' : '{{csrf_token()}}'},
            columns: [
            {data: 'id'},
            {data: 'number'},
            {data: 'name'}, 
            {data: 'user.name'},  
            {data: 'action', name: 'action', orderable: false, searchable: false}          
        ]
        });
    });
</script>

<script>
$( document ).ready(function(){
$(document).on("click", ".delete", function() {
console.log("/floors/"+$(this).attr('floor'))
var line=$(this).parent().parent()
 if (confirm("Sure to delete?")) {
   $.ajax({
       url: "/floors/"+$(this).attr('floor'),
        type: 'DELETE',
        data : {'_token' : '{{csrf_token()}}'},
            success: function(result){
               line.remove();
                //console.log(Respone);
                window.location.href="floors"
            },
            error: function(err){
               // console.log(err);
               window.location.href="floors"
            }
    });
  }
  
});
}); </script>
</body>
</html>
