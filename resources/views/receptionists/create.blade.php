@extends('layouts.base')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="/receptionists" enctype="multipart/form-data">
{{csrf_field()}}
Name :- <input type="text" name="name" placeholder="Enter the Receptionist name">
<br>
<br>
Email :- <input type="text" name="email" placeholder="Enter the Receptionist email">
<br>
<br>
National ID :- <input type="text" name="national_id" placeholder="Enter the receptionist national id">
<br>
<br>
Password :- <input type="password" name="password" >
<br>
<br>
Avatar Image :- <input  type="file"  name="avatar_image"  >
<br>
<br>
</select>
<input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection
