
<div class="col-sm-8">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Registration totals</h3>
		</div>
		<div class="panel-body">
			<div class="col-sm-6">
				<canvas id="registrationStatusChart" width="250" height="250"></canvas>
			</div>
			<div class="col-sm-6">
				<ul class="list-group">
				    <li class="list-group-item"><span style="background-color: #a6cee3; border-radius: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Registered <span class="badge alert-info">{{{ $registration_count_total }}}</span></li>
				    <li class="list-group-item"><span style="background-color: #1f78b4; border-radius: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Still to register <span class="badge alert-info">{{{ $expected_count - $registration_count_total }}}</span></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="col-sm-8">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Registration by day</h3>
		</div>
		<div class="panel-body">
			<div class="col-sm-6">
				<canvas id="registrationDayChart" width="250" height="250"></canvas>
			</div>
			<div class="col-sm-6">
				<ul class="list-group">
				    <li class="list-group-item legend"><span style="background-color: #a6cee3; border-radius: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Thursday <span class="badge alert-info">{{{ $thursday_registration_count }}}</span></li>
				    <li class="list-group-item legend"><span style="background-color: #1f78b4; border-radius: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Friday   <span class="badge alert-info">{{{ $friday_registration_count }}}</span></li>
				    <li class="list-group-item legend"><span style="background-color: #b2df8a; border-radius: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Saturday <span class="badge alert-info">{{{ $saturday_registration_count }}}</span></li>
				</ul>
			</div>
		</div>
	</div>
</div>


@section('extra_js')

<script src="{{ asset('Chart.min.js') }}"></script>

<script type="text/javascript">

	// Useful chart colours:
	// #a6cee3, #1f78b4, #b2df8a, #33a02c, #fb9a99, #e31a1c, #fdbf6f, #ff7f00, #cab2d6, #6a3d9a

	var registration_status_data = [
		{ value: {{{ $registration_count_total }}}, label: 'Registered', color: '#a6cee3', highlight: ColorLuminance('#a6cee3', 0.2) },
		{ value: {{{ $expected_count - $registration_count_total }}}, label: 'Still to register', color: '#1f78b4', highlight: ColorLuminance('#1f78b4', 0.2) }
	];

	var ctx1 = document.getElementById("registrationStatusChart").getContext("2d");
	var pieChart1 = new Chart(ctx1).Doughnut(registration_status_data);


	var registration_days_data = [
		{ value: {{{ $thursday_registration_count }}}, label: 'Thursday', color: '#a6cee3', highlight: ColorLuminance('#a6cee3', 0.2) },
		{ value: {{{ $friday_registration_count }}},   label: 'Friday',   color: '#1f78b4', highlight: ColorLuminance('#1f78b4', 0.2) },
		{ value: {{{ $saturday_registration_count }}}, label: 'Saturday', color: '#b2df8a', highlight: ColorLuminance('#b2df8a', 0.2) },
	];

	var ctx2 = document.getElementById("registrationDayChart").getContext("2d");
	var pieChart2 = new Chart(ctx2).Doughnut(registration_days_data);

	function ColorLuminance(hex, lum) {

		// validate hex string
		hex = String(hex).replace(/[^0-9a-f]/gi, '');
		if (hex.length < 6) {
			hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
		}
		lum = lum || 0;

		// convert to decimal and change luminosity
		var rgb = "#", c, i;
		for (i = 0; i < 3; i++) {
			c = parseInt(hex.substr(i*2,2), 16);
			c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
			rgb += ("00"+c).substr(c.length);
		}

		return rgb;
	}

</script>

@stop