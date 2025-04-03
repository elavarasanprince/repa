@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-white d-flex justify-content-between align-items-center" style=" background: linear-gradient(to bottom, #80CD29, #1B1F23);">
        <a href="{{ route('doctor.index') }}" class="btn btn-light btn-circle me-2 text-dark" style="padding: 5px 10px; font-size: 18px; background-color: #f0f0f0 !important;">
    ←
</a>



            <h4 class="top-bar mb-0 ms-2" style="margin-bottom: 0;">Dr. {{ $doctor->doctor_name }}'s Profile</h4>
            <div class="button-group d-flex ms-auto">
                <!-- Inactive Button -->
                <form action="#" method="POST" class="me-2" id="updatePasswordForm">
    
        <button type="button" class="btn btn-danger" id="updatePasswordBtn" data-doctor-id="{{ $doctor->id }}">Update Password</button>
    </form>

    <form action="{{ route('doctor.updateStatus', $doctor->id) }}" method="POST" class="me-2">
        @csrf
        @method('PUT')
        <select name="status" class="form-select btn-warning" onchange="this.form.submit()" style="color: white;">
            <option value="active" {{ $doctor->status == 'active' ? 'selected' : '' }} style="color: black;">Active</option>
            <option value="inactive" {{ $doctor->status == 'inactive' ? 'selected' : '' }} style="color: black;">Inactive</option>
        </select>
    </form>
                <!-- Terminate Button -->
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Terminate</button>
                </form>

                <!-- <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-warning">Edit Profile</a> -->
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="updatePasswordModal" tabindex="-1" aria-labelledby="updatePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updatePasswordModalLabel">Update Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="successMessage" class="alert alert-success d-none"></div>
        <form id="updatePasswordFormModal" action="{{ route('doctor.updatePassword') }}" method="POST">
          @csrf
          @method('PUT')

          <input type="hidden" id="doctorId" name="doctor_id">

          <div class="mb-3">
            <label for="newPassword" class="form-label">New Password</label>
            <input type="password" class="form-control" id="newPassword" name="new_password" required>
          </div>
          <div class="mb-3">
            <label for="newPassword_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="newPassword_confirmation" name="new_password_confirmation" required>
          </div>
          <button type="submit" class="btn btn-danger">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>



@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


        <!-- Total Earnings Section -->
        <div class="card-body">
            <div class="card mb-4" style="background-color: #f4f4f4;">
                <div class="card-header text-dark">
                    <h5>TOTAL EARNINGS</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Consulting Fees</th>
                                    <th>Settled Fees</th>
                                    <th>Balance Fees</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>₹{{ $doctor->fees }}</td>
                                    <td>₹0</td>
                                    <td>₹{{ $doctor->fees - $doctor->settled_fees }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Payment Transfer Section -->
            <div class="card" style="background-color: #dcdcdc;">
                <div class="card-header text-dark">
                    <h5>PAYMENT TRANSFER</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="balance">Balance</label>
                                <input type="text" id="balance" class="form-control" value="₹{{ $doctor->fees - $doctor->settled_fees }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="transfer_amount">Transfer Amount</label>
                                <input type="number" id="transfer_amount" class="form-control" name="transfer_amount" min="0" max="{{ $doctor->fees - $doctor->settled_fees }}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Pay Now</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Nav Tabs -->
        <ul class="nav nav-tabs" id="doctorProfileTabs" role="tablist">
        <li class="nav-item" role="presentation">
    <button class="nav-link active d-flex align-items-center justify-content-between" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">
        <span class="d-flex align-items-center">
            <i class="fa fa-user-circle me-2" style="font-size: 18px;"></i> <!-- Profile Icon -->
            Profile
        </span>
        <a href="javascript:void(0);" class="btn btn-warning btn-sm px-2 py-1 editPatientBtn ms-2" data-id="{{ $doctor->id }}" title="Edit">
            <i class="fas fa-edit"></i> <!-- Edit Icon -->
        </a>
    </button>
</li>



    <li class="nav-item" role="presentation">
        <button class="nav-link" id="patients-tab" data-bs-toggle="tab" data-bs-target="#patients" type="button" role="tab" aria-controls="patients" aria-selected="false">
            <i class="fa fa-users" style="font-size: 18px;"></i> <!-- Patients Icon -->
            Patient Counts
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="ratings-tab" data-bs-toggle="tab" data-bs-target="#ratings" type="button" role="tab" aria-controls="ratings" aria-selected="false">
            <i class="fa fa-star" style="font-size: 18px;"></i> <!-- Ratings Icon -->
            Ratings
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">
            <i class="fa fa-box" style="font-size: 18px;"></i> <!-- Orders Icon -->
            Orders
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="fees-tab" data-bs-toggle="tab" data-bs-target="#fees" type="button" role="tab" aria-controls="fees" aria-selected="false">
            <i class="fa fa-money-bill-wave" style="font-size: 18px;"></i> <!-- Fees Icon -->
            Consulting Fees
        </button>
    </li>
</ul>

        <div class="tab-content mt-3" id="doctorProfileTabsContent">
    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="profile-header">
        <div style="width: 100px; height: 100px; overflow: hidden; border-radius: 50%; float: right; margin-right: 10px; 
    border: 5px solid; border-image: linear-gradient(45deg, #fff, #333) 1;">
    <img src="{{ isset($doctor->profile) && !empty($doctor->profile) ? asset($doctor->profile) : url('assets/new-img/avatar.jfif') }}" 
         alt="Doctor Profile" width="100" height="100" style="object-fit: cover;">
</div>






        <div class="profile-details mt-3">
    <table class="table table-bordered table-striped">
        <tbody>
       


            <tr>
                <th>Doctor Name</th>
                <td>Dr. {{ $doctor->doctor_name }}</td>
            </tr>
            <tr>
                <th>Mobile No</th>
                <td>{{ $doctor->mobile_no }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $doctor->address }}</td>
            </tr>
            <tr>
                <th>User Name</th>
                <td>{{ $doctor->user->user_name }}</td>
            </tr>
            <tr>
                <th>Speciality</th>
                <td>{{ $doctor->speciality }}</td>
            </tr>
            <tr>
                <th>Date of Joining</th>
                <td>{{ \Carbon\Carbon::parse($doctor['created_at'])->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Consulting Fees</th>
                <td>₹{{ $doctor->fees }}</td>
            </tr>
            <tr>
                <th>Commission</th>
                <td>₹{{ $doctor->commission_fees }}</td>
            </tr>
            <tr>
                <th>Bar Council No</th>
                <td>{{ $doctor->bar_council_no }}</td>
            </tr>
            <tr>
                <th>Mother Tongue</th>
                <td>{{ $doctor->mother_tongue }}</td>
            </tr>
            <tr>
                <th>Years of Experience</th>
                <td>{{ $doctor->years_of_exp }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($doctor->status == 'Active')
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>

        </div>
    </div>
    <div class="tab-pane fade" id="patients" role="tabpanel" aria-labelledby="patients-tab">
        <p><strong>Patient Counts:</strong>50</p>
    </div>
    <div class="tab-pane fade" id="ratings" role="tabpanel" aria-labelledby="ratings-tab">
        <p><strong>Ratings:</strong> {{ $doctor->rating }}/5</p>
    </div>
    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
        <p><strong>Order Counts:</strong>50</p>
    </div>
    <div class="tab-pane fade" id="fees" role="tabpanel" aria-labelledby="fees-tab">
        <p><strong>Fees:</strong> ₹{{ $doctor->fees }}</p>
    </div>
</div>

    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editPatient" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Doctor's Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for updating doctor's details -->
 <form id="editProfileForm" class="row g-3 mt-2" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" id="doctorId" name="doctor_id">
    <div class="col-md-12">
      <label class="form-label" for="doctor_name">@lang('doctor_name') <span class="text-danger">*</span></label>
      <input class="form-control @error('doctor_name') is-invalid @enderror" name="doctor_name" id="doctor_name" type="text" placeholder="Enter Your Name" required>
      <div id="doctor_name_error" class="text-danger"></div>
    </div>

    <div class="col-md-4">
      <label class="form-label" for="upload_image">@lang('upload_image')<span class="text-danger">*</span></label>
      <input class="form-control @error('upload_image') is-invalid @enderror" name="upload_image" id="upload_image" type="file" required accept=".jpeg,.jpg,.png">
      <div id="upload_image_error" class="text-danger"></div>
      <small class="form-text text-danger">Only .jpeg, .jpg, and .png files are allowed.</small>
    </div>

    <div class="col-md-4">
      <label class="form-label" for="bar_council_no">@lang('bar_council_no')<span class="text-danger">*</span></label>
      <input class="form-control @error('bar_council_no') is-invalid @enderror" name="bar_council_no" id="bar_council_no" type="text" placeholder="Enter Bar Council No" required>
      <div id="bar_council_no_error" class="text-danger"></div>
    </div>

    <div class="col-md-4">
      <label class="form-label" for="mobile_no">@lang('doctor_mobile')<span class="text-danger">*</span></label>
      <input class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" id="mobile_no" type="text" placeholder="Enter Mobile Number" required>
      <div id="mobile_no_error" class="text-danger"></div>
    </div>

    <div class="col-md-6">
      <label class="form-label" for="mother_tongue">@lang('mother_tongue')<span class="text-danger">*</span></label>
      <select class="form-control @error('mother_tongue') is-invalid @enderror" id="mother_tongue" name="mother_tongue" required>
        <option value="">Select</option>
        <option value="English">English</option>
        <option value="தமிழ்">தமிழ்</option>
        <option value="മലയാളം">മലയാളം</option>
        <option value="हिन्दी">हिन्दी</option>
        <option value="Español">Español</option>
        <option value="中文">中文</option>
        <option value="বাংলা">বাংলা</option>
        <option value="తెలుగు">తెలుగు</option>
        <option value="मराठी">मराठी</option>
        <option value="اردو">اردو</option>
        <option value="ਪੰਜਾਬੀ">ਪੰਜਾਬੀ</option>
      </select>
      <div id="mother_tongue_error" class="text-danger"></div>
    </div>

    <div class="col-md-6">
      <label class="form-label" for="address">@lang('doctor_address')<span class="text-danger">*</span></label>
      <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Enter Address" required></textarea>
      <div id="address_error" class="text-danger"></div>
    </div>

    <div class="col-md-6">
      <label class="form-label" for="speciality">@lang('speciality')<span class="text-danger">*</span></label>
      <input class="form-control @error('speciality') is-invalid @enderror" name="speciality" id="speciality" type="text" placeholder="Enter Speciality" required>
      <div id="speciality_error" class="text-danger"></div>
    </div>

    <div class="col-md-6">
      <label class="form-label" for="years_of_exp">@lang('years_of_exp')<span class="text-danger">*</span></label>
      <input class="form-control @error('years_of_exp') is-invalid @enderror" name="years_of_exp" id="years_of_exp" type="number" min="0" placeholder="Enter Years Of Experience" value="0" required>
      <div id="years_of_exp_error" class="text-danger"></div>
    </div>

    <div class="col-md-4">
      <label class="form-label" for="fees">@lang('doctor_fees')<span class="text-danger">*</span></label>
      <input class="form-control @error('fees') is-invalid @enderror" name="fees" id="fees" type="number" placeholder="Enter Fees Amount" value="0" required>
      <div id="fees_error" class="text-danger"></div>
    </div>

    <div class="col-md-4">
      <label class="form-label" for="commission_fees">@lang('commission_fees')<span class="text-danger">*</span></label>
      <input class="form-control @error('commission_fees') is-invalid @enderror" name="commission_fees" id="commission_fees" type="number" placeholder="Enter Commission Amount" value="0" required>
      <div id="commission_fees_error" class="text-danger"></div>
    </div>

    <div class="col-md-4">
      <label class="form-label" for="description">@lang('description')<span class="text-danger">*</span></label>
      <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Enter Description" required></textarea>
      <div id="description_error" class="text-danger"></div>
    </div>

    <div class="col-md-6">
      <label class="form-label" for="user_name">@lang('doctor_username')<span class="text-danger">*</span></label>
      <input class="form-control @error('user_name') is-invalid @enderror" name="user_name" id="user_name" type="text" placeholder="Enter Email" required>
      <div id="user_name_error" class="text-danger"></div>
    </div>

   

    

    <div class="col-12">
    <button class="btn" style="background-color: #1B1F23; color: #ffffff; border: none;" id="submitDoctorForm" type="button">@lang('Save')</button>
    </div>
  </form>
            </div>
        </div>
    </div>
</div>


@endsection

<style>
/* Nav Tabs Styles */
.nav-tabs .nav-link {
    font-weight: bold;
    text-transform: uppercase;
    background-color: #f8f9fa;
    color: #495057;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: background-color 0.3s, color 0.3s;
}

.nav-tabs .nav-link:hover {
    background-color: #e2e6ea;
    color: #80CD29;
}

.nav-tabs .nav-link.active {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
}

.tab-content {
    border: 1px solid #dee2e6;
    border-top: none;
    padding: 20px;
    background: #ffffff;
    border-radius: 0.25rem;
}

.tab-content p {
    font-size: 16px;
    color: #495057;
}

.table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.table td {
    font-size: 16px;
    color: #495057;
}

form {
    margin-top: 20px;
}

.form-control {
    font-size: 16px;
    padding: 10px;
}

.btn-success {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
}

.terminate-btn {
    display: flex;
    justify-content: space-between; /* Space between the buttons */
    width: 300px; /* Set a fixed width to control the space between the buttons */
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1000;
}

.terminate-btn .btn {
    font-size: 16px;
    padding: 10px 20px;
    border-radius: 5px;
    width: 130px;  /* Ensure both buttons have the same width */
}

.top-bar{
    font-size: 30px;
    color:white;
}

.btn-sm {
        min-width: 100px;  /* Ensure both buttons are the same width */
    }

    .button-group {
    display: flex;
    align-items: center;
}

.button-group form {
    margin-right: 10px;
}

.btn-circle:hover {
        background-color: #6fa3ef; /* Change the background color on hover */
        color: white; /* Change the arrow color to white on hover */
    }

    .arrow-button {
    padding: 5px 10px;
    font-size: 18px;
    background-color: #f0f0f0; /* Set the background color */
    border-radius: 50%; /* If you want to keep the circle shape */
}

.table th {
    width: 30%;
    text-align: left;
    background-color: #f8f9fa;
    font-weight: bold;
}

.table td {
    text-align: left;
}


</style>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.all.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('updatePasswordBtn').addEventListener('click', function () {
        var doctorId = this.getAttribute('data-doctor-id');
        document.getElementById('doctorId').value = doctorId;

        var myModal = new bootstrap.Modal(document.getElementById('updatePasswordModal'), {
            keyboard: false
        });
        myModal.show();
    });

    document.getElementById('updatePasswordFormModal').addEventListener('submit', function (event) {
        event.preventDefault();

        var form = this;
        var newPassword = document.getElementById('newPassword').value;
        var confirmPassword = document.getElementById('newPassword_confirmation').value;

        if (newPassword !== confirmPassword) {
            alert('Passwords do not match!');
            return;
        }

        // Submit the form using AJAX
        var formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                var successMessage = document.getElementById('successMessage');
                successMessage.textContent = data.success;
                successMessage.classList.remove('d-none');

                // Clear form fields
                form.reset();

                // Optionally hide the modal after a delay
                setTimeout(() => {
                    var myModalEl = document.getElementById('updatePasswordModal');
                    var modal = bootstrap.Modal.getInstance(myModalEl);
                    modal.hide();
                }, 2000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});






$(document).ready(function () {
    // Edit button click event
    $(document).on('click', '.editPatientBtn', function() {
        var doctorId = $(this).data('id'); // Get the doctor ID from the button's data-id attribute
        console.log("doctorId", doctorId);
        
        // Set the doctorId in the hidden input
        $('#doctorId').val(doctorId);  // This will set the value for the hidden input field
        
        // Prepare the edit URL
        var editUrl = "{{ route('doctor.edit', ':id') }}".replace(':id', doctorId);

        // Make an AJAX request to fetch the doctor details
        $.ajax({
            url: editUrl,
            type: 'GET',
            success: function(response) {
                if (response) {
                    // Open the modal and populate form fields with the fetched data
                    $('#editPatient').modal('show');
                    $('#mother_tongue').val(response.mother_tongue);
                    $('#user_name').val(response.user.user_name);
                    $('#address').val(response.address);
                    $('#speciality').val(response.speciality);
                    $('#years_of_exp').val(response.years_of_exp);
                    $('#fees').val(response.fees);
                    $('#commission_fees').val(response.commission_fees);
                    $('#description').val(response.description);
                    $('#mobile_no').val(response.mobile_no);
                    $('#bar_council_no').val(response.bar_council_no);
                    $('#doctor_name').val(response.doctor_name);
                    $('#upload_image').val(response.profile);  // Editable image URL
                }
            },
            error: function(xhr) {
                alert('Error fetching doctor details');
            }
        });
    });

    // Form submission logic
    $('#submitDoctorForm').click(function(e) {
        e.preventDefault();

        // Get the doctor ID from the hidden input field
        var doctorId = $('#doctorId').val();
        console.log("doctorId", doctorId);

        // Prepare the form data
        let formData = new FormData($('#editProfileForm')[0]);
        formData.append('_method', 'PUT');  // If you want to make it a PUT request for update

        // Prepare the update URL
        var updateUrl = "{{ route('doctor.update', ':id') }}".replace(':id', doctorId);

        // Make the AJAX request to update the doctor's profile
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
                            $('#editPatient').modal('hide');
                            location.reload(); // Reload the page to reflect the changes
                        }
                    });
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    // Show validation error messages
                    $('#doctor_name_error').text(errors.doctor_name ? errors.doctor_name[0] : '');
                    $('#upload_image_error').text(errors.upload_image ? errors.upload_image[0] : '');
                    $('#bar_council_no_error').text(errors.bar_council_no ? errors.bar_council_no[0] : '');
                    $('#mobile_no_error').text(errors.mobile_no ? errors.mobile_no[0] : '');
                    $('#mother_tongue_error').text(errors.mother_tongue ? errors.mother_tongue[0] : '');
                    $('#address_error').text(errors.address ? errors.address[0] : '');
                    $('#speciality_error').text(errors.speciality ? errors.speciality[0] : '');
                    $('#years_of_exp_error').text(errors.years_of_exp ? errors.years_of_exp[0] : '');
                    $('#fees_error').text(errors.fees ? errors.fees[0] : '');
                    $('#commission_fees_error').text(errors.commission_fees ? errors.commission_fees[0] : '');
                    $('#description_error').text(errors.description ? errors.description[0] : '');
                    $('#user_name_error').text(errors.user_name ? errors.user_name[0] : '');
                }
            }
        });
    });
});








</script>
