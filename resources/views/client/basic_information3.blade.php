@extends('layouts.auth')
@section('title') Mobile Verification @endsection
@section('links')
@endsection
@section('main')
    <section class="wizard-section">
        <div class="form-wizard">
            <form class="basic-info-step3" action="{{route('basic.info.step3.submit')}}" method="post">
                @csrf
                <div class="d-flex align-items-center flex-column">
                    <div class="col-md-7 mt-4">
                        <h3> Welcome! {{auth()->user()->email}}
                        </h3>
                        <div class="card orange-border-color ">
                            <div class="card-body">
                                <h5 class=" ml-3 "><span class="border mr-2 p-1"> step <span
                                            class="orange-color">2</span>/3 </span> Mobile Verification </h5>
                                <hr class="col-sm-11"/>
                                <ul class="list-group list-group-flush text-center">
                                    <li class="list-group-item">
                                        <div class="row ">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 ">
                                                <p>A verification code has been sent via sms to:</p>
                                                <span>{{auth()->user()->mobile}}</span>
{{--                                                    <a class="pointer" href="{{route('basic.info.step2.index')}}" > Not your number? </a>--}}
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 mt-4">
                                                <label for="validationServer01" class="is-required">Enter verification
                                                    code (from 4 digits)<span class="sr-only"> (required)</span></label>
                                                <div id="form" class="d-flex flex-column align-items-center text-center">
                                                    <input id="" type="number" name="mobile_verification"
                                                           class="mobile_verification text-center verification-input   @error('mobile_verification') is-invalid @enderror"
                                                           style="width: 160px; font-size: 40px" placeholder="1234"/>
                                                    @error('mobile_verification')
                                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12 col-md-7  resend text-center">
                                                <p class="text-center">Didn't get the verification code,
                                                    <a href="{{ route('resend.mobile.verification.submit') }}"> Resend Code</a></p>
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
