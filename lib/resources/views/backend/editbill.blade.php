@extends('backend.master')
@section('title','Update bill')
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bill</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Edit bill</div>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Customer</label>
										<select required name="customer" class="form-control">
											@foreach ($listcus as $cus)
												<option value="{{$cus->cus_id}}"  @if($bill->id_customer==$cus->cus_id) selected  @endif>{{$cus->cus_name}}</option>
											@endforeach
					                    </select>
									</div>
									<div class="form-group" >
										<label>Date order</label>
										<input required type="date" name="date_order" class="form-control" value="{{$bill->date_order}}">
									</div>
									<div class="form-group" >
										<label>Total</label>
										<input required type="number" name="total" class="form-control" value="{{$bill->total}}">
									</div>
									<div class="form-group" >
										<label>Payment</label>
										<select required name="payment" class="form-control">
											<option value="COD" selected >COD</option>
											<option value="ATM" selected >ATM</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Note</label>
										<input required type="text" name="note" class="form-control" value="{{$bill->note}}">
									</div>
									
									

									<input type="submit" name="submit" value="Update" class="btn btn-primary col-sm-6">
									<a href="{{asset('admin/bill')}}" class="btn btn-danger col-sm-6">Cancel</a>
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