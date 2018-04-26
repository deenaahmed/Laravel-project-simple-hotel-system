
@extends('layouts.base')
@section('content')
<button type="button" class="btn btn-success"  onclick="location.href = '/managers/create';">Add a new Maneger </button>
<table id="table_id" class="display">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Manager name</th>
        <th scope="col">Manager Email</th>
        <th scope="col">Manager National ID</th>
        <th scope="col">Manager created at</th>
        <th scope="col">Added by</th>
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
        ajax: '{!! route('managers.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'national_id', name: 'national_id' },
            { data: 'created_at', name: 'created_at' },
            { data: 'creator', name: 'creator' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
$(document).on('click','.delete',function(){
    let id = $(this).attr('target');
    let conf = confirm("Are you sure you want to delete this record?");
    if(conf)
    $.ajax({
        url:`managers/${id}`,
        type: 'POST',
        data:{
            '_token' : '{{csrf_token()}}',
            '_method':'DELETE'
        },
        sucsess: res => {
            res = JSON.parce(res);
            if(res.status){
                $(this).parent().parent().remove();
            }
        }
    });
});
</script>
@endpush