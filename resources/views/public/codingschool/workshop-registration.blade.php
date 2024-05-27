@extends('layouts.app')
@section('main')
    <div class="container my-lg-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Workshop Registration</h1>
                <form action="{{ route('coding-school.register.workshop.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="workshop_type" class="form-label">Workshop Type</label>
                        <input type="text" class="form-control" id="workshop_type" name="workshop_type">
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name">
                    </div>
                    <div class="mb-3">
                        <label for="father_name" class="form-label">Father Name</label>
                        <input type="text" class="form-control" id="father_name" name="father_name">
                    </div>
                    <div class="mb-3">
                        <label for="grandfather_name" class="form-label">Grandfather Name</label>
                        <input type="text" class="form-control" id="grandfather_name" name="grandfather_name">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nationality</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nationality" id="jordanian" value="jordanian">
                            <label class="form-check-label" for="jordanian">Jordanian</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nationality" id="nonJordanian" value="nonJordanian">
                            <label class="form-check-label" for="nonJordanian">Non-Jordanian</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="governorate" class="form-label">Governorate</label>
                        <select id="governorate" class="form-select" name="governorate">
                            <option selected disabled>Choose...</option>
                            <option>Amman</option>
                            <option>Zarqa</option>
                            <option>Irbid</option>
                            <option>Ajloun</option>
                            <option>Jerash</option>
                            <option>Balqa</option>
                            <option>Madaba</option>
                            <option>Mafraq</option>
                            <option>Karak</option>
                            <option>Tafileh</option>
                            <option>Maan</option>
                            <option>Aqaba</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="university" class="form-label">University Name</label>
                        <select id="university" class="form-select" name="university">
                            <option selected disabled>Choose...</option>
                            <option>Hashemite University (HU)</option>
                            <option>Princess Sumaya University for Technology (PSUT)</option>
                            <option>Jordan University of Science & Technology (JUST)</option>
                            <option>HTU</option>
                            <option>Middle East University (MEU)</option>
                            <option>World Islamic Sciences and Education University (WISE)</option>
                            <option>Al- Balqa' Applied University (BAU)</option>
                            <option>Yarmouk University (YU)</option>
                            <option>Al-Hussein Bin Talal University (AHU)</option>
                            <option>Isra University</option>
                            <option>Amman Arab University</option>
                            <option>Al-Zaytoonah University</option>
                            <option>Al Albayt University</option>
                            <option>Applied Science University (ASU)</option>
                            <option>Taflah Technical University</option>
                            <option>Petra University</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="major" class="form-label">Major</label>
                        <select id="major" class="form-select" name="major">
                            <option selected disabled>Choose...</option>
                            <option>Computer Science (CS)</option>
                            <option>Computer Information Systems (CIS)</option>
                            <option>Software Engineering (SE)</option>
                            <option>Computer Engineering</option>
                            <option>Telecommunications Engineering</option>
                            <option>Business Information Systems (BIT)</option>
                            <option>Artificial Intelligence (AI)</option>
                            <option>Network Engineering and Security</option>
                            <option>Communication Engineering</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="other_major" class="form-label">Other Major</label>
                        <input type="text" class="form-control" id="other_major" name="other_major">
                    </div>
                    <div class="mb-3">
                        <label for="academic_year" class="form-label">In which academic year?</label>
                        <select id="academic_year" class="form-select" name="academic_year">
                            <option selected disabled>Choose...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="graduate">Graduate</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="reason_to_join" class="form-label">Why do you want to join this workshop?</label>
                        <textarea class="form-control" id="reason_to_join" name="reason_to_join" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Are you fully available for the workshop period?</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="availability" id="available_yes" value="yes">
                            <label class="form-check-label" for="available_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="availability" id="available_no" value="no">
                            <label class="form-check-label" for="available_no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Can you afford coming to Orange Coding School at Orange Digital Village –Al Abdali during the workshop period?</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="affordability" id="afford_yes" value="yes">
                            <label class="form-check-label" for="afford_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="affordability" id="afford_no" value="no">
                            <label class="form-check-label" for="afford_no">No</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
