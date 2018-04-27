@extends('admin.admin_template')

@section('content')



<h1>Manage Clients</h1>
<button onclick="location.href='{{ url('/receptionist') }}'">Home</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">client Name</th>
      <th scope="col">email</th>
      <th scope="col">mobile</th>
      <th scope="col">image</th>
      <th scope="col">country</th>

      <th scope="col">gender</th>
      <th scope="col">Action</th>

    </tr>
  </thead>

  <tbody>

  @foreach ($users as $user)

    <tr>
      <td scope="row">{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{$user->email }}</td>
      <td>{{ $user->mobile }}</td>
      <td>{{ $user->avatarimage }}</td>
      <td>{{ $user->country }}</td>
      <td>{{ $user->gender }}</td>
      <td><button onclick="location.href='{{ url('/receptionist/'.$user->id).'/approve' }}'">approve</button>
      <button onclick="location.href='{{ url('/receptionist/'.$user->id).'/delete' }}'">delete</button>
      </td>
      </tr>
      @endforeach
      </tbody>
      </table>

@endsection