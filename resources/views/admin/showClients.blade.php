<!DOCTYPE html>
<html>

<body>
<h1>Manage Clients</h1>
<button onclick="location.href='{{ url('/home') }}'">Home</button>
<br />
<button onclick="location.href='{{ url('/admin/clients/add') }}'">add client </button>
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
  @if ($user->id ===1)

  @else
    <tr>
      <td scope="row">{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->mobile }}</td>
      <td>{{ $user->avatarimage }}</td>
      <td>{{ $user->country }}</td>
      <td>{{ $user->gender }}</td>

      <td><button onclick="location.href='{{ url('/admin/clients/'.$user->id).'/edit' }}'">Edit</button>
      <button onclick="location.href='{{ url('/admin/clients/'.$user->id).'/delete' }}'">delete</button>
      </td>
      </tr>
      @endif
      @endforeach
      </tbody>
      </table>

</body>
</html>
