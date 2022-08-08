@extends('layouts.auth')
@section('title') Basic Information @endsection
@section('links')
@endsection
@section('main')
    <section class="wizard-section">
        <div class="form-wizard">
            <form class="basic-info-step2" method="post" action="{{route('basic.info.step2.submit')}}">
                @csrf
                <div class="d-flex align-items-center flex-column">
                    <div class="col-md-8 mt-4">
                        <h2>Coding Academy by <span class="orange-color">Orange</span> <br> <span class="font-size-9"> Welcome! {{auth()->user()->email}}</span>
                        </h2>
                        <div class="alert-red-msg">Add your information to start fill your application !</div>
                        <div class="card orange-border-color">
                            <div class="card-body">
                                <h5 class=" ml-3 "><span class="border mr-2 p-1"> step <span
                                            class="orange-color">2</span>/3 </span> Contact
                                    Information </h5>
                                <hr class="col-sm-11"/>
                                <div class="row ">
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12 ">
                                        <label for="mobile" class="is-required">Mobile Number </label>
                                        <input name="mobile" type="number" class="form-control mobile  @error('mobile') is-invalid @enderror"

                                               value="@if(auth()->user()->mobile){{auth()->user()->mobile}} @else {{old('mobile')}} @endif">
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12 mt-1" id="national-ID">
                                        <ul class="pagination d-flex justify-content-end ">
                                            <li class="page-item "><a class="btn btn-secondary mr-1"
                                                                      href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Cancel</a>
                                            </li>
                                            <li class="page-item ">
                                                <button class="basic-info-sms-btn btn btn-primary"
                                                        type="submit"> Send SMS
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form id="logout-form" action="{{ route('logout') }}"
                  method="POST"
                  class="d-none">
                @csrf
            </form>
        </div>
    </section>
@endsection
