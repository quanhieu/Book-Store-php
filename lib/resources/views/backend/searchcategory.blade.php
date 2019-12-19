@extends('backend.master')
@section('title', "Danh mục sản phẩm")
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Category</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Add category
					</div>

					<div class="panel-body">
						@include('errors.note')
						<form method="post"  enctype="multipart/form-data">
							<div class="form-group">
								<label>Category:</label>
								<input required type="text" name="name" class="form-control" placeholder="Tên danh mục..." >
							</div>
							<div class="form-group">
								<label>Description:</label>
								<input required type="text" name="description" class="form-control" placeholder="Description..." >
							</div>
								
								<div class="form-group" >
									<label>Category image</label>
									<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
									<img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
								</div>
								<div class="form-group">
									<input type="submit" name="submit" class="form-control btn btn-primary"  value="Add new category">
								</div>
								{{csrf_field()}}
							</form>
						</div>
					</div>
				</div>
<?php
function doimau($str,$key){
	return str_replace($key, "<span style='color:red;font-weight: bold;'> $key </span>", $str);
}
?>
			<div class="col-xs-12 col-md-7 col-lg-7">
				{{-- <div class="col-xs-12 col-md-12 col-lg-12"> --}}
					<div class="panel panel-primary">
						<div class="panel-heading">
							<form role="submit" method="get" id="searchform" action="{{asset('admin/category/search')}}">
								<input type="text" name="key" id="search" class="form-control" placeholder="Search data" />
							</form>

						</div>
		<div class="beta-products-details">
			<p class="pull-right">{{count($catelist)}} item has found</p>
			<div class="clearfix"></div>
		</div>
						<div class="panel-body">
							<div class="bootstrap-table">
								<div class="table-responsive">
									{{-- <a href="{{asset('admin/category/add')}}" class="btn btn-primary">Add category</a> --}}

									<table class="table table-bordered">
										<thead>
											<tr class="bg-primary">
												<th>Category</th>
												<th>Description</th>
												<th>Image</th>
												<th style="width:12%">Tool</th>
											</tr>
										</thead>

										<tbody>

											@foreach ($catelist as $cate)
											{{-- expr --}}
											
											<tr>
												<td> {!! doimau($cate->cate_name,$key) !!} </td>
												<td>{!! doimau($cate->description,$key) !!}</td>
												
												<td>
													<img height="150px" src="{{asset('public/source/image/product/'.$cate->cate_image) }}" class="thumbnail">
												</td>
												<td>
													<a href="{{asset('admin/category/edit/'.$cate->cate_id)}}" class="btn btn-warning col-sm-12"><span class="glyphicon glyphicon-edit"></span> Edit</a>
													<a href="{{asset('admin/category/delete/'.$cate->cate_id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger col-sm-12"><span class="glyphicon glyphicon-trash"></span> Delete</a>
												</td>
											</tr>
											@endforeach

										</tbody>
									</table>
								</div>
							</div>
	{{-- 	<div class="row">
			{{$catelist->links()}}
		</div>
		<div class="space40">&nbsp;</div> --}}
							<div class="clearfix"></div>
						</div>
					</div>
				</div>


		</div><!--/.row-->
	</div>	<!--/.main-->

@stop