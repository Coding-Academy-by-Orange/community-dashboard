@extends('layouts.app')
@section('main')
    <!-- Section 2: Form -->
    <div class="container my-lg-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-primary mb-4">Book A Workshop Form</h2>
                <form action="{{ route('innovation-hub.book-tour.store') }}" method="POST">
                    @csrf
                    <!-- Row 1 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Full Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="mobile" class="form-label">Mobile No.</label>
                            <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="+962" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label">Your Age</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="Age in number" min="18" max="80" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="background" class="form-label">Your Background</label>
                            <input type="text" class="form-control" id="background" name="background" required>
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="interest" class="form-label">Why would you like to join?</label>
                            <input type="text" class="form-control" id="interest" name="interest" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="disability" class="form-label">Disability?</label>
                            <select id="disability" class="form-select" name="disability">
                                <option value="yes">Yes</option>
                                <option value="what">What?</option>
                                <option value="no" selected>No</option>
                                <option value="na">Prefer not to answer</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 4 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="program" class="form-label">Program</label>
                            <select id="program" class="form-select" name="program">
                                <option value="hackathon">Hackathon</option>
                                <option value="bootcamp">Bootcamp</option>
                                <option value="problemSolving">Problem Solving</option>
                                <option value="idea">Idea Generation</option>
                                <option value="innovatorResidence">Innovator in Residence</option>
                                <option value="bookVenue">Book the Venue only</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="workshopDate" class="form-label">Desired Date of the Workshop</label>
                            <input type="date" class="form-control" id="workshopDate" name="workshopDate" required>
                        </div>
                    </div>

                    <!-- Row 5 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="personna" class="form-label">Who are you?</label>
                            <select id="personna" class="form-select" name="personna">
                                <option value="company">Company</option>
                                <option value="startup">Startup</option>
                                <option value="university">University</option>
                                <option value="individual">Individual</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="entityName" class="form-label">Entity's Name</label>
                            <input type="text" class="form-control" id="entityName" name="entityName" placeholder="Only if you are a company, startup, or university">
                        </div>
                    </div>

                    <!-- Row 6 -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="formFile" class="form-label">Attached Document (optional)</label>
                            <input class="form-control" type="file" id="formFile" name="formFile">
                        </div>
                    </div>

                    <!-- Row 7 -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Further information: Please include any relevant information, tell us more about yourself and your request" required></textarea>
                        </div>
                    </div>

                    <!-- Submit and Reset Buttons -->
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-secondary">Clear</button>
                        </div>
                    </div>
                </form>
                <div class="mt-4">
                    <a href="./landing-page.html" class="btn btn-primary">Back to Main Page</a>
                </div>
            </div>
        </div>
    </div>
@endsection
