@extends('layouts.app')
@section('main')
    <!-- Section 2: Form -->
    <div class="container my-lg-5">
        <div class="text-primary container center p-4">
            <h2>Book A TOUR Form</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('innovation-hub.book-tour.store') }}" method="post">
                    @csrf
                    <!-- Row 1 -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your Full Name" required>
                        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="example@email.com" required>
                        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile No.</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}" placeholder="+962" required>
                        @error('mobile') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <!-- Row 2 -->
                    <div class="mb-3">
                        <label for="age" class="form-label">Your Age</label>
                        <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}" placeholder="Age in number" min="18" max="80" required>
                        @error('age') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="background" class="form-label">Your Background</label>
                        <input type="text" class="form-control" id="background" name="background" value="{{ old('background') }}" required>
                        @error('background') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="business" class="form-label">Your Business</label>
                        <input type="text" class="form-control" id="business" name="business" value="{{ old('business') }}" required>
                        @error('business') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="disability" class="form-label">Disability?</label>
                        <select id="disability" class="form-select" name="disability" required>
                            <option value="yes" {{ old('disability') == 'yes' ? 'selected' : '' }}>Yes</option>
                            <option value="what" {{ old('disability') == 'what' ? 'selected' : '' }}>What?</option>
                            <option value="no" {{ old('disability') == 'no' ? 'selected' : '' }}>No</option>
                            <option value="na" {{ old('disability') == 'na' ? 'selected' : '' }}>Prefer not to answer</option>
                        </select>
                        @error('disability') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <!-- Row 3 -->
                    <div class="mb-3">
                        <label for="topic" class="form-label">Topic</label>
                        <select id="topic" class="form-select" name="topic" required>
                            <option value="5g-lab" {{ old('topic') == '5g-lab' ? 'selected' : '' }}>Visit 5G Lab</option>
                            <option value="discover" {{ old('topic') == 'discover' ? 'selected' : '' }}>Discover innovation hub with all labs</option>
                        </select>
                        @error('topic') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="personna" class="form-label">Who are you?</label>
                        <select id="personna" class="form-select" name="personna" required>
                            <option value="company" {{ old('personna') == 'company' ? 'selected' : '' }}>Company</option>
                            <option value="startup" {{ old('personna') == 'startup' ? 'selected' : '' }}>Startup</option>
                            <option value="university" {{ old('personna') == 'university' ? 'selected' : '' }}>University</option>
                            <option value="individual" {{ old('personna') == 'individual' ? 'selected' : '' }}>Individual</option>
                        </select>
                        @error('personna') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="entityName" class="form-label">Entity's Name</label>
                        <input type="text" class="form-control" id="entityName" name="entityName" value="{{ old('entityName') }}" placeholder="Only if you are a company, startup, or university">
                        @error('entityName') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <!-- Row 4 -->
                    <div class="mb-3">
                        <label for="tourDate" class="form-label">Desired Date of the Tour</label>
                        <input type="date" class="form-control" id="tourDate" name="tourDate" value="{{ old('tourDate') }}" required>
                        @error('tourDate') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="visitorsNumbers" class="form-label">Number of Visitors</label>
                        <input type="number" class="form-control" id="visitorsNumbers" name="visitorsNumbers" value="{{ old('visitorsNumbers') }}" min="1" required>
                        @error('visitorsNumbers') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <!-- Row 5 -->
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Further information: Please include any relevant information, tell us more about yourself and your request: (why you need this tech and innovation tour?)" required>{{ old('message') }}</textarea>
                        @error('message') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <!-- Buttons -->
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <button type="reset" class="btn btn-secondary mt-2">Clear</button>
                </form>
            </div>
        </div>
    </div>
@endsection
