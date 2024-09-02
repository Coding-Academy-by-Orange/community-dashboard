@extends('layouts.app')
@section('main')
    <div class="container my-lg-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-primary mb-4">Join our Program Form</h2>
                <form action="{{ route('innovation-hub.book-tour.store') }}" method="POST">
                    @csrf
                    <!-- Row 1 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your Full Name" required>
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="example@email.com" required>
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="mobile" class="form-label">Mobile No.</label>
                            <input type="tel" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}" placeholder="+962" required>
                            @error('mobile') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label">Your Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}" placeholder="age in number" min="18" max="80" required>
                            @error('age') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="background" class="form-label">Your Background</label>
                            <input type="text" class="form-control" id="background" name="background" value="{{ old('background') }}" required>
                            @error('background') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="interest" class="form-label">Why you would like to join?</label>
                            <input type="text" class="form-control" id="interest" name="interest" value="{{ old('interest') }}" required>
                            @error('interest') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="disability" class="form-label">Disability?</label>
                            <select id="disability" class="form-select" name="disability">
                                <option value="yes" {{ old('disability') == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="what" {{ old('disability') == 'what' ? 'selected' : '' }}>What?</option>
                                <option value="no" {{ old('disability') == 'no' ? 'selected' : '' }}>No</option>
                                <option value="na" {{ old('disability') == 'na' ? 'selected' : '' }}>Prefer not to answer</option>
                            </select>
                            @error('disability') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Row 4 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="program" class="form-label">Program</label>
                            <select id="program" class="form-select" name="program">
                                <option value="hackathon" {{ old('program') == 'hackathon' ? 'selected' : '' }}>Hackathon</option>
                                <option value="bootcamp" {{ old('program') == 'bootcamp' ? 'selected' : '' }}>Bootcamp</option>
                                <option value="problemSolving" {{ old('program') == 'problemSolving' ? 'selected' : '' }}>Problem Solving</option>
                                <option value="idea" {{ old('program') == 'idea' ? 'selected' : '' }}>Idea Generation</option>
                                <option value="innovatorResidence" {{ old('program') == 'innovatorResidence' ? 'selected' : '' }}>Innovator in Residence</option>
                                <option value="bookVenue" {{ old('program') == 'bookVenue' ? 'selected' : '' }}>Book the Venue only</option>
                            </select>
                            @error('program') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Row 5 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="personna" class="form-label">Who are you?</label>
                            <select id="personna" class="form-select" name="personna">
                                <option value="company" {{ old('personna') == 'company' ? 'selected' : '' }}>Company</option>
                                <option value="startup" {{ old('personna') == 'startup' ? 'selected' : '' }}>Startup</option>
                                <option value="university" {{ old('personna') == 'university' ? 'selected' : '' }}>University</option>
                                <option value="individual" {{ old('personna') == 'individual' ? 'selected' : '' }}>Individual</option>
                            </select>
                            @error('personna') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="entityName" class="form-label">Entity's Name</label>
                            <input type="text" class="form-control" id="entityName" name="entityName" value="{{ old('entityName') }}" placeholder="Only if you are a company, startup, or university">
                            @error('entityName') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Row 6 -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Further information: Please include any relevant information, tell us more about yourself and your request">{{ old('message') }}</textarea>
                            @error('message') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Submit and Reset Buttons -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Clear</button>
                </form>
            </div>
        </div>
    </div>
@endsection
