<!DOCTYPE html>
<html>

<body>
<h1>My Approved Clients</h1>
<button onclick="location.href='{{ url('/receptionist') }}'">Home</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">client Name</th>
      <th scope="col">email</th>
      <th scope="col">mobile</th>
      <th scope="col">Country</th>
      <th scope="col">gender</th>

     
    </tr>
  </thead>

  <tbody>

  @foreach ($approved as $info)

    <tr>
      <td scope="row">{{ $info->id }}</td>
      <td>{{ $info->name }}</td>
      <td>{{ $info->email }}</td>
      <td>{{ $info->mobile }}</td>
      <td>{{ $info->country }}</td>
      <td>{{ $info->gender }}</td>
     
      </tr>
      @endforeach
      </tbody>
      </table>

</body>
</html>
