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

    <div class="breadcrumb-wrapper bg-cover-mart" style="background-image: url('assets/img/breadcrumb.jpg');">

        <div class="container">
            <div class="page-heading">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">My Profile</h1>
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
                   Profile
                    </li>
                </ul>
            </div>
        </div>
    </div>



   <section class="ptb-100">
   <div class="container">
       <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <!--<div class="left-content"><span class="main-content-title mg-b-0 mg-b-lg-1 text-center">My Profile</span></div>-->
                <div class="justify-content-center mt-2">
                   
                </div>
            </div>
            <!-- /breadcrumb -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body d-md-flex">
                            <!--<div class="">-->
                            <!--    <span class="profile-image position-relative"> <img class="br-5" alt="" src="https://spruko.com/demo/nowa/dist/assets/images/faces/profile.jpg" /> <span class="bg-success text-white wd-1 ht-1 rounded-pill profile-online"></span> </span>-->
                            <!--</div>-->
                            <div class="my-md-auto mt-4 prof-details">
                                <h4 class="font-weight-semibold ms-md-4 ms-0 mb-3 pb-0">Name: {{ Auth::user()->name }}</h4>

                                <p class="text-muted ms-md-4 ms-0 mb-2">
                                    <span><i class="fa fa-phone me-2"></i></span><span class="font-weight-semibold text me-2">Phone:</span><span>{{ $profile->contactno }}</span>
                                </p>
                                <p class="text-muted ms-md-4 ms-0 mb-2">
                                    <span><i class="fa fa-envelope me-2"></i></span><span class="font-weight-semibold text me-2">Email:</span><span>{{ $profile->email }}</span>
                                </p>
                              
                            </div>
                        </div>
                        <div class="card-footer py-0">
                            <div class="profile-tab tab-menu-heading border-bottom-0">
                                <nav class="nav main-nav-line p-0 tabs-menu profile-nav-line border-0 br-5 mb-0" role="tablist">
                                    <a class="nav-link mb-2 mt-2 active" data-bs-toggle="tab" href="#about" aria-selected="true" role="tab">About</a>
                                    <a class="nav-link mb-2 mt-2" data-bs-toggle="tab" href="#edit" aria-selected="false" tabindex="-1" role="tab">Edit Profile</a>
                                    <a class="nav-link mb-2 mt-2" data-bs-toggle="tab" href="#invoice" aria-selected="false" tabindex="-1" role="tab">Invoice</a>

                                   
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12 col-md-12">
                    <div class="custom-card main-content-body-profile">
                        <div class="tab-content">
                            <div class="main-content-body tab-pane p-0 border-0 active" id="about" role="tabpanel">
                                <div class="card">
                                    <div class="card-body p-0 border-0 p-0 rounded-10">
                                        <div class="p-4">
                                           
  <h3 class="text-success">{{ session('success') }}</h3>
                                           <div class="container mt-4">


<div class="card">
    
    
        <div class="card-header text-white d-flex justify-content-between align-items-center" style=" background: linear-gradient(to bottom, #80CD29, #1B1F23);">
      
    
</a>





<h4 class="top-bar mb-0 ms-2 text-white" style="margin-bottom: 0;text-transform: capitalize;">
    {{ $profile->member_name }}'s Profile
</h4>

<div class="button-group d-flex ms-auto">
@if($profile->fees->isNotEmpty() && $profile->fees->first()->status == 'active') 
    <span class="badge bg-primary text-white p-2">APPROVED</span>
    @elseif($profile->fees->isNotEmpty() && $profile->fees->first()->status == 'pending') 
    <span class="badge bg-warning  text-white p-2">Pending</span>
@else
    <span class="badge bg-danger text-white p-2">Denied</span>
@endif

</div>






        </div>
    </div>




        <!-- Nav Tabs -->
        <ul class="nav nav-tabs" id="patientProfileTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">
            <i class="fa fa-user-circle" style="font-size: 18px;"></i> <!-- Profile Icon -->

            BASIC DATA OF THE RENEWABLE <br> ENERGY GENERATOR

        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="patients-tab" data-bs-toggle="tab" data-bs-target="#patients" type="button" role="tab" aria-controls="patients" aria-selected="false">
            <i class="fa fa-calendar-alt" style="font-size: 18px;"></i> <!-- Patients Icon -->

            DETAILS OF  PRIMARY <br> POINT OF  CONTACT (POC)

        </button>
    </li>

    <li class="nav-item" role="presentation">
        <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">
            <i class="fa fa-box" style="font-size: 18px;"></i> <!-- Orders Icon -->

            DETAILS OF SECONDARY <br>POINT OF CONTACT (SPOC)

        </button>
    </li>

    <li class="nav-item" role="presentation">
        <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#ratings" type="button" role="tab" aria-controls="orders" aria-selected="false">
            <i class="fa fa-box" style="font-size: 18px;"></i> <!-- Orders Icon -->


            BRIEF BUSINESS<br> PROFILE


        </button>
    </li>
    
    

</ul>

        <div class="tab-content mt-3" id="patientProfileTabsContent">
    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="profile-header">
        <!-- <div class="profile-image">

    <img src="{{ $profile->profile ? asset('storage/' . $profile->profile) : asset('images/default-avatar.png') }}" alt="Doctor's Profile" class="img-fluid rounded-circle" width="150" height="150">
</div> -->


<div class="profile-details mt-3">
  

    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th>Name</th>
                <td>{{ $profile->member_name }}</td>
            </tr>

            <tr>
                <th>Father Name</th>
                <td>{{ $profile->father_name }}</td>
            </tr>

            <tr>
                <th>Aadhar Number</th>
                <td>{{ $profile->aadhar_number   }}</td>
            </tr>
            <tr>
                <th>Designation</th>
                <td>{{ $profile->designation }}</td>
            </tr>

            <tr>
                <th>Business Name of the Concern/ Firm/ Company</th>
                <td>{{ $profile->oftheCompany }}</td>
            </tr>



                <th>Address of the Concern/ Firm/ Company</th>
                <td>{{ $profile->address }}</td>
            </tr>
            <tr>
                <th>Pincode</th>
                <td>{{ $profile->pincode }}</td>
            </tr>


            <tr>
                <th>District</th>
                <td>{{ $profile->district }}</td>
            </tr>


            <tr>
                <th>GSTIN</th>
                <td>{{ $profile->gstin }}</td>
            </tr>

            <tr>
                <th>URL</th>
                <td>{{ $profile->url }}</td>
            </tr>

            <tr>
                <th>EMAIL</th>
                <td>{{ $profile->email }}</td>
            </tr>

            <tr>
                <th>Contact No</th>
                <td>{{ $profile->contactno }}</td>
            </tr>

            <tr>
                <th> REPA’s WhatsApp Group</th>
                <td>{{ $profile->whatsappgrp }}</td>
            </tr>

            <tr>
                <th> WhatsApp Number</th>
                <td>{{ $profile->wcontact }}</td>
            </tr>

            <tr>
                <th> Existing Member of TASMA</th>
                <td>{{ $profile->menbertasma }}</td>
            </tr>


            <!-- <tr>
                <th>Status</th>
                <td>
                    @if($profile->status == 'active')
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
            </tr> -->
        </tbody>
    </table>
</div>

        </div>
    </div>
    <div class="tab-pane fade" id="patients" role="tabpanel" aria-labelledby="patients-tab">
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th>Name of the Primary Point of Contact (POC)</th>
                <td>{{ $profile->primary_name }}</td>
            </tr>

            <tr>
                <th>Designation of the POC</th>
                <td>{{ $profile->designation_poc }}</td>
            </tr>

            <tr>
                <th>Contact No. of the POC</th>
                <td>{{ $profile->contact_poc   }}</td>
            </tr>
            <tr>
                <th>E-Mail ID of the POC</th>
                <td>{{ $profile->email_poc }}</td>
            </tr>

            <tr>
                <th>Whether he has to be a part of REPA’s WhatsApp Group?</th>
                <td>{{ $profile->pwhatsappgrps }}</td>
            </tr>



                <th>WhatsApp No.</th>
                <td>{{ $profile->wscontact_poc }}</td>
            </tr>


        </tbody>
    </table>
    </div>

    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th>Name of the Secondary Point of Contact (SPOC)</th>
                <td>{{ $profile->secondary_name }}</td>
            </tr>

            <tr>
                <th>Designation of the SPOC</th>
                <td>{{ $profile->secondary_designation }}</td>
            </tr>

            <tr>
                <th>Contact No. of the SPOC</th>
                <td>{{ $profile->contact_spoc   }}</td>
            </tr>
            <tr>
                <th>E-Mail ID of the SPOC</th>
                <td>{{ $profile->spoc_email }}</td>
            </tr>

            <tr>
                <th>Whether he has to be a part of REPA’s WhatsApp Group?</th>
                <td>{{ $profile->secondarydta }}</td>
            </tr>



                <th>WhatsApp No.</th>
                <td>{{ $profile->wspcontact }}</td>
            </tr>


        </tbody>
    </table>
    </div>

    <div class="tab-pane fade" id="ratings" role="tabpanel" aria-labelledby="ratings-tab">
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th>Sector in which your existing Business activity belongs to?</th>
                <td>{{ $profile->business_activity }}</td>
            </tr>

            <tr>
                <th>Position in RE Industry</th>
                <td>{{ $profile->position_re }}</td>
            </tr>



        </tbody>
    </table>
</div>
<div class="tab-pane fade" id="fees" role="tabpanel" aria-labelledby="fees-tab">
    @if ($profile->fees->isNotEmpty())
        <!-- Display Existing Fee Details -->
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <div class="container mt-3">
            <h4 class="mb-2">INSTALLED CAPACITY IN MEGA WATT</h4>
           <table class="table table-bordered">
    <thead>
        <tr>
            <th>Energy Type</th>
            <th>Capacity (MW)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($profile->fees as $fee)
            <tr>
                <td>Wind Energy Generator</td>
                <td>{{ $fee->wind_energy }}</td>
            </tr>
            <tr>
                <td>Solar Energy Generator (AC Capacity Only) - 1</td>
                <td>{{ $fee->solar_energy }}</td>
            </tr>
            <tr>
                <td>Solar Energy Generator (AC Capacity Only) - 2</td>
                <td>{{ $fee->solar_energy_2 }}</td>
            </tr>
            <tr>
                <td>Other Types of RE Industry</td>
                <td>{{ $fee->other_re }}</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>{{ $fee->total }}</td>
            </tr>
        @endforeach
    </tbody>
</table>



            
          


        </div>
        
    @else
        <!-- Show Form If No Fees Exist -->
        
    @endif
</div>


                                           
                                        </div>     </div>     </div>

                                        <div class="border-top"></div>
                                        
                                        <div class="border-top"></div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="main-content-body tab-pane p-0 border-0" id="edit" role="tabpanel">
                                <div class="card">
                                    <div class="card-body border-0">
                                    
                                          <ul class="nav nav-tabs" id="patientProfileTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#edit_tab1" type="button" role="tab" aria-controls="edit_tab1" aria-selected="true">
            <i class="fa fa-user-circle" style="font-size: 18px;"></i> <!-- Profile Icon -->

            BASIC DATA OF THE RENEWABLE <br> ENERGY GENERATOR

        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#edit_tab2" type="button" role="tab" aria-controls="edit_tab2" aria-selected="false">
            <i class="fa fa-calendar-alt" style="font-size: 18px;"></i> <!-- Patients Icon -->

            DETAILS OF  PRIMARY <br> POINT OF  CONTACT (POC)

        </button>
    </li>

    <li class="nav-item" role="presentation">
        <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#edit_tab3" type="button" role="tab" aria-controls="edit_tab3" aria-selected="false">
            <i class="fa fa-box" style="font-size: 18px;"></i> <!-- Orders Icon -->

            DETAILS OF SECONDARY <br>POINT OF CONTACT (SPOC)

        </button>
    </li>

    <li class="nav-item" role="presentation">
        <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#edit_tab4" type="button" role="tab" aria-controls="edit_tab4" aria-selected="false">
            <i class="fa fa-box" style="font-size: 18px;"></i> <!-- Orders Icon -->


            BRIEF BUSINESS<br> PROFILE


        </button>
    </li>
    
    

</ul>
 <form action="{{ route('profile.update', $profile->id) }}" method="POST">
    @csrf
    @method('POST')
<div class="tab-content mt-3" id="patientProfileTabsContent">
    
   
<div class="tab-pane fade show active" id="edit_tab1" role="tabpanel" aria-labelledby="tabl-tab">
     <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th>Name</th>
                <td><input type="text" class="form-control" name="member_name" value="{{ $profile->member_name }}">
                    
                    </td>
            </tr>

            <tr>
                <th>Father Name</th>
                <td> <input type="text" class="form-control" name="father_name" value="{{ $profile->father_name }}"></td>
               
               
            </tr>

            <tr>
                <th>Aadhar Number</th>
                <td>
<input type="text" class="form-control" name="aadhar_number" value="{{ $profile->aadhar_number }}">
                    
                    </td>
            </tr>
            <tr>
                <th>Designation</th>
                
               <td> <input type="text" class="form-control" name="designation" value="{{ $profile->designation }}">
               </td>
            </tr>

            <tr>
                <th>Business Name of the Concern/ Firm/ Company</th>
                
                  <td> <input type="text" class="form-control" name="oftheCompany" value="{{ $profile->oftheCompany }}">
               </td>
               
            </tr>



                <th>Address of the Concern/ Firm/ Company</th>
                
                 <td> <input type="text" class="form-control" name="address" value="{{ $profile->address }}">
               </td>
               
                
            </tr>
            <tr>
                <th>Pincode</th>
                  <td> <input type="text" class="form-control" name="pincode" value="{{ $profile->pincode }}">
               </td>
               
             
            </tr>


            <tr>
                <th>District</th>
                  <td> <input type="text" class="form-control" name="district" value="{{ $profile->district }}">
               </td>
                
            </tr>


            <tr>
                <th>GSTIN</th>
                
                  <td> <input type="text" class="form-control" name="gstin" value="{{ $profile->gstin }}">
               </td>
            </tr>

            <tr>
                <th>URL</th>
                 <td> <input type="text" class="form-control" name="url" value="{{ $profile->url }}">
               </td>
              
            </tr>

           <tr>
    <th>EMAIL</th>
    <td>
        <input type="email" class="form-control" name="email" value="{{ $profile->email }}">
    </td>
</tr>

<tr>
    <th>Contact No</th>
    <td>
        <input type="text" class="form-control" name="contactno" value="{{ $profile->contactno }}">
    </td>
</tr>

<tr>
    <th>REPA’s WhatsApp Group</th>
    <td>
        <input type="radio" name="whatsappgrp" value="Yes" id="whatsappYes"
            {{ $profile->whatsappgrp == 'Yes' ? 'checked' : '' }} onclick="toggleWhatsAppField()"> Yes
        <input type="radio" name="whatsappgrp" value="No" id="whatsappNo"
            {{ $profile->whatsappgrp == 'No' ? 'checked' : '' }} onclick="toggleWhatsAppField()"> No
    </td>
</tr>
<tr id="whatsappRow">
    <th>WhatsApp Number</th>
    <td>
        <input type="text" class="form-control" name="wcontact" id="wcontactField" value="{{ $profile->wcontact }}">
    </td>
</tr>
<script>
    function toggleWhatsAppField() {
        let yesRadio = document.getElementById("whatsappYes");
        let whatsappRow = document.getElementById("whatsappRow");

        if (yesRadio.checked) {
            whatsappRow.style.display = "table-row";
        } else {
            whatsappRow.style.display = "none";
        }
    }

    // Run on page load to set the correct initial state
    document.addEventListener("DOMContentLoaded", function() {
        toggleWhatsAppField();
    });
</script>
<tr>
    <th>Existing Member of TASMA</th>
    <td>
        <input type="radio" name="menbertasma" value="Yes" 
            {{ $profile->menbertasma == 'Yes' ? 'checked' : '' }}> Yes
        <input type="radio" name="menbertasma" value="No" 
            {{ $profile->menbertasma == 'No' ? 'checked' : '' }}> No
    </td>
</tr>




          
        </tbody>
    </table>
</div>

<div class="tab-pane fade" id="edit_tab2" role="tabpanel" aria-labelledby="tab2-tab">
   

        <div class="container mt-3">
           
        <table class="table table-bordered table-striped">
    <tbody>
        <tr>
            <th>Name of the Primary Point of Contact (POC)</th>
            <td>
                <input type="text" class="form-control" name="primary_name" value="{{ $profile->primary_name }}">
            </td>
        </tr>

        <tr>
            <th>Designation of the POC</th>
            <td>
                <input type="text" class="form-control" name="designation_poc" value="{{ $profile->designation_poc }}">
            </td>
        </tr>

        <tr>
            <th>Contact No. of the POC</th>
            <td>
                <input type="text" class="form-control" name="contact_poc" value="{{ $profile->contact_poc }}">
            </td>
        </tr>

        <tr>
            <th>E-Mail ID of the POC</th>
            <td>
                <input type="email" class="form-control" name="email_poc" value="{{ $profile->email_poc }}">
            </td>
        </tr>

      <tr>
   <tr>
    <th>Whether he has to be a part of REPA’s WhatsApp Group?</th>
    <td>
        <input type="radio" name="pwhatsappgrps" value="on" 
            {{ $profile->pwhatsappgrps == 'on' ? 'checked' : '' }} onclick="toggleWhatsAppRow()"> Yes
        <input type="radio" name="pwhatsappgrps" value="no" 
            {{ $profile->pwhatsappgrps == 'no' ? 'checked' : '' }} onclick="toggleWhatsAppRow()"> No
    </td>
</tr>

<tr class="whatsapp"> 
    <th>WhatsApp No.</th>
    <td>
        <input type="text" class="form-control" name="wscontact_poc" value="{{ $profile->wscontact_poc }}">
    </td>
</tr>

<script>
    function toggleWhatsAppRow() {
        let selectedValue = document.querySelector('input[name="pwhatsappgrps"]:checked').value;
        let whatsappRow = document.querySelector('.whatsapp');

        if (selectedValue === "no") {
            whatsappRow.style.display = "none";
        } else {
            whatsappRow.style.display = "table-row";
        }
    }

    // Run on page load to ensure correct initial state
    document.addEventListener("DOMContentLoaded", function() {
        toggleWhatsAppRow();
    });
</script>
    </tbody>
</table>




            
          


        </div>
        
    
</div>


<div class="tab-pane fade" id="edit_tab3" role="tabpanel" aria-labelledby="tab3-tab">
   

        <div class="container mt-3">
           
   <table class="table table-bordered table-striped">
    <tbody>
        <tr>
            <th>Name of the Secondary Point of Contact (SPOC)</th>
            <td><input type="text" class="form-control" name="secondary_name" value="{{ $profile->secondary_name }}"></td>
        </tr>

        <tr>
            <th>Designation of the SPOC</th>
            <td><input type="text" class="form-control" name="secondary_designation" value="{{ $profile->secondary_designation }}"></td>
        </tr>

        <tr>
            <th>Contact No. of the SPOC</th>
            <td><input type="text" class="form-control" name="contact_spoc" value="{{ $profile->contact_spoc }}"></td>
        </tr>

        <tr>
            <th>E-Mail ID of the SPOC</th>
            <td><input type="email" class="form-control" name="spoc_email" value="{{ $profile->spoc_email }}"></td>
        </tr>

<tr>
            <th>Whether he has to be a part of REPA’s WhatsApp Group?</th>
            <td>
                <label>
                    <input type="radio" name="secondarydta" value="Yes" id="swhatsappYes" 
                    {{ $profile->secondarydta == 'Yes' ? 'checked' : '' }}> Yes
                </label>
                <label style="margin-left: 10px;">
                    <input type="radio" name="secondarydta" value="No" id="swhatsappNo" 
                    {{ $profile->secondarydta == 'No' ? 'checked' : '' }}> No
                </label>
            </td>
        </tr>

        <tr class="wspcontct" style="display: {{ $profile->secondarydta == 'on' ? 'table-row' : 'none' }};">
            <th>WhatsApp No.</th>
            <td><input type="text" class="form-control" name="wspcontact" value="{{ $profile->wspcontact }}"></td>
        </tr>
    </tbody>
</table>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let yesRadio = document.getElementById("swhatsappYes");
        let noRadio = document.getElementById("swhatsappNo");
        let wspRow = document.querySelector(".wspcontct");

        function whatsAppRowSecondary() {
            if (yesRadio.checked) {
                wspRow.style.display = "table-row";
            } else {
                wspRow.style.display = "none";
            }
        }

        // Ensure correct initial state when the page loads
        whatsAppRowSecondary();

        // Add event listeners for changes
        yesRadio.addEventListener("change", whatsAppRowSecondary);
        noRadio.addEventListener("change", whatsAppRowSecondary);
    });
</script>




            
          


        </div>
        
    
</div>

<div class="tab-pane fade" id="edit_tab4" role="tabpanel" aria-labelledby="tab4-tab">
   

        <div class="container mt-3">
           
     <table class="table table-bordered table-striped">
    <tbody>
        <tr>
            <th>Sector in which your existing Business activity belongs to?</th>
            <td>
                <input type="text" class="form-control" name="business_activity" value="{{ $profile->business_activity }}">
            </td>
        </tr>

        <tr>
            <th>Position in RE Industry</th>
            <td>
                <input type="text" class="form-control" name="position_re" value="{{ $profile->position_re }}">
            </td>
        </tr>
    </tbody>
</table>


<script>
    function toggleWhatsAppField() {
        let selectedValue = document.querySelector('input[name="pwhatsappgrps"]:checked').value;
        let whatsappField = document.querySelector(".whatsapp-field");
        
        if (selectedValue === "on") {
            whatsappField.style.display = "table-row";
        } else {
            whatsappField.style.display = "none";
        }
    }

    // Hide WhatsApp No. field if "No" is selected on page load
    window.onload = function() {
        toggleWhatsAppField();
    };
</script>



            
          


        </div>
        
    
</div>



</div>
<div class="col-md-12">
<div clas="col-md-3 m-auto" style="
    width: 25%;
">
 <button class="theme-btn form-control">Update</button> </div></div>
</form>
                                     
                                    </div>
                                </div>
                            </div>

                            <div class="main-content-body tab-pane p-0 border-0" id="invoice" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card custom-card">
                                            <div class="card-header justify-content-between">
                                                <div class="card-title">
                                                    Manage Invoices
                                                </div>
                                                
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Client</th>
                                                                <th scope="col">Invoice ID</th>
                                                                <th scope="col">Issued Date</th>
                                                                <th scope="col">Amount</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Due Date</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="invoice-list">
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="me-2 lh-1">
                                                                            <span class="avatar avatar-sm avatar-rounded">
                                                                                <img src="https://laravelui.spruko.com/ynex/build/assets/images/faces/11.jpg" alt="">
                                                                            </span>
                                                                        </div>
                                                                        <div>
                                                                            <p class="mb-0 fw-semibold">Json Taylor</p>
                                                                            <p class="mb-0 fs-11 text-muted">jsontaylor2416@gmail.com</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0);" class="fw-semibold text-primary">
                                                                        #SPK12032901
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    25,Nov 2022
                                                                </td>
                                                                <td>
                                                                    $212.45
                                                                </td>
                                                                <td>
                                                                    <span class="badge bg-success-transparent">Paid</span>
                                                                </td>
                                                                <td>
                                                                    25,Dec 2022
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-primary-light btn-icon btn-sm"><i class="fa-solid fa-download"></i></button>
                                                                    <button class="btn btn-danger-light btn-icon ms-1 btn-sm invoice-btn"><i class="fa-solid fa-eye"></i></button>
                                                                </td>
                                                            </tr>
                                                            <tr class="invoice-list">
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="me-2 lh-1">
                                                                            <span class="avatar avatar-sm avatar-rounded">
                                                                                <img src="https://laravelui.spruko.com/ynex/build/assets/images/faces/7.jpg" alt="">
                                                                            </span>
                                                                        </div>
                                                                        <div>
                                                                            <p class="mb-0 fw-semibold">Suzika Stallone</p>
                                                                            <p class="mb-0 fs-11 text-muted">suzikastallone3214@gmail.com</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0);" class="fw-semibold text-primary">
                                                                        #SPK12032912
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    13,Nov 2022
                                                                </td>
                                                                <td>
                                                                    $512.99
                                                                </td>
                                                                <td>
                                                                    <span class="badge bg-warning-transparent">Pending</span>
                                                                </td>
                                                                <td>
                                                                    13,Dec 2022
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-primary-light btn-icon btn-sm"><i class="fa-solid fa-download"></i></button>
                                                                    <button class="btn btn-danger-light btn-icon ms-1 btn-sm invoice-btn"><i class="fa-solid fa-eye"></i></button>
                                                                </td>
                                                            </tr>
                                                            <tr class="invoice-list">
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="me-2 lh-1">
                                                                            <span class="avatar avatar-sm avatar-rounded">
                                                                                <img src="https://laravelui.spruko.com/ynex/build/assets/images/faces/15.jpg" alt="">
                                                                            </span>
                                                                        </div>
                                                                        <div>
                                                                            <p class="mb-0 fw-semibold">Roman Killon</p>
                                                                            <p class="mb-0 fs-11 text-muted">romankillon143@gmail.com</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0);" class="fw-semibold text-primary">
                                                                        #SPK12032945
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    30,Nov 2022
                                                                </td>
                                                                <td>
                                                                    $2199.49
                                                                </td>
                                                                <td>
                                                                    <span class="badge bg-danger-transparent">Overdue</span>
                                                                </td>
                                                                <td>
                                                                    30,Dec 2022
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-primary-light btn-icon btn-sm"><i class="fa-solid fa-download"></i></button>
                                                                    <button class="btn btn-danger-light btn-icon ms-1 btn-sm invoice-btn"><i class="fa-solid fa-eye"></i></button>
                                                                </td>
                                                            </tr>
                                                            <tr class="invoice-list">
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="me-2 lh-1">
                                                                            <span class="avatar avatar-sm avatar-rounded">
                                                                                <img src="https://laravelui.spruko.com/ynex/build/assets/images/faces/8.jpg" alt="">
                                                                            </span>
                                                                        </div>
                                                                        <div>
                                                                            <p class="mb-0 fw-semibold">Darla Jung</p>
                                                                            <p class="mb-0 fs-11 text-muted">darlajung555@gmail.com</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0);" class="fw-semibold text-primary">
                                                                        #SPK12032958
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    15,Oct 2022
                                                                </td>
                                                                <td>
                                                                    $2,982.99
                                                                </td>
                                                                <td>
                                                                    <span class="badge bg-success-transparent">Paid</span>
                                                                </td>
                                                                <td>
                                                                    15,Nov 2022
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-primary-light btn-icon btn-sm"><i class="fa-solid fa-download"></i></button>
                                                                    <button class="btn btn-danger-light btn-icon ms-1 btn-sm invoice-btn"><i class="fa-solid fa-eye"></i></button>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>

                                </div>
                                <!--End::row-1 -->

                            </div>


                            <div class="main-content-body tab-pane border-0 p-0" id="settings" role="tabpanel">
                                <div class="card">
                                    <div class="card-body border-0" data-select2-id="12">
                                        <form class="form-horizontal" data-select2-id="11">
                                            <div class="mb-4 main-content-label">Account</div>
                                            <div class="form-group">
                                                <div class="row row-sm">
                                                    <div class="col-md-3"><label class="form-label">User Name</label></div>
                                                    <div class="col-md-9"><input type="text" class="form-control" placeholder="User Name" value="Sonia Taylor" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row row-sm">
                                                    <div class="col-md-3"><label class="form-label">Email</label></div>
                                                    <div class="col-md-9"><input type="text" class="form-control" placeholder="Email" value="info@SoniaTaylor.in" /></div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="row row-sm">
                                                    <div class="col-md-3 col"><label class="form-label">Verification</label></div>
                                                    <div class="col-md-9 col">
                                                        <label class="ckbox mb-2"> <input class="form-check-input mt-0" type="checkbox" value="" id="flexCheckChecked7" /><span>Email</span></label>
                                                        <label class="ckbox mb-2"> <input class="form-check-input mt-0" type="checkbox" value="" id="flexCheckChecked3" checked="" /><span>SMS</span></label>
                                                        <label class="ckbox mb-2"> <input class="form-check-input mt-0" type="checkbox" value="" id="flexCheckChecked8" /><span>Phone</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">Security Settings</div>
                                            <div class="form-group">
                                                <div class="row row-sm">
                                                    <div class="col-md-3"><label class="form-label">Login Verification</label></div>
                                                    <div class="col-md-9"><a class="" href="javascript:void(0);">Settup Verification</a></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row row-sm">
                                                    <div class="col-md-3"><label class="form-label">Password Verification</label></div>
                                                    <div class="col-md-9">
                                                        <label class="ckbox mg-b-10"> <input class="form-check-input mt-0" type="checkbox" value="" id="flexCheckChecked9" /><span>Require Personal Details</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="mb-4 main-content-label">Notifications</div>
                                                <div class="form-group mb-0">
                                                    <div class="row row-sm">
                                                        <div class="col-md-3"><label class="form-label">Configure Notifications</label></div>
                                                        <div class="col-md-9">
                                                            <label class="d-block mg-b-15-f">
                                                                <input class="form-check-input mt-0" type="checkbox" value="" id="flexCheckChecked4" checked="" /> <span class="custom-switch-indicator"></span>
                                                                <span class="text-muted ms-2">Allow all Notifications</span>
                                                            </label>
                                                            <label class="d-block mg-b-15-f">
                                                                <input class="form-check-input mt-0" type="checkbox" value="" id="flexCheckChecked6" /> <span class="custom-switch-indicator"></span>
                                                                <span class="text-muted ms-2">Disable all Notifications</span>
                                                            </label>
                                                            <label class="d-block mg-b-15-f">
                                                                <input class="form-check-input mt-0" type="checkbox" value="" id="flexCheckChecked5" checked="" /> <span class="custom-switch-indicator"></span>
                                                                <span class="text-muted ms-2">Notification Sounds</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group float-end">
                                                <div class="row row-sm">
                                                    <div class="col-md-12 btn-list">
                                                        <a class="mg-r-20 btn btn-primary" href="javascript:void(0);">Deactivate Account</a> <a class="btn btn-secondary" href="javascript:void(0);">Change Password</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
   </section>





    @include('includes.footer')



@include('includes.script')

<script>
       // auth password view
   $('.password-view').on('click', function(){
    var pwd = document.getElementById('password');
    if (pwd.type === "password") {
        pwd.type = "text";
        $(this).addClass('show');
    } else {
        pwd.type = "password";
        $(this).removeClass('show');
    }
})
</script>



</body>

</html>
