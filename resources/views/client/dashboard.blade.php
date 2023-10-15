@extends('layouts.client')
@section('title')
    Home page
@endsection
@section('links')
    <link href="{{ asset('assets/css/verification_code.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/client.css') }}" rel="stylesheet">
@endsection

@section('main')

    <style>
        @media screen and (max-width: 600px) {
            .btnM {
                margin-right: 0.5rem;
                margin-left: 0.5rem;
            }

            .intro {
                margin-left: 0.5rem;
            }

            #m {
                margin-right: -5px;
            }

        }
    </style>
    <main role="main" id="content" class="container ml-5">
        @if (session('status_success'))
            <div class="successModal modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <!-- Boosted mod: using visually hidden text instead of aria-label -->
                            <button type="button" class="close" data-dismiss="modal">
                                <span class="sr-only">Close static modal demo</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            @php(session()->forget('status_success'))
        @endif
        @if (auth()->user()->is_submitted == 0)
            <div class="row d-flex justify-content-between mt-3" style="margin-left: -5px" id="m">
                <div class="col-lg-7 md-col-12  ">
                    <div class="row">
                        <div class="col-lg-12 bg-secondary card pt-3 pb-2">
                            <h2 class="intro">Your Sections</h2>
                            <p class="intro"> You have to complete all sections below to enable submit
                                your application. </p>
                            <div class="row">
                                <div class="form-group col-lg-12 my-1">
                                    <div class="card card-main ">
                                        <div class="card-body">
                                            <div class="row flexDirection ">
                                                <a href="{{ route('personal.information') }}"
                                                    class="text-secondary text-decoration-none col-lg-8 px-0 ">
                                                    <div class="col-12 card-title d-flex justify-content-start">
                                                        <i class="fas fa-user-alt  fa-2x "></i>
                                                        <div class="row ml-1 ">
                                                            <h5 class="col-12 card-title mb-0 ">Personal Information</h5>
                                                            <small class="col-12">We need your data to complete our
                                                                filtration. </small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class=" align-items-center col-lg-4 d-flex justify-content-between ">
                                                    <div class="card-text mr-5">
                                                        @if (
                                                            $information->educational_level != null &&
                                                                $information->educational_background != null &&
                                                                $information->ar_writing != null &&
                                                                $information->ar_speaking != null &&
                                                                $information->en_writing != null &&
                                                                $information->en_speaking != null &&
                                                                $information->city != null &&
                                                                $information->relative_mobile_1 != null &&
                                                                $information->relative_relation_1 != null &&
                                                                $information->relative_mobile_2 != null &&
                                                                $information->relative_relation_2 != null &&
                                                                $information->is_committed == 1)
                                                            <i style="color: limegreen " class=" fas fa-check "></i>
                                                            Completed
                                                        @elseif(
                                                            $information->educational_level == null &&
                                                                $information->educational_background == null &&
                                                                $information->ar_writing == null &&
                                                                $information->ar_speaking == null &&
                                                                $information->en_writing == null &&
                                                                $information->en_speaking == null &&
                                                                $information->city == null &&
                                                                $information->relative_mobile_1 == null &&
                                                                $information->relative_relation_1 == null &&
                                                                $information->relative_mobile_2 == null &&
                                                                $information->relative_relation_2 == null &&
                                                                $information->is_committed == null)
                                                            <i style="color: #cd3c14 " class="fas fa-circle "></i>
                                                            Not
                                                            Started
                                                        @else
                                                            <i class="fas fa-hourglass-start" style="color: #527edb"></i>
                                                            In Progress
                                                        @endif
                                                    </div>
                                                    <a href="{{ route('personal.information') }}"> <i
                                                            class="ml-1 fas fa-chevron-right fa-2x go-btn"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 my-1">
                                    <div class="card card-main">
                                        <div class="card-body">
                                            <div class="row flexDirection">
                                                <a href="{{ route('answers.index') }}"
                                                    class="text-secondary  text-decoration-none col-lg-8  px-0 ">
                                                    <div class="col-12 card-title d-flex justify-content-start">
                                                        <i class="fas fa-comments  fa-2x "></i>
                                                        <div class="row ml-1">
                                                            <h5 class="col-12 card-title mb-0 ">Questionnaire </h5>
                                                            <small class="col-12">A
                                                                bunch of questions of your interest in Coding. </small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="align-items-center d-flex justify-content-between  col-lg-4 ">
                                                    <div class="card-text mr-5 ">
                                                        @if (auth()->user()->questionnaires->count() == App\Questionnaire::count())
                                                            <i style="color: limegreen " class=" fas fa-check "></i>
                                                            Completed
                                                        @elseif(auth()->user()->questionnaires->count() == 0)
                                                            <i style="color: #cd3c14 " class=" fas fa-circle "></i>
                                                            Not Started
                                                        @else
                                                            <i class="fas fa-hourglass-start" style="color: #527edb"></i> In
                                                            Progress
                                                        @endif
                                                    </div>
                                                    <a href="{{ route('answers.index') }}"> <i
                                                            class="ml-1 fas fa-chevron-right fa-2x go-btn"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 my-1">
                                    <div class="card card-main">
                                        <div class="card-body">
                                            <div class="row flexDirection">
                                                <a href="{{ route('challenges.index') }}"
                                                    class="text-secondary  text-decoration-none col-lg-8  px-0">
                                                    <div class="col-12 card-title d-flex justify-content-start">
                                                        <i class="fas fa-code  fa-2x "></i>
                                                        <div class="row ml-1 ">
                                                            <h5 class="col-12 card-title mb-0 ">Code
                                                                Challenge</h5>
                                                            <small class="col-12">Start to learning the
                                                                code, it is one time submission!</small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="align-items-center col-lg-4 d-flex justify-content-between">
                                                    <div class="card-text mr-5 ">
                                                        @if (App\CodeChallenge::where('user_id', auth()->id())->first() != null)
                                                            <i style="color: limegreen " class=" fas fa-check "></i>
                                                            Completed
                                                        @else
                                                            <i class="fas fa-circle" style="color: #cd3c14"></i>
                                                            Not
                                                            Started
                                                        @endif
                                                    </div>
                                                    <a href="{{ route('challenges.index') }}"> <i
                                                            class="ml-1 fas fa-chevron-right fa-2x go-btn"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 my-1">
                                    <div class="card card-main">
                                        <div class="card-body">
                                            <div class="row flexDirection">
                                                <a href="{{ route('quizzes.index') }}"
                                                    class="text-secondary  text-decoration-none col-lg-8 px-0">
                                                    <div class="col-12 card-title d-flex justify-content-start">
                                                        <i class="fas fa-globe-asia fa-2x mr-1 "></i>
                                                        <div class="row ml-1 ">
                                                            <h5 class="col-12 card-title mb-0 ">English
                                                                Test</h5>
                                                            <small class="col-12">Test your English level, it is one time
                                                                Submission! </small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="align-items-center d-flex justify-content-between col-lg-4 ">
                                                    <div class="card-text mr-5 ">
                                                        @if (App\EnglishQuiz::where('user_id', auth()->id())->first() != null)
                                                            <i style="color: limegreen " class="fas fa-check "></i>
                                                            Completed
                                                        @else
                                                            <i class="fas fa-circle" style="color: #cd3c14"></i>
                                                            Not
                                                            Started
                                                        @endif
                                                    </div>
                                                    <a href="{{ route('quizzes.index') }}"> <i
                                                            class="ml-1 fas fa-chevron-right fa-2x go-btn"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="btnM mt-1 my-1">
                                <button class="submit-button btn btn-primary btn-lg btn-block" data-toggle="modal"
                                    data-target="#submitModalCenter"
                                    @if (App\CodeChallenge::where('user_id', auth()->id())->first() != null &&
                                            App\EnglishQuiz::where('user_id', auth()->id())->first() != null &&
                                            App\Questionnaire::count() ==
                                                auth()->user()->questionnaires->count() &&
                                            auth()->user()->educational_level != null &&
                                            auth()->user()->educational_background != null &&
                                            auth()->user()->ar_writing != null &&
                                            auth()->user()->ar_speaking != null &&
                                            auth()->user()->en_writing != null &&
                                            auth()->user()->en_speaking != null &&
                                            auth()->user()->city != null &&
                                            auth()->user()->address != null &&
                                            auth()->user()->relative_mobile_1 != null &&
                                            auth()->user()->relative_relation_1 != null &&
                                            auth()->user()->relative_mobile_2 != null &&
                                            auth()->user()->relative_relation_2 != null &&
                                            auth()->user()->is_committed != null &&
                                            auth()->user()->is_submitted == 0) ' ' @else disabled @endif> Submit
                                </button>
                            </div>
                            <div class="modal fade" id="submitModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="submitModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title " id="submitModalLongTitle">Application Submit</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert  alert-warning" role="alert">
                                                <span class="alert-icon"><span class="sr-only">Danger</span></span>
                                                <p>If you submit your application, you will Not be able to edit your
                                                    application,
                                                    <span class="font-weight-bold">Are you Sure?</span>
                                                </p>
                                            </div>
                                            <div class="alert alert-warning">
                                                <span class="alert-icon"><span class="sr-only"></span> </span>
                                                <p> The first dose of vaccine is mandatory to be nominated for the final
                                                    selection - we encourage you to take your vaccine as soon as possible.
                                                </p>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <form method="post" action="{{ route('client.submission') }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-lg-5 md-col-12 ">
                    <div class="row mr-lg-1 mb-lg-1 " style=" margin-top: 30px">

                        <div class="col-lg-12">
                            <h3>Welcome <span class="orange-color text-capitalize">{{ auth()->user()->en_first_name }}
                                </span>
                                !</h3>
                        </div>
                        <div class="col-lg-12">
                            <p class="lead pr-3"><span class="font-weight-bold"> E-mail:</span>
                                {{ auth()->user()->email }}</p>
                            <p class="lead"><span class="font-weight-bold">Mobile:</span>
                                @if (auth()->user()->mobile == null)
                                    Not submitted yet
                                @else
                                    {{ auth()->user()->mobile }}
                                @endif
                            </p>
                        </div>
                        <div class="col-lg-12 mb-3 ">
                            <p class="lead">Application Status: <span class="badge bg-primary">In Progress</span>
                                <span class="form-text  small  text-capitalize font-weight-bold" id="helpTextFile"
                                    style="color: #f16e00">Your Application not completed yet! And you still need time to
                                    complete the remaining requirements?</span>
                                <span class="form-text small  text-capitalize font-weight-bold" id="helpTextFile"
                                    style="color: #f16e00">Don't worry, you still have time to login again many times, and
                                    to complete all the requirements until Mar.31th, 2022!</span>

                            </p>
                        </div>
                    </div>
                </div>

            </div>
        @else
            <div class="d-flex flex-column text-center my-4">
                <h2>Thank you for submitting your application! <br> we will process it then send your result to your
                    email: ({{ auth()->user()->email }}) </h2>
                <div class="col-md-12 d-md-block d-none text-center align-self-center p-3">
                    <a href="https://www.facebook.com/CodingAcademybyOrange" target="_blank"> <img class=" border"
                            src="{{ asset('assets/img/coding_academy.png') }}" alt="coding academy"
                            style="max-height: 50vh"></a>
                </div>
            </div>
        @endif
    </main>
@endsection
