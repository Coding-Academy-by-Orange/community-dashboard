@extends('layouts.admin')
@section('main')
    <section id="basic-horizontal-layouts" class="container" style="min-height: 60vh">
        <div class="row match-height">
            <div class=" col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create New Location</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('location.store') }}">
                            @csrf <!-- CSRF Token -->
                            <div class="form-body">
                                <div class="row">
                                    <!-- Governorate -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="governorate">Governorate</label>
                                            <select id="governorate" name="governorate"
                                                class="form-control @error('governorate') is-invalid @enderror">
                                                <option value="">Select Governorate</option>
                                                <option value="Amman"
                                                    {{ old('governorate') == 'Amman' ? 'selected' : '' }}>
                                                    Amman</option>
                                                <option value="Irbid"
                                                    {{ old('governorate') == 'Irbid' ? 'selected' : '' }}>Irbid</option>
                                                <option value="Zarqa"
                                                    {{ old('governorate') == 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
                                                <option value="Mafraq"
                                                    {{ old('governorate') == 'Mafraq' ? 'selected' : '' }}>Mafraq</option>
                                                <option value="Ajloun"
                                                    {{ old('governorate') == 'Ajloun' ? 'selected' : '' }}>Ajloun</option>
                                                <option value="Jerash"
                                                    {{ old('governorate') == 'Jerash' ? 'selected' : '' }}>Jerash</option>
                                                <option value="Madaba"
                                                    {{ old('governorate') == 'Madaba' ? 'selected' : '' }}>Madaba</option>
                                                <option value="Balqa"
                                                    {{ old('governorate') == 'Balqa' ? 'selected' : '' }}>Balqa</option>
                                                <option value="Karak"
                                                    {{ old('governorate') == 'Karak' ? 'selected' : '' }}>Karak</option>
                                                <option value="Tafileh"
                                                    {{ old('governorate') == 'Tafileh' ? 'selected' : '' }}>Tafileh
                                                </option>
                                                <option value="Maan "
                                                    {{ old('governorate') == 'Maan ' ? 'selected' : '' }}>Maan </option>
                                                <option value="Aqaba "
                                                    {{ old('governorate') == 'Aqaba ' ? 'selected' : '' }}>Aqaba </option>
                                            </select>
                                            @error('governorate')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Location -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Location</label>
                                            <input type="text" id="name" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" required>
                                            @error('name')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="reset" class="btn btn-secondary me-1">Reset</button>
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
