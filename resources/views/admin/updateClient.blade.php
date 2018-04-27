@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h2>Add client</h2>

<form method="post" action="{{ '/admin/clients/'.$user->id }}" enctype="multipart/form-data">
<?php echo method_field('PUT') ?>

{{csrf_field()}}
user name :- <input type="text" name="name" value="{{$user->name}}" />

<br /><br />
Email :- <input type="text" name="email" value="{{$user->email}}" />
<br/><br/>
                          
  <select name="gender" >

<option value="" selected disabled>Please select gender</option>
@if($user->gender=="male")

<option selected="selected" value="male">male</option>
@else
<option  selected="selected" value="female">female</option>
@endif
</select>

<br/>
<br/>
<label for="country" >{{ __('Country') }}</label>
<select   name="country" >
<!-- <option value="" selected disabled>Please select Country</option> -->
@foreach(countries() as $country)
    @if($user->country==$country['name'])

<option selected="selected">{{$country['name']}}</option>
@else
<option >{{$country['name']}}</option>
@endif
@endforeach
</select>
<br/>
<br/>
 <label for="image" >{{ __('image') }}</label>
 select image: <input  type="file" name="image" id="profile-img" value="{{$user->avatar_image}}"  onchange="previewImage(this)"   />
<br/>
<br/>

 password: <input id="password" type="password" name="password" required/>
<br/>
<br/>

<input type="submit" value="Submit" class="btn btn-primary"/>
</form>

