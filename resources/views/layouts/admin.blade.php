<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="admin dashboard">
    <meta name="keywords" content="statistics, registration,coding,orange, laravel, learning, OCA">
    <title> @yield('title') </title>

    {{-- 
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}"> --}}
    <!-- END: Vendor CSS-->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.3.2/dist/css/orange-helvetica.min.css" rel="stylesheet"
        integrity="sha384-A0Qk1uKfS1i83/YuU13i2nx5pk79PkIfNFOVzTcjCMPGKIDj9Lqx9lJmV7cdBVQZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.3.2/dist/css/boosted.min.css" rel="stylesheet"
        integrity="sha384-fyenpx19UpfUhZ+SD9o9IdxeIJKE6upKx0B54OcXy1TqnO660Qw9xw6rOASP+eir" crossorigin="anonymous">
    {{-- <link rel="preconnect" href="https://code.jquery.com" crossorigin="anonymous"> --}}
    <link rel="shortcut icon"
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Orange_logo.svg/1200px-Orange_logo.svg.png"
        type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.1/chart.min.js"
        integrity="sha512-2uu1jrAmW1A+SMwih5DAPqzFS2PI+OPw79OVLS4NJ6jGHQ/GmIVDDlWwz4KLO8DnoUmYdU8hTtFcp8je6zxbCg=="
        crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/sc-2.0.5/sp-2.0.0/sl-1.3.4/datatables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/sc-2.0.5/sp-2.0.0/sl-1.3.4/datatables.min.js">
    </script>


    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
 </script> -->

    {{-- <link rel="stylesheet" type="text/css"
     href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/sc-2.0.5/sp-2.0.0/sl-1.3.4/datatables.min.css" /> --}}

    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> -->
    {{-- <script type="text/javascript"
     src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/sc-2.0.5/sp-2.0.0/sl-1.3.4/datatables.min.js"></script> --}}



    {{-- <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/pages/chart-chartist.min.css') }}">
    <!-- END: Page CSS-->
    @yield('head')

    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/custom/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}"> --}}


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
                        @if (Auth::user()->component == 'digitalcenter')
                            Orange Community Digital Centers
                        @elseif (Auth::user()->component == 'fablab')
                            FabLab
                        @elseif (Auth::user()->component == 'codingacademy')
                            Coding Academy
                        @elseif (Auth::user()->component == 'bigbyorange')
                            Big By Orange
                        @elseif (Auth::user()->component == 'codingschool')
                            Coding School
                        @elseif (Auth::user()->is_super)
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
                        <li class=" nav-item"><a href="{{ route('activity.index') }}" class="nav-link">Manage
                                Activities</a>
                        </li>
                        @if (Auth::user()->is_super)
                            <li class=" nav-item"><a href="{{ route('notifications.index') }}" class="nav-link">Manage
                                    Notifications</a>
                            </li>
                            <li class=" nav-item"><a href="{{ route('questionnaires.index') }}" class="nav-link">Manage
                                    Questionnaires</a>
                            </li>
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
    <!-- END: Content-->


    <!-- BEGIN: Page Vendor JS-->
    {{-- <script src="{{ asset('admin-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin-assets/vendors/js/extensions/moment.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/pickers/daterange/daterangepicker.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src=".{{ asset('admin-assets/vendors/js/extensions/dragula.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/extensions/swiper.min.js') }}"></script> --}}
    <!-- END: Page Vendor JS-->
    {{-- 
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin-assets/js/scripts/datatables/datatable.min.js') }}"></script> --}}
    <!-- END: Page JS-->
    {{-- <script src="{{ asset('admin-assets/js/scripts/forms/wizard-steps.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/charts/chart-chartist.min.js') }}"></script> --}}
    @yield('script')
    {{-- sweet alert cdn and use --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $(".zero-configuration").DataTable({
                searchPanes: true,
                deferRender: true,
                columnDefs: [{
                        targets: [1],
                        render: function(data, type) {
                            console.debug(type);
                            return type === "searchpanes" ?
                                data :
                                '<a href="https://datatables.net/forums/discussion/72109/searchpanes-v2-0-0-viewcount-displays-0-with-orthogonal-data-type-sp">' +
                                data +
                                "</a>";
                        },
                        searchPanes: {
                            show: true,
                            orthogonal: "searchpanes"
                        }
                    },
                    {
                        targets: [2],
                        searchPanes: {
                            show: true,
                            orthogonal: "searchpanes"
                        },
                        render: function(data, type) {
                            console.debug(type);
                            return type === "display" ?
                                data :
                                '<a href="https://datatables.net/forums/discussion/72109/searchpanes-v2-0-0-viewcount-displays-0-with-orthogonal-data-type-sp">' +
                                data +
                                "</a>";
                        }
                    }
                ],
                // ajax: "https://datatables.net/examples/ajax/data/data_5k.txt", /* <-- keep loading indefinitely */

            });
            table.searchPanes.container().prependTo(table.table().container());
            table.searchPanes.resizePanes();
        });
    </script>
</body>
<!-- END: Body-->

</html>
