@extends('backend.master')
@section('title', "Comment list")
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Comment</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Add comment
					</div>

					<div class="panel-body">
						@include('errors.note')
						<form method="post"  enctype="multipart/form-data">
							<div class="form-group">
								<label>Comment:</label>
								<input required type="text" name="content" class="form-control" placeholder="Input comment" >
							</div>
							<div class="form-group">
								<label>Customer name:</label>
								<input required type="text" name="name_customer" class="form-control" placeholder="Customer name..." >
							</div>
							<div class="form-group" >
								<label>Product</label>
								<select required name="product" class="form-control">
									@foreach ($prolist as $comt)
									<option value="{{$comt->id}}">{{$comt->name}}</option>
									@endforeach

								</select>
							</div>
								<div class="form-group">
									<input type="submit" name="submit" class="form-control btn btn-primary"  value="Add new Comment">
								</div>
								{{csrf_field()}}
							</form>
						</div>
					</div>
				</div>

			<div class="col-xs-12 col-md-7 col-lg-7">
				{{-- <div class="col-xs-12 col-md-12 col-lg-12"> --}}
					<div class="panel panel-primary">
						<div class="panel-heading">Comment list</div>
						<div class="panel-body">
							<div class="bootstrap-table">
								<div class="table-responsive">
									{{-- <a href="{{asset('admin/category/add')}}" class="btn btn-primary">Add category</a> --}}
									<table class="table table-bordered">
										<thead>
											<tr class="bg-primary">
												<th>Comment id</th>
												<th>Comment</th>
												<th>Customer name</th>
												<th>Product</th>
												<th style="width:20%">Tool</th>
											</tr>
										</thead>
										<tbody>

											@foreach ($comlist as $cate)
																
											<tr>
												<td>{{$cate->com_id}}</td>
												<td>{{$cate->content}}</td>
												<td>{{$cate->name_customer}}</td>
												<td>{{$cate->name}}</td>
												
												<td>
													<a href="{{asset('admin/comment/edit/'.$cate->com_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
													<a href="{{asset('admin/comment/delete/'.$cate->com_id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
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