
<html>
<head>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>
<body>

@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif

<br>
<br>
   <button type="button" class="btn btn-success" onclick="window.location.href='rooms/create'" >Create Room</button>

<br>
<br>
<table id="rooms-table" class="table">
<thead>
    <tr>

    <td>Number </td>
    <td>capacity </td>
    <td>price</td>
    <td> Floor Name </td>
    <td> Manger Name </td>
    <td id="actions"> Actions  </td>
    </tr>
</thead>
</table>

<script>
    $(function() {
        $('#rooms-table').DataTable({
           processing: true,
           serverSide: true,
            ajax: 'http://localhost:8000/rooms/getdatatable' ,
            data : {'_token' : '{{csrf_token()}}'},
            columns: [
            {data: 'number'},
            {data: 'capacity'},
            {data: 'price'},
            {data: 'floor.name'},
            {data: 'user.name'},      
            {data: 'action', name: 'action', orderable: false, searchable: false}          
        ]
        
        });
    });
</script>

<script>
$( document ).ready(function(){
$(document).on("click", ".delete", function() {
var line=$(this).parent().parent()
 if (confirm("Sure to delete?")) {
   $.ajax({
       url: "/rooms/"+$(this).attr('room'),
        type: 'DELETE',
        data : {'_token' : '{{csrf_token()}}'},
            success: function(result){
                line.remove();
                window.location.href="rooms"
            },
            error: function(err){
                window.location.href="rooms"

            }
    });
  }
});
}); </script>
</body>
</html>