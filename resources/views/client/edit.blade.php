@extends('layouts.clientmaster')
@section('content')

    @if (Session::has('failure'))
        <div class="container">
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!</strong> "the number of accompany greater than the capacity of room"
            </div>
        </div>

    @endif

    @if (Session::has('cardproblem'))
        <div class="container">
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!</strong> "problem in payment"
            </div>
        </div>

    @endif

<div class="container" style="margin-top: 30px ; margin-bottom: 370px">
    <div class="row">
        <div class="col-6">

            <form action="{{route('rooms.update',[$room->id])}}" method="POST">


    <div class="form-group">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3>Checkout</h3>
        <label for="accompany">number of accompany</label>
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" value="{{$room}}" name="room">
        <input name="accompany" class="form-control" type="number" required max="{{$room->capacity}}" min="1">
    </div>
                <script>  console.log({{$room->accompanynumber}})</script>
                <script

                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_nESZFl1gTaCrRPMPqkget1hI"
                        data-amount={{$room->price * 100}}
                        data-name="Hotel"
                        data-description="reserve online rooms in Egypt"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto"
                        data-currency="usd">
                </script>
            </form>


        </div>
    </div>

</div>



@stop
