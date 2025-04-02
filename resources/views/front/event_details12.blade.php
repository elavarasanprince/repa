<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="description" content="REPA">

    <!-- ======== Page title ============ -->
    <title>REPA | Home</title>
   @include('includes.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/css/lightbox.css" integrity="sha512-DKdRaC0QGJ/kjx0U0TtJNCamKnN4l+wsMdION3GG0WVK6hIoJ1UPHRHeXNiGsXdrmq19JJxgIubb/Z7Og2qJww==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
 @include('includes.header')
  

    <div class="breadcrumb-wrapper bg-cover" style="background-image: url('assets/img/breadcrumb.jpg');">
        <!-- <div class="border-shape">
                <img src="assets/img/element.png" alt="shape-img">
            </div> -->
        <div class="line-shape">
            <img src="assets/img/line-element.png" alt="shape-img">
        </div>
        <div class="container">
            <div class="page-heading">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Event Details</h1>
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
                        <a href="event.php">
                            Event
                        </a>
                    </li>
                    <li>
                        <i class="fas fa-chevron-right"></i>
                    </li>
                    <li>
                        Event Details
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Project Section Start -->
   <section class="Project-details-section fix section-padding">
        <div class="container">
            <div class="project-details-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="project-details-items">
                            <div class="details-image">
                                
                              
                                    <img src="{{ asset('storage/app/public/' . $event->cover_image) }}" alt="Event Cover">

                              
                            </div>
                            <div class="row g-4 justify-content-between">
                                <div class="col-lg-7">
                                    <div class="details-content pt-5">
                                        <h3> EVENT DESCRIPTION</h3>
                                        <p>
                                           {{$event->description}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="project-catagory">
                                        <h3>EVENTS INFO: </h3>
                                        <ul>
                                            <li>
                                                        Event Details: <span>{{ $event->title }}</span>

                                            </li>
                                            <li>
                                                       Date: <span>{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</span>

                                            </li>
                                            <li>
                                                      Venue: <span>{{ $event->venue }}</span>

                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-4 pt-5">

                               <div class="swiper event-slider">
    <div class="swiper-wrapper">
        @foreach($eventImages as $image)
            <div class="swiper-slide">
                <a href="{{ asset('storage/app/public/' . $image) }}" data-lightbox="repa">
                    <img src="{{ asset('storage/app/public/' . $image) }}" class="img-fluid" alt="Event Image">
                </a>
            </div>
        @endforeach
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>










  
 @include('includes.footer')

   
    @include('includes.script')

    <script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
</script>



</body>

</html>