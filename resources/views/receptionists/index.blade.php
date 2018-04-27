@extends('layouts.base')
@section('content')
<button type="button" class="btn btn-success"  onclick="location.href = '/receptionists/create';">Add a new Receptionist </button>
<table id="table_id" class="display" >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Receptionist Name</th>
      @hasrole('admin')
      <th scope="col">Receptionist Email</th>
      <th scope="col">Receptionist National ID</th>
      <th scope="col">Receptionist created at</th>
      <th scope="col">Added by</th>
      @else
    @endhasrole
	  <th scope="col">Actions</th>
    </tr>
  </thead>
</table>

@stop
@push('scripts')
  <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <script src="{{asset('js/jquery.js')}}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.js" type="text/javascript"></script>
    <script>
$(function() {
    $('#table_id').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('receptionists.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            @hasrole('admin')
            { data: 'national_id', name: 'national_id' },
            { data: 'created_at', name: 'created_at' },
            { data: 'creator', name: 'creator' },
            @else
            @endhasrole
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
$(document).on('click','.delete',function(){
    let id = $(this).attr('target');
    let conf = confirm("Are you sure you want to delete this record?");
    if(conf)
    $.ajax({
        url:`receptionists/${id}`,
        type: 'POST',
        data:{
            '_token' : '{{csrf_token()}}',
            '_method':'DELETE'
        },
        sucsess: res => {
            res = JSON.parce(res);
            if(res.status){
                $(this).parents('tr').remove();
            }
        }
    });
    $('#table_id').DataTable().ajax.reload();
});
$(document).on('click','.ban',function(){
    let id = $(this).attr('targetban');
    $.ajax({
        url:`receptionists/${id}/bann`,
        type: 'GET',
    });
    $('#table_id').DataTable().ajax.reload();
});
</script>
@endpush