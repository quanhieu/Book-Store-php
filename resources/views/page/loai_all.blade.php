@extends('master')
@section('content')

<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			
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
					<div class="col-sm-12">
						<form role="submit" method="get" id="searchform" action="{{route('all')}}">
							<div class="container ">
								<div class="container-fluid ">
									<a name="low" href="{{route('low')}}"  class="btn btn-secondary navbar-btn col-md-2">Sort from lower price &darr; </a>
									<a name="up" href="{{route('up')}}"  class="btn btn-secondary navbar-btn col-md-2">Sort from upper price 	&uarr;</a>
									<a name="abc" href="{{route('abc')}}"  class="btn btn-secondary navbar-btn col-md-2">Sort by name A&rarr;Z</a>
									<a name="zyx" href="{{route('zyx')}}"  class="btn btn-secondary navbar-btn col-md-2">Sort by name Z&rarr;A</a>
									<a name="zyx" href="{{route('latest')}}"  class="btn btn-secondary navbar-btn col-md-2">Sort follow latest</a>
									<a name="zyx" href="{{route('popular')}}"  class="btn btn-secondary navbar-btn col-md-2">Sort follow popular</a>
								</div>
							</div>
						</form>
					</div>
				</div>
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
							<h4>Products</h4>
							<div class="row">
								@foreach ($all as $sp)
								{{-- chunk thay cho foreach --}}
								{{-- <div class="col-sm-3"  @if(($sp->id)%4==0) style="clear:right;" @else style="clear:left;" @endif > --}}
									
									 {{-- $loop->index % 4 === 0. Source: https://laravel.com/docs/5.7/blade#loops --}}
									{{-- <div class="col-sm-3" @if(($loop->index)%4===0)  style="clear: left" @endif > --}}
									<div class="col-sm-3">
										<div class="single-item">
												@if($sp->promotion_price!=0)
													<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
												@endif
											<div class="single-item-header">
												<a href="{{route('chitietsanpham',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body"  style="height: 109px !important">
												{{-- <div style="height: 60px"> --}}
												<p class="single-item-title">{{$sp->name}}
												@if($sp->promotion_price!=0)	  	
													<span class="label label-danger">
														&darr;{{number_format((($sp->unit_price-$sp->promotion_price)/$sp->unit_price)*100)}} %
													</span> 
													@endif
												</p> 
												{{-- </div> --}}
												{{-- <div style="height: 70px"> --}}
												<p class="single-item-price">
													@if($sp->promotion_price==0)
														<span class="flash-sale">{{number_format($sp->unit_price)}} đ</span>
													@else
														<span class="flash-del">{{number_format($sp->unit_price)}} đ</span>
														<span class="flash-sale">{{number_format($sp->promotion_price)}} đ</span>
													@endif
												</p>
												{{-- </div> --}}
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
							<div class="row">
								{{-- {{$all->links()}} --}}
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection