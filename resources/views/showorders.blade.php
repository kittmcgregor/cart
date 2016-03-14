@extends('template')

@section('content')

			
			<h2>Your Orders</h2>
		
			
			<div class="orders">
				<div>
					<span><h4>Product</h4></span><span><h4>Price</h4></span><span><h4>Quantity</h4></span><span><h4>Subtotal</h4></span>
				</div>
				
				@foreach ($orders as $order)
				<span>{{$order->id}}</span><span>{{$order->status}}</span><br/>
				<span>{{$order->price}}</span>
				
					@foreach ($order->products as $product)
					<span>{{$product->name}}</span><span>{{$product->price}}</span><br/>
	
					@endforeach
				
				
				@endforeach
				
				


			</div>
							

@stop