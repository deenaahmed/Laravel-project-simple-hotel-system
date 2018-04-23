@extends('layouts.master')

@section('content')

   <button type="button" class="btn btn-success" onclick="window.location.href='floors/create'" >Create Post</button>


<table id="users-table" class="table">
<thead>
    <tr>
    <td>Id</td>
    <td>Number </td>
    <td>Name </td>
    <td> created_at </td>
    <td> updated_at </td>
    </tr>
</thead>
</table>

<script>
    $(function() {
        $('#users-table').DataTable({
           processing: true,
           serverSide: true,
    
            ajax: 'http://localhost:8000/floors/getdatatable' ,
            columns: [
            {data: 'id'},
            {data: 'number'},
            {data: 'name'},
            {data: 'created_at'},
            {data: 'updated_at'}
        ]
        });
    });
</script>

 @endsection
