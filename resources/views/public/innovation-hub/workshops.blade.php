@extends('layouts.app')
@section('main')
<!-- Section 2: Form -->
<div class="container">
    <div class="text-primary container center p-4">
        <h2>Book A Workshop Form</h2>
    </div>
    <div class="container text-center">
        <form action="{{route('innovation-hub.book-tour.store')}}">

            <!-- Row 1 -->
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your Full Name"
                               required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@email.com"
                               required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile No.</label>
                        <input type="tel" class="form-control" id="email" placeholder="+962" required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="male" selected>Male</option>
                            <option value="female">female</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Row 2 -->
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="age" class="form-label">Your Age</label>
                        <input type="number" class="form-control" id="age" placeholder="age in number" min="18"
                               max="80" required>
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="background" class="form-label">Your background</label>
                        <input type="textfield" class="form-control" id="background" required>
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="interest" class="form-label">Why you would like to join?</label>
                        <input type="text" class="form-control" id="interest" required>
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="disability" class="form-label">Disability?</label>
                        <select id="disability" class="form-select" aria-label="Default select example">
                            <option value="yes">Yes</option>
                            <option value="what">What?</option>
                            <option value="no" selected>No</option>
                            <option value="na">Prefer not to answer</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Row 3 -->
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="program" class="form-label">Program</label>
                        <select id="program" class="form-select" aria-label="Default select example">
                            <option value="hackathon">Hackathon</option>
                            <option value="bootcamp">Bootcamp</option>
                            <option value="problemSolving">Problem Solving</option>
                            <option value="idea">Idea Generation</option>
                            <option value="innovatorResidence">Innovator in Residence</option>
                            <option value="bookVenue">Book the Venue only</option>
                        </select>
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="workshopDate" class="form-label">Desired date of the Workshop</label>
                        <input id="workshopDate" type="date" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="personna" class="form-label">Who are you?</label>
                        <select id="personna" class="form-select" aria-label="Default select example">
                            <option value="company">Company</option>
                            <option value="startup">Startup</option>
                            <option value="University">University</option>
                            <option value="Individual">Individual</option>
                            <option value="Company Name">Company Name</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="entityName" class="form-label">Enter the entity's name</label>
                        <input type="textfield" class="form-control" id="entityName" required
                               placeholder="Only if you are a company, startup, or University">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Attached Document (optional)</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <input type="textarea" class="form-control" id="message"
                                   placeholder="Further information: Please include any relevant information, tell us more about yourself and your request:  (why you need this tech and innovation tour?)"
                                   required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </div>

                <div class="col">
                    <button type="reset" class="btn btn-secondary mt-2">Clear</button>
                </div>
            </div>
        </form>
        <div class="container"><a href="./landing-page.html"><button class="btn btn-primary mt-2"> Back to Main
                    Page</button></a></div>
        <br>
    </div>
</div>
@endsection
