@extends('backend.master')
@section('title', "Edit admin")
@section('main')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Admin</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
		{{-- <div class="col-xs-12 col-md-5 col-lg-5"> --}}
			<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Edit admin
				</div>
				<div class="panel-body">
					@include('errors.note')
					<form method="post"  enctype="multipart/form-data">
						<div class="form-group">
							<label>Full name:</label>
							<input required type="text" name="full_name" class="form-control" placeholder="Name" value="{{$ad->full_name}}">
						</div>
						<div class="form-group">
							<label>Email:</label>
							<input required type="email" name="email" class="form-control" placeholder="@gmail" value="{{$ad->email}}">
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input required type="password" name="password" class="form-control" placeholder="" value="{{$ad->password}}">
						</div>
						<div class="form-group">
							<label>Phone:</label>
							<input required type="tel" name="phone" class="form-control" placeholder="" value="{{$ad->phone}}">
						</div>
						<div class="form-group">
							<label>Address:</label>
							<input required type="text" name="address" class="form-control" placeholder="" value="{{$ad->address}}">
						</div>

						<div class="form-group  col-sm-6">
							<input type="submit" name="submit" class="form-control btn btn-primary"value="Edit">
						</div>
						<div class="form-group  col-sm-6">
							<a href="{{asset('admin/admin')}}" class="form-control btn btn-danger">Cancel</a>
						</div>
						{{csrf_field()}}
					</form>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->

@stop