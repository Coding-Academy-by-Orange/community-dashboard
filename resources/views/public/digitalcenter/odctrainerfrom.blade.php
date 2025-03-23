
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="user registration website - registration process - coding academy by orange ">
    <title>@yield('title')</title>
    <link rel="preload" href="{{ asset('assets/boosted/dist/fonts/HelvNeue55_W1G.woff2') }}" as="font"
        type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('assets/boosted/dist/fonts/HelvNeue75_W1G.woff2') }}" as="font"
        type="font/woff2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net" rel="preconnect" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.3.3/dist/css/boosted.min.css" rel="stylesheet" integrity="sha384-laZ3JUZ5Ln2YqhfBvadDpNyBo7w5qmWaRnnXuRwNhJeTEFuSdGbzl4ZGHAEnTozR" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/boosted@5.3.3/dist/js/boosted.bundle.min.js" integrity="sha384-3RoJImQ+Yz4jAyP6xW29kJhqJOE3rdjuu9wkNycjCuDnGAtC/crm79mLcwj1w2o/" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f8f9fa;
        }

        .sticky-top{
                direction: ltr;
        }
        .form-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .section-title {
            background-color: #f1f1f1;
            padding: 10px;
            margin-bottom: 20px;
            border-right: 4px solid #ff7900;
            font-weight: bold;
        }
        .orange-btn {
            background-color: #ff7900;
            border-color: #ff7900;
        }
        .orange-btn:hover {
            background-color: #e56e00;
            border-color: #e56e00;
        }
        .month-checkboxes {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .month-checkbox {
            flex: 0 0 calc(25% - 10px);
            margin-bottom: 10px;
        }

        .form-select{
            color: black;
        }

        label{
        font-weight: bold; 
    
     
       }

     .title{
        color: #ff7900;
        font-weight: bold;

     }
    </style>
</head>
    <header class="sticky-top">
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg pb-2" aria-label="navigation">
            <div class="container-xxl">

                <!-- Orange brand logo -->
                <div class="navbar-brand me-auto me-lg-4">
                    <a class="stretched-link" href="/">
                        <img src="https://boosted.orange.com/docs/5.2/assets/brand/orange-logo.svg" width="50"
                            height="50" alt="Boosted - Back to Home" loading="lazy">
                    </a>
                </div>

                <!-- Burger menu (visible on small screens) -->
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target=".global-header-1" aria-controls="global-header-1.1 global-header-1.2"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar with links -->
                <div id="global-header-1.1" class="navbar-collapse collapse me-lg-auto global-header-1">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/">Home </a></li>
                        <li class="nav-item"><a class="nav-link" href="/codingacademy">Coding Academy</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('codingschool.index') }}">Coding
                                School</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('fablab.index') }}">Fablab</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('innovation-hub.index') }}">Innovation Hub</a></li>

                        <li class="nav-item"><a class="nav-link" href="{{ route('ODC.index') }}">Digital Centers</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('BigByOrange.index') }}">Big By
                                Orange</a></li>
{{--                        <li class="nav-item"><a class="nav-link" href="/help" target="_blank">Help</a></li>--}}
{{--                        <li class="nav-item"><a class="nav-link" href="/terms" target="_blank">Terms & Conditions</a>--}}
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

  
</head>

<body dir="rtl">
    
    <div class="container form-container">
        <div class="text-center mb-4">
            <!-- <img src="{{ asset('https://freelogopng.com/images/all_img/1683000586orange_logo_png.png') }}" alt="Orange Logo" height="80"> -->
            <h2 class="mt-3 title">تسجيل المدرببين المراكز الرقمية</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('digitalcenter.odctrainerform.store') }}">
            @csrf

            <!-- بيانات المدرب/المشرف -->
            <div class="section-title">بيانات المدرب/المشرف</div>
            
            <div class="mb-3">
                <label for="trainer_name" class="form-label">اسم المدرب / المشرف المسؤول عن المركز الرقمي</label>
                <input type="text" class="form-control" id="trainer_name" name="trainer_name" required>
            </div>

            <div class="mb-3">
                <label for="organization" class="form-label">الجهة التي أعمل لديها</label>
                <select class="form-select" id="organization" name="organization" required>
                    <option value="" selected disabled>اختر الجهة</option>
                    <option value="وزارة الشباب">وزارة الشباب</option>
                    <option value="وزارة الاقتصاد الرقمي والريادة">وزارة الاقتصاد الرقمي والريادة</option>
                    <option value="جامعة اليرموك">جامعة اليرموك</option>
                    <option value="مركز اورانج الرقمي">مركز اورانج الرقمي</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="digital_center" class="form-label">مركز اورنج الرقمي / Orange Community Digital Center</label>
                <select class="form-select" id="digital_center" name="digital_center" required>
                    <option value="" selected disabled>اختر المركز</option>
                    <option value="مركز أورانج الرقمي - اربد /محطة معرفة الحصن">مركز أورنج الرقمي - اربد /محطة معرفة الحصن</option>
                    <option value="مركز أورائج الرقمي - السلط /مركز شابات العارضه النموذجي">مركز أورائج الرقمي - السلط /مركز شابات العارضه النموذجي</option>
                    <option value="مركز أورانج الرقمي - عجلون /مركز شابات كفر نجه">مركز أورانج الرقمي - عجلون /مركز شابات كفر نجه</option>
                    <option value="مركز أورائج الرقمى - مادبا / محطة معرفة ماعين">مركز أورائج الرقمى - مادبا / محطة معرفة ماعين</option>
                    <option value="مركز أورانج الرقمي - مادبا /محطة معرفة مليح">مركز أورانج الرقمي - مادبا /محطة معرفة مليح</option>
                    <option value="مركز أورانج الرقمى - الضفيلة /محطة معرفة الطفيله">مركز أورانج الرقمى - الطفيلة /محطة معرفة الطفيله</option>
                    <option value="مركز أورانج الرقمى - العقبة /مركز شباب العقبه">مركز أورانج الرقمى - العقبة /مركز شباب العقبه</option>
                    <option value="مركز أورائج الرقمي - الكرك /نادي ابداع الكرك">مركز أورائج الرقمي - الكرك /نادي ابداع الكرك</option>
                    <option value="مركز أورانج الرقمي - الزرقاء / مركز شباب الزرقاء النموذجي">مركز أورانج الرقمي - الزرقاء / مركز شباب الزرقاء النموذجي</option>
                    <option value="مركز اورانج الرقمي - المفرق / محطة معرفة المفرق">مركز اورانج الرقمي - المرق / محطة معرفة المفرق</option>
                    <option value="مركز أورانج الرقمي- محطة معرفة الجامعة الهاشمية">مركز أورانج الرقمي- محطة معرفة الجامعة الهاشمية</option>
                    <option value="مركز اوريج الرقمي تكز شباب دير ابي سعيد">مركز أورانج الرقمي تكز شباب دير ابي سعيد</option>
                    <option value="مركز اورانج الرقمي- مركز شباب الشوبك">مركز اورانج الرقمي- مركز شباب الشوبك</option>
                    <option value="مركز اورنج الرقمي-مركز شباب معان النموذجي">مركز اورنج الرقمي-مركز شباب معان النموذجي</option>
                    <option value="مركز أورانج الرقمي- محطة معرفة الكتة">مركز أورانج الرقمي- محطة معرفة الكتة</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="governorate" class="form-label">المحافظة</label>
                <select class="form-select" id="governorate" name="governorate" required>
                    <option value="" selected disabled>اختر المحافظة</option>
                    <option value="عمان">عمان</option>
                    <option value="إربد">إربد</option>
                    <option value="الزرقاء">الزرقاء</option>
                    <option value="المفرق">المفرق</option>
                    <option value="البلقاء">البلقاء</option>
                    <option value="مادبا">مادبا</option>
                    <option value="جرش">جرش</option>
                    <option value="عجلون">عجلون</option>
                    <option value="الكرك">الكرك</option>
                    <option value="معان">معان</option>
                    <option value="الطفيلة">الطفيلة</option>
                    <option value="العقبة">العقبة</option>
                </select>
            </div>

            <!-- الدورات التدريبية -->
            <div class="section-title">الدورات التدريبية المستهدف إعطاؤها</div>
            
            <div class="mb-3" dir="rtl">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="career_planning" name="courses[]" value="career_planning">
        <label class="form-check-label" for="career_planning">
            Career Planning & Development Program- التخطيط والتطوير الوظيفي
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="soft_skills" name="courses[]" value="soft_skills">
        <label class="form-check-label" for="soft_skills">
            Soft Skills - مهارات حياتية
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="digital_culture" name="courses[]" value="digital_culture">
        <label class="form-check-label" for="digital_culture">
            Digital Culture - مهارات رقمية
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="entrepreneurship" name="courses[]" value="entrepreneurship">
        <label class="form-check-label" for="entrepreneurship">
            Entrepreneurship & Innovation - مهارات الريادة والابتكار
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="giglancing" name="courses[]" value="giglancing">
        <label class="form-check-label" for="giglancing">
            Giglancing - العمل الحر
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="other_topics" name="courses[]" value="other_topics">
        <label class="form-check-label" for="other_topics">
            مواضيع اخرى
        </label>
    </div>
</div>

        <!-- التخطيط والتطوير الوظيفي -->
<!-- التخطيط والتطوير الوظيفي -->
<div class="course-details" id="career_planning_details">
    <div class="section-title">الجدول الزمني لدورة التخطيط والتطوير الوظيفي</div>

    <div class="mb-3">
        <label class="form-label">الشهر</label>
        <div class="d-flex flex-wrap gap-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="career_month_1" name="career_months[]" value="1">
                <label class="form-check-label" for="career_month_1">شهر 1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="career_month_2" name="career_months[]" value="2">
                <label class="form-check-label" for="career_month_2">شهر 2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="career_month_3" name="career_months[]" value="3">
                <label class="form-check-label" for="career_month_3">شهر 3</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="career_month_4" name="career_months[]" value="4">
                <label class="form-check-label" for="career_month_4">شهر 4</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="career_month_5" name="career_months[]" value="5">
                <label class="form-check-label" for="career_month_5">شهر 5</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="career_month_6" name="career_months[]" value="6">
                <label class="form-check-label" for="career_month_6">شهر 6</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="career_month_7" name="career_months[]" value="7">
                <label class="form-check-label" for="career_month_7">شهر 7</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="career_month_8" name="career_months[]" value="8">
                <label class="form-check-label" for="career_month_8">شهر 8</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="career_month_9" name="career_months[]" value="9">
                <label class="form-check-label" for="career_month_9">شهر 9</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="career_month_10" name="career_months[]" value="10">
                <label class="form-check-label" for="career_month_10">شهر 10</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="career_month_11" name="career_months[]" value="11">
                <label class="form-check-label" for="career_month_11">شهر 11</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="career_month_12" name="career_months[]" value="12">
                <label class="form-check-label" for="career_month_12">شهر 12</label>
            </div>
        </div>
    </div>
</div>



                <div class="mb-3">
                    <label for="career_days" class="form-label">عدد الأيام التدريبية المستهدفة خلال الشهر</label>
                    <input type="number" class="form-control" id="career_days" name="career_days" min="1">
                </div>


                <div class="mb-3">
                    <label class="form-label">المواضيع التدريبية التي سيتم تقديمها</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="career_topic_1" name="career_topics[]" value="اكتشف الخيارات">
                        <label class="form-check-label" for="career_topic_1">اكتشف الخيارات</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="career_topic_2" name="career_topics[]" value="التركيز والتخطيط">
                        <label class="form-check-label" for="career_topic_2">التركيز والتخطيط</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="career_topic_3" name="career_topics[]" value="اتخاذ الاجراءات">
                        <label class="form-check-label" for="career_topic_3">اتخاذ الاجراءات</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="career_topic_4" name="career_topics[]" value="الحفاظ على الوظيفة المهنية">
                        <label class="form-check-label" for="career_topic_4">الحفاظ على الوظيفة المهنية</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="career_topic_5" name="career_topics[]" value="الوعي الذاتي">
                        <label class="form-check-label" for="career_topic_5">الوعي الذاتي</label>
                    </div>
                </div>







                <div class="course-details" id="career_planning_details">
                    <div class="section-title">الجدول الزمني لدورة المهارات الحياتية
                    </div>
                
                    <div class="mb-3">
                        <label class="form-label">الشهر</label>
                        <div class="d-flex flex-wrap gap-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="career_month_1" name="career_months[]" value="1">
                                <label class="form-check-label" for="career_month_1">شهر 1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="career_month_2" name="career_months[]" value="2">
                                <label class="form-check-label" for="career_month_2">شهر 2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="career_month_3" name="career_months[]" value="3">
                                <label class="form-check-label" for="career_month_3">شهر 3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="career_month_4" name="career_months[]" value="4">
                                <label class="form-check-label" for="career_month_4">شهر 4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="career_month_5" name="career_months[]" value="5">
                                <label class="form-check-label" for="career_month_5">شهر 5</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="career_month_6" name="career_months[]" value="6">
                                <label class="form-check-label" for="career_month_6">شهر 6</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="career_month_7" name="career_months[]" value="7">
                                <label class="form-check-label" for="career_month_7">شهر 7</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="career_month_8" name="career_months[]" value="8">
                                <label class="form-check-label" for="career_month_8">شهر 8</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="career_month_9" name="career_months[]" value="9">
                                <label class="form-check-label" for="career_month_9">شهر 9</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="career_month_10" name="career_months[]" value="10">
                                <label class="form-check-label" for="career_month_10">شهر 10</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="career_month_11" name="career_months[]" value="11">
                                <label class="form-check-label" for="career_month_11">شهر 11</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="career_month_12" name="career_months[]" value="12">
                                <label class="form-check-label" for="career_month_12">شهر 12</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="soft_days" class="form-label">عدد الأيام التدريبية المستهدفة خلال الشهر</label>
                    <input type="number" class="form-control" id="soft_days" name="soft_days" min="1">
                </div>



                <div class="mb-3">
                    <label class="form-label">المواضيع التدريبية التي سيتم تقديمها</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="topic_1" name="topics[]" value="ادارة التغيير">
                        <label class="form-check-label" for="topic_1">ادارة التغيير</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="topic_2" name="topics[]" value="حل المشكلات والتغيير الابداعي">
                        <label class="form-check-label" for="topic_2">حل المشكلات والتغيير الابداعي</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="topic_3" name="topics[]" value="مهارات القيادة والتخطيط والادارة">
                        <label class="form-check-label" for="topic_3">مهارات القيادة والتخطيط والادارة</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="topic_4" name="topics[]" value="مهارات التواصل">
                        <label class="form-check-label" for="topic_4">مهارات التواصل</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="topic_5" name="topics[]" value="مهارات العرض التقديمي الفعال ونصب الافكار">
                        <label class="form-check-label" for="topic_5">مهارات العرض التقديمي الفعال ونصب الافكار</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="topic_6" name="topics[]" value="مهارات الكتابة التقنية">
                        <label class="form-check-label" for="topic_6">مهارات الكتابة التقنية</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="topic_7" name="topics[]" value="التفكير التصميمي ومهارات السرد القصصي">
                        <label class="form-check-label" for="topic_7">التفكير التصميمي ومهارات السرد القصصي</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="topic_8" name="topics[]" value="مهارات التطوير والتمكين الذاتي">
                        <label class="form-check-label" for="topic_8">مهارات التطوير والتمكين الذاتي</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="topic_9" name="topics[]" value="الذكاء العاطفي والتعامل مع الضغوط">
                        <label class="form-check-label" for="topic_9">الذكاء العاطفي والتعامل مع الضغوط</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="topic_10" name="topics[]" value="قانون العمل الاردني والاجراءات الخاصة بغرفة الصناعة والتجارة">
                        <label class="form-check-label" for="topic_10">قانون العمل الاردني والاجراءات الخاصة بغرفة الصناعة والتجارة</label>
                    </div>
                </div>
          

         <!-- المهارات الحياتية -->
<div class="course-details" id="soft_skills_details">
    <div class="section-title">الجدول الزمني لدورة المهارات الرقمية
    </div>

    <div class="mb-3">
        <label class="form-label">الشهر</label>
        <div class="d-flex flex-wrap gap-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="soft_month_1" name="soft_months[]" value="1">
                <label class="form-check-label" for="soft_month_1">شهر 1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="soft_month_2" name="soft_months[]" value="2">
                <label class="form-check-label" for="soft_month_2">شهر 2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="soft_month_3" name="soft_months[]" value="3">
                <label class="form-check-label" for="soft_month_3">شهر 3</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="soft_month_4" name="soft_months[]" value="4">
                <label class="form-check-label" for="soft_month_4">شهر 4</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="soft_month_5" name="soft_months[]" value="5">
                <label class="form-check-label" for="soft_month_5">شهر 5</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="soft_month_6" name="soft_months[]" value="6">
                <label class="form-check-label" for="soft_month_6">شهر 6</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="soft_month_7" name="soft_months[]" value="7">
                <label class="form-check-label" for="soft_month_7">شهر 7</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="soft_month_8" name="soft_months[]" value="8">
                <label class="form-check-label" for="soft_month_8">شهر 8</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="soft_month_9" name="soft_months[]" value="9">
                <label class="form-check-label" for="soft_month_9">شهر 9</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="soft_month_10" name="soft_months[]" value="10">
                <label class="form-check-label" for="soft_month_10">شهر 10</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="soft_month_11" name="soft_months[]" value="11">
                <label class="form-check-label" for="soft_month_11">شهر 11</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="soft_month_12" name="soft_months[]" value="12">
                <label class="form-check-label" for="soft_month_12">شهر 12</label>
            </div>
        </div>
    </div>
</div>


                <div class="mb-3">
                    <label for="soft_days" class="form-label">عدد الأيام التدريبية المستهدفة خلال الشهر</label>
                    <input type="number" class="form-control" id="soft_days" name="soft_days" min="1">
                </div>

                <div class="mb-3">
                    <label class="form-label">المواضيع التدريبية التي سيتم تقديمها</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="digital_topic_1" name="digital_topics[]" value="التحول الرقمي">
                        <label class="form-check-label" for="digital_topic_1">التحول الرقمي</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="digital_topic_2" name="digital_topics[]" value="الذكاء الاصطناعي">
                        <label class="form-check-label" for="digital_topic_2">الذكاء الاصطناعي</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="digital_topic_3" name="digital_topics[]" value="البيانات الضخمة">
                        <label class="form-check-label" for="digital_topic_3">البيانات الضخمة</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="digital_topic_4" name="digital_topics[]" value="الحوسبة السحابية">
                        <label class="form-check-label" for="digital_topic_4">الحوسبة السحابية</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="digital_topic_5" name="digital_topics[]" value="انترنت الاشياء">
                        <label class="form-check-label" for="digital_topic_5">انترنت الاشياء</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="digital_topic_6" name="digital_topics[]" value="التجارة الالكترونية">
                        <label class="form-check-label" for="digital_topic_6">التجارة الالكترونية</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="digital_topic_7" name="digital_topics[]" value="التسويق الرقمي">
                        <label class="form-check-label" for="digital_topic_7">التسويق الرقمي</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="digital_topic_8" name="digital_topics[]" value="المنصات الاجتماعية">
                        <label class="form-check-label" for="digital_topic_8">المنصات الاجتماعية</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="digital_topic_9" name="digital_topics[]" value="اللغة الانجليزية واستخداماتها في الثقافة الرقمية">
                        <label class="form-check-label" for="digital_topic_9">اللغة الانجليزية واستخداماتها في الثقافة الرقمية</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="digital_topic_10" name="digital_topics[]" value="سلسلة الكتل">
                        <label class="form-check-label" for="digital_topic_10">سلسلة الكتل</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="digital_topic_11" name="digital_topics[]" value="أدوات الذكاء الاصطناعي">
                        <label class="form-check-label" for="digital_topic_11">أدوات الذكاء الاصطناعي</label>
                    </div>
                </div>

   <!-- مهارات الريادة والابتكار -->
<div class="course-details" id="entrepreneurship_details">
    <div class="section-title">الجدول الزمني لدورة مهارات الريادة والابتكار</div>

    <div class="mb-3">
        <label class="form-label">الشهر</label>
        <div class="d-flex flex-wrap gap-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="entre_month_1" name="entre_months[]" value="1">
                <label class="form-check-label" for="entre_month_1">شهر 1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="entre_month_2" name="entre_months[]" value="2">
                <label class="form-check-label" for="entre_month_2">شهر 2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="entre_month_3" name="entre_months[]" value="3">
                <label class="form-check-label" for="entre_month_3">شهر 3</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="entre_month_4" name="entre_months[]" value="4">
                <label class="form-check-label" for="entre_month_4">شهر 4</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="entre_month_5" name="entre_months[]" value="5">
                <label class="form-check-label" for="entre_month_5">شهر 5</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="entre_month_6" name="entre_months[]" value="6">
                <label class="form-check-label" for="entre_month_6">شهر 6</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="entre_month_7" name="entre_months[]" value="7">
                <label class="form-check-label" for="entre_month_7">شهر 7</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="entre_month_8" name="entre_months[]" value="8">
                <label class="form-check-label" for="entre_month_8">شهر 8</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="entre_month_9" name="entre_months[]" value="9">
                <label class="form-check-label" for="entre_month_9">شهر 9</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="entre_month_10" name="entre_months[]" value="10">
                <label class="form-check-label" for="entre_month_10">شهر 10</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="entre_month_11" name="entre_months[]" value="11">
                <label class="form-check-label" for="entre_month_11">شهر 11</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="entre_month_12" name="entre_months[]" value="12">
                <label class="form-check-label" for="entre_month_12">شهر 12</label>
            </div>
        </div>
    </div>
</div>


                <div class="mb-3">
                    <label for="entre_days" class="form-label">عدد الأيام التدريبية المستهدفة خلال الشهر</label>
                    <input type="number" class="form-control" id="entre_days" name="entre_days" min="1">
                </div>

                <div class="mb-3">
                    <label class="form-label">المواضيع التدريبية التي سيتم تقديمها</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="entre_topic_1" name="entre_topics[]" value="أساسيات ريادة الاعمال">
                        <label class="form-check-label" for="entre_topic_1">أساسيات ريادة الاعمال</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="entre_topic_2" name="entre_topics[]" value="أساسيات ريادة الاعمال المتقدمة">
                        <label class="form-check-label" for="entre_topic_2">أساسيات ريادة الاعمال المتقدمة</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="entre_topic_3" name="entre_topics[]" value="الابتكار">
                        <label class="form-check-label" for="entre_topic_3">الابتكار</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="entre_topic_4" name="entre_topics[]" value="نصب الافكار">
                        <label class="form-check-label" for="entre_topic_4">نصب الافكار</label>
                    </div>
                </div>
                    <!-- العمل الحر -->
            <div class="course-details" id="giglancing_details">
                <div class="section-title">الجدول الزمني لدورة العمل الحر</div>
                
                <div class="mb-3">
                    <label class="form-label">الشهر</label>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="entre_month_1" name="entre_months[]" value="1">
                            <label class="form-check-label" for="entre_month_1">شهر 1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="entre_month_2" name="entre_months[]" value="2">
                            <label class="form-check-label" for="entre_month_2">شهر 2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="entre_month_3" name="entre_months[]" value="3">
                            <label class="form-check-label" for="entre_month_3">شهر 3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="entre_month_4" name="entre_months[]" value="4">
                            <label class="form-check-label" for="entre_month_4">شهر 4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="entre_month_5" name="entre_months[]" value="5">
                            <label class="form-check-label" for="entre_month_5">شهر 5</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="entre_month_6" name="entre_months[]" value="6">
                            <label class="form-check-label" for="entre_month_6">شهر 6</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="entre_month_7" name="entre_months[]" value="7">
                            <label class="form-check-label" for="entre_month_7">شهر 7</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="entre_month_8" name="entre_months[]" value="8">
                            <label class="form-check-label" for="entre_month_8">شهر 8</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="entre_month_9" name="entre_months[]" value="9">
                            <label class="form-check-label" for="entre_month_9">شهر 9</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="entre_month_10" name="entre_months[]" value="10">
                            <label class="form-check-label" for="entre_month_10">شهر 10</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="entre_month_11" name="entre_months[]" value="11">
                            <label class="form-check-label" for="entre_month_11">شهر 11</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="entre_month_12" name="entre_months[]" value="12">
                            <label class="form-check-label" for="entre_month_12">شهر 12</label>
                        </div>
                    </div>
                </div>



                <div class="mb-3">
                    <label for="soft_days" class="form-label">عدد الأيام التدريبية المستهدفة خلال الشهر</label>
                    <input type="number" class="form-control" id="soft_days" name="soft_days" min="1">
                </div>

                <div class="mb-3">
                    <label class="form-label">المواضيع التدريبية التي سيتم تقديمها</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="entre_topic_1" name="entre_topics[]" value="أساسيات ريادة الاعمال">
                        <label class="form-check-label" for="entre_topic_1">منصات العمل الحر</label>
                    </div>
          
                </div>

            


                <div class="course-details" id="giglancing_details">
                    <div class="section-title">الجدول الزمني للدورات الاخرى
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">الشهر</label>
                        <div class="d-flex flex-wrap gap-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="entre_month_1" name="entre_months[]" value="1">
                                <label class="form-check-label" for="entre_month_1">شهر 1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="entre_month_2" name="entre_months[]" value="2">
                                <label class="form-check-label" for="entre_month_2">شهر 2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="entre_month_3" name="entre_months[]" value="3">
                                <label class="form-check-label" for="entre_month_3">شهر 3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="entre_month_4" name="entre_months[]" value="4">
                                <label class="form-check-label" for="entre_month_4">شهر 4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="entre_month_5" name="entre_months[]" value="5">
                                <label class="form-check-label" for="entre_month_5">شهر 5</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="entre_month_6" name="entre_months[]" value="6">
                                <label class="form-check-label" for="entre_month_6">شهر 6</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="entre_month_7" name="entre_months[]" value="7">
                                <label class="form-check-label" for="entre_month_7">شهر 7</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="entre_month_8" name="entre_months[]" value="8">
                                <label class="form-check-label" for="entre_month_8">شهر 8</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="entre_month_9" name="entre_months[]" value="9">
                                <label class="form-check-label" for="entre_month_9">شهر 9</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="entre_month_10" name="entre_months[]" value="10">
                                <label class="form-check-label" for="entre_month_10">شهر 10</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="entre_month_11" name="entre_months[]" value="11">
                                <label class="form-check-label" for="entre_month_11">شهر 11</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="entre_month_12" name="entre_months[]" value="12">
                                <label class="form-check-label" for="entre_month_12">شهر 12</label>
                            </div>
                        </div>
                    </div>


                    
                <div class="mb-3">
                    <label for="soft_days" class="form-label">عدد الأيام التدريبية المستهدفة خلال الشهر</label>
                    <input type="number" class="form-control" id="soft_days" name="soft_days" min="1">
                </div>


                <div class="mb-3">
                    <label for="trainer_name" class="form-label">ارجو كتابة المواضيع في المساحة المخصصة ادناه 
                    </label>
                    <input type="text" class="form-control" id="other" name="other" required>
                </div>


                <button type="submit" class="btn btn-primary">إرسال</button>
                </form>
        </div>
            </div>

        
    
</body>
</html>


