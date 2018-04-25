@extends('layouts.clientmaster')
@section('content')



<div class="container" style="margin-top: 30px ; margin-bottom: 370px">
    <div class="row">
        <div class="col-6">

            <form action="{{route('rooms.update',[$id])}}" method="POST">


    <div class="form-group">
        <label for="accompany">number of accompany</label>
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" value="{{$room}}" name="room">
        <input name="accompany" class="form-control" type="text">
    </div>
                <script

                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_nESZFl1gTaCrRPMPqkget1hI"
                        data-amount={{$room->price}}
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