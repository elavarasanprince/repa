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

    <div class="breadcrumb-wrapper bg-cover" >
        <!-- <div class="border-shape">
                <img src="assets/img/element.png" alt="shape-img">
            </div> -->
        <div class="line-shape">
            <img src="assets/img/line-element.png" alt="shape-img">
        </div>
        <div class="container">
            <div class="page-heading">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Member Details</h1>
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
                        Member Details
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <section class="teams ptb-100">
        <div class="rs-team-single ">
            <div class="container">
                <div class="section-title text-center pb-5">
                    <span class="wow fadeInUp">Member Details</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        Member Details
                    </h2>
                </div>
                <div class="btm-info-team">
                    <div class="row align-items-center">
                        <!--<div class="col-lg-4 md-mb-50">-->
                        <!--    <div class="images-part">-->
                        <!--        <img src="https://www.tasma.in/sites/default/files/member-photos/vaitheeswaran.jpg"-->
                        <!--            alt="images">-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-lg-8">
                            <div class="con-info">
                            <span class="degr">{{ $profile->oftheCompany}}</span>
                                <span class="designation-info">{{ $profile->designation}}</span>
                                <h2 class="title"> {{ $profile->member_name}} <br></h2>

                                <div class="ps-informations">

                                    <ul class="personal-info">


                                        <li class="team-list"><i class="fa-solid fa-location-dot"></i>
                                            <div class="content"> <span>{{$profile->father_name }}</span><br>
                                                <span>{{$profile->address }}</span><br>
                                              ,
                                                <span>{{$profile->pincode }} </span> -<span>{{$profile->pincode }} 600 017</span></div>

                                        </li>
                                        <li class="team-list"><i class="fa-solid fa-phone"></i>
                                            <div class="content"> {{ $profile->contactno }}
                                            </div>
                                        </li>
                                        <li class="team-list"><i class="fa-solid fa-mobile"></i>
                                            <div class="content"> {{ $profile->wcontact}}
                                            </div>
                                        </li>
                                        <li class="team-list"><i class="fa-solid fa-envelope"></i>
                                            <div class="content"> {{$profile->email }}
                                            </div>
                                        </li>
                                        <li class="team-list"><i class="fa-solid fa-globe"></i>
                                            <div class="content"> {{$profile->url }}
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>









            </div>
        </div>

    </section>


    @include('includes.footer')


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var preloader = document.getElementById("preloader");
        if (preloader) {
            preloader.style.display = "none"; // Hide preloader
        }
    });
</script>




</body>

</html>
