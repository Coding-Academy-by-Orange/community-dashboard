@extends('layouts.admin')
@section('main')
<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-2 col-12 "></div>
        <div class="col-md-6 col-12">
            <div class="card" >
                <div class="card-header">
                    <h4 class="card-title">Vertical Form with Icons</h4>
                </div>
                <div class="card-body">
                    <form class="form form-horizontal" method="post" action="{{route('admin.register.submit')}}" >
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-icon">First Name</label>
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="first-name-icon" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" placeholder="First Name">
                                            <div class="form-control-position">
                                                <i class="bx bx-user"></i>
                                            </div>
                                            @error('fname')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-icon">Last Name</label>
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="last-name-icon" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" placeholder="Last Name">
                                            <div class="form-control-position">
                                                <i class="bx bx-user"></i>
                                            </div>  @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-icon">Email</label>
                                        <div class="position-relative has-icon-left">
                                            <input type="email" id="email-id-icon" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
                                            <div class="form-control-position">
                                                <i class="bx bx-mail-send"></i>
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password-icon">Password</label>
                                        <div class="position-relative has-icon-left">
                                            <input type="password" id="password-icon" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password">
                                            <div class="form-control-position">
                                                <i class="bx bx-lock"></i>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password-icon">Confirm Password</label>
                                        <div class="position-relative has-icon-left">
                                            <input type="password" id="password-icon password-confirm" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                            <div class="form-control-position">
                                                <i class="bx bx-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="reset" class="btn btn-secondary mr-1">Reset</button>
                                    <button type="submit" class="btn btn-primary ">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Horizontal form layout section end -->
@endsection
