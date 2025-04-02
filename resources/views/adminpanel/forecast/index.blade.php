@extends('adminpanel/layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-10 p-0">
                    <h3>Forecast & Actuals</h3>
                </div>
                <div class="col-sm-2 p-0">
                    <div class="overflow-hidden">
                        <button class="btn  mx-auto mt-3" type="button" data-bs-toggle="modal"
                                data-bs-target="#addModel"  style="background-color: #1B1F23; color: #ffffff; border: none;">Forecast & Actuals
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
                    <h3 class="modal-title" id="addModel">Forecast & Actuals Details</h3>

                    <!-- Close button on the right -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                <div class="modal-body social-profile text-start">
                    <div class="modal-toggle-wrapper">
                
                    <form id="forecastForm">
    @csrf
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" id="" class="form-control">
        <span class="text-danger error-date"></span>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
        document.getElementById("forecast_date").setAttribute("max", today); // Set max attribute
    });
</script>
    <div class="form-group">
        <label for="forecasted_wind">Forecasted Wind (MW)</label>
        <input type="number" step="0.01" name="forecasted_wind" class="form-control">
        <span class="text-danger error-forecasted_wind"></span>
    </div>

    <div class="form-group">
        <label for="actual_wind">Actual Wind (MW)</label>
        <input type="number" step="0.01" name="actual_wind" class="form-control">
        <span class="text-danger error-actual_wind"></span>
    </div>

    <div class="form-group">
        <label for="forecasted_solar">Forecasted Solar (MW)</label>
        <input type="number" step="0.01" name="forecasted_solar" class="form-control">
        <span class="text-danger error-forecasted_solar"></span>
    </div>

    <div class="form-group">
        <label for="actual_solar">Actual Solar (MW)</label>
        <input type="number" step="0.01" name="actual_solar" class="form-control">
        <span class="text-danger error-actual_solar"></span>
    </div>

    <button type="submit" class="btn btn-success mt-2">Save</button>
</form>


                    </div>
                </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->


<div class="modal fade" id="editevents" tabindex="-1" role="dialog" aria-labelledby="editeventsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content dark-sign-up">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title" id="editeventsLabel">Edit Forecast & Actuals</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body for Edit events -->
            <div class="modal-body social-profile text-start">
              <form id="editeventsForm" class="row g-3">
    @csrf
    <input type="hidden" name="_method" value="PUT"> <!-- Hidden method field -->
    <input type="hidden" id="events_id" name="events_id">

    <div class="col-md-6">
        <label class="form-label" for="edit_date">Date</label>
        <input class="form-control" id="edit_date" name="date" type="date" required>
    </div>

    <div class="col-md-6">
        <label class="form-label" for="edit_forecasted_wind">Forecasted Wind Energy</label>
        <input class="form-control" id="edit_forecasted_wind" name="forecasted_wind" type="text" required>
    </div>

    <div class="col-md-6">
        <label class="form-label" for="edit_forecasted_solar">Forecasted Solar Energy</label>
        <input class="form-control" id="edit_forecasted_solar" name="forecasted_solar" type="text" required>
    </div>

    <div class="col-md-6">
        <label class="form-label" for="edit_actual_wind">Actual Wind Energy</label>
        <input class="form-control" id="edit_actual_wind" name="actual_wind" type="text" required>
    </div>

    <div class="col-md-6">
        <label class="form-label" for="edit_actual_solar">Actual Solar Energy</label>
        <input class="form-control" id="edit_actual_solar" name="actual_solar" type="text" required>
    </div>

    <div class="col-12">
        <button class="btn btn-success" type="submit">Update</button>
    </div>
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

                <div class="table-responsive custom-scrollbar">


               <table id="EventsTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>SNo.</th>
            <th>Date</th>
            <th>Forecasted Energy Wind</th>
            <th>Forecasted Energy Solar</th>
            <th>Actual Energy Wind</th>
            <th>Actual Energy Solar</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($forecasts as $index => $forecast)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $forecast->date }}</td>
            <td>{{ $forecast->forecasted_wind }}</td>
            <td>{{ $forecast->forecasted_solar }}</td>
            <td>{{ $forecast->actual_wind }}</td>
            <td>{{ $forecast->actual_solar }}</td>
            <td>
                <!-- Edit Button -->
                <button class="btn btn-primary btn-sm edit-event" 
                    data-id="{{ $forecast->id }}" 
                    data-date="{{ $forecast->date }}" 
                    data-forecasted_wind="{{ $forecast->forecasted_wind }}" 
                    data-forecasted_solar="{{ $forecast->forecasted_solar }}" 
                    data-actual_wind="{{ $forecast->actual_wind }}" 
                    data-actual_solar="{{ $forecast->actual_solar }}"
                    data-bs-toggle="modal" data-bs-target="#editevents">
                    Edit
                </button>

                <!-- Delete Button -->
                <button class="btn btn-danger btn-sm delete-event" data-id="{{ $forecast->id }}">
                    Delete
                </button>
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

$(document).on("click", ".delete-event", function() {
    var eventId = $(this).data("id");

    if (confirm("Are you sure you want to delete this event?")) {
       $.ajax({
    url: "{{ route('forecast.delete', '') }}/" + eventId, // Using Laravel route helper
    type: "DELETE",
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content') // Get CSRF token
    },
    success: function(response) {
        Swal.fire({
                    title: "Success!",
                    text: "Forecast & Actuals Deleted successfully!",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    $("#editevents").modal("hide");
                    location.reload(); 
                });
    },
    error: function(xhr) {
        console.log(xhr.responseText);
        alert("Failed to delete Forecast & Actuals!");
    }
});
    }
});
$(document).on("click", ".edit-event", function() {
    var eventId = $(this).data("id");
    var date = $(this).data("date");
    var forecastedWind = $(this).data("forecasted_wind");
    var forecastedSolar = $(this).data("forecasted_solar");
    var actualWind = $(this).data("actual_wind");
    var actualSolar = $(this).data("actual_solar");

    // Set modal fields with the selected event data
    $("#events_id").val(eventId);
    $("#edit_date").val(date);
    $("#edit_forecasted_wind").val(forecastedWind);
    $("#edit_forecasted_solar").val(forecastedSolar);
    $("#edit_actual_wind").val(actualWind);
    $("#edit_actual_solar").val(actualSolar);
});

// Submit Update Form
$(document).on("submit", "#editeventsForm", function(e) {
    e.preventDefault(); // Prevent default form submission

    var formData = $(this).serialize(); // Serialize form data

    $.ajax({
        url: "{{ route('forecast.update') }}",  // Use Laravel route helper
        type: "POST",  // Laravel requires PUT requests via _method in a POST request
        data: formData + "&_method=PUT",
        success: function(response) {
              Swal.fire({
                    title: "Success!",
                    text: "Forecast & Actuals updated successfully!",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    $("#editevents").modal("hide");
                    location.reload(); 
                });
           ;  // Refresh page to reflect changes
        },
        error: function(xhr) {
            console.log(xhr.responseText); // Debugging - Check Laravel error log
            alert("Failed to update Forecast!");
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
$(document).ready(function () {
    $("#forecastForm").on("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        $(".text-danger").text(""); // Clear previous error messages

        $.ajax({
            url: "{{ route('forecast.store') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    $("#addModel").modal("hide"); // Hide modal
                    location.reload(); // Reload the page after successful submission
                });
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        $(".error-" + key).text(value[0]); // Display validation error
                    });
                }
            }
        });
    });
});

</script>