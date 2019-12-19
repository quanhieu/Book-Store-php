@extends('master')
@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Contacts</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		{{-- <div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3678.0141923553406!2d89.551518!3d22.801938!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff8ff8ef7ea2b7%3A0x1f1e9fc1cf4bd626!2sPranon+Pvt.+Limited!5e0!3m2!1sen!2s!4v1407828576904" ></iframe></div> --}}
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2647952598495!2d106.6425403153012!3d10.791019992311686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752eb33ce253bf%3A0xd9eec747fe59865c!2zxJDhuqFpIEjhu41jIEZQVCBHcmVlbndpY2ggVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1544548477853" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
	</div>
	<div class="container">
		@if(Session::has('thongbao'))
		<div class="row">
			<div class="alert alert-success">
				<strong> <h3>{{Session::get('thongbao')}}</h3>  </strong> 
			</div>
		</div>
		@endif
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Enter your contact </h2>
					<div class="space20">&nbsp;</div>
					{{-- <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit ani m id est laborum.</p> --}}
					<div class="space20">&nbsp;</div>
					<form action="{{route('mail')}}" method="post" class="contact-form" >	
						<div class="form-block">
							<input name="name" type="text" placeholder="Your Name" required="required" class="form-control">
						</div>
						<div class="form-block">
							<input name="email" type="email" placeholder="Your Email" required="required" class="form-control">
						</div>
						<div class="form-block">
							<input name="phone" type="tel" placeholder="Phone" required="required" class="form-control">
						</div>
						<div class="form-block">
							<textarea name="message" placeholder="Your Message" class="form-control"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Send Message <i class="fa fa-chevron-right"></i></button>
						</div>
						{{csrf_field()}}
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Contact us</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Address</h6>
					<p>
						Phạm Phú Thứ,<br>
						District 6 <br>
						TP Ho Chi Minh
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">[RECRUITMENT TRANSLATOR]</h6>
					<p>
						You love light novels. <br>
						You have the ability to translate Japanese fluently, which is rich in Vietnamese. <br>
						{{-- <a href="mailto:biz@betadesign.com">biz@betadesign.com</a> --}}
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title"> Please fill in the text box so that we can contact to you</h6>
					<p>
						We’re always looking for talented persons to <br>
						join our team. <br>
						{{-- <a href="hr@betadesign.com">hr@betadesign.com</a> --}}
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection