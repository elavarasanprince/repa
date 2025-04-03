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

    <div class="breadcrumb-wrapper bg-cover" style="background-image: url('assets/img/breadcrumb.jpg');">
        <!-- <div class="border-shape">
                <img src="assets/img/element.png" alt="shape-img">
            </div> -->
        <div class="line-shape">
            <img src="assets/img/line-element.png" alt="shape-img">
        </div>
        <div class="container">
            <div class="page-heading">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Our Latest Event</h1>
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
                    Events
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <!-- News Section Start -->
    <section class="news-section fix section-padding" style="padding:50px;">
        <div class="container ">

               
@php
$events = DB::table('events')->get();
@endphp

<div class="row justify-content-center">
    @foreach($events as $event)
        <div class="col-lg-4">

            <a href="{{ route('event_details', ['id' => $event->id]) }}">

            <div class="news-card-items">
                <div class="news-image">
                  
                        <img src="{{ asset('storage/app/public/' . $event->cover_image) }}" alt="Cover Image" width="100">
                   
                        <div class="post-date">
                            <h3>
                                {{ \Carbon\Carbon::parse($event->date)->day }} <br>
                                <span>{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                            </h3>
                        </div>
                   
                </div>
                <div class="news-content">
                    <h3>

                        <a href="{{ route('event_details', ['id' => $event->id]) }}">{{ $event->title }}</a>

                    </h3>
                   <a href="{{ route('event_details', ['id' => $event->id]) }}"
 class="theme-btn-2 mt-3">
                        read More
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>

        </a>

        </div>
    @endforeach
</div>




           </div>

     
    </section>

    @include('includes.footer')



@include('includes.script')



</body>

</html>
