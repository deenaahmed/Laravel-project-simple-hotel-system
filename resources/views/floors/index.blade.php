<html>
<head>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">  


</head>
<body>
<table id="users-table" class="table">
<thead>
    <tr>
    <td>Id</td>
    <td>Number </td>
    <td>Name </td>
    <td> created_at </td>
    <td> updated_at </td>
    </tr>
</thead>
</table>


<script>
    $(function() {
        $('#users-table').DataTable({
           processing: true,
          serverSide: true,
            ajax: 'http://localhost:8000/test/getdatatable' ,
            columns: [
            {data: 'id'},
            {data: 'number'},
            {data: 'name'},
            {data: 'created_at'},
            {data: 'updated_at'}
        ]
        });
    });
</script>

</body>
</html>