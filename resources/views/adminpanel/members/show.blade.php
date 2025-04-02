@extends('adminpanel/layouts.app')

@section('content')
<div class="container mt-4">


<div class="card">
        <div class="card-header text-white d-flex justify-content-between align-items-center" style=" background: linear-gradient(to bottom, #80CD29, #1B1F23);">
        <a href="https://repa.sarasbillingpro.com/admin/members" class="btn btn-light btn-circle me-2 text-dark" style="padding: 5px 10px; font-size: 18px; background-color: #f0f0f0 !important;">
    ←
</a>





<h4 class="top-bar mb-0 ms-2" style="margin-bottom: 0;text-transform: capitalize;">
    {{ $members->member_name }}'s Profile
</h4>

<div class="button-group d-flex ms-auto">
@if($members->user && $members->user->status == 'active') 
    <span class="badge bg-primary text-white p-2">APPROVED</span>
@elseif($members->user && $members->user->status == 'pending') 
    <span class="badge bg-warning text-white p-2">Pending</span>
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
    
     <li class="nav-item" role="presentation">
        <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#fees" type="button" role="tab" aria-controls="orders" aria-selected="false">
            <i class="fa fa-box" style="font-size: 18px;"></i> <!-- Orders Icon -->


          FEES <br> SCHEDULE


        </button>
    </li>
    @if ($members->user && $members->user->status == 'active')
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#payments" type="button" role="tab" aria-controls="orders" aria-selected="false">
            <i class="fa fa-box" style="font-size: 18px;"></i> <!-- Orders Icon -->
            Payments <br>
        </button>
    </li>
@endif

</ul>

        <div class="tab-content mt-3" id="patientProfileTabsContent">
    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="profile-header">
        <!-- <div class="profile-image">

    <img src="{{ $members->profile ? asset('storage/' . $members->profile) : asset('images/default-avatar.png') }}" alt="Doctor's Profile" class="img-fluid rounded-circle" width="150" height="150">
</div> -->


<div class="profile-details mt-3">
    <p class="text-success">{{ session('success') }}</p>

    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th>Name</th>
                <td>{{ $members->member_name }}</td>
            </tr>

            <tr>
                <th>Father Name</th>
                <td>{{ $members->father_name }}</td>
            </tr>

            <tr>
                <th>Aadhar Number</th>
                <td>{{ $members->aadhar_number   }}</td>
            </tr>
            <tr>
                <th>Designation</th>
                <td>{{ $members->designation }}</td>
            </tr>

            <tr>
                <th>Business Name of the Concern/ Firm/ Company</th>
                <td>{{ $members->oftheCompany }}</td>
            </tr>



                <th>Address of the Concern/ Firm/ Company</th>
                <td>{{ $members->address }}</td>
            </tr>
            <tr>
                <th>Pincode</th>
                <td>{{ $members->pincode }}</td>
            </tr>


            <tr>
                <th>District</th>
                <td>{{ $members->district }}</td>
            </tr>


            <tr>
                <th>GSTIN</th>
                <td>{{ $members->gstin }}</td>
            </tr>

            <tr>
                <th>URL</th>
                <td>{{ $members->url }}</td>
            </tr>

            <tr>
                <th>EMAIL</th>
                <td>{{ $members->email }}</td>
            </tr>

            <tr>
                <th>Contact No</th>
                <td>{{ $members->contactno }}</td>
            </tr>

            <tr>
                <th> REPA’s WhatsApp Group</th>
                <td>{{ $members->whatsappgrp }}</td>
            </tr>

            <tr>
                <th> WhatsApp Number</th>
                <td>{{ $members->wcontact }}</td>
            </tr>

            <tr>
                <th> Existing Member of TASMA</th>
                <td>{{ $members->menbertasma }}</td>
            </tr>


            <!-- <tr>
                <th>Status</th>
                <td>
                    @if($members->status == 'active')
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
                <td>{{ $members->primary_name }}</td>
            </tr>

            <tr>
                <th>Designation of the POC</th>
                <td>{{ $members->designation_poc }}</td>
            </tr>

            <tr>
                <th>Contact No. of the POC</th>
                <td>{{ $members->contact_poc   }}</td>
            </tr>
            <tr>
                <th>E-Mail ID of the POC</th>
                <td>{{ $members->email_poc }}</td>
            </tr>

            <tr>
                <th>Whether he has to be a part of REPA’s WhatsApp Group?</th>
                <td>{{ $members->pwhatsappgrps }}</td>
            </tr>



                <th>WhatsApp No.</th>
                <td>{{ $members->wscontact_poc }}</td>
            </tr>


        </tbody>
    </table>
    </div>

    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th>Name of the Secondary Point of Contact (SPOC)</th>
                <td>{{ $members->secondary_name }}</td>
            </tr>

            <tr>
                <th>Designation of the SPOC</th>
                <td>{{ $members->sdesignation }}</td>
            </tr>

            <tr>
                <th>Contact No. of the SPOC</th>
                <td>{{ $members->contact_spoc   }}</td>
            </tr>
            <tr>
                <th>E-Mail ID of the SPOC</th>
                <td>{{ $members->spoc_email }}</td>
            </tr>

            <tr>
                <th>Whether he has to be a part of REPA’s WhatsApp Group?</th>
                <td>{{ $members->secondarydta }}</td>
            </tr>



                <th>WhatsApp No.</th>
                <td>{{ $members->wspcontact }}</td>
            </tr>


        </tbody>
    </table>
    </div>
    <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="patients-tab">
    @php
    if ($balance_amount == 0) {
        $payment_status = '<span class="badge badge-success">Paid</span>';
    } elseif ($balance_amount > 0 && $balance_amount < $member_fees->capacity_fees) {
        $payment_status = '<span class="badge badge-warning">Partially Paid</span>';
    } else {
        $payment_status = '<span class="badge badge-danger">Unpaid</span>';
    }
@endphp


<h3>Total Subscription Charge: Rs. {{ @$member_fees->capacity_fees }} <span> {!! $payment_status !!}</span></h3>
    <br>

    <form action="{{ route('payments.store') }}" method="POST">
    @csrf
    <input type="hidden" name="members_id" value="{{ $members->id }}">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="pay_amount">Pay Amount</label>
                <input type="text" class="form-control" name="pay_amount" id="pay_amount" value="{{ $balance_amount }}" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="pay_method">Payment Method</label>
                <select class="form-control" name="pay_method" id="pay_method" required>
                    <option value="">Select Payment Method</option>
                    <option value="cash">Cash</option>
                    <option value="upi">UPI</option>
                    <option value="bank_transfer">Bank Transfer</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary mt-4">Submit Payment</button>
        </div>
    </div>
</form>

<br>

        <h5>Payment History</h5><br>
        <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Payment Method</th>
        </tr>
    </thead>
    <tbody>
        @foreach($payments as $index => $payment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('d-m-Y') }}</td>
                <td>{{ number_format($payment->pay_amount, 2) }}</td>
                <td style="
    text-transform: uppercase;
">{{ ucfirst($payment->pay_method) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

    </div>
    <div class="tab-pane fade" id="ratings" role="tabpanel" aria-labelledby="ratings-tab">
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th>Sector in which your existing Business activity belongs to?</th>
                <td>{{ $members->business_activity }}</td>
            </tr>

            <tr>
                <th>Position in RE Industry</th>
                <td>{{ $members->position_re }}</td>
            </tr>



        </tbody>
    </table>
</div>
<div class="tab-pane fade" id="fees" role="tabpanel" aria-labelledby="fees-tab">
    @if ($members->fees->isNotEmpty())
        <!-- Display Existing Fee Details -->
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($members->fees->whereNotIn('capacity_id', [11, 12, 13])->isNotEmpty())
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
                @foreach ($members->fees as $fee)
                    @if(!in_array($fee->capacity_id, [11, 12, 13]))
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
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endif

<br>
            
              <h4 class="mb-2">FEE STRUCTURE</h4>
              
             <table class="table table-bordered mb-3">
                <thead>
                    <tr>
                        
                        <th>Capacity Name</th>
                        <th>Fees (Rs.)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members->fees as $fee)
                        <tr>
                             
                            <td>{{ $fee->capacity->name }}</td>
                            <td>Rs. {{ $fee->capacity->fees }} / FY</td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
            
            <form action="{{ route('updateStatus') }}" method="POST">
    @csrf
    <input type="hidden" name="member_id" value="{{ $members->id }}">
    
    <label for="status">Select Status:</label>
  <select id="status" name="status" class="form-control" onchange="updateStatusColor()">
    <option value="">Select Status</option>
    <option value="active" {{ optional($members->user)->status == 'active' ? 'selected' : '' }}>Approved</option>
    <option value="pending" {{ optional($members->user)->status == 'pending' ? 'selected' : '' }}>Pending</option>
    <option value="denied" {{ optional($members->user)->status == 'denied' ? 'selected' : '' }}>Denied</option>
</select>
<div id="remarkField" style="display: none; margin-top: 10px;">
    <label for="remark">Remark</label>
    <input type="text" id="remark" name="remark" value="{{ $members->user->remark}}" class="form-control">
</div>





<script>
    function updateStatusColor() {
        let select = document.getElementById("status");
        let value = select.value;
        var status = document.getElementById("status").value;
        var remarkField = document.getElementById("remarkField");
        var remarkInput = document.getElementById("remark");

      
        // Reset to default color first
        select.style.backgroundColor = "";

        if (value === "active") {
            select.style.backgroundColor = "green";
            remarkField.style.display = "none";
            select.style.color = "white";
            remarkInput.removeAttribute("required");
        remarkInput.value = ""; // Clear the remark field if not denied
        } else if (value === "pending") {
            select.style.backgroundColor = "yellow";
            select.style.color = "black";
            remarkField.style.display = "none";
            remarkInput.removeAttribute("required");
        remarkInput.value = ""; // Clear the remark field if not denied
        } else if (value === "denied") {
            select.style.backgroundColor = "red";
            remarkInput.setAttribute("required", "required");
            select.style.color = "white";
            remarkField.style.display = "block";
        }
    }

    // Set initial background color on page load
    document.addEventListener("DOMContentLoaded", updateStatusColor);
</script>



    <button type="submit" class="btn btn-primary mt-2">Update Status</button>
</form>


        </div>
        
    @else
        <!-- Show Form If No Fees Exist -->
        <form action="{{ route('fees.store') }}" method="POST">
            @csrf
             

            <div class="container mt-4">
                <h4 class="mb-2">FEE SCHEDULE</h4>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-2">
                            <input type="checkbox" class="membership" name="membership_type" id="generator_member" value="generator">
                            <label for="generator_member" class="fw-bold">FOR GENERATOR MEMBERS</label>
                        </div>




                    



                        <div id="generator_options" class="mb-3" style="display: none;">
                            <label class="fw-bold">Choose Type:</label><br>
                            <input type="radio" id="existing_member" name="generator_type" value="existing">
                            <label for="existing_member">Existing Members of TASMA</label><br>

                            <input type="radio" id="other_member" name="generator_type" value="other">
                            <label for="other_member">Other than TASMA Members</label><br>
                        </div>
                   

                    <div class="">

                  

<div class="container mt-3" id="installed" style="display:none;">
<h4 class="mb-2">INSTALLED CAPACITY IN MEGA WATT</h4>
 <input type="hidden" value="{{ $members->id }}" name="member_id">

    <div class="row mb-2">
        <div class="col-md-6">
            <label for="wind_energy">WIND ENERGY GENERATOR (IN MW)</label>
        </div>
        <div class="col-md-6">
            <input type="text" id="wind_energy" name="wind_energy" class="form-control">
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6">
            <label for="solar_energy">SOLAR ENERGY GENERATOR (IN MW) (AC CAPACITY ONLY)</label>
        </div>
        <div class="col-md-6">
            <input type="text" id="solar_energy" name="solar_energy" class="form-control">
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6">
            <label for="solar_energy_2">SOLAR ENERGY GENERATOR (IN MW) (AC CAPACITY ONLY)</label>
        </div>
        <div class="col-md-6">
            <input type="text" id="solar_energy_2" name="solar_energy_2" class="form-control">
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6">
            <label for="other_re">OTHER TYPES OF RE INDUSTRY</label>
        </div>
        <div class="col-md-6">
            <input type="text" id="other_re" name="other_re" class="form-control">
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6">
            <label for="total">TOTAL (IN MW)</label>
        </div>
        <div class="col-md-6">
            <input type="text" id="total" name="total" class="form-control" readonly>
        </div>
    </div>
</div>
                        <div id="fee_schedule_existing" class="mb-3" style="display: none;">
                       

                            <label class="fw-bold">Select Capacity (Existing Members):</label><br>
                            <select id="capacity_fee_existing" name="capacity_fee_existing" class="form-control">
                                <option value="">Select Capacity</option>
                                @foreach(DB::table('capacity')->where('type', 'existing')->get() as $cap)
                                    <option value="{{ $cap->id }}">{{ $cap->name }} - Rs. {{ $cap->fees }}/ FY</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="fee_schedule_other" class="mb-3" style="display: none;">


                      

                            <label class="fw-bold">Select Capacity (Other than TASMA Members):</label><br>
                            <select id="capacity_fee_other" name="capacity_fee_other" class="form-control" >
                                <option value="">Select Capacity</option>
                                @foreach(DB::table('capacity')->where('type', 'new')->get() as $cap)
                                    <option value="{{ $cap->id }}">{{ $cap->name }} - Rs. {{ $cap->fees }}/ FY</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <label for="generator_member" class="fw-bold">FOR OTHER MEMBERS:</label>

                <div class="row">
                    @foreach(DB::table('capacity')->where('fees_type', 'other_member')->get() as $member)
                        <div class="col-md-6">
                            <input type="checkbox" class="membership" id="member_{{ $member->id }}" name="capacity_fee_existing1" value="{{ $member->id }}">
                            <label for="member_{{ $member->id }}">{{ $member->name }}</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control fee-box" id="fee_{{ $member->id }}" value="Rs. {{ $member->fees }}/FY" readonly style="display: none;">
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endif
</div>

</div>

</div>


<script>

document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll(".membership");
    const generatorCheckbox = document.getElementById("generator_member");
    const generatorOptions = document.getElementById("generator_options");
    const feeScheduleExisting = document.getElementById("fee_schedule_existing");
    const feeScheduleOther = document.getElementById("fee_schedule_other");
    const totalField = document.getElementById("total");
    const capacitySelectExisting = document.getElementById("capacity_fee_existing");
    const capacitySelectOther = document.getElementById("capacity_fee_other");

    function hideAllFeeBoxes() {
        document.querySelectorAll(".fee-box").forEach(box => box.style.display = "none");
    }

    function resetOtherCheckboxes(selectedCheckbox) {
        checkboxes.forEach(checkbox => {
            if (checkbox !== selectedCheckbox) {
                checkbox.checked = false;
            }
        });
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            resetOtherCheckboxes(this);
            hideAllFeeBoxes();

            if (generatorCheckbox.checked) {
                generatorOptions.style.display = "block";
            } else {
                generatorOptions.style.display = "none";
                installed.style.display = "none";
            }

            if (this.checked) {
                document.getElementById("fee_" + this.value).style.display = "block";
            }
           
        });
    });

    document.querySelectorAll('input[name="generator_type"]').forEach(radio => {
        radio.addEventListener("change", function () {
            if (generatorCheckbox.checked) {
                feeScheduleExisting.style.display = this.value === "existing" ? "block" : "none";
                feeScheduleOther.style.display = this.value === "other" ? "block" : "none";

                installed.style.display = "block";
            }
        });
    });

    // Auto calculate total MW
    let inputs = document.querySelectorAll("#wind_energy, #solar_energy, #solar_energy_2, #other_re");
    
    function updateTotalMW() {
        let total = 0;
        inputs.forEach(input => total += parseFloat(input.value) || 0);
        totalField.value = total.toFixed(2);
        autoSelectCapacity(total);
    }

    inputs.forEach(input => {
        input.addEventListener("input", updateTotalMW);
    });

    // Auto-select capacity based on total MW
    function autoSelectCapacity(totalMW) {
        const options = [
            { value: "6", min: 0, max: 5 }, 
            { value: "7", min: 5, max: 10 }, 
            { value: "8", min: 10, max: 25 }, 
            { value: "9", min: 25, max: Infinity }
        ];

        let selectedOption = options.find(opt => totalMW >= opt.min && totalMW < opt.max)?.value || "";

        if (feeScheduleExisting.style.display === "block") {
            capacitySelectExisting.value = selectedOption;
        } else if (feeScheduleOther.style.display === "block") {
            capacitySelectOther.value = selectedOption;
        }
    }

    hideAllFeeBoxes();
});

// document.addEventListener("DOMContentLoaded", function () {
//     const checkboxes = document.querySelectorAll(".membership");
//     const generatorCheckbox = document.getElementById("generator_member");
//     const generatorOptions = document.getElementById("generator_options");
//     const feeScheduleExisting = document.getElementById("fee_schedule_existing");
//     const feeScheduleOther = document.getElementById("fee_schedule_other");

//     function hideAllFeeBoxes() {
//         document.querySelectorAll(".fee-box").forEach(box => box.style.display = "none");
//     }

//     function resetOtherCheckboxes(selectedCheckbox) {
//         checkboxes.forEach(checkbox => {
//             if (checkbox !== selectedCheckbox) {
//                 checkbox.checked = false;
//             }
//         });
//     }

//     checkboxes.forEach(checkbox => {
//         checkbox.addEventListener("change", function () {
//             resetOtherCheckboxes(this);
//             hideAllFeeBoxes();

//             if (generatorCheckbox.checked) {
//                 generatorOptions.style.display = "block";
//             } else {
//                 generatorOptions.style.display = "none";
//             }

//             if (this.checked) {
//                 document.getElementById("fee_" + this.value).style.display = "block";
//             }
//         });
//     });

//     document.querySelectorAll('input[name="generator_type"]').forEach(radio => {
//         radio.addEventListener("change", function () {
//             feeScheduleExisting.style.display = this.value === "existing" ? "block" : "none";
//             feeScheduleOther.style.display = this.value === "other" ? "block" : "none";
//         });
//     });

//     hideAllFeeBoxes();
// });

// document.addEventListener("DOMContentLoaded", function () {
//     let inputs = document.querySelectorAll("#wind_energy, #solar_energy, #solar_energy_2, #other_re");
//     let totalField = document.getElementById("total");

//     inputs.forEach(input => {
//         input.addEventListener("input", function () {
//             let total = 0;
//             inputs.forEach(i => total += parseFloat(i.value) || 0);
//             totalField.value = total.toFixed(2);
//         });
//     });
// });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Get input fields and dropdown
    const windEnergy = document.getElementById("wind_energy");
    const solarEnergy = document.getElementById("solar_energy");
    const solarEnergy2 = document.getElementById("solar_energy_2");
    const otherRE = document.getElementById("other_re");
    const totalMW = document.getElementById("total");
    const capacityDropdown = document.getElementById("capacity_fee_existing");

    function updateTotalAndDropdown() {
        // Get values and convert to float (default to 0 if empty)
        const wind = parseFloat(windEnergy.value) || 0;
        const solar1 = parseFloat(solarEnergy.value) || 0;
        const solar2 = parseFloat(solarEnergy2.value) || 0;
        const other = parseFloat(otherRE.value) || 0;
        
        // Calculate total
        const total = wind + solar1 + solar2 + other;
        totalMW.value = total.toFixed(2); // Display total in input field

        // Auto-select capacity based on total MW
        if (total > 50) {
            capacityDropdown.value = "5"; // Above 50MW
        } else if (total > 25) {
            capacityDropdown.value = "4"; // Above 25MW – Below 50MW
        } else if (total > 10) {
            capacityDropdown.value = "3"; // Above 10MW – Below 25MW
        } else if (total > 5) {
            capacityDropdown.value = "2"; // Above 5MW – Below 10MW
        } else if (total > 0) {
            capacityDropdown.value = "1"; // Up to 5MW
        } else {
            capacityDropdown.value = ""; // Default option
        }
    }

    // Attach event listeners to input fields
    windEnergy.addEventListener("input", updateTotalAndDropdown);
    solarEnergy.addEventListener("input", updateTotalAndDropdown);
    solarEnergy2.addEventListener("input", updateTotalAndDropdown);
    otherRE.addEventListener("input", updateTotalAndDropdown);
});
</script>


<!-- Terminate Button -->
<!-- <div class="terminate-btn" style="display:flex;">
<form action="#" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Inactive</button>
    </form>
    <form action="#" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-warning">Terminate</button>
    </form>
</div> -->
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.all.min.js"></script>

<script>
    // Check if there's a success message in the session
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            showConfirmButton: true
        });
    @endif
</script>

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
#capacity_fee_other {
    pointer-events: none;
    background-color: #e9ecef; /* Optional: Grey out like a disabled input */
}
#capacity_fee_existing {
    pointer-events: none;
    background-color: #e9ecef; /* Optional: Grey out like a disabled input */
}

</style>
<script>
document.getElementById("capacity_fee_other").addEventListener("mousedown", function (event) {
    event.preventDefault(); // Prevent dropdown from opening
});
document.getElementById("capacity_fee_existing").addEventListener("mousedown", function (event) {
    event.preventDefault(); // Prevent dropdown from opening
});
</script>