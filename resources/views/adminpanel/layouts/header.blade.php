<!-- Page Header Start-->
<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper">
                <a href="index.html">
                    <img class="img-fluid for-light logo" src="{{url('adminpanel/assets/new-img/logo-white.png') }}" alt="" width="50px;">
                    <img class="img-fluid for-dark logo" src="{{url('adminpanel/assets/new-img/logo-white.png') }}" alt="">
                </a>
            </div>
            <div class="toggle-sidebar">
                <svg class="sidebar-toggle">
                    <use href="https:/admin.pixelstrap.net/dunzo/assets/svg/icon-sprite.svg#stroke-animation"></use>
                </svg>
            </div>
        </div>

        <div class="toggle-sidebar-wrapper col-auto p-0">
            <div class="sidemenu-toggle animated-arrow header-link hor-toggle horizontal-navtoggle inline-flex items-center" id="toggle-sidebar">
                <svg class="sidebar-toggle" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M4 6h16M4 12h16M4 18h16"></path> <!-- Hamburger icon -->
                </svg>
            </div>
        </div>

        <div class="nav-right col-xxl-7 col-xl-6 col-auto box-col-6 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
                <li class="profile-nav onhover-dropdown p-0">
                    <div class="d-flex align-items-center profile-media">

                        <div class="flex-grow-1">
                            <span>Admin</span>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Header Ends-->

<style>
    .img-fluid {
        background-color: white;
    }

    /* Basic styles for the header */
    .page-header {
        position: relative;
        background-color: #fff;
        padding: 10px 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Sidebar Toggle Button Styles */
    .sidemenu-toggle {
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }

    .sidemenu-toggle svg {
        width: 30px;
        height: 30px;
        stroke: #000;
        stroke-width: 2;
    }

    .logo {
        transition: width 0.3s ease;
    }

    /* Sidebar toggle - hide content */
    .sidebar-wrapper.sidebar-collapsed {
        width: 80px;
    }
    .sidebar-collapsed #sidebar-menu .sidebar-links span {
        display: none;
    }
    .sidebar-collapsed #sidebar-menu .sidebar-links .sidebar-list {
        margin: 20px auto;
    }
    .page-wrapper.compact-wrapper .page-body-wrapper .page-body.sidebar-collapsed
 {
        margin-top: 99px !important;
    margin-left: 90px !important;
    }
    .page-wrapper.compact-wrapper .page-header.sidebar-collapsed {
        margin-left: 83px;
    width: calc(100% - 100px);
    }

    .sidebar-collapsed #sidebar-menu .sidebar-links i {
        font-size: 22px;
    }

    .sidebar-collapsed .logo {
        width: 30px;
    }
    .default-logo.sidebar-collapsed {
        display: none;
    }
    .small-logo {
        display: none;
    }
    .small-logo.sidebar-collapsed {
        display: block;
    }


    .page-header{
        height: 52px;
    }





</style>


<script>
    document.getElementById('toggle-sidebar').addEventListener('click', function () {
    // Toggle the collapsed class on the sidebar
    document.querySelector('.sidebar-wrapper').classList.toggle('sidebar-collapsed');
    // Toggle the visibility of the sidebar content and logo
    document.querySelector('.sidebar-main').classList.toggle('collapsed');
    document.querySelector('.page-body').classList.toggle('sidebar-collapsed');
    document.querySelector('.page-header').classList.toggle('sidebar-collapsed');
    document.querySelector('.small-logo').classList.toggle('sidebar-collapsed');
    document.querySelector('.default-logo').classList.toggle('sidebar-collapsed');

});

</script>
