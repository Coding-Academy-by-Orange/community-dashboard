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
                        <a class="nav-link" href="/fablab-registration">Fablab</a>
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


                    <form class="p-4 p-md-5 rounded-3 bg-light" action="{{route('fablab-registration.store')}}" method="POST">
                        @csrf
                        <h1>Registration Form</h1>


                        <div class="form-group">
                            <label for="email" class="is-required">Name<span
                                class="sr-only"> (required)</span></label>
                            <div class="input-group ">
                                <input name="first_name" placeholder="First Name" type="text"
                                class="form-control email @error('first_name') is-invalid @enderror " id="first_name"
                                value="{{old('first_name')}}" required>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                                <input name="father_name" placeholder="Father's Name" type="text"
                                class="form-control email @error('father_name') is-invalid @enderror " id="father_name"
                                value="{{old('father_name')}}" required>
                                @error('father_name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="input-group ">
                                <input name="grandfather_name" placeholder="Grandfather's Name" type="text"
                                class="form-control email @error('grandfather_name') is-invalid @enderror " id="grandfather_name"
                                value="{{old('grandfather_name')}}" required>
                                @error('grandfather_name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                                <input name="last_name" placeholder="Last Name" type="text"
                                class="form-control email @error('last_name') is-invalid @enderror " id="last_name"
                                value="{{old('last_name')}}" required>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="nationality" class="is-required">Nationality<span
                                    class="sr-only"> (required)</span></label>
                            <div class="input-group ">
                                <select name="nationality" class="form-control email @error('nationality') is-invalid @enderror " value="{{old('nationality')}}" required id="nationality" onchange="showIdentification()">
                                    <option value="" selected>-- Please Select --</option>
                                    <option value="Jordanian">Jordanian</option>
                                    <option value="NoneJordanian">Non-Jordanian</option>
                                </select>
                                @error('nationality')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group National_ID" style="display:none">
                            <label for="national_id" class="is-required National_ID" style="display:none">National ID #<span
                                    class="sr-only"> (required)</span></label>
                            <div class="input-group">
                                <input name="national_id" type="text"
                                       class="form-control email National_ID @error('national_id') is-invalid @enderror " id="national_id"
                                       value="{{old('national_id')}}" style="display:none">
                                @error('national_id')
                                <span class="invalid-feedback National_ID" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group Passport_No" style="display:none">
                            <label for="passport_number" class="is-required Passport_No" style="display:none">Refugee ID or Passport No.<span
                                    class="sr-only"> (required)</span></label>
                            <div class="input-group">
                                <input name="passport_number" type="text"
                                       class="form-control email Passport_No @error('passport_number') is-invalid @enderror " id="passport_number"
                                       value="{{old('passport_number')}}" style="display:none">
                                @error('passport_number')
                                <span class="invalid-feedback Passport_No" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="age" class="is-required">Age<span
                                    class="sr-only"> (required)</span></label>
                            <div class="input-group ">
                                <input  name="age" required type="text"
                                       class="form-control email @error('age') is-invalid @enderror " id="age"
                                       value="{{old('age')}}">
                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="is-required">Gender<span
                                    class="sr-only"> (required)</span></label>
                            <div class="input-group ">
                                <input  name="gender" value="Male" required type="radio" class=" email @error('gender') is-invalid @enderror " id="gender" value="{{old('gender')}}">
                                <p style="margin-top: 1vw ; margin-right : 4vw">Male</p>

                                <input  name="gender" value="Female" required type="radio"
                                class="email @error('gender') is-invalid @enderror " id="gender"
                                value="{{old('gender')}}">
                                <p style="margin-top: 1vw">Female</p>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="is-required">Email address<span
                                    class="sr-only"> (required)</span></label>
                            <div class="input-group ">
                                <input name="email" type="text"
                                       class="form-control email @error('email') is-invalid @enderror " id="email"
                                       value="{{old('email')}}" required>
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
                                       value="{{old('mobile')}}" required>
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <small>eg: 077********</small>
                        </div>

                        <div class="form-group">
                            <label for="whatsaap" class="is-required">Whatsapp Number<span class="sr-only"> (required)</span></label>
                            <div class="input-group ">
                                <input name="whatsaap" type="text"
                                       class="form-control mobile @error('whatsaap') is-invalid @enderror " id="whatsaap"
                                       value="{{old('whatsaap')}}" required>
                                @error('whatsaap')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <small>eg: 077********</small>
                        </div>

                        <div class="form-group">
                            <label for="affiliation" class="is-required">Affiliation<span class="sr-only"> (required)</span></label>
                            <div class="input-group ">
                                <input name="affiliation" type="text"
                                       class="form-control mobile @error('affiliation') is-invalid @enderror " id="affiliation"
                                       value="{{old('affiliation')}}" required>
                                @error('affiliation')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="residence" class="is-required">Governorate of residence<span class="sr-only"> (required)</span></label>
                            <div class="input-group">
                                <select name="residence" class="form-control email @error('residence') is-invalid @enderror " id="" required>
                                    <option value="" selected>-- Please Select --</option>
                                    <option value="Irbid">Irbid</option>
                                    <option value="Ajloun">Ajloun</option>
                                    <option value="Jerash">Jerash</option>
                                    <option value="Mafraq">Mafraq</option>
                                    <option value="Balqa">Balqa</option>
                                    <option value="Amman">Amman</option>
                                    <option value="Zarqa">Zarqa</option>
                                    <option value="Madaba">Madaba</option>
                                    <option value="Karak">Karak</option>
                                    <option value="Tafilah">Tafilah</option>
                                    <option value="Ma'an">Ma'an</option>
                                    <option value="Aqaba">Aqaba</option>
                                </select>
                                @error('residence')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="education" class="is-required">Education Level Attained<span
                                class="sr-only"> (required)</span></label>
                            <div>

                                <input  name="education" value="Below Tawjihi" required type="radio" class=" @error('education') is-invalid @enderror " value="{{old('education')}}">
                                <span style="margin-top: 1vw ; margin-right : 4vw">Below Tawjihi</span>
                                <br>

                                <input  name="education" value="Tawjihi" required type="radio"
                                class=" @error('education') is-invalid @enderror "
                                value="{{old('education')}}">
                                <span style="margin-top: 1vw">Tawjihi/High School Diploma</span>
                                <br>

                                <input  name="education" value="Diploma" required type="radio"
                                class=" @error('education') is-invalid @enderror "
                                value="{{old('education')}}">
                                <span style="margin-top: 1vw">Diploma</span>
                                <br>

                                <input  name="education" value="Undergraduate" required type="radio"
                                class="@error('education') is-invalid @enderror "
                                value="{{old('education')}}">
                                <span style="margin-top: 1vw">Undergraduate (Baccalaureate)</span>
                                <br>

                                <input  name="education" value="Graduate" required type="radio"
                                class="@error('education') is-invalid @enderror "
                                value="{{old('education')}}">
                                <span style="margin-top: 1vw">Graduate (Masters and PhD)</span>
                                <br>
                                <br class="major_education" style="display:none">

                                <p class="major_education" style="display:none">What is your major? <span style="color: red">*</span></p>
                                <input type="text" name='major_study' class="major_education form-control @error('major_study') is-invalid @enderror "
                                value="{{old('education')}}" style="display:none">
                                <br class="major_education" style="display:none">

                                @error('education')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="employment" class="is-required">Employment Status<span
                                class="sr-only"> (required)</span></label>
                            <div>

                                <input  name="employment" value="Part-Time" required type="radio" class=" @error('employment') is-invalid @enderror " value="{{old('employment')}}">
                                <span style="margin-top: 1vw ; margin-right : 4vw">Part-Time</span>
                                <br>

                                <input  name="employment" value="Full-time" required type="radio"
                                class=" @error('employment') is-invalid @enderror "
                                value="{{old('employment')}}">
                                <span style="margin-top: 1vw">Full-time</span>
                                <br>

                                <input  name="employment" value="Self-Employed" required type="radio"
                                class=" @error('employment') is-invalid @enderror "
                                value="{{old('employment')}}">
                                <span style="margin-top: 1vw">Self-Employed</span>
                                <br>

                                <input  name="employment" value="Unemployed" required type="radio"
                                class="@error('employment') is-invalid @enderror "
                                value="{{old('employment')}}">
                                <span style="margin-top: 1vw">Unemployed</span>
                                <br>

                                @error('employment')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="program" class="is-required">Choose the program you wish to join<span
                                class="sr-only"> (required)</span></label>
                            <div>
                                <input  name="program" value="Innovators in Residence (IIRs)" required type="radio" class=" @error('program') is-invalid @enderror " value="{{old('program')}}">
                                <span style="margin-top: 1vw ; margin-right : 4vw">Innovators in Residence (IIRs)</span>
                                <br>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="technology_type" class="is-required">What technological lab do you wish to get access to?<span
                                class="sr-only"> (required)</span></label>
                            <div>

                                <input  name="technology_type" value="AI Lab" required type="radio" class=" @error('technology_type') is-invalid @enderror " value="{{old('technology_type')}}">
                                <span style="margin-top: 1vw ; margin-right : 4vw">AI Lab</span>
                                <br>

                                <input  name="technology_type" value="AI Lab" required type="radio"
                                class=" @error('technology_type') is-invalid @enderror "
                                value="{{old('technology_type')}}">
                                <span style="margin-top: 1vw">AI Lab</span>
                                <br>

                                <input  name="technology_type" value="5G Lab" required type="radio"
                                class=" @error('technology_type') is-invalid @enderror "
                                value="{{old('technology_type')}}">
                                <span style="margin-top: 1vw">5G Lab</span>
                                <br>

                                <input  name="technology_type" value="AR/VR Lab" required type="radio"
                                class="@error('technology_type') is-invalid @enderror "
                                value="{{old('technology_type')}}">
                                <span style="margin-top: 1vw">AR/VR Lab</span>
                                <br>

                                <input  name="technology_type" value="Blockchain Lab" required type="radio"
                                class="@error('technology_type') is-invalid @enderror "
                                value="{{old('technology_type')}}">
                                <span style="margin-top: 1vw">Blockchain Lab</span>
                                <br>

                                @error('technology_type')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="idea_description" class="is-required">Please describe your idea in less than 200 words<span class="sr-only"> (required)</span></label>
                            <div class="input-group ">
                                <textarea name="idea_description" type="text"
                                       class="form-control mobile @error('idea_description') is-invalid @enderror " id="idea_description"
                                       value="{{old('idea_description')}}" required></textarea>
                                @error('idea_description')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <h4>Survey Description:</h4>
                        <p>Acceptance in this program grants you 50 HRs access to our labs to develop your idea. You may request longer access in future.
                        As a prerequisite, applicants to this program are expected to have successfully built a proof-of-concept prototype for their work.</p>

                        <h4>Data Protection Policy:</h4>
                        <p>What will we do with the data? The data collected from this survey will be used for tracking of your engagement in the program and evaluating the program’s performance. Your answers will be treated confidentially, and what you wrote will not be revealed to others besides the people of the monitoring and evaluation of the program. Your study data will be handled as confidentially as possible, and all procedures are compliant with Jordanian Privacy Laws. If results of this study are published or presented, individual names and other personally identifiable information will not be used.</p>


                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input @error('chAgree') is-invalid @enderror" id="chAgree"
                                       name="chAgree" type="checkbox" {{ old('chAgree') == 'on' ? 'checked' : '' }} required>
                                <label class="custom-control-label " for="chAgree">Please check the box to continue <span class="mandatory-txt">*</span></label>

                                @error('chAgree')
                                <span class="invalid-feedback" role="alert">
                                            <strong> The Terms & Conditions Not Checked </strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        </div>
                    </form>

                    {{-- <div class="mb-4 form-group col-lg-6 col-md-7">
                        <a href="{{ route('login') }}" style="text-decoration: none"> <input type="button"
                                                                                             class="btn btn-secondary  btn-lg btn-block"
                                                                                             value="Already have an account?login"/>
                    </div> --}}
                </div>

            </div>
        </div>
    </div>


    <script>
        function showIdentification() {

            var input_national_id = document.querySelectorAll('input[name="national_id"]');
            var input_passport_number = document.querySelectorAll('input[name="passport_number"]');

            var National_ID = document.getElementsByClassName('National_ID');
            var Passport_No = document.getElementsByClassName('Passport_No');
            if(document.getElementById('nationality').value == 'Jordanian') {
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


        var educationRadios = document.querySelectorAll('input[name="education"]');
        var majorEducationElements = document.getElementsByClassName('major_education');

        for (var i = 0; i < educationRadios.length; i++) {
            educationRadios[i].addEventListener('change', function() {
            if (this.value === 'Undergraduate' || this.value === 'Graduate') {
                for (var j = 0; j < majorEducationElements.length; j++) {
                majorEducationElements[j].style.display = 'block';
                majorEducationElements[j].setAttribute('required', '');
                }
            } else {
                for (var j = 0; j < majorEducationElements.length; j++) {
                majorEducationElements[j].style.display = 'none';
                majorEducationElements[j].removeAttribute('required');
                }
            }
            });
        }


    </script>
</body>
</html>
