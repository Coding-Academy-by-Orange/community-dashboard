@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('main')
    {{--    <h2 class="my-2">Applicants Statistics</h2> --}}
    <section id="dashboard-analytics">
        <div class="row">
            <div class=" col dashboard-users-success">
                <div class="card">
                    <div class="card-body py-1">
                        <div id="myChart-status"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card ">
                    <div class="card-body py-1">
                        <div id="myChart-ages"></div>
                    </div>
                </div>
            </div>
            @if (Auth::guard('admin')->user()->component != 'codingschool' ||
                    Auth::guard('admin')->user()->component != 'bigbyorange')
                <div class="col  ">
                    <div class="card "> 
                        <div class="card-body py-1">
                            <div id="myChart-center"></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <div class="card ">     
                    <div class="card-body py-1">
                        <div id="myChart-gender"></div>
                    </div>
                </div>
            </div>
            <div class="col  ">
                <div class="card "> 
                    <div class="card-body py-1">
                        <div id="myChart-level"></div>
                    </div>
                </div>
            </div>
            <div class="col  ">
                <div class="card ">
                    <div class="card-body py-1">
                        <div id="myChart-city"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var ageGroupData = {!! json_encode($ageGroupData) !!};
        var ageGroupValues = Object.values(ageGroupData);
        var ageGroupLabels = Object.keys(ageGroupData);

        var ageGroupTrace = {
            x: ageGroupLabels,
            y: ageGroupValues,
            type: 'bar',
            name: 'Age Group Data'
        };

        var ageGroupLayout = {
            title: 'Age Group Data Chart'
        };

        var ageGroupConfig = {
            responsive: true
        };

        Plotly.newPlot('myChart-ages', [ageGroupTrace], ageGroupLayout, ageGroupConfig);

        var educationLevelData = {!! json_encode($educationLevelData) !!};
        var educationLevelValues = Object.values(educationLevelData);
        var educationLevelLabels = Object.keys(educationLevelData);

        var educationLevelTrace = {
            x: educationLevelLabels,
            y: educationLevelValues,
            type: 'bar',
            name: 'Education Level Data'
        };

        var educationLevelLayout = {
            title: 'Education Level Data Chart'
        };

        var educationLevelConfig = {
            responsive: true
        };

        Plotly.newPlot('myChart-level', [educationLevelTrace], educationLevelLayout, educationLevelConfig);

        var residenceData = {!! json_encode($residenceData) !!};
        var residenceValues = Object.values(residenceData);
        var residenceLabels = Object.keys(residenceData);

        var residenceTrace = {
            x: residenceLabels,
            y: residenceValues,
            type: 'bar',
            name: 'Residence Data'
        };

        var residenceLayout = {
            title: 'Residence Data Chart'
        };

        var residenceConfig = {
            responsive: true
        };

        Plotly.newPlot('myChart-city', [residenceTrace], residenceLayout, residenceConfig);

        var genderData = {!! json_encode($genderData) !!};
        var genderValues = Object.values(genderData);
        var genderLabels = Object.keys(genderData);

        var genderTrace = {
            labels: genderLabels,
            values: genderValues,
            type: 'pie'
        };

        var genderLayout = {
            title: 'Gender Data Chart'
        };

        var genderConfig = {
            responsive: true
        };

        Plotly.newPlot('myChart-gender', [genderTrace], genderLayout, genderConfig);

        var statusData = {!! json_encode($statusData) !!};
        var statusValues = Object.values(statusData);
        var statusLabels = Object.keys(statusData);

        var statusTrace = {
            labels: statusLabels,
            values: statusValues,
            type: 'pie'
        };

        var statusLayout = {
            title: 'Status Data Chart'
        };

        var statusConfig = {
            responsive: true
        };

        Plotly.newPlot('myChart-status', [statusTrace], statusLayout, statusConfig);

        var centerData = {!! json_encode($centerData) !!};
        var centerValues = Object.values(centerData);
        var centerLabels = Object.keys(centerData);

        var centerTrace = {
            labels: centerLabels,
            values: centerValues,
            type: 'pie'
        };

        var centerLayout = {
            title: 'Center/Affiliation Data Chart'
        };

        var centerConfig = {
            responsive: true
        };

        Plotly.newPlot('myChart-center', [centerTrace], centerLayout, centerConfig);
    </script>
    {{-- <script>
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
    </script> --}}
    {{-- <script>
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
    </script> --}}
@endsection
