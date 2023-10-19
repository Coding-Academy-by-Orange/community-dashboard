@extends('layouts.admin')
@section('main')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class=" col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Activity</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('activity.update', $activity) }}" enctype="multipart/form-data">
                            @csrf <!-- CSRF Token -->
                            @method('PUT')
                            <div class="form-body">
                                <!-- Activity Name -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Activity Name</label>
                                            <input type="text" id="name" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name', $activity->activity_name) }}" required>
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

                                <div class="row">
                                    <!-- Start Date -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" id="start_date" name="start_date"
                                                class="form-control @error('start_date') is-invalid @enderror"
                                                value="{{ old('start_date', $activity->start_date) }}" required>
                                            @error('start_date')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- End Date -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>
                                            <input type="date" id="end_date" name="end_date"
                                                class="form-control @error('end_date') is-invalid @enderror"
                                                value="{{ old('end_date', $activity->end_date) }}" required>
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
                                                rows="4" required>{{ old('description', $activity->description) }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- governorate -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="governorate">Governorate</label>
                                            <select name="governorate"class="form-control"
                                            onchange="getLocations(this.value)"
                                            class="form-control @error('location') is-invalid @enderror" required>
                                            <option value="">Residence</option>
                                            <option value="Irbid" {{ $activity->location->governorate === 'Irbid' ? 'selected' : '' }}>Irbid</option>
                                            <option value="Ajloun" {{ $activity->location->governorate === 'Ajloun' ? 'selected' : '' }}>Ajloun</option>
                                            <option value="Jerash" {{ $activity->location->governorate === 'Jerash' ? 'selected' : '' }}>Jerash</option>
                                            <option value="Mafraq" {{ $activity->location->governorate === 'Mafraq' ? 'selected' : '' }}>Mafraq</option>
                                            <option value="Balqa" {{ $activity->location->governorate === 'Balqa' ? 'selected' : '' }}>Balqa</option>
                                            <option value="Amman" {{ $activity->location->governorate === 'Amman' ? 'selected' : '' }}>Amman</option>
                                            <option value="Zarqa" {{ $activity->location->governorate === 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
                                            <option value="Madaba"{{ $activity->location->governorate === 'Madaba' ? 'selected' : '' }}>Madaba</option>
                                            <option value="Karak" {{ $activity->location->governorate === 'Karak' ? 'selected' : '' }}>Karak</option>
                                            <option value="Tafilah" {{ $activity->location->governorate === 'Tafilah' ? 'selected' : '' }}>Tafilah</option>
                                            <option value="Ma'an" {{ $activity->location->governorate === "Ma'an" ? 'selected' : '' }}>Ma'an</option>
                                            <option value="Aqaba" {{ $activity->location->governorate === 'Aqaba' ? 'selected' : '' }}>Aqaba</option>

                                        </select>
                                            @error('location')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="start_date">Publication Date</label>
                                            <input type="date" id="publication_date" name="publication_date"
                                                class="form-control @error('publication_date') is-invalid @enderror"
                                                value="{{ old('publication_date', $activity->publication_date) }}" required>
                                            @error('publication_date')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                  <!-- Location Input  -->
                                  <div class="row" id="location">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <select id="location-dropdown" name="location" class="form-control">
                                                <!-- Options will be populated dynamically -->
                                            </select>
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
                                                value="{{ old('cohort', $activity->cohort) }}">
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
                                                value="{{ old('video', $activity->video) }}">
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
                                                <option value="Private(component)"
                                                    {{ $activity->timeline === 'Private(component)' ? 'selected' : '' }}>Private (component)
                                                </option>
                                                <option value="Public(component)"
                                                    {{ $activity->timeline === 'Public(component)' ? 'selected' : '' }}>Public(component)
                                                </option>

                                                <option value="public csr"
                                                    {{ $activity->timeline === 'public csr' ? 'selected' : '' }}>public csr
                                                </option>
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
     document.addEventListener("DOMContentLoaded", function() {
        var selectedGovernorate = "{{ $activity->location->governorate }}"; // Assuming this is the initial value
        getLocations(selectedGovernorate);
    });
    function getLocations(governorate) {
        var selectedLocationId= {{ $activity->location_id}}
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Set up the AJAX request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $.ajax({
        type: 'POST',
        url: '/admin/getLocation', // Check if this is the correct URL
        data: {
            governorate: governorate
        },
        success: function(data) {
            var locations = data.locations;
            var locationDropdown = $('#location-dropdown');
            locationDropdown.empty();
            locationDropdown.append($('<option>', {
                value: "",
                text: "Select Location"
            }));
            if (locations && locations.length > 0) {
                locations.forEach(function(location) {
                    var option = $('<option></option>').attr('value', location.id).text(location.name);
                    if (location.id === selectedLocationId) {
                        option.attr('selected', 'selected');
                    }
                    locationDropdown.append(option);
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle error if necessary
            console.error(textStatus, errorThrown);
        }
    });
}
</script>
@endsection
