@extends('layouts.base')

@section('content')

@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif
<div align="center">
<h1> Floors </h1>
</div>
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
    @hasrole('admin')
    <td> Manager Name </td>
    @endhasrole
    <td id="actions"> Actions  </td>
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
            ajax: 'http://127.0.0.1:8000/floors/getdatatable' ,
            data : {'_token' : '{{csrf_token()}}'},
            columns: [
            {data: 'number'},
            {data: 'name'},
            @hasrole('admin') 
            {data: 'user.name'},
            @endhasrole  
            {data: 'action', name: 'action', orderable: false, searchable: false}          
        ]
        });
    });
</script>
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <script src="{{asset('js/jquery.js')}}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.js" type="text/javascript"></script>
    
<script>
$( document ).ready(function(){
$(document).on("click", ".delete", function() {
var line=$(this).parent().parent()
 if (confirm("Sure to delete?")) {
   $.ajax({
       url: "/floors/"+$(this).attr('floor'),
        type: 'DELETE',
        data : {'_token' : '{{csrf_token()}}'},
            success: function(result){
               line.remove();
                window.location.href="floors"
            },
            error: function(err){
               window.location.href="floors"
            }
    });
  }
  
});
}); </script>


@endpush