@extends('master')
@section('content')

<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<div class="bannercontainer" >
			<div class="banner" >
				<ul>
					<!-- THE FIRST SLIDE -->
					@foreach ($slide as $sl)
					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
							<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
							</div>
						</div>

					</li>
					@endforeach
					
				</ul>
			</div>
		</div>

		<div class="tp-bannertimer"></div>
	</div>
</div>
<!--slider-->
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>New Products</h4>
						<div class="beta-products-details">
							<p class="pull-left">{{count($new_product)}} styles found</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach ($new_product as $new)
								<div class="col-sm-3">
									<div class="single-item">
										@if($new->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										{{-- <div class="ribbon-wrapper"><div class="ribbon sale">
										 {{number_format((($new->unit_price-$new->promotion_price)/$new->unit_price)*100)}} % 	</div></div> --}}
										@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt="" width="263px" height="313px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->name}} 
											@if($new->promotion_price!=0)	
												<span class="label label-danger">
													&darr;{{number_format((($new->unit_price-$new->promotion_price)/$new->unit_price)*100)}} %
												</span> 
											 @endif
											</p> 
											{{-- https://community.dynamics.com/365/b/dynamics365portalssupport/archive/2017/05/12/portal-customization-part-1-introduction-to-bootstrap-and-common-components --}}
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
							{{$new_product->links()}}
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Top Products</h4>
						<div class="beta-products-details">
							<p class="pull-left">{{count($promotion_price)}} styles found</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach ($promotion_price as $item)
								{{-- <div class="col-sm-3"> --}}
								<div class="col-sm-3" <div class="col-sm-3" @if($loop->index%4===0)  style="clear: left" @endif>
									<div class="single-item">
										@if($item->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif

										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$item->id)}}"><img src="source/image/product/{{$item->image}}" alt="" width="263px" height="313px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$item->name}}
											@if($item->promotion_price!=0)	
												<span class="label label-danger">
													&darr;{{number_format((($item->unit_price-$item->promotion_price)/$item->unit_price)*100)}} %
												</span> 
												@endif
											</p> 
											<p class="single-item-price">
												@if($item->promotion_price==0)
													<span class="flash-sale">{{number_format($item->unit_price)}} đ</span>
												@else
													<span class="flash-del">{{number_format($item->unit_price)}} đ</span>
													<span class="flash-sale">{{number_format($item->promotion_price)}} đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$item->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$item->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="space40">&nbsp;</div>
								</div>
							@endforeach
							

						</div>
						<div class="row">
							{{$promotion_price->links()}}
						</div>
						<div class="space40">&nbsp;</div>
						<div class="row">
							
						</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->

	@endsection

{{-- 	
http://localhost:81/phpmyadmin/sql.php?server=1&db=ln_project&table=news&pos=0
http://localhost:81/new-lar/public/index
http://localhost:81/new-lar/admin/home 
	--}}