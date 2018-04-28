@extends('admin.admin_template')

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
<head>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>
<h2>Add client</h2>

<form method="post" action="/admin/clients" enctype="multipart/form-data">

{{csrf_field()}}
user name :- <input type="text" name="name" />

<br /><br />
Email :- <input type="text" name="email" />
<br/><br/>
National id :- <input type="text" name="national_id" />
<br/><br/>

Gender:-                         
<select name="gender">
<option value="" selected disabled>Please select gender</option>
<option value="male">male</option>
<option value="female">female</option>
</select>

<br/>
<br/>
<label for="country" >{{ __('Country') }}</label>
<select   name="country" >
<option value="" selected disabled>Please select Country</option>
@foreach(countries() as $country)
<option >{{$country['name']}}</option>
@endforeach
</select>
<br/>
<br/>
 <label for="image" >{{ __('image') }}</label>
 select image: <input  type="file" name="image"    />
<br/>
<br/>

 password: <input id="password" type="password" name="password" required/>

 <br/>
 <br/>
<input type="submit" value="Submit" class="btn btn-primary"/>
</form>

@endsection