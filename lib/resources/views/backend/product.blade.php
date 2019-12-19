@extends('backend.master')
@section('title','Danh sách sản phẩm')
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Product</h1>
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
					<div class="panel-heading">   {{-- Product list --}}
						<div class="panel-heading">
							<form role="submit" method="get" id="searchform" action="{{asset('admin/product/')}}">
								<input type="text" name="key" id="search" class="form-control" placeholder="Search data" />
							</form>
						</div>
					</div>
					<div class="form-group">
						<a href="{{asset('admin/product/add')}}" class="btn btn-primary form-control">Add product</a>
					</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								
		<div class="beta-products-details ">
			<p class="pull-right">{{count($productlist)}} item has found</p>
			<div class="clearfix"></div>
		</div>
								

								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Product name</th>
											{{-- <th>Price</th> --}}
											<th width="20%">Image</th>
											<th>Category</th>
											<th width="30%">Description</th>
											<th>Unit price</th>
											<th>Promotion price</th>
											<th>Unit</th>
											<th>Status</th>
											<th>Tool</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($productlist as $product)
											<tr>
												<td>{{$product->id}}</td>
												<td>{!! doimau($product->name,$key) !!} </td>
												{{-- <td>{{number_format($product->unit_price,0,',','.')}} VND</td> --}}
												<td>
													<img height="150px" src="{{asset('public/source/image/product/'.$product->image) }}" class="thumbnail">
												</td>
													@if($key !='')
														<td>{{$product->id_type}}</td>
														<td>{{$product->description}} </td>
													@else
														<td>{{$product->cate_name}}</td>
														<td>{{$product->description}} </td>
													@endif
												<td>{{number_format($product->unit_price,0,',','.')}} VND</td>
												<td>{{number_format($product->promotion_price,0,',','.')}} VND</td>
												<td> {!! doimau($product->unit,$key) !!} </td>
												{{-- @if($key !='')
													@if($product->new==0)
													<td  style="color:red;font-weight: bold;">None</td>
													@else
													<td  style="color:red;font-weight: bold;">New</td>
													@endif
												@else
													
												@endif --}}
													@if($product->new==0)
													<td>None</td>
													@else
													<td>New</td>
													@endif
												<td>
													<a href="{{asset('admin/product/edit/'.$product->id)}}" class="btn btn-warning col-sm-10"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
													<a onclick="return confirm('Are you sure delete!!!')" href="{{asset('admin/product/delete/'.$product->id)}}" class="btn btn-danger col-sm-10"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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