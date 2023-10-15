@extends('layouts.admin')
@section('main')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class=" col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create New Activity</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('activity.store') }}" enctype="multipart/form-data">
                            @csrf <!-- CSRF Token -->
                            <div class="form-body">
                                <!-- Activity Name -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Activity Name</label>
                                            <input type="text" id="name" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" required>
                                            @error('name')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Activity Type -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="activity_type">Activity Type</label>
                                            <select id="activity_type" name="activity_type"
                                                class="form-control @error('activity_type') is-invalid @enderror">
                                                <option value="">Select Activity Type</option>
                                                <option value="Registration"
                                                    {{ old('activity_type') == 'Registration' ? 'selected' : '' }}>
                                                    Registration</option>
                                                <option value="Event"
                                                    {{ old('activity_type') == 'Event' ? 'selected' : '' }}>Event</option>
                                                <option value="News"
                                                    {{ old('activity_type') == 'News' ? 'selected' : '' }}>News</option>
                                            </select>
                                            @error('activity_type')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Dates (Initially Hidden) --}}
                                <div class="row" id= "datesInput" style="display: none">
                                    <!-- Start Date -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" id="start_date" name="start_date"
                                                class="form-control @error('start_date') is-invalid @enderror"
                                                value="{{ old('start_date') }}">
                                            @error('start_date')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- End Date -->
                                    <div class="col-6" >
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>
                                            <input type="date" id="end_date" name="end_date"
                                                class="form-control @error('end_date') is-invalid @enderror"
                                                value="{{ old('end_date') }}">
                                            @error('end_date')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                                rows="4" required>{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Location Dropdown -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <select id="location-dropdown" name="location"class="form-control">
                                                <option value="Amman">Amman</option>
                                                <option value="Irbid">Irbid</option>
                                                <option value="Zarqa">Zarqa</option>
                                                <option value="Balqaa">Balqaa</option>
                                                <option value="Aqaba">Aqaba</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Publication Date -->
                                    <div class="col-6" >
                                        <div class="form-group">
                                            <label for="start_date">Publication Date</label>
                                            <input type="date" id="publication_date" name="publication_date"
                                                class="form-control @error('publication_date') is-invalid @enderror"
                                                value="{{ old('publication_date') }}" required>
                                            @error('publication_date')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Location Input (Initially Hidden) -->
                                <div class="row" id="other-location" style="display: none;">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="other-location">Other Location</label>
                                            <input type="text" id="location" name="other-location" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <!-- Cohort -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="cohort">Cohort</label>
                                            <input type="text" id="cohort" name="cohort"
                                                class="form-control @error('cohort') is-invalid @enderror"
                                                value="{{ old('cohort') }}">
                                            @error('cohort')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Images -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="images">Images (Multiple)</label>
                                            <input type="file" id="images" name="images[]"
                                                class="form-control @error('images.*') is-invalid @enderror"
                                                accept="image/*" multiple>
                                            @error('images.*')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Video URLs -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="video">Video URLs (Separate with commas if multiple)</label>
                                            <input type="text" id="video" name="video"
                                                class="form-control @error('video') is-invalid @enderror"
                                                value="{{ old('video') }}">
                                            @error('video')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Timeline -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="timeline">Timeline</label>
                                            <select id="timeline" name="timeline"
                                                class="form-control @error('timeline') is-invalid @enderror" required>
                                                <option value="private">Private</option>
                                                <option value="component">Private(component)</option>
                                                <option value="public">Public</option>
                                            </select>
                                            @error('timeline')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="reset" class="btn btn-secondary mr-1">Reset</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var locationDropdown = document.getElementById("location-dropdown");
        var otherLocationInput = document.getElementById("other-location");
    
        locationDropdown.addEventListener("change", function () {
            if (locationDropdown.value === "other") {
                otherLocationInput.style.display = "block";
                otherLocationInput.setAttribute("required", "required");
            } else {
                otherLocationInput.style.display = "none"; 
                otherLocationInput.removeAttribute("required"); 

            }
        });

        var typeDropdown = document.getElementById("activity_type");
        var datesInput = document.getElementById("datesInput");
    
        typeDropdown.addEventListener("change", function () {
            if (typeDropdown.value === "Registration") {
                datesInput.style.display = "flex";
            } else {
                datesInput.style.display = "none"; 
            }
        });
    </script>
@endsection
