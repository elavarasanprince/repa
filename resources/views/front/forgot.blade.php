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
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Forgot Password</h1>
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
                       Forgot Password
                    </li>
                </ul>
            </div>
        </div>
    </div>



   <section class="ptb-100">
   <div class="container">
                <div class="col-md-5 mx-auto">
                    <div class="auth-form">
                        <div class="auth-header">
                            <img src="assets/img/logo/logo.png" alt="">
                            <p>Reset your REPA account password</p>
                        </div>
                        <form action="#">
                            <div class="form-group">
                                <div class="form-icon">
                                    <i class="far fa-envelope"></i>
                                    <input type="email" class="form-control" placeholder="Phone number or Email" fdprocessedid="zh7bru9">
                                </div>
                            </div>


                            <div class="auth-btn text-center">
                                <button type="submit" class="theme-btn" ><span class="far fa-key"></span> Request OTP</button>
                            </div>
                        </form>
                        <div class="auth-bottom mt-3">

                            <p class="auth-bottom-text">* Verify your Registered Email or Mobile</p>
                        </div>

                    </div>
                </div>
            </div>
   </section>





    @include('includes.footer')



@include('includes.script')



</body>

</html>
