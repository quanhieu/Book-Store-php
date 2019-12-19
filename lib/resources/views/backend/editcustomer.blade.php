@extends('backend.master')
@section('title','Update customer')
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Customer</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Edit customer</div>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Customer name</label>
										<input required type="text" name="cus_name" class="form-control" value="{{$cus->cus_name}}">
									</div>
									<div class="form-group" >
										<label>Gender</label>
										<select required name="gender" class="form-control">
											<option value="Nam" selected >Nam</option>
											<option value="Nữ" selected >Nữ</option>
					                    </select>
									</div>

									<div class="form-group" >
										<label>Email</label>
										<input required type="email" name="email" class="form-control" value="{{$cus->email}}">
									</div>
									<div class="form-group" >
										<label>Address</label>
										<input required type="text" name="address" class="form-control" value="{{$cus->address}}">
									</div>
									<div class="form-group" >
										<label>Phone number</label>
										<input required type="tel" name="phone_number" class="form-control" value="{{$cus->phone_number}}">
									</div>
									<div class="form-group" >
										<label>Note</label>
										<input required type="text" name="note" class="form-control" value="{{$cus->note}}">
									</div>
		

									<input type="submit" name="submit" value="Update" class="btn btn-primary col-sm-6">
									<a href="{{asset('admin/customer')}}" class="btn btn-danger col-sm-6">Cancel</a>
								</div>
							</div>
							{{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

@stop