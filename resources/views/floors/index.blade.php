<html>
<head>


</head>
<body>
<h1> Floors </h1>
<table> 
@foreach ($floors as $floor)
<tr>

<td> {{$floor->number}} </td>
<td> {{$floor->name}} </td>
<td> {{$floor->createdby}} </td>
<td> {{$floor->created_at}} </td>

</tr>
@endforeach
</table>
</body>
</html>