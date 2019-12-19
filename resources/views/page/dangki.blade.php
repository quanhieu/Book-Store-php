@extends('master')
@section('content')
	</div> <!-- #header -->
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Register</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Register</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('signin')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					@if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach ($errors->all() as $err)
								 <p>{{$err}}</p>
							@endforeach
						</div>
					@endif
					@if(Session::has('thanhcong'))
						<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Register</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email" required class="form-control">
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" id="your_last_name" name="fullname" required class="form-control">
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" id="address" name="address" required class="form-control">
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="tel" id="phone" name="phone" required class="form-control">
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" id="phone" name="password" required class="form-control">
						</div>
						<div class="form-block">
							<label for="phone">Re password*</label>
							<input type="password" id="phone" name="re_password" required class="form-control">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

	


	
@endsection