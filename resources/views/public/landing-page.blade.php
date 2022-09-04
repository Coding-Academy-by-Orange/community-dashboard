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
        <meta name="description"
              content="user registration website - registration process - coding academy by orange ">
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
              integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
              crossorigin="anonymous"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/countries.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.0.2/js/countrySelect.min.js"
                integrity="sha512-agmFjG7H3K/n7ca70w6lzdO0MxUFWYcaDrw5WpwBMjhXxfrchssrKyZrJOSEN7q4vIeTcHUX5A7mM6zjbE2ZAA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="navbar-brand">
            <a class="stretched-link" href="#">
                <img src="https://boosted.orange.com/docs/5.2/assets/brand/orange-logo.svg" width="50" height="50"
                     alt="Boosted" loading="lazy">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="main">
    <div class="container">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-7 text-center text-lg-start text-left">
                <h1 class="display-4 fw-bold lh-1 mb-3">Orange Coding Academy </h1>
                <p class="col-lg-10 fs-4">The first academy of its kind in the Middle East providing youth with world-class free training in
                    programming languages <span>and in-demand skills.</span></p>
            </div>
            <div class="col-5 mx-auto">
                <form method="POST" class="p-4 p-md-5 rounded-3 bg-light" action="{{route('register.step1')}}">
                    @csrf
                    <h1>Create an account</h1>
                    <div class=form-group">
                        <label for="email" class="is-required">Email address<span
                                class="sr-only"> (required)</span></label>
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
                    <div class="form-group">
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
                    <div class="form-group">
                        <label for="password" class="is-required">Create Password<span
                                class="sr-only"> (required)</span></label>
                        <div class="input-group ">
                            <input name="password" type="password"
                                   class="form-control password col-11 pr-0  @error('password') is-invalid @enderror"
                                   id="password"
                                   value="{{old('password')}}">
                            <div class="d-flex align-items-center " onclick="showPass()">
                                <i class="fa fa-eye-slash eye btn btn-light border-left-0" aria-hidden="true"></i>
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
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input @error('chAgree') is-invalid @enderror" id="chAgree"
                                   name="chAgree" type="checkbox" {{ old('chAgree') == 'on' ? 'checked' : '' }}>
                            <label class="custom-control-label " for="chAgree">I agree to the <a href="/terms"
                                                                                                 target="_blank">terms
                                    &amp;
                                    conditions</a> Orange. <span class="mandatory-txt">*</span></label>
                            @error('chAgree')
                            <span class="invalid-feedback" role="alert">
                                        <strong> The Terms & Conditions Not Checked </strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group custom-control custom-checkbox col-sm-12 ">
                            <input name="is_newsletter" type="checkbox" class="custom-control-input"
                                   id="is_newsletter"
                                   checked
                            >
                            <label class="custom-control-label" for="is_newsletter">Receive Coding Academy
                                Newsletter. </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Sign Up</button>
                    </div>
                </form>

                {{--            <!--       <div class="mb-4 form-group col-lg-6 col-md-7">--}}
                {{--                        <a href="{{ route('login.google') }}" class="google btn  btn-lg btn-block">--}}
                {{--                            <i class="align-self-center fab fa-google mr-1"></i>--}}
                {{--                            Create Account with Google--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
                <div class="mb-4 form-group col-lg-6 col-md-7">
                    <a href="{{ route('login') }}" style="text-decoration: none"> <input type="button"
                                                                                         class="btn btn-secondary  btn-lg btn-block"
                                                                                         value="Already have an account?login"/>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
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
