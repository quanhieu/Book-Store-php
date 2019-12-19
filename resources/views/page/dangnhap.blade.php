@extends('master')
@section('content')

	</div> <!-- #header -->
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Login</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Login</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('login')}}" method="post" class="beta-form-checkout">
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
					@if(Session::has('flag'))
					<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Login</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" required class="form-control">
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" name="password" required class="form-control">
						</div>
						<div class="form-block" >
							<button type="submit" class="btn btn-primary form-control">Login</button>
							{{-- <a href="{{route('trang-chu')}}" type="submit" class="btn btn-primary form-control">Login</a> --}}
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

	
		
@endsection