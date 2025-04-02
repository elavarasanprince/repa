@include('includes.head')

@include('includes.header')

<div class="container" style="padding-top:5em; padding-bottom:5em;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered" id="membersTable">

        <thead>
            <tr>
                <th>#</th>
                <th>Member Name</th>
                <th>Father Name</th>
                <th>Aadhar Number</th>
                <th>Designation</th>
                <th>Company</th>
                <th>Address</th>
                <th>Pincode</th>
                <th>District</th>
                <th>GSTIN</th>
                <th>URL</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>WhatsApp Group</th>
                <th>Primary Contact</th>
                <th>Secondary Contact</th>
            </tr>
        </thead>
        <tbody>
            @php
                $members = DB::table('member_reg')->get();
            @endphp
            @foreach ($members as $key => $member)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $member->member_name }}</td>
                    <td>{{ $member->father_name }}</td>
                    <td>{{ $member->aadhar_number }}</td>
                    <td>{{ $member->designation }}</td>
                    <td>{{ $member->oftheCompany }}</td>
                    <td>{{ $member->address }}</td>
                    <td>{{ $member->pincode }}</td>
                    <td>{{ $member->district }}</td>
                    <td>{{ $member->gstin }}</td>
                    <td>{{ $member->url }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->contactno }}</td>
                    <td>{{ $member->whatsappgrp }}</td>
                    <td>{{ $member->primary_name }}</td>
                    <td>{{ $member->secondary_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

                </div>
            </div>
        </div>
    </div>
</div>



@include('includes.footer')

<script>
    $(document).ready(function() {
        $('#membersTable').DataTable({
            "paging": true,         // Enable pagination
            "searching": true,      // Enable search
            "ordering": true,       // Enable sorting
            "info": true,           // Show table information
            "lengthMenu": [10, 25, 50, 100] // Entries per page
        });
    });
</script>


@include('includes.script')
