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

    <div class="breadcrumb-wrapper bg-cover" style="background-image: url('assets/img/08.png');">
        <!-- <div class="border-shape">
                <img src="assets/img/element.png" alt="shape-img">
            </div> -->
        <div class="line-shape">
            <img src="assets/img/line-element.png" alt="shape-img">
        </div>
        <div class="container">
            <div class="page-heading">
                <h1 class="wow fadeInUp" data-wow-delay=".3s"> Contact Us</h1>
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
                        Contact Us
                    </li>
                </ul>
            </div>
        </div>
    </div>

     <!-- Contact Page Section -->
     <section class="contact-page-section">
        <div class="container">
            <div class="row clearfix">
                <div class="contact-column col-lg-4 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2>Contact Info</h2>
                        </div>
                        <ul class="contact-info">
                            <li>
                                <span class="icon fa fa-map-marker-alt"></span>

                                <p><strong>Location </strong># 2, Karur Road, Modern Nagar, <br> Dindigul, Tamil Nadu, India <br>  Pincode-642 001</p>
                            </li>

                            <li>
                                <span class="icon fa fa-phone-volume"></span>
                                <p><strong>Call us</strong> <a href="tel:+91 99655 33318">+91 99655 33318</a> <br>
                                <a href="tel:+91 99653 33318" >+91 99653 33318 </a></p>

                            </li>

                            <li>
                                <span class="icon fa fa-envelope"></span>
                                <p><strong>Mail us</strong><a href="mailto:info@tnrepa.in">info@tnrepa.in</a></p>

                            </li>

                            <li>
                                <span class="icon fa fa-clock"></span>
                                <p><strong>Working Time</strong> Mon - Sat: 10.30 - 18.30 Hrs </p>

                            </li>
                            <li>
                            <div class="top-btn">

<a href="{{ route('MemberReg') }}"> <i class="fa fa-user"></i> New Member Request</a>
</div>
                            </li>
                        </ul>


                    </div>
                </div>

                <!-- Form Column -->
                <div class="form-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="contact-form">
                            <div class="sec-title">
                                <h2>Get in Touch</h2>
                            </div>
                            <form method="post" action="sendemail.php" id="contact-form">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="username" placeholder="Name" required="">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="phone" placeholder="Phone" required="">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email" required="">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="subject" placeholder="Company Name" required="">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="Designation" placeholder="Designation" required="">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Submit Now</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Page Section -->

    <section class="repa-map-section pb-5">
        <div class="container-fluid">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7849.072264323743!2d77.989356!3d10.378925!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00aa6e5c415c0b%3A0x484b6ee79d11b442!2sTamilnadu%20Spinning%20Mills%20Association%20(TASMA)!5e0!3m2!1sen!2sus!4v1733927418857!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>




    @include('includes.footer')



@include('includes.script')

    <script>
        	if($('#contact-form').length){
		$('#contact-form').validate({
			rules: {
				name: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				message: {
					required: true
				}
			}
		});
	}
    </script>


</body>

</html>
