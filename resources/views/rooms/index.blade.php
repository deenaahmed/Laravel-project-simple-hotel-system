@extends('layouts.base')

@section('content')
@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif
<div align="center">
<h1> Rooms </h1>
</div>

   <button type="button" class="btn btn-success" onclick="window.location.href='rooms/create'" >Create Room</button>

<br>
<br>
<table id="rooms-table" class="table">
<thead>
    <tr>

    <td>Number </td>
    <td>capacity </td>
    <td>price($)</td>
    <td> Floor Name </td>
    @hasrole('admin')
    <td>Manager Name </td>
    @endhasrole
   
    <td id="actions"> Actions  </td>

    </tr>
</thead>
</table>
@stop
@push('scripts')
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
            @hasrole('admin')
            {data: 'user.name'},  
            @endhasrole  
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
}); 
</script>



  <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <script src="{{asset('js/jquery.js')}}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.js" type="text/javascript"></script>
    
  @endpush   