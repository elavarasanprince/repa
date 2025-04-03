
<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="description" content="REPA">

    <!-- ======== Page title ============ -->
    <title>REPA | Home</title>
    <link rel="stylesheet" href="assets/css//form.css">
    @include('includes.head')
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />



</head>

<body>

    @include('includes.header')

    <div class="breadcrumb-wrapper bg-cover-mart" style="background-image: url('assets/img/breadcrumb.jpg');">

        <div class="container">
            <div class="page-heading">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">New Member Login</h1>
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
                    New Member Login
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <section class="ptb-100">

<main class="container">
		    <div class="row justify-content-center">
		        <div class="col-xl-11">
		            <div class="form_container">
		                <div class="row">
		                    <div class="col-lg-4">
		                        <div id="left_form">
		                            <figure><img src="img/registration_bg.svg" alt="" width="120" height="120"></figure>
		                            <h2>Registration</h2>
		                            <p>Tation argumentum et usu, dicit viderer evertitur te has. Eu dictas concludaturque usu, facete detracto patrioque an per, lucilius.</p>
		                            <a href="#0" id="more_info" data-bs-toggle="modal" data-bs-target="#more-info"><i class="pe-7s-info"></i></a>
		                        </div>
		                    </div>
		                    <div class="col-lg-8">
		                        <form id="custom" action="" method="POST">
		                            <input id="website" name="website" type="text" value=""><!-- Leave for security protection, read docs for details. Delete this comment before to publish. -->
		                            <fieldset title="Step 1">
		                                <legend>Personal info</legend>
		                                <div class="row">
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <input type="text" name="firstname" class="form-control" placeholder="First name">
		                                        </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <input type="text" name="lastname" class="form-control" placeholder="Last name">
		                                        </div>
		                                    </div>
		                                </div>
		                                <!-- /row -->
		                                <div class="row">
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <input type="email" name="email" class="form-control" placeholder="Your Email">
		                                        </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <input type="text" name="telephone" class="form-control" placeholder="Your Telephone">
		                                        </div>
		                                    </div>
		                                </div>
		                                <!-- /row -->
		                                <div class="row">
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <input type="text" name="age" class="form-control" placeholder="Age">
		                                        </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                        <div class="form-group radio_input">
		                                            <label><input type="radio" value="Male" checked name="gender" class="icheck">Male</label>
		                                            <label><input type="radio" value="Female" name="gender" class="icheck">Female</label>
		                                        </div>
		                                    </div>
		                                </div>
		                                <!-- /row -->
		                            </fieldset><!-- End Step one -->
		                            <fieldset title="Step 2">
		                                <legend>Address</legend>
		                                <div class="row">
		                                    <div class="col-md-12">
		                                        <div class="form-group">
		                                            <input type="text" name="address" class="form-control" placeholder="Address">
		                                        </div>
		                                    </div>
		                                    <!-- /col-sm-12 -->
		                                </div>
		                                <!-- /row -->
		                                <div class="row">
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <input type="text" name="city" class="form-control" placeholder="City">
		                                        </div>
		                                    </div>
		                                    <div class="col-md-3">
		                                        <div class="form-group">
		                                            <input type="text" name="zip_code" class="form-control" placeholder="Zip code">
		                                        </div>
		                                    </div>
		                                </div>
		                                <!-- /row -->
		                                <div class="row">
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <div class="styled-select">
		                                                <select name="country">
		                                                    <option value="" selected>Select your country</option>
		                                                    <option value="Europe">Europe</option>
		                                                    <option value="Asia">Asia</option>
		                                                    <option value="North America">North America</option>
		                                                    <option value="South America">South America</option>
		                                                </select>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <!-- /row -->
		                            </fieldset><!-- End Step two -->
		                            <fieldset title="Step 3">
		                                <legend>Message</legend>
		                                <div class="form-group">
		                                    <textarea name="additional_message" class="form-control" style="height:150px;" placeholder="Hello world....write your messagere here!"></textarea>
		                                </div>
		                                <div class="form-group terms">
		                                    <input name="terms" type="checkbox" class="icheck" value="yes">
		                                    <label>Please accept <a href="#" data-bs-toggle="modal" data-bs-target="#terms-txt">terms and conditions</a> ?</label>
		                                </div>
		                            </fieldset><!-- End Step three -->
		                            <input type="submit" class="finish" value="Finish!">
		                        </form>
		                    </div>
		                </div><!-- /Row -->
		            </div><!-- /Form_container -->

		        </div>
		    </div>
		    <!-- End row -->
		</main>

    </section>




    @include('includes.footer')



@include('includes.script')
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>

    <script>
        $('#smartwizard').smartWizard({
            selected: 0, // Initial selected step, 0 = first step
            theme: 'arrows', // theme for the wizard, related css need to include for other than default theme
            justified: true, // Nav menu justification. true/false
            autoAdjustHeight: false, // Automatically adjust content height
            backButtonSupport: true, // Enable the back button support
            enableUrlHash: false, // Enable selection of the step based on url hash
            Colors: 'green',
            transition: {
                animation: 'none', // Animation effect on navigation, none|fade|slideHorizontal|slideVertical|slideSwing|css(Animation CSS class also need to specify)
                speed: '400', // Animation speed. Not used if animation is 'css'
                easing: '', // Animation easing. Not supported without a jQuery easing plugin. Not used if animation is 'css'
                prefixCss: '', // Only used if animation is 'css'. Animation CSS prefix
                fwdShowCss: '', // Only used if animation is 'css'. Step show Animation CSS on forward direction
                fwdHideCss: '', // Only used if animation is 'css'. Step hide Animation CSS on forward direction
                bckShowCss: '', // Only used if animation is 'css'. Step show Animation CSS on backward direction
                bckHideCss: '', // Only used if animation is 'css'. Step hide Animation CSS on backward direction
            },
            toolbar: {
                position: 'bottom', // none|top|bottom|both
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                extraHtml: '' // Extra html to show on toolbar
            },
            anchor: {
                enableNavigation: false, // Enable/Disable anchor navigation
                enableNavigationAlways: false, // Activates all anchors clickable always
                enableDoneState: true, // Add done state on visited steps
                markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                unDoneOnBackNavigation: false, // While navigate back, done state will be cleared
                enableDoneStateNavigation: true // Enable/Disable the done state navigation
            },
            keyboard: {
                keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
                keyLeft: [37], // Left key code
                keyRight: [39] // Right key code
            },
            lang: { // Language variables for button
                next: 'Next',
                previous: 'Previous'
            },
            disabledSteps: [], // Array Steps disabled
            errorSteps: [], // Array Steps error
            warningSteps: [], // Array Steps warning
            hiddenSteps: [], // Hidden steps
            getContent: null // Callback function for content loading
        });
    </script>



</body>

</html>
