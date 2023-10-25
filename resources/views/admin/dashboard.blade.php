@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('main')
    <h2 class="my-2 text-center">Applicants Statistics</h2>
    <section>
        <form action="{{ route('dashboard.filter') }}" method="GET">
            @csrf
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">From</label>
                <input class="form-input" name="start_date" type="date">

                <label class="input-group-text" for="inputGroupSelect01">Till</label>
                <input class="form-input" name="end_date" type="date">

                <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                <select class="form-select" id="inputGroupSelect01" name="gender">
                    <option value="">Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Residence</label>
                <select class="form-select" id="inputGroupSelect01" name="residence">
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

                <label class="input-group-text" for="inputGroupSelect01">Education</label>
                <select class="form-select" id="inputGroupSelect01" name="education">
                    <option value="">Education</option>
                    <option value="Below Tawjihi">Below Tawjihi</option>
                    <option value="Tawjihi">Tawjihi</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Undergraduate">Undergraduate</option>
                    <option value="Graduate">Graduate</option>

                </select>
                @if (Auth::guard('admin')->user()->component !== 'codingschool' &&
                        Auth::guard('admin')->user()->component !== 'bigbyorange')
                    <label class="input-group-text" for="inputGroupSelect01">center/affliation</label>
                    <select class="form-select" id="inputGroupSelect01" name="center">
                        <option value="">center/affliation</option>
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
                @endif
                <div class="ms-2">
                    <button type="submit" class="btn btn-primary mb-3">Filter</button>
                </div>
            </div>
        </form>
        <button onclick="generatePNG()" class="btn btn-primary mb-3">Generate PNG</button>
    </section>
    <section id="dashboard-analytics">
        <div class="row mb-3">
            <div class="col">
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
            @if (Auth::guard('admin')->user()->component !== 'codingschool' &&
                    Auth::guard('admin')->user()->component !== 'bigbyorange')
                <div class="col">
                    <div class="card">
                        <div class="card-body py-1">
                            <div id="myChart-center"></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="row my-3">
            <div class="col">
                <div class="card ">
                    <div class="card-body">
                        <div id="myChart-gender"></div>
                    </div>
                </div>
            </div>
            <div class="col  ">
                <div class="card ">
                    <div class="card-body ">
                        <div id="myChart-level"></div>
                    </div>
                </div>
            </div>
            <div class="col  ">
                <div class="card ">
                    <div class="card-body">
                        <div id="myChart-city"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
            x: genderLabels,
            y: genderValues,
            type: 'bar',
            name: "Gender Data"
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
            x: statusLabels,
            y: statusValues,
            type: 'bar',
            name: 'Status Data'
        };

        var statusLayout = {
            title: 'Status Data Chart'
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
                title: 'Center/Affiliation Data Chart'
            };

            var centerConfig = {
                responsive: true
            };

            Plotly.newPlot('myChart-center', [centerTrace], centerLayout, centerConfig);
        @endif
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
