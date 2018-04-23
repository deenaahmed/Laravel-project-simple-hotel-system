@extends('layouts.master')

@section('content')
<br>
<br>
   <button type="button" class="btn btn-success" onclick="window.location.href='floors/create'" >Create Post</button>

<br>
<br>
<table id="users-table" class="table">
<thead>
    <tr>
    <td>Id</td>
    <td>Number </td>
    <td>Name </td>
    <td> created_at </td>
    <td> updated_at </td>
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
            {data: 'created_at'},
            {data: 'updated_at'},    
            {data: 'action', name: 'action', orderable: false, searchable: false}          
        ]
        });
    });
</script>

<script>
$( document ).ready(function(){
$(document).on("click", ".delete", function() {
console.log("/floors/"+$(this).attr('post'))
var line=$(this).parent().parent()
 if (confirm("Sure to delete?")) {
   $.ajax({
       url: "/floors/"+$(this).attr('post'),
        type: 'DELETE',
        data : {'_token' : '{{csrf_token()}}'},
            success: function(result){
                line.remove();
            },
            error: function(err){
                console.log(err);
            }
    });
  }
});
}); </script>
 @endsection
