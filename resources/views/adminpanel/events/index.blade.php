@extends('adminpanel/layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-10 p-0">
                    <h3>Manage Events</h3>
                </div>
                <div class="col-sm-2 p-0">
                    <div class="overflow-hidden">
                        <button class="btn  mx-auto mt-3" type="button" data-bs-toggle="modal"
                                data-bs-target="#addModel"  style="background-color: #1B1F23; color: #ffffff; border: none;">Add Events</button>
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
                    <h3 class="modal-title" id="addModel">Events Details</h3>

                    <!-- Close button on the right -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                <div class="modal-body social-profile text-start">
                    <div class="modal-toggle-wrapper">
                    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Event Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group">
    <label for="date">Event Date</label>
    <input type="date" name="date" id="eventDate" class="form-control"  required>
</div>


    <div class="form-group">
        <label for="venue">Venue</label>
        <input type="text" name="venue" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
<br>
   <div class="form-group">
    <label for="coverImageInput">Cover Image (Max: 10MB)</label>
    <input type="file" class="form-control" accept="image/png, image/jpeg" name="cover_image" id="coverImageInput" required>
    <small class="text-danger" id="fileError" style="display: none; margin-top: 3px;"></small>
</div>
    
   
    <br>

    <div class="form-group">
        <label for="event_images">Event Images (Multiple)</label>
        <input type="file" id="event_images" name="event_images[]" accept="image/png, image/jpeg, image/jpg" class="form-control" multiple>
        
         <small class="text-danger" id="fileError1" style="display: none;margin-top: 3px;">Only PNG and JPEG images are allowed.</small>
    </div>
    
<script>
document.getElementById('coverImageInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const maxSize = 10 * 1024 * 1024; // 10MB in bytes
    const allowedTypes = ['image/png', 'image/jpeg'];
    let errorMessage = '';

    if (file) {
        if (!allowedTypes.includes(file.type)) {
            errorMessage = 'Only PNG and JPEG images are allowed.';
        } else if (file.size > maxSize) {
            errorMessage = 'Image size must be 10MB or less.';
        }

        const errorElement = document.getElementById('fileError');

        if (errorMessage) {
            errorElement.textContent = errorMessage;
            errorElement.style.display = 'block';
            event.target.value = ''; // Clear the file input
        } else {
            errorElement.style.display = 'none';
        }
    }
});
</script>

<script>
document.getElementById('event_images').addEventListener('change', function(event) {
    const files = event.target.files;
    const maxTotalSize = 100 * 1024 * 1024; // 100MB in bytes
    const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
    let totalSize = 0;
    let errorMessage = '';

    for (let i = 0; i < files.length; i++) {
        if (!allowedTypes.includes(files[i].type)) {
            errorMessage = 'Only PNG and JPEG images are allowed.';
            break;
        }
        totalSize += files[i].size;
    }

    if (totalSize > maxTotalSize) {
        errorMessage = 'Total upload size must be 100MB or less.';
    }

    const errorElement = document.getElementById('fileError1');

    if (errorMessage) {
        errorElement.textContent = errorMessage;
        errorElement.style.display = 'block';
        event.target.value = ''; // Clear the file input
    } else {
        errorElement.style.display = 'none';
    }
});
</script>

<br>

    <button type="submit mt-5" class="btn btn-success">Create Event</button>
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
                <h3 class="modal-title" id="editeventsLabel">Edit events Details</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body for Edit events -->
            <div class="modal-body social-profile text-start">
              <form id="editeventsForm" action="" method="POST" enctype="multipart/form-data">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" id="events_id" name="events_id">

    <div class="mb-3">
        <label for="event_name" class="form-label">Event Name</label>
        <input type="text" class="form-control" id="event_name" name="title">
    </div>

    <div class="mb-3">
        <label for="event_date" class="form-label">Event Date</label>
        <input type="date" class="form-control" id="event_date" name="date">
    </div>

    <div class="mb-3">
        <label for="event_venue" class="form-label">Event Venue</label>
        <input type="text" class="form-control" id="event_venue" name="venue">
    </div>

    <!-- Cover Image -->
   <div class="mb-3">
    <label for="coverImageInputedit">Cover Image (Max: 10MB)</label><br>
    <input type="file" class="form-control" accept="image/png, image/jpeg" name="cover_image" id="coverImageInputedit">
    <br>
    <img id="coverImagePreview" src="" alt="Cover Image" width="100" style="display:none; margin-top:10px; border:1px solid #ccc; padding:5px;"> <!-- Cover Image Preview -->
    <small class="text-danger" id="fileErroredit1" style="display: none;"></small>
</div>



    <!-- Event Images -->
    <div class="mb-3">
        <label class="form-label">Event Images</label><br>
    <!--<img id="eventImagesPreview" src="" alt="Event Image" width="100" style="display: none;">-->


        <input type="file" class="form-control" accept="image/png, image/jpeg, image/jpg" id="event_imagesedit" name="event_images[]" multiple>
    </div>
    
         <small class="text-danger" id="fileErroredit" style="display: none;">Only PNG and JPEG images are allowed.</small>
    <button type="submit" class="btn btn-primary">Update Event</button>
</form>

<script>
document.getElementById('coverImageInputedit').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const maxSize = 10 * 1024 * 1024; // 10MB in bytes
    const allowedTypes = ['image/png', 'image/jpeg'];
    let errorMessage = '';

    if (file) {
        if (!allowedTypes.includes(file.type)) {
            errorMessage = 'Only PNG and JPEG images are allowed.';
        } else if (file.size > maxSize) {
            errorMessage = 'Image size must be 10MB or less.';
        }

        const errorElement = document.getElementById('fileErroredit1');
        const previewImage = document.getElementById('coverImagePreview');

        if (errorMessage) {
            errorElement.textContent = errorMessage;
            errorElement.style.display = 'block';
            event.target.value = ''; // Clear the file input
            previewImage.style.display = 'none'; // Hide preview
        } else {
            errorElement.style.display = 'none';

            // Display the preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }
});
</script>



<script>
document.getElementById('event_imagesedit').addEventListener('change', function(event) {
    const files = event.target.files;
    const maxTotalSize = 100 * 1024 * 1024; // 100MB in bytes
    const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
    let totalSize = 0;
    let errorMessage = '';

    for (let i = 0; i < files.length; i++) {
        if (!allowedTypes.includes(files[i].type)) {
            errorMessage = 'Only PNG and JPEG images are allowed.';
            break;
        }
        totalSize += files[i].size;
    }

    if (totalSize > maxTotalSize) {
        errorMessage = 'Total upload size must be 100MB or less.';
    }

    const errorElement = document.getElementById('fileErroredit');

    if (errorMessage) {
        errorElement.textContent = errorMessage;
        errorElement.style.display = 'block';
        event.target.value = ''; // Clear the file input
    } else {
        errorElement.style.display = 'none';
    }
});
</script>




            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function () {

    $('.commentedit-btn').on('click', function () {
        let eventId = $(this).data('id');
        let eventName = $(this).data('name');
        let eventDate = $(this).data('date');
        let eventVenue = $(this).data('venue');
        let coverImage = $(this).data('cover_image'); 
        let eventImages = $(this).attr('data-event_images'); 

        // Ensure eventImages is parsed properly
        try {
            eventImages = eventImages ? JSON.parse(eventImages) : [];
        } catch (error) {
            console.error("Error parsing eventImages:", error);
            eventImages = [];
        }

        console.log("Event Images:", eventImages); // Debugging

        // Set form action dynamically
        var updateEventsRoute = "{{ route('events.update', ':id') }}";
        var actionUrl = updateEventsRoute.replace(':id', eventId);
        $("#editeventsForm").attr("action", actionUrl);

        // Set form values
        $('#events_id').val(eventId);
        $('#event_name').val(eventName);
        $('#event_date').val(eventDate);
        $('#event_venue').val(eventVenue);

        // Update cover image preview
        if (coverImage) {
            $('#coverImagePreview').attr('src', coverImage).show();
        } else {
            $('#coverImagePreview').hide();
        }

        // Clear previous images
        $('#eventImagesPreview').empty();

        // Display multiple event images
        if (eventImages.length > 0) {
            $('#eventImagesPreview').show(); // Make sure it's visible
            eventImages.forEach(image => {
                let imgElement = `<img src="{{ asset('storage/app/public/') }}/${image}" alt="Event Image" width="100" class="me-2 mb-2">`;
                $('#eventImagesPreview').append(imgElement);
            });
        } else {
            $('#eventImagesPreview').hide(); // Hide if no images
        }
    });




    // Handle form submission via AJAX
    $("#editeventsForm").submit(function (e) {
        e.preventDefault(); // Prevent default form submission

        let formData = new FormData(this);
        let actionUrl = $(this).attr("action");

        $.ajax({
            url: actionUrl,
            type: 'POST',  // Laravel expects PUT or PATCH
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-HTTP-Method-Override': 'PUT' // Ensures Laravel treats it as a PUT request
            },
             success: function(response) {
                Swal.fire({
                    title: "Success!",
                    text: "Events updated successfully!",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    $("#editCommentsModal").modal("hide");
                    location.reload(); 
                });
            },
            error: function (xhr) {
                alert("Error updating event!");
            }
        });
    });
});



</script>
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

                </div>

                <div class="table-responsive custom-scrollbar">


                <table id="EventsTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>SNo.</th>
            <th>Cover Image</th>
            <th>Event Images</th>
            <th>Event Title</th>
            <th>Date</th>
            <th>Venue</th>
            <th>Description</th>
              <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $index => $event)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                @if($event->cover_image)
                    <img src="{{ asset('storage/app/public/' . $event->cover_image) }}" alt="Cover Image" width="100">
                @else
                    No Cover Image
                @endif
            </td>
            <td>
                @if($event->event_images)
                    @foreach(json_decode($event->event_images) as $image)
                        <img src="{{ asset('storage/app/public/' . $image) }}" alt="Event Image" width="100">
                    @endforeach
                @else
                    No Event Images
                @endif
            </td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->date }}</td>
            <td>{{ $event->venue }}</td>
            <td>{{ $event->description }}</td>
             <td>
                <!-- Edit Button (Pass Data) -->
       <button class="btn btn-sm btn-warning commentedit-btn"
    data-id="{{ $event->id }}"
    data-name="{{ $event->title }}"
    data-date="{{ $event->date }}"
    data-venue="{{ $event->venue }}"
    data-cover_image="{{ asset('storage/app/public/' . $event->cover_image) }}"
        data-event_images="{{ json_encode($event->event_images) }}"


    data-bs-toggle="modal"
    data-bs-target="#editevents">
    <i class="fas fa-edit"></i> <!-- Edit Icon -->
</button>


<form id="delete-form-{{ $event->id }}" action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $event->id }})">
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
<!-- events Table Ends-->

<script>
    function confirmDelete(eventId) {
    if (confirm('Are you sure you want to delete this event?')) {
        document.getElementById('delete-form-' + eventId).submit();
    }
}
</script>

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


