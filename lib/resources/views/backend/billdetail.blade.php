@extends('backend.master')
@section('title','Bill detail list')
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bill detail</h1>
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
					<div style="height: auto" class="panel-heading">
						<div class="">
							<form role="submit" method="get" id="searchform" action="{{asset('admin/billdetail')}}">
								<input type="text" name="key" id="search" class="form-control" placeholder="Search data" />

							</form>
							<form role="submit" method="get" id="searchform" action="{{asset('admin/billdetail')}}">
								<h4 style="color: white;">Date rage</h4>
								<div class="form-control" style="background-color: #337AB7; border-color: #337AB7;">
									<input type="date" name="start"  data-date="" data-date-format="YYYY-MM-DD" value="" style="width: 49%" />
									<input type="date" name="end"   data-date-format="YYYY-MM-DD" style="width: 49%"/>
								</div>
								
								<button type="submit" class="form-control"> Search</button>
							</form>
						</div>

					</div>

		{{-- <div class="form-group">
			<a href="{{asset('admin/billdetail/daterange/') }}"> <span class="form-control btn btn-primary">Date range</span></a> 
		</div> --}}
			<div class="beta-products-details">
				<p class="pull-right">{{count($bidelist)}} item has found</p>
				<div class="clearfix"></div>
			</div>
		
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								{{-- <a href="{{asset('admin/bill/add')}}" class="btn btn-primary">Add bill</a> --}}
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID bill detail</th>
											<th>ID bill</th>
											<th width="20%">Product</th>
											<th>Product ID</th>
											<th>Quantity</th>
											{{-- <th>Unit price</th> --}}
											<th>Created at</th>
																						
											<th>Tool</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($bidelist as $detail)
											<tr>
												<td>{!! doimau($detail->billde_id,$key) !!}</td>
												<td>{!! doimau($detail->id_bill,$key) !!} </td>
												
												<td>{!! doimau($detail->name,$key) !!} </td>
												<td>{!! doimau($detail->id_product,$key) !!} </td>
												
												<td>{!! doimau($detail->quantity,$key) !!} </td>
												{{-- <td>{{$detail->unit_price}}</td> --}}
												<td>{{$detail->created_at}}</td>
												{{-- <td>{{date('Y-m-d', strtotime($detail->created_at))}}</td> --}}
																								
												<td>
													<a href="{{asset('admin/billdetail/edit/'.$detail->billde_id)}}" class="btn btn-warning" style="width: 35%"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
													<a onclick="return confirm('Are you sure delete!!!')" href="{{asset('admin/billdetail/delete/'.$detail->billde_id)}}" class="btn btn-danger" style="width: 35%"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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