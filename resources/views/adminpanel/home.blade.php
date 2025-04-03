@extends('adminpanel/layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Title -->
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h1>Dashboard</h1>

            </div>

        </div>
    </div>

    <!-- Dashboard Cards -->
   <div class="row mt-4">
    <!-- General Members -->
    <div class="col-md-3">
        <div class="card mb-3" style="min-height: 126px;">
            <div class="card-body bg-gradient-custom1">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">General Members</h5>
                        <h2 style="color:white; font-size: 22px;">{{ $generalCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- OEMS Members -->
    <div class="col-md-3">
        <div class="card mb-3 box overflow-hidden sales-card bg-danger-gradient !rounded-sm" style="min-height: 126px;">
            <div class="card-body bg-gradient-custom2">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title">OEMS Members</h6>
                        <h2 style="color:white; font-size: 22px;">{{ $oemCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AMC Service Provider -->
    <div class="col-md-3">
        <div class="card mb-3" style="min-height: 126px;">
            <div class="card-body bg-gradient-custom3">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title" style="font-size: 14px;">AMC SERVICE PROVIDER</h5>
                        <h2 style="color:white; font-size: 22px;">{{ $amcCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor -->
    <div class="col-md-3">
        <div class="card mb-3" style="min-height: 126px;">
            <div class="card-body bg-gradient-custom1">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Vendor</h5>
                        <h2 style="color:white; font-size: 22px;">{{ $vendorCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Other Service Provider -->
    <div class="col-md-3">
        <div class="card mb-3 box overflow-hidden sales-card bg-danger-gradient !rounded-sm" style="min-height: 126px;">
            <div class="card-body bg-gradient-custom2">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title">Other Service Provider</h6>
                        <h2 style="color:white; font-size: 22px;">{{ $otherServiceCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




</div>
@endsection

<style>
  .card {
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%; /* Increase card width */
    height: 200px; /* Reduce card height */
  }

  /* Custom Gradients */
  .card-body.bg-gradient-custom1
   {
    background: linear-gradient(135deg, #f7b7b7, #f26d6d); /* Medium Peach to Rose */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Medium shadow */
    color: white; /* Set text color to white */
}




.card-body.bg-gradient-custom2 {
    background: linear-gradient(135deg, #4b8b8c, #6bc5c3); /* Medium Teal to Soft Blue */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Medium shadow */
    color: white; /* Set text color to white */
}






  .card-body.bg-gradient-custom3 {
    background: linear-gradient(45deg, #00b09b, #96c93d); /* Greenish Blue to Light Green */
    color: white; /* Set text color to white */
  }

  .card-body.bg-gradient-custom4 {
    background: linear-gradient(45deg, #a3c8e2, #2c6f98); /* Light Blue to Dark Blue */
    color: white; /* Set text color to white */
}



  /* Aligning the "+" or "%" text to the right */
  .card-body .d-flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .card .card-title {
    font-size: 16px;
    font-weight: 600;
  }

 .container-fluid {
  background-color: #edf0fb;
}


  .card h2 {
    font-size: 32px;
    font-weight: 700;
  }

  .map-placeholder {
    display: flex;
    justify-content: center;
    align-items: center;
    color: #999;
    font-size: 14px;
  }

  .badge {
    font-size: 14px;
    padding: 5px 10px;
    border-radius: 12px;
  }


  .text-sm .card-title {
    font-size: 14px;
}

.text-sm h2 {
    font-size: 18px;
}

.text-sm .card-text,
.text-sm small {
    font-size: 12px;
}

</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        title: "Success!",
        text: "{{ session('success') }}",
        icon: "success",
        confirmButtonText: "OK"
    });
</script>