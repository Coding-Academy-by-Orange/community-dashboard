@extends('layouts.app')
@section('title')
    Fablab Registration
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
                <form class="p-4 p-md-5 rounded-3" action="{{ route('fablab.store') }}" method="POST">
                    @csrf
                    <h1>Registration Form</h1>


                    <div class="form-group">
                        <label for="email" class="is-required">Name<span class="sr-only">
                                (required)</span></label>
                        <div class="input-group ">
                            <input style="margin-right : 10px ; margin-bottom : 10px" name="first_name"
                                placeholder="First Name" type="text"
                                class="form-control email @error('first_name') is-invalid @enderror " id="first_name"
                                value="{{ old('first_name') }}" required>

                            <input name="father_name" placeholder="Father's Name" type="text"
                                class="form-control email @error('father_name') is-invalid @enderror " id="father_name"
                                value="{{ old('father_name') }}" required>

                        </div>

                        <div class="input-group ">
                            <input style="margin-right : 10px ; margin-bottom : 10px" name="grandfather_name"
                                placeholder="Grandfather's Name" type="text"
                                class="form-control email @error('grandfather_name') is-invalid @enderror "
                                id="grandfather_name" value="{{ old('grandfather_name') }}" required>

                            <input name="last_name" placeholder="Last Name" type="text"
                                class="form-control email @error('last_name') is-invalid @enderror " id="last_name"
                                value="{{ old('last_name') }}" required>

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
                                value="{{ old('nationality') }}" required id="nationality" onchange="showIdentification()">
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
                        <label for="birthdate" class="is-required">Birthdate<span class="sr-only">
                                (required)</span></label>
                        <div class="input-group ">
                            <input name="birthdate" required
                                type="date"class="form-control email @error('birthdate') is-invalid @enderror "
                                id="birthdate"value="{{ old('birthdate') }}">
                        </div>
                        @if ($errors->has('birthdate'))
                            <div class="alert alert-danger">
                                {{ $errors->first('birthdate') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="gender" class="is-required">Gender<span class="sr-only">
                                (required)</span></label>
                        <div class="input-group ">
                            <input style="height:25px; width:25px;" name="gender" value="Male" required
                                type="radio" class=" email @error('gender') is-invalid @enderror " id="gender"
                                @if (old('gender') == 'Male') checked @endif>
                            <p style="margin-top: 3px ; margin-right : 5vw ; padding-left: 8px">Male</p>

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
                        <label for="whatsapp" class="is-required">Whatsapp Number<span class="sr-only">
                                (required)</span></label>
                        <div class="input-group ">
                            <input name="whatsapp" type="text"
                                class="form-control mobile @error('whatsapp') is-invalid @enderror " id="whatsapp"
                                value="{{ old('whatsapp') }}" required>
                        </div>
                        @if ($errors->has('whatsapp'))
                            <div class="alert alert-danger">
                                {{ $errors->first('whatsapp') }}
                            </div>
                        @endif
                        @if (session('whatsapp'))
                            <div class="alert alert-danger">
                                {{ session('whatsapp') }}
                            </div>
                        @endif
                        <small>eg: 077********</small>
                    </div>

                    {{-- <div class="form-group">
                            <label for="affiliation" class="is-required">Affiliation<span class="sr-only">
                                    (required)</span></label>
                            <div class="input-group ">
                                <input name="affiliation" type="text"
                                    class="form-control mobile @error('affiliation') is-invalid @enderror "
                                    id="affiliation" value="{{ old('affiliation') }}" required>
                            </div>
                            @if ($errors->has('affiliation'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('affiliation') }}
                                </div>
                            @endif
                        </div> --}}
                    <div class="form-group">
                        <label for="affiliation" class="is-required">Affiliation<span
                                class="sr-only">(required)</span></label>
                        <div class="input-group">
                            <select name="affiliation"
                                class="form-control mobile @error('affiliation') is-invalid @enderror" id="affiliation"
                                required>
                                <option value="" selected disabled>Select an Affiliation</option>
                                <option value="Fablab Amman"
                                    {{ old('affiliation') === 'Fablab Amman' ? 'selected' : '' }}>Fablab Amman
                                </option>
                                <option value="Fablab Irbid"
                                    {{ old('affiliation') === 'Fablab Irbid' ? 'selected' : '' }}>Fablab Irbid
                                </option>
                                <option value="Fablab Karak"
                                    {{ old('affiliation') === 'Fablab Karak' ? 'selected' : '' }}>Fablab Karak
                                </option>
                                <option value="Fablab Aqaba"
                                    {{ old('affiliation') === 'Fablab Aqaba' ? 'selected' : '' }}>Fablab Aqaba
                                </option>
                                <option value="Fablab As salt"
                                    {{ old('affiliation') === 'Fablab As salt' ? 'selected' : '' }}>Fablab As salt
                                </option>
                            </select>
                        </div>
                        @if ($errors->has('affiliation'))
                            <div class="alert alert-danger">
                                {{ $errors->first('affiliation') }}
                            </div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="residence" class="is-required">Governorate of residence<span class="sr-only">
                                (required)</span></label>
                        <div class="input-group">
                            <select name="residence" class="form-control email @error('residence') is-invalid @enderror "
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

                            <input style="margin-top: 15px" name="education" value="Graduate" required type="radio"
                                class="@error('education') is-invalid @enderror "
                                @if (old('education') == 'Graduate') checked @endif>
                            <span style="margin-top: 1vw">Graduate (Masters and PhD)</span>
                            <br>

                            <br class="major_education" style="display:none">

                            <p class="major_education" style="display:none">What is your major? <span
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

                    <div class="form-group" style="margin-top: 3vw">
                        <label for="employment" class="is-required">Employment Status<span class="sr-only">
                                (required)</span></label>
                        <div>

                            <input style="margin-top: 15px" name="employment" value="Part-Time" required type="radio"
                                class=" @error('employment') is-invalid @enderror "
                                @if (old('employment') == 'Part-Time') checked @endif>
                            <span style="margin-top: 1vw ; margin-right : 4vw">Part-Time</span>
                            <br>

                            <input style="margin-top: 15px" name="employment" value="Full-time" required type="radio"
                                class=" @error('employment') is-invalid @enderror "
                                @if (old('employment') == 'Full-time') checked @endif>
                            <span style="margin-top: 1vw">Full-time</span>
                            <br>

                            <input style="margin-top: 15px" name="employment" value="Self-Employed" required
                                type="radio" class=" @error('employment') is-invalid @enderror "
                                @if (old('employment') == 'Self-Employed') checked @endif>
                            <span style="margin-top: 1vw">Self-Employed</span>
                            <br>

                            <input style="margin-top: 15px" name="employment" value="Unemployed" required type="radio"
                                class="@error('employment') is-invalid @enderror "
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

                    <div class="form-group" style="margin-top: 3vw">
                        <label for="program" class="is-required">Choose the program you wish to join<span
                                class="sr-only"> (required)</span></label>
                        <div>
                            <input style="margin-top: 15px" name="program" value="Innovators in Residence (IIRs)"
                                required type="radio" class=" @error('program') is-invalid @enderror "
                                @if (old('program') == 'Innovators in Residence (IIRs)') checked @endif>
                            <span style="margin-top: 1vw ; margin-right : 4vw">Innovators in Residence
                                (IIRs)</span>
                            <br>
                            @if ($errors->has('program'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('program') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- <div class="form-group" style="margin-top: 3vw">
                            <label for="technology_type" class="is-required">What technological lab do you wish to get access to?<span
                                class="sr-only"> (required)</span></label>
                            <div>

                                <input style="margin-top: 15px" name="technology_type" value="AI Lab" required type="radio" class=" @error('technology_type') is-invalid @enderror " @if (old('technology_type') == 'AI Lab') checked @endif>
                                <span style="margin-top: 1vw ; margin-right : 4vw">AI Lab</span>
                                <br>

                                <input style="margin-top: 15px" name="technology_type" value="IoT Lab" required type="radio"
                                class=" @error('technology_type') is-invalid @enderror "
                                @if (old('technology_type') == 'IoT Lab') checked @endif>
                                <span style="margin-top: 1vw">IoT Lab</span>
                                <br>

                                <input style="margin-top: 15px" name="technology_type" value="5G Lab" required type="radio"
                                class=" @error('technology_type') is-invalid @enderror "
                                @if (old('technology_type') == '5G Lab') checked @endif>
                                <span style="margin-top: 1vw">5G Lab</span>
                                <br>

                                <input style="margin-top: 15px" name="technology_type" value="AR/VR Lab" required type="radio"
                                class="@error('technology_type') is-invalid @enderror "
                                @if (old('technology_type') == 'AR/VR Lab') checked @endif>
                                <span style="margin-top: 1vw">AR/VR Lab</span>
                                <br>

                                <input style="margin-top: 15px" name="technology_type" value="Blockchain Lab" required type="radio"
                                class="@error('technology_type') is-invalid @enderror "
                                @if (old('technology_type') == 'Blockchain Lab') checked @endif>
                                <span style="margin-top: 1vw">Blockchain Lab</span>
                                <br>

                                @if ($errors->has('technology_type'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('technology_type') }}
                                    </div>
                                @endif
                            </div>
                        </div> --}}

                    <div class="form-group" style="margin-top: 3vw">
                        <label for="idea_description" class="is-required">Please describe your idea in less than
                            200 words<span class="sr-only"> (required)</span></label>
                        <div class="input-group ">
                            <textarea style="height: 10vw" name="idea_description" type="text"
                                class="form-control mobile @error('idea_description') is-invalid @enderror " id="idea_description" required>{{ old('idea_description') }}</textarea>
                            @if ($errors->has('idea_description'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('idea_description') }}
                                </div>
                            @endif
                        </div>
                    </div>


                    <h4>Survey Description:</h4>
                    <p>Acceptance in this program grants you 50 HRs access to our labs to develop your idea. You may
                        request longer access in future.
                        As a prerequisite, applicants to this program are expected to have successfully built a
                        proof-of-concept prototype for their work.</p>

                    <h4>Data Protection Policy:</h4>
                    <p>What will we do with the data? The data collected from this survey will be used for tracking
                        of your engagement in the program and evaluating the program’s performance. Your answers
                        will be treated confidentially, and what you wrote will not be revealed to others besides
                        the people of the monitoring and evaluation of the program. Your study data will be handled
                        as confidentially as possible, and all procedures are compliant with Jordanian Privacy Laws.
                        If results of this study are published or presented, individual names and other personally
                        identifiable information will not be used.</p>


                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input @error('chAgree') is-invalid @enderror" id="chAgree"
                                name="chAgree" type="checkbox" @if (old('chAgree')) checked @endif
                                required>
                            <label class="custom-control-label " for="chAgree">Please check the box to continue
                                <span class="mandatory-txt">*</span></label>

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
