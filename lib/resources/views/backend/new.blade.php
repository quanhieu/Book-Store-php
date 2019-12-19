@extends('backend.master')
@section('title','New list')
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">New</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">New list</div>
					<div class="form-group">
						<a href="{{asset('admin/new/add')}}" class="btn btn-primary" style="width: 100%">Add new</a>
					</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								{{-- <a href="{{asset('admin/new/add')}}" class="btn btn-primary">Add new</a> --}}

								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Product title</th>
											<th width="45%">Content</th>
											<th width="20%">new image</th>
											
											<th width="12%">Tool</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($newlist as $new)
											<tr>
												<td>{{$new->new_id}}</td>
												<td>{{$new->title}}</td>
												<td>{{$new->content}}</td>
												
												<td>
													<img height="150px" src="{{asset('public/source/image/new/'.$new->new_image) }}" class="thumbnail">
												</td>
												
												<td>
													<a href="{{asset('admin/new/edit/'.$new->new_id)}}" class="btn btn-warning" style="width: 48%"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
													<a onclick="return confirm('Are you sure delete!!!')" href="{{asset('admin/new/delete/'.$new->new_id)}}" class="btn btn-danger" style="width: 48%"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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