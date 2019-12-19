@extends('backend.master')
@section('title','Bill detail list')
@section('main')
		
{{-- chart --}}

					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
					<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
					<style type="text/css">
					.box{
						width:800px;
						margin:0 auto;
					}
				</style>
				<script type="text/javascript">
					var analytics = <?php echo $mos; ?>

					google.charts.load('current', {'packages':['corechart']});

					google.charts.setOnLoadCallback(drawChart);

					function drawChart()
					{
						var data = google.visualization.arrayToDataTable(analytics);
						var options = {
							title : 'Percentage of statistics sales'
						};
						var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
						chart.draw(data, options);
					}
				</script>


				<br />
				<div class="container">
					<h3 align="center">Statistics sales Pie Chart</h3><br />

					<div class="panel panel-default">
						{{-- <div class="panel-heading">
							<h3 class="panel-title">Percentage of statistics sales</h3>
						</div> --}}
						<div class="panel-body" align="center">
							<div id="pie_chart" style="width:750px; height:450px;">

							</div>
						</div>
					</div>

				</div>
	{{-- end chart --}}

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Statistics sales of products</h1>
			</div>
		</div><!--/.row-->
	
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					

			<div class="beta-products-details">
				<p class="pull-right">{{count($all)}} item has found</p>
				<div class="clearfix"></div>
			</div>
		
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								{{-- <a href="{{asset('admin/bill/add')}}" class="btn btn-primary">Add bill</a> --}}
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											
											<th width="60%" class="text-center">Product</th>
											<th width="20%" class="text-center">Product ID</th>
											<th width="20%" class="text-center">Total quantity</th>
											
																						
											
										</tr>
									</thead>
									<tbody>
										@foreach ($all as $detail)
											<tr>
												
												
												<td class="text-center">{{$detail->pname}} </td>
												<td class="text-center">{{$detail->id_product}} </td>
												<td class="text-center">{{$detail->TotalQuantity}} </td>
												
																								
												
											</tr>
										@endforeach
										
									</tbody>
								</table>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>

					

				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

@stop