<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="{{ asset('adminpanel/assets/new-img/logo-white.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('adminpanel/assets/new-img/logo-white.png') }}" type="image/x-icon" />
    <title>Repa</title>
    <!-- Font Awesome 5 CDN -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/font-awesome5.15.4.min.css') }}" />

    <!-- Google font-->


    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/font-awesome.css') }}" /> --}}

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/vendors/icofont.css') }}" />
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/vendors/themify.css') }}" />
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/vendors/flag-icon.css') }}" />
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/vendors/feather-icon.css') }}" />
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/vendors/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/vendors/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/vendors/scrollbar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/vendors/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/vendors/datatables.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/vendors/owlcarousel.css') }}" />
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/vendors/bootstrap.css') }}" />
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/style.css') }}" />
    <link id="color" rel="stylesheet" href="{{ asset('adminpanel/assets/css/color-1.css') }}" media="screen" />
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/responsive.css') }}" />
    <!--toaster.css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/toastr.min.css') }}" />


    <!-- SweetAlert2 CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.8/dist/sweetalert2.min.css">


</head>

<body>
    <!-- loader starts-->
    <!-- <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div> -->
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Header Start-->
        @include('adminpanel/layouts.header')
         <!-- Header End-->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            @include('adminpanel/layouts.sidebar')
            <div class="page-body">
                @yield('content')
            </div>
            @include('adminpanel/layouts.footer')
        </div>
    </div>
</body>
