@extends('backend.master')
@section('title','Update comment')
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Comment</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Edit comment</div>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Comment</label>
										<input required type="text" name="content" class="form-control" value="{{$comt->content}}">
									</div>
									<div class="form-group" >
										<label>Customer name</label>
										<input required type="text" name="name_customer" class="form-control" value="{{$comt->name_customer}}">
									</div>

									<div class="form-group" >
										<label>Product</label>
										<select required name="product" class="form-control">
											@foreach ($prolist as $pro)
												<option value="{{$pro->id}}"  @if($pro->id==$comt->id_product) selected  @endif>{{$pro->name}}</option>
											@endforeach
					                    </select>
									</div>
									
									

									<input type="submit" name="submit" value="Update" class="btn btn-primary col-sm-6">
									<a href="{{asset('admin/comment')}}" class="btn btn-danger col-sm-6">Cancel</a>
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

{{-- 	<script language="javascript">
From: http://www.webdeveloper.com/forum/showthread.php?t=199296
var ImgArray = [
"img/iphone7-plus-black-select-2016.jpg",

];
function changeImg(imgPtr) {
	document.getElementById('CommonImg').style.backgroundImage = "url(" + ImgArray[imgPtr] + ")";
//  document.getElementById('CommonImg').alt = ImgArray[imgPtr]; // optional comment
}

</script> --}}
@stop