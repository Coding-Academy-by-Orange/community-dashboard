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
    <link rel="stylesheet" href="{{ asset('css/style.landing.css') }}">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
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
                        <li class="nav-item"><a class="nav-link" href="/">Home </a></li>
                        <li class="nav-item"><a class="nav-link" href="/codingacademy">Coding Academy</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('codingschool.index') }}">Coding School</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('fablab.index') }}">Fablab</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('ODC.index') }}">Digital Centers</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('BigByOrange.index') }}">Big By
                                Orange</a></li>
                        <li class="nav-item"><a class="nav-link" href="/help" target="_blank">Help</a></li>
                        <li class="nav-item"><a class="nav-link" href="/terms" target="_blank">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @yield('page-title')
    @yield('main')
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
                                Orange Jordan
                            </button>
                            <span class="d-none d-md-flex">Orange Jordan</span>
                        </h3>
                        <div id="collapseTwo2" class="container-xxl accordion-collapse collapse"
                            aria-labelledby="headingTwo2" data-bs-parent="#accordion2">
                            <ul class="navbar-nav">
                                <li><a class="nav-link" href="#" aria-describedby="headingTwo2">About
                                        Orange</a></li>
                                <li><a class="nav-link" href="#" aria-describedby="headingTwo2">Annual
                                        reports</a></li>
                                <li><a class="nav-link" href="#" aria-describedby="headingTwo2">Sustainability
                                        reports</a></li>
                                <li><a class="nav-link" href="#" aria-describedby="headingTwo2">Compliance &
                                        Fraud</a></li>
                                <li><a class="nav-link" href="#" aria-describedby="headingTwo2">Distributor's
                                        corner</a></li>
                                <li><a class="nav-link" href="#" aria-describedby="headingTwo2">Legal</a></li>
                                <li><a class="nav-link" href="#" aria-describedby="headingTwo2">Privacy
                                        Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-column col-md-4">
                        <h3 class="accordion-header footer-heading" id="headingThree2">
                            <button class="accordion-button collapsed container-xxl px-1 d-md-none" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree2" aria-expanded="true"
                                aria-controls="collapseThree2">
                                Business
                            </button>
                            <span class="d-none d-md-flex">Business</span>
                        </h3>
                        <div id="collapseThree2" class="container-xxl accordion-collapse collapse"
                            aria-labelledby="headingThree2" data-bs-parent="#accordion2">
                            <ul class="navbar-nav">
                                <li><a class="nav-link" href="/codingacademy" aria-describedby="headingThree2">Coding
                                        Academy</a></li>
                                <li><a class="nav-link" href="{{route('codingschool.index')}}" aria-describedby="headingThree2">Coding
                                        School</a></li>
                                <li><a class="nav-link" href="{{ route('fablab.index') }}" aria-describedby="headingThree2">Fablab</a>
                                </li>
                                <li><a class="nav-link" href="{{ route('ODC.index') }}" aria-describedby="headingThree2">Digital
                                        Centers</a></li>
                                <li><a class="nav-link" href="{{ route('BigByOrange.index') }}" aria-describedby="headingThree2">Big By
                                        Orange</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-column col-md-4">
                        <h3 class="accordion-header footer-heading" id="headingFour2">
                            <button class="accordion-button collapsed container-xxl px-1 d-md-none" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFour2" aria-expanded="true"
                                aria-controls="collapseFour2">
                                Corporate
                            </button>
                            <span class="d-none d-md-flex">Corporate</span>
                        </h3>
                        <div id="collapseFour2" class="container-xxl accordion-collapse collapse"
                            aria-labelledby="headingFour2" data-bs-parent="#accordion2">
                            <ul class="navbar-nav">
                                <li><a class="nav-link" href="#"
                                        aria-describedby="headingFour2">About us</a></li>
                                <li><a class="nav-link" href="/help"
                                        aria-describedby="headingFour2">Help</a></li>
                                <li><a class="nav-link" href="/terms"
                                        aria-describedby="headingFour2">Terms & Conditions</a></li>
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
</body>
</html>
