@extends('layouts.app')

@section('content')
<main class="page-content">

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Charts</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Chartjs</li>
			</ol>
		</nav>
	</div>
	<div class="ms-auto">
		<div class="btn-group">
			<button type="button" class="btn btn-primary">Settings</button>
			<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
			</button>
			<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
				<a class="dropdown-item" href="javascript:;">Another action</a>
				<a class="dropdown-item" href="javascript:;">Something else here</a>
				<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
			</div>
		</div>
	</div>
</div>
<!--end breadcrumb-->

<div class="row">
	<div class="col-xl-9 mx-auto">
		<h6 class="mb-0 text-uppercase">Bar Chart</h6>
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="chart-container1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
					<canvas id="chart2" width="743" height="340" style="display: block; width: 743px; height: 340px;" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
		</div>
		<h6 class="mb-0 text-uppercase">Line Chart</h6>
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="chart-container1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
					<canvas id="chart1" width="743" height="340" style="display: block; width: 743px; height: 340px;" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
		</div>
		<h6 class="mb-0 text-uppercase">Pie Chart</h6>
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="chart-container1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
					<canvas id="chart3" width="743" height="340" style="display: block; width: 743px; height: 340px;" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
		</div>
		<h6 class="mb-0 text-uppercase">Radar Chart</h6>
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="chart-container1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
					<canvas id="chart4" width="743" height="340" style="display: block; width: 743px; height: 340px;" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
		</div>
		<h6 class="mb-0 text-uppercase">Polar Area Chart</h6>
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="chart-container1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
					<canvas id="chart5" width="743" height="340" style="display: block; width: 743px; height: 340px;" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
		</div>
		<h6 class="mb-0 text-uppercase">Doughnut Chart</h6>
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="chart-container1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
					<canvas id="chart6" width="743" height="340" style="display: block; width: 743px; height: 340px;" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
		</div>
		<h6 class="mb-0 text-uppercase">Horizontal Bar Chart</h6>
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="chart-container1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
					<canvas id="chart7" width="743" height="340" style="display: block; width: 743px; height: 340px;" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
		</div>
		<h6 class="mb-0 text-uppercase">Grouped Bar Chart</h6>
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="chart-container1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
					<canvas id="chart8" width="743" height="340" style="display: block; width: 743px; height: 340px;" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
		</div>
		<h6 class="mb-0 text-uppercase">Mixed Chart</h6>
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="chart-container1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
					<canvas id="chart9" width="743" height="340" style="display: block; width: 743px; height: 340px;" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
		</div>
		<h6 class="mb-0 text-uppercase">Bubble Chart</h6>
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="chart-container1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
					<canvas id="chart10" width="743" height="340" style="display: block; width: 743px; height: 340px;" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end row-->
</main>
@endsection
