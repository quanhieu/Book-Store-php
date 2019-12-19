@extends('backend.master')
@section('title', "Slide")
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Slide</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Add slide
					</div>

					<div class="panel-body">
						@include('errors.note')
						<form method="post" enctype="multipart/form-data">
															
								<div class="form-group" >
									<label>Slide image</label>
									<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
									<img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
								</div>
								<div class="form-group">
									<input type="submit" name="submit" class="form-control btn btn-primary"  value="Add new slide">
								</div>
								{{csrf_field()}}
							</form>
						</div>
					</div>
				</div>

			<div class="col-xs-12 col-md-7 col-lg-7">
				{{-- <div class="col-xs-12 col-md-12 col-lg-12"> --}}
					<div class="panel panel-primary">
						<div class="panel-heading">Slide list</div>
						<div class="panel-body">
							<div class="bootstrap-table">
								<div class="table-responsive">
									{{-- <a href="{{asset('admin/category/add')}}" class="btn btn-primary">Add category</a> --}}
									<table class="table table-bordered">
										<thead>
											<tr class="bg-primary">
												<th>ID</th>
												
												<th>Image</th>
												<th style="width:22%">Tool</th>
											</tr>
										</thead>
										<tbody>

											@foreach ($slidelist as $cate)
											{{-- expr --}}
											
											<tr>
												<td>{{$cate->id}}</td>
																					
												<td>
													<img height="150px" src="{{asset('public/source/image/slide/'.$cate->image) }}" class="thumbnail">
												</td>
												<td>
													<a href="{{asset('admin/slide/edit/'.$cate->id)}}" class="btn btn-warning col-sm-6"><span class="glyphicon glyphicon-edit"></span> Edit</a>
													<a href="{{asset('admin/slide/delete/'.$cate->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger col-sm-6"><span class="glyphicon glyphicon-trash"></span> Delete</a>
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