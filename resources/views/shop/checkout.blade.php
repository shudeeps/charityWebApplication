@extends('layouts.master')

@section('title')
Laravel Shopping Cart
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <h1>Checkout</h1>
        <h4>Your total is ${{$total}}</h4>

        <form action="{{route('checkout')}}" method="post">

            <div class="row">

                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>
                </div>

                
            </div>
            {{csrf_field()}}
            <button type="submit" name="" class="btn btn-success">Buy now</button>
        </form>


    </div>
</div>
@endsection