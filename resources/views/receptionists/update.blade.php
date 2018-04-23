@extends('layouts.master')
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

<form  action="/receptionists/{{$receps->id}}" method="Post" enctype="multipart/form-data">
<?php echo method_field('PUT'); ?>
{{csrf_field()}}
<input type="hidden" name="id" value="{{$receps->id}}" >
Name :- <input type="text" name="name" value="{{$receps->name}}" >
<br>
<br>
Email :- <input type="text" name="email" value="{{$receps->email}}" >
<br>
<br>
National ID :- <input type="text" name="national_id" value="{{$receps->national_id}}" >
<br>
<br>
<input  type="file"  name="avatar_image" >
<input type="submit" value="Update" class="btn btn-primary">
</form>
@endsection