@extends('layouts.base')

@section('content')



<h1>Manage Clients</h1>
<br />
<button type="button" class="btn btn-success" onclick="location.href='{{ url('/admin/clients/add') }}'">add client </button>
{{csrf_field()}}
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table id="users-table" class="table">
<thead>
    <tr>
      <th>#</th>
      <th>client Name</th>
      <th>email</th>
      <th>mobile</th>
      <th>country</th>
      <th>gender</th>
      <th id="actions">Action</th>

    </tr>
  </thead>

  </table>
@stop
@push('scripts')
<script>
    $(function() {
        $('#users-table').DataTable({
           processing: true,
           serverSide: true,
            ajax: 'http://127.0.0.1:8000/admin/clients/getdatatable' ,
            data : {'_token' : '{{csrf_token()}}'},
            columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'email'}, 
            {data: 'mobile'},  
            {data: 'country'},  
            {data: 'gender'},  
            {data: 'action', name: 'action', orderable: false, searchable: false}          
        ]
        });
    });
</script>
 
<script>
$( document ).ready(function(){
$(document).on("click", ".delete", function() {
//console.log("/floors/"+$(this).attr('floor'))
var line=$(this).parent().parent()
 if (confirm("Sure to delete?")) {
   $.ajax({
       url: "/receptionist/"+$(this).attr('user'),
        type: 'DELETE',
        data : {'_token' : '{{csrf_token()}}'},
            success: function(result){
               line.remove();
                //console.log(Respone);
                window.location.href="/admin/clients"
            },
            error: function(err){
               // console.log(err);
               window.location.href="/admin/clients"
            }
    });
  }
  
});
}); </script>


@endpush