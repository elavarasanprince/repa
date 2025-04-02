@extends('adminpanel/layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-9 p-0">
                    <h3>Latest News</h3>
                </div>
                <div class="col-sm-3 p-0">
                    <div class="overflow-hidden">
                        <button class="btn  mx-auto mt-3" type="button" data-bs-toggle="modal"
                                data-bs-target="#addLatest"  style="background-color: #1B1F23; color: #ffffff; border: none;">Add Latest News
                                </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for adding new events -->
<div class="modal fade" id="addLatest" tabindex="-1" role="dialog" aria-labelledby="addLatest" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dark-sign-up">
            <!-- Modal Header -->
                <div class="modal-header">
                    <!-- Title on the left -->
                    <h3 class="modal-title" id="addLatest">Add Latest News</h3>

                    <!-- Close button on the right -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                <div class="modal-body social-profile text-start">
                    <div class="modal-toggle-wrapper">
                    <form id="latestForm">
    @csrf

    <div class="row">
        
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="availability">Title</label>
                <input type="text"  name="title" class="form-control" required>
              
            </div>

            <div class="form-group">
                <label for="demand_met">Link</label>
                <input type="text"  name="link" class="form-control" required>
                
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

<div class="modal fade" id="editlatestnews" tabindex="-1" role="dialog" aria-labelledby="editeventsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editeventsLabel">Edit Latest News</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="updatelatestForm">
                    @csrf
                    <input type="hidden" name="id" id="editId">

                    <div class="form-group">
                        <label for="editTitle">Title</label>
                        <input type="text" id="editTitle" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="editLink">Link</label>
                        <input type="text" id="editLink" name="link" class="form-control" required>
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
    <thead>
        <tr>
            <th>SNo.</th>
            
            <th>Title</th>
             <th>Link</th>
            
            <th>Action</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($latestnews as $index => $latestnews)
        <tr>
            <td>{{ $index + 1 }}</td>
          
            <td>{{ $latestnews->title }}</td>
            <td>{{ $latestnews->link }}</td>
          
           
          <td>
                <!-- Edit Button -->
                <button class="btn btn-primary btn-sm editBtn" 
                        data-id="{{ $latestnews->id }}" 
                        data-title="{{ $latestnews->title }}" 
                        data-link="{{ $latestnews->link }}">
                    Edit
                </button>

                <!-- Delete Button -->
                <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $latestnews->id }}">
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


$(document).ready(function () {
    // Open Edit Modal and Populate Fields
    $(".editBtn").click(function () {
        var id = $(this).data("id");
        var title = $(this).data("title");
        var link = $(this).data("link");

        $("#editId").val(id);
        $("#editTitle").val(title);
        $("#editLink").val(link);

        $("#editlatestnews").modal("show");
    });

    // Update Latest News
    $("#updatelatestForm").submit(function (e) {
        e.preventDefault();

        var formData = {
            id: $("#editId").val(),
            title: $("#editTitle").val(),
            link: $("#editLink").val(),
            _token: $("input[name=_token]").val(),
        };

        $.ajax({
            url: "{{ route('latestnews.update') }}",
            type: "POST",
            data: formData,
             success: function (response) {
                    Swal.fire({
                        title: "Success!",
                        text: "Latest News Updated successfully!",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        $("#updatelatestForm")[0].reset(); // Reset form after success
                        $("#editlatestnews").modal("hide"); // Hide the modal
                        location.reload(); // Reload the page
                    });
                },
            error: function () {
                alert("Error updating record");
            },
        });
    });

    // Delete Latest News
    $(".deleteBtn").click(function () {
        var id = $(this).data("id");

        if (confirm("Are you sure you want to delete this news?")) {
            $.ajax({
                url: "{{ route('latestnews.delete') }}",
                type: "POST",
                data: {
                    id: id,
                    _token: $("input[name=_token]").val(),
                },
                success: function (response) {
                    Swal.fire({
                        title: "Success!",
                        text: "Latest News Deleted successfully!",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        $("#latestForm")[0].reset(); // Reset form after success
                        $("#addLatest").modal("hide"); // Hide the modal
                        location.reload(); // Reload the page
                    });
                },
                error: function () {
                    alert("Error deleting record");
                },
            });
        }
    });
});

</script>

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $("#latestForm").submit(function (event) {
            event.preventDefault(); // Prevent default form submission

            $(".text-danger").text(""); // Clear previous errors
            let formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: "{{ route('lateststore') }}",
                type: "POST",
                data: formData,
                dataType: "json",
                success: function (response) {
                    Swal.fire({
                        title: "Success!",
                        text: "Latest News saved successfully!",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        $("#latestForm")[0].reset(); // Reset form after success
                        $("#addLatest").modal("hide"); // Hide the modal
                        location.reload(); // Reload the page
                    });
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        if (errors.title) $(".error-title").text(errors.title[0]);
                        if (errors.link) $(".error-link").text(errors.link[0]);
                    }
                }
            });
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
        document.getElementById("dateInput").setAttribute("min", today); // Set as min date
    });
</script>