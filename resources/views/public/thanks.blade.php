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
        <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Orange_logo.svg/1200px-Orange_logo.svg.png" type="image/x-icon">
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


        <nav role="navigation" id="mainNav" class="navbar navbar-light bg-white navbar-expand-md pt-2 border-bottom pb-0 mb-2 pt-1"
                aria-label="Main navigation">
                <div class="container-fluid">
                    <a href="/">
                        <img id="imgw" src="https://boosted.orange.com/docs/5.2/assets/brand/orange-logo.svg"
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
                        <li class="nav-item"><a class="nav-link " href="/codingacademy">Coding Academy</a></li>
                        <li class="nav-item"><a class="nav-link" href="/fablab-registration">Fablab</a></li>
                        <li class="nav-item"><a class="nav-link" href="/ODC">Generic Digital Centers</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('BigByOrange-registration.index')}}">Big By Orange</a>
                        </li>
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

    <img src="https://media.publit.io/file/q_80/chrmpWebsite/thank-you-form.png" style="margin: auto" width="900" height="800" alt="thanks registration">

</body>
</html>
