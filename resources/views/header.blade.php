<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href="{{route('lienhe')}}"><i class="fa fa-home"></i> Phạm Phú Thứ, Quận 6</a></li>
						<li><a href="{{route('lienhe')}}"><i class="fa fa-phone"></i> 0123 456 789</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						{{-- @if(Auth::check()) --}}
						@if(Auth::guard('cus')->check())
						{{-- <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li> --}}
						{{-- <li><a href="#"><i class="fa fa-user"></i>Hello {{Auth::user()->full_name}}</a></li> --}}
						{{-- <li><a href="#"><i class="fa fa-user"></i>Hello @foreach ($cus as $cu)
							{{$cu->cus_name}}
						@endforeach </a></li> --}}
						<li><a href="{{route('trang-chu')}}"><i class="fa fa-user"></i>Hello {{Auth::guard('cus')->user()->cus_name}}</a></li>
						<li><a href="{{route('logout')}}">Log-out</a></li>
						@else
						<li><a href="{{route('signin')}}">Sign-in</a></li>
						<li><a href="{{route('login')}}">Log-in</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('trang-chu')}}" id="logo"><img src="source/assets/dest/images/logo91.png" width="150px" alt="" style="border-top-left-radius: 20%;"></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
					        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..."  class="form-control" />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						{{-- @if(Session::has('cart')) --}}
						<div class="cart">
						   <div class="beta-select"><i class="fa fa-shopping-cart"></i> Cart (@if(Session::has('cart')){{Session('cart')->totalQty}} @else Empty @endif) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">

								@if(Session::has('cart'))
								@foreach ($product_cart as $product)
								<div class="cart-item">
									<a class="cart-item-delete" href="{{route('xoagiohang', $product['item']['id'])}}"> <i class="fa fa-times"></i> </a>
									<div class="media">
										<a class="pull-left" href="{{route('chitietsanpham',$product['item']['id'])}}"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>
											{{-- <span class="cart-item-options">Size: XS; Colar: Navy</span> --}}
											<span class="cart-item-amount"> {{$product['qty']}}* 
												{{-- <span>{{number_format($product['item']['unit_price'])}}</span> --}}
												@if($product['item']['promotion_price']==0)
												<span>{{number_format($product['item']['unit_price'])}} đ</span>
												@else
												<span>{{number_format($product['item']['promotion_price'])}} đ</span>
												@endif
											</span>
											{{-- <input type="number" value="" min="1"> --}}
										</div>
									</div>
								</div>
								@endforeach
						
									<div class="cart-caption">
										<div class="cart-total text-right">Total pay: 
											<span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} đ</span>
										</div>

										@endif
										
										<div class="clearfix"></div>
										<div class="center">
											<div class="space10">&nbsp;</div>
											<a href="{{route('dathang')}}" class="beta-btn primary text-center">Purchase <i class="fa fa-chevron-right"></i></a>
										</div>
									</div>
								</div>

							</div> <!-- .cart -->
						{{-- @endif --}}

					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trang-chu')}}">Home page</a></li>
						<li><a href="{{route('all')}}">Category</a>
							<ul class="sub-menu">
								@foreach ($loai_sp as $item)
									<li><a href="{{route('loaisanpham', $item->cate_id)}}">{{$item->cate_name}}</a></li>
								@endforeach
								
								
							</ul>
						</li>
						<li><a href="{{route('gioithieu')}}">Infomation</a></li>
						<li><a href="{{route('lienhe')}}">Contact</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->

	