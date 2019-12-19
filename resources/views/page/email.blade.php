

<div id="wrap-inner">
	<div id="khach-hang">
		<h3>Customer information</h3>
		<p>
			<span class="info">Customer: </span>
			{{$info['name']}}
		</p>
		<p>
			<span class="info">Email: </span>
			{{$info['email']}}
		</p>
		<p>
			<span class="info">Phone: </span>
			{{$info['phone']}}
		</p>
		<p>
			<span class="info">Message: </span>
			{{$info['message']}}
		</p>
	</div>						
	<div id="hoa-don">
		{{-- <h3>Hóa đơn mua hàng</h3>							
		<table class="table-bordered table-responsive">
			<tr class="bold">
				<td width="30%">Tên sản phẩm</td>
				<td width="25%">Giá</td>
				<td width="20%">Số lượng</td>
				<td width="15%">Thành tiền</td>
			</tr>
			@foreach ($cart as $item)
				<tr>
					<td>{{$item->name}}</td>
					<td class="price">{{number_format($item->price)}} VND</td>
					<td>{{$item->qty}}</td>
					<td class="price">{{number_format($item->price*$item->qty,0,',','.')}} VNĐ</td>
				</tr>
			@endforeach
			
			
			<tr>
				<td colspan="3">Tổng tiền:</td>
				<td class="total-price">{{$total}} VNĐ</td>
			</tr>
		</table> --}}
	</div>
	<div id="xac-nhan">
		<br>
		<p align="justify">
			<b>Thank you for contacting us!</b><br />
			• Your request will be processed 2 to 3 days from this time.<br />
			• Note, this is an automated confirmation email, please do not reply.<br />
			<b><br />We’re always looking for talented persons to join our team!</b>
		</p>
	</div>
</div>					
				
