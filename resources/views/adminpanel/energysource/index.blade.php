@extends('adminpanel/layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-10 p-0">
                    <h3>Energy Sources</h3>
                </div>
                <div class="col-sm-2 p-0">
                    <div class="overflow-hidden">
                        <button class="btn  mx-auto mt-3" type="button" data-bs-toggle="modal"
                                data-bs-target="#addModel"  style="background-color: #1B1F23; color: #ffffff; border: none;">Add Energy Sources
                                </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for adding new events -->
        <div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="addModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content dark-sign-up">
            <div class="modal-header">
                <h3 class="modal-title">Energy Sources Details</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body social-profile text-start">
                <div class="modal-toggle-wrapper">
                    <form id="energySourceForm">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" id="" class="form-control" required>
                                    <span class="text-danger error-date"></span>
                                </div>
                            </div>

                        

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
        document.getElementById("energy_source").setAttribute("max", today); // Set max attribute to today
    });
</script>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="central_grid">Central Grid (MW)</label>
                                    <input type="number" step="0.01" name="central_grid" class="form-control" required>
                                    <span class="text-danger error-central_grid"></span>
                                </div>

                                <div class="form-group">
                                    <label for="bio_co_gen">Bio & Co-Gen (MW)</label>
                                    <input type="number" step="0.01" name="bio_co_gen" class="form-control" required>
                                    <span class="text-danger error-bio_co_gen"></span>
                                </div>

                                <div class="form-group">
                                    <label for="solar">Solar (MW)</label>
                                    <input type="number" step="0.01" name="solar" class="form-control" required>
                                    <span class="text-danger error-solar"></span>
                                </div>

                                <div class="form-group">
                                    <label for="wind">Wind (MW)</label>
                                    <input type="number" step="0.01" name="wind" class="form-control" required>
                                    <span class="text-danger error-wind"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gas_naptha">Gas Naptha (MW)</label>
                                    <input type="number" step="0.01" name="gas_naptha" class="form-control" required>
                                    <span class="text-danger error-gas_naptha"></span>
                                </div>

                                <div class="form-group">
                                    <label for="hydro">Hydro (MW)</label>
                                    <input type="number" step="0.01" name="hydro" class="form-control" required>
                                    <span class="text-danger error-hydro"></span>
                                </div>

                                <div class="form-group">
                                    <label for="thermal">Thermal (MW)</label>
                                    <input type="number" step="0.01" name="thermal" class="form-control" required>
                                    <span class="text-danger error-thermal"></span>
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


<div class="modal fade" id="editevents" tabindex="-1" role="dialog" aria-labelledby="editeventsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content dark-sign-up">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title" id="editeventsLabel">Edit Energy Sources Details</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body for Edit events -->
            <div class="modal-body social-profile text-start">
            <form id="edit-energy-source-form" method="POST" action="{{ url('/admin/energysource/') }}">


    @csrf
    @method('PUT')

    <div class="row">

    <div class="col-md-12">
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>
</div>
        <div class="col-md-6">
           

            <div class="form-group">
                <label for="central_grid">Central Grid (MW)</label>
                <input type="number" step="0.01" name="central_grid" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="bio_co_gen">Bio & Co-Gen (MW)</label>
                <input type="number" step="0.01" name="bio_co_gen" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="solar">Solar (MW)</label>
                <input type="number" step="0.01" name="solar" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="wind">Wind (MW)</label>
                <input type="number" step="0.01" name="wind" class="form-control" required>
            </div>
        </div>

        <div class="col-md-6">
            

            <div class="form-group">
                <label for="gas_naptha">Gas Naptha (MW)</label>
                <input type="number" step="0.01" name="gas_naptha" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hydro">Hydro (MW)</label>
                <input type="number" step="0.01" name="hydro" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="thermal">Thermal (MW)</label>
                <input type="number" step="0.01" name="thermal" class="form-control" required>
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

                <div class="table-responsive custom-scrollbar">


<table id="EventsTable" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>SNo</th>
                <th>Date</th>
                <th>Central Grid (MW)</th>
                <th>Bio & Co-Gen (MW)</th>
                <th>Solar (MW)</th>
                <th>Wind (MW)</th>
                <th>Gas Naptha (MW)</th>
                <th>Hydro (MW)</th>
                <th>Thermal (MW)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($EnergySource as $index => $source)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($source->date)->format('d-m-Y') }}</td>

                <td>{{ $source->central_grid }}</td>
                <td>{{ $source->bio_co_gen }}</td>
                <td>{{ $source->solar }}</td>
                <td>{{ $source->wind }}</td>
                <td>{{ $source->gas_naptha }}</td>
                <td>{{ $source->hydro }}</td>
                <td>{{ $source->thermal }}</td>
                <td>
                <button type="button" class="btn btn-primary btn-sm edit-energy-source" 
        data-bs-toggle="modal" 
        data-bs-target="#editevents" 
        data-id="{{ $source->id }}"
        data-date="{{ $source->date }}"
        data-central_grid="{{ $source->central_grid }}"
        data-bio_co_gen="{{ $source->bio_co_gen }}"
        data-solar="{{ $source->solar }}"
        data-wind="{{ $source->wind }}"
        data-gas_naptha="{{ $source->gas_naptha }}"
        data-hydro="{{ $source->hydro }}"
        data-thermal="{{ $source->thermal }}">
        Edit
    </button>
                    <form action="{{ route('energysource.destroy', $source->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you Want Delete?')">Delete</button>
                    </form>
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
<script>

    //Add Function
    $(document).ready(function () {
    $('#submiteventsForm').click(function (e) {
        e.preventDefault();

        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let formData = new FormData($('#eventsForm')[0]);

        $.ajax({
            url: "{{ route('events.store') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                if (response.success) {
                    // Show SweetAlert2 success message
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to the events list page
                            window.location.href = response.redirect_url; // This will redirect to events.index
                        }
                    });
                } else {
                    alert("Failed to register events.");
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON;

                    // Display the validation errors below each input field
                    $('#full_name_error').text(errors.full_name ? errors.full_name[0] : '');
                    $('#contact_no_error').text(errors.contact_no ? errors.contact_no[0] : '');
                    $('#age_error').text(errors.age ? errors.age[0] : '');
                    $('#gender_error').text(errors.gender ? errors.gender[0] : '');
                    $('#address_error').text(errors.address ? errors.address[0] : '');
                    $('#mother_tongue_error').text(errors.mother_tongue ? errors.mother_tongue[0] : '');
                    $('#image_error').text(errors.image ? errors.image[0] : '');
                } else {
                    alert("An error occurred. Please try again.");
                }
            }
        });
    });
});





///Edit Function

$(document).ready(function () {
    $(document).on('click', '.editEventsBtn', function() {
        var eventsId = $(this).data('id');
        var editUrl = "{{ route('events.edit', ':id') }}".replace(':id', eventsId);

        $.ajax({
            url: editUrl,
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    $('#editevents').modal('show');
                    $('#events_id').val(response.events.id);
                    $('#edit_full_name').val(response.events.full_name);
                    $('#edit_age').val(response.events.age);
                    $('#edit_gender').val(response.events.gender);
                    $('#edit_mobile').val(response.events.contact_no);
                    $('#edit_address').val(response.events.address);
                    $('#edit_mother_tongue').val(response.events.mother_tongue);
                }
            },
            error: function(xhr) {
                alert('Error fetching events details');
            }
        });
    });

    $('#submitEditEventsForm').click(function(e) {
        e.preventDefault();
        let eventsId = $('#events_id').val();
        let formData = new FormData($('#editeventsForm')[0]);
        formData.append('_method', 'PUT');

        var updateUrl = "{{ route('events.update', ':id') }}".replace(':id', eventsId);

        $.ajax({
            url: updateUrl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#editevents').modal('hide');
                            location.reload();
                        }
                    });
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON;
                    $('#edit_full_name_error').text(errors.full_name ? errors.full_name[0] : '');
                    $('#edit_contact_no_error').text(errors.contact_no ? errors.contact_no[0] : '');
                    $('#edit_age_error').text(errors.age ? errors.age[0] : '');
                    $('#edit_gender_error').text(errors.gender ? errors.gender[0] : '');
                    $('#edit_address_error').text(errors.address ? errors.address[0] : '');
                    $('#edit_mother_tongue_error').text(errors.mother_tongue ? errors.mother_tongue[0] : '');
                    $('#image_error').text(errors.image ? errors.image[0] : '');
                }
            }
        });
    });
});


function searcheventss() {
    var searchQuery = document.getElementById('search').value;

    // Make AJAX request to the controller's search route
    $.ajax({
        url: "{{ route('events.index') }}",
        type: 'GET',
        data: { search: searchQuery },
        success: function(response) {
            // Update the table with the new events data
            $('#eventsTable').html(response.events_table_html);
        },
        error: function(xhr) {
            alert("An error occurred while searching.");
        }
    });
}



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
        $("#energySourceForm").on("submit", function (e) {
            e.preventDefault();

            $(".text-danger").text(""); // Clear previous errors

            $.ajax({
                url: "{{ route('energysource.store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        title: "Success",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        location.reload(); // Reload the page after user clicks OK
                    });
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, value) {
                            $(".error-" + key).text(value[0]); // Display validation errors
                        });
                    }
                }
            });
        });
    });
</script>
