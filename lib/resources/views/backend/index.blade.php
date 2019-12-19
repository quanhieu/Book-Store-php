@extends('backend.master')
@section('title', "Trang chủ quảng trị")
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Home page</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-blue panel-widget ">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{count($prod)}}</div>
						<div class="text-muted">Bill</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-orange panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{count($comt)}}</div>
						<div class="text-muted">Comment</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-teal panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{count($cus)}}</div>
						<div class="text-muted">User</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-red panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{count($cate)}}</div>
						<div class="text-muted">Product has bought</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-md-12">
			{{-- <div class="panel panel-red">
				<div class="panel-heading dark-overlay"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Lịch</div>
				<div class="panel-body">
					<div id="calendar"></div>
				</div>
			</div> --}}

			{{-- chart --}}
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
				var visitor = <?php echo $mos; ?>;
				console.log(visitor);
				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);
				function drawChart() {
					var data = google.visualization.arrayToDataTable(visitor);
					var options = {
						title: 'Statistics sales line Chart',
						curveType: 'function',
						legend: { position: 'bottom' }
					};
					var chart = new google.visualization.LineChart(document.getElementById('linechart'));
					chart.draw(data, options);
				}
			</script>
			 <div id="linechart" style="width: 1500px; height: 500px"></div>
			{{-- end chart --}}
		</div><!--/.col-->
	</div><!--/.row-->
</div>	<!--/.main-->
		  
@stop

