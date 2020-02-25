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
						<div class="col-md-12 well">
							<h3 class="text-center text-success">You Have to login to complete your order. If you are not registered then please register first.</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5 col-md-offset-1 well">
							<h3 clas="text-center text-info">Register if you are not Registered before!</h3><br/>
							<div class="form-w3agile form1">
								
								{{ Form::open([ 'route'=>'customer-sign-up', 'method'=>'post']) }}
									<div class="key">
										<i class="fa fa-user" aria-hidden="true"></i>
										<input  type="text"  name="first_name" placeholder="First Name" >
										<div class="clearfix"></div>
									</div>
									<div class="key">
										<i class="fa fa-user" aria-hidden="true"></i>
										<input  type="text"  name="last_name" placeholder="Last Name" >
										<div class="clearfix"></div>
									</div>
									<div class="key">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<input  type="text"  name="user_email" placeholder="Email">
										<div class="clearfix"></div>
									</div>
									<div class="key">
										<i class="fa fa-lock" aria-hidden="true"></i>
										<input  type="password" name="password" placeholder="Password">
										<div class="clearfix"></div>
									</div>
									<div class="key">
										<i class="fa fa-phone" aria-hidden="true"></i>
										<input type="text"  name="phone" placeholder="Phone Number" >
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<div class="key">
											<textarea class="form-control" name="address" placeholder="Address"></textarea>
											<div class="clearfix"></div>
										</div>
										
									</div>
									<input type="submit" name="btn" value="Submit">
								{{ Form::close() }}
							</div>
						</div>

						<div class="col-md-5 col-md-offset-1 well">
							<h3 class="text-center text-info">Already Registered Please Login Here</h3><br/>
							<h3 class="text-center text-danger">{{ Session::get('message') }}</h3>
								<div class="form-w3agile">
									{{ Form::open(['route'=>'coustomer-login', 'method' =>'post' ]) }}
										<div class="key">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<input  type="text"  name="user_email" placeholder="Email" required="">
											<div class="clearfix"></div>
										</div>
										<div class="key">
											<i class="fa fa-lock" aria-hidden="true"></i>
											<input  type="password"  name="password" placeholder="password" required="">
											<div class="clearfix"></div>
										</div>
										<input type="submit" name="btn" value="Login">
									{{ Form::open() }}
								</div>
								<div class="forg">
									<a href="#" class="forg-left">Forgot Password</a>
								<div class="clearfix"></div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
@endsection