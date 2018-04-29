@extends('layouts.base')

@section('content')



<h1>My Approved Clients</h1>
{{csrf_field()}}
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table id="approved-table" class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>client Name</th>
      <th>email</th>
      <th>mobile</th>
      <th>Country</th>
      <th>gender</th>

     
    </tr>
  </thead>
</table>
@stop
@push('scripts')
<script>
    $(function() {
        $('#approved-table').DataTable({
           processing: true,
           serverSide: true,
            ajax: 'http://127.0.0.1:8000/receptionist/approved/getdatatable' ,
            data : {'_token' : '{{csrf_token()}}'},
            columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'email'}, 
            {data: 'mobile'},  
            {data: 'country'},  
            {data: 'gender',orderable: false, searchable: false},  

        ]
        });
    });
</script>
@endpush