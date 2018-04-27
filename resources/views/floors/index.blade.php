@extends('admin.admin_template')

@section('content')

@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif

   <button type="button" class="btn btn-success" onclick="window.location.href='floors/create'" >Create Floor</button>

<br>
<br>
{{csrf_field()}}
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table id="users-table" class="table">
<thead>
    <tr>
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


@endsection