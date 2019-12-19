@extends('backend.master')
@section('title','Customer list')
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Customer</h1>
			</div>
		</div><!--/.row-->
<?php
function doimau($str,$key){
	return str_replace($key, "<span style='color:red;font-weight: bold;'> $key </span>", $str);
}
?>		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading"> {{-- Customer list --}}
			<div class="panel-heading">
				<form role="submit" method="get" id="searchform" action="{{asset('admin/customer/')}}">
					<input type="text" name="key" id="search" class="form-control" placeholder="Search data" />
				</form>
			</div>
					</div>
					<div class="form-group">
						<a href="{{asset('admin/customer/add')}}" class="btn btn-primary form-control">Add customer</a>
					</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
		<div class="beta-products-details ">
			<p class="pull-right">{{count($cuslist)}} item has found</p>
			<div class="clearfix"></div>
		</div>
								
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="15%">Customer name</th>
											<th>Gender</th>
											<th width="15%">email</th>
											{{-- <th>Password</th> --}}
											<th width="15%">Address</th>
											<th>Phone number</th>
											<th width="20%">Note</th>
											
											<th>Tool</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($cuslist as $cus)
											<tr>
												<td>{{$cus->cus_id}}</td>
												<td>{!! doimau($cus->cus_name,$key) !!}</td>
												
												<td>{!! doimau($cus->gender,$key) !!}</td>
												<td>{!! doimau($cus->email,$key) !!} </td>
												
												<td>{!! doimau($cus->address,$key) !!} </td>
												<td>{!! doimau($cus->phone_number,$key) !!} </td>
												<td>{!! doimau($cus->note,$key) !!} </td>
												
												<td>
													<a href="{{asset('admin/customer/edit/'.$cus->cus_id)}}" class="btn btn-warning" style="width: 48%"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
													<a onclick="return confirm('Are you sure delete!!!')" href="{{asset('admin/customer/delete/'.$cus->cus_id)}}" class="btn btn-danger" style="width: 48%"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
												</td>
											</tr>
										@endforeach
										
									</tbody>
								</table>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

@stop