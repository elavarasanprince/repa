<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="description" content="REPA">

    <!-- ======== Page title ============ -->
    <title>REPA | Home</title>
    @include('includes.head')

</head>

<body>

    @include('includes.header')

    <div class="breadcrumb-wrapper bg-cover" style="background-image: url('assets/img/breadcrumb.jpg');">
        <!-- <div class="border-shape">
                <img src="assets/img/element.png" alt="shape-img">
            </div> -->
        <div class="line-shape">
            <img src="assets/img/line-element.png" alt="shape-img">
        </div>
        <div class="container">
            <div class="page-heading">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Forecast Vs Actuals</h1>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="index.php">
                            Home
                        </a>
                    </li>
                    <li>
                        <i class="fas fa-chevron-right"></i>
                    </li>
                    <li>
                    Forecast Vs Actuals
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <div class="limiter">
		<div class="container-table100">
			<h4 class="mb-5 text-center">  Forecasted Solar Energy vs. Actual Evacuation ({{ $fromDateFormatted }} to {{ $toDateFormatted }})

</h4>


			<div class="wrap-table100 mb-5">
				
							<div class="table100 dt-layout-row">
			    <table id="memberTable" class="table bordered-table dataTable mt-3" style="width: 100%;" aria-describedby="example_info">
				
    <thead>
        <tr class="table100-head">
            <th>S/N</th>
            <th>Date</th>
            <th>Solar Energy <br>Forecasted <br>(in Mus)</th>
            <th>Actual Evacuated<br> Energy as Reported <br>by TANGEDCO</th>
            <th>Deviation<br> (In Mus) (+/-)</th>
            <th>% of Deviation</th>
        </tr>
    </thead>
    <tbody>
        @foreach($forecasts as $index => $forecast)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ \Carbon\Carbon::parse($forecast->date)->format('d/m/Y') }}</td>
            <td>{{ $forecast->forecasted_solar }}</td>
            <td>{{ $forecast->actual_solar }}</td>

            {{-- Calculate Deviation (Forecasted - Actual) --}}
            @php
                $deviation = $forecast->actual_solar - $forecast->forecasted_solar;
                $percent_deviation = ($forecast->forecasted_solar != 0) 
                    ? (($deviation / $forecast->forecasted_solar) * 100) 
                    : 0;
            @endphp

            <td>{{ number_format($deviation, 2) }}</td>
            <td>{{ number_format($percent_deviation, 2) }}%</td>
        </tr>
        @endforeach
    </tbody>
</table>

				</div>
			</div>
	
			<h4 class="mb-5 text-center">  Forecasted Wind Energy vs. Actual Evacuation  ({{ $fromDateFormatted }} to {{ $toDateFormatted }})

</h4>
			<div class="wrap-table100 mb-5">
					<div class="table100 dt-layout-row">
			    <table id="memberTable" class="table bordered-table dataTable mt-3" style="width: 100%;" aria-describedby="example_info">
				
    <thead>
        <tr class="table100-head">
            <th>S/N</th>
            <th>Date</th>
            <th>Wind Energy <br>Forecasted <br>(in Mus)</th>
            <th>Actual Evacuated<br> Energy as Reported <br>by TANGEDCO</th>
            <th>Deviation<br> (In Mus) (+/-)</th>
            <th>% of Deviation</th>
        </tr>
    </thead>
    <tbody>
        @foreach($forecasts as $index => $forecast)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ \Carbon\Carbon::parse($forecast->date)->format('d/m/Y') }}</td>
            <td>{{ $forecast->forecasted_wind }}</td>
            <td>{{ $forecast->actual_wind }}</td>

            {{-- Calculate Deviation (Forecasted - Actual) --}}
            @php
                $deviation = $forecast->actual_wind - $forecast->forecasted_wind;
                $percent_deviation = ($forecast->forecasted_wind != 0) 
                    ? (($deviation / $forecast->forecasted_wind) * 100) 
                    : 0;
            @endphp

            <td>{{ number_format($deviation, 2) }}</td>
            <td>{{ number_format($percent_deviation, 2) }}%</td>
        </tr>
        @endforeach
    </tbody>
</table>

				</div>
			</div>
		</div>
	</div>




    @include('includes.footer')



@include('includes.script')



</body>

</html>
