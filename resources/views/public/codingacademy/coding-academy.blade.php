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
    <link href="{{asset('assets/boosted/dist/css/boosted.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/client.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://code.jquery.com" crossorigin="anonymous">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('assets/js/countries.js')}}"></script>
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
    <div class="d-md-flex flex-md-equal h-100 ">
        <div class="col-lg-4 p-0 auth-slider my-div" >
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block h-100 my-div" src="{{asset('assets/img/1.jpg')}}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img id=""class="d-block h-100 my-div" src="{{asset('assets/img/2.jpg')}}" alt="Second slide">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 px-0">
            <header role="banner">
                <nav role="navigation" id="mainNav" class="navbar navbar-light bg-white navbar-expand-md pt-2 border-bottom pb-0 mb-2 pt-1"
                aria-label="Main navigation">
                <div class="container-fluid">
                    <a href="/">
                        <img id="imgw" src="{{asset('assets/boosted/dist/img/white.png')}}"
                        class="d-inline-block align-bottom mr-3" alt="Back to homepage" title="Back to homepage"
                        height="70" loading="lazy" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#orange-navbar-collapse"
                    aria-controls="orange-navbar-collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse justify-content-end collapse" id="orange-navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/">Home </a></li>
                        <li class="nav-item"><a class="nav-link" href="/help" target="_blank">Help </a></li>
                        <li class="nav-item"><a class="nav-link" href="/terms" target="_blank"> Terms & Conditions</a></li>
                    </ul>
                    <ul class="navbar-nav">
                        @guest

                        @else
                        <li  class="nav-item dropdown">
                            <a class="nav-link logout-style" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" >Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
<section class="wizard-section mt-4">
    <div class="form-wizard">
        <form method="post" class="signup-step1" action="{{route('register.step1')}}">
            @csrf
            <div class="d-flex align-items-center flex-column">
                <div class="form-group col-lg-6 col-md-7">
                    <h1>Create an account</h1>
                </div>
                <div class="mb-4 form-group col-lg-6 col-md-7 ">
                    <label for="email" class="is-required">Email address<span class="sr-only"> (required)</span></label>
                    <div class="input-group ">
                        <input name="email" type="text"
                               class="form-control email @error('email') is-invalid @enderror " id="email"
                               value="{{old('email')}}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <small>eg: username@domain.com </small>
                </div>
                <div class="mb-4 form-group col-lg-6 col-md-7 ">
                    <label for="mobile" class="is-required">Mobile<span class="sr-only"> (required)</span></label>
                    <div class="input-group ">
                        <input name="mobile" type="text"
                               class="form-control mobile @error('mobile') is-invalid @enderror " id="mobile"
                               value="{{old('mobile')}}">
                        @error('mobile')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <small>eg: 077********</small>
                </div>
                <div class="mb-1 form-group col-lg-6 col-md-7" style="position: relative;">
                    <label for="validationServer02" class="is-required">Create Password<span
                            class="sr-only"> (required)</span></label>
                    <div class="input-group ">
                        <input name="password" type="password"
                               class="form-control password col-11 pr-0  @error('password') is-invalid @enderror"
                               id="password"
                               value="{{old('password')}}">
                        <div class="d-flex align-items-center " onclick="showPass()">
                            <i class="fa fa-eye-slash eye btn btn-light border-left-0" aria-hidden="true" ></i>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <small>The Password should be between 6-18 characters. </small>
                    <div class="invalid-feedback password-validation-message font-size-7 mb-3">
                        the password should be at least (8 characters,1 uppercase, 1 number & 1 special character).
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-7 mt-4">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input @error('chAgree') is-invalid @enderror" id="chAgree"
                               name="chAgree" type="checkbox" {{ old('chAgree') == 'on' ? 'checked' : '' }}>
                        <label class="custom-control-label " for="chAgree">I agree to the <a href="/terms" target="_blank">terms &amp;
                                conditions</a> Orange. <span class="mandatory-txt">*</span></label>
                        @error('chAgree')
                        <span class="invalid-feedback" role="alert">
                                    <strong> The Terms & Conditions Not Checked </strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 form-group col-lg-6 col-md-7 ">
                    <div class="form-group custom-control custom-checkbox col-sm-12 ">
                        <input name="is_newsletter" type="checkbox" class="custom-control-input"
                               id="is_newsletter"
                           checked
                        >
                        <label class="custom-control-label" for="is_newsletter">Receive Coding Academy
                            Newsletter. </label>
                    </div>
                </div>
                <div class="mb-4 form-group col-lg-6 col-md-7">
                    <button class="next1 btn btn-primary  btn-lg btn-block" type="submit">Sign Up</button>
            </div>
                <div class="mb-4 form-group col-lg-6 col-md-7">
                    <a href="{{ route('login') }}" style="text-decoration: none"> <input type="button"                                                                                             class="btn btn-secondary  btn-lg btn-block" value="Already have an account?login"/>
                </div>
            </div>
        </form>
    </div>
</section>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    function showPass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                $('.eye').removeClass("fa-eye-slash");
                $('.eye').addClass("fa-eye");
            } else {
                x.type = "password";
                $('.eye').addClass("fa-eye-slash");
                $('.eye').removeClass("fa-eye");
            }
        }

    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
        integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
        data-cf-beacon='{"rayId":"73e396a6a94a775c","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.8.0","si":100}'
        crossorigin="anonymous"></script>
</body>
</html>
