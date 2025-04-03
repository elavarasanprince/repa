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
                <h1 class="wow fadeInUp" data-wow-delay=".3s"> {{ $pageHeading }}</h1>
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
                        Members List
                    </li>
                    <li>
                        <i class="fas fa-chevron-right"></i>
                    </li>
                    <li>
                        {{ $pageHeading }}
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <div class="limiter basic-data-table">
		<div class="container">
		
			<div class="wrap-table100 mb-5">
			    	<h4 class="mb-5 text-white text-center"> {{ $pageHeading }}

</h4>
			<div class="table100 dt-layout-row">
			    <table id="memberTable" class="table bordered-table dataTable mt-3" style="width: 100%;" aria-describedby="example_info">
   
        <thead>
            <tr class="">
                <th style="width:7%">S/N</th>
                <th>NAME OF THE MEMBER </th>
              
            </tr>
        </thead>
       <tbody>
    @foreach($member as $index => $m) <!-- Changed $member to $m -->
    <tr>
        <th>{{ $index + 1 }}</th>
        <td>
            <a href="{{ route('membershow', $m->id) }}" class="member-link">

                {{ $m->oftheCompany }}

            </a>
        </td> 
    </tr>
    @endforeach
</tbody>

    </table>
</div>

			</div>
	
		
		</div>
	</div>



<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    @include('includes.footer')



@include('includes.script')

<!-- jQuery (Required for DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#memberTable').DataTable({
            "paging": true,         // Enable Pagination
            "ordering": true,       // Enable Sorting
            "info": true,           // Show Info
            "searching": true,      // Enable Search
            // Default Sort by Member Name
            "language": {
                "searchPlaceholder": "Search by name..."
            },
			"columnDefs": [
            {
                "targets": 'thead th', // Target the header cells (th)
                "className": "dt-center" // Center-align the header
            },
            {
                "targets": 'tbody td', // Target the body cells (td)
                "className": "dt-left" // Left-align the data in the body
            }
        ],
        });
    });
</script>

</body>

</html>
