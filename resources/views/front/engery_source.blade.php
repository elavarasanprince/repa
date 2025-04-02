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
                <h1 class="wow fadeInUp" data-wow-delay=".3s"> Energy Source</h1>
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
                    Energy Source
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <div class="limiter">
        
		<div class="container-table100">
			<h4 class="mb-5 text-white text-center">
    Availability Vs. Demand Met {{ $fromDateFormatted }} to {{ $toDateFormatted }}
</h4>
			<br>
			<div class="clearfix"></div>

			<div class="row">
			<div class="wrap-table100 mb-5">
				<div class="table100">
					    <table>
                        <thead>
                        <tr class="table100-head">
  
                <th>S/N</th>
                <th>Date</th>
                <th>Availability</th>
                <th>Demand Met</th>
               
               
            </tr>
        </thead>
        <tbody>
            @foreach($availabilityDemandmet as $index => $source)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($source->date)->format('d-m-Y') }}</td>

                <td>{{ $source->availability }}</td>
                <td>{{ $source->demand_met }}</td>
             
                
            </tr>
        @endforeach
    </tbody>
</table>
				</div>
			</div></div>
		</div>
	</div>




    @include('includes.footer')



@include('includes.script')



</body>

</html>
