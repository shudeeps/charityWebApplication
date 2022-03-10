@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>user profile</h1>
        <hr>
        <h2>
            My orders
        </h2>
  


     @if($orders!=NULL) 
      
  
      @foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="list-group">                
                    @foreach($order->cart->items as $item)
                    <li class="list-group-item">
                        <span class="badge">${{$item['price']}}</span>
                       {{ $item['item']['title']}} |{{$item['qty']}} Units
                    </li>
                    @endforeach
                </ul>
            </div>

            @endforeach
            <div class="panel-footer">
            Total Price: $ {{$order->cart->totalPrice}}
            </div>
        </div>
        @else
        <div class="panel panel-default">
    <div class="panel-body">No items in order yet</div>
        @endif

        
    </div>
</div>

@endsection