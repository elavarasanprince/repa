@extends('adminpanel/layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-9 p-0">
                    <h3>Availability & Demand Met</h3>
                </div>
                <div class="col-sm-3 p-0">
                    <div class="overflow-hidden">
                        <button class="btn  mx-auto mt-3" type="button" data-bs-toggle="modal"
                                data-bs-target="#addModel"  style="background-color: #1B1F23; color: #ffffff; border: none;">Availability & Demand Met
                                </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for adding new events -->
<div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="addModel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dark-sign-up">
            <!-- Modal Header -->
                <div class="modal-header">
                    <!-- Title on the left -->
                    <h3 class="modal-title" id="addModel">Availability & Demand Met</h3>

                    <!-- Close button on the right -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                <div class="modal-body social-profile text-start">
                    <div class="modal-toggle-wrapper">
                    <form id="availabilityForm">
    @csrf

    <div class="row">
        <div class="col-md-12">
        <div class="form-group">
    <label for="date">Date</label>
    <input type="date" name="date" id="" class="form-control" required>
    <span class="text-danger error-date"></span>
</div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="availability">Availability</label>
                <input type="number" step="0.01" name="availability" class="form-control" required>
                <span class="text-danger error-availability"></span>
            </div>

            <div class="form-group">
                <label for="demand_met">Demand Met</label>
                <input type="number" step="0.01" name="demand_met" class="form-control" required>
                <span class="text-danger error-demand_met"></span>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-success mt-3">Save</button>
</form>



                    </div>
                </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->


<div class="modal fade" id="editavailabilityForm" tabindex="-1" role="dialog" aria-labelledby="editeventsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content dark-sign-up">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title" id="editeventsLabel">Edit Availability & Demand Met</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body for Edit events -->
            <div class="modal-body social-profile text-start">
             <form id="updateavailabilityForm">
    @csrf

    <div class="row">
        
        <input type="hidden" id="availabilityId" name="id">

        <div class="col-md-12">
        <div class="form-group">
    <label for="date">Date</label>
 <input type="date" name="date" id="EditdateInput" class="form-control" required>

    <span class="text-danger error-date"></span>
</div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="availability">Availability</label>
                <input type="number" step="0.01" name="availability" class="form-control" required>
                <span class="text-danger error-availability"></span>
            </div>

            <div class="form-group">
                <label for="demand_met">Demand Met</label>
                <input type="number" step="0.01" name="demand_met" class="form-control" required>
                <span class="text-danger error-demand_met"></span>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-success mt-3">Update</button>
</form>
            </div>
        </div>
    </div>
</div>



<!-- Success Modal -->
<div id="successModal" class="modal fade" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="successMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<!-- events Table starts-->
<div class="container-fluid basic_table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <!-- Search form -->
                    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                </div>

                <div class="table-responsive custom-scrollbar" style="padding:10px;">


<table id="EventsTable" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>SNo</th>
                <th>Date</th>
                <th>Availability</th>
                <th>	Demand Met</th>
                
                 <th>Action</th>
              
            </tr>
        </thead>
        <tbody>
    @foreach($AvailabilityDemandmet as $index => $source)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ \Carbon\Carbon::parse($source->date)->format('d-m-Y') }}</td>
        <td>{{ $source->availability }}</td>
        <td>{{ $source->demand_met }}</td>
        
       
        <td>
            
            <button class="btn btn-primary btn-sm edit-btn"
    data-id="{{ $source->id }}" 
    data-date="{{ \Carbon\Carbon::parse($source->date)->format('Y-m-d') }}" 
    data-availability="{{ $source->availability }}" 
    data-demand_met="{{ $source->demand_met }}">
    Edit
</button>

          

            <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $source->id }}">Delete</button>
        </td>
    </tr>
    @endforeach
</tbody>

    </table>
                </div>

                <!-- Pagination at the bottom right side -->

            </div>
        </div>
    </div>
</div>
</div>
<!-- events Table Ends-->



@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.all.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".edit-energy-source").forEach(function(button) {
        button.addEventListener("click", function() {
            let id = this.getAttribute("data-id");
            let date = this.getAttribute("data-date");
            let central_grid = this.getAttribute("data-central_grid");
            let bio_co_gen = this.getAttribute("data-bio_co_gen");
            let solar = this.getAttribute("data-solar");
            let wind = this.getAttribute("data-wind");
            let gas_naptha = this.getAttribute("data-gas_naptha");
            let hydro = this.getAttribute("data-hydro");
            let thermal = this.getAttribute("data-thermal");

         
            let form = document.querySelector("#edit-energy-source-form");
            form.action = form.action + '/' + id;

            document.querySelector("#edit-energy-source-form input[name='date']").value = date;
            document.querySelector("#edit-energy-source-form input[name='central_grid']").value = central_grid;
            document.querySelector("#edit-energy-source-form input[name='bio_co_gen']").value = bio_co_gen;
            document.querySelector("#edit-energy-source-form input[name='solar']").value = solar;
            document.querySelector("#edit-energy-source-form input[name='wind']").value = wind;
            document.querySelector("#edit-energy-source-form input[name='gas_naptha']").value = gas_naptha;
            document.querySelector("#edit-energy-source-form input[name='hydro']").value = hydro;
            document.querySelector("#edit-energy-source-form input[name='thermal']").value = thermal;
        });
    });
});


</script>

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $("#availabilityForm").submit(function (event) {
            event.preventDefault(); // Prevent default form submission

            $(".text-danger").text(""); // Clear previous errors

            let formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: "{{ route('availabilitystore') }}",
                type: "POST",
                data: formData,
                success: function (response) {
                    Swal.fire({
                        title: "Success!",
                        text: "Availability & Demand Met data saved successfully!",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        $("#availabilityForm")[0].reset(); // Reset form after success
                        $("#addDoctor").modal("hide"); // Hide the modal
                    });
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        if (errors.date) $(".error-date").text(errors.date[0]);
                        if (errors.availability) $(".error-availability").text(errors.availability[0]);
                        if (errors.demand_met) $(".error-demand_met").text(errors.demand_met[0]);
                    }
                }
            });
        });
    });
</script>


<script>








///Edit Function
$(document).ready(function () {
    // Open Edit Modal and Populate Data
   $(document).on("click", ".edit-btn", function () {
        let id = $(this).data("id");
        let date = $(this).data("date"); // Ensure it's in YYYY-MM-DD format
        let availability = $(this).data("availability");
        let demand_met = $(this).data("demand_met");

        // Debugging output
        console.log("ID:", id);
        console.log("Date:", date); // Check if this logs a correct date
        console.log("Availability:", availability);
        console.log("Demand Met:", demand_met);
 

        $("#availabilityId").val(id);
        $("#EditdateInput").val(date); // Ensure proper date format
        
        
        
        $("input[name='availability']").val(availability);
        $("input[name='demand_met']").val(demand_met);

        $("#editavailabilityForm").modal("show");
        $("#availabilityForm").attr("data-id", id);
    });

    // Update Data Using AJAX
 $("#updateavailabilityForm").submit(function (e) {
    e.preventDefault();
    let id = $("#availabilityId").val(); // Get ID from hidden input
    let formData = $(this).serialize() + "&_method=PUT"; // Append _method=PUT

    $.ajax({
        url: "admin/update-availability/" + id, 
        type: "POST", // Laravel will handle this as PUT
        data: formData,
        success: function (response) {
            Swal.fire({
                title: "Success!",
                text: "Availability & Demand Met data updated successfully!",
                icon: "success",
                confirmButtonText: "OK"
            }).then(() => {
                $("#availabilityForm")[0].reset();
                $("#editavailabilityForm").modal("hide");
                location.reload(); // Refresh table
            });
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
});



    // Delete Data Using AJAX
    $(document).on("click", ".delete-btn", function () {
        let id = $(this).data("id");
        if (confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                url: "delete-availability/" + id,
                type: "DELETE",
                data: { _token: "{{ csrf_token() }}" },
                success: function (response) {
            Swal.fire({
                title: "Success!",
                text: "Availability & Demand Met data Deleted successfully!",
                icon: "success",
                confirmButtonText: "OK"
            }).then(() => {
                $("#availabilityForm")[0].reset();
                $("#editavailabilityForm").modal("hide");
                location.reload(); // Refresh table
            });
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
            });
        }
    });
});




</script>
<style>
    .pagination-wrapper {
        text-align: right;  /* Align the pagination to the right */
        margin-top: 10px;    /* Optional: Add some spacing between the table and pagination */
    }

    .pagination {

        text-align: center;
    }
</style>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#EventsTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
        document.getElementById("dateInput").setAttribute("max", today); // Set max date to today
    });
</script>
