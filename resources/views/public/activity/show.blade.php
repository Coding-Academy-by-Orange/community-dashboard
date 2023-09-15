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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.2/dist/css/orangeHelvetica.min.css"
            integrity="sha384-6rPwIH6o8roADEALG0VtZOLfj0bDJ8KUOX7N+cjS+7NkwAaBQOZwRPOIiKWJa0aL" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.2/dist/css/orangeIcons.min.css"
            integrity="sha384-XQ+QuxWl/eBTAPcvP8xjhUXg+GB+kArKZpnDyXUz1pLOe6yAfZzxkSygkYxNfKHT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.2/dist/css/boosted.min.css"
            integrity="sha384-gf+Y5XR9AaDz8jxrG8h6a3BYpN7fOpxA97a0i8QHgwnRKNOuahm7ZQfqzxaNW+aJ" crossorigin="anonymous">
        {{-- <link href="{{ asset('assets/css/client.css') }}" rel="stylesheet"> --}}
        <link rel="preconnect" href="https://code.jquery.com" crossorigin="anonymous">
        <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin="anonymous">
        <link rel="shortcut icon"
            href="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Orange_logo.svg/1200px-Orange_logo.svg.png"
            type="image/x-icon">
        {{-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
            crossorigin="anonymous" /> --}}
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
    <nav role="navigation" id="mainNav"
        class="navbar navbar-light bg-white navbar-expand-md pt-2 border-bottom pb-0 mb-2 pt-1"
        aria-label="Main navigation">
        <div class="container-fluid">
            <a href="/">
                <img id="imgw" src="https://boosted.orange.com/docs/5.2/assets/brand/orange-logo.svg"
                    class="d-inline-block align-bottom mr-3" alt="Back to homepage" title="Back to homepage"
                    height="70" loading="lazy" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#orange-navbar-collapse"
                aria-controls="orange-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse justify-content-end collapse" id="orange-navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" style="color: #f16e00 ; border-color : #f16e00"
                            href="/">Home </a></li>
                    <li class="nav-item"><a class="nav-link " href="/codingacademy">Coding Academy</a></li>
                    <li class="nav-item"><a class="nav-link" href="/fablab-registration">Fablab</a></li>
                    <li class="nav-item"><a class="nav-link" href="/ODC">Generic Digital Centers</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('BigByOrange-registration.index') }}">Big By
                            Orange</a></li>
                    <li class="nav-item"><a class="nav-link" href="/help" target="_blank">Help </a></li>
                    <li class="nav-item"><a class="nav-link" href="/terms" target="_blank"> Terms & Conditions</a></li>
                </ul>
                <ul class="navbar-nav">
                    @guest
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link logout-style" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout
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
    <section class="container">
        <div class="row match-height">
            <div class=" col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ $activity->activity_name }}</h4>
                        </div>
                        <div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (is_array($activity->image) && count($activity->image) > 1)
                            <div id="activity{{ $activity->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($activity->image as $index => $imagePath)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $imagePath) }}" class="d-block w-100"
                                                style="height: 350px;" alt="{{ $activity->activity_name }}">
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
                            <div>
                                <img src="{{ asset('storage/' . $imageArray[0]) }}" class="w-100"
                                    style="height: 350px;" alt="{{ $activity->activity_name }}">
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="d-flex justify-content-between">
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
                            @if ($activity->video)
                                <div>
                                    <i class="fa-solid fa-video"></i>
                                    @foreach (explode(',', $activity->video) as $link)
                                        @php
                                            $linkParts = explode(' ', trim($link));
                                            $url = trim($linkParts[0]);
                                            if (filter_var($url, FILTER_VALIDATE_URL)) {
                                                $text = isset($linkParts[1]) ? trim($linkParts[1]) : 'Video'; 
                                            } else {
                                                $text = $link;
                                                $url = '#';
                                            }
                                        @endphp
                                        <a href="{{ $url }}" target="_blank">{{ $text }}</a>
                                    @endforeach
                                </div>
                            @endif
                            <p>{{ $activity->description }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('activity.register', ['activity_id' => $activity->id]) }}">Register for this activity</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
