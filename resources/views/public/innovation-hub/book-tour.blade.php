@extends('layouts.app')
@section('main')
    <!-- Section 2: Form -->
    <div class="container">
        <div class="text-primary container center p-4">
            <h2>Book A TOUR Form</h2>
        </div>
        <div class="container text-center">
            <form action="{{route('innovation-hub.book-tour.store')}}" method="post">
                @csrf
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
                            <label for="business" class="form-label">Your business</label>
                            <input type="text" class="form-control" id="business" required>
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
                            <label for="topic" class="form-label">Topic</label>
                            <select id="topic" class="form-select" aria-label="Default select example">
                                <option value="5g-lab">Visit 5G Lab</option>
                                <option value="discover">Discover innovation hub with all labs</option>
                            </select>
                        </div>
                    </div>

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
                </div>

                <!-- Row 4 -->
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="tourDate" class="form-label">Desired date of the tour</label>
                            <input type="date" class="form-control" id="tourDate" required>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label for="visitorsNumbers" class="form-label">Number of visitors</label>
                            <input type="number" class="form-control" id="visitorsNumbers" min="1" required>
                        </div>
                    </div>
                </div>

                <!-- Row 5 -->
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <input type="textarea" class="form-control" id="message"
                                placeholder="Further information: Please include any relevant information, tell us more about yourself and your request:  (why you need this tech and innovation tour?)   "
                                required>
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

