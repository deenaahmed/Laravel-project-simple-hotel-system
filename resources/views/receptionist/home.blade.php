<!DOCTYPE html>
<html>
<h1>
Welcome to Receptionist Home!
</h1>
<body>
<button onclick="location.href='{{ url('/receptionist/manage') }}'">Manage Clients</button>


<button onclick="location.href='{{ url('/receptionist/approved') }}'">Approved Clients</button>

<button onclick="location.href='{{ url('/receptionist/reservations') }}'">Reservations </button>
</body>
</html>