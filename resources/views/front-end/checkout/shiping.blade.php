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
							Dear {{ Session::get('coustomerName') }}.You have to give us product shiping info to complete your order. If your billing info and Shiping info are same continue your order.
						</div>
					</div>
					<div class="row">
						<div class="col-md-5 col-md-offset-1 well">
							<h3 clas="text-center text-info">Shiping info goes here...</h3><br/>
							<div class="form-w3agile form1">
								
								{{ Form::open(['route'=>'new-shiping', 'method'=>'POST']) }}
									<div class="key">
										<i class="fa fa-user" aria-hidden="true"></i>
										<input  type="text" value="{{ $coustomer->first_name.' '.$coustomer->last_name }}" name="full_name" placeholder="First Name" >
										<div class="clearfix"></div>
									</div>
									<div class="key">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<input  type="text"  value="{{$coustomer->user_email}}" name="email_address" placeholder="Email">
										<div class="clearfix"></div>
									</div>
									<div class="key">
										<i class="fa fa-phone" aria-hidden="true"></i>
										<input type="text"  value="{{$coustomer->phone}}" name="phone" placeholder="Phone Number" >
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<div class="key">
											<textarea class="form-control"  name="address" placeholder="Address">{{$coustomer->address}}</textarea>
											<div class="clearfix"></div>
										</div>
										
									</div>
									<input type="submit" name="btn" value="Submit">
								{{ Form::close() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection