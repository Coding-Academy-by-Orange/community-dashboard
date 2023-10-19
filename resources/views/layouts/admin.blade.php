<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="admin dashboard">
    <meta name="keywords" content="statistics, registration,coding,orange, laravel, learning, OCA">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <link rel="shortcut icon"
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Orange_logo.svg/1200px-Orange_logo.svg.png"
        type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.1/chart.min.js"
        integrity="sha512-2uu1jrAmW1A+SMwih5DAPqzFS2PI+OPw79OVLS4NJ6jGHQ/GmIVDDlWwz4KLO8DnoUmYdU8hTtFcp8je6zxbCg=="
        crossorigin="anonymous"></script> --}}

        <script src="https://cdn.plot.ly/plotly-2.26.0.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    <link
        href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/date-1.5.1/sc-2.2.0/sb-1.6.0/sp-2.2.0/sl-1.7.0/datatables.min.css"
        rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/date-1.5.1/sc-2.2.0/sb-1.6.0/sp-2.2.0/sl-1.7.0/datatables.min.js">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.3.2/dist/css/orange-helvetica.min.css" rel="stylesheet"
        integrity="sha384-A0Qk1uKfS1i83/YuU13i2nx5pk79PkIfNFOVzTcjCMPGKIDj9Lqx9lJmV7cdBVQZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.3.2/dist/css/boosted.min.css" rel="stylesheet"
        integrity="sha384-fyenpx19UpfUhZ+SD9o9IdxeIJKE6upKx0B54OcXy1TqnO660Qw9xw6rOASP+eir" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/boosted@5.3.1/dist/js/boosted.min.js"
        integrity="sha384-5/uuaktuMuP89rRLLF12Nmffr7aMWkLWFVq2xzMjqdXlOiMsRRHpbz3oG92Gvj7u" crossorigin="anonymous">
    </script>
    <!-- Include the html2canvas library -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body>
    <header class="sticky-top">
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg" aria-label="navigation">
            <div class="container-xxl">
                <div class="navbar-brand me-auto me-lg-4">
                    <a class="stretched-link" href="{{ route('admin.dashboard') }}">
                        <img src="https://boosted.orange.com/docs/5.2/assets/brand/orange-logo.svg" width="50"
                            height="50" alt="Boosted - Back to Home" loading="lazy">
                    </a>
                    <h1 class="title">
                        @if (Auth::guard('admin')->user()->component == 'digitalcenter')
                            Orange Digital Centers
                        @elseif (Auth::guard('admin')->user()->component == 'fablab')
                            FabLab
                        @elseif (Auth::guard('admin')->user()->component == 'codingacademy')
                            Coding Academy
                        @elseif (Auth::guard('admin')->user()->component == 'bigbyorange')
                            Big By Orange
                        @elseif (Auth::guard('admin')->user()->component == 'codingschool')
                            Coding School
                        @elseif (Auth::guard('admin')->user()->is_super)
                            Orange Dashboard
                        @endif
                    </h1>
                </div>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target=".global-header-3" aria-controls="global-header-3.1 global-header-3.2"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="global-header-3.1" class="navbar-collapse collapse me-lg-auto global-header-3">
                    <ul class="navbar-nav">
                        <li class=" nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                        <li class=" nav-item"><a href="{{ route('users.index') }}" class="nav-link">Manage
                                Applicants</a>
                        </li>
                        <li class=" nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Manage Activities
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="{{ route('activity.index') }}"> Activities</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('location.index') }}">Locations</a></li>
                                </ul>
                            </a>
                        </li>
                        @if (Auth::guard('admin')->user()->is_super)
                            @if (Auth::guard('admin')->user()->component == 'codingacdemy')
                                <li class=" nav-item"><a href="{{ route('notifications.index') }}"
                                        class="nav-link">Manage
                                        Notifications</a>
                                </li>
                                <li class=" nav-item"><a href="{{ route('questionnaires.index') }}"
                                        class="nav-link">Manage
                                        Questionnaires</a>
                                </li>
                            @endif
                            <li class=" nav-item"><a href="{{ route('admins.index') }}" class="nav-link">Manage
                                    Admins</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div id="global-header-3.2" class="navbar-collapse collapse d-sm-flex global-header-3">
                    <ul class="navbar-nav flex-row">
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link dropdown-user-link " href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none d-flex flex-row">
                                    <span class="user-name text-capitalize">{{ Auth::guard('admin')->user()->fname }}
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pb-0">
                                <a class="dropdown-item " href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                    <i class="bx bx-power-off mr-50"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- END: Header-->
    <!-- BEGIN: Content-->
    <div class="container-fluid mt-4">
        @yield('main')
    </div>
    @yield('script')
    {{-- sweet alert cdn and use --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
<!-- END: Body-->

</html>
