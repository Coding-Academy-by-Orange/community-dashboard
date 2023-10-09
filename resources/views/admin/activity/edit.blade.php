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

                                <!-- Location -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" id="location" name="location"
                                                class="form-control @error('location') is-invalid @enderror"
                                                value="{{ old('location', $activity->location) }}" required>
                                            @error('location')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
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
                                                <option value="private"
                                                    {{ $activity->timeline === 'private' ? 'selected' : '' }}>Private
                                                </option>
                                                <option value="public"
                                                    {{ $activity->timeline === 'public' ? 'selected' : '' }}>Public
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
@endsection
