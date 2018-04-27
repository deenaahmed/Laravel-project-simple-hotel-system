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

<form method="post" action="/admin/clients" enctype="multipart/form-data">

{{csrf_field()}}
user name :- <input type="text" name="name" />

<br /><br />
Email :- <input type="text" name="email" />
<br/><br/>
                          
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

