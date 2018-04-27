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
<br>
<div class="row">
<div class="col-2"> </div>
<dic class="col-8">



  
<form method="post" action="/floors/{{$floor->id}}" > 

{{csrf_field()}}
<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
    <label>Floor Name</label>
    <input type="text" name="name" class="form-control" value={{$floor->name}} >
  </div>

 <div class="form-group">
    <label >Floor Creator</label>
    <select class="form-control" name="user">
    @foreach ($users as $user)
      <option value="{{$user->id}}" >{{ $user->name }}</option>
@endforeach
    </select>

  </div>

  <button type="submit" class="btn btn-success">Submit</button>
 
</form>

</div>
</div>
@endsection