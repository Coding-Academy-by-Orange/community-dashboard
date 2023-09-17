@extends('layouts.admin')
@section('main')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class=" col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Registration Form For Activity</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.activity.register.store') }}" method="POST">
                            @csrf
                            {{-- hidden fields --}}
                            <input type="hidden" name="activity_id" value="{{ $activity_id }}">
                            <input type="hidden" name="admin_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                            <input type="hidden" name="first_name" value="{{ auth()->user()->fname }}">
                            <input type="hidden" name="last_name" value="{{ auth()->user()->lname }}">
                            <input type="hidden" name="component" value="{{ auth()->user()->component }}">
                            
                            

                            <div class="form-group">
                                <label for="birthdate" class="is-required">Birthdate<span class="sr-only">
                                        (required)</span></label>
                                <div class="input-group ">
                                    <input name="birthdate" required
                                        type="date"class="form-control email @error('birthdate') is-invalid @enderror "
                                        id="birthdate"value="{{ old('birthdate') }}">
                                </div>
                                @if ($errors->has('birthdate'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('birthdate') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="gender" class="is-required">Gender<span class="sr-only">
                                        (required)</span></label>
                                <div class="input-group ">
                                    <input style="height:25px; width:25px;" name="gender" value="Male" required
                                        type="radio" class=" email @error('gender') is-invalid @enderror " id="gender"
                                        @if (old('gender') == 'Male') checked @endif>
                                    <p style="margin-top: 3px ; margin-right : 5vw ; padding-left: 8px">Male</p>

                                    <input style="height:25px; width:25px;" name="gender" value="Female" required
                                        type="radio" class="email @error('gender') is-invalid @enderror " id="gender"
                                        @if (old('gender') == 'Female') checked @endif>
                                    <p style="margin-top: 3px; padding-left: 8px">Female</p>
                                </div>
                                @if ($errors->has('gender'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('gender') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="mobile" class="is-required">Mobile<span class="sr-only">
                                        (required)</span></label>
                                <div class="input-group ">
                                    <input name="mobile" type="text"
                                        class="form-control mobile @error('mobile') is-invalid @enderror " id="mobile"
                                        value="{{ old('mobile') }}" required>
                                </div>
                                @if ($errors->has('mobile'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('mobile') }}
                                    </div>
                                @endif
                                @if (session('mobile'))
                                    <div class="alert alert-danger">
                                        {{ session('mobile') }}
                                    </div>
                                @endif
                                <small>eg: 077********</small>
                            </div>

                            <div class="form-group">
                                <label for="residence" class="is-required">Governorate of residence<span class="sr-only">
                                        (required)</span></label>
                                <div class="input-group">
                                    <select name="residence"
                                        class="form-control email @error('residence') is-invalid @enderror " id=""
                                        required>
                                        <option value="" selected>-- Please Select --</option>
                                        <option value="Irbid" @if (old('residence') == 'Irbid') selected @endif>Irbid
                                        </option>
                                        <option value="Ajloun" @if (old('residence') == 'Ajloun') selected @endif>Ajloun
                                        </option>
                                        <option value="Jerash" @if (old('residence') == 'Jerash') selected @endif>Jerash
                                        </option>
                                        <option value="Mafraq" @if (old('residence') == 'Mafraq') selected @endif>Mafraq
                                        </option>
                                        <option value="Balqa" @if (old('residence') == 'Balqa') selected @endif>Balqa
                                        </option>
                                        <option value="Amman" @if (old('residence') == 'Amman') selected @endif>Amman
                                        </option>
                                        <option value="Zarqa" @if (old('residence') == 'Zarqa') selected @endif>Zarqa
                                        </option>
                                        <option value="Madaba" @if (old('residence') == 'Madaba') selected @endif>Madaba
                                        </option>
                                        <option value="Karak" @if (old('residence') == 'Karak') selected @endif>Karak
                                        </option>
                                        <option value="Tafilah" @if (old('residence') == 'Tafilah') selected @endif>Tafilah
                                        </option>
                                        <option value="Ma'an" @if (old('residence') == "Ma'an") selected @endif>Ma'an
                                        </option>
                                        <option value="Aqaba" @if (old('residence') == 'Aqaba') selected @endif>Aqaba
                                        </option>
                                    </select>
                                    @if ($errors->has('residence'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('residence') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
