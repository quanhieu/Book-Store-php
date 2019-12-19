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
							<form role="submit" method="get" id="searchform" action="{{asset('admin/billdetail/daterange')}}">
								<h4 style="color: white;">Date rage</h4>

								<input type="date" name="start" class="form-control" data-date="" data-date-format="YYYY-MM-DD" value="" />
								<input type="date" name="end" class="form-control"  data-date-format="YYYY-MM-DD" />
								<button type="submit" class="form-control"> Search</button>
							</form>
						</div>

					</div>


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
											<th>Created at</th>
																						
											<th>Tool</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($bidelist as $detail)
											<tr>
												<td>{!! doimau($detail->billde_id,$key) !!}</td>
												<td>{!! doimau($detail->id_bill,$key) !!} </td>
													{{-- @if($key !='')
													<td>{!! doimau($detail->id_product,$key) !!} </td>
													@else
														<td>{{$detail->name}}</td>
													@endif --}}
													{{-- <td>{{$detail->productName}}</td> --}}
													<td>{{$detail->name}}</td>
												<td>{!! doimau($detail->id_product,$key) !!} </td>
												
												<td>{!! doimau($detail->quantity,$key) !!} </td>
												<td>{{$detail->created_at}}</td>
												{{-- <td>{{date('Y-m-d', strtotime($detail->created_at))}}</td> --}}
												{{-- <td>{{$detail->unit_price}}</td> --}}
																								
												<td>
													<a href="{{asset('admin/billdetail/edit/'.$detail->billde_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
													<a onclick="return confirm('Are you sure delete!!!')" href="{{asset('admin/billdetail/delete/'.$detail->billde_id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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