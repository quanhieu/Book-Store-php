<!DOCTYPE html>
<html>
<head>
	<base href="{{asset('public/layout/backend')}}/">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title') | LN shop</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script type="text/javascript" src="../../editor/ckeditor/ckeditor.js"></script>
	<script src="js/lumino.glyphs.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{asset('admin/home')}}">
					<img src="{{asset('public/source/assets/dest/images/logo9.png') }}" width="14%" alt="" >
				</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"></use>
							</svg> {{Auth::user()->email}} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{asset('logout')}}">
								<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li class="active"><a href="{{asset('admin/home')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home page</a></li>
			<li><a href="{{asset('admin/admin')}}"> <i class="fas fa-chart-pie fa-2x"></i> Admin</a></li>
			<li><a href="{{asset('admin/product')}}"> <i class="fab fa-product-hunt fa-2x"></i> Product</a></li>
			<li><a href="{{asset('admin/category')}}"> <i class="fas fa-align-left fa-2x"></i> Category</a></li>
			{{-- <li><a href="{{asset('admin/product')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Product</a></li> --}}
			{{-- <li><a href="{{asset('admin/category')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Category</a></li> --}}
			<li><a href="{{asset('admin/slide')}}"> <i class="fab fa-500px fa-2x"></i> Slide</a></li>
			<li><a href="{{asset('admin/new')}}"> <i class="far fa-newspaper fa-2x"></i> New</a></li>
			<li><a href="{{asset('admin/customer')}}"> <i class="fas fa-people-carry fa-2x"></i> Customer</a></li>
			<li><a href="{{asset('admin/comment')}}"> <i class="fas fa-comments fa-2x"></i> Comment</a></li>
			<li><a href="{{asset('admin/bill')}}"> <i class="fas fa-money-bill-alt fa-2x"></i> Bill</a></li>
			<li><a href="{{asset('admin/billdetail')}}"> <i class="fas fa-file-invoice-dollar fa-2x"></i> Bill detail</a></li>

			<li class="active"><a href="{{asset('admin/billdetail/chart')}}"> <i class="fas fa-chart-line fa-2x"></i> Chart page</a></li>
			<li role="presentation" class="divider"></li>
		</ul>
		
	</div><!--/.sidebar-->

	<!-- MAIN -->
	@yield('main')
	{{-- <script src="js/myscript.js"></script> --}}
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		});
		
		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});



		//

		//
	</script>	
</body>

</html>