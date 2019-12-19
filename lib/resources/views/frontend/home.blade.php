@extends('frontend.master')
@section('title', 'Home page')
@section('main')

<div id="wrap-inner">
	<div class="products">
		<h3>sản phẩm nổi bật</h3>
		<div class="product-list row">
			@foreach ($featured as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="#"><img height="150px" src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}" class="img-thumbnail"></a>
				<p><a href="#"> {{$item->prod_name}}</a></p>
				<p class="price">Price: {{$item->prod_price,0,',','.'}} VND</p>	  
				<div class="marsk" href="{{ asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">
					{{-- {{$item->prod_description}} --}}
					<a href="{{ asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}"> {!!$item->prod_description!!} <b>Xem chi tiết</b> </a>
				</div>                                    
			</div>
			@endforeach


		</div>                	                	
	</div>

	<div class="products">
		<h3>sản phẩm mới</h3>
		<div class="product-list row">
			@foreach ($new as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="#"><img height="150px" src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}" class="img-thumbnail"></a>
				<p><a href="#"> {{$item->prod_name}}</a></p>
				<p class="price">Price: {{$item->prod_price,0,',','.'}} VND</p>	  
				<div class="marsk" href="{{ asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">
					<a href="{{ asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}"> {!!$item->prod_description!!} <b>Xem chi tiết</b> </a>
				</div>                      	                      
			</div> 
			@endforeach
		</div>    
	</div>
</div>

@stop