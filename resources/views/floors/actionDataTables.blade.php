@if (Auth::user()->id == $data->user_id) 
 
<a class='btn btn-xs btn-primary' href='{{route("floors.edit",$data->id)}}'>Edit</a> 
<button class='btn btn-xs btn-danger delete '  floor='{{$data->id}}' id='delete' >Delete </button>

@endif