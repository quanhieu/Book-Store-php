@extends('master')
@section('content')
	<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Tìm kiếm</h4>
						<div class="beta-products-details">
							<p class="pull-left">{{count($product)}} styles found</p>
							<div class="clearfix"></div>
						</div>
<?php
	function doimau($str,$key){
		return str_replace($key, "<span style='color:red;font-weight: bold;'> $key </span>", $str);
	}
?>
						<div class="row">
							@foreach ($product as $new)
								<div class="col-sm-3">
									<div class="single-item">
										@if($new->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt="" width="263px" height="313px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{!! doimau($new->name,$key) !!} 
												@if($new->promotion_price!=0) 
												<span class="label label-danger">
													&darr;{{number_format((($new->unit_price-$new->promotion_price)/$new->unit_price)*100)}} %
												</span>
												@endif
											</p>
											{{-- <p class="single-item-title">{{$new->name}}</p> --}}
											<p class="single-item-price">
												@if($new->promotion_price==0)
													<span class="flash-sale">{{number_format($new->unit_price)}} đ</span>
												@else
													<span class="flash-del">{{number_format($new->unit_price)}} đ</span>
													<span class="flash-sale">{{number_format($new->promotion_price)}} đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
											<p></p>
										</div>
									</div>
									<div class="space50">&nbsp;</div>
								</div>
							@endforeach
													
						</div>
						<div class="row">
							{{-- {{$product->links()}} --}}
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
@endsection