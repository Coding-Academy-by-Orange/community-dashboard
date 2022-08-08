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
                <li class="breadcrumb-item active" aria-current="location">Code Challenge</li>
            </ol>
        </nav>
        <div class="jumbotron p-4 p-md-5 text-secondary  rounded background-jumbotron-code">
            <div class="col-md-7 p-3 bg-white">
                <h1 class="display-4 font-italic ">Learning By Doing!</h1>
                <p class="lead my-3">SoloLearn is a series of free apps that allows users to learn a variety of programming languages and concepts through short lessons, code challenges, and quizzes. </p>
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" @if(App\CodeChallenge::where('user_id', auth()->id())->first() != null) disabled @endif >Submit Your Score</button>
            </div>
        </div>
        <div class="modal fade exampleModal" id="exampleModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form role="form" id="myForm" method="post" action="{{ route('challenges.store') }}"  enctype="multipart/form-data"   >
                            @csrf
                            <div class="form-row form-group">
                                <div class="col-sm-4">
                                    <label for="inputName" class="is-required">Your Score (xp)</label>
                                    <input type="number" class="form-control @error('code_score') is-invalid @enderror" name="code_score" value="{{old('code_score')}}">
                                    @error('code_score')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small>eg: 200</small>
                                </div>
                                <div class="col-sm-8">
                                    <label for="inputName" class="is-required">Your Account link </label>
                                    <input type="text" class="form-control @error('code_account_link') is-invalid @enderror" name="code_account_link" value="{{old('code_account_link')}}">
                                    @error('code_account_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small>eg: https://www.sololearn.com/profile/8245682</small>
                                </div>
                            </div>
                            <label for="inputName" class="is-required small">Insert screen shot for your result and profile in (www.sololearn.com) </label>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('code_score_image') is-invalid @enderror" id="exampleInputFile" aria-describedby="helpTextFile" name="code_score_image" value="{{old('code_score_image')}}" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                                @error('code_score_image')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                                <label class="custom-file-label is-required" for="exampleInputFile">Screen shot for your account </label>
                                <span class="form-text small text-muted" id="helpTextFile">(.jpg , .jpeg , .png )**Make sure image size less than 2MB  </span>
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
            <div class="col-md-12 blog-main">
                <div class="blog-post">
{{--                    <h2 class="blog-post-title">Code Challenge Section</h2>--}}

{{--                    <p>Thank you for your application to the second batch of the Web and Mobile Development training--}}
{{--                        program at Orange Coding Academy.</p>--}}
{{--                    <hr>--}}
                    <h2>Code Challenge Section</h2>
                    <p>This Section consist of a series of online exercises that you have to complete successfully
                        through Sololearn platform.
                    </p>
                    <h3 class="mt-3">Steps</h3>
                    <p>To proceed with your application, please follow the following steps:</p>
                    <ol>
                        <li class="my-2">Go to www.sololearn.com</li>
                        <li class="my-2">Sign up / Create an account</li>
                        <li class="my-2">Once you create your profile, go to “Manage Courses”</li>
                        <li class="my-2">Add the following 3 courses (and more if you like!):</li>
                        <div class="container marketing my-5">

                            <!-- Three columns of text below the carousel -->
                            <div class="row text-center mr-5">
                                <div class="col-lg-4">
                                    <img width="140" height="140"
                                         src="{{asset('assets/img/html.png')}}"
                                         class="rounded-circle border" alt="html">
                                    <h2>HTML Fundamentals</h2>
                                    <p>25 lessons minimum</p>
                                    <p><a class="btn btn-secondary" href="https://www.sololearn.com/learning/1014" target="_blank">View course »</a></p>
                                </div><!-- /.col-lg-4 -->
                                <div class="col-lg-4">
                                    <img width="140" height="140"
                                         src="{{asset('assets/img/css.png')}}"
                                         class="rounded-circle border" alt="css">
                                    <h2>CSS Fundamentals</h2>
                                    <p>35 lessons minimum</p>
                                    <p><a class="btn btn-secondary" href="https://www.sololearn.com/learning/1023" target="_blank">View course »</a></p>
                                </div><!-- /.col-lg-4 -->
                                <div class="col-lg-4">
                                    <img width="140" height="140"
                                         src="{{asset('assets/img/js.png')}}"
                                         class="rounded-circle border" alt="javascript">

                                    <h2>Javascript Tutorial</h2>
                                    <p>41 lessons minimum</p>
                                    <p><a class="btn btn-secondary" href="https://www.sololearn.com/learning/1024" target="_blank">View course »</a></p>
                                </div><!-- /.col-lg-4 -->
                            </div><!-- /.row -->
                        </div>
                        <li class="my-2"> Once you have completed the courses, please send your Sololearn profile link
                            with a screenshot to this form <a> <small> <a href="https://www.sololearn.com/profile/18382942" target="_blank">  (profile example) </a></small></a></li>
                    </ol>
                    <p>If you have any questions or concerns regarding completing of Sololearn courses, please contact
                        us on the following email:

                        <a href="mailto:codingacademy.ojo@orange.com" >codingacademy.ojo@orange.com</a> .</p>
                </div><!-- /.blog-post -->
            </div>
            <a href="#" class="o-scroll-up" title="back to top">
                <span class="d-none d-sm-inline-block">Back to top</span>
            </a>
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
