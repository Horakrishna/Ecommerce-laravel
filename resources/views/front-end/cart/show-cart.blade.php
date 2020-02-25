@extends('front-end.master')
@section('title')
Show Cart
@endsection
@section('body')
	<div class="banner1">
		<div class="container">
			<h3><a href="{{ route('/') }}">Home</a> / <span>Checkout</span></h3>
		</div>
	</div>
	<!--banner--> 
<div class="content">
			<!--single-->
	<div class="single-wl3">
		<div class="container">
			<div class="row">
				<div class="col-md-11 col-md-offset-1">
					<h3 class="text-center text-success mb-5">My Shooping Cart</h3>
					<table class="table table-bordered">
						<tr>
							<th>Sl No</th>
							<th>Name</th>
							<th>Iamge</th>
							<th>Price .tk</th>
							<th>quantity</th>
							<th>Total Price .tk</th>
							<th>Action</th>
						</tr>
						@PHP($i =1)
						@PHP($sum =0)
						@foreach($cartProducts as $cartProduct)
						<tr>
							<td>{{ $i++ }}</td>
							<td>{{ $cartProduct->name }}</td>
							<td>
								<img src="{{ asset($cartProduct->options->image)}}" alt="" height="100" width="100">
							</td>
							<td>{{ $cartProduct->price}}</td>
							<td>
								{{ Form::open(['route'=>'update-cart','method'=>'POST']) }}
								<h3 class="text-center text-success">{{ Session::get('message')}}</h3>
								<input type="number" name="qty" value="{{ $cartProduct->qty }}"/>
								<input type="hidden" name="rowId" value="{{ $cartProduct->rowId }}"/>
								<input type="submit" name="btn" value="update"/>
								
								{{ Form::close() }}
							</td>
							<td>{{ $total= $cartProduct->price*$cartProduct->qty }}</td>
							<td>
								<a href="{{ route('delete-cart-item',['rowId'=> $cartProduct->rowId]) }}" class="btn delete-btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
							</td>
						</tr>
						<?php $sum = $sum+$total?>
						@endforeach
					</table>
					<hr>
					<table class="table table-bordered">
						<tr>
						 	<th>Item Price</th>
						 	<td>{{ $sum }}</td>
						</tr>
						<tr>
							<th>Vat Total tk.</th>
							<td>{{ $vat= 0 }}</td>
						</tr>
						<tr>
							<th>Grand  Total tk.</th>
							<td>{{$orderTotal = $sum+$vat }}</td>
							<?php
								Session::put('orderTotal',$orderTotal);
							?>
						</tr>
					</table>
				</div>
			</div>
			

			<div class="row">
				<div class="col-md-11 col-md-offset-1">
					@if(Session::get('coustomerId') && Session::get('shepingID') )
					<a href="{{ route('checkout-payment') }}" class="btn btn-success pull-right">Check Out</a>
					@elseif( Session::get('coustomerId') )
					<a href="{{ route('checkout-shiping')}}" class="btn btn-success pull-right">Check Out</a>
					@else	
					<a href="{{route('checkout')}}" class="btn btn-success pull-right">Check Out</a>
					@endif
					<a href="" class="btn btn-success pull-left">Continue Shopping</a>		
				</div>
			</div>
		</div>
	</div>
</div>
@endsection