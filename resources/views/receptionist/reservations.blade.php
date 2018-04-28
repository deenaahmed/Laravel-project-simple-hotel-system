@extends('layouts.base')

@section('content')

<h1>Approved Reservations</h1>
<button onclick="location.href='{{ url('/receptionist') }}'">Home</button>
{{csrf_field()}}
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table id="reservations-table" class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>client Name</th>
      <th>client Accompany number</th>
      <th>room number</th>
      <th>client paid price</th>


    </tr>
  </thead>
</table>
@stop
@push('scripts')
<script>
    $(function() {
        $('#reservations-table').DataTable({
           processing: true,
           serverSide: true,
            ajax: 'http://localhost:8000/receptionist/reservations/getdatatable' ,
            data : {'_token' : '{{csrf_token()}}'},
            columns: [
            {data: 'id'},
            {data: 'user.name'},
            {data: 'user.national_id'}, 
            {data: 'room.number'},  
            {data: 'clientpaidprice'},  
            
        ]
        });
    });
</script>

@endpush
