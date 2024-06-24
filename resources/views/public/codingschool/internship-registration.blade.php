@extends('layouts.app')
@section('main')
    <div class="container my-lg-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Internship Registration - {{$registration->registration_name}}</h1>
                <form action="{{ route('coding-school.register.internship.store', $registration->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="internship_type" class="form-label">Internship Type</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="internship_type" id="fpe" value="FPE" {{ old('internship_type') == 'FPE' ? 'checked' : '' }}>
                            <label class="form-check-label" for="fpe">First Professional Experience (FPE)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="internship_type" id="gp" value="GP" {{ old('internship_type') == 'GP' ? 'checked' : '' }}>
                            <label class="form-check-label" for="gp">Graduation Project (GP)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="internship_type" id="osc" value="OSC" {{ old('internship_type') == 'OSC' ? 'checked' : '' }}>
                            <label class="form-check-label" for="osc">Orange Summer Challenge (OSC)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="internship_type" id="other" value="other" {{ old('internship_type') == 'other' ? 'checked' : '' }}>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                        @if ($errors->has('internship_type'))
                            <div class="text-danger">{{ $errors->first('internship_type') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}">
                        @if ($errors->has('first_name'))
                            <div class="text-danger">{{ $errors->first('first_name') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="father_name" class="form-label">Father Name</label>
                        <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name') }}">
                        @if ($errors->has('father_name'))
                            <div class="text-danger">{{ $errors->first('father_name') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="grandfather_name" class="form-label">Grandfather Name</label>
                        <input type="text" class="form-control" id="grandfather_name" name="grandfather_name" value="{{ old('grandfather_name') }}">
                        @if ($errors->has('grandfather_name'))
                            <div class="text-danger">{{ $errors->first('grandfather_name') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
                        @if ($errors->has('last_name'))
                            <div class="text-danger">{{ $errors->first('last_name') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="mobile" value="{{ old('mobile') }}">
                        @if ($errors->has('mobile'))
                            <div class="text-danger">{{ $errors->first('mobile') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="birthdate" value="{{ old('birthdate') }}">
                        @if ($errors->has('birthdate'))
                            <div class="text-danger">{{ $errors->first('birthdate') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        @if ($errors->has('gender'))
                            <div class="text-danger">{{ $errors->first('gender') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nationality</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nationality" id="jordanian" value="jordanian" {{ old('nationality') == 'jordanian' ? 'checked' : '' }}>
                            <label class="form-check-label" for="jordanian">Jordanian</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nationality" id="nonJordanian" value="nonJordanian" {{ old('nationality') == 'nonJordanian' ? 'checked' : '' }}>
                            <label class="form-check-label" for="nonJordanian">Non-Jordanian</label>
                        </div>
                        @if ($errors->has('nationality'))
                            <div class="text-danger">{{ $errors->first('nationality') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="governorate" class="form-label">Governorate</label>
                        <select id="governorate" class="form-select" name="governorate">
                            <option selected disabled>Choose...</option>
                            <option value="Amman" {{ old('governorate') == 'Amman' ? 'selected' : '' }}>Amman</option>
                            <option value="Zarqa" {{ old('governorate') == 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
                            <option value="Irbid" {{ old('governorate') == 'Irbid' ? 'selected' : '' }}>Irbid</option>
                            <option value="Ajloun" {{ old('governorate') == 'Ajloun' ? 'selected' : '' }}>Ajloun</option>
                            <option value="Jerash" {{ old('governorate') == 'Jerash' ? 'selected' : '' }}>Jerash</option>
                            <option value="Balqa" {{ old('governorate') == 'Balqa' ? 'selected' : '' }}>Balqa</option>
                            <option value="Madaba" {{ old('governorate') == 'Madaba' ? 'selected' : '' }}>Madaba</option>
                            <option value="Mafraq" {{ old('governorate') == 'Mafraq' ? 'selected' : '' }}>Mafraq</option>
                            <option value="Karak" {{ old('governorate') == 'Karak' ? 'selected' : '' }}>Karak</option>
                            <option value="Tafileh" {{ old('governorate') == 'Tafileh' ? 'selected' : '' }}>Tafileh</option>
                            <option value="Maan" {{ old('governorate') == 'Maan' ? 'selected' : '' }}>Maan</option>
                            <option value="Aqaba" {{ old('governorate') == 'Aqaba' ? 'selected' : '' }}>Aqaba</option>
                        </select>
                        @if ($errors->has('governorate'))
                            <div class="text-danger">{{ $errors->first('governorate') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="university" class="form-label">University Name</label>
                        <select id="university" class="form-select" name="university">
                            <option selected disabled>Choose...</option>
                            <option value="Hashemite University (HU)" {{ old('university') == 'Hashemite University (HU)' ? 'selected' : '' }}>Hashemite University (HU)</option>
                            <option value="Princess Sumaya University for Technology (PSUT)" {{ old('university') == 'Princess Sumaya University for Technology (PSUT)' ? 'selected' : '' }}>Princess Sumaya University for Technology (PSUT)</option>
                            <option value="Jordan University of Science & Technology (JUST)" {{ old('university') == 'Jordan University of Science & Technology (JUST)' ? 'selected' : '' }}>Jordan University of Science & Technology (JUST)</option>
                            <option value="HTU" {{ old('university') == 'HTU' ? 'selected' : '' }}>HTU</option>
                            <option value="Middle East University (MEU)" {{ old('university') == 'Middle East University (MEU)' ? 'selected' : '' }}>Middle East University (MEU)</option>
                            <option value="World Islamic Sciences and Education University (WISE)" {{ old('university') == 'World Islamic Sciences and Education University (WISE)' ? 'selected' : '' }}>World Islamic Sciences and Education University (WISE)</option>
                            <option value="Al- Balqa' Applied University (BAU)" {{ old('university') == 'Al- Balqa\' Applied University (BAU)' ? 'selected' : '' }}>Al- Balqa' Applied University (BAU)</option>
                            <option value="Yarmouk University (YU)" {{ old('university') == 'Yarmouk University (YU)' ? 'selected' : '' }}>Yarmouk University (YU)</option>
                            <option value="Al-Hussein Bin Talal University (AHU)" {{ old('university') == 'Al-Hussein Bin Talal University (AHU)' ? 'selected' : '' }}>Al-Hussein Bin Talal University (AHU)</option>
                            <option value="Isra University" {{ old('university') == 'Isra University' ? 'selected' : '' }}>Isra University</option>
                            <option value="Amman Arab University" {{ old('university') == 'Amman Arab University' ? 'selected' : '' }}>Amman Arab University</option>
                            <option value="Al-Zaytoonah University" {{ old('university') == 'Al-Zaytoonah University' ? 'selected' : '' }}>Al-Zaytoonah University</option>
                            <option value="Al Albayt University" {{ old('university') == 'Al Albayt University' ? 'selected' : '' }}>Al Albayt University</option>
                            <option value="Applied Science University (ASU)" {{ old('university') == 'Applied Science University (ASU)' ? 'selected' : '' }}>Applied Science University (ASU)</option>
                            <option value="Taflah Technical University" {{ old('university') == 'Taflah Technical University' ? 'selected' : '' }}>Taflah Technical University</option>
                            <option value="Petra University" {{ old('university') == 'Petra University' ? 'selected' : '' }}>Petra University</option>
                            <option value="Other" {{ old('university') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @if ($errors->has('university'))
                            <div class="text-danger">{{ $errors->first('university') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="major" class="form-label">Major</label>
                        <select id="major" class="form-select" name="major_study">
                            <option selected disabled>Choose...</option>
                            <option value="Computer Science (CS)" {{ old('major') == 'Computer Science (CS)' ? 'selected' : '' }}>Computer Science (CS)</option>
                            <option value="Computer Information Systems (CIS)" {{ old('major') == 'Computer Information Systems (CIS)' ? 'selected' : '' }}>Computer Information Systems (CIS)</option>
                            <option value="Software Engineering (SE)" {{ old('major') == 'Software Engineering (SE)' ? 'selected' : '' }}>Software Engineering (SE)</option>
                            <option value="Computer Engineering" {{ old('major') == 'Computer Engineering' ? 'selected' : '' }}>Computer Engineering</option>
                            <option value="Telecommunications Engineering" {{ old('major') == 'Telecommunications Engineering' ? 'selected' : '' }}>Telecommunications Engineering</option>
                            <option value="Business Information Systems (BIT)" {{ old('major') == 'Business Information Systems (BIT)' ? 'selected' : '' }}>Business Information Systems (BIT)</option>
                            <option value="Artificial Intelligence (AI)" {{ old('major') == 'Artificial Intelligence (AI)' ? 'selected' : '' }}>Artificial Intelligence (AI)</option>
                            <option value="Network Engineering and Security" {{ old('major') == 'Network Engineering and Security' ? 'selected' : '' }}>Network Engineering and Security</option>
                            <option value="Communication Engineering" {{ old('major') == 'Communication Engineering' ? 'selected' : '' }}>Communication Engineering</option>
                            <option value="Other" {{ old('major') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @if ($errors->has('major'))
                            <div class="text-danger">{{ $errors->first('major') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="other_major" class="form-label">Other Major</label>
                        <input type="text" class="form-control" id="other_major" name="other_major" value="{{ old('other_major') }}">
                        @if ($errors->has('other_major'))
                            <div class="text-danger">{{ $errors->first('other_major') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="academic_year" class="form-label">In which academic year?</label>
                        <select id="academic_year" class="form-select" name="academic_year">
                            <option selected disabled>Choose...</option>
                            <option value="1" {{ old('academic_year') == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('academic_year') == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('academic_year') == '3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ old('academic_year') == '4' ? 'selected' : '' }}>4</option>
                            <option value="5" {{ old('academic_year') == '5' ? 'selected' : '' }}>5</option>
                            <option value="fresh_graduate" {{ old('academic_year') == 'fresh_graduate' ? 'selected' : '' }}>Fresh graduate</option>
                            <option value="other" {{ old('academic_year') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @if ($errors->has('academic_year'))
                            <div class="text-danger">{{ $errors->first('academic_year') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Are you in your last semester?</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="last_semester" id="yes_last_semester" value="yes" {{ old('last_semester') == 'yes' ? 'checked' : '' }}>
                            <label class="form-check-label" for="yes_last_semester">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="last_semester" id="no_last_semester" value="no" {{ old('last_semester') == 'no' ? 'checked' : '' }}>
                            <label class="form-check-label" for="no_last_semester">No</label>
                        </div>
                        @if ($errors->has('last_semester'))
                            <div class="text-danger">{{ $errors->first('last_semester') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
