
@extends('layouts.clientmaster')
@section('content')

    @if (Session::has('success'))
        <div class="container">
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> "You booked the  successfully"
            </div>
        </div>

    @endif



<div class="container" style="margin-top: 30px ; margin-bottom: 130px">
    <div class="row">

        <div class="col-lg-3">

            <div class="card my-4">
                <h5 class="card-header">Hotel</h5>
                <div class="card-body">
                    Welcome to your hotel
                </div>
            </div>
    </div>

        <!-- /.col-lg-3 -->


    <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="{{'/storage/hotelimages/hotel4.jpg/'}}" height="600px" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid"  src="{{'/storage/hotelimages/hotel2.jpg/'}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{'/storage/hotelimages/hotel3.jpg/'}}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>





    <div class="row">
@foreach($rooms as $room)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="{{route('rooms.edit',$room->id)}} "><img class="card-img-top" src="{{'/storage/roomsimages/'.$room->image}}" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{route('rooms.edit',$room->id)}} ">ROOM Number {{$room->number}}</a>
                    </h4>

                    <h5 style="color: green">Capacity {{$room->capacity}}</h5>
                    <h5 style="color: red">${{$room->price}}</h5>
                </div>
                <div class="card-footer">
                   <a class="btn btn-primary" href="{{route('rooms.edit',$room->id)}} ">Make reservation</a>
                </div>
            </div>
        </div>

        @endforeach
    </div>


        <!-- /.row -->

        {{ $rooms->links() }}
    </div>

    </div>
    <!-- /.col-lg-9 -->

<!-- /.row -->

</div>


<!-- /.container -->

@stop