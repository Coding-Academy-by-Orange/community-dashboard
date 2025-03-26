@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('main')
    <div class="bg-light p-3">
        <div class="container">
            <form action="{{ route('dashboard.filter') }}" method="GET">
                @csrf
                <div class="row g-3 align-items-center mb-3">
                    @if (Auth::guard('admin')->user()->component !== 'fiber_academy' )
                        <div class="col-auto">
                            <label class="col-form-label" for="start_date">From</label>
                            <input class="form-control" name="start_date" type="date" id="start_date">
                        </div>
                        <div class="col-auto">
                            <label class="col-form-label" for="end_date">Till</label>
                            <input class="form-control" name="end_date" type="date" id="end_date">
                        </div>
                    @endif
                    <div class="col-auto">
                        <label class="col-form-label" for="gender">Gender</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="">Gender</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <label class="col-form-label" for="residence">Residence</label>
                        <select class="form-select" id="residence" name="residence">
                            <option value="">Residence</option>
                            <option value="Irbid">Irbid</option>
                            <option value="Ajloun">Ajloun</option>
                            <option value="Jerash">Jerash</option>
                            <option value="Mafraq">Mafraq</option>
                            <option value="Balqa">Balqa</option>
                            <option value="Amman">Amman</option>
                            <option value="Zarqa">Zarqa</option>
                            <option value="Madaba">Madaba</option>
                            <option value="Karak">Karak</option>
                            <option value="Tafilah">Tafilah</option>
                            <option value="Ma'an">Ma'an</option>
                            <option value="Aqaba">Aqaba</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <label class="col-form-label" for="education">Education</label>
                        @if (Auth::guard('admin')->user()->component == 'fiber_academy')
                        <select class="form-select" id="education" name="education">
                            <option value="">Education</option>
                            <option value="tawjihi" >توجيهي</option>
                                <option value="Diploma (Non-Engineering Specializations)" >دبلوم (تخصصات غير هندسية)</option>
                                <option value="Diploma (Engineering Specializations)" >دبلوم (تخصصات هندسية)</option>
                                <option value="Bachelor (Non-Engineering Specializations)" >بكالوريوس (تخصصات غير هندسية)</option>
                                <option value="Bachelor (Engineering Specializations)" >بكالوريوس (تخصصات هندسية)</option>
                                <option value="Master" >ماجستير</option>
                                <option value="PhD" >دكتوراه</option>
                        </select>
                        @else
                        <select class="form-select" id="education" name="education">
                            <option value="">Education</option>
                            <option value="Below Tawjihi">Below Tawjihi</option>
                            <option value="Tawjihi">Tawjihi</option>
                            <option value="Diploma">Diploma</option>
                            <option value="Undergraduate">Undergraduate</option>
                            <option value="Graduate">Graduate</option>
                        </select>
                        @endif
                    </div>
                    @if (Auth::guard('admin')->user()->component !== 'codingschool' &&
                            Auth::guard('admin')->user()->component !== 'bigbyorange'&&
                            Auth::guard('admin')->user()->component !== 'fiber_academy')
                        <div class="col-auto">
                            <label class="col-form-label" for="center">Center/Affiliation</label>
                            <select class="form-select" id="center" name="center">
                                <option value="">Center/Affiliation</option>
                                @if (Auth::guard('admin')->user()->component == 'codingacademy')
                                    <option value="Irbid">Irbid</option>
                                    <option value="Balqa">Balqa</option>
                                    <option value="Amman">Amman</option>
                                    <option value="Zarqa">Zarqa</option>
                                    <option value="Aqaba">Aqaba</option>
                                @elseif(Auth::guard('admin')->user()->component == 'fablab')
                                    <option value="Fablab Amman">Fablab Amman</option>
                                    <option value="Fablab Irbid">Fablab Irbid</option>
                                    <option value="Fablab Karak">Fablab Karak</option>
                                    <option value="Fablab Aqaba">Fablab Aqaba</option>
                                    <option value="Fablab As salt">Fablab As salt</option>
                                @elseif(Auth::guard('admin')->user()->component == 'digitalcenter')
                                    <option value="Amman markah">عمان – مؤسسة الملكه زين الشرف للتطوير / ماركا </option>
                                    <option value="Amman alhashmi">عمان – مركز الاميرة بسمة / الهاشمي</option>
                                    <option value="Irbid abi-saaed">اربد - مركز شباب دير ابي سعيد</option>
                                    <option value="Irbid alhosn">اربد – محطة معرفة الحصن</option>
                                    <option value="Irbid princess-basma/sheikh-hosain">اربد – مركز الاميرة بسمة / الشيخ حسين
                                    </option>
                                    <option value="Mafraq wast-almadinah">المفرق – محطة معرفة وسط المدينه</option>
                                    <option value="Mafraq princess-basma"> المفرق – مركز الاميرة بسمة
                                        /رحاب</option>
                                    <option value="As-salt">السلط –
                                        مركز شابات العارضه</option>
                                    <option value="Ajlon">عجلون –
                                        مركز شابات كفرنجه</option>
                                    <option value="Jerash">جرش -
                                        محطة معرفة الكتة</option>
                                    <option value="Zarqa alhashmiah-uni">
                                        الزرقاء
                                        - الجامعة الهاشمية</option>
                                    <option value="Zarqa youth-center">
                                        الزرقاء – مركز شباب الزرقاء
                                    </option>
                                    <option value="Madaba altheeban">مادبا - محطة معرفة ذيبان</option>
                                    <option value="Madaba maaen">
                                        مادبا – محطة معرفة ماعين</option>
                                    <option value="Madaba mleeh">
                                        مادبا – محطة معرفة مليح</option>
                                    <option value="Madaba princess-basma/wast almadinah">
                                        مادبا – مركز الاميرة بسمة / وسط المدينه</option>
                                    <option value="Madaba orange-club-german-uni">
                                        مادبا – نادي اورنج الجامعه الالمانيه</option>
                                    <option value="Shoubak">معان -
                                        مركز شباب الشوبك</option>
                                    <option value="Ma'an">معان -
                                        مركز شباب معان</option>
                                    <option value="Ma'an alhousaniah">معان – مركز الاميره بسمه /
                                        الحسينيه</option>
                                    <option value="Tafelah">الطفيله
                                        –محطة معرفة اعمار الطفيله</option>
                                    <option value="Karak">
                                        الكرك – نادي ابداع الكرك</option>
                                    <option value="Karak princess-basma/moata">
                                        الكرك – مركز الاميره بسمة / مؤته</option>
                                    <option value="Al-aqaba youth-center">
                                        العقبه – مركز شباب العقبه </option>
                                    <option value="Al-aqaba princess-basma">
                                        العقبه- مركز الاميره بسمة</option>
                                @endif
                            </select>
                        </div>
                    @endif
                    @if(Auth::guard('admin')->user()->component == 'fiber_academy')
                    <div class="col-auto">
                        <!-- here i will filter on the status -->
                        <label class="col-form-label" for="status">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="">Status</option>
                            <option value="pending">Pending</option>
                            <option value="accepted">Accepted</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                    @endif
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <button onclick="generatePNG()" class="btn btn-primary">Generate PNG</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <h2 class="my-2 text-center">Applicants Statistics</h2>
        <div class="alert alert-primary text-center" role="alert">
            Welcome to the Performance Dashboard! Use the filters below to customize the data view.
        </div>
        <section id="dashboard-analytics" class="container">
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body py-1">
                            <h5 class="card-title text-center">Status Data</h5>
                            <div id="myChart-status" class="chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body py-1">
                            <h5 class="card-title text-center">Age Group Data</h5>
                            <div id="myChart-ages" class="chart"></div>
                        </div>
                    </div>
                </div>
                @if (Auth::guard('admin')->user()->component !== 'codingschool' &&
                        Auth::guard('admin')->user()->component !== 'bigbyorange'
                        && Auth::guard('admin')->user()->component !== 'fiber_academy')
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body py-1">
                                <h5 class="card-title text-center">Center/Affiliation Data</h5>
                                <div id="myChart-center" class="chart"></div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row my-3">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-center">Gender Data</h5>
                            <div id="myChart-gender" class="chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-center">Education Level Data</h5>
                            <div id="myChart-level" class="chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-center">Residence Data</h5>
                            <div id="myChart-city" class="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function generatePNG() {
            const element = document.getElementById('dashboard-analytics');
            html2canvas(element).then(function(canvas) {
                // Convert the canvas to an image and download it
                var link = document.createElement('a');
                link.download = 'export.png';
                link.href = canvas.toDataURL();
                link.click();
            });
        }

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
            title: 'Age Group Data Chart',
            yaxis: {
                gridcolor: 'rgba(200, 200, 200, 0.3)',
                zerolinecolor: 'rgba(200, 200, 200, 0.3)'
            },
            xaxis: {
                gridcolor: 'rgba(200, 200, 200, 0.3)',
                zerolinecolor: 'rgba(200, 200, 200, 0.3)'
            },
            paper_bgcolor: 'rgba(0,0,0,0)',
            plot_bgcolor: 'rgba(0,0,0,0)'
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
            title: 'Education Level Data Chart',
            yaxis: {
                gridcolor: 'rgba(200, 200, 200, 0.3)',
                zerolinecolor: 'rgba(200, 200, 200, 0.3)'
            },
            xaxis: {
                gridcolor: 'rgba(200, 200, 200, 0.3)',
                zerolinecolor: 'rgba(200, 200, 200, 0.3)'
            },
            paper_bgcolor: 'rgba(0,0,0,0)',
            plot_bgcolor: 'rgba(0,0,0,0)'
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
            title: 'Residence Data Chart',
            yaxis: {
                gridcolor: 'rgba(200, 200, 200, 0.3)',
                zerolinecolor: 'rgba(200, 200, 200, 0.3)'
            },
            xaxis: {
                gridcolor: 'rgba(200, 200, 200, 0.3)',
                zerolinecolor: 'rgba(200, 200, 200, 0.3)'
            },
            paper_bgcolor: 'rgba(0,0,0,0)',
            plot_bgcolor: 'rgba(0,0,0,0)'
        };

        var residenceConfig = {
            responsive: true
        };

        Plotly.newPlot('myChart-city', [residenceTrace], residenceLayout, residenceConfig);

        var genderData = {!! json_encode($genderData) !!};
        var genderValues = Object.values(genderData);
        var genderLabels = Object.keys(genderData);

        var genderTrace = {
            x: genderLabels,
            y: genderValues,
            type: 'bar',
            name: "Gender Data"
        };

        var genderLayout = {
            title: 'Gender Data Chart',
            yaxis: {
                gridcolor: 'rgba(200, 200, 200, 0.3)',
                zerolinecolor: 'rgba(200, 200, 200, 0.3)'
            },
            xaxis: {
                gridcolor: 'rgba(200, 200, 200, 0.3)',
                zerolinecolor: 'rgba(200, 200, 200, 0.3)'
            },
            paper_bgcolor: 'rgba(0,0,0,0)',
            plot_bgcolor: 'rgba(0,0,0,0)'
        };

        var genderConfig = {
            responsive: true
        };

        Plotly.newPlot('myChart-gender', [genderTrace], genderLayout, genderConfig);

        var statusData = {!! json_encode($statusData) !!};
        var statusValues = Object.values(statusData);
        var statusLabels = Object.keys(statusData);

        var statusTrace = {
            x: statusLabels,
            y: statusValues,
            type: 'bar',
            name: 'Status Data'
        };

        var statusLayout = {
            title: 'Status Data Chart',
            yaxis: {
                gridcolor: 'rgba(200, 200, 200, 0.3)',
                zerolinecolor: 'rgba(200, 200, 200, 0.3)'
            },
            xaxis: {
                gridcolor: 'rgba(200, 200, 200, 0.3)',
                zerolinecolor: 'rgba(200, 200, 200, 0.3)'
            },
            paper_bgcolor: 'rgba(0,0,0,0)',
            plot_bgcolor: 'rgba(0,0,0,0)'
        };

        var statusConfig = {
            responsive: true
        };

        Plotly.newPlot('myChart-status', [statusTrace], statusLayout, statusConfig);

        @if (Auth::guard('admin')->user()->component !== 'codingschool' &&
                Auth::guard('admin')->user()->component !== 'bigbyorange')
        var centerData = {!! json_encode($centerData) !!};
        var centerValues = Object.values(centerData);
        var centerLabels = Object.keys(centerData);

        var centerTrace = {
            x: centerLabels,
            y: centerValues,
            type: 'bar',
            name: 'Center/Affiliation Data'
        };

        var centerLayout = {
            title: 'Center/Affiliation Data Chart',
            yaxis: {
                gridcolor: 'rgba(200, 200, 200, 0.3)',
                zerolinecolor: 'rgba(200, 200, 200, 0.3)'
            },
            xaxis: {
                gridcolor: 'rgba(200, 200, 200, 0.3)',
                zerolinecolor: 'rgba(200, 200, 200, 0.3)'
            },
            paper_bgcolor: 'rgba(0,0,0,0)',
            plot_bgcolor: 'rgba(0,0,0,0)'
        };

        var centerConfig = {
            responsive: true
        };

        Plotly.newPlot('myChart-center', [centerTrace], centerLayout, centerConfig);
        @endif
    </script>
@endsection
