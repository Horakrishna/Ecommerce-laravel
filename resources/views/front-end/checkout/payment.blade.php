@extends('front-end.master')

@section('title')
	Checkout
@endsection
	
@section('body')
	<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="{{ route('/')}}">Home</a> / <span>Checkout</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content" style="margin-top: 30px;">
			<div class="single-w13">
				<div class="container">
					<div class="row">
						<div class="col-md-12 well text-center text-success">
							Dear {{ Session::get('coustomerName') }}.You have to give us the Payment method
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 well">
							{{ Form::open(['route'=>'new-order', 'method'=>'post']) }}
								<table class="table table-bordered">
									<tr>
										<th>Cash On Delivey</th>
										<td><input type="radio" name="payment_type" value="cash">Cash on Delivery</td>
									</tr>
									<tr>
										<th>Paypal</th>
										<td><input type="radio" name="payment_type" value="payal">Paypal</td>
									</tr>
									<tr>
										<th>bKash</th>
										<td><input type="radio" name="payment_type" value="bkash">bKash</td>
									</tr>
									<tr>
										<th></th>
										<td><input type="submit" name="btn" class="btn btn-success" value="confirm order"></td>
									</tr>
							   </table>
						   {{ Form::close() }}
								
					   </div>
				    </div>
			    </div>
		   </div>
		 </div>
@endsection