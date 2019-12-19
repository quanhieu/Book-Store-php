@extends('master')
@section('content')

<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Type: {{$categoryname->cate_name}}</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('trang-chu')}}">Home</a> / <span>Category</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							{{-- <li class="is-active"><a href="#">Custom callout box</a></li> --}}
							@foreach ($listcategory as $item)
								<li><a href="{{route('loaisanpham', $item->cate_id)}}">{{$item->cate_name}}</a></li>
							@endforeach
							
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($category)}} styles found</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach ($category as $sp)
								 {{-- <div class="col-sm-4"> --}}
									<div class="col-sm-4" @if($loop->index%3===0)  style="clear: left" @endif>
										<div class="single-item">
												@if($sp->promotion_price!=0)
													<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
												@endif
											<div class="single-item-header">
												<a href="{{route('chitietsanpham',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$sp->name}} 	
													@if($sp->promotion_price!=0)
													<span class="label label-danger">
														&darr;{{number_format((($sp->unit_price-$sp->promotion_price)/$sp->unit_price)*100)}} %
													</span> 
													@endif
												</p> 
												<p class="single-item-price">
													@if($sp->promotion_price==0)
														<span class="flash-sale">{{number_format($sp->unit_price)}} đ</span>
													@else
														<span class="flash-del">{{number_format($sp->unit_price)}} đ</span>
														<span class="flash-sale">{{number_format($sp->promotion_price)}} đ</span>
													@endif
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{route('chitietsanpham',$sp->id)}}">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="space50">&nbsp;</div>
									</div>
								@endforeach
								
								
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Other Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($otherProduct)}} styles found</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach ($otherProduct as $item)
									<div class="col-sm-4">
										<div class="single-item">
												@if($item->promotion_price!=0)
													<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
												@endif
											<div class="single-item-header">
												<a href="{{route('chitietsanpham',$item->id)}}"><img src="source/image/product/{{$item->image}}" alt="" height="250px"></a>
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
							{{$otherProduct->links()}}
						</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection