@extends('admin.admin_template')
@section('content')
<div  style="width: 18rem;">
  <div >
    <h5 class="card-title">Manager info</h5>
    <img src=" {{URL::asset($managers['avatar_image'])}}"></img>
    <h6 class="card-subtitle mb-2 text-muted">Manager Name: {{$managers['name']}}</h6>
    <p class="card-text"> Manager Email: {{$managers['email']}}</p>
    <p class="card-text"> Manager National ID: {{$managers['national_id']}}</p>
	<p class="card-text"> Manager Creation: {{\Carbon\Carbon::parse($managers->created_at)->format('l  \\of F Y h:i:s A')}}</p>
  </div>
</div>
@endsection
