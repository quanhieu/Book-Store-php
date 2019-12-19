@extends('backend.master')
@section('title','Add sản phẩm')
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Product</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Add product</div>
					<div class="panel-body">
						@include('errors.note')
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Product name</label>
										<input required type="text" name="name" class="form-control">
									</div>
									<div class="form-group" >
										<label>Product image</label>
										<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
									</div>
									<div class="form-group" >
										<label>Category</label>
										<select required name="cate" class="form-control">
											@foreach ($catelist as $cate)
												<option value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
											@endforeach
											
					                    </select>
									</div>
{{-- 									<div class="form-group" >
										<label>Description</label>
										<input required type="text" name="description" class="form-control" value="abc">
									</div> --}}
									<div class="form-group" >
										<label>Unit price</label>
										<input required type="number" name="unit_price" class="form-control" value="000">
									</div>
									<div class="form-group" >
										<label>Promotion price</label>
										<input required type="number" name="promotion_price" class="form-control" value="1000">
									</div>
									{{-- <div class="form-group" >
										<label>Unit</label>
										<input required type="text" name="unit" class="form-control" value="hộp/cái">
									</div> --}}
									<div class="form-group" >
										<label>Unit</label>
										<select required name="unit" class="form-control">
											<option value="Book"  	selected	 >Book</option>
											<option value="Bookset"  >Bookset</option>											
					                    </select>
									</div>
									<div class="form-group" >
										<label>Status</label>
										<select required name="new" class="form-control">
											<option value="1">New</option>
											<option value="0">None</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Description</label>
										<textarea class="ckeditor" required name="description"></textarea>

											<script type="text/javascript">
												var editor = CKEDITOR.replace('description',{
													language:'en',
													filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
													filebrowserFlashBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Flash',
													filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
													filebrowserFlashUploadUrl: '../../editor/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
												});
											</script>
									</div>
									
									{{-- <div class="form-group" >
										<label>Sản phẩm nổi bật</label><br>
										Có: <input type="radio" name="featured" value="1">
										Không: <input type="radio" checked name="featured" value="0">
									</div> --}}
									<input type="submit" name="submit" value="Add" class="btn btn-primary col-sm-6">
									<a href="{{asset('admin/product')}}" class="btn btn-danger  col-sm-6">Cancel</a>
								</div>
							</div>
							{{-- {{csrf_field()}} --}}
							{{ csrf_field() }}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

@stop