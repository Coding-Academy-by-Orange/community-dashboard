@extends('layouts.app')
@section('title')
    Fiber Academy
@endsection
@section('main')
    <style>
        .social-icon {
            background-color: #ff7900;
            border-radius: 50%;
            display: inline-block;
            width: 3.3rem;
            height: 3.3rem;
            margin-right: 10px;
        }

        .social-icon img {
            width: 1.4rem !important;
            height: 1.4rem !important;
            -o-object-fit: contain;
            object-fit: contain;
            margin: 1rem auto;
            display: block;
        }
    </style>
    <div class="bg-black mb-lg-5 border-dark border-1" data-bs-theme="dark">
        <div class="bg-dark"></div>
        <div class="container position-relative z-0">
            <div class="row pt-3 px-5">
                <div class="col-5 pt-5 z-1">
                    <h1 class=" pt-1 pt-md-4 mb-2 mb-md-3 display-3 text-primary">Fiber Academy</h1>
                    <h2 class="display-4 text-white">Empowering Tomorrow's Technology Today</h2>
                    <p class="ll-sm pt-1 mb-3">Unleash your creativity and drive innovation forward.
                        Join us in shaping the digital future.</p>
                    <a href="{{route('fiberacademy.create')}}" class="btn btn-primary">Register Now</a>
                </div>
                   <div class="col-4 d-none d-md-block pt-2">
                    <img
                        src="https://orange.jo/sites/default/files/styles/m1640x607/public/2023-10/The%20Studio_Web%20EN.png?itok=Gb_DT-92"
                        class="position-absolute end-0 w-100" alt="...">
                 </div>
            </div>
        </div>
        <!-- Add more carousel items here if needed -->
    </div>


    <section class="container mb-md-5 pt-md-5 mt-md-5 border-dark border-1">
    <div class="row px-5 mt-5 text-end" dir="rtl">
    <div class="col-12 our-impact-header mb-5 text-center d-flex flex-column align-items-center justify-content-center">
        <p>ابقَ على اطلاع</p>
        <h2 class="text-center display-3">الشروط والأحكام</h2>
        <div class="border-bottom border-5 border-primary" style="width: 7%;"></div>
    </div>

    <div class="col-12 text-end mt-4 px-5">
        <p>
            نشكر لكم اهتمامكم في برنامج <strong>"أكاديمية الفايبر"</strong> برعاية اورنج وشركة مستقبل الأردن للتطوير والاستدامة، 
            والذي يهدف إلى تزويدكم بالمهارات والخبرات التي تحتاجونها لتزيد فرصكم الوظيفية كمـوظفي مبيعات فايبر محترفين.
        </p>
        <p>
            كما نرجو منكم الاطلاع على المعلومات المذكورة أدناه وقراءتها بشكل كامل ودقيق حيث تحتوي على جميع المعلومات 
            والشروط اللازمة للالتحاق في البرنامج والحصول على الشهادة.
        </p>
        <p class="fw-bold text-danger">
            ( سيكون الخريجون مرشحون للحصول على وظيفة ميدانية لبيع الفايبر في المؤسسات التي تقدم خدمات الفايبر )
        </p>

        <h4 class="mt-4">عن البرنامج التدريبي:</h4>
        <p>
            مدة البرنامج شهرين متتاليين و يبدأ التدريب <strong>13-4-2025</strong>.
        </p>
        <p>
            يتضمن البرنامج التدريبي أربع مواضيع:
        </p>
        <ul>
            <li> مهارات حياتية (اسبوعين).</li>
            <li> لغة إنجليزية (اسبوعين).</li>
            <li> تكنولوجيا الفايبر (اسبوع).</li>
            <li> مهارات البيع الأساسية والمتقدمة (ثلاثة أسابيع).</li>
        </ul>

        <h4 class="mt-4">شروط التقديم للبرنامج:</h4>
        <ul >
            <li>يجب أن يكون المتدرب أردني الجنسية.</li>
            <li> يجب أن لا يكون المتدرب حاصلًا على عمل أو وظيفة.</li>
            <li> يجب التفرغ كاملًا طوال مدة التدريب، والتي تبلغ شهرين متتاليين.</li>
            <li> يجب أن يكون المتدرب حاصلًا على شهادة التوجيهي كحد أدنى.</li>
            <li> يجب أن يكون المتدرب قادرًا على تحمل ضغط العمل.</li>
        </ul>

        <h4 class="mt-4">شروط الحصول على الشهادة الخاصة ببرنامج "أكاديمية الفايبر":</h4>
        <ul >
            <li> الالتزام الكامل بحضور جميع الأيام التدريبية وألا تتجاوز عدد الغيابات 3 أيام من إجمالي أيام البرنامج.</li>
            <li> المشاركة الفعالة في جميع النشاطات المتعلقة بالبرنامج مثل ورشات العمل...إلخ.</li>
            <li> الالتزام بإنهاء جميع المهام التدريبية المطلوبة والنشاطات الجماعية والتقييمات.</li>
            <li> الحصول على ناجح في تقييم اللغة الإنجليزية.</li>
            <li> الحصول على ناجح في التقييم النهائي لمهارات خدمات الفايبر.</li>
            <li> الحصول على ناجح في التقييم النهائي لمهارات البيع.</li>
        </ul>
    </div>
</div>


        @if (isset($activities) && count($activities) > 0)

            <div class="container slide-activity px-4">
                @foreach ($activities as $activity)
                    <div class="card" style="width: 15em;">
                        @php
                            $imageArray = json_decode($activity->image);
                        @endphp
                        @if (is_array($imageArray) && count($imageArray) > 1)
                            <div id="activity{{ $activity->id }}" class="carousel slide card-img"
                                 data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($imageArray as $index => $imagePath)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ URL::asset('storage/image/' . $imagePath) }}" class="d-block"
                                                 style="height: 50vh;" alt="{{ $activity->activity_name }}">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                        data-bs-target="#activity{{ $activity->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                        data-bs-target="#activity{{ $activity->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </button>
                            </div>
                        @else
                            @php
                                $imageArray = json_decode($activity->image);
                            @endphp
                            <img src="{{ URL::asset('storage/image/' . $imageArray[0]) }}" class="card-img"
                                 style="height: 50vh;" alt="{{ $activity->activity_name }}">
                        @endif
                        <div class="card-img-overlay pt-5 pb-0 text-white">
                            <h1 class="py-3">{{ $activity->activity_name }}</h1>
                            <div class="py-3">
                                <i class="fa-solid fa-location-dot"></i>
                                {{ $activity->location->name }}
                            </div>
                            <p class="text-truncate" style="max-width: 150px;">{{ $activity->description }}</p>
                            <a href="{{ route('show', $activity) }}" class="btn btn-primary mt-4">See More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    <section class="impact"
             style="background: url({{ URL::asset('assets/img/impact.png') }});-webkit-background-size: cover;background-size: cover;z-index: -1;height: 31rem;width: 100%">
        <div class="container text-white py-5">
            <div class="row ">
                <div
                    class=" col-12 our-impact-header mb-5 text-center d-flex flex-column align-items-center justify-content-center">
                    <div class="sub-title">On the Society</div>
                    <h1>Our Impact</h1>
                    <div class=" border-bottom  border-5 border-white " style="width: 7%"></div>
                </div>
                <div class="slider-impact row py-5 d-flex justify-content-center align-items-center">
                    <div class="col-3 border-start border-light">
                        <div class=" text-primary p-3 display-3">50</div>
                        <div class="px-3">
                            <div class="display-5pb-1">Locations</div>
                            <p>We are present in 50 locations, providing widespread access to digital resources.</p>
                        </div>
                    </div>
                    <div class="col-3 border-start border-light">
                        <div class="text-primary number p-3 display-3">3260</div>
                        <div class="px-3">
                            <div class="display-5 pb-1">Total Beneficiaries</div>
                            <p class="ll-sm">Our initiatives have positively impacted 3260 individuals, fostering
                                innovation and digital skills.</p>
                        </div>
                    </div>
                    <div class="col-3 border-start border-white">
                        <div class="container text-primary p-3 display-3">30%</div>
                        <div class="container px-3">
                            <div class="display-5 pb-1">Women Participation</div>
                            <p class="ll-sm">30% of our beneficiaries are women, highlighting our commitment to gender
                                diversity and inclusion.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="bg-dark mb-3">
        <div class="container py-5">
            <div class="row d-flex">
                <div class="col-4 align-self-md-center">
                    <h3 class="text-white display-4"><span class="text-primary">Orange</span> Digital Centers</h3>
                </div>

                <div class="col-4 d-flex align-self-md-center  justify-content-md-center">
                    <a href="https://twitter.com/ODCJordan" target="_blank" class="social-icon">
                        <img alt="Twitter" src="https://orange.jo/sites/default/files/inline-images/twitter_1.svg">
                    </a>
                    <a href="https://www.facebook.com/ODCJordan" target="_blank" class="social-icon">
                        <img alt="Facebook" src="https://orange.jo/sites/default/files/inline-images/facebook_1.svg">
                    </a>
                    <a href="https://www.instagram.com/odcjordan/" target="_blank" class="social-icon">
                        <img alt="Instagram" src="https://orange.jo/sites/default/files/inline-images/instagram_0.svg">
                    </a>
                    <a href="https://www.linkedin.com/company/orange-jordan/?originalSubdomain=jo" target="_blank" class="social-icon">
                        <img alt="Linkedin" src="https://orange.jo/sites/default/files/inline-images/linkedin.svg">
                    </a>
                </div>

                <div class="col-4 align-self-md-center">
                    <h5 class=" display-5 text-white">Follow us on social media</h5>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.slide-activity').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: true,
                dots: true,
                speed: 300,
                infinite: true,
                autoplaySpeed: 5000,
                autoplay: true,
                responsive: [{
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
            $('.slider-impact').slick({
                slidesToShow: 4,
                slidesToScroll: 4,
                arrows: false,
                dots: true,
                speed: 300,
                infinite: true,
                autoplaySpeed: 5000,
                autoplay: true,
                responsive: [{
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        });
    </script>
@endsection
