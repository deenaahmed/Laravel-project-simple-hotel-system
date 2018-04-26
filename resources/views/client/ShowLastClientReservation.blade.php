@extends('layouts.clientmaster')
@section('content')

<link rel="stylesheet" type="text/css" href="https:////cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<div class="container" style="margin-top: 50px ; margin-bottom: 250px">
    <table  id="Lastresvation-table" class="table table-active">
        <thead>
        <tr>

            <th>Room number</th>
            <th>Paid price</th>
            <th>accompany number</th>


        </tr>
        </thead>
    </table>
</div>

<script>
    $(function() {
        $('#Lastresvation-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'http://hotel.local/client/reservations/{{Auth::user()->id}}',
            columns: [

                { data: 'number', name: 'number' },

                { data: 'clientpaidprice', name: 'clientpaidprice' },

                { data: 'accompanynumber', name: 'accompanynumber' }

            ]
        });
    });
</script>


    @stop