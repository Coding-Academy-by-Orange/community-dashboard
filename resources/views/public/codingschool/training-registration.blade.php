@extends('layouts.app')

@section('title')
    Coding School Training Registration
@endsection

@section('main')
    <div class="container my-5">
        <h2 class="mt-4">Coding School - Training Registration Form</h2>
        <form method="POST" action="{{route('coding-school.register.training.store')}}">
            @csrf
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input name="first_name" type="text" class="form-control" id="firstName" placeholder="Enter first name" value="{{ old('first_name') }}" required>
                @error('first_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fatherName" class="form-label">Father Name</label>
                <input name="father_name" type="text" class="form-control" id="fatherName" placeholder="Enter father name" value="{{ old('father_name') }}" required>
                @error('father_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="grandfatherName" class="form-label">Grandfather Name</label>
                <input name="grandfather_name" type="text" class="form-control" id="grandfatherName" placeholder="Enter grandfather name" value="{{ old('grandfather_name') }}" required>
                @error('grandfather_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="familyName" class="form-label">Family Name</label>
                <input name="last_name" type="text" class="form-control" id="familyName" placeholder="Enter family name" value="{{ old('last_name') }}" required>
                @error('last_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Enter email" value="{{ old('email') }}" required>
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input name="mobile" type="tel" class="form-control" id="phone" placeholder="Enter phone number" value="{{ old('mobile') }}" required>
                @error('mobile')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input name="birthdate" type="date" class="form-control" id="dob" value="{{ old('birthdate') }}" required>
                    @error('birthdate')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gender</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required>
                        <label class="form-check-label"  for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nationality</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nationality" id="jordanian" value="jordanian" {{ old('nationality') == 'jordanian' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="jordanian">Jordanian</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nationality" id="nonJordanian" value="nonJordanian" {{ old('nationality') == 'nonJordanian' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="nonJordanian">Non-Jordanian</label>
                    </div>
                    @error('nationality')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="governorate" class="form-label">Governorate</label>
                    <select id="governorate" class="form-select" name="governorate" required>
                        <option disabled {{ old('governorate') == null ? 'selected' : '' }}>Choose...</option>
                        <option {{ old('governorate') == 'Amman' ? 'selected' : '' }}>Amman</option>
                        <option {{ old('governorate') == 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
                        <option {{ old('governorate') == 'Irbid' ? 'selected' : '' }}>Irbid</option>
                        <option {{ old('governorate') == 'Ajloun' ? 'selected' : '' }}>Ajloun</option>
                        <option {{ old('governorate') == 'Jerash' ? 'selected' : '' }}>Jerash</option>
                        <option {{ old('governorate') == 'Balqa' ? 'selected' : '' }}>Balqa</option>
                        <option {{ old('governorate') == 'Madaba' ? 'selected' : '' }}>Madaba</option>
                        <option {{ old('governorate') == 'Mafraq' ? 'selected' : '' }}>Mafraq</option>
                        <option {{ old('governorate') == 'Karak' ? 'selected' : '' }}>Karak</option>
                        <option {{ old('governorate') == 'Tafileh' ? 'selected' : '' }}>Tafileh</option>
                        <option {{ old('governorate') == 'Maan' ? 'selected' : '' }}>Maan</option>
                        <option {{ old('governorate') == 'Aqaba' ? 'selected' : '' }}>Aqaba</option>
                    </select>
                    @error('governorate')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="university" class="form-label">University Name</label>
                    <select name="university" id="university" class="form-select" required>
                        <option selected disabled>Choose...</option>
                        <option value="Hashemite University (HU)" {{ old('university') == 'Hashemite University (HU)' ? 'selected' : '' }}>Hashemite University (HU)</option>
                        <option value="Princess Sumaya University for Technology (PSUT)" {{ old('university') == 'Princess Sumaya University for Technology (PSUT)' ? 'selected' : '' }}>Princess Sumaya University for Technology (PSUT)</option>
                        <option value="Jordan University of Science & Technology (JUST)" {{ old('university') == 'Jordan University of Science & Technology (JUST)' ? 'selected' : '' }}>Jordan University of Science & Technology (JUST)</option>
                        <option value="HTU" {{ old('university') == 'HTU' ? 'selected' : '' }}>HTU</option>
                        <option value="Middle East University (MEU)" {{ old('university') == 'Middle East University (MEU)' ? 'selected' : '' }}>Middle East University (MEU)</option>
                        <option value="World Islamic Sciences and Education University (WISE)" {{ old('university') == 'World Islamic Sciences and Education University (WISE)' ? 'selected' : '' }}>World Islamic Sciences and Education University (WISE)</option>
                        <option value="Al- Balqa\' Applied University (BAU)" {{ old('university') == 'Al- Balqa\' Applied University (BAU)' ? 'selected' : '' }}>Al- Balqa' Applied University (BAU)</option>
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
                    @error('university')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="major" class="form-label">Major</label>
                    <select name="major_study" id="major" class="form-select" required>
                        <option disabled {{ old('major_study') == null ? 'selected' : '' }}>Choose...</option>
                        <option {{ old('major_study') == 'Computer Science (CS)' ? 'selected' : '' }}>Computer Science (CS)</option>
                        <option {{ old('major_study') == 'Computer Information Systems (CIS)' ? 'selected' : '' }}>Computer Information Systems (CIS)</option>
                        <option {{ old('major_study') == 'Software Engineering (SE)' ? 'selected' : '' }}>Software Engineering (SE)</option>
                        <option {{ old('major_study') == 'Computer Engineering' ? 'selected' : '' }}>Computer Engineering</option>
                        <option {{ old('major_study') == 'Telecommunications Engineering' ? 'selected' : '' }}>Telecommunications Engineering</option>
                        <option {{ old('major_study') == 'Business Information Systems (BIT)' ? 'selected' : '' }}>Business Information Systems (BIT)</option>
                        <option {{ old('major_study') == 'Artificial Intelligence (AI)' ? 'selected' : '' }}>Artificial Intelligence (AI)</option>
                        <option {{ old('major_study') == 'Network Engineering and Security' ? 'selected' : '' }}>Network Engineering and Security</option>
                        <option {{ old('major_study') == 'Communication Engineering' ? 'selected' : '' }}>Communication Engineering</option>
                        <option value="Other" {{ old('major_study') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('major_study')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="other_major" class="form-label">Other Major</label>
                <input type="text" class="form-control" id="other_major" name="other_major" value="{{ old('other_major') }}" placeholder="Enter other major">
            </div>
            <div class="mb-3">
                <label for="academic_year" class="form-label">In which academic year?</label>
                <select id="academic_year" class="form-select" name="academic_year" required>
                    <option disabled {{ old('academic_year') == null ? 'selected' : '' }}>Choose...</option>
                    <option {{ old('academic_year') == '1' ? 'selected' : '' }}>1</option>
                    <option {{ old('academic_year') == '2' ? 'selected' : '' }}>2</option>
                    <option {{ old('academic_year') == '3' ? 'selected' : '' }}>3</option>
                    <option {{ old('academic_year') == '4' ? 'selected' : '' }}>4</option>
                    <option {{ old('academic_year') == '5' ? 'selected' : '' }}>5</option>
                    <option {{ old('academic_year') == 'graduate' ? 'selected' : '' }}>Graduate</option>
                    <option {{ old('academic_year') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('academic_year')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Employment Status</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="employment_status" id="employed" value="employed" {{ old('employment_status') == 'employed' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="employed">Employed</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="employment_status" id="unemployed" value="unemployed" {{ old('employment_status') == 'unemployed' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="unemployed">Unemployed</label>
                </div>
                @error('employment_status')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Programming Languages / Technologies</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="technologies[]" id="web_front" value="Web Development Front-end" {{ in_array('Web Development Front-end', old('technologies', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="web_front">Web Development Front-end</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="technologies[]" id="web_back" value="Web Development Back-end" {{ in_array('Web Development Back-end', old('technologies', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="web_back">Web Development Back-end</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="technologies[]" id="mobile_dev" value="Mobile Development" {{ in_array('Mobile Development', old('languages', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="mobile_dev">Mobile Development</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="technologies[]" id="no_exp" value="No experience" {{ in_array('No experience', old('languages', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="no_exp">No experience</label>
                </div>
                <!-- Add other checkboxes -->
                @error('technologies')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="other_technologies" class="form-label">Other Programming Languages / Technologies</label>
                <textarea class="form-control" id="other_technologies" name="other_technologies" rows="3" placeholder="Specify other languages/technologies">{{ old('other_technologies') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="reason_to_join" class="form-label">Why do you want to join this training?</label>
                <textarea class="form-control" id="reason_to_join" name="reason_to_join" rows="3" placeholder="Enter reason" required>{{ old('reason_to_join') }}</textarea>
                @error('reason_to_join')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Are you fully available for the training period?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="availability" id="available_yes" value="yes" {{ old('availability') == 'yes' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="available_yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="availability" id="available_no" value="no" {{ old('availability') == 'no' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="available_no">No</label>
                </div>
                @error('availability')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Can you afford coming to Orange Digital Village during the training period?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="affordability" id="afford_yes" value="yes" {{ old('affordability') == 'yes' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="afford_yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="affordability" id="afford_no" value="no" {{ old('affordability') == 'no' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="afford_no">No</label>
                </div>
                @error('affordability')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input class="form-check-input" type="checkbox" name="privacy_policy" id="privacy_policy" required>
                <label for="privacy_policy" class="form-check-label">By checking this box, you consent to the collection, use, and sharing of your personal information in accordance with our privacy policy.</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
