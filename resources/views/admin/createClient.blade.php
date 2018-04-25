@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="/posts">
{{csrf_field()}}
Name :- <input type="text" name="name">
<br><br>
Email :- 
<input type="email" name="email">
<br>
<br>

Gender:
<select class="form-control" name="gender">

    <option value="male">male</option>
    <option value="female">female</option>
</select>

<br>
<input type="submit" value="Submit" class="btn btn-primary">
</form>

@endsection