@extends('layouts.client')
@section('title') English Test @endsection
@section('links')

@endsection

@section('main')
<style>
/* .my-2{
    color:#FF7700;
}
a{color:blue;}
@media screen and (max-width: 600px) {
  .o-footer{
    visibility: hidden;
    display: none;
  }
} */
</style>
    <main role="main" id="content" class="container ">
        <nav role="navigation" aria-labelledby="breadcrumb-intro-2" class="">
            <p class="sr-only" id="breadcrumb-intro-2">You are here:</p>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('client.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="location">English Test</li>
            </ol>
        </nav>
        <div class="jumbotron p-4 p-md-5 text-secondary  rounded background-jumbotron-english">
            <div class="col-md-7 p-3 bg-white">
                <h1 class="display-4 font-italic ">English Test</h1>
                <p class="lead my-3">Learning a language allows people to grow. Once rooted, they can take a step towards others. </p>
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" @if(App\EnglishQuiz::where('user_id', auth()->id())->first() != null) disabled @endif >Submit Your Score</button>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <h3 class="modal-title" id="exampleModalLabel">English Test Submission</h3>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="myForm" method="POST" action="{{ route('quizzes.store') }}"  enctype="multipart/form-data"   >
                            @csrf
                            <div class="form-row form-group">
                                <div class="col-sm-4">
                                    <label for="inputName" class="is-required">Your Level </label>
                                    <input type="text" class="form-control  @error('english_score') is-invalid @enderror" name="english_score" value="{{old('english_score')}}">
                                    @error('english_score')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small>eg: A2</small>
                                </div>
                                <!-- <div class="col-sm-8">
                                    <label for="inputName" class="is-required small">Insert Profile link in the English evaluation site (www.leveltest.com) </label>
                                    <input type="text" class="form-control  @error('english_account_link') is-invalid @enderror" name="english_account_link" value="{{old('english_account_link')}}">
                                    @error('english_account_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small>eg: https://leveltest/userName</small>
                                </div> -->
                                <input type="hidden" name="english_account_link" value="https://leveltest/userName">
                            </div>
                            <label for="inputName" class="is-required small">Insert screen shot for your result sent to your email (which used in this application) from English evaluation site (www.examenglish.com) </label>
                            <div class="custom-file">
                            
                            <input type="file" class="custom-file-input  @error('english_score_image') is-invalid @enderror"  aria-describedby="helpTextFile" name="english_score_image" value="{{old('english_score_image')}}" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                                @error('english_score_image')
                                
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label class="custom-file-label" for="exampleInputFile">Screen shot for your English test result </label>
                                <span class="form-text small text-muted" id="helpTextFile">(.jpg , .jpeg , .png ) **Make sure image size less than 2MB   </span>
                            </div>
                            <div class="modal-footer mt-5">
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
                    <h2>English Test Section</h2>
                    <p>This Section consist of online test that you have to complete successfully through Exam English platform.
                    </p>
                    <h3 class="mt-3">Steps</h3>
                    <p>To proceed with your application, please follow the following steps:</p>
                    <ol>
                    <li class="my-2"> Go to <a href="https://www.examenglish.com/leveltest/grammar_level_test.htm" target="_blank">https://www.examenglish.com </a>        
                        </li>
                        <span class="font-weight-bold" style="color: #ff7900"> * Make sure you are using "Google Chrome Browser"</span>
                        <!-- <li class="my-2">"Take our free test"</li> -->
                        <li class="my-2">Do your test when you are ready.</li>
                        <li class="my-2">After finishing the test, send the result to your email address that used in this application.</li>
                        <li class="my-2"> Take screen shots for your result that sent to your email address and upload it in this section above (Submit Your Score)</li>


                    </ol>
                    <p>If you have any questions or concerns regarding completing of English test, please contact
                        us on the following email:

                        <a href="mailto:codingacademy.ojo@orange.com" >codingacademy.ojo@orange.com</a> .</p>
                </div><!-- /.blog-post -->
                <hr class="featurette-divider mt-5">

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
