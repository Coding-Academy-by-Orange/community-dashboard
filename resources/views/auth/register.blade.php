@extends('layouts.auth')
@section('title')
    Register
@endsection
@section('main')
     <section class="wizard-section mt-4">
        <div class="form-wizard">
            <form method="post" class="signup-step1" action="{{route('register.step1')}}">
                @csrf
                <div class="d-flex align-items-center flex-column">
                    <div class="form-group col-lg-6 col-md-7">
                        <h1>Create an account</h1>
                    </div>
                    <div class="mb-4 form-group col-lg-6 col-md-7 ">
                        <label for="email" class="is-required">Email address<span class="sr-only"> (required)</span></label>
                        <div class="input-group ">
                            <input name="email" type="text"
                                   class="form-control email @error('email') is-invalid @enderror " id="email"
                                   value="{{old('email')}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <small>eg: username@domain.com </small>
                    </div>
                    <div class="mb-4 form-group col-lg-6 col-md-7 ">
                        <label for="mobile" class="is-required">Mobile<span class="sr-only"> (required)</span></label>
                        <div class="input-group ">
                            <input name="mobile" type="text"
                                   class="form-control mobile @error('mobile') is-invalid @enderror " id="mobile"
                                   value="{{old('mobile')}}">
                            @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <small>eg: 077********</small>
                    </div>
                    <div class="mb-1 form-group col-lg-6 col-md-7" style="position: relative;">
                        <label for="validationServer02" class="is-required">Create Password<span
                                class="sr-only"> (required)</span></label>
                        <div class="input-group ">
                            <input name="password" type="password"
                                   class="form-control password col-11 pr-0  @error('password') is-invalid @enderror"
                                   id="password"
                                   value="{{old('password')}}">
                            <div class="d-flex align-items-center " onclick="showPass()">
                                <i class="fa fa-eye-slash eye btn btn-light border-left-0" aria-hidden="true" ></i>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <small>The Password should be between 6-18 characters. </small>
                        <div class="invalid-feedback password-validation-message font-size-7 mb-3">
                            the password should be at least (8 characters,1 uppercase, 1 number & 1 special character).
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-7 mt-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input @error('chAgree') is-invalid @enderror" id="chAgree"
                                   name="chAgree" type="checkbox" {{ old('chAgree') == 'on' ? 'checked' : '' }}>
                            <label class="custom-control-label " for="chAgree">I agree to the <a href="/terms" target="_blank">terms &amp;
                                    conditions</a> Orange. <span class="mandatory-txt">*</span></label>
                            @error('chAgree')
                            <span class="invalid-feedback" role="alert">
                                        <strong> The Terms & Conditions Not Checked </strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 form-group col-lg-6 col-md-7 ">
                        <div class="form-group custom-control custom-checkbox col-sm-12 ">
                            <input name="is_newsletter" type="checkbox" class="custom-control-input"
                                   id="is_newsletter"
                               checked
                            >
                            <label class="custom-control-label" for="is_newsletter">Receive Coding Academy
                                Newsletter. </label>
                        </div>
                    </div>
                    <div class="mb-4 form-group col-lg-6 col-md-7">
                        <button class="next1 btn btn-primary  btn-lg btn-block" type="submit">Sign Up</button>
                </div>
{{--            <!--       <div class="mb-4 form-group col-lg-6 col-md-7">--}}
{{--                        <a href="{{ route('login.google') }}" class="google btn  btn-lg btn-block">--}}
{{--                            <i class="align-self-center fab fa-google mr-1"></i>--}}
{{--                            Create Account with Google--}}
{{--                        </a>--}}
{{--                    </div>--}}
                    <div class="mb-4 form-group col-lg-6 col-md-7">
                        <a href="{{ route('login') }}" style="text-decoration: none"> <input type="button"                                                                                             class="btn btn-secondary  btn-lg btn-block" value="Already have an account?login"/>
                    </div>
                </div>
            </form>
        </div>
    </section> 
                   <!-- <div class="col-lg-9 col-md-7" style="margin-left: 15px;">                      

     <div style="font-weight: bold">
                        <p>Thank you for taking the time to submit your application, please keep following your email to check your application status.
                        </p>
                        <p>
                            You didn't catch this training session yet? Stay tuned for our future opportunity.

                        </p>
                        <br><br>
                        <p>
                        Best of luck</p>

                        <p class="text-orange" style="color: #FF7700">Coding Academy by Orange Team    
                        </p> 
                    </div>
                </div>-->
@endsection
@section('script')
    <script>
        function showPass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                $('.eye').removeClass("fa-eye-slash");
                $('.eye').addClass("fa-eye");
            } else {
                x.type = "password";
                $('.eye').addClass("fa-eye-slash");
                $('.eye').removeClass("fa-eye");
            }
        }

    </script>
@endsection
