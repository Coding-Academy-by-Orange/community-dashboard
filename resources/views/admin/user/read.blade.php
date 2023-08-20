<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="admin dashboard - registration process - coding academy by orange ">
    <meta name="keywords" content="admin dashboard - registration process - coding academy by orange  ">
    <meta name="author" content="Marya Alzubi">
    <title> Read Applicants </title>

    {{--    <link rel="apple-touch-icon" href="{{asset('admin-assets/images/ico/apple-icon-120.html')}}"> --}}
    {{--    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin-assets/images/logo/logo.svg')}}" /> --}}
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/extensions/dragula.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/vendors/css/pickers/daterange/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/extensions/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/bootstrap-extended.min.css') }}">
    <!-- Copyright © 2014 Monotype Imaging Inc. All rights reserved -->
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.0/dist/css/orangeHelvetica.min.css" integrity="sha384-ZWV5rANfkZIt/7HDFToWXT+5LfpEbtDN22vw9WhARiDc+o6zJ4qxwdTwskCbe8NK" crossorigin="anonymous"> --}}
    <!-- Copyright © 2016 Orange SA. All rights reserved -->
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.0/dist/css/orangeIcons.min.css" integrity="sha384-7/+XhgsfiKJOYwQYLCI6P8bz89YJEKD2GLErv3KrHbxQ4wPcJ9JcqVZVKAglgBJP" crossorigin="anonymous"> --}}
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.0/dist/css/boosted.min.css" integrity="sha384-gqlCljYk+czxYG/OEUHPObOqdFdx4RFpXrAy+z6dbWdeD1ybOujFGA+lKVLnXtxx" crossorigin="anonymous"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/themes/semi-dark-layout.min.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/pages/chart-chartist.min.css') }}">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/pages/app-users.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/custom/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

    <link rel="shortcut icon"
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Orange_logo.svg/1200px-Orange_logo.svg.png"
        type="image/x-icon">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.1/chart.min.js"
        integrity="sha512-2uu1jrAmW1A+SMwih5DAPqzFS2PI+OPw79OVLS4NJ6jGHQ/GmIVDDlWwz4KLO8DnoUmYdU8hTtFcp8je6zxbCg=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu border-bottom ">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <div class="navbar-header">
                            <ul class="nav navbar-nav flex-row">
                                <li class="nav-item mr-auto"><a class="navbar-brand"
                                        href="{{ route('admin.dashboard') }}">
                                        <h4 class="text-warning ml-1">
                                            @if (Auth::user()->is_super)
                                                Orange Dashboard
                                            @elseif (Auth::user()->component == 'digitalcenter')
                                            Orange Community Digital Centers
                                            @elseif (Auth::user()->component == 'fablab')
                                                FabLab
                                            @elseif (Auth::user()->component == 'codingacademy')
                                                Coding Academy
                                            @elseif (Auth::user()->component == 'bigbyorange')
                                                Big By Orange
                                            @endif
                                        </h4>
                                    </a></li>
                            </ul>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);"><i
                                        class="ficon bx bx-menu"></i></a></li>
                        </ul>
                    </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);"
                                data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none d-flex flex-row">

                                    <span class="user-name text-capitalize">{{ Auth::guard('admin')->user()->fname }}
                                    </span>
                                    <i class="bx bx-caret-down mr-50"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pb-0">
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
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
        </div>
    </nav>
    <!-- END: Header-->
    <div class="d-md-flex flex-md-equal w-100">
        <div class="col-lg-3 mt-1">
            <div class="mt-1 ">
               
                
                <form method="post" action="@if (Auth::user()->component == 'digitalcenter')
                    {{route('ODC.filter')}}
                @elseif (Auth::user()->component == 'fablab')
                    {{route('fablab.filter')}}
                @elseif (Auth::user()->component == 'bigbyorange')
                    {{route('big.filter')}}
                @endif">
                    @csrf
                    <div class="rounded d-flex flex-wrap">
                        {{-- <div class="col-12 col-sm-12 col-lg-6">
                            <label for="submission">Application Status</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="submission" name="status">
                                    <option @if ($status ?? '' == 'All') selected @endif value="">All
                                    </option>
                                    <option @if ($status ?? '' == 'submitted') selected @endif value="submitted">Fully
                                        Submitted
                                    </option>
                                    <option @if ($status ?? '' == 'in_progress') selected @endif value="in_progress">
                                        Partial Submitted
                                    </option>
                                </select>
                            </fieldset>
                        </div> --}}
                        {{-- <div class="col-12 col-sm-12 col-lg-6">
                            <label for="result_1">Results</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="result_1" name="result_1">
                                    <option @if ($result_1 == 'All') selected @endif value="">All
                                    </option>
                                    <option @if ($result_1 == '1. Accepted – 1st Filtration – Orange') selected @endif
                                        value="1. Accepted – 1st Filtration – Orange">1. Accepted – 1st Filtration –
                                        Orange
                                    </option>

                                    <option @if ($result_1 == '2. Maybe – 1st Filtration – Orange') selected @endif
                                        value="2. Maybe – 1st Filtration – Orange">2. Maybe – 1st Filtration – Orange
                                    </option>
                                    <option @if ($result_1 == '3. Rejected – Age – Orange') selected @endif
                                        value="3. Rejected – Age – Orange">
                                        3. Rejected – Age – Orange
                                    </option>

                                    <option @if ($result_1 == '4. Rejected – 1st Filtration – Orange') selected @endif
                                        value="4. Rejected – 1st Filtration – Orange">
                                        4. Rejected – 1st Filtration – Orange
                                    </option>

                                    <option @if ($result_1 == '5. Accepted – Pre Final List – Simplon') selected @endif
                                        value="5. Accepted – Pre Final List – Simplon">
                                        5. Accepted – Pre Final List – Simplon
                                    </option>
                                    <option @if ($result_1 == '6. Accepted – Final List – Simplon') selected @endif
                                        value="6. Accepted – Final List – Simplon">
                                        6. Accepted – Final List – Simplon
                                    </option>
                                    <option @if ($result_1 == '7. Rejected – Test Result (Sololearn + English) ') selected @endif
                                        value="7. Rejected – Test Result (Sololearn + English) ">
                                        7. Rejected – Test Result (Sololearn + English) </option>

                                    <option @if ($result_1 == 'rejected_aqaba') selected @endif
                                        value="8. Rejected – Motivational Qs – Simplon">8. Rejected – Motivational Qs –
                                        Simplon
                                    </option>
                                    <option @if ($result_1 == '9. Accepted – 50 Students After Interviews – Orange') selected @endif
                                        value="9. Accepted – 50 Students After Interviews – Orange">9. Accepted – 50
                                        Students After Interviews – Orange
                                    </option>

                                    <option @if ($result_1 == '10. Maybe – Final List After Interviews - Orange') selected @endif
                                        value="10. Maybe – Final List After Interviews - Orange">
                                        10. Maybe – Final List After Interviews - Orange
                                    </option>
                                    <option @if ($result_1 == '11. Rejected – Final List After Interviews - Orange') selected @endif
                                        value="11. Rejected – Final List After Interviews - Orange">11. Rejected –
                                        Final List After Interviews - Orange
                                    </option>
                                </select>
                            </fieldset>
                        </div> --}}
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="">Nationality</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="" name="nationality">
                                    <option @if ($nationality == 'All') selected @endif value="">
                                        All
                                    </option>
                                    <option @if ($nationality == '1') selected @endif value="1">
                                        Jordanian
                                    </option>
                                    <option @if ($nationality == '0') selected @endif value="0">
                                        Non
                                        Jordanian
                                    </option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="">Gender</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="" name="gender">
                                    <option @if ($gender == 'All') selected @endif value="">All
                                    </option>
                                    <option @if ($gender == '1') selected @endif value="1">Male
                                    </option>
                                    <option @if ($gender == '0') selected @endif value="0">Female
                                    </option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="">Birth Year</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="" name="year">
                                    <option value="">All
                                        @if ($year == 'All')
                                            selected
                                        @endif
                                    </option>
                                    <option value="1989" @if ($year == '1989') selected @endif>1989
                                    </option>
                                    <option value="1990" @if ($year == '1990') selected @endif>1990
                                    </option>
                                    <option value="1991" @if ($year == '1991') selected @endif>1991
                                    </option>
                                    <option value="1992" @if ($year == '1992') selected @endif>1992
                                    </option>
                                    <option value="1993" @if ($year == '1993') selected @endif>1993
                                    </option>
                                    <option value="1994" @if ($year == '1994') selected @endif>1994
                                    </option>
                                    <option value="1995" @if ($year == '1995') selected @endif>1995
                                    </option>
                                    <option value="1996" @if ($year == '1996') selected @endif>1996
                                    </option>
                                    <option value="1997" @if ($year == '1997') selected @endif>1997
                                    </option>
                                    <option value="1998" @if ($year == '1998') selected @endif>1998
                                    </option>
                                    <option value="1999" @if ($year == '1999') selected @endif>1999
                                    </option>
                                    <option value="2000" @if ($year == '2000') selected @endif>2000
                                    </option>
                                    <option value="2001" @if ($year == '2001') selected @endif>2001
                                    </option>
                                    <option value="2002" @if ($year == '2002') selected @endif>2002
                                    </option>
                                    <option value="2003" @if ($year == '2003') selected @endif>2003
                                    </option>
                                    <option value="2004" @if ($year == '2004') selected @endif>2004
                                    </option>
                                    <option value="2005" @if ($year == '2005') selected @endif>2005
                                    </option>
                                </select>
                            </fieldset>
                        </div>
                        {{-- <div class="col-12 col-sm-12 col-lg-6">
                            <label for="">Commitment</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="" name="commitment">
                                    <option @if ($commitment ?? '' == 'All') selected @endif value="">
                                        All
                                    </option>
                                    <option @if ($commitment ?? '' == '1') selected @endif value="1">
                                        Committed
                                    </option>
                                    <option @if ($commitment ?? '' == '0') selected @endif value="0">
                                        Not
                                        Committed
                                    </option>
                                </select>
                            </fieldset>
                        </div> --}}
                        {{-- <div class="col-12 col-sm-12 col-lg-6">
                            <label for="educational_background">Edu. Background</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="educational_background"
                                    name="educational_background">
                                    <option @if ($educational_background == 'All') selected @endif value="">All
                                    </option>
                                    <option @if ($educational_background == 'it_background') selected @endif value="it_background">
                                        It Background
                                    </option>
                                    <option @if ($educational_background == 'non_it_background') selected @endif
                                        value="non_it_background">Non It Background
                                    </option>
                                </select>
                            </fieldset>
                        </div> --}}
                        {{-- <div class="col-12 col-sm-12 col-lg-6">
                            <label for="">Edu. Level</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="" name="educational_level">
                                    <option @if ($educational_level ?? '' == 'All') selected @endif value="">All
                                    </option>
                                    <option @if ($educational_level ?? '' == 'high_school') selected @endif value="high_school">
                                        High School
                                    </option>
                                    <option @if ($educational_level ?? '' == 'diploma') selected @endif value="diploma">Diploma
                                    </option>
                                    <option @if ($educational_level ?? '' == 'high_diploma') selected @endif value="high_diploma">
                                        High Diploma
                                    </option>
                                    <option @if ($educational_level ?? '' == 'bachelor') selected @endif value="bachelor">
                                        Bachelor
                                    </option>
                                    <option @if ($educational_level ?? '' == 'master_degree') selected @endif value="master_degree">
                                        Master Degree
                                    </option>
                                    <option @if ($educational_level ?? '' == 'p.h.d') selected @endif value="p.h.d">P.H.D
                                    </option>
                                </select>
                            </fieldset>
                        </div> --}}
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="">Edu. Level</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="" name="educational_level">
                                    <option @if ($educational_level ?? '' == 'All') selected @endif value="">All
                                    </option>
                                    <option @if ($educational_level ?? '' == 'Below Tawjihi') selected @endif value="Below Tawjihi">
                                        Below Tawjihi
                                    </option>
                                    <option @if ($educational_level ?? '' == 'Tawjihi') selected @endif value="Tawjihi">Tawjihi
                                    </option>
                                    <option @if ($educational_level ?? '' == 'Diploma') selected @endif value="Diploma">
                                        Diploma
                                    </option>
                                    <option @if ($educational_level ?? '' == 'Undergraduate') selected @endif value="Undergraduate">
                                        Undergraduate
                                    </option>
                                    <option @if ($educational_level ?? '' == 'Graduate') selected @endif value="Graduate">
                                        Graduate
                                    </option>
                                </select>
                            </fieldset>
                        </div>
                        {{-- <div class="col-12 col-sm12 col-lg-6">
                            <label>Training Location</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="academy_location">
                                    <option value="">All</option>
                                    <!--	<option value="amman">Amman</option>
    <option value="irbid">Irbid</option>
    <option value="aqaba">Aqaba</option>-->
                                    <option value="zarqa">Zarqa</option>
                                    <option value="balqa">Balqa</option>
                                </select>
                            </fieldset>
                        </div> --}}
                        <div class="col-12 col-sm-12 col-lg-12 d-flex align-items-center justify-content-start">
                            <button type="submit" class="col-12 btn btn-primary btn-block glow mb-0">Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="border my-2">
                <div class="card-body pr-0">
                    <div class=" col-lg-12 col-md-12 col-12 mb-1">
                        <div class="d-flex align-items-center">
                            <div class="avatar bg-rgba-primary m-0 p-25 mr-75 mr-xl-2">
                                <div class="avatar-content">
                                    <i class="bx bx-user text-primary font-medium-2"></i>
                                </div>
                            </div>
                            <div class="total-amount">
                                @if (count($users) > 0)
                                    <h5 class="">Total Users ({{ count($users) }})</h5>
                                @else
                                    No Matched applicants
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-0 col-lg-12 col-md-12 col-12 d-flex flex-wrap ">
                        {{-- <kbd class="text-white mr-2 bg-light mb-1">Application Status:({{ $status ?? '' }})</kbd> --}}
                        @if ($nationality == 'All')
                            <kbd class="text-white mr-2 bg-light mb-1">Nationality:(All)</kbd>
                        @elseif($nationality == 1)
                            <kbd class="text-white mr-2 bg-light mb-1">Nationality:(Jordanian)</kbd>
                        @elseif($nationality == 0)
                            <kbd class="text-white mr-2 bg-light mb-1">Nationality:(Not Jordanian)</kbd>
                        @endif
                        @if ($gender == 'All')
                            <kbd class="text-white mr-2 bg-light mb-1">Gender:(All)</kbd>
                        @elseif($gender == 1)
                            <kbd class="text-white mr-2 bg-light mb-1">Gender:(Male)</kbd>
                        @elseif($gender == 0)
                            <kbd class="text-white mr-2 bg-light mb-1">Gender:(Female)</kbd>
                        @endif
                        <kbd class="text-white mr-2 bg-light mb-1">Year of Birth:({{ $year }})</kbd>
                        {{-- @if ($commitment ?? '' == 'All')
                            <kbd class="text-white mr-2 bg-light mb-1">Committed:(All)</kbd>
                        @elseif($commitment ?? '' == 1)
                            <kbd class="text-white mr-2 bg-light mb-1">Committed:(Yes)</kbd>
                        @elseif($commitment ?? '' == 0)
                            <kbd class="text-white mr-2 bg-light mb-1">Committed:(No)</kbd>
                        @endif --}}
                        {{-- <kbd class="text-white mr-2 bg-light mb-1">Edu.
                            Background:({{ $educational_background }})</kbd> --}}
                        <kbd class="text-white mr-2 bg-light mb-1">Educ. Level:({{ $educational_level ?? '' }}
                            )</kbd>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 app-content content ml-0">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <!-- users list start -->
                    <section class="basic-datatable">
                        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--  <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div> -->
                            <!-- <button class="btn btn-primary">Import data</button> -->
                            <a class="btn btn-success mb-2 mt-2" href="{{ route('file-export') }}">Export data</a>
                        </form>

                        <div class="users-list-table">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card">

                                        <!-- datatable start -->
                                        <div class="table-responsive ">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First name</th>
                                                        <th>Last name</th>
                                                        <th>Educational Level</th>
                                                        <th>National ID/Passport Number</th>
                                                        <th>Component</th>
                                                        <th>Residence</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php($count = 0)
                                                    @foreach ($users as $user)
                                                        <tr role="row">
                                                            @php($count++)
                                                            <td class="sorting_1">{{ $user->id }}</td>
                                                            <td class="text-capitalize">{{ $user->first_name }}</td>
                                                            <td>{{ $user->last_name }}</td>
                                                            <td calss="sorting_1">{{ $user->education }}</td>
                                                            <td calss="sorting_1">
                                                                {{-- fixed the passport_number not showing --}}
                                                                @if ($user->national_id != null)
                                                                    {{ $user->national_id }}
                                                                @elseif ($user->passport_number)
                                                                    {{ $user->passport_number }}
                                                                @endif
                                                            </td>
                                                            <td calss="sorting_1">
                                                                @if ($user->affiliation)
                                                                    FabLab
                                                                @elseif ($user->programming)
                                                                    Digital Center
                                                                    {{-- @elseif ($user->programming)
                                                            Coding Academy --}}
                                                                @elseif ($user->linkedin_profile)
                                                                    Big By Orange
                                                                @endif
                                                            </td>
                                                            <td calss="sorting_1">{{ $user->residence }}</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false" role="menu"></span>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item "
                                                                            href="{{ route('fablab_users.delete', ['id' => $user->id]) }}">
                                                                            <i
                                                                                class="bx bx-edit-alt mr-1"></i>Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-end">
                                            </div>
                                        </div>
                                        <!-- datatable ends -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('admin-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js') }}"></script>
    <script src="{{ asset('admin-app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js') }}"></script>
    <script src="{{ asset('admin-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/extensions/moment.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/pickers/daterange/daterangepicker.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src=".{{ asset('admin-assets/vendors/js/extensions/dragula.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/extensions/swiper.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin-assets/js/scripts/configs/vertical-menu-light.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/core/app.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/components.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/footer.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/customizer.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin-assets/js/scripts/pages/dashboard-ecommerce.min.js') }}"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin-assets/js/scripts/datatables/datatable.min.js') }}"></script>
    <!-- END: Page JS-->
    <script src="{{ asset('admin-assets/js/scripts/forms/wizard-steps.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/charts/chart-chartist.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/pages/app-users.min.js') }}"></script>
    {{-- sweet alert cdn and use --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // create a record
        @if (session('status_store'))
            swal({
                title: "{{ session('status_store') }}",
                icon: "success",
                button: "ok",
            });
        @endif
        // update a record
        @if (session('status_update'))
            swal({
                title: "{{ session('status_update') }}",
                icon: "success",
                button: "ok",
            });
        @endif
        // delete a record
        @if (session('status_destroy'))
            swal({
                title: "{{ session('status_destroy') }}",
                icon: "error",
                button: "ok",
            });
        @endif
    </script>
    </div>
</body>
<!-- END: Body-->

</html>
