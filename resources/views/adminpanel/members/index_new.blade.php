@extends('adminpanel/layouts.app')

@section('content')

        <div class="container-fluid">
          <div class="page-title">
            <div class="row">
              <div class="col-sm-10 p-0">
                <h3  style="font-family: 'Open Sans', serif !important;
        ">Manage Members</h3>
              </div>
              <div class="col-sm-2 p-0">
                <div class="overflow-hidden">

                </div>


              </div>
            </div>
          </div>
        </div>

        <!-- Container-fluid starts-->
        <div class="container-fluid basic_table">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <!-- Search form -->


        <div class="table-responsive custom-scrollbar">
        <table id="memberTable" class="table table-striped table-bordered">

        <thead class="thead-dark">
            <tr>
            <th>SNo</th>
                <th>Member Name</th>

                <th>Mobile Number</th>
                <th>Designation</th>
                <th>Company</th>
                 <th>Status</th>
                  <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
            <td>{{ $loop->iteration }}</td> <!-- Auto-incremented Serial Number -->

                <td>{{ $member->member_name }}</td>

                <td>{{ $member->contactno }}</td>
                <td>{{ $member->designation }}</td>
                <td>{{ $member->oftheCompany }}</td>

 

    <td style="
    text-transform: capitalize;
">{{ $member->status }}</td>
 <td>{{ \Carbon\Carbon::parse($member->created_at)->format('d-m-Y') }}</td>


                <td>
                <a href="{{ route('members.show' ,$member->memberid)}}" class="btn btn-sm" style="background-color: green; color: #ffffff; border: none;" title="View">
    <i class="fas fa-eye"></i> <!-- Eye Icon -->
</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


        </div>

        <!-- Pagination Links -->
       <!-- Pagination Links -->
<div class="d-flex justify-content-end mt-3">

</div>

      </div>
    </div>
  </div>
</div>


<!-- Schedule Modal -->









<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




        <!-- Container-fluid Ends-->
       @endsection
       {{-- @section('scripts')



   @endsection --}}

<style>
  /* Positioning the modal footer at the top-right corner */
/* Ensure the modal content is positioned correctly */
/* Ensure the modal content is positioned correctly */
.modal-content {
  position: relative;
}

/* Modal footer positioned at the top-right of the modal */
.top-footer {
  position: absolute;
  top: 10px; /* Distance from top */
  right: 10px; /* Distance from right */
  z-index: 999; /* Make sure the footer stays on top */
  width: 100%;
  display: flex;
  justify-content: flex-end; /* Align buttons to the right */
  padding: 0;
}

.top-footer .btn {
  margin-left: 10px; /* Space between buttons */
}

.eye-icon:hover {
  color: #ff6347 !important; /* Change color to Tomato or any desired color */
}

.pagination-wrapper {
        text-align: right;  /* Align the pagination to the right */
        margin-top: 10px;    /* Optional: Add some spacing between the table and pagination */
    }

    .pagination {

        text-align: center;
    }

 /* Apply consistent alignment to both thead and tbody */
.table thead th {
    text-align: left; /* Match tbody alignment */
    padding: 12px;    /* Adjust padding if needed */
    vertical-align: middle;
}

.table tbody td {
    text-align: left; /* Same as thead for consistent alignment */
    padding: 12px;    /* Match padding with thead */
    vertical-align: middle;
}

/* Optional: Style the table header background */
.table thead th {
    background-color: #f8f9fa; /* Light gray for contrast */
    font-weight: bold;
}



</style>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#memberTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
</script>
