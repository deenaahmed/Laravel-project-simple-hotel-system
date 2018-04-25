@extends('admin.admin_template')
@section('content')
<button type="button" class="btn btn-success"  onclick="location.href = '/managers/create';">Add a new Maneger </button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Manager name</th>
      <th scope="col">Manager Email</th>
      <th scope="col">Manager National ID</th>
      <th scope="col">Manager created at</th>
      <th scope="col">Added by</th>
	  <th scope="col">Edit action</th>
	  <th scope="col">Delete action</th>
    </tr>
  </thead>


@foreach ($managers as $manager)
<tr>
<td>{{ $manager->id }}</td>
<td>{{ $manager->name}}</td>
<td> {{$manager->email}}</td> 
<td> {{$manager->national_id}}</td> 
<td> {{$manager->creator}}</td> 
 <td>{{ \Carbon\Carbon::parse($manager->createdat)->format('d/m/Y')}}</td> 
 <td><button type="button" class="btn btn-primary" onclick="location.href = '/managers/{{$manager->id}}/edit';">Edit</button></td> 
 <td>
<form  action="/managers/{{$manager->id}}" method="Post">
{{ method_field('DELETE') }}
{{csrf_field()}}
 <button type="submit" class="btn btn-danger">Delete</button>
 </form>
 </td>

</tr>
@endforeach

</table>
 <div class="panel-heading" style="display:flex; justify-content:center;align-items:center;">
        {{$managers->links()}}
    </div>

@endsection