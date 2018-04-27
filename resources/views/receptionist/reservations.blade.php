<!DOCTYPE html>
<html>

<body>
<h1>Approved Reservations</h1>
<button onclick="location.href='{{ url('/receptionist') }}'">Home</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">client Name</th>
      <th scope="col">client Accompany number</th>
      <th scope="col">room number</th>
      <th scope="col">client paid price</th>


    </tr>
  </thead>

  <tbody>

  @foreach ($reservations as $info)

    <tr>
      <td scope="row">{{ $info->id }}</td>
      <td>{{ $info->user->name }}</td>
      <td>{{ $info->user->national_id }}</td>
      <td>{{ $info->room['number'] }}</td>
      <td>{{ $info->clientpaidprice }}</td>
     
      </tr>
      @endforeach
      </tbody>
      </table>

</body>
</html>
