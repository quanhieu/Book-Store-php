@extends('backend.master')
@section('title','Add new')
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
					<div class="panel-heading">Add new</div>
					<div class="panel-body">
						@include('errors.note')
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>New title</label>
										<input required type="text" name="title" class="form-control">
									</div>
									<div class="form-group" >
										<label>Content</label>
										<textarea class="ckeditor" required name="content"></textarea>

											<script type="text/javascript">
												var editor = CKEDITOR.replace('content',{
													language:'en',
													filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
													filebrowserFlashBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Flash',
													filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
													filebrowserFlashUploadUrl: '../../editor/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
												});
											</script>
									</div>

									<div class="form-group" >
										<label>New image</label>
										<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
									</div>
									

									<input type="submit" name="submit" value="Add" class="btn btn-primary col-sm-6">
									<a href="{{asset('admin/new')}}" class="btn btn-danger col-sm-6">Cancel</a>
								</div>
							</div>
							{{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

@stop