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
        <div class="container">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-8 mx-auto">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                                onclick="clearFlashSession()"></button>
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                                onclick="clearFlashSession()"></button>
                        </div>
                    @endif
                    <form class="p-4 p-md-5 rounded-3" action="{{ route('activity.register.store') }}"
                        method="POST">
                        @csrf
                        <h1>Registration Form For Activity</h1>
                        <input type="hidden" name="activity_id" value="{{ $activity_id}}">
                        <div class="form-group">
                            <label for="email" class="is-required">Name<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group ">
                                <input style="margin-right : 10px ; margin-bottom : 10px" name="first_name"
                                    placeholder="First Name" type="text"
                                    class="form-control email @error('first_name') is-invalid @enderror "
                                    id="first_name" value="{{ old('first_name') }}" required>

                                <input name="father_name" placeholder="Father's Name" type="text"
                                    class="form-control email @error('father_name') is-invalid @enderror "
                                    id="father_name" value="{{ old('father_name') }}" required>
                            </div>
                            <div class="input-group ">
                                <input style="margin-right : 10px ; margin-bottom : 10px" name="grandfather_name"
                                    placeholder="Grandfather's Name" type="text"
                                    class="form-control email @error('grandfather_name') is-invalid @enderror "
                                    id="grandfather_name" value="{{ old('grandfather_name') }}" required>

                                <input name="last_name" placeholder="Last Name" type="text"
                                    class="form-control email @error('last_name') is-invalid @enderror "
                                    id="last_name" value="{{ old('last_name') }}" required>

                            </div>
                            @if ($errors->has('first_name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                            @if ($errors->has('father_name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('father_name') }}
                                </div>
                            @endif
                            @if ($errors->has('grandfather_name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('grandfather_name') }}
                                </div>
                            @endif
                            @if ($errors->has('last_name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="nationality" class="is-required">Nationality<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group ">
                                <select name="nationality"
                                    class="form-control email @error('nationality') is-invalid @enderror "
                                    value="{{ old('nationality') }}" required id="nationality"
                                    onchange="showIdentification()">
                                    <option value="" selected>-- Please Select --</option>
                                    <option value="Jordanian" @if (old('nationality') == 'Jordanian') selected @endif>
                                        Jordanian</option>
                                    <option value="NoneJordanian" @if (old('nationality') == 'NoneJordanian') selected @endif>
                                        Non-Jordanian</option>
                                </select>
                            </div>
                            @if ($errors->has('nationality'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('nationality') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group National_ID" style="display:none">
                            <label for="national_id" class="is-required National_ID" style="display:none">National ID
                                #<span class="sr-only"> (required)</span></label>
                            <div class="input-group">
                                <input name="national_id" type="text"
                                    class="form-control email National_ID @error('national_id') is-invalid @enderror "
                                    id="national_id" value="{{ old('national_id') }}" style="display:none">
                            </div>
                            @if ($errors->has('national_id'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('national_id') }}
                                </div>
                            @endif
                            @if (session('national_id'))
                                <div class="alert alert-danger">
                                    {{ session('national_id') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group Passport_No" style="display:none">
                            <label for="passport_number" class="is-required Passport_No" style="display:none">Refugee
                                ID or Passport No.<span class="sr-only"> (required)</span></label>
                            <div class="input-group">
                                <input name="passport_number" type="text"
                                    class="form-control email Passport_No @error('passport_number') is-invalid @enderror "
                                    id="passport_number" value="{{ old('passport_number') }}" style="display:none">
                            </div>
                            @if ($errors->has('passport_number'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('passport_number') }}
                                </div>
                            @endif
                            @if (session('passport_number'))
                                <div class="alert alert-danger">
                                    {{ session('passport_number') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="birthday" class="is-required">Birthday<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group ">
                                <input name="birthday" required
                                    type="date"class="form-control email @error('birthday') is-invalid @enderror "
                                    id="birthday"value="{{ old('birthday') }}">
                            </div>
                            @if ($errors->has('birthday'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('birthday') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="gender" class="is-required">Gender<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group ">
                                <input style="height:25px; width:25px;" name="gender" value="Male" required
                                    type="radio" class=" email @error('gender') is-invalid @enderror "
                                    id="gender" @if (old('gender') == 'Male') checked @endif>
                                <p style="margin-top: 3px ; margin-right : 5vw ; padding-left: 8px">Male</p>

                                <input style="height:25px; width:25px;" name="gender" value="Female" required
                                    type="radio" class="email @error('gender') is-invalid @enderror "
                                    id="gender" @if (old('gender') == 'Female') checked @endif>
                                <p style="margin-top: 3px; padding-left: 8px">Female</p>
                            </div>
                            @if ($errors->has('gender'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email" class="is-required">Email address<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group ">
                                <input name="email" type="text"
                                    class="form-control email @error('email') is-invalid @enderror " id="email"
                                    value="{{ old('email') }}" required>
                            </div>

                            @if ($errors->has('email'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            @if (session('email'))
                                <div class="alert alert-danger">
                                    {{ session('email') }}
                                </div>
                            @endif
                            <small>eg: username@domain.com </small>
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="is-required">Mobile<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group ">
                                <input name="mobile" type="text"
                                    class="form-control mobile @error('mobile') is-invalid @enderror " id="mobile"
                                    value="{{ old('mobile') }}" required>
                            </div>
                            @if ($errors->has('mobile'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('mobile') }}
                                </div>
                            @endif
                            @if (session('mobile'))
                                <div class="alert alert-danger">
                                    {{ session('mobile') }}
                                </div>
                            @endif
                            <small>eg: 077********</small>
                        </div>

                        <div class="form-group">
                            <label for="residence" class="is-required">Governorate of residence<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group">
                                <select name="residence"
                                    class="form-control email @error('residence') is-invalid @enderror "
                                    id="" required>
                                    <option value="" selected>-- Please Select --</option>
                                    <option value="Irbid" @if (old('residence') == 'Irbid') selected @endif>Irbid
                                    </option>
                                    <option value="Ajloun" @if (old('residence') == 'Ajloun') selected @endif>Ajloun
                                    </option>
                                    <option value="Jerash" @if (old('residence') == 'Jerash') selected @endif>Jerash
                                    </option>
                                    <option value="Mafraq" @if (old('residence') == 'Mafraq') selected @endif>Mafraq
                                    </option>
                                    <option value="Balqa" @if (old('residence') == 'Balqa') selected @endif>Balqa
                                    </option>
                                    <option value="Amman" @if (old('residence') == 'Amman') selected @endif>Amman
                                    </option>
                                    <option value="Zarqa" @if (old('residence') == 'Zarqa') selected @endif>Zarqa
                                    </option>
                                    <option value="Madaba" @if (old('residence') == 'Madaba') selected @endif>Madaba
                                    </option>
                                    <option value="Karak" @if (old('residence') == 'Karak') selected @endif>Karak
                                    </option>
                                    <option value="Tafilah" @if (old('residence') == 'Tafilah') selected @endif>Tafilah
                                    </option>
                                    <option value="Ma'an" @if (old('residence') == "Ma'an") selected @endif>Ma'an
                                    </option>
                                    <option value="Aqaba" @if (old('residence') == 'Aqaba') selected @endif>Aqaba
                                    </option>
                                </select>
                                @if ($errors->has('residence'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('residence') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 3vw">
                            <label for="education" class="is-required">Education Level Attained<span class="sr-only">
                                    (required)</span></label>
                            <div>

                                <input style="margin-top: 15px" name="education" value="Below Tawjihi" required
                                    type="radio" class=" @error('education') is-invalid @enderror "
                                    @if (old('education') == 'Below Tawjihi') checked @endif>
                                <span style="margin-top: 1vw ; margin-right : 4vw">Below Tawjihi</span>
                                <br>

                                <input style="margin-top: 15px" name="education" value="Tawjihi" required
                                    type="radio" class=" @error('education') is-invalid @enderror "
                                    @if (old('education') == 'Tawjihi') checked @endif>
                                <span style="margin-top: 2vw">Tawjihi/High School Diploma</span>
                                <br>

                                <input style="margin-top: 15px" name="education" value="Diploma" required
                                    type="radio" class=" @error('education') is-invalid @enderror "
                                    @if (old('education') == 'Diploma') checked @endif>
                                <span style="margin-top: 1vw">Diploma</span>
                                <br>

                                <input style="margin-top: 15px" name="education" value="Undergraduate" required
                                    type="radio" class="@error('education') is-invalid @enderror "
                                    @if (old('education') == 'Undergraduate') checked @endif>
                                <span style="margin-top: 1vw">Undergraduate (Baccalaureate)</span>
                                <br>

                                <input style="margin-top: 15px" name="education" value="Graduate" required
                                    type="radio" class="@error('education') is-invalid @enderror "
                                    @if (old('education') == 'Graduate') checked @endif>
                                <span style="margin-top: 1vw">Graduate (Masters and PhD)</span>
                                <br>

                                @if ($errors->has('education'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('education') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 3vw">
                            <label for="employment" class="is-required">Employment Status<span class="sr-only">
                                    (required)</span></label>
                            <div>

                                <input style="margin-top: 15px" name="employment" value="Part-Time" required
                                    type="radio" class=" @error('employment') is-invalid @enderror "
                                    @if (old('employment') == 'Part-Time') checked @endif>
                                <span style="margin-top: 1vw ; margin-right : 4vw">Part-Time</span>
                                <br>

                                <input style="margin-top: 15px" name="employment" value="Full-time" required
                                    type="radio" class=" @error('employment') is-invalid @enderror "
                                    @if (old('employment') == 'Full-time') checked @endif>
                                <span style="margin-top: 1vw">Full-time</span>
                                <br>

                                <input style="margin-top: 15px" name="employment" value="Self-Employed" required
                                    type="radio" class=" @error('employment') is-invalid @enderror "
                                    @if (old('employment') == 'Self-Employed') checked @endif>
                                <span style="margin-top: 1vw">Self-Employed</span>
                                <br>

                                <input style="margin-top: 15px" name="employment" value="Unemployed" required
                                    type="radio" class="@error('employment') is-invalid @enderror "
                                    @if (old('employment') == 'Unemployed') checked @endif>
                                <span style="margin-top: 1vw">Unemployed</span>
                                <br>

                            </div>
                            @if ($errors->has('employment'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('employment') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </section>
    <script>
        if (document.getElementById('nationality').value != "") {
            showIdentification()
        }

        function showIdentification() {

            var input_national_id = document.querySelectorAll('input[name="national_id"]');
            var input_passport_number = document.querySelectorAll('input[name="passport_number"]');

            var National_ID = document.getElementsByClassName('National_ID');
            var Passport_No = document.getElementsByClassName('Passport_No');
            if (document.getElementById('nationality').value == 'Jordanian') {
                for (var i = 0; i < National_ID.length; i++) {
                    National_ID[i].style.display = 'block';
                    Passport_No[i].style.display = 'none';
                    input_national_id.required = true;
                    input_passport_number.required = false;
                }
            } else if (document.getElementById('nationality').value == 'NoneJordanian') {
                for (var i = 0; i < Passport_No.length; i++) {
                    Passport_No[i].style.display = 'block';
                    National_ID[i].style.display = 'none';
                    input_passport_number.required = true;
                    input_national_id.required = false;
                }
            } else {
                for (var i = 0; i < Passport_No.length; i++) {
                    National_ID[i].style.display = 'none';
                    Passport_No[i].style.display = 'none';
                    input_passport_number.required = false;
                    input_national_id.required = false;
                }
            }
        }
    </script>
</body>

</html>
