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
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Downloads</h1>
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
                        Downloads
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Start Best Services Area -->
    <section id="downloads" class="best-services-area bg-color pt-100 pb-100">
        <div class="container-fluid">
            
            <div class="tab services-list-tab">
                <ul class="tabs-list tabs">
                    <li>
                        <a href="#circulars" class="tab-link" data-tab="circulars">
                        <i class="flaticon-agriculture"></i>
                        <span>Circulars</span>
                        </a>
                    </li>


                    <li>
                        <a href="#forms" class="tab-link" data-tab="forms">
                        <i class="flaticon-personal"></i>
                        <span>Forms</span>
                        </a>

                    </li>
                    <li>
                    <a href="#annual-reports" class="tab-link" data-tab="annual-reports">
                    <i class="flaticon-loan-1"></i>
                    <span>Annual Reports</span>
                    </a>

                    </li>
                    <li>
                    <a href="#representations" class="tab-link" data-tab="representations">
                    <i class="flaticon-loan-1"></i>
                    <span>Representations / Comments</span>
                    </a>

                    </li>

                </ul>

                <div class="tab_content">
                    <div class="tabs_item" id="circulars">
                        <div class="row align-items-center justify-content-center">
                          @php
$circulars = DB::table('circulars')
    ->orderByDesc(DB::raw('CASE WHEN is_new = 1 THEN created_at ELSE NULL END')) 
    ->orderByDesc('date') 
    ->limit(10)->where('status','active')
    ->get();

@endphp

                            <div class="col-lg-8">
                                <ul>
                                    <li>
                                        @foreach($circulars as $circular)
                                        <div class="circulars-item">
                                            @if(auth()->check()) 
                                                <a href="{{ asset('storage/app/public/' . $circular->pdf) }}" target="_blank">
                                            @else
                                               <a href="{{ route('MemberLogin', ['redirect_url' => url()->current()]) }}">
                                            @endif
                                                {{-- <div class="news-item"> --}}
                                                    <div class="news-date">
                                                        <span class="mydate">
                                                            {{ date('Y', strtotime($circular->created_at . ' -1 year')) }}-{{ date('Y', strtotime($circular->created_at)) }}
                                                        </span>
                                                        <p class="news-month">JAN</p>
                                                        <span class="date">{{ date('d', strtotime($circular->created_at)) }}</span>
                                                    </div>
                                                    <div class=" news-content-1">
                                                        <h6>
                                                            <img src="{{ asset('assets/img/word.png') }}" class="pdf-label" alt="pdf">
                                                            {{ basename($circular->name) }} 
                                                            @if($circular->is_new == '1')
                                                                <span class="new-label">New</span>
                                                            @endif
                                                        </h6>
                                                    </div>
                                                {{-- </div> --}}
                                            </a>
                                        </div>
                                    @endforeach
                                    </li>
                                </ul>
                          


                               



                            </div>
                        </div>
                    </div>

                    <div class="tabs_item" id="forms">
                        <div class="container">
                              @php
$forms = DB::table('forms')->orderBy('created_at', 'desc')->where('status','active')->take(10)->get();
@endphp

<div class="col-md-10 m-auto">
                         
                         
                      <table id="FormTable" class="" style="color:#fff;">
    <thead>
        <tr>
            <th>SNo.</th>
            <th>Forms Name</th>
            <th>Download</th>
        </tr>
    </thead>
    <tbody>
        @foreach($forms as $index => $form)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $form->name }}</td>
            <td>
                @if(auth()->check()) 
                    @if($form->pdf)
                        <a href="{{ asset('storage/app/public/' . $form->pdf) }}" target="_blank" class="btn btn-primary">
                            Download
                        </a>
                    @else
                        No File Available
                    @endif
                @else
                             <a href="{{ route('MemberLogin', ['redirect_url' => url()->current()]) }}">Dowload</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!--</table>   -->
<!--                            <table class="table table-hover table-bordered">-->
<!--                                <thead>-->
<!--                                    <tr>-->
<!--                                        <th scope="col">S.no</th>-->
<!--                                        <th scope="col">Form Name</th>-->
<!--                                        <th scope="col">Download</th>-->

<!--                                    </tr>-->
<!--                                </thead>-->
<!--                                <tbody>-->
<!--                                    <tr>-->
<!--                                        <th scope="row">1</th>-->
<!--                                        <td>MEMBERSHIP APPLICATION FORM</td>-->
<!--                                        <td> <a class="downloadbtn" href="assets/pdf/REPA New Membership Application_18.12.2024.docx">Download</a> </td>-->

<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <th scope="row">2</th>-->
<!--                                        <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry</td>-->
<!--                                        <td> <a class="downloadbtn" href="#">Download</a> </td>-->

<!--                                    </tr>-->



<!--                                </tbody>-->
<!--                            </table>-->
                            
                            </div>
                        </div>
                    </div>

                    <div class="tabs_item" id="annual-reports">
                          <div class="container">
                              @php
$annual = DB::table('annualreport')->orderBy('created_at', 'desc')->take(10)->where('status','active')->get();
@endphp

<div class="col-md-10 m-auto">
                         
                         
                      <table id="AnnualTable" class="" style="color:#fff;">
    <thead>
        <tr>
            <th>SNo.</th>
            <th> Name</th>
            <th>Download</th>
        </tr>
    </thead>
    <tbody>
        @foreach($annual as $index => $annual)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $annual->name }}</td>
            <td>
                @if(auth()->check()) 
                    @if($annual->pdf)
                        <a href="{{ asset('storage/app/public/' . $annual->pdf) }}" target="_blank" class="btn btn-primary">
                            Download
                        </a>
                    @else
                        No File Available
                    @endif
                @else
                
                           
                    <a href="{{ route('MemberLogin', ['redirect_url' => url()->current()]) }}"  class="btn btn-primary">
                        Download
                    </a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

                            
                            </div>
                        </div>
                    </div>
                    <div class="tabs_item" id="representations">
                          <div class="row align-items-center justify-content-center">
                          @php
$comments = DB::table('comments')
    
    ->orderByDesc('date') 
    ->limit(10)->where('status','active')
    ->get();

@endphp

                            <div class="col-lg-8">
                             @foreach($comments as $comments)
    <div class="circulars-item no-border">
        @if(auth()->check()) 
            <a href="{{ asset('storage/app/public/' . $comments->pdf) }}" target="_blank">
        @else
            <a href="{{ route('MemberLogin', ['redirect_url' => url()->current()]) }}">
        @endif
            <div class="news-item">
                <div class="news-date">
                    <span class="mydate">
                        {{ date('Y', strtotime($comments->created_at . ' -1 year')) }}-{{ date('Y', strtotime($comments->created_at)) }}
                    </span>
                    <span class="date">{{ date('d', strtotime($comments->created_at)) }}</span>
                </div>
                <div class="news-content news-content-1">
                    <h6>
                        <img src="{{ asset('assets/img/word.png') }}" class="pdf-label" alt="pdf">
                        {{ basename($comments->pdf) }} 
                        @if($comments->is_new == '1')
                            <span class="new-label">New</span>
                        @endif
                    </h6>
                </div>
            </div>
        </a>
    </div>
@endforeach


                               



                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>
    <!-- End Best Services Area -->






    @include('includes.footer')



@include('includes.script')

    <script>
(function($) {
    // Initialize the first tab as active
    $('.tab ul.tabs-list').addClass('active').find('> li:eq(0)').addClass('current');
    // Tab click functionality
    $('.tab ul.tabs-list li').on('click', function(g) {
        var tab = $(this).closest('.tab'),
            index = $(this).closest('li').index();

        // Remove active class from all tabs and add to the clicked tab
        tab.find('ul.tabs-list > li').removeClass('current');
        $(this).closest('li').addClass('current');

        // Slide up all tabs except the current one
        tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
        // Slide down the current tab
        tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();

        // Prevent default link behavior
        g.preventDefault();
    });
})(jQuery);

$(document).ready(function () {
    // Function to show the corresponding tab based on the hash
    function showTab(hash) {
        // Hide all tabs and remove 'current' class from all tab links
        $('.tabs_item').hide(); // Replaces slideUp with hide()
        $('.tab-link').removeClass('actives');
        $('.tab ul.tabs-list > li').removeClass('current'); // Remove the 'current' class

        // Show the target tab and add the active class to the corresponding link
        $(hash).show(); // Replaces slideDown with show()
        $('.tab-link[href="' + hash + '"]').addClass('actives');

        // Find the tab item and make it 'current'
        $('.tab ul.tabs-list > li').each(function() {
            if ($(this).find('a').attr('href') === hash) {
                $(this).addClass('current');
            }
        });
    }

    // Check the hash when the page loads or when the hash changes
    var hash = window.location.hash;
    if (hash) {
        showTab(hash); // Show the tab based on the hash
    } else {
        // Default to the first tab if no hash is present
        showTab('#circulars');
    }

    // When a tab link is clicked, update the hash and show the corresponding tab
    $('.tab-link').on('click', function (e) {
        e.preventDefault(); // Prevent default anchor behavior
        var target = $(this).attr('href'); // Get the hash from the href attribute
        window.location.hash = target; // Change the URL hash
        showTab(target); // Show the corresponding tab
    });

    // Listen for hash changes and update the displayed tab accordingly
    $(window).on('hashchange', function () {
        showTab(window.location.hash); // Show the tab based on the new hash
    });
});



addEventListener("click", (event) => {

    $('html, body').animate({
        scrollTop: $("#downloads").offset().top - 100 // Adjust for any header or space
    }, 200); // Smooth scroll to the top of the wizard container (optional)
});
addEventListener("DOMContentLoaded", (event) => {

$('html, body').animate({
    scrollTop: $("#downloads").offset().top - 100 // Adjust for any header or space
}, 200); // Smooth scroll to the top of the wizard container (optional)
});

    </script>
    

<script>
    $(document).ready(function () {
        $('#FormTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('#AnnualTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
</script>

</body>

</html>
