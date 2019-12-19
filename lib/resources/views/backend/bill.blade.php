@extends('backend.master')
@section('title','Bill list')
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bill</h1>
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
		<form role="submit" method="get" id="searchform" action="{{asset('admin/bill')}}">
			<input type="text" name="key" id="search" class="form-control" placeholder="Search data" />
		</form>

		<form role="submit" method="get" id="searchform" action="{{asset('admin/bill')}}">
			<h4 style="color: white;">Date rage</h4>
			<div class="form-control" style="background-color: #337AB7; border-color: #337AB7;">
				<input type="date" name="start" data-date="" data-date-format="YYYY-MM-DD H:i:s" value="" style="width: 49%"  />
				<input type="date" name="end"   data-date-format="YYYY-MM-DD" style="width: 49%"  />
			</div>
			
			<button type="submit"  class="form-control"> Search</button>
		</form>
					</div>
			<div class="beta-products-details">
				<p class="pull-right">{{count($bilist)}} item has found</p>
				<div class="clearfix"></div>
			</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								{{-- <a href="{{asset('admin/bill/add')}}" class="btn btn-primary">Add bill</a> --}}
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											
											<th width="20%">Customer</th>
											<th>Customer ID</th>
											<th>Date order</th>
											<th>Total</th>
											<th>Payment</th>
											{{-- <th>Note</th> --}}
											
											<th>Tool</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($bilist as $bill)
											<tr>
												<td>{!! doimau($bill->bill_id,$key) !!}</td>
													
												<td>{!! doimau($bill->cus_name,$key) !!} </td>
												<td>{!! doimau($bill->id_customer,$key) !!} </td>
												<td>{!! doimau($bill->date_order,$key) !!} </td>
												<td>{!! doimau($bill->total,$key) !!} </td>
												<td>{!! doimau($bill->payment,$key) !!} </td>
												{{-- <td>{{$bill->note}}</td> --}}
												
												<td>
													<a href="{{asset('admin/bill/edit/'.$bill->bill_id)}}" class="btn btn-warning" style="width: 35%"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
													<a onclick="return confirm('Are you sure delete!!!')" href="{{asset('admin/bill/delete/'.$bill->bill_id)}}" class="btn btn-danger" style="width: 35%"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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