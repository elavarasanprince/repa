@extends('adminpanel/layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-10 p-0">
                    <h3>Manage Circular</h3>
                </div>
               
            </div>
        </div>

        <ul class="nav nav-tabs" id="ProfileTabs" role="tablist">
  
    
    
    

</ul>

<div class="tab-content " id="ProfileTabsContent">
    @if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session("success") }}',
        showConfirmButton: false,
        timer: 3000 // Auto close after 3 seconds
    });
</script>
@endif

    <div class="tab-pane fade show active" id="circular" role="tabpanel" aria-labelledby="circular-tab">
        <div class="profile-header">
     


<div class="profile-details ">
     <div class="">
    <div class="row">
        
        <div class="col-sm-12">
        
            <div class="card" style="padding:20px;">
            @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                <div class="card-header">

                <div class="row">
                <div class="col-sm-10 p-0">
                    <h3>Manage Circular</h3>
                </div>
                <div class="col-sm-2 p-0">
                    <div class="overflow-hidden">
                        <button class="btn  mx-auto mt-2" type="button" data-bs-toggle="modal"
                                data-bs-target="#addcircular"  style="background-color: #1B1F23; color: #ffffff; border: none;">Add Circular</button>
                    </div>
                </div>
            </div>
                

                </div>

                <div class="table-responsive custom-scrollbar">


                <table id="EventsTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>SNo.</th>
              
            <th>Title</th>
             <th>Link</th>
              <th>Latest</th>
            <th>File</th>
            <th>Action</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($circulars as $index => $circular)
        <tr>
            <td>{{ $index + 1 }}</td>
          
            <td>{{ $circular->name }}</td>
            <td>{{ $circular->link }}</td>
            <td>{{ $circular->is_new }}</td>
            <td>
                @if($circular->pdf)
                    <a href="{{ asset('storage/app/public/' . $circular->pdf) }}" target="_blank" class="btn btn-primary">
                        View File
                    </a>
                @else
                    No File Available
                @endif
            </td>
            <td>
                <!-- Edit Button (Pass Data) -->
                <button class="btn btn-sm btn-warning edit-btn" 
                        data-id="{{ $circular->id }}" 
                        data-name="{{ $circular->name }}" 
                        data-link="{{ $circular->link }}" 
                        data-latest="{{ $circular->is_new }}" 
                        data-status="{{ $circular->status }}" 
                        data-bs-toggle="modal" 
                        data-bs-target="#editCircularModal">
                    <i class="fas fa-edit"></i> <!-- Edit Icon -->
                </button>

                <!-- Delete Button -->
                <form id="delete-form-{{ $circular->id }}" action="{{ route('circular.destroy', $circular->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $circular->id }})">
        <i class="fas fa-trash"></i> <!-- Delete Icon -->
    </button>
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

    
</div>

        </div>
    

  
   

   
</div>
</div>

   

        </div>
    </div>

 

   
    
    </div>

    

 <!-- Add New circular Modal  -->
<div class="modal fade" id="addcircular" tabindex="-1" role="dialog" aria-labelledby="addcircular" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dark-sign-up">
            <!-- Modal Header -->
                <div class="modal-header">
                    <!-- Title on the left -->
                    <h3 class="modal-title" id="addDoctor">Circular Details</h3>

                    <!-- Close button on the right -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                <div class="modal-body social-profile text-start">
                    <div class="modal-toggle-wrapper">
                    <form action="{{ route('circular.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    

    <div class="form-group">
        <label for="title">Circular Title</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <br>

    <div class="form-group">
    <label for="pdf">Upload File</label>
    <input type="file" name="pdf" class="form-control-file" 
           accept=".pdf, .doc, .docx, .xls, .xlsx" required>
</div>
<br>
    <div class="form-group">
        <label for="pdf">LINK</label>
        <input type="text" name="link" class="form-control">
    </div>
    <br>
    <div class="form-group">
    <input type="checkbox" name="latest" id="latest" value="1">
    <label for="latest">Mark as Latest</label>
</div>
    <br>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>  

    <br>

    <button type="submit" class="btn btn-success">Create Circular</button>
</form>
                    </div>
                </div>
        </div>
    </div>
</div>



<!-- Edit the Circular Details Modal  -->




<div class="modal fade" id="editCircularModal" tabindex="-1" role="dialog" aria-labelledby="editCircularModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content dark-sign-up">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">Edit Circular</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body social-profile text-start">
                <div class="modal-toggle-wrapper">
                    <form id="editCircularForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Update Method -->
                        
                        <!-- Hidden Input for Circular ID -->
                        <input type="hidden" id="circular_id" name="id">

                        <div class="form-group">
                            <label for="title">Circular Title</label>
                            <input type="text" id="edit_name" name="name" class="form-control" required>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="pdf">Upload File</label>
                            <input type="file" name="pdf" class="form-control-file" accept=".pdf, .doc, .docx, .xls, .xlsx">
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="link">LINK</label>
                            <input type="text" id="edit_link" name="link" class="form-control">
                        </div>

                        <br>

                        <div class="form-group">
                            <input type="checkbox" id="edit_latest" name="latest" value="1">
                            <label for="edit_latest">Mark as Latest</label>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="edit_status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>  

                        <br>

                        <button type="submit" class="btn btn-success">Update Circular</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="addForm" tabindex="-1" role="dialog" aria-labelledby="addForm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dark-sign-up">
            <!-- Modal Header -->
                <div class="modal-header">
                    <!-- Title on the left -->
                    <h3 class="modal-title" id="addDoctor">Form Details</h3>

                    <!-- Close button on the right -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                <div class="modal-body social-profile text-start">
                    <div class="modal-toggle-wrapper">
                    <form action="{{ route('circular.formstore') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Form Title</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <br>
 
    <div class="form-group">
        <label for="pdf">File</label>
        <input type="file" name="pdf" class="form-control-file" 
        accept=".pdf, .doc, .docx, .xls, .xlsx" required>
    </div>

    <br>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>

    <br>

    <button type="submit" class="btn btn-success">Create Form</button>
</form>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->

<div class="modal fade" id="addannual" tabindex="-1" role="dialog" aria-labelledby="addForm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content dark-sign-up">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title" id="addDoctor">Add Details</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body social-profile text-start">
                <div class="modal-toggle-wrapper">
                    <form action="{{ route('circular.annualreportstore') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                        @csrf
                        <div class="form-group">
                            <label for="title"> Title</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="pdf">File</label>
                            <input type="file" id="fileInput" name="pdf" class="form-control-file"
                                   accept=".pdf, .doc, .docx, .xls, .xlsx" required>
                            <small class="text-danger" id="fileError" style="display: none;">File size must be less than 1MB.</small>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-success">Create Annual Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById("fileInput").addEventListener("change", function () {
    const file = this.files[0];
    const maxSize = 1 * 1024 * 1024; // 1MB
    const errorElement = document.getElementById("fileError");

    if (file && file.size > maxSize) {
        errorElement.style.display = "block";
        this.value = ""; // Reset file input
    } else {
        errorElement.style.display = "none";
    }
});
</script>

<!-- Edit Form Modal -->


<div class="modal fade" id="editFormModal" tabindex="-1" role="dialog" aria-labelledby="editFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">Edit Details</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Laravel requires PUT method for updating -->

                    <input type="hidden" id="edit-id" name="id">

                    <div class="form-group">
                        <label for="edit-name">Title</label>
                        <input type="text" name="name" id="formedit-name" class="form-control" required>
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="edit-pdf">File (Upload New File if Needed)</label>
                        <input type="file" name="pdf" id="formedit-pdf" class="form-control-file" 
                               accept=".pdf, .doc, .docx, .xls, .xlsx">
                        <br>
                        <a id="existing-pdf" href="#" target="_blank">View Current File</a>
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="edit-status">Status</label>
                        <select name="status" id="formedit-status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-success">Update Form</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Annual Report Modal -->

<div class="modal fade" id="editAnnualModal" tabindex="-1" role="dialog" aria-labelledby="editFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">Edit Annnual Report Details</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="editAnnual" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Laravel requires PUT method for updating -->

                    <input type="hidden" id="editannual-id" name="id">

                    <div class="form-group">
                        <label for="edit-name">Title</label>
                        <input type="text" name="name" id="annualedit-name" class="form-control" required>
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="edit-pdf">File (Upload New File if Needed)</label>
                        <input type="file" name="pdf" id="annualedit-pdf" class="form-control-file" 
                               accept=".pdf, .doc, .docx, .xls, .xlsx">
                        <br>
                        <a id="existing-pdf" href="#" target="_blank">View Current File</a>
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="edit-status">Status</label>
                        <select name="status" id="annualedit-status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-success">Update Annual Report</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Comments Moadal  -->


<div class="modal fade" id="editCommentsModal" tabindex="-1" role="dialog" aria-labelledby="editFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">Edit Comments Details</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="editComment" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Laravel requires PUT method for updating -->

                    <input type="hidden" id="editcomment-id" name="id">

                    <div class="form-group">
                        <label for="edit-name">Title</label>
                        <input type="text" name="name" id="commentedit-name" class="form-control" required>
                    </div>

                    <br>


                    <div class="form-group">
                        <label for="edit-name">Link</label>
                        <input type="text" name="link" id="commentedit-link" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-pdf">File (Upload New File if Needed)</label>
                        <input type="file" name="pdf" id="commentedit-pdf" class="form-control-file" 
                               accept=".pdf, .doc, .docx, .xls, .xlsx">
                        <br>
                        <a id="existing-pdf" href="#" target="_blank">View Current File</a>
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="edit-status">Status</label>
                        <select name="status" id="commentedit-status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-success">Update Comment</button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="addcomments" tabindex="-1" role="dialog" aria-labelledby="addForm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dark-sign-up">
            <!-- Modal Header -->
                <div class="modal-header">
                    <!-- Title on the left -->
                    <h3 class="modal-title" id="addDoctor">Add Details</h3>

                    <!-- Close button on the right -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



              <div class="modal-body social-profile text-start">
                    <div class="modal-toggle-wrapper">
                    <form action="{{ route('circular.commentsstore') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Comments Title</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <br>

    <div class="form-group">
    <label for="pdf">Upload File</label>
    <input type="file" name="pdf" class="form-control-file" 
           accept=".pdf, .doc, .docx, .xls, .xlsx" required>
</div><br>
    <div class="form-group">
        <label for="pdf">LINK</label>
        <input type="text" name="link" class="form-control">
    </div>
    <br>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>  

    <br>

    <button type="submit" class="btn btn-success">Create Comments</button>
</form>
                    </div>
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

<!-- events Table Ends-->



@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.all.min.js"></script>


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
        $('#FormTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
    
     $(document).ready(function () {
        $('#commands').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
      $(document).ready(function () {
        $('#annualTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
    
     
</script>


<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $(".edit-btn").click(function() {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var link = $(this).data("link");
        var latest = $(this).data("latest");
        var status = $(this).data("status");

        // Populate modal form fields
        $("#circular_id").val(id);
        $("#edit_name").val(name);
        $("#edit_link").val(link);
        $("#edit_status").val(status);
        $("#edit_latest").prop("checked", latest == 1);

        var updateCircularRoute = "{{ route('circular.update', ':id') }}";
        var actionUrl = updateCircularRoute.replace(':id', id);
        $("#editCircularForm").attr("action", actionUrl);
    });

    // Handle form submission with AJAX
    $("#editCircularForm").submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this);
        var id = $("#circular_id").val();
        var updateCircularRoute = "{{ route('circular.update', ':id') }}";
        var actionUrl = updateCircularRoute.replace(':id', id); // Get correct URL

        $.ajax({
            url: actionUrl,
            type: "POST", // Laravel expects PUT for updates
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                "X-HTTP-Method-Override": "PUT" // Force Laravel to treat it as PUT
            },
            success: function(response) {
                Swal.fire({
                    title: "Success!",
                    text: "Circular updated successfully!",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    $("#editCircularModal").modal("hide");
                    location.reload(); // Refresh the page
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: "Error!",
                    text: "Something went wrong. Please try again.",
                    icon: "error"
                });
            }
        });
    });
});
</script>




<!-- Form Edit Function -->


<script>
$(document).ready(function() {
    $(".formedit-btn").click(function() {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var status = $(this).data("status");

        // Populate modal form fields
        $("#edit-id").val(id);
        $("#formedit-name").val(name);
        $("#formedit-status").val(status);
     

        var updateCircularRoute = "{{ route('circular.update', ':id') }}";
        var actionUrl = updateCircularRoute.replace(':id', id);
        $("#editForm").attr("action", actionUrl);
    });

 
    $("#editForm").submit(function(event) {
        event.preventDefault(); 

        var formData = new FormData(this);
        var id = $("#editid").val();
        var updateFormRoute = "{{ route('form.update', ':id') }}";
        var actionUrl = updateFormRoute.replace(':id', id); 

        $.ajax({
            url: actionUrl,
            type: "POST", 
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                "X-HTTP-Method-Override": "PUT" 
            },
            success: function(response) {
                Swal.fire({
                    title: "Success!",
                    text: "Form updated successfully!",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    $("#editFormModal").modal("hide");
                    location.reload(); 
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: "Error!",
                    text: "Something went wrong. Please try again.",
                    icon: "error"
                });
            }
        });
    });
});
</script>



<!-- Annual Report Edit Function  -->


<script>
$(document).ready(function() {
    $(".annualedit-btn").click(function() {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var status = $(this).data("status");

        // Populate modal form fields
        $("#editannual-id").val(id);
        $("#annualedit-name").val(name);
        $("#annualedit-status").val(status);
     

        var updateCircularRoute = "{{ route('annual.update', ':id') }}";
        var actionUrl = updateCircularRoute.replace(':id', id);
        $("#editAnnual").attr("action", actionUrl);
    });

 
    $("#editAnnual").submit(function(event) {
        event.preventDefault(); 

        var formData = new FormData(this);
        var id = $("#editid").val();
        var updateFormRoute = "{{ route('annual.update', ':id') }}";
        var actionUrl = updateFormRoute.replace(':id', id); 

        $.ajax({
            url: actionUrl,
            type: "POST", 
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                "X-HTTP-Method-Override": "PUT" 
            },
            success: function(response) {
                Swal.fire({
                    title: "Success!",
                    text: "Annual Report updated successfully!",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    $("#editFormModal").modal("hide");
                    location.reload(); 
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: "Error!",
                    text: "Something went wrong. Please try again.",
                    icon: "error"
                });
            }
        });
    });
});
</script>



<!-- Comment Edit Function  -->

<script>
$(document).ready(function() {
    $(".commentedit-btn").click(function() {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var status = $(this).data("status");
        var link = $(this).data("link");

        // Populate modal form fields
        $("#editcomment-id").val(id);
        $("#commentedit-name").val(name);
        $("#commentedit-status").val(status);
        $("#commentedit-link").val(link);

        var updateCircularRoute = "{{ route('comment.update', ':id') }}";
        var actionUrl = updateCircularRoute.replace(':id', id);
        $("#editComment").attr("action", actionUrl);
    });

 
    $("#editComment").submit(function(event) {
        event.preventDefault(); 

        var formData = new FormData(this);
        var id = $("#editcomment-id").val();
        var updateFormRoute = "{{ route('comment.update', ':id') }}";
        var actionUrl = updateFormRoute.replace(':id', id); 

        $.ajax({
            url: actionUrl,
            type: "POST", 
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                "X-HTTP-Method-Override": "PUT" 
            },
            success: function(response) {
                Swal.fire({
                    title: "Success!",
                    text: "Comment updated successfully!",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    $("#editCommentsModal").modal("hide");
                    location.reload(); 
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: "Error!",
                    text: "Something went wrong. Please try again.",
                    icon: "error"
                });
            }
        });
    });
});
</script>


<script>
    function confirmDelete(circularId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + circularId).submit();
            }
        });
    }
</script>


<script>
   function confirmFormDelete(formId) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + formId).submit();
        }
    });
}

</script>


<script>
   function confirmAnnualDelete(formId) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + formId).submit();
        }
    });
}

</script>