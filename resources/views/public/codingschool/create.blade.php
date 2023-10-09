@extends('layouts.app')
@section('title')
    Coding School Registration
@endsection
@section('main')
<div class="container">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-8 mx-auto">
            <form class="p-4 p-md-5 rounded-3" action="{{ route('codingschool.store') }}" method="POST">
                @csrf
                <h1>Registration Form</h1>


                <div class="form-group">
                    <label for="email" class="is-required">Name<span class="sr-only">
                            (required)</span></label>
                    <div class="input-group ">
                        <input style="margin-right : 10px ; margin-bottom : 10px" name="first_name"
                            placeholder="First Name" type="text"
                            class="form-control email @error('first_name') is-invalid @enderror " id="first_name"
                            value="{{ old('first_name') }}" required>

                        <input name="father_name" placeholder="Father's Name" type="text"
                            class="form-control email @error('father_name') is-invalid @enderror " id="father_name"
                            value="{{ old('father_name') }}" required>

                    </div>

                    <div class="input-group ">
                        <input style="margin-right : 10px ; margin-bottom : 10px" name="grandfather_name"
                            placeholder="Grandfather's Name" type="text"
                            class="form-control email @error('grandfather_name') is-invalid @enderror "
                            id="grandfather_name" value="{{ old('grandfather_name') }}" required>

                        <input name="last_name" placeholder="Last Name" type="text"
                            class="form-control email @error('last_name') is-invalid @enderror " id="last_name"
                            value="{{ old('last_name') }}" required>

                    </div>
                    @if ($errors->has('first_name'))
                        <div class="alert alert-danger">
                            {{ $errors->first('first_name') }}
                        </div>
                    @endif
                    @if ($errors->has('father_name'))
                        <div class="alert alert-danger">
                            {{ $errors->first('father_name') }}
                        </div>
                    @endif
                    @if ($errors->has('grandfather_name'))
                        <div class="alert alert-danger">
                            {{ $errors->first('grandfather_name') }}
                        </div>
                    @endif
                    @if ($errors->has('last_name'))
                        <div class="alert alert-danger">
                            {{ $errors->first('last_name') }}
                        </div>
                    @endif
                </div>


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
                    <label for="email" class="is-required">Email address<span class="sr-only">
                            (required)</span></label>
                    <div class="input-group ">
                        <input name="email" type="text"
                            class="form-control email @error('email') is-invalid @enderror " id="email"
                            value="{{ old('email') }}" required>
                    </div>

                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    @if (session('email'))
                        <div class="alert alert-danger">
                            {{ session('email') }}
                        </div>
                    @endif
                    <small>eg: username@domain.com </small>
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
                <div class="form-group" style="margin-top: 3vw">
                    <label for="education" class="is-required">Education Level Attained<span class="sr-only">
                            (required)</span></label>
                    <div>
                        <input style="margin-top: 15px" name="education" value="Below Tawjihi" required
                            type="radio" class=" @error('education') is-invalid @enderror "
                            @if (old('education') == 'Below Tawjihi') checked @endif>
                        <span style="margin-top: 1vw ; margin-right : 4vw">Below Tawjihi</span>
                        <br>

                        <input style="margin-top: 15px" name="education" value="Tawjihi" required type="radio"
                            class=" @error('education') is-invalid @enderror "
                            @if (old('education') == 'Tawjihi') checked @endif>
                        <span style="margin-top: 2vw">Tawjihi/High School Diploma</span>
                        <br>

                        <input style="margin-top: 15px" name="education" value="Diploma" required type="radio"
                            class=" @error('education') is-invalid @enderror "
                            @if (old('education') == 'Diploma') checked @endif>
                        <span style="margin-top: 1vw">Diploma</span>
                        <br>

                        <input style="margin-top: 15px" name="education" value="Undergraduate" required
                            type="radio" class="@error('education') is-invalid @enderror "
                            @if (old('education') == 'Undergraduate') checked @endif>
                        <span style="margin-top: 1vw">Undergraduate (Baccalaureate)</span>
                        <br>

                        <input style="margin-top: 15px" name="education" value="Graduate" required type="radio"
                            class="@error('education') is-invalid @enderror "
                            @if (old('education') == 'Graduate') checked @endif>
                        <span style="margin-top: 1vw">Graduate (Masters and PhD)</span>
                        <br>

                        <br class="major_education" >

                        <p class="major_education">What is your major? <span
                                style="color: red">*</span></p>
                        <input type="text" name='major_study'
                            class="major_education form-control @error('major_study') is-invalid @enderror "
                            value="{{ old('education') }}" >
                        <br class="major_education" >

                        @if ($errors->has('education'))
                            <div class="alert alert-danger">
                                {{ $errors->first('education') }}
                            </div>
                        @endif
                    </div>
                    @if ($errors->has('major_education'))
                        <div class="alert alert-danger">
                            {{ $errors->first('major_education') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection