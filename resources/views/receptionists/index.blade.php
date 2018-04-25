@extends('admin.admin_template')
@section('content')
<button type="button" class="btn btn-success"  onclick="location.href = '/receptionists/create';">Add a new Receptionist </button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Receptionist Name</th>
      <th scope="col">Receptionist Email</th>
      <th scope="col">Receptionist National ID</th>
      <th scope="col">Receptionist created at</th>
      <th scope="col">Added by</th>
	  <th scope="col">Edit action</th>
	  <th scope="col">Delete action</th>
    </tr>
  </thead>


@foreach ($receps as $recep)
<tr>
<td>{{ $recep->id }}</td>
<td>{{ $recep->name}}</td>
<td> {{$recep->email}}</td> 
<td> {{$recep->national_id}}</td> 
 <td>{{ \Carbon\Carbon::parse($recep->createdat)->format('d/m/Y')}}</td> 
 <td><button type="button" class="btn btn-primary" onclick="location.href = '/receptionists/{{$recep->id}}/edit';">Edit</button></td> 
 <td>
<form  action="/receptionists/{{$recep->id}}" method="Post">
{{ method_field('DELETE') }}
{{csrf_field()}}
 <button type="submit" class="btn btn-danger">Delete</button>
 </form>
 </td>

</tr>
@endforeach

</table>
 <div class="panel-heading" style="display:flex; justify-content:center;align-items:center;">
        {{$receps->links()}}
    </div>

@endsection