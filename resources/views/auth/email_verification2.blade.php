@extends('layouts.auth')
@section('title')
    Register
@endsection
@section('main')
    <section class="wizard-section">
        <div class="form-wizard">
            <form class="basic-info-step3" action="{{route('register.step2')}}" method="post">
                @csrf
                <div class="d-flex align-items-center flex-column">
                    <div class="col-md-7 mt-4">
                        <h3> Welcome! {{auth()->user()->email}}
                        </h3>
                        <div class="card orange-border-color ">
                            <div class="card-body">
                                <h5 class=" ml-3 "><span class="border mr-2 p-1"> step <span
                                            class="orange-color">1</span>/3 </span> Email Verification </h5>
                                <hr class="col-sm-11"/>
                                <ul class="list-group list-group-flush text-center">
                                    <li class="list-group-item">
                                        <div class="row ">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 ">
                                                <p>A verification code has been sent via email to:</p>
                                                <span>{{auth()->user()->email}}</span>
{{--                                                <a class="pointer" href="{{route('basic.info.step2.index')}}" > Not your email? </a>--}}
                                   
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 mt-4">
                                                <label for="validationServer01" class="is-required">Enter verification
                                                    code (from 4 digits)<span class="sr-only"> (required)</span></label>
                                                <div id="form" class="d-flex flex-column align-items-center text-center">
                                                    <input id="" type="number" name="email_verification"
                                                           class="email_verification text-center verification-input   @error('email_verification') is-invalid @enderror"
                                                           style="width: 160px; font-size: 40px" placeholder="1243"/>
                                                    @error('email_verification')
                                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12 col-md-7  resend text-center">
                                                <p class="text-center">Didn't get the verification code,
                                                    <a href="{{ route('resend.email.verification.submit') }}" > Resend Code</a></p>
                                                    <span style="color: #f16e00">
                                        <strong>
                                        If you can not find your confirmation/reset password email in your normal inbox, it is worth checking in your spam or junk mail section.</strong>
                                    </span>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-7 text-center timer"></div>
                                            <div class="col-md-12  d-flex justify-content-center">
                                                <button class="btn btn-primary  btn-lg btn-block finish-basic-inf-btn"
                                                        type="submit"> Verify
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
@section('script')
    {{--    <script src="{{asset('assets/js/register.js')}}"></script>--}}
@endsection
