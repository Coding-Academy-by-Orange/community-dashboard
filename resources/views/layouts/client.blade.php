<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
    content="user registration website - registration process - coding academy by orange ">
    <meta name="keywords"
    content="registration,coding,orange, laravel, learning">
    <meta name="author" content="Marya Alzubi">
    <title>@yield('title')</title>
    <link rel="preload" href="{{asset('assets/boosted/dist/fonts/HelvNeue55_W1G.woff2')}}" as="font"
    type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{asset('assets/boosted/dist/fonts/HelvNeue75_W1G.woff2')}}" as="font"
    type="font/woff2" crossorigin="anonymous">
    <link href="{{asset('assets/boosted/dist/css/orangeHelvetica.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/boosted/dist/css/orangeIcons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/boosted/dist/css/boosted.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/client.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://code.jquery.com" crossorigin="anonymous">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{--    <script src="js/countrypicker.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.0.2/js/countrySelect.min.js" integrity="sha512-agmFjG7H3K/n7ca70w6lzdO0MxUFWYcaDrw5WpwBMjhXxfrchssrKyZrJOSEN7q4vIeTcHUX5A7mM6zjbE2ZAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0LV1RTXDGY"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-0LV1RTXDGY');
  </script>

  @yield('links')
  <style>
    @yield('style')
</style>
</head>

<body>
    <header role="banner">
        <nav role="navigation" id="mainNav" class="navbar navbar-dark bg-dark navbar-expand-md pt-1"
        aria-label="Main navigation">
        <div class="container-fluid">
            <a href="{{route('client.dashboard')}}">
                <img src="{{asset('assets/boosted/dist/img/black.png')}}"
                class="d-inline-block align-bottom mr-3" alt="Back to homepage" title="Back to homepage"
                height="70" loading="lazy" />
            </a>
            {{--            <span class="h1 mb-0 mt-2" ><a class="nav-link" href="https://yo.orange.jo/orange-coding-academy" target="_blank">Orange.jo</a> </span>--}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#orange-navbar-collapse"
            aria-controls="orange-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse justify-content-between collapse" id="orange-navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="https://yo.orange.jo/orange-coding-academy" target="_blank">Coding Academy</a></li>
                <li class="nav-item"><a class="nav-link" href="https://www.orange.jo/en/Pages/default.aspx" target="_blank">Orange Jo</a></li>
                <li class="nav-item"><a class="nav-link" href="https://yo.orange.jo/" target="_blank">Just for Yo</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    {{--                        <button type="button" class="nav-link btn btn-link btn-inverse dropdown-toggle d-flex align-items-center"--}}
                    {{--                                data-toggle="dropdown">--}}
                    {{--                            <span class="icon-international-globe h4 mb-0 mr-1" aria-hidden="true"></span>--}}
                    {{--                            <span>Language</span>--}}
                {{--                        </button>--}}
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="#" lang="fr" hreflang="fr">عربي</a></li>
                    <li><a class="dropdown-item" href="#" aria-current="page">English</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <button type="button" class="nav-link btn btn-link btn-inverse dropdown-toggle d-flex align-items-center"
                data-toggle="dropdown">
                <span class="svg-avatar mr-1" aria-hidden="true"></span>
                <span><span class="text-primary text-capitalize"> {{ Auth::user()->en_first_name }}</span></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" >Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            {{--                            <li><a class="dropdown-item" href="#">View profile</a></li>--}}
        </ul>
    </li>
</ul>
</div>
</div>
</nav>
@yield('page-title')
</header>



@yield('main')
</main>

<footer class="o-footer" role="contentinfo" style="z-index:10 ;">
    <h2 class="sr-only">Site map & informations</h2>
    <div class="o-footer-top">
        <div class="container-md">
            <ul class="nav align-items-center">
                <li class="nav-item mb-3 mb-md-0 pl-md-0 col-12 col-md-auto">Follow us</li>
                <li class="nav-item ml-2"><a class="nav-link btn btn-inverse btn-social btn-facebook" href="https://www.facebook.com/CodingAcademybyOrange" target="_blank"><span class="sr-only">Facebook</span></a></li>
                {{--                <li class="nav-item ml-2"><a class="nav-link btn btn-inverse btn-social btn-mail" href="oca@orange.com" target="_blank"><span class="sr-only">Mail</span></a></li>--}}
                <li class="nav-item ml-2"><a class="nav-link btn btn-inverse btn-social btn-twitter" href="https://twitter.com/orangejo?lang=en" target="_blank"><span class="sr-only">Twitter</span></a></li>
                <li class="nav-item ml-2"><a class="nav-link btn btn-inverse btn-social btn-instagram" href="https://www.instagram.com/orangejo/channel/?hl=en" target="_blank"> <span class="sr-only">Instagram</span></a></li>
                <li class="nav-item ml-2"><a class="nav-link btn btn-inverse btn-social btn-linkedin" href="https://www.linkedin.com/company/orange-jordan/" target="_blank"><span class="sr-only">Linkedin</span></a></li>
                <li class="nav-item ml-2"><a class="nav-link btn btn-inverse btn-social btn-youtube" href="https://www.youtube.com/channel/UCSTBpjukawEv6ZUmH6l-ibw" target="_blank"><span class="sr-only">YouTube</span></a></li>
            </ul>
        </div>
    </div>
    <div class="o-footer-bottom">
        <div class="container-md">
            <ul class="nav flex-column flex-md-row">
                <li class="nav-item mb-2 mt-1 mr-3 my-md-0 align-self-md-center">© Orange <span id="year"></span> </li>
                <li class="nav-item mb-2 mt-1 my-md-0"><a class="nav-link" href="https://orange.elevatus.jobs/"  target="_blank">Jobs</a></li>
                <li class="nav-item mb-2 mt-1 my-md-0"><a class="nav-link" href="https://www.orange.jo/en/myaccount/pages/advertisement.aspx?type="  target="_blank">Advertise</a></li>
                <li class="nav-item mb-2 mt-1 my-md-0"><a class="nav-link" href="/terms"  target="_blank">Terms & Conditions</a></li>
                <li class="nav-item mb-2 mt-1 my-md-0"><a class="nav-link" href="https://www.orange.jo/en/orangemoney/pages/privacy-policy.aspx"  target="_blank">Privacy</a></li>
                {{--                <li class="nav-item mb-2 mt-1 my-md-0"><a class="nav-link" href="#"  target="_blank">Cookies</a></li>--}}
                {{--                <li class="nav-item mb-2 mt-1 my-md-0"><a class="nav-link" href="#"  target="_blank">Access for all</a></li>--}}
                {{--                <li class="nav-item mb-2 mt-1 my-md-0"><a class="nav-link" href="#"  target="_blank">Safety online</a></li>--}}
            </ul>
        </div>
    </div>
</footer>


<script>
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>
<script
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/boosted@4.5.3/dist/js/boosted.bundle.min.js" integrity="sha384-hQFBUEXKv1tPjGNFpCctXthNheXFWEyT+cKHsR5+8VYwGoe2L0SIaDNXDpE1LlTK" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="{{asset('assets/boosted/dist/js/jquery-slim.min.js')}}"><\/script>')</script>
<script src="{{asset('assets/boosted/dist/js/boosted.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/form.js')}}"></script>
{{-- sweet alert cdn and use --}}
{{--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}
{{--<script>--}}
{{--    // create a record--}}
{{--    @if(session('status_store'))--}}
{{--    swal({--}}
    {{--        title: "{{session('status_store')}}",--}}
    {{--        icon: "success",--}}
    {{--        button: "ok",--}}
    {{--    });--}}
{{--    @endif--}}
{{--    // update a record--}}
{{--    @if(session('status_update'))--}}
{{--    swal({--}}
    {{--        title: "{{session('status_update')}}",--}}
    {{--        icon: "success",--}}
    {{--        button: "ok",--}}
    {{--    });--}}
{{--    @endif--}}
{{--    // delete a record--}}
{{--    @if(session('status_destroy'))--}}
{{--    swal({--}}
    {{--        title: "{{session('status_destroy')}}",--}}
    {{--        icon: "error",--}}
    {{--        button: "ok",--}}
    {{--    });--}}
{{--    @endif--}}
{{--</script>--}}
@yield('script')
</body>

</html>
