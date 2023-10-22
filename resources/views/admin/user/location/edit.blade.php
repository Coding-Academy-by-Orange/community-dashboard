@extends('layouts.admin')
@section('main')
    <section id="basic-horizontal-layouts" class="container" style="min-height: 60vh">
        <div class="row match-height">
            <div class=" col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Location</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('location.update', $location) }}">
                            @csrf <!-- CSRF Token -->
                            @method('PUT')
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
                                                    {{ $location->governorate == 'Amman' ? 'selected' : '' }}>
                                                    Amman</option>
                                                <option value="Irbid"
                                                    {{ $location->governorate == 'Irbid' ? 'selected' : '' }}>Irbid</option>
                                                <option value="Zarqa"
                                                    {{ $location->governorate == 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
                                                <option value="Mafraq"
                                                    {{ $location->governorate == 'Mafraq' ? 'selected' : '' }}>Mafraq
                                                </option>
                                                <option value="Ajloun"
                                                    {{ $location->governorate == 'Ajloun' ? 'selected' : '' }}>Ajloun
                                                </option>
                                                <option value="Jerash"
                                                    {{ $location->governorate == 'Jerash' ? 'selected' : '' }}>Jerash
                                                </option>
                                                <option value="Madaba"
                                                    {{ $location->governorate == 'Madaba' ? 'selected' : '' }}>Madaba
                                                </option>
                                                <option value="Balqa"
                                                    {{ $location->governorate == 'Balqa' ? 'selected' : '' }}>Balqa</option>
                                                <option value="Karak"
                                                    {{ $location->governorate == 'Karak' ? 'selected' : '' }}>Karak</option>
                                                <option value="Tafileh"
                                                    {{ $location->governorate == 'Tafileh' ? 'selected' : '' }}>Tafileh
                                                </option>
                                                <option value="Maan "
                                                    {{ $location->governorate == 'Maan ' ? 'selected' : '' }}>Maan
                                                </option>
                                                <option value="Aqaba "
                                                    {{ $location->governorate == 'Aqaba ' ? 'selected' : '' }}>Aqaba
                                                </option>
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
                                                value="{{ $location->name }}" required>
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
                        @if (Auth::guard('admin')->user()->is_super == 1)
                            <form method="POST" class="text-center" action="{{ route('location.destroy', $location) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary m-1 ">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
