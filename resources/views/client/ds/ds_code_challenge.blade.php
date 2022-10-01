@extends('layouts.client')
@section('title') Code Challenge  @endsection
@section('links')

@endsection
<style>


    @media screen and (max-width: 600px) {
        /* .o-footer{
          visibility: hidden;
          display: none;
        } */
    }
</style>
@section('main')
    <main role="main" id="content" class="container">
        <nav role="navigation" aria-labelledby="breadcrumb-intro-2" class="">
            <p class="sr-only" id="breadcrumb-intro-2">You are here:</p>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('client.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="location">Challenge yourself</li>
            </ol>
        </nav>
        <div class="jumbotron p-4 p-md-5 text-secondary  rounded background-jumbotron-code"
             style="background: url({{asset('/assets/img/ds-code-ch-jumpotron.jpg')}}) no-repeat center;
                 background-size: cover;">
            <div class="col-md-7 p-3 bg-white">
                <h1 class="display-4 font-italic ">Learning By Doing!</h1>
                <p class="lead my-3">In this section , you will submit the results for IQ,Math and Python Tests.</p>
                <p class="lead my-3"> Finally you will submit the screenshots of your results <strong>HERE.</strong></p>
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal"
                        data-whatever="@mdo"
                        @if(App\CodeChallenge::where('user_id', auth()->id())->first() != null) disabled @endif >Submit
                    Your Scores
                </button>
            </div>
        </div>
        <div class="modal fade exampleModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                        <span class="alert-icon"><span class="sr-only">danger</span></span>
                        <p>This form can be filling for one time!!</p>
                        <button type="button" class="close" data-dismiss="alert">
                            <span class="sr-only">Close warning message</span>
                        </button>
                    </div>
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Code Challenge Submission</h3>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="myForm" method="post" action="{{ route('challenges.store') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-row form-group ">
                                <div class="col-sm-12">
                                    <label for="inputName" class="is-required small">Insert screenshot for your Sololearn(https://sololearn.com/) python </label>
                                    <div class="custom-file">
                                        <input type="file"
                                               class="custom-file-input @error('code_score_image_python') is-invalid @enderror"
                                               id="exampleInputFile" aria-describedby="helpTextFile"
                                               name="code_score_image_python"
                                               value="{{old('code_score_image_python')}}"
                                               onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                                        @error('code_score_image_python')
                                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                        @enderror
                                        <label class="custom-file-label is-required" for="exampleInputFile">Screenshot
                                            for Sololearn  certificate (Python) </label>
                                        <span class="form-text small text-muted" id="helpTextFile">(.jpg , .jpeg , .png )**Make sure image size less than 2MB  </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row form-group mt-5">
                                <div class="col-sm-12">
                                    <label for="inputName" class="is-required small">Insert screenshot for your result
                                        in the Math Test </label>
                                    <div class="custom-file">
                                        <input type="file"
                                               class="custom-file-input @error('code_score_image_math') is-invalid @enderror"
                                               id="exampleInputFile" aria-describedby="helpTextFile"
                                               name="code_score_image_math"
                                               value="{{old('code_score_image_math')}}"
                                               onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                                        @error('code_score_image_math')
                                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                        @enderror
                                        <label class="custom-file-label is-required" for="exampleInputFile">Screenshot
                                            for your account (Math Test) </label>
                                        <span class="form-text small text-muted" id="helpTextFile">(.jpg , .jpeg , .png )**Make sure image size less than 2MB  </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row form-group mt-5">
                                <div class="col-sm-12">
                                    <label for="inputName" class="is-required small">Insert screenshot for your result
                                        IQ Test </label>
                                    <div class="custom-file">
                                        <input type="file"
                                               class="custom-file-input @error('code_score_image_iq') is-invalid @enderror"
                                               id="exampleInputFile" aria-describedby="helpTextFile"
                                               name="code_score_image_iq"
                                               value="{{old('code_score_image_iq')}}"
                                               onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                                        @error('code_score_image_iq')
                                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                        @enderror
                                        <label class="custom-file-label is-required" for="exampleInputFile">Screenshot
                                            for your account (IQ Test)</label>
                                        <span class="form-text small text-muted" id="helpTextFile">(.jpg , .jpeg , .png )**Make sure image size less than 2MB  </span>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer mt-5 ">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Challenge Yourself Section</h2>
                <p>This Section consists of a series of online exercises that you have to complete successfully.</p>
                <h3 class="mt-3">Steps</h3>
                <p>To proceed with your application, please complete <strong>the three Following Steps:</strong></p>
                <p>If you have any questions or concerns regarding completing of courses and tests, please contact
                    us on the following email:

                    <a href="mailto:codingacademy.ojo@orange.com">codingacademy.ojo@orange.com</a> .</p>
            </div><!-- /.blog-post -->
        </div>
        </div>
        <div class="row ">
            <div class="col-md-4">
                <div class="card border-0 ">
                    <div class="card-body d-flex flex-column align-items-center">
                        <img width="140" height="140"
                             src="{{asset('/assets/img/iq.png')}}"
                             class="rounded-circle border border-light" alt="math">
                        <h5 class="card-title text-center mt-2">1. IQ Test</h5>
                        <p class="card-text">To access the test please follow below steps: </p>
                        <ul>
                            <li class="my-2"> Click on the view test</li>
                            <li class="my-2">Solve the Exam Questions.</li>
                            <li class="my-2">PrintScreen the result and save it to show us your score</li>
                        </ul>
                        <a class="btn btn-secondary mb-10"
                           href="https://www.123test.com/iq-test/#classical-intelligence-test"
                           target="_blank">View test »</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0">
                    <div class="card-body d-flex flex-column align-items-center">
                        <img width="140" height="140"
                             src="{{asset('/assets/img/math.png')}}"
                             class="rounded-circle border border-light" alt="math">
                        <h5 class="card-title text-center mt-2">2. Math Test</h5>
                        <p class="card-text">To access the test please follow below steps: </p>
                        <ul>
                            <ul>
                                <li class="my-2"> Click on the view test</li>
                                <li class="my-2">Solve the Exam Questions.</li>
                                <li class="my-2">PrintScreen the result and save it to show us your score</li>
                            </ul>
                        </ul>
                        <a class="btn btn-secondary"
                           href="https://www.w3schools.com/quiztest/quiztest.asp?qtest=MATH"
                           target="_blank">View test »</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0">
                    <div class="card-body d-flex flex-column align-items-center">
                        <img width="140" height="140"
                             src="{{asset('/assets/img/python.png')}}"
                             class="rounded-circle border border-light" alt="math">
                        <h5 class="card-title text-center mt-2">3. Python</h5>
                        <p class="card-text">To complete the course please follow the steps: </p>
                        <ul>

                            <li class="my-2">Click on the view course</li>
                            <li class="my-2">PrintScreen your certificate and save it as a picture.</li>
                        </ul>
                        <a class="btn btn-secondary"
                           href="https://sololearn.com/learn/courses/python-introduction"
                           target="_blank">View course »</a>
                    </div>
                </div>
            </div>

        </div>

    </main>
@endsection
@if (count($errors) > 0)
@section('script')
    <script>
        $('.exampleModal').modal('show');
    </script>
@endsection
@endif
