<!DOCTYPE html>
<html lang="en">

<head>
    <!DOCTYPE html>
    <html lang="en">

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
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.2/dist/css/orangeHelvetica.min.css"
            integrity="sha384-6rPwIH6o8roADEALG0VtZOLfj0bDJ8KUOX7N+cjS+7NkwAaBQOZwRPOIiKWJa0aL" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.2/dist/css/orangeIcons.min.css"
            integrity="sha384-XQ+QuxWl/eBTAPcvP8xjhUXg+GB+kArKZpnDyXUz1pLOe6yAfZzxkSygkYxNfKHT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.2/dist/css/boosted.min.css"
            integrity="sha384-gf+Y5XR9AaDz8jxrG8h6a3BYpN7fOpxA97a0i8QHgwnRKNOuahm7ZQfqzxaNW+aJ" crossorigin="anonymous"> --}}
        {{-- <link href="{{ asset('assets/css/client.css') }}" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{ asset('css/style.landing.css') }}">
        <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css"
            href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
        <link href="https://cdn.jsdelivr.net/npm/boosted@5.3.2/dist/css/orange-helvetica.min.css" rel="stylesheet"
            integrity="sha384-A0Qk1uKfS1i83/YuU13i2nx5pk79PkIfNFOVzTcjCMPGKIDj9Lqx9lJmV7cdBVQZ" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/boosted@5.3.2/dist/css/boosted.min.css" rel="stylesheet"
            integrity="sha384-fyenpx19UpfUhZ+SD9o9IdxeIJKE6upKx0B54OcXy1TqnO660Qw9xw6rOASP+eir" crossorigin="anonymous">
        <link rel="preconnect" href="https://code.jquery.com" crossorigin="anonymous">
        <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin="anonymous">
        <link rel="shortcut icon"
            href="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Orange_logo.svg/1200px-Orange_logo.svg.png"
            type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/boosted@5.3.1/dist/js/boosted.min.js"
            integrity="sha384-5/uuaktuMuP89rRLLF12Nmffr7aMWkLWFVq2xzMjqdXlOiMsRRHpbz3oG92Gvj7u" crossorigin="anonymous">
        </script>
    </head>

<body>
    <header class="sticky-top">
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg pb-2"
            aria-label="Global navigation - With one line title example">
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
                        <li class="nav-item"><a class="nav-link active" href="/">Home </a></li>
                        <li class="nav-item"><a class="nav-link" href="/codingacademy">Coding Academy</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('fablab.index') }}">Fablab</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('ODC.index') }}">Generic Digital Centers</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('BigByOrange.index') }}">Big By Orange</a></li>
                        <li class="nav-item"><a class="nav-link" href="/help" target="_blank">Help </a></li>
                        <li class="nav-item"><a class="nav-link" href="/terms" target="_blank"> Terms & Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    {{-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white ; border-bottom : 5px solid black">
            <div class="container-fluid d-flex" style="justify-content: space-between">
                <div>
                    <a href="#">
                        <img src="https://boosted.orange.com/docs/5.2/assets/brand/orange-logo.svg" style="width=450px !important ; height: 50px !important" alt="Boosted" loading="lazy">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: end;">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/codingacademy">Coding Academy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/fablab-registration">Fablab</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/ODC">Generic Digital Centers</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> --}}
    <div class="main">
        <section>
            <div class="container" id='colorBlock'></div>
            <div class="container-fluid pt-5 bg-dark  ps-0 pe-5 me-0 " id="header">
                <div class="card ">
                    <div class="card-img bg-dark">
                        <img src="{{ asset('assets/img/landing-page.webp') }}"class="float-end"
                            style="min-width: 51em; height:65vh" alt="...">
                    </div>
                    <div class="card-img-overlay  text-primary">
                        <div class="container float-start w-50">
                            <p class="breadcrumb text-primary">Orange CSR</p>
                            <h1 class="text-primary">Orange CSR</h1>
                            <h2>Inspired By The Group’s “Lead the Future” Strategic Plan </h2>
                            <p class="card-text text-white">Orange Jordan’s corporate social responsibility transforms
                                lives and local communities through digital transformation</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container my-5">
            <div class="row ">
                <div class="col-3 ">
                    <a href="/codingacademy" class="p-3 card d-flex text-decoration-none components">
                        <div class="row">
                            <div class="col-5">
                                <span class="fa-solid fa-school h2 p-3 mb-0"></span>
                            </div>
                            <div class="col-7 mb-0 pt-3 component-name">
                                Coding Academy
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="/fablab-registration" class="p-3 card d-flex text-decoration-none components">
                        <div class="row">
                            <div class="col-5">
                                <span class="fa-solid fa-rocket h2 p-3 mb-0"></span>
                            </div>
                            <div class="col-7 mb-0 pt-3 component-name">
                                FabLab
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="/ODC" class="p-3 card d-flex text-decoration-none components">
                        <div class="row">
                            <div class="col-5">
                                <span class="fa-solid fa-building h2 p-3 mb-0"></span>
                            </div>
                            <div class="col-7 mb-0 pt-3 component-name">
                                ODC
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ route('BigByOrange.index') }}"
                        class="p-3 card d-flex text-decoration-none components">
                        <div class="row">
                            <div class="col-5">
                                <span class="fa-solid fa-microchip h2 p-3 mb-0"></span>
                            </div>
                            <div class="col-7 mb-0 pt-3 component-name">
                                Big By Orange
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section>
            <div class="container px-5 center">
                <h2>News and Activities</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi sunt perferendis excepturi veniam
                    modi aut, dignissimos sapiente non, velit quos dolore distinctio veritatis ullam iure et hic! Ad, ut
                    accusamus.</p>
            </div>
            @if (isset($activities) && count($activities) > 0)
                <div class="container slide-activity px-4">
                    @foreach ($activities as $activity)
                        <div class="card " style=" width: 15em;">
                            @if (is_array($activity->image) && count($activity->image) > 1)
                                <div id="activity{{ $activity->id }}" class="carousel slide card-img"
                                    data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($activity->image as $index => $imagePath)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $imagePath) }}" class="d-block"
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
                                <img src="{{ asset('storage/' . $imageArray[0]) }}" class="card-img"
                                    style="height: 50vh; " alt="{{ $activity->activity_name }}">
                            @endif
                            <div class="card-img-overlay pt-5 pb-0 text-white">
                                <h1 class="py-3">{{ $activity->activity_name }} </h1>
                                <div class="d-flex justify-content-between py-3">
                                    <div>
                                        <i class="fa-regular fa-calendar"></i>
                                        {{ date('Y/m/d', strtotime($activity->start_date)) }}
                                        - {{ date('Y/m/d', strtotime($activity->end_date)) }}
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-location-dot"></i>
                                        {{ $activity->location }}
                                    </div>
                                </div>
                                <p class="text-truncate"style="max-width: 150px;">{{ $activity->description }}
                                </p>
                                <a href="{{ route('show', $activity) }}" class="btn btn-primary mt-4">See More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
        <section class="impact">
            <div class="container text-white p-5">
                <div class="our-impact-header center mb-5">
                    <div class="sub-title">On the Society</div>
                    <h1>Our Impact</h1>
                </div>
                <div class="slider-impact pt-5">
                    <div class="d-flex ">
                        <div class="container">
                            <div class="container text-primary number p-3">336</div>
                            <div class="container px-3 ">
                                <div class="impact-title pb-1">Title Title</div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <div class="container border-start">
                            <div class="container text-primary number p-3">336</div>
                            <div class="container px-3 ">
                                <div class="impact-title pb-1">Title Title</div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <div class="container border-start">
                            <div class="container text-primary number p-3">336</div>
                            <div class="container px-3 ">
                                <div class="impact-title pb-1">Title Title</div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <div class="container border-start">
                            <div class="container text-primary number p-3">336</div>
                            <div class="container px-3 ">
                                <div class="impact-title pb-1">Title Title</div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                    </div>
                    <div class=" d-flex">
                        <div class="container">
                            <div class="container text-primary number p-3">336</div>
                            <div class="container px-3 ">
                                <div class="impact-title pb-1">Title Title</div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <div class="container border-start">
                            <div class="container text-primary number p-3">336</div>
                            <div class="container px-3 ">
                                <div class="impact-title pb-1">Title Title</div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <div class="container border-start">
                            <div class="container text-primary number p-3">336</div>
                            <div class="container px-3 ">
                                <div class="impact-title pb-1">Title Title</div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <div class="container border-start">
                            <div class="container text-primary number p-3">336</div>
                            <div class="container px-3 ">
                                <div class="impact-title pb-1">Title Title</div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                    </div>
                    <div class=" d-flex">
                        <div class="container">
                            <div class="container text-primary number p-3">336</div>
                            <div class="container px-3 ">
                                <div class="impact-title pb-1">Title Title</div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <div class="container border-start">
                            <div class="container text-primary number p-3">336</div>
                            <div class="container px-3 ">
                                <div class="impact-title pb-1">Title Title</div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <div class="container border-start">
                            <div class="container text-primary number p-3">336</div>
                            <div class="container px-3 ">
                                <div class="impact-title pb-1">Title Title</div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <div class="container border-start">
                            <div class="container text-primary number p-3">336</div>
                            <div class="container px-3 ">
                                <div class="impact-title pb-1">Title Title</div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer bg-dark navbar-dark pt-5">
            <div class="container-xxl footer-title-content ">

                <div class="d-flex justify-content-center">
                    <h3 class="pe-5">Sign up to our mailing list</h3>
                    <form class="d-flex col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5 gap-2 gap-md-3">
                        <label for="inputEmail" class="visually-hidden">Email</label>
                        <input type="email" class="form-control text-bg-dark border-dark" id="inputEmail"
                            placeholder="Enter your email">
                        <button type="submit" class="btn btn-primary btn-inverse text-nowrap">Sign up</button>
                    </form>
                </div>
            </div>
            <hr>
            <div class="container-xxl footer-nav">
                <nav class="accordion accordion-dark" id="accordion2" aria-label="Sitemap footer 2">
                    <div class="row">
                        <div class="footer-column col-md-4">
                            <h3 class="accordion-header footer-heading" id="headingTwo2">
                                <button class="accordion-button collapsed container-xxl px-1 d-md-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="true"
                                    aria-controls="collapseTwo2">
                                    Category
                                </button>
                                <span class="d-none d-md-flex">Category</span>
                            </h3>
                            <div id="collapseTwo2" class="container-xxl accordion-collapse collapse"
                                aria-labelledby="headingTwo2" data-bs-parent="#accordion2">
                                <ul class="navbar-nav">
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingTwo2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingTwo2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingTwo2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingTwo2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingTwo2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingTwo2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingTwo2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingTwo2">Subcategory</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-column col-md-4">
                            <h3 class="accordion-header footer-heading" id="headingThree2">
                                <button class="accordion-button collapsed container-xxl px-1 d-md-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree2" aria-expanded="true"
                                    aria-controls="collapseThree2">
                                    Category
                                </button>
                                <span class="d-none d-md-flex">Category</span>
                            </h3>
                            <div id="collapseThree2" class="container-xxl accordion-collapse collapse"
                                aria-labelledby="headingThree2" data-bs-parent="#accordion2">
                                <ul class="navbar-nav">
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingThree2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingThree2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingThree2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingThree2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingThree2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingThree2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingThree2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingThree2">Subcategory</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-column col-md-4">
                            <h3 class="accordion-header footer-heading" id="headingFour2">
                                <button class="accordion-button collapsed container-xxl px-1 d-md-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour2" aria-expanded="true"
                                    aria-controls="collapseFour2">
                                    Category
                                </button>
                                <span class="d-none d-md-flex">Category</span>
                            </h3>
                            <div id="collapseFour2" class="container-xxl accordion-collapse collapse"
                                aria-labelledby="headingFour2" data-bs-parent="#accordion2">
                                <ul class="navbar-nav">
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingFour2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingFour2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingFour2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingFour2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingFour2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingFour2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingFour2">Subcategory</a></li>
                                    <li><a class="nav-link" href="#"
                                            aria-describedby="headingFour2">Subcategory</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <hr>
            <div class="container-xxl footer-terms">
                <div class="d-flex justify-content-around">
                    <ul class="navbar-nav gap-2 flex-row align-self-start">
                        <li class="footer-heading me-md-3">Follow Us</li>
                        <li><a href="#" class="btn btn-icon btn-social btn-twitter btn-inverse"><span
                                    class="visually-hidden">Twitter</span></a></li>
                        <li><a href="#" class="btn btn-icon btn-social btn-facebook btn-inverse"><span
                                    class="visually-hidden">Facebook</span></a></li>
                        <li><a href="#" class="btn btn-icon btn-social btn-instagram btn-inverse"><span
                                    class="visually-hidden">Instagram</span></a></li>
                        <li><a href="#" class="btn btn-icon btn-social btn-youtube btn-inverse"><span
                                    class="visually-hidden">YouTube</span></a></li>
                    </ul>
                    <ul class="navbar-nav gap-md-3">
                        <li class="fw-bold">© Orange 2023</li>
                        <li><a class="nav-link" href="#">Terms and conditions</a></li>
                        <li><a class="nav-link" href="#">Privacy</a></li>
                        <li><a class="nav-link" href="#">Accessibility statement</a></li>
                        <li><a class="nav-link" href="#">Cookie policy</a></li>
                    </ul>
                </div>

            </div>
        </footer>
    </div>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
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
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
                speed: 300,
                infinite: true,
                autoplaySpeed: 5000,
                autoplay: true,
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
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
        });
    </script>
</body>

</html>
