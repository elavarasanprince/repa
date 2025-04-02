<!DOCTYPE html>
<html lang="en">

<head>
   <meta name="description" content="REPA">
   <!-- ======== Page title ============ -->
   <title>REPA | Home</title>
   <link rel="stylesheet" href="assets/css//form.css">
   @include('includes.head')
   <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.0/build/css/intlTelInput.css">
</head>

<body>
   @include('includes.header')
   <div class="breadcrumb-wrapper bg-cover-mart" style="background-image: url('assets/img/breadcrumb.jpg');">
      <div class="container">
         <div class="page-heading">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">New Member Request</h1>
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
                  New Member Request
               </li>
            </ul>
         </div>
      </div>
   </div>
   <section class="ptb-100">
      <div class="container">
         @if (session('success'))
         <div class="alert alert-success" style="background: #80c118b5;color:#fff;">
            {{ session('success') }}
         </div>
         @endif

         <form id="myForm" method="post" action="{{ route('register.member') }}">
            @csrf
            <div id="smartwizard">
               <ul class="nav">
                  <li class="nav-item">
                     <a class="nav-link" href="#step-1">
                        <div class="num">1</div>
                        BASIC DATA OF THE RENEWABLE ENERGY GENERATOR
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="#step-2">
                        <span class="num">2</span>
                        DETAILS OF PRIMARY <br> POINT OF CONTACT (POC)
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#step-3">
                        <span class="num">3</span>
                        DETAILS OF SECONDARY POINT OF CONTACT (SPOC)
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#step-4">
                        <span class="num">4</span>
                        BRIEF BUSINESS PROFILE
                     </a>
                  </li>
               </ul>
               <div class="tab-content">
                  <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                     <div class="form-column col-lg-12 col-md-12 col-sm-12 mt-4">
                        <div class="inner-column">
                           <div class="contact-form">
                              <div class="row clearfix">
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Name of the Owner/ Partner/ MD <span>(As per Aadhaar)</span> </label>
                                    <input type="text" name="member_name" id="member_name" pattern="^[a-zA-Z_](?:[a-zA-Z_ ]*[a-zA-Z])?$" minlength="3" required="">
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Father’s Name of the Owner/ Partner/ MD <span>(As per Aadhaar)</span> </label>
                                    <input type="text" name="father_name" id="father_name" pattern="^[a-zA-Z_](?:[a-zA-Z_ ]*[a-zA-Z])?$" minlength="3" required="">
                                 </div>

                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Designation of the Owners/ Partner/ MD in the Concern/ Firm/ Company </label>
                                    <select name="designation" id="designation" required>
                                       <option value="" selected disabled>Select Designation of the Member</option>
                                       <option value="Proprietor">Proprietor</option>
                                       <option value="Partner">Partner</option>
                                       <option value="MD">MD</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Business Name of the Concern/ Firm/ Company
                                    </label>
                                    <input type="text" id="oftheCompany" name="oftheCompany" minlength="3" pattern="^[a-zA-Z_ ]*$" required="">
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Address of the Concern/ Firm/ Company
                                    </label>
                                    <input type="text" id="address" name="address" minlength="10" required="">
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Pincode
                                    </label>
                                    <input type="text" name="pincode" id="pincode" pattern="^[6][0-9]{5}$" required="" oninput="this.value=this.value.replace(/\s+/g, '')">
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">District
                                    </label>
                                    <input type="text" name="district" id="district" required="">
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">GSTIN
                                    </label>
                                    <input type="text" oninput="this.value=this.value.toUpperCase()" name="gstin" id="gstin" pattern="^([0-2][0-9]|[3][0-7])[A-Z]{3}[ABCFGHLJPTK][A-Z]\d{4}[A-Z][A-Z0-9][Z][A-Z0-9]$" required="">
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Website
                                    </label>
                                    <input type="text" name="url" id="url">
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">E-Mail Id
                                    </label>
                                    <input type="email" name="email" required="">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Contact/ Mobile No.
                                    </label>
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">+91</span>
                                       </div>
                                       <input type="text" name="contactno" id="contactno" pattern="^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$" required="">
                                       @error('contactno')
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Is he willing to be a part of REPA’s WhatsApp Group?</label>

                                    <div class="auth-group check-bx">
                                       <div class="form-check">
                                          <input type="radio" id="whatsappyes" value="Yes" class="form-check-input" name="whatsappgrp" required onclick="toggleWhatsAppInput(true)">
                                          <label for="whatsappyes"> Yes</label>
                                       </div>
                                       <div class="form-check">
                                          <input checked type="radio" id="whatsappno" value="No" class="form-check-input" name="whatsappgrp" required onclick="toggleWhatsAppInput(false)">
                                          <label for="whatsappno">No</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group" id="whatsappInputDiv" style="display:none;">
                                    <label class="label" for="wcontact">If Yes, Please Provide his WhatsApp No.</label>
                                   

                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">+91</span>
                                       </div>
                                       <input type="text" name="contactnoo" id="contactnoo" pattern="^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$" required="">
                                       @error('contactno')
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Are you an Existing Member of TASMA </label>
                                    <div class="auth-group check-bx">
                                       <div class="form-check">
                                          <input type="radio" id="menbertasmayes" class="form-check-input" value="Yes" name="menbertasma">
                                          <label for="menbertasmayes"> Yes</label>
                                       </div>
                                       <div class="form-check">
                                          <input checked type="radio" id="menbertasmano" class="form-check-input" value="No" name="menbertasma">
                                          <label for="menbertasmano">No</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                     <div class="form-column col-lg-12 col-md-12 col-sm-12 mt-4">
                        <div class="inner-column">
                           <div class="contact-form">
                              <div class="row clearfix">
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Name of the Primary Point of Contact <span>(POC)</span> </label>
                                    <input type="text" name="primary_name" id="primary_name" pattern="^[a-zA-Z_](?:[a-zA-Z_ ]*[a-zA-Z])?$" required="">
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Designation of the POC </label>
                                    <input type="text" name="designation_poc" id="designation_poc" pattern="^[a-zA-Z_ ]*$" required="">
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Contact No. of the POC </label>
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">+91</span>
                                       </div>
                                    <input type="text" name="contact_poc" id="contact_poc" pattern="^[6789]\d{9}$" required="">
                                    
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">E-Mail ID of the POC
                                    </label>
                                    <input type="email" name="email_poc" required="">
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Whether he has to be a part of REPA’s WhatsApp Group?</label>
                                    <div class="auth-group check-bx">
                                       <div class="form-check">
                                          <input type="radio" id="yeswhatsappgrp" class="form-check-input" name="pwhatsappgrps" value="Yes">
                                          <label for="yeswhatsappgrp"> Yes</label>
                                       </div>
                                       <div class="form-check">
                                          <input type="radio" id="nowhatsappgrps" checked class="form-check-input" name="pwhatsappgrps" value="No">
                                          <label for="nowhatsappgrps" class="form-check-label">No</label>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group" id="whatsappContactDiv" style="display: none;">
                                    <label class="label" for="wscontact">If Yes, Please Provide his WhatsApp No.</label>
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">+91</span>
                                       </div>
                                    <input type="text" name="wscontact_poc" id="wscontact" pattern="^[6789]\d{9}$" class="form-control">
                                    </div>
                                 </div>

                                 <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                       let yesRadio = document.getElementById("yeswhatsappgrp");
                                       let noRadio = document.getElementById("nowhatsappgrps");
                                       let whatsappContactDiv = document.getElementById("whatsappContactDiv");

                                       function toggleWhatsAppField() {
                                          if (yesRadio.checked) {
                                             whatsappContactDiv.style.display = "block";
                                             whatsappContactDiv.setAttribute("required", "true"); // Make it required
                                          } else {
                                             whatsappContactDiv.style.display = "none";
                                             document.getElementById("wscontact").value = ""; // Clear input when hidden
                                          }
                                       }

                                       yesRadio.addEventListener("change", toggleWhatsAppField);
                                       noRadio.addEventListener("change", toggleWhatsAppField);
                                    });
                                 </script>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                     <div class="form-column col-lg-12 col-md-12 col-sm-12 mt-4">
                        <div class="inner-column">
                           <div class="contact-form">
                              <div class="row clearfix">
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Name of the Secondary Point of Contact
                                       <span>(SPOC)</span> </label>
                                    <input type="text" name="secondary_name" pattern="^[a-zA-Z_](?:[a-zA-Z_ ]*[a-zA-Z])?$" required="">
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Designation of the SPOC </label>
                                    <input type="text" name="sdesignation" name="sdesignation" pattern="^[a-zA-Z_ ]*$" required="">
                                    @error('sdesignation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Contact No. of the SPOC </label>
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">+91</span>
                                       </div>
                                    <input type="text" name="contact_spoc" id="contact_spoc" pattern="^[6789]\d{9}$" required="">
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">E-Mail ID of the SPOC
                                    </label>
                                    <input type="email" name="spoc_email" required="">
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label">Whether he has to be a part of REPA’s WhatsApp Group?</label>
                                    <div class="auth-group check-bx">
                                       <div class="form-check">
                                          <input type="radio" id="yesswhatsapp" class="form-check-input" name="secondarydta" value="Yes">
                                          <label for="yesswhatsapp"> Yes</label>
                                       </div>
                                       <div class="form-check">
                                          <input type="radio" id="noswhatsapp" class="form-check-input" name="secondarydta" value="No">
                                          <label for="noswhatsapp">No</label>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group" id="whatsappSecondaryDiv" style="display: none;">
                                    <label class="label" for="wspcontact">If Yes, Please Provide his WhatsApp No.</label>
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">+91</span>
                                       </div>
                                    <input type="text" name="wspcontact" id="wspcontact" pattern="^[6789]\d{9}$" class="form-control">
                                    </div>
                                 </div>

                                 <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                       let yesRadio2 = document.getElementById("yesswhatsapp");
                                       let noRadio2 = document.getElementById("noswhatsapp");
                                       let whatsappSecondaryDiv = document.getElementById("whatsappSecondaryDiv");

                                       function toggleSecondaryWhatsAppField() {
                                          if (yesRadio2.checked) {
                                             whatsappSecondaryDiv.style.display = "block";
                                             wspcontact.setAttribute("required", "true"); // Make it required
                                          } else {
                                             whatsappSecondaryDiv.style.display = "none";
                                             document.getElementById("wspcontact").value = ""; // Clear input when hidden
                                          }
                                       }

                                       yesRadio2.addEventListener("change", toggleSecondaryWhatsAppField);
                                       noRadio2.addEventListener("change", toggleSecondaryWhatsAppField);
                                    });
                                 </script>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                     <div class="form-column col-lg-12 col-md-12 col-sm-12 mt-4">
                        <div class="inner-column">
                           <div class="contact-form">
                              <div class="row clearfix">
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Sector in which your existing Business
                                       activity belongs to?
                                    </label>
                                    <input type="text" name="business_activity" id="business_activity" pattern="^[a-zA-Z_ ]*$" required="">
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="label" for="loandetails01">Position in RE Industry </label>
                                    <input type="text" name="position_re" id="position_re" pattern="^[a-zA-Z_ ]*$" required="">
                                 </div>
                                 <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <button class="theme-btn btn-style-one" type="submit"><span class="btn-title">Submit Now</span></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Include optional progressbar HTML -->
            </div>
         </form>
         <div class="note mt-3">
            <em> <b> * All Fields are Mandatory, Kinldy mention NOT APPLICABLE in the fields which are not applicable for you </b></em>
         </div>
      </div>
   </section>
   @include('includes.footer')



   @include('includes.script')
   <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
   <script>
      // Initialize smartWizard
      $('#smartwizard').smartWizard({
         selected: 0, // Initial selected step, 0 = first step
         theme: 'arrows', // theme for the wizard, related CSS need to be included for other themes
         justified: true, // Nav menu justification. true/false
         autoAdjustHeight: false, // Automatically adjust content height
         backButtonSupport: true, // Enable back button support
         enableUrlHash: false,
         color: 'green', // Corrected from Colors to color
         transition: {
            animation: 'none', // Animation effect on navigation: none|fade|slideHorizontal|slideVertical|slideSwing|css
            speed: 400, // Animation speed. Not used if animation is 'css'
         },
         toolbar: {
            position: 'bottom', // none|top|bottom|both
            showNextButton: true, // Show/hide Next button
            showPreviousButton: true, // Show/hide Previous button
            extraHtml: '' // Extra HTML to show on the toolbar (empty for now)
         },
         lang: { // Language variables for buttons
            next: 'Next', // Text for next button
            previous: 'Previous' // Text for previous button
         },
         disabledSteps: [], // Array of steps that should be disabled (if any)
         errorSteps: [], // Array of steps that should have errors (if any)
         warningSteps: [], // Array of steps that should have warnings (if any)
         hiddenSteps: [], // Array of steps that should be hidden (if any)
         getContent: null // Callback function for content loading (if needed)
      });

      // Initialize jQuery validation for each step
      $("#myForm").validate({
         rules: {
            member_name: "required", // Name is required
            email: {
               required: true,
               email: true // Email should be valid
            },
            //   aadhar_number: "required" // Aadhar number is required
         },
         messages: {
            member_name: "Please enter your name", // Name validation message
            email: "Please enter a valid email address", // Email validation message
            aadhar_number: "Please Check Your Aadhar Number" // Aadhar number validation message
         },
         submitHandler: function(form) {
            form.submit(); // Submit the form if valid
         },
         // This is the key part to scroll to the first invalid field on error
         highlight: function(element) {
            $(element).closest('.form-group').addClass('error'); // Highlight the invalid field (optional)
         },
         errorPlacement: function(error, element) {
            // Place error message next to the field
            error.insertAfter(element);
         },
         // Scroll to first invalid field on error
         invalidHandler: function(event, validator) {
            // Find the first invalid field and scroll to it
            var firstErrorField = $(validator.errorList[0].element);

            // Scroll the page to the first error field
            $('html, body').animate({
               scrollTop: firstErrorField.offset().top - 50 // Scroll with a little offset for visibility
            }, 400); // Smooth scroll speed
         }
      });




      // Ensure validation before moving to the next step
      // $('#smartwizard').on('leaveStep', function(e, anchorObject, stepIndex, stepDirection) {
      //    // Check the validity of the form on each step
      //    var isValid = $("#myForm").valid();
      //    if (!isValid) {
      //       e.preventDefault(); // Prevent step change if form is invalid
      //    }
      // });
      $(document).ready(function() {
            $('html, body').animate({ scrollTop: 0 }, 0); // Scroll to top immediately after page load
        });
  
      // // Prevent default scroll behavior when moving to the next step
      $('#smartwizard').on('showStep', function( anchorObject, stepIndex, stepDirection) {
         $('html, body').animate({
            scrollTop: $("#smartwizard").offset().top - 200 // Adjust for any header or space
         }, 200); // Smooth scroll to the top of the wizard container (optional)
      });
    
      
      // Function to toggle visibility of the WhatsApp input field based on the radio selection
      function toggleWhatsAppInput(isYesSelected) {
         var whatsappInputDiv = document.getElementById("whatsappInputDiv");
         if (isYesSelected) {
            // Show the WhatsApp input field
            whatsappInputDiv.style.display = "block";
         } else {
            // Hide the WhatsApp input field
            whatsappInputDiv.style.display = "none";
         }
      }
   </script>
   <script>
      $(document).ready(function() {
         var districts = [
            "Ariyalur", "Chengalpattu", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul",
            "Erode", "Kallakurichi", "Kancheepuram", "Karur", "Krishnagiri", "Madurai", "Mayiladuthurai",
            "Nagapattinam", "Namakkal", "Nilgiris", "Perambalur", "Pudukkottai", "Ramanathapuram", "Ranipet",
            "Salem", "Sivaganga", "Tenkasi", "Thanjavur", "Theni", "Thoothukudi", "Tiruchirappalli",
            "Tirunelveli", "Tirupattur", "Tiruppur", "Tiruvallur", "Tiruvannamalai", "Tiruvarur", "Vellore",
            "Viluppuram", "Virudhunagar"
         ];

         $("#district").autocomplete({
            source: districts,
            minLength: 1
         });
      });
   </script>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

</body>

</html>