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

<br>
<div class="row">
<div class="col-2"> </div>
<dic class="col-8">
<form method="post" action="/floors" > 
{{csrf_field()}}
  <div class="form-group">
    <label>Floor Name</label>
    <input type="text" name="name" class="form-control"  placeholder="Floor Name">
  </div>


  <button type="submit" class="btn btn-success">Submit</button>
</form>

</div>
</div>
@endsection