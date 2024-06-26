@extends('layouts.app')
@section('title')
    Big By Orange Registration
@endsection
@section('main')
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
                <form class="p-4 p-md-5 rounded-3 contact-form" action="{{ route('BigByOrange.store') }}" method="POST">
                    @csrf
                    <h1>Registration Form</h1>
                    @if (old('step') == 1)
                        <!-- Step 1 form fields -->
                        <input type="hidden" name="step" value="1">

                        <div id="step1" style="display: block">

                            <h4>Data Privacy and Use</h4>
                            <p>What will we do with the data? The data collected from this
                                survey will be used for tracking of your engagement in the program and
                                evaluating the program’s performance. Your answers will be treated
                                confidentially, and what you wrote will not be revealed to others besides the
                                people of the monitoring and evaluation of the program. Your study data will be
                                handled as confidentially as possible, and all procedures are compliant with
                                Jordanian Privacy Laws. If results of this study are published or presented,
                                individual names and other personally identifiable information will not be
                                used.</p>
                            <div class="form-group">
                                <label for="evaluation_purposes" class="is-required">I consent that my data be
                                    used for tracking and evaluation purposes<span class="sr-only">(required)</span></label>
                                <div class="input-group ">

                                    <input style="height:25px; width:25px;" name="evaluation_purposes" value="Yes"
                                        type="radio" class=" email @error('evaluation_purposes') is-invalid @enderror "
                                        id="evaluation_purposes" @if (old('evaluation_purposes') == 'Yes') checked @endif
                                        required>
                                    <p style="margin-top: 3px ; margin-right : 5vw ; padding-left: 8px">Yes</p>

                                    <input style="height:25px; width:25px;" name="evaluation_purposes" value="No"
                                        type="radio" class="email @error('evaluation_purposes') is-invalid @enderror "
                                        id="evaluation_purposes" @if (old('evaluation_purposes') == 'No') checked @endif
                                        required>

                                    <p style="margin-top: 3px; padding-left: 8px">No</p>
                                </div>
                                @if ($errors->has('evaluation_purposes'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('evaluation_purposes') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Step 1 form fields -->
                    @elseif (old('step') == 2)
                        {{-- {{dd($errors)}} --}}
                        <!-- Step 2 form fields -->
                        <input type="hidden" name="step" value="2">

                        {{-- Full Name --}}
                        <div class="form-group">
                            <label for="First" class="is-required pb-1">Full Name<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group  ">
                                <input name="first_name" placeholder="First Name" type="text"
                                    class="form-control mb-2 me-2 email @error('first_name') is-invalid @enderror "
                                    id="first_name" value="{{ old('first_name') }}" required>

                                <input name="father_name" placeholder="Father's Name" type="text"
                                    class="form-control mb-2 me-1 email @error('father_name') is-invalid @enderror "
                                    id="father_name" value="{{ old('father_name') }}" required>

                            </div>
                            <div class="input-group ">
                                <input name="grandfather_name" placeholder="Grandfather's Name" type="text"
                                    class="form-control mb-2 me-2 email @error('grandfather_name') is-invalid @enderror "
                                    id="grandfather_name" value="{{ old('grandfather_name') }}" required>

                                <input name="last_name" placeholder="Last Name" type="text"
                                    class="form-control mb-2 me-1 email @error('last_name') is-invalid @enderror "
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
                        {{-- LinkedIn Profile --}}
                        <div class="form-group">
                            <label for="linkedin_profile" class="is-required pb-1"> LinkedIn Profile<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group ">
                                <input name="linkedin_profile" placeholder="LinkedIn Profile" type="text"
                                    class="form-control email @error('linkedin_profile') is-invalid @enderror "
                                    id="linkedin_profile" value="{{ old('linkedin_profile') }}" required>
                            </div>
                            @if ($errors->has('linkedin_profile'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('linkedin_profile') }}
                                </div>
                            @endif
                        </div>
                        {{-- Nationality --}}

                        <div class="form-group">
                            <label for="nationality" class="is-required pb-1">Nationality<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group ">
                                <select name="nationality"
                                    class="form-control email @error('nationality') is-invalid @enderror "
                                    value="{{ old('nationality') }}" required id="nationality"
                                    onchange="showIdentification()">
                                    <option value="" selected>-- Please Select --</option>
                                    <option value="Jordanian" @if (old('nationality') == 'Jordanian') selected @endif>
                                        Jordanian
                                    </option>
                                    <option value="NoneJordanian" @if (old('nationality') == 'NoneJordanian') selected @endif>
                                        Non-Jordanian
                                    </option>
                                </select>
                            </div>
                            @if ($errors->has('nationality'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('nationality') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group National_ID" style="display:none">
                            <label for="national_id" class="is-required National_ID pb-1" style="display:none">National
                                ID
                                #<span class="sr-only">
                                    (required)</span></label>
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
                            <label for="passport_number" class="is-required Passport_No pb-1"
                                style="display:none">Refugee
                                ID or Passport No.<span class="sr-only">
                                    (required)</span></label>
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

                        {{-- Date of Birth --}}
                        <div class="form-group">

                            <label for="birthdate" class="is-required pb-1">Date of Birth:<span class="sr-only">
                                    (required)</span></label>

                            <div class="input-group ">
                                <input type="date" id="birthdate" name="birthdate" required
                                    class="form-control email @error('birthdate') is-invalid @enderror "
                                    value="{{ old('birthdate') }}">
                            </div>
                            @if ($errors->has('birthdate'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('birthdate') }}
                                </div>
                            @endif
                        </div>

                        {{-- Gender --}}
                        <div class="form-group">
                            <label for="gender" class="is-required pb-1">Gender<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group ">
                                <input style="height:25px; width:25px;" name="gender" value="Male" required
                                    type="radio" class=" email @error('gender') is-invalid @enderror " id="gender"
                                    @if (old('gender') == 'Male') checked @endif>
                                <p style="margin-top: 3px ; margin-right : 5vw ; padding-left: 8px">Male
                                </p>

                                <input style="height:25px; width:25px;" name="gender" value="Female" required
                                    type="radio" class="email @error('gender') is-invalid @enderror " id="gender"
                                    @if (old('gender') == 'Female') checked @endif>
                                <p style="margin-top: 3px; padding-left: 8px">Female</p>
                            </div>
                            @if ($errors->has('gender'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                        </div>
                        {{-- Email address --}}
                        <div class="form-group">
                            <label for="email" class="is-required pb-1">Email Address<span class="sr-only">
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
                        {{-- Phone Number --}}
                        <div class="form-group">
                            <label for="mobile" class="is-required pb-1">Mobile<span class="sr-only">
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
                        {{-- Residence --}}
                        <div class="form-group">
                            <label for="residence" class="is-required pb-1">Residence<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group">
                                <select name="residence"
                                    class="form-control email @error('residence') is-invalid @enderror " id=""
                                    required>
                                    <option value="" selected>-- Please Select --</option>
                                    <option value="Irbid" @if (old('residence') == 'Irbid') selected @endif>
                                        Irbid</option>
                                    <option value="Ajloun" @if (old('residence') == 'Ajloun') selected @endif>
                                        Ajloun</option>
                                    <option value="Jerash" @if (old('residence') == 'Jerash') selected @endif>
                                        Jerash</option>
                                    <option value="Mafraq" @if (old('residence') == 'Mafraq') selected @endif>
                                        Mafraq</option>
                                    <option value="Balqa" @if (old('residence') == 'Balqa') selected @endif>
                                        Balqa</option>
                                    <option value="Amman" @if (old('residence') == 'Amman') selected @endif>
                                        Amman</option>
                                    <option value="Zarqa" @if (old('residence') == 'Zarqa') selected @endif>
                                        Zarqa</option>
                                    <option value="Madaba" @if (old('residence') == 'Madaba') selected @endif>
                                        Madaba</option>
                                    <option value="Karak" @if (old('residence') == 'Karak') selected @endif>
                                        Karak</option>
                                    <option value="Tafilah" @if (old('residence') == 'Tafilah') selected @endif>Tafilah
                                    </option>
                                    <option value="Ma'an" @if (old('residence') == "Ma'an") selected @endif>
                                        Ma'an</option>
                                    <option value="Aqaba" @if (old('residence') == 'Aqaba') selected @endif>
                                        Aqaba</option>
                                </select>
                                @if ($errors->has('residence'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('residence') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Highest Level of Education Attained --}}
                        <div class="form-group" style="margin-top: 3vw">
                            <label for="education" class="is-required pb-1">Education Level<span class="sr-only">
                                    (required)</span></label>
                            <div>
                                <input style="margin-top: 15px" name="education" value="Below Tawjihi" required
                                    type="radio" class=" @error('education') is-invalid @enderror "
                                    @if (old('education') == 'Below Tawjihi') checked @endif>
                                <span style="margin-top: 1vw ; margin-right : 4vw">Below Tawjihi</span>
                                <br>

                                <input style="margin-top: 15px" name="education" value="Tawjihi" required type="radio"
                                    class=" @error('education') is-invalid @enderror "
                                    @if (old('education') == 'Tawjihi') checked @endif>
                                <span style="margin-top: 2vw">Tawjihi/High School Diploma</span>
                                <br>

                                <input style="margin-top: 15px" name="education" value="Diploma" required type="radio"
                                    class=" @error('education') is-invalid @enderror "
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

                                <br class="major_education" style="display:none">

                                <p class="major_education pb-1" style="display:none">What is your major? <span
                                        style="color: red">*</span></p>
                                <input type="text" name='major_study'
                                    class="major_education form-control @error('major_study') is-invalid @enderror "
                                    value="{{ old('education') }}" style="display:none">
                                <br class="major_education" style="display:none">

                                @if ($errors->has('education'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('education') }}
                                    </div>
                                @endif
                            </div>
                            @if ($errors->has('major_education'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('major_education') }}
                                </div>
                            @endif
                        </div>
                        {{-- Employment Status --}}
                        <div class="form-group" style="margin-top: 3vw">
                            <label for="employment" class="is-required pb-1">Employment Status<span class="sr-only">
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
                            <label for="person_with_disability" class="is-required pb-1">Are you a person with
                                disability?
                                *
                                Persons with disabilities include those who have long-term physical, mental,
                                intellectual or sensory impairments which in interaction with various
                                barriers
                                may hinder their full and effective participation in society on an equal
                                basis
                                with others.<span class="sr-only"> (required)</span></label>
                            <div>

                                <input name="person_with_disability" value="Yes" required type="radio"
                                    class=" @error('person_with_disability') is-invalid @enderror "@if (old('person_with_disability') == 'Yes') checked @endif>
                                <span style="margin-top: 1vw ; margin-right : 4vw">Yes</span>
                                <br>

                                <input name="person_with_disability" value="No" required type="radio"
                                    class=" @error('person_with_disability') is-invalid @enderror "
                                    @if (old('person_with_disability') == 'No') checked @endif>
                                <span style="margin-top: 1vw">No</span>
                                <br>

                                <input name="person_with_disability" value="I_do_not_wish_to_answer" required
                                    type="radio" class=" @error('person_with_disability') is-invalid @enderror "
                                    @if (old('person_with_disability') == 'I_do_not_wish_to_answer') checked @endif>
                                <span style="margin-top: 1vw">I do not wish to answer</span>
                                <br>


                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Male_Co_Founders" class="is-required National_ID pb-1">How Many Male
                                Co-Founders do you have?
                                <span class="sr-only"> (required)</span></label>
                            <div class="input-group">
                                <input name="Male_Co_Founders" type="number"
                                    class="form-control email National_ID @error('Male_Co_Founders') is-invalid @enderror "
                                    id="Male_Co_Founders" value="{{ old('Male_Co_Founders') }}">
                            </div>
                            @if ($errors->has('Male_Co_Founders'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('Male_Co_Founders') }}
                                </div>
                            @endif
                            @if (session('Male_Co_Founders'))
                                <div class="alert alert-danger">
                                    {{ session('Male_Co_Founders') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Female_Co_Founders" class="is-required National_ID pb-1">How Many
                                Female
                                Co-Founders do you have?
                                <span class="sr-only"> (required)</span></label>
                            <div class="input-group">
                                <input name="Female_Co_Founders" type="number"
                                    class="form-control email National_ID @error('Female_Co_Founders') is-invalid @enderror "
                                    id="Female_Co_Founders" value="{{ old('Female_Co_Founders') }}">
                            </div>
                            @if ($errors->has('Female_Co_Founders'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('Female_Co_Founders') }}
                                </div>
                            @endif

                        </div>

                        {{-- Your Position in the Startup --}}
                        <div class="form-group">
                            <label for="Position" class="is-required pb-1">Your Position in the Startup <span
                                    class="sr-only"> (required)</span></label>
                            <div>

                                <input name="Position" value="CEO" required type="radio"
                                    class=" @error('Position') is-invalid @enderror "
                                    @if (old('Position') == 'CEO') checked @endif>
                                <span style="margin-top: 1vw ; margin-right : 4vw">CEO</span>
                                <br>

                                <input name="Position" value="CXO" required type="radio"
                                    class=" @error('Position') is-invalid @enderror "
                                    @if (old('Position') == 'CXO') checked @endif>
                                <span style="margin-top: 1vw">CXO (CFO, CMO, COO...etc.)</span>
                                <br>

                                <input name="Position" value="Executive_Level" required type="radio"
                                    class=" @error('Position') is-invalid @enderror "
                                    @if (old('Position') == 'Executive_Level') checked @endif>
                                <span style="margin-top: 1vw">Executive Level, Decision-Making</span>
                                <br>

                            </div>
                            {{-- Please provide the positions held by your co-founders and their LinkedIn profiles --}}
                            <div class="ProvideOfPosition">
                                <label for="linkedin_profile" class="is-required National_ID pb-1">Please
                                    provide
                                    the positions held by your co-founders and their LinkedIn profiles<span
                                        class="sr-only"> (required)</span></label>
                                <div class="input-group">
                                    <input name="ProvideOfPosition" type="text"
                                        class="form-control email National_ID @error('ProvideOfPosition') is-invalid @enderror "
                                        id="ProvideOfPosition" value="{{ old('ProvideOfPosition') }}">
                                </div>
                                @if ($errors->has('ProvideOfPosition'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('ProvideOfPosition') }}
                                    </div>
                                @endif
                                @if (session('ProvideOfPosition'))
                                    <div class="alert alert-danger">
                                        {{ session('ProvideOfPosition') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Step 2 form fields -->
                    @elseif (old('step') == 3)
                        <!-- Step 3 form fields -->
                        <input type="hidden" name="step" value="3">
                        <div class="form-group">
                            <h4>Startup</h4>
                            <p>In this section, please provide accurate information about the startup you
                                are
                                applying with to BIG by Orange</p>

                            {{-- Please confirm the following --}}
                            <div class="form-group">
                                <label for="Startup" class="is-required pb-1"> Please confirm the
                                    following<span class="sr-only"> (required)</span></label>
                                <div style="margin : 1vw">

                                    <input name="Startup[]" value="Startup is based in or operates from Jordan"
                                        type="checkbox" @if (is_array(old('Startup')) && in_array('Startup is based in or operates from Jordan', old('Startup'))) checked @endif>
                                    <span style="margin-top: 1vw">Startup is based in or operates from
                                        Jordan</span>
                                    <br>

                                    <input name="Startup[]" value="Startup has at least 1 Jordanian founder"
                                        type="checkbox" @if (is_array(old('Startup')) && in_array('Startup has at least 1 Jordanian founder', old('Startup'))) checked @endif>
                                    <span style="margin-top: 1vw">Startup has at least 1 Jordanian founder
                                    </span>
                                    <br>

                                    <input onchange="showChossenProgramming()" name="Startup[]"
                                        class="@error('programming') is-invalid @enderror"
                                        @if (is_array(old('Startup')) && in_array('Other exercises', old('Startup'))) checked @endif value="Other exercises"
                                        type="checkbox">
                                    <span style="margin-top: 1vw">Other</span>
                                    <br>

                                </div>
                                @if ($errors->has('Startup'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('Startup') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Startup Name
                                    * --}}
                        <div class="form-group">
                            <label for="Startup_Name" class="is-required pb-1"> Startup Name<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group ">
                                <input name="Startup_Name" placeholder="" type="text"
                                    class="form-control email @error('Startup_Name') is-invalid @enderror "
                                    id="Startup_Name" value="{{ old('Startup_Name') }}" required>
                            </div>
                            @if ($errors->has('Startup_Name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('Startup_Name') }}
                                </div>
                            @endif
                        </div>
                        {{-- Website
                                    * --}}
                        <div class="form-group">
                            <label for="Website" class="is-required pb-1">Website<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group ">
                                <input name="Website" placeholder="" type="text"
                                    class="form-control email @error('Website') is-invalid @enderror " id="Website"
                                    value="{{ old('Website') }}" required>
                            </div>
                            @if ($errors->has('Website'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('Website') }}
                                </div>
                            @endif
                        </div>
                        {{-- Social Media Links
                                    * --}}
                        <div class="form-group">
                            <label for="Social_Media" class="is-required pb-1">Social Media Links<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group ">
                                <input name="Social_Media" placeholder="" type="text"
                                    class="form-control email @error('Social_Media') is-invalid @enderror "
                                    id="Social_Media" value="{{ old('Social_Media') }}" required>
                            </div>
                            @if ($errors->has('Social_Media'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('Social_Media') }}
                                </div>
                            @endif
                        </div>
                        {{-- Please describe the need/problem your startup is trying to satisfy/solve
                                    * --}}
                        <div class="form-group">
                            <label for="problem_your_startup" class="is-required pb-1"> Please Describe the
                                need/problem your startup is trying to satisfy/solve<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group ">
                                <input name="problem_your_startup" placeholder="" type="text"
                                    class="form-control email @error('problem_your_startup') is-invalid @enderror "
                                    id="problem_your_startup" value="{{ old('problem_your_startup') }}" required>
                            </div>
                            @if ($errors->has('problem_your_startup'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('problem_your_startup') }}
                                </div>
                            @endif
                        </div>
                        {{-- Please describe your solution --}}
                        <div class="form-group">
                            <label for="describe_your_solution" class="is-required pb-1">Please Describe
                                your
                                solution<span class="sr-only"> (required)</span></label>
                            <div class="input-group ">
                                <input name="describe_your_solution" placeholder="" type="text"
                                    class="form-control email @error('describe_your_solution') is-invalid @enderror "
                                    id="describe_your_solution" value="{{ old('describe_your_solution') }}" required>
                            </div>
                            @if ($errors->has('describe_your_solution'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('describe_your_solution') }}
                                </div>
                            @endif
                        </div>
                        {{-- Link to MVP Demo --}}
                        <div class="form-group">
                            <h5>Link to MVP Demo
                            </h5>
                            <label for="MVP_Demo" class="is-required pb-1">This could be in the form of a
                                link
                                to your MVP application or platform, or to a video of your hardware MVP
                                in
                                action
                                ASdDad
                                <span class="sr-only"> (required)</span></label>
                            <div class="input-group ">
                                <input name="MVP_Demo" placeholder="" type="text"
                                    class="form-control email @error('MVP_Demo') is-invalid @enderror " id="MVP_Demo"
                                    value="{{ old('MVP_Demo') }}" required>
                            </div>
                            @if ($errors->has('MVP_Demo'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('MVP_Demo') }}
                                </div>
                            @endif
                        </div>

                        {{-- Please confirm the following --}}
                        <div class="form-group">
                            <label for="Startup" class="is-required pb-1">Where is your startup
                                registered?
                                <span class="sr-only"> (required)</span></label>
                            <div style="margin : 1vw">

                                <input @if (is_array(old('startup_registered')) && in_array('Jordan', old('startup_registered'))) checked @endif name="startup_registered[]"
                                    value="Jordan" type="checkbox">
                                <span style="margin-top: 1vw">Jordan</span>
                                <br>

                                <input @if (is_array(old('startup_registered')) && in_array('GCC', old('startup_registered'))) checked @endif name="startup_registered[]"
                                    value="GCC" type="checkbox">
                                <span style="margin-top: 1vw">GCC</span>
                                <br>

                                <input @if (is_array(old('startup_registered')) && in_array('Europe', old('startup_registered'))) checked @endif name="startup_registered[]"
                                    value="Europe" type="checkbox">
                                <span style="margin-top: 1vw">Europe</span>
                                <br>

                                <input @if (is_array(old('startup_registered')) && in_array('BVI', old('startup_registered'))) checked @endif name="startup_registered[]"
                                    value="BVI" type="checkbox">
                                <span style="margin-top: 1vw">BVI</span>
                                <br>

                                <input @if (is_array(old('startup_registered')) && in_array('North America', old('startup_registered'))) checked @endif name="startup_registered[]"
                                    value="North America" type="checkbox">
                                <span style="margin-top: 1vw">North America</span>
                                <br>

                                <input @if (is_array(old('startup_registered')) && in_array('Not Registered', old('startup_registered'))) checked @endif name="startup_registered[]"
                                    value="Not Registered" type="checkbox">
                                <span style="margin-top: 1vw">Not Registered</span>

                            </div>
                            @if ($errors->has('startup_registered'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('startup_registered') }}
                                </div>
                            @endif
                            <br>

                            {{-- What is your startup's registration number?
                                    --}}
                            <div class="form-group">
                                <label for="Website" class="is-required pb-1">What is your startup's
                                    registration number?
                                    <span class="sr-only"> (required)</span></label>
                                <div class="input-group ">
                                    <input name="registration_number" placeholder="" type="text"
                                        class="form-control email @error('registration_number') is-invalid @enderror "
                                        id="registration_number" value="{{ old('registration_number') }}" required>
                                </div>
                                @if ($errors->has('registration_number'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('registration_number') }}
                                    </div>
                                @endif
                            </div>


                            {{-- What industry(ies) does your startup serve? --}}
                            <div class="form-group">
                                <label for="Startup" class="is-required pb-1"> What industry'ies' does
                                    your
                                    startup serve?

                                    <span class="sr-only"> (required)</span></label>
                                <div style="margin : 1vw">

                                    <input @if (is_array(old('startup_serve')) && in_array('E-commerce', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="E-commerce" type="checkbox">
                                    <span style="margin-top: 1vw">E-commerce</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('Cyber Security', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="Cyber Security" type="checkbox">
                                    <span style="margin-top: 1vw">Cyber Security</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('Digital Fabrication', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="Digital Fabrication" type="checkbox">
                                    <span style="margin-top: 1vw">Digital Fabrication</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('AgriTech', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="AgriTech" type="checkbox">
                                    <span style="margin-top: 1vw">AgriTech</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('FintTech', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="FintTech" type="checkbox">
                                    <span style="margin-top: 1vw">FintTech</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('Construction & Manufacturing', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="Construction & Manufacturing" type="checkbox">
                                    <span style="margin-top: 1vw">Construction & Manufacturing</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('Social Media', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="Social Media" type="checkbox">
                                    <span style="margin-top: 1vw">Social Media</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('Travel & Tourism', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="Travel & Tourism" type="checkbox">
                                    <span style="margin-top: 1vw">Travel & Tourism</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('Data, AI & ML', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="Data, AI & ML"type="checkbox">
                                    <span style="margin-top: 1vw">Data, AI & ML</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('Gaming', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="Gaming" type="checkbox">
                                    <span style="margin-top: 1vw">Gaming</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('Entertainment', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="Entertainment" type="checkbox">
                                    <span style="margin-top: 1vw">Entertainment</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('Creative', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="Creative" type="checkbox">
                                    <span style="margin-top: 1vw">Creative (Art, Media & Design)</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('HealthTech', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="HealthTech" type="checkbox">
                                    <span style="margin-top: 1vw">HealthTech</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('SportsTech', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="SportsTech" type="checkbox">
                                    <span style="margin-top: 1vw">SportsTech</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('Blockchain', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="Blockchain" type="checkbox">
                                    <span style="margin-top: 1vw">Blockchain</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('IOT', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="IOT" type="checkbox">
                                    <span style="margin-top: 1vw">IOT</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('Supply Chain & Logistics', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="Supply Chain & Logistics" type="checkbox">
                                    <span style="margin-top: 1vw">Supply Chain & Logistics</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('FoodTech', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="FoodTech" type="checkbox">
                                    <span style="margin-top: 1vw">FoodTech</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('Utility & Energy', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="Utility & Energy" type="checkbox">
                                    <span style="margin-top: 1vw">Utility & Energy</span>
                                    <br>

                                    <input @if (is_array(old('startup_serve')) && in_array('Retail', old('startup_serve'))) checked @endif name="startup_serve[]"
                                        value="Retail" type="checkbox">
                                    <span style="margin-top: 1vw">Retail</span>
                                    <br>


                                    <input @if (is_array(old('startup_serve')) && in_array('Other', old('startup_serve'))) checked @endif
                                        class="@error('programming') is-invalid @enderror " value="Other"
                                        type="checkbox">
                                    <span style="margin-top: 1vw">Other</span>
                                    <br>

                                </div>
                                @if ($errors->has('startup_serve'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('startup_serve') }}
                                    </div>
                                @endif
                            </div>

                            {{-- Funds raised to date
                                    How much money did you raise for your startup from different sources
                                    --}}
                            <div class="form-group">
                                <label for="Website" class="is-required pb-1">Funds raised to date
                                    How much money did you raise for your startup from different sources
                                    <span class="sr-only"> (required)</span></label>
                                <div class="input-group ">
                                    <input name="Funds" placeholder="" type="text" class="form-control"
                                        value="{{ old('Funds') }}" required>
                                </div>
                                @if ($errors->has('Funds'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('Funds') }}
                                    </div>
                                @endif
                            </div>

                            {{-- Sources of your funds --}}
                            <div class="form-group">
                                <label for="source_funds" class="is-required pb-1">Sources of your funds

                                    <span class="sr-only"> (required)</span></label>
                                <div style="margin : 1vw">

                                    <input @if (is_array(old('source_funds')) && in_array('Personal Funds', old('source_funds'))) checked @endif name="source_funds[]"
                                        value="Personal Funds" type="checkbox">
                                    <span style="margin-top: 1vw">Personal Funds
                                    </span>
                                    <br>

                                    <input @if (is_array(old('source_funds')) && in_array('Friends & Family', old('source_funds'))) checked @endif name="source_funds[]"
                                        value="Friends & Family" type="checkbox">
                                    <span style="margin-top: 1vw">Friends & Family</span>
                                    <br>

                                    <input @if (is_array(old('source_funds')) && in_array('Personal Loans', old('source_funds'))) checked @endif name="source_funds[]"
                                        value="Personal Loans" type="checkbox">
                                    <span style="margin-top: 1vw">Personal Loans
                                    </span>
                                    <br>

                                    <input @if (is_array(old('source_funds')) && in_array('Business Loans', old('source_funds'))) checked @endif name="source_funds[]"
                                        value="Business Loans" type="checkbox">
                                    <span style="margin-top: 1vw">Business Loans
                                    </span>
                                    <br>

                                    <input @if (is_array(old('source_funds')) && in_array('Micro Finance Loans', old('source_funds'))) checked @endif name="source_funds[]"
                                        value="Micro Finance Loans" type="checkbox">
                                    <span style="margin-top: 1vw">Micro Finance Loans
                                    </span>
                                    <br>

                                    <input @if (is_array(old('source_funds')) && in_array('Grants', old('source_funds'))) checked @endif name="source_funds[]"
                                        value="Grants" type="checkbox">
                                    <span style="margin-top: 1vw">Grants</span>
                                    <br>

                                    <input @if (is_array(old('source_funds')) && in_array('Angel Investors', old('source_funds'))) checked @endif name="source_funds[]"
                                        value="Angel Investors" type="checkbox">
                                    <span style="margin-top: 1vw">Angel Investors</span>
                                    <br>

                                    <input @if (is_array(old('source_funds')) && in_array('Venture Capital', old('source_funds'))) checked @endif name="source_funds[]"
                                        value="Venture Capital" type="checkbox">
                                    <span style="margin-top: 1vw">Venture Capita</span>
                                    <br>

                                    <input name="source_funds[]" value="None" type="checkbox"
                                        @if (is_array(old('source_funds')) && in_array('None', old('source_funds'))) checked @endif>
                                    <span style="margin-top: 1vw">None
                                    </span>
                                    <br>
                                </div>
                                @if ($errors->has('source_funds'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('source_funds') }}
                                    </div>
                                @endif
                            </div>


                            {{-- Could you please elaborate on the amount of funds raised from each sources?
                                    If None, please write N/A --}}
                            <div class="form-group">
                                <label for="Website" class="is-required pb-1"> Could you please elaborate
                                    on
                                    the amount of funds raised from each sources?
                                    If None, please write N/A
                                    <span class="sr-only"> (required)</span></label>
                                <div class="input-group ">
                                    <input name="amount_of_funds" placeholder="" type="text" class="form-control"
                                        value="{{ old('amount_of_funds') }}" required>
                                </div>
                                @if ($errors->has('amount_of_funds'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('amount_of_funds') }}
                                    </div>
                                @endif
                            </div>
                            {{-- Are you planning to raise new funds over the next year? If yes, please elaborate on what type of funds are you looking for
                                    This includes: Grants, VC Investments, Angel Investments, Venture Debt, Loans, ...etc. --}}
                            <div class="form-group">
                                <label for="Website" class="is-required pb-1">Are you planning to raise
                                    new
                                    funds over the next year? If yes, please elaborate on what type of
                                    funds
                                    are you looking for
                                    This includes: Grants, VC Investments, Angel Investments, Venture
                                    Debt,
                                    Loans, ...etc.
                                    <span class="sr-only"> (required)</span></label>
                                <div class="input-group ">
                                    <input name="new_funds" placeholder="" type="text" class="form-control"
                                        value="{{ old('new_funds') }}" required>

                                </div>
                                @if ($errors->has('new_funds'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('new_funds') }}
                                    </div>
                                @endif
                            </div>
                            {{-- Markets currently served by your startup --}}
                            <div class="form-group">
                                <label for="markets" class="is-required pb-1">Markets currently served by
                                    your startup
                                    <span class="sr-only"> (required)</span></label>

                                <div style="margin : 1vw">
                                    <input name="markets[]" @if (is_array(old('markets')) && in_array('Jordan', old('markets'))) checked @endif
                                        value="Jordan" type="checkbox">
                                    <span style="margin-top: 1vw">Jordan
                                    </span>
                                    <br>

                                    <input name="markets[]" @if (is_array(old('markets')) && in_array('GCC', old('markets'))) checked @endif
                                        value="GCC" type="checkbox">
                                    <span style="margin-top: 1vw">GCC</span>
                                    <br>
                                    <input name="markets[]" @if (is_array(old('markets')) && in_array('North Africa', old('markets'))) checked @endif
                                        value="North Africa" type="checkbox">
                                    <span style="margin-top: 1vw">North Africa</span>
                                    <br>

                                    <input name="markets[]" @if (is_array(old('markets')) && in_array('Africa', old('markets'))) checked @endif
                                        value="Africa" type="checkbox">
                                    <span style="margin-top: 1vw">Africa</span>
                                    <br>
                                    <input name="markets[]" @if (is_array(old('markets')) && in_array('India', old('markets'))) checked @endif
                                        value="India" type="checkbox">
                                    <span style="margin-top: 1vw">India</span>
                                    <br>

                                    <input name="markets[]" @if (is_array(old('markets')) && in_array('Rest of Asia', old('markets'))) checked @endif
                                        value="Rest of Asia" type="checkbox">
                                    <span style="margin-top: 1vw">Rest of Asia</span>
                                    <br>

                                    <input name="markets[]" @if (is_array(old('markets')) && in_array('Europe', old('markets'))) checked @endif
                                        value="Europe" type="checkbox">
                                    <span style="margin-top: 1vw">Europe</span>
                                    <br>
                                    <input name="markets[]" @if (is_array(old('markets')) && in_array('Oceania', old('markets'))) checked @endif
                                        value="Oceania" type="checkbox">
                                    <span style="margin-top: 1vw">Oceania</span>
                                    <br>
                                    <input name="markets[]" @if (is_array(old('markets')) && in_array('South America', old('markets'))) checked @endif
                                        value="South America" type="checkbox">
                                    <span style="margin-top: 1vw">South America</span>
                                    <br>
                                    <input name="markets[]" @if (is_array(old('markets')) && in_array('Central America', old('markets'))) checked @endif
                                        value="Central America" type="checkbox">
                                    <span style="margin-top: 1vw">Central America</span>
                                    <br>

                                    <input name="markets[]" @if (is_array(old('markets')) && in_array('North America', old('markets'))) checked @endif
                                        value="North America"type="checkbox">
                                    <span style="margin-top: 1vw">North America
                                    </span>
                                    <br>
                                    <input class="@error('programming') is-invalid @enderror " value="Other"
                                        type="checkbox" @if (is_array(old('markets')) && in_array('Other exercises', old('markets'))) checked @endif>
                                    <span style="margin-top: 1vw">Other</span>
                                    <br>
                                </div>
                                @if ($errors->has('markets'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('markets') }}
                                    </div>
                                @endif
                            </div>

                            {{-- How much revenue have you generated to date --}}
                            <div class="form-group">
                                <label for="revenue" class="is-required pb-1"> How much revenue have you
                                    generated to date
                                    <span class="sr-only"> (required)</span></label>
                                <div class="input-group ">
                                    <input name="revenue" placeholder="" type="text" class="form-control"
                                        value="{{ old('revenue') }}" required>
                                </div>
                                @if ($errors->has('revenue'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('revenue') }}
                                    </div>
                                @endif
                            </div>
                            {{-- Please describe key milestones and achievements you have achieved to date --}}
                            <div class="form-group">
                                <label for="milestones_and_achievements" class="is-required"> Please
                                    describe key milestones and achievements you have achieved to date
                                    <span class="sr-only"> (required)</span></label>
                                <div class="input-group ">
                                    <input name="milestones_and_achievements" placeholder="" type="text"
                                        class="form-control" value="{{ old('milestones_and_achievements') }}" required>
                                </div>
                                @if ($errors->has('milestones_and_achievements'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('milestones_and_achievements') }}
                                    </div>
                                @endif
                            </div>
                            {{-- _________________________________ end page 3________________________________________ --}}
                        </div>
                        <!-- Step 3 form fields -->
                    @elseif (old('step') == 4)
                        <!-- Step 3 form fields -->
                        <input type="hidden" name="step" value="4">
                        <div class="form-group">
                            {{-- _________________________________ page 4________________________________________ --}}
                            <h4>Alignment</h4>
                            <p>Please be as precise as possible when filling this section</p>


                            {{-- Please describe the effect your product/service have had/could have on the markets you operate in
                                ex: disrupted a certain technology, upgraded the service standard in a certain industry...etc. --}}
                            <div class="form-group">
                                <label for="Website" class="is-required pb-1">Please describe the effect
                                    your
                                    product/service have had/could have on the markets you operate in
                                    ex: disrupted a certain technology, upgraded the service standard in
                                    a
                                    certain industry...etc.
                                    <span class="sr-only"> (required)</span></label>
                                <div class="input-group ">
                                    <input name="describe_the_effect" placeholder="" type="text" class="form-control"
                                        value="{{ old('describe_the_effect') }}" required>

                                </div>
                            </div>
                            {{-- Please describe what business opportunities you anticipate having with Orange Jordan?
                                An example could be:  "signing a VAS agreement to sell Orange customers subscriptions for our mobile game" --}}
                            <div class="form-group">
                                <label for="Website" class="is-required pb-1">Please describe what
                                    business
                                    opportunities you anticipate having with Orange Jordan?
                                    An example could be: "signing a VAS agreement to sell Orange
                                    customers
                                    subscriptions for our mobile game"
                                    <span class="sr-only"> (required)</span></label>
                                <div class="input-group ">
                                    <input name="business_opportunities" placeholder="" type="text"
                                        class="form-control" value="{{ old('business_opportunities') }}" required>

                                </div>
                            </div>
                            {{-- Please specify units and/or departments at Orange Jordan that you wish to do business with  --}}
                            <div class="form-group">
                                <label for="Website" class="is-required pb-1">Please specify units and/or
                                    departments at Orange Jordan that you wish to do business with
                                    <span class="sr-only"> (required)</span></label>
                                <div class="input-group ">
                                    <input name="specify_units" placeholder="" type="text" class="form-control"
                                        value="{{ old('specify_units') }}" required>

                                </div>
                            </div>
                            {{-- What expectations do you have from joining BIG by Orange?
                                --}}
                            <div class="form-group">
                                <label for="Website" class="is-required pb-1">What expectations do you
                                    have
                                    from joining BIG by Orange?

                                    <span class="sr-only"> (required)</span></label>
                                <div class="input-group ">
                                    <input name="expectations" placeholder="" type="text" class="form-control"
                                        value="{{ old('expectations') }}" required>

                                </div>
                            </div>

                            {{-- I consent to receiving regular e-mails from Orange's newsletter --}}
                            <div class="form-group">
                                <label for="consent_to_receiving" class="is-required pb-1">I consent to
                                    receiving regular e-mails from Orange's newsletter</label>
                                <div class="input-group ">
                                    <input style="height:25px; width:25px;" name="consent_to_receiving" value="Yes"
                                        required type="radio" class=" email @error('gender') is-invalid @enderror "
                                        id="consent_to_receiving" @if (old('consent_to_receiving') == 'Yes') checked @endif>
                                    <p style="margin-top: 3px ; margin-right : 5vw ; padding-left: 8px">
                                        Yes
                                    </p>

                                    <input style="height:25px; width:25px;" name="consent_to_receiving" value="No"
                                        required type="radio" class="email @error('gender') is-invalid @enderror "
                                        id="consent_to_receiving" @if (old('consent_to_receiving') == 'No') checked @endif>
                                    <p style="margin-top: 3px; padding-left: 8px">No</p>
                                </div>
                                @if ($errors->has('consent_to_receiving'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('consent_to_receiving') }}
                                    </div>
                                @endif
                            </div>

                            {{-- _________________________________ end page 4________________________________________ --}}
                        </div>
                        <!-- Step 3 form fields -->
                    @else
                        <!-- Step 1 form fields -->
                        <input type="hidden" name="step" value="1">
                        <div>
                            <h4>Data Privacy and Use</h4>
                            <p>What will we do with the data? The data collected from this
                                survey will be used for tracking of your engagement in the program and
                                evaluating the program’s performance. Your answers will be treated
                                confidentially, and what you wrote will not be revealed to others
                                besides
                                the
                                people of the monitoring and evaluation of the program. Your study data
                                will
                                be
                                handled as confidentially as possible, and all procedures are compliant
                                with
                                Jordanian Privacy Laws. If results of this study are published or
                                presented,
                                individual names and other personally identifiable information will not
                                be
                                used.</p>



                            <div class="form-group">
                                <label for="evaluation_purposes" class="is-required">I consent that my data be
                                    used for tracking and evaluation purposes<span
                                        class="sr-only">(required)</span></label>
                                <div class="input-group ">

                                    <input style="height:25px; width:25px;" name="evaluation_purposes" value="Yes"
                                        type="radio"
                                        class=" email @error('evaluation_purposes') is-invalid @enderror "
                                        id="evaluation_purposes" @if (old('evaluation_purposes') == 'Yes') checked @endif
                                        required>
                                    <p style="margin-top: 3px ; margin-right : 5vw ; padding-left: 8px">Yes</p>

                                    <input style="height:25px; width:25px;" name="evaluation_purposes" value="No"
                                        type="radio" class="email @error('evaluation_purposes') is-invalid @enderror "
                                        id="evaluation_purposes" @if (old('evaluation_purposes') == 'No') checked @endif
                                        required>

                                    <p style="margin-top: 3px; padding-left: 8px">No</p>
                                </div>
                                @if ($errors->has('evaluation_purposes'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('evaluation_purposes') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Step 1 form fields -->
                    @endif
                    <div class="form-group">
                        {{-- <button type="button" id="previous-btn" class="previous btn btn-lg btn-info flout-right"  onclick="checkBTN()" disabled>Previous</button> --}}
                        @if (old('step') == 4)
                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        @else
                            <button type="submit" class="btn btn-lg btn-primary">Next</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
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
@endsection
