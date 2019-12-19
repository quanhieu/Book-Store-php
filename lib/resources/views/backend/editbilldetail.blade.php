@extends('backend.master')
@section('title','Update bill detail')
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bill detail</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Edit bill detail</div>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>ID detail</label>
										<input disabled="disabled" required type="number" name="billde_id" class="form-control" value="{{$billde->billde_id}}">
									</div>
									<div class="form-group" >
										<label>ID bill</label>
										<input disabled="disabled" required type="number" name="id_bill" class="form-control" value="{{$billde->id_bill}}">
									</div>
									<div class="form-group" >
										<label>Product</label>
										<select disabled="disabled" required name="product" class="form-control">
											@foreach ($listpro as $pro) <option value="{{$pro->pro_id}}"  
												@if($billde->id_product==$pro->id) selected  @endif>{{$pro->name}}</option>
											@endforeach
					                    </select>
									</div>
									<div class="form-group" >
										<label>Quantity</label>
										<input disabled="disabled" required type="number" name="quantity" class="form-control" value="{{$billde->quantity}}">
									</div>
									<div class="form-group" >
										<label>Unit price</label>
										<input disabled="disabled" required type="number" name="unit_price" class="form-control" value="{{$billde->unit_price}}">
									</div>
									
									
									

									{{-- <input type="submit" name="submit" value="Update" class="btn btn-primary"> --}}
									<a href="{{asset('admin/billdetail')}}" class="btn btn-danger col-sm-12">Cancel</a>
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