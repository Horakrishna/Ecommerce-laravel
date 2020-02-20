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
							<th>Quantity</th>
							<th>Price .tk</th>
							<th>Total Price .tk</th>
							<th>Action</th>
						</tr>
						@php($i=1)
						@foreach($cartProducts as $cartProduct)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$cartProduct->name}}</td>
							<td>
								<img src="{{ asset($cartProduct->attributes->image)}}" alt="" height="100" width="100">
							</td>
							<td>{{ $cartProduct->quantity}}</td>
							<td>{{ $cartProduct->price}}</td>
							<td>{{ $cartProduct->price*$cartProduct->quantity}}</td>
							<td>
								<a href="{{route('delete-cart-item',['rowId'=>$cartProduct->rowId]) }}" class="btn delete-btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection