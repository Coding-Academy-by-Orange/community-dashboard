@extends('layouts.admin')
@section('title')
    dashboard
@endsection
@section('main')
    {{--    <h2 class="my-2">Applicants Statistics</h2> --}}
    <section id="dashboard-analytics">
        <div class="row">
            {{-- <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="greeting-text">Submission Status</h3>
                        <p class="mb-0">Applicants who passed the 2 verification steps</p>
                    </div>
                    <div class="card-body pt-0">
                        <div class="d-flex justify-content-between align-items-end">
                            <canvas id="myChart" height="50px" width="50px"></canvas>
                        </div>
                        <div class="d-flex justify-content-between mt-4 ">
                            <div class="d-inline-flex mr-xl-2" style="position: relative;">
                                <div class="d-flex align-items-center">
                                    <i class="bx bx-check-double bx-md  text-success"></i>
                                </div>
                                <div class="profit-content ml-50 mt-50">
                                    <h6 class="mb-0 text-muted">Fully Submitted</h6>
                                    <h6 class="text-muted">{{ \App\User::where('is_submitted', 1)->count() }}
                                        applicants</h6>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 91px; height: 65px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                            <div class="d-inline-flex" style="position: relative;">
                                <div class="d-flex align-items-center">
                                    <i class="bx bx-loader bx-md bx-spin text-warning"></i>
                                </div>
                                <div class="profit-content ml-50 mt-50">
                                    <h6 class="mb-0 ">Partial Submitted</h6>
                                    <h6 class="text-muted">
                                        {{ \App\User::where('nationality', '!=', null)->where('is_submitted', 0)->count() }}
                                        applicants</h6>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 95px; height: 65px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-lg-7"> --}}
                <div class="row">

                    <div class="col-sm-6 col-12 dashboard-users-success">
                        <div class="card text-center">
                            <div class="card-body py-1">
                                <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                    <i class="bx bx-user font-medium-5"></i>
                                </div>
                                <div class="text-muted line-ellipsis">All Applicants</div>
                                <h3 class="mb-0">
                                    @if (Auth::user()->is_super)
                                        {{ App\ODC::count() + App\BigbyOrange::count() + App\FablabUsers::count() }}
                                    @elseif (Auth::user()->component == 'digitalcenter')
                                        {{ App\ODC::count() }}
                                    @elseif (Auth::user()->component == 'fablab')
                                        {{ App\FablabUsers::count() }}
                                    @elseif (Auth::user()->component == 'bigbyorange')
                                        {{ App\BigbyOrange::count() }}
                                    @endif
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 dashboard-users-danger">
                        <div class="card text-center">
                            <div class="card-body py-1">
                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                    <i class="bx bx-user-check font-medium-5"></i>
                                </div>
                                <div class="text-muted line-ellipsis">Verified Applicants</div>
                                <h3 class="mb-0">
                                    @if (Auth::user()->is_super)
                                        {{ App\ODC::where('nationality', '!=', null)->count() + App\BigbyOrange::where('nationality', '!=', null)->count() + App\FablabUsers::where('nationality', '!=', null)->count() }}
                                    @elseif (Auth::user()->component == 'digitalcenter')
                                        {{ App\ODC::where('nationality', '!=', null)->count() }}
                                    @elseif (Auth::user()->component == 'fablab')
                                        {{ App\FablabUsers::where('nationality', '!=', null)->count() }}
                                    @elseif (Auth::user()->component == 'bigbyorange')
                                        {{ App\BigbyOrange::where('nationality', '!=', null)->count() }}
                                    @endif
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12  ">
                        <div class="card ">
                            <div class="card-header ">
                                <h3 class="greeting-text text-left">Ages Distribution</h3>
                            </div>
                            <div class="d-flex justify-content-around">
                                <div class=" ">
                                    <h5 class="d-flex align-items-center "><i class="bx bx-male bx-md"></i> Male</h5>
                                    <div class="d-flex" style="position: relative;">

                                        <h6 class="ml-50 text-muted">
                                            @if (Auth::user()->is_super)
                                                {{ App\ODC::where('gender', 'Male')->count() + App\BigbyOrange::where('gender', 'Male')->count() + App\FablabUsers::where('gender', 'Male')->count() }}
                                            @elseif (Auth::user()->component == 'digitalcenter')
                                                {{ App\ODC::where('gender', 'Male')->count() }}
                                            @elseif (Auth::user()->component == 'fablab')
                                                {{ App\FablabUsers::where('gender', 'Male')->count() }}
                                            @elseif (Auth::user()->component == 'bigbyorange')
                                                {{ App\BigbyOrange::where('gender', 'Male')->count() }}
                                            @endif
                                            Applicant
                                        </h6>
                                        <div class="resize-triggers">
                                            <div class="expand-trigger">
                                                <div style="width: 95px; height: 70px;"></div>
                                            </div>
                                            <div class="contract-trigger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" ">
                                    <h5 class="d-flex align-items-center "><i class="bx bx-female bx-md"></i> Female
                                    </h5>
                                    <div class="d-flex" style="position: relative;">

                                        <h6 class="ml-50 text-muted">
                                            @if (Auth::user()->is_super)
                                                {{ App\ODC::where('gender', 'Female')->count() + App\BigbyOrange::where('gender', 'Female')->count() + App\FablabUsers::where('gender', 'Female')->count() }}
                                            @elseif (Auth::user()->component == 'digitalcenter')
                                                {{ App\ODC::where('gender', 'Female')->count() }}
                                            @elseif (Auth::user()->component == 'fablab')
                                                {{ App\FablabUsers::where('gender', 'Female')->count() }}
                                            @elseif (Auth::user()->component == 'bigbyorange')
                                                {{ App\BigbyOrange::where('gender', 'Female')->count() }}
                                            @endif
                                            Applicant
                                        </h6>
                                        <div class="resize-triggers">
                                            <div class="expand-trigger">
                                                <div style="width: 95px; height: 70px;"></div>
                                            </div>
                                            <div class="contract-trigger"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="d-flex justify-content-between align-items-end">
                                    <canvas id="myChart-ages"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
        <div class="row">
            {{-- <div class="col-lg-4  ">
                <div class="card ">
                    <div class="card-header ">
                        <h3 class="greeting-text text-left">Educational Background</h3>
                    </div>
                    <div class="card-body pt-0">
                        <div class="d-flex justify-content-between align-items-end">
                            <canvas id="myChart-background"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-6  ">
                <div class="card ">
                    <div class="card-header ">
                        <h3 class="greeting-text text-left">Educational Level</h3>
                    </div>
                    <div class="card-body pt-0">
                        <div class="d-flex justify-content-between align-items-end">
                            <canvas id="myChart-level"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6  ">
                <div class="card ">
                    <div class="card-header ">
                        <h3 class="greeting-text text-left">Cities</h3>
                    </div>
                    <div class="card-body pt-0">
                        <div class="d-flex justify-content-between align-items-end">
                            <canvas id="myChart-city"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <hr>
    <h2 class="my-2">Filtration Results</h2>
    <section id="dashboard-analytics-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header ">
                        <h3 class="greeting-text text-left">Distributions</h3>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-lg-4 d-flex align-items-center align-items-center">
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item list-group-item-action border-0 d-flex justify-content-between ">
                                        <div class="list-left d-flex">
                                            <div class="list-icon mr-1">
                                                <div class="avatar bg-rgba-success m-0">
                                                    <div class="avatar-content">
                                                        <i class="bx bx-check text-success font-size-base bx-md"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <span class="list-title">1. Accepted – 1st Filtration – Orange</span>
                                            </div>
                                        </div>
                                        <span
                                            class="ml-3">{{ App\User::where('result_1', '1. Accepted – 1st Filtration – Orange')->count() }}
                                            applicants</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex justify-content-between">
                                        <div class="list-left d-flex">
                                            <div class="list-icon mr-1">
                                                <div class="avatar bg-rgba-warning m-0">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-exclamation text-warning font-size-base"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <span class="list-title">2. Maybe – 1st Filtration – Orange</span>
                                            </div>
                                        </div>
                                        <span
                                            class="ml-3">{{ App\User::where('result_1', '2. Maybe – 1st Filtration – Orange')->count() }}
                                            applicants</span>
                                    </li>





                                    <li class="list-group-item border-0 d-flex justify-content-between">
                                        <div class="list-left d-flex">
                                            <div class="list-icon mr-1">
                                                <div class="avatar bg-rgba-danger m-0">
                                                    <div class="avatar-content">
                                                        <i class="bx bx-x text-danger font-size-base bx-md"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <span class="list-title">3. Rejected – Age – Orange</span>
                                            </div>
                                        </div>
                                        <span
                                            class="ml-3">{{ App\User::where('result_1', '3. Rejected – Age – Orange')->count() }}
                                            applicants</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex justify-content-between">
                                        <div class="list-left d-flex">
                                            <div class="list-icon mr-1">
                                                <div class="avatar bg-rgba-danger m-0">
                                                    <div class="avatar-content">
                                                        <i class="bx bx-x text-danger font-size-base bx-md"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <span class="list-title">4. Rejected – 1st Filtration – Orange</span>
                                            </div>
                                        </div>
                                        <span
                                            class="ml-3">{{ App\User::where('result_1', '4. Rejected – 1st Filtration – Orange')->count() }}
                                            applicants</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex justify-content-between">
                                        <div class="list-left d-flex">
                                            <div class="list-icon mr-1">
                                                <div class="avatar bg-rgba-success m-0">
                                                    <div class="avatar-content">
                                                        <i class="bx bx-check text-success font-size-base bx-md"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <span class="list-title">5. Accepted – Pre Final List – Simplon
                                                </span>
                                            </div>
                                        </div>
                                        <span
                                            class="ml-3">{{ App\User::where('result_1', '5. Accepted – Pre Final List – Simplon')->count() }}
                                            applicants</span>
                                    </li>
                                    <li
                                        class="list-group-item list-group-item-action border-0 d-flex justify-content-between ">
                                        <div class="list-left d-flex">
                                            <div class="list-icon mr-1">
                                                <div class="avatar bg-rgba-success m-0">
                                                    <div class="avatar-content">
                                                        <i class="bx bx-check text-success font-size-base bx-md"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <span class="list-title">6. Accepted – Final List – Simplon</span>
                                            </div>
                                        </div>
                                        <span
                                            class="ml-3">{{ App\User::where('result_1', '6. Accepted – Final List – Simplon')->count() }}
                                            applicants</span>
                                    </li>


                                    <li class="list-group-item border-0 d-flex justify-content-between">
                                        <div class="list-left d-flex">
                                            <div class="list-icon mr-1">
                                                <div class="avatar bg-rgba-danger m-0">
                                                    <div class="avatar-content">
                                                        <i class="bx bx-x text-danger font-size-base bx-md"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <span class="list-title">7. Rejected – Test Result (Sololearn + English)
                                                </span>
                                            </div>
                                        </div>
                                        <span
                                            class="ml-3">{{ App\User::where('result_1', '7. Rejected – Test Result (Sololearn + English) ')->count() }}
                                            applicants</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex justify-content-between">
                                        <div class="list-left d-flex">
                                            <div class="list-icon mr-1">
                                                <div class="avatar bg-rgba-danger m-0">
                                                    <div class="avatar-content">
                                                        <i class="bx bx-x text-danger font-size-base bx-md"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <span class="list-title">8. Rejected – Motivational Qs – Simplon
                                                </span>
                                            </div>
                                        </div>
                                        <span
                                            class="ml-3">{{ App\User::where('result_1', '8. Rejected – Motivational Qs – Simplon')->count() }}
                                            applicants</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex justify-content-between">
                                        <div class="list-left d-flex">
                                            <div class="list-icon mr-1">
                                                <div class="avatar bg-rgba-success m-0">
                                                    <div class="avatar-content">
                                                        <i class="bx bx-check text-success font-size-base bx-md"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <span class="list-title">9. Accepted – 50 Students After Interviews –
                                                    Orange
                                                </span>
                                            </div>
                                        </div>
                                        <span
                                            class="ml-3">{{ App\User::where('result_1', '9. Accepted – 50 Students After Interviews – Orange')->count() }}
                                            applicants</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex justify-content-between">
                                        <div class="list-left d-flex">
                                            <div class="list-icon mr-1">
                                                <div class="avatar bg-rgba-warning m-0">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-exclamation text-warning font-size-base"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <span class="list-title">10. Maybe – Final List After Interviews - Orange
                                                </span>
                                            </div>
                                        </div>
                                        <span
                                            class="ml-3">{{ App\User::where('result_1', '10. Maybe – Final List After Interviews - Orange')->count() }}
                                            applicants</span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex justify-content-between">
                                        <div class="list-left d-flex">
                                            <div class="list-icon mr-1">
                                                <div class="avatar bg-rgba-danger m-0">
                                                    <div class="avatar-content">
                                                        <i class="bx bx-x text-danger font-size-base bx-md"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <span class="list-title">11. Rejected – Final List After Interviews -
                                                    Orange</span>
                                            </div>
                                        </div>
                                        <span
                                            class="ml-3">{{ App\User::where('result_1', '11. Rejected – Final List After Interviews - Orange')->count() }}
                                            applicants</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-flex justify-content-between align-items-end">
                                    <canvas class="" id="myChart-filtration"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Fully Submitted ', 'Partial Submitted', ],
                datasets: [{
                    data: [{{ \App\User::where('is_submitted', 1)->count() }},
                        {{ \App\User::where('nationality', '!=', null)->where('is_submitted', 0)->count() }}
                    ],
                    backgroundColor: [
                        '#39DA8A',
                        '#FDAC41',
                    ],
                    borderColor: [
                        '#39DA8A',
                        '#FDAC41',
                    ],
                    borderWidth: 1
                }]
            },
            gridLines: {
                drawOnChartArea: false
            }
        });
    </script>
    <script>
        @if (Auth::check())
            @php
                $component = Auth::user()->component;
            @endphp

            @if ($component == 'digitalcenter')
                @php
                    $ageColumnName = 'age';
                    $userCounts = [
                        \App\ODC::where($ageColumnName, '<', 17)->count(),
                        \App\ODC::where($ageColumnName, '<=', 20)
                            ->where($ageColumnName, '>', 17)
                            ->count(),
                        \App\ODC::where($ageColumnName, '<=', 23)
                            ->where($ageColumnName, '>', 20)
                            ->count(),
                        \App\ODC::where($ageColumnName, '<=', 26)
                            ->where($ageColumnName, '>', 23)
                            ->count(),
                        \App\ODC::where($ageColumnName, '<=', 30)
                            ->where($ageColumnName, '>', 26)
                            ->count(),
                        \App\ODC::where($ageColumnName, '>', 30)->count(),
                    ];
                @endphp
            @elseif ($component == 'fablab')
                @php
                    $ageColumnName = 'age';
                    $userCounts = [
                        \App\FablabUsers::where($ageColumnName, '<', 17)->count(),
                        \App\FablabUsers::where($ageColumnName, '<=', 20)
                            ->where($ageColumnName, '>', 17)
                            ->count(),
                        \App\FablabUsers::where($ageColumnName, '<=', 23)
                            ->where($ageColumnName, '>', 20)
                            ->count(),
                        \App\FablabUsers::where($ageColumnName, '<=', 26)
                            ->where($ageColumnName, '>', 23)
                            ->count(),
                        \App\FablabUsers::where($ageColumnName, '<=', 30)
                            ->where($ageColumnName, '>', 26)
                            ->count(),
                        \App\FablabUsers::where($ageColumnName, '>', 30)->count(),
                    ];
                @endphp
            @elseif ($component == 'bigbyorange')
                @php
                    $ageColumnName = 'birthday';
                    $userCounts = [
                        \App\BigbyOrange::whereYear($ageColumnName, '>', 2003)->count(),
                        \App\BigbyOrange::whereYear($ageColumnName, '>=', 2001)
                            ->whereYear($ageColumnName, '<=', 2003)
                            ->count(),
                        \App\BigbyOrange::whereYear($ageColumnName, '>=', 1998)
                            ->whereYear($ageColumnName, '<=', 2000)
                            ->count(),
                        \App\BigbyOrange::whereYear($ageColumnName, '>=', 1995)
                            ->whereYear($ageColumnName, '<=', 1997)
                            ->count(),
                        \App\BigbyOrange::whereYear($ageColumnName, '>=', 1991)
                            ->whereYear($ageColumnName, '<=', 1994)
                            ->count(),
                        \App\BigbyOrange::whereYear($ageColumnName, '<', 1991)->count(),
                    ];
                @endphp
            @else
                @php
                    $ageColumnName = 'year';
                    $userCounts = [
                        \App\User::where('year', '>', 2003)->count(),
                        \App\User::where('year', '>=', 2001)
                            ->where('year', '<=', 2003)
                            ->count(),
                        \App\User::where('year', '>=', 1998)
                            ->where('year', '<=', 2000)
                            ->count(),
                        \App\User::where('year', '>=', 1995)
                            ->where('year', '<=', 1997)
                            ->count(),
                        \App\User::where('year', '>=', 1991)
                            ->where('year', '<=', 1994)
                            ->count(),
                        \App\User::where('year', '<', 1991)->count(),
                    ];
                @endphp
            @endif
        @endif
        var date = new Date();
        var currentYear = date.getFullYear();
        var ctx = document.getElementById('myChart-ages').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Less than 18 years', 'Between (18 - 20) years', 'Between (21 - 23) years',
                    'Between (24 - 26) years', 'Between (27 - 30) years', 'More than 30 years'
                ],
                datasets: [{
                    label: '# of applicants',
                    data: [{{ implode(',', $userCounts) }}],
                    backgroundColor: [
                        '#FF5B5C',
                        'rgba(73, 88, 234, 1)',
                        'rgba(222, 73, 234, 1)',
                        'rgba(102, 221, 92, 1)',
                        'rgba(197, 12, 72, 1)',
                        'rgba(93, 64, 200, 1)'
                    ],
                    borderColor: [
                        '#FF5B5C',
                        'rgba(73, 88, 234, 1)',
                        'rgba(222, 73, 234, 1)',
                        'rgba(102, 221, 92, 1)',
                        'rgba(197, 12, 72, 1)',
                        'rgba(93, 64, 200, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart-background').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['IT- Background', 'Non IT- Background'],
                datasets: [{
                    data: [{{ App\User::where('educational_background', 'it_background')->count() }},
                        {{ App\User::where('educational_background', 'non_it_background')->count() }}
                    ],
                    backgroundColor: [
                        '#fc0',
                        '#527edb',
                    ],
                    borderColor: [
                        '#fc0',
                        '#527edb',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
            }
        });
    </script>
    <script>
        @if (Auth::check())
            @php
                $component = Auth::user()->component;
            @endphp

            @if ($component == 'digitalcenter') 
                @php
                    $ageColumnName = 'education';
                    $userCounts = [
                        \App\ODC::where($ageColumnName, 'Below Tawjihi')->count(),
                        \App\ODC::where($ageColumnName, 'Tawjihi')->count(),
                        \App\ODC::where($ageColumnName, 'Diploma')->count(),
                        \App\ODC::where($ageColumnName, 'Undergraduate')->count(),
                        \App\ODC::where($ageColumnName, 'Graduate')->count(),
                    ];
                @endphp
            @elseif ($component == 'fablab')
                @php
                $ageColumnName = 'education';
                    $userCounts = [
                        \App\FablabUsers::where($ageColumnName, 'Below Tawjihi')->count(),
                        \App\FablabUsers::where($ageColumnName, 'Tawjihi')->count(),
                        \App\FablabUsers::where($ageColumnName, 'Diploma')->count(),
                        \App\FablabUsers::where($ageColumnName, 'Undergraduate')->count(),
                        \App\FablabUsers::where($ageColumnName, 'Graduate')->count(),  
                    ];
                @endphp
            @elseif ($component == 'bigbyorange')
                @php
                $ageColumnName = 'education';
                    $userCounts = [
                        \App\BigbyOrange::where($ageColumnName, 'Below Tawjihi')->count(),
                        \App\BigbyOrange::where($ageColumnName, 'Tawjihi')->count(),
                        \App\BigbyOrange::where($ageColumnName, 'Diploma')->count(),
                        \App\BigbyOrange::where($ageColumnName, 'Undergraduate')->count(),
                        \App\BigbyOrange::where($ageColumnName, 'Graduate')->count(), 
                       
                    ];
                @endphp
            @else
                @php
                    $ageColumnName = 'educational_level';
                    $userCounts = [
                        \App\User::where('year', '>', 2003)->count(),
                        \App\User::where('year', '>=', 2001)
                            ->where('year', '<=', 2003)
                            ->count(),
                        \App\User::where('year', '>=', 1998)
                            ->where('year', '<=', 2000)
                            ->count(),
                        \App\User::where('year', '>=', 1995)
                            ->where('year', '<=', 1997)
                            ->count(),
                        \App\User::where('year', '>=', 1991)
                            ->where('year', '<=', 1994)
                            ->count(),
                        \App\User::where('year', '<', 1991)->count(),
                    ];
                @endphp
            @endif
        @endif
        var ctx = document.getElementById('myChart-level').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ['High School', 'Diploma', 'High Diploma', 'Bachelor Degree', 'Master Degree',
                    'Ph.D Degree'
                ],
                datasets: [{
                    data: [{{ implode(',', $userCounts) }}],
                    backgroundColor: [
                        '#FF5B5C',
                        '#527edb',
                        '#32c832',
                        '#cd3c14',
                        '#ddd',
                        '#f16e00',
                    ],
                    borderColor: [
                        '#FF5B5C',
                        '#527edb',
                        '#32c832',
                        '#cd3c14',
                        '#ddd',
                        '#f16e00',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
            }
        });
    </script>
    <script>
        @if (Auth::check())
            @php
                $component = Auth::user()->component;
            @endphp

            @if ($component == 'digitalcenter') 
                @php
                    $ColumnName = 'residence';
                    $userCounts = [
                        App\ODC::where($ColumnName, 'Amman')->count() ,
                        App\ODC::where($ColumnName, 'Irbid')->count() ,
                        App\ODC::where($ColumnName, 'Balqa')->count() ,
                        App\ODC::where($ColumnName, 'Zarqa')->count() ,
                        App\ODC::where($ColumnName, 'Karak')->count() ,
                        App\ODC::where($ColumnName,'Jarash')->count() ,
                        App\ODC::where($ColumnName, 'Tafilah')->count() ,
                        App\ODC::where($ColumnName, 'Ajloun')->count() ,
                        App\ODC::where($ColumnName,'Aqaba')->count() ,
                        App\ODC::where($ColumnName, 'Madaba')->count() ,
                        App\ODC::where($ColumnName, 'Ma\'an')->count() ,
                        App\ODC::where($ColumnName, 'Mafraq')->count() 
                    ];
                @endphp
            @elseif ($component == 'fablab')
                @php
                $ColumnName = 'residence';
                    $userCounts = [
                        \App\FablabUsers::where($ColumnName, 'Amman')->count() ,
                        \App\FablabUsers::where($ColumnName, 'Irbid')->count() ,
                        \App\FablabUsers::where($ColumnName, 'Balqa')->count() ,
                        \App\FablabUsers::where($ColumnName, 'Zarqa')->count() ,
                        \App\FablabUsers::where($ColumnName, 'Karak')->count() ,
                        \App\FablabUsers::where($ColumnName,'Jarash')->count() ,
                        \App\FablabUsers::where($ColumnName, 'Tafilah')->count() ,
                        \App\FablabUsers::where($ColumnName, 'Ajloun')->count() ,
                        \App\FablabUsers::where($ColumnName,'Aqaba')->count() ,
                        \App\FablabUsers::where($ColumnName, 'Madaba')->count() ,
                        \App\FablabUsers::where($ColumnName, 'Ma\'an')->count() ,
                        \App\FablabUsers::where($ColumnName, 'Mafraq')->count() 
                    ];
                
                @endphp
            @elseif ($component == 'bigbyorange')
                @php
                $ColumnName = 'residence';
                    $userCounts = [
                        \App\BigbyOrange::where($ColumnName, 'Amman')->count() ,
                        \App\BigbyOrange::where($ColumnName, 'Irbid')->count() ,
                        \App\BigbyOrange::where($ColumnName, 'Balqa')->count() ,
                        \App\BigbyOrange::where($ColumnName, 'Zarqa')->count() ,
                        \App\BigbyOrange::where($ColumnName, 'Karak')->count() ,
                        \App\BigbyOrange::where($ColumnName,'Jarash')->count() ,
                        \App\BigbyOrange::where($ColumnName, 'Tafilah')->count() ,
                        \App\BigbyOrange::where($ColumnName, 'Ajloun')->count() ,
                        \App\BigbyOrange::where($ColumnName,'Aqaba')->count() ,
                        \App\BigbyOrange::where($ColumnName, 'Madaba')->count() ,
                        \App\BigbyOrange::where($ColumnName, 'Ma\'an')->count() ,
                        \App\BigbyOrange::where($ColumnName, 'Mafraq')->count() 
                    ];
                
                @endphp
            @else
                @php
                    $ageColumnName = 'educational_level';
                    $userCounts = [
                        \App\User::where('year', '>', 2003)->count(),
                        \App\User::where('year', '>=', 2001)
                            ->where('year', '<=', 2003)
                            ->count(),
                        \App\User::where('year', '>=', 1998)
                            ->where('year', '<=', 2000)
                            ->count(),
                        \App\User::where('year', '>=', 1995)
                            ->where('year', '<=', 1997)
                            ->count(),
                        \App\User::where('year', '>=', 1991)
                            ->where('year', '<=', 1994)
                            ->count(),
                        \App\User::where('year', '<', 1991)->count(),
                    ];
                    
                @endphp
            @endif
        @endif
        var ctx = document.getElementById('myChart-city').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Amman', 'Irbid', 'Balqa', 'Zarqa', 'Karak', 'Jarash', 'Tafilah', 'Ajloun', 'Aqaba',
                    'Madaba', 'maan', 'Mafraq'
                ],
                datasets: [{
                    data: [{{ implode(',', $userCounts) }}],
                    backgroundColor: [
                        '#FF5B5C',
                        'rgba(54, 162, 235, 0.2)',
                        '#FF5B5C',
                        '#527edb',
                        '#32c832',
                        '#cd3c14',
                        '#ddd',
                        '#f16e00',
                        'rgba(10, 237, 182, 1)',
                        'rgba(220, 10, 237, 1)',
                        'rgba(237, 87, 10, 1)',
                        'rgba(179, 188, 129, 1)',
                    ],
                    borderColor: [
                        '#FF5B5C',
                        'rgba(54, 162, 235, 1)',
                        '#FF5B5C',
                        '#527edb',
                        '#32c832',
                        '#cd3c14',
                        '#ddd',
                        '#f16e00',
                        'rgba(10, 237, 182, 1)',
                        'rgba(220, 10, 237, 1)',
                        'rgba(237, 87, 10, 1)',
                        'rgba(179, 188, 129, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart-filtration').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['1. Accepted – 1st Filtration – Orange', '2. Maybe – 1st Filtration – Orange',
                    '3. Rejected – Age – Orange', '4. Rejected – 1st Filtration – Orange',
                    '5. Accepted – Pre Final List – Simplon', '6. Accepted – Final List – Simplon',
                    '7. Rejected – Test Result (Sololearn + English) ',
                    '8. Rejected – Motivational Qs – Simplon',
                    '9. Accepted – 50 Students After Interviews – Orange',
                    '10. Maybe – Final List After Interviews - Orange',
                    '11. Rejected – Final List After Interviews - Orange'
                ],
                datasets: [{
                    label: '# of applicants',
                    data: [{{ App\User::where('status', '1. Accepted – 1st Filtration – Orange')->count() }},
                        {{ App\User::where('status', '2. Maybe – 1st Filtration – Orange')->count() }},
                        {{ App\User::where('status', '3. Rejected – Age – Orange')->count() }},
                        {{ App\User::where('status', '4. Rejected – 1st Filtration – Orange')->count() }},
                        {{ App\User::where('status', '5. Accepted – Pre Final List – Simplon')->count() }},
                        {{ App\User::where('status', '6. Accepted – Final List – Simplon')->count() }},
                        {{ App\User::where('status', '7. Rejected – Test Result (Sololearn + English) ')->count() }},
                        {{ App\User::where('status', '8. Rejected – Motivational Qs – Simplon')->count() }},
                        {{ App\User::where('status', '9. Accepted – 50 Students After Interviews – Orange')->count() }},
                        {{ App\User::where('status', '10. Maybe – Final List After Interviews - Orange')->count() }},
                        {{ App\User::where('status', '11. Rejected – Final List After Interviews - Orange')->count() }}
                    ],
                    backgroundColor: [
                        '#32c832',
                        '#fc0',
                        '#FF5B5C',
                    ],
                    borderColor: [
                        '#32c832',
                        '#fc0',
                        '#FF5B5C',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
            }
        });
    </script>
@endsection
