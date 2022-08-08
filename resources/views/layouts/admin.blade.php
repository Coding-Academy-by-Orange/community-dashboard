<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description"
          content="admin dashboard - registration process - coding academy by orange ">
    <meta name="keywords"
          content="statistics, registration,coding,orange, laravel, learning, OCA">
    <meta name="author" content="Marya Alzubi">
    <title> @yield('title') </title>

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
          rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/extensions/dragula.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/extensions/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/bootstrap-extended.min.css')}}">
    <!-- Copyright © 2014 Monotype Imaging Inc. All rights reserved -->
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.0/dist/css/orangeHelvetica.min.css" integrity="sha384-ZWV5rANfkZIt/7HDFToWXT+5LfpEbtDN22vw9WhARiDc+o6zJ4qxwdTwskCbe8NK" crossorigin="anonymous">--}}
    <!-- Copyright © 2016 Orange SA. All rights reserved -->
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.0/dist/css/orangeIcons.min.css" integrity="sha384-7/+XhgsfiKJOYwQYLCI6P8bz89YJEKD2GLErv3KrHbxQ4wPcJ9JcqVZVKAglgBJP" crossorigin="anonymous">--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.0/dist/css/boosted.min.css" integrity="sha384-gqlCljYk+czxYG/OEUHPObOqdFdx4RFpXrAy+z6dbWdeD1ybOujFGA+lKVLnXtxx" crossorigin="anonymous">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/themes/semi-dark-layout.min.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/pages/chart-chartist.min.css')}}">
    <!-- END: Page CSS-->
    @yield('head')

    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/custom/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.1/chart.min.js" integrity="sha512-2uu1jrAmW1A+SMwih5DAPqzFS2PI+OPw79OVLS4NJ6jGHQ/GmIVDDlWwz4KLO8DnoUmYdU8hTtFcp8je6zxbCg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body>
<div class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click"
     data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top border-bottom ">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);"><i
                                        class="ficon bx bx-menu"></i></a></li>
                        </ul>
                    </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link " href="javascript:void(0);"
                               data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none d-flex flex-row">

                                    <span class="user-name text-capitalize">{{ Auth::guard('admin')->user()->fname}}   </span>
                                    <i class="bx bx-caret-down mr-50"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pb-0">
                                <a class="dropdown-item " href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                    <i class="bx bx-power-off mr-50"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                        <h4 class="text-warning mb-0">Coding Academy </h4></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
                data-icon-style="lines">
                <li class=" nav-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-line-chart" ></i><span
                            class="menu-title text-truncate">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="{{route('users.index')}}"><i class="bx bxs-user-detail"
                                                                           ></i><span
                            class="menu-title text-truncate"> Manage Applicants </span></a>
                </li>
                <li class=" nav-item"><a href="{{route('notifications.index')}}"><i class="bx bxs-bell-ring"
                                                                           ></i><span
                            class="menu-title text-truncate"> Manage Notifications </span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('questionnaires.index') }}"><i class="bx bx-help-circle"
                                                                                       ></i><span
                            class="menu-title text-truncate">Manage Questionnaires </span></a>
                </li>
                <li class=" nav-item"><a href="{{route('admins.index')}}" ><i class="bx bx-user-circle"></i><span
                            class="menu-title text-truncate" > Manage Admins </span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
            @yield('main')
            </div>
        </div>
    </div>
     <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('admin-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('admin-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js')}}"></script>
    <script src="{{asset('admin-app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js')}}"></script>
    <script src="{{asset('admin-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('admin-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/extensions/moment.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src=".{{asset('admin-assets/vendors/js/extensions/dragula.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/extensions/swiper.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin-assets/js/scripts/configs/vertical-menu-light.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/core/app.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/components.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/footer.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/customizer.min.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin-assets/js/scripts/pages/dashboard-ecommerce.min.js')}}"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin-assets/js/scripts/datatables/datatable.min.js')}}"></script>
    <!-- END: Page JS-->
    <script src="{{asset('admin-assets/js/scripts/forms/wizard-steps.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/charts/chart-chartist.min.js')}}"></script>
    @yield('script')
    {{-- sweet alert cdn and use --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // create a record
        @if(session('status_store'))
        swal({
            title: "{{session('status_store')}}",
            icon: "success",
            button: "ok",
        });
        @endif
        // update a record
        @if(session('status_update'))
        swal({
            title: "{{session('status_update')}}",
            icon: "success",
            button: "ok",
        });
        @endif
        // delete a record
        @if(session('status_destroy'))
        swal({
            title: "{{session('status_destroy')}}",
            icon: "error",
            button: "ok",
        });
        @endif
    </script>
</div>
</body>
<!-- END: Body-->
</html>
