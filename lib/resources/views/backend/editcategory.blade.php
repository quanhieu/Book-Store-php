@extends('backend.master')
@section('title', "Edit category")
@section('main')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Category</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
		{{-- <div class="col-xs-12 col-md-5 col-lg-5"> --}}
			<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Edit category
				</div>
				<div class="panel-body">
					@include('errors.note')
					<form method="post"   enctype="multipart/form-data">
						<div class="form-group">
							<label>Category name:</label>
							<input required type="text" name="name" class="form-control" placeholder="Category name..." value="{{$cate->cate_name}}">
						</div>
						<div class="form-group">
							<label>Description:</label>
							<input required type="text" name="description" class="form-control" placeholder="Description..." value="{{$cate->description}}">
						</div>
						
						<div class="form-group" >
							<label>Category image</label>
							<input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
							<img id="avatar" class="thumbnail" width="300px" src="{{asset('public/source/image/product/'.$cate->cate_image) }}">

						</div>
						<div class="form-group  col-sm-6">
							<input type="submit" name="submit" class="form-control btn btn-primary"value="Edit">
						</div>
						<div class="form-group  col-sm-6">
							<a href="{{asset('admin/category')}}" class="form-control btn btn-danger">Cancel</a>
						</div>
						{{csrf_field()}}
					</form>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->

@stop