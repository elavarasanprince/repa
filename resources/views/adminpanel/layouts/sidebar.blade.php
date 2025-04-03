<!-- Page Sidebar Start-->
<style>
    .submenu li{
        padding:10px;
        color:#fff;
    }
    .submenu .li a{
      
        color:#fff;
    }
    
    .sidebar-list.active > a {
    background-color: #007bff; /* Change this to match your theme */
    color: white !important;
}

.submenu li a.active {
    font-weight: bold;
    text-decoration: underline;
}

</style>
<div class="sidebar-wrapper" style="background: linear-gradient(to bottom, #80CD29, #1B1F23);" data-layout="fill-svg">
    <div>
        <div class="logo-wrapper d-flex justify-content-center" style="background-color: white;">
            <a href="index.html" class="default-logo">
                <img class="img-fluid" src="{{url('adminpanel/assets/new-img/logo-white.png') }}" alt="Logo" style="max-width: 70px; height: auto;">
        <span style="color:green;font-size:16px;">REPA</span>    </a>
            <!-- small logo -->
            <a href="index.html" class="small-logo">
                <img class="img-fluid" src="{{url('adminpanel/assets/new-img/logo-white.png') }}" alt="Logo" style="max-width: 50px; height: auto;">
            </a>
            <div class="toggle-sidebar">
                <svg class="sidebar-toggle">
                    <use href="https:/admin.pixelstrap.net/dunzo/./assets/svg/icon-sprite.svg#toggle-icon"></use>
                </svg>
            </div>
        </div>

        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">



                    <!-- Menu Items -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav">
                            <i class="fa fa-tachometer-alt" ></i>
                            <span style="font-family: 'Open Sans', serif !important;">Dashboard</span>
                            <div class="according-menu">
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </a>
                    </li>


 <li class="sidebar-list">

                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}">

            <i class="fa fa-tachometer-alt" style="color: #ffffff; font-size: 18px;"></i> <!-- Doctor Icon -->
            <span style="font-family: 'Open Sans', serif !important;">Dashboard</span>
            <div class="according-menu">
                <i class="fa fa-angle-right"></i>
            </div>
        </a>

</li>
                    <li class="sidebar-list">

                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('members.index') }}">

            <i class="fa fa-user-md" style="color: #ffffff; font-size: 18px;"></i> <!-- Doctor Icon -->
            <span style="font-family: 'Open Sans', serif !important;">Members</span>
            <div class="according-menu">
                <i class="fa fa-angle-right"></i>
            </div>
        </a>

</li>

                    <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('events.index') }}">
                            <i class="fa fa-box" style="color: #ffffff; font-size: 18px;"></i> <!-- Patient Icon -->
                            <span style="font-family: 'Open Sans', serif !important;">Events </span>
                            <div class="according-menu">
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </a>
                    </li>

                  
       <li class="sidebar-list {{ request()->routeIs('circular.*') ? 'active' : '' }}">
    <a class="sidebar-link sidebar-title link-nav" href="javascript:void(0);" onclick="toggleSubMenu(this)">
        <i class="fa fa-download" style="color: #ffffff; font-size: 18px;"></i> 
        <span style="font-family: 'Open Sans', serif !important;">Downloads</span>
        <div class="according-menu">
            <i class="fa fa-angle-right"></i>
        </div>
    </a>
    <ul class="submenu" style="display: none; color:#fff; margin-left: 50px;">
        <li><a href="{{ route('circular.index') }}" style="color:#fff;" class="{{ request()->routeIs('circular.index') ? 'active' : '' }}">Circular</a></li>
        <li><a href="{{ route('circular.formindex') }}" style="color:#fff;" class="{{ request()->routeIs('circular.formindex') ? 'active' : '' }}">Form</a></li>
        <li><a href="{{ route('circular.annualindex') }}" style="color:#fff;" class="{{ request()->routeIs('circular.annualindex') ? 'active' : '' }}">Annual Report</a></li>
        <li><a href="{{ route('circular.commentsindex') }}" style="color:#fff;" class="{{ request()->routeIs('circular.commentsindex') ? 'active' : '' }}">Comments</a></li>
    </ul>
</li>

<script>
function toggleSubMenu(element) {
    var submenu = element.parentElement.querySelector(".submenu");
    var icon = element.querySelector(".according-menu i");

    if (submenu.style.display === "block") {
        submenu.style.display = "none";
        icon.classList.remove("fa-angle-down");
        icon.classList.add("fa-angle-right");
    } else {
        submenu.style.display = "block";
        icon.classList.remove("fa-angle-right");
        icon.classList.add("fa-angle-down");
    }
}
</script>




                    <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('forecast.index') }}">
                            <i class="fa fa-calendar-alt" style="color: #ffffff; font-size: 18px;"></i> <!-- Appointment Icon -->
                            <span style="font-family: 'Open Sans', serif !important;">Forecast & Actuals </span>
                            <div class="according-menu">
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </a>
                    </li>

                    <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('energysource.index') }}">
                            <i class="fas fa-bolt" style="color: #ffffff; font-size: 18px;"></i> <!-- Appointment Icon -->
                            <span style="font-family: 'Open Sans', serif !important;">Energy Sources
                            </span>
                            <div class="according-menu">
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </a>
                    </li>
                 
                    <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('availability') }}">
                            <i class="fas fa-solar-panel" style="color: #ffffff; font-size: 18px;"></i> <!-- Appointment Icon -->
                            <span style="font-family: 'Open Sans', serif !important;">Availability vs Demand Met

                            
                            </span>
                            <div class="according-menu">
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </a>
                    </li>

                    <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('latestnews') }}">
                            <i class="fas fa-solar-panel" style="color: #ffffff; font-size: 18px;"></i> <!-- Appointment Icon -->
                            <span style="font-family: 'Open Sans', serif !important;">Latest News

                            
                            </span>
                            <div class="according-menu">
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </a>
                    </li>

                <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('payments') }}">
                            <i class="fa fa-credit-card" style="color: #ffffff; font-size: 18px;"></i> <!-- Products Icon -->
                            <span style="font-family: 'Open Sans', serif !important;">Payments</span>
                            <div class="according-menu">
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </a>
                    </li>

                    <!--<li class="sidebar-list">-->
                    <!--    <a class="sidebar-link sidebar-title link-nav" href="">-->
                    <!--        <i class="fa fa-receipt" style="color: #ffffff; font-size: 18px;"></i> <!-- Orders Icon -->-->
                    <!--        <span style="font-family: 'Open Sans', serif !important;">Reports-->
                    <!--        </span>-->
                    <!--        <div class="according-menu">-->
                    <!--            <i class="fa fa-angle-right"></i>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</li>-->



                    <!-- Logout Section (Positioned at the bottom) -->
                    <div class="logout-section">
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt" style="color: #ffffff; font-size: 18px;"></i> <!-- Logout Icon -->
                                <span style="font-family: 'Open Sans', serif !important;">Logout</span>
                                <div class="according-menu">
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </a>
                        </li>
                    </div>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>

<!-- Hidden logout form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    @method('POST')
</form>

<style>>
/* Ensure the sidebar is using flexbox to position items */
/* Ensure the sidebar is using flexbox to position items */
.sidebar-main {
    display: flex;
    flex-direction: column;
    height: 100vh; /* Full height of the sidebar */
}

/* Push all items to the top, and place logout at the bottom */
.sidebar-links {
    flex-grow: 1; /* This pushes the logout section to the bottom */
    padding-bottom: 10px; /* Add some space below the menu items */
}

/* Style for the logout section */
.logout-section {
    margin-top: 100px !important; /* Push logout to the bottom */

    background-color: #333; /* Dark background color */
}

/* Style the logout link */
.logout-section .sidebar-link {
    color: #ffffff;
    font-family: 'Open Sans', serif !important;
    font-weight: bold;
    display: flex;
    align-items: center; /* Vertically center the icon and text */
    justify-content: center; /* Horizontally center the icon and text */
    padding: 10px 20px; /* Reduced padding to make the icon and text closer */
    transition: background-color 0.3s ease; /* Smooth transition for hover effect */
}

/* Remove extra space between icon and text by adjusting padding/margin */
.logout-section .sidebar-link i {
    margin-right: 8px; /* Adjust space between icon and text */
}

/* On hover, change background color */
.logout-section .sidebar-link:hover {
    background-color: #ff4e4e; /* Red background on hover */
}

/* Optional: Add a subtle border between the menu and logout section */
.sidebar-links li:last-child {
    border-bottom: 1px solid #ffffff;
}



</style>

