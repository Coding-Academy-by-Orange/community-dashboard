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
        <div class="jumbotron text-secondary" style="padding:7rem;background-image: url('https://mastermedia.dam-broadcast.com/medias/domain12751/media100418/125413-nuppdqdrw8-whr.jpg'); background-repeat: no-repeat; background-position: center">
            <div class="col-md-7 p-3 bg-white">
                <h1 class="display-4 font-italic ">Learning By Doing!</h1>
                <p class="lead my-3">Orange Coursat is a series of free apps that allows users to learn a variety of
                    programming languages and concepts through short lessons, code challenges, and quizzes. </p>
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal"
                        data-whatever="@mdo"
                        @if(App\CodeChallenge::where('user_id', auth()->id())->first() != null) disabled @endif >Submit
                    Your Score
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
                            <div class="custom-file" style="margin-bottom: 50px !important;">
                                <input type="file"
                                       class="custom-file-input @error('html_certificate') is-invalid @enderror"
                                       id="exampleInputFile" aria-describedby="helpTextFile" name="html_certificate"
                                       value="{{old('html_certificate')}}"
                                       onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                                @error('html_certificate')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                                <label class="custom-file-label is-required" for="exampleInputFile">Screenshot for your
                                    HTML certificate </label>
                                <span class="form-text small text-muted" id="helpTextFile">(.jpg , .jpeg , .png )**Make sure image size less than 2MB  </span>
                            </div>
                            <div class="custom-file pb-3" style="margin-bottom: 50px !important;">
                                <input type="file"
                                       class="custom-file-input @error('css_certificate') is-invalid @enderror"
                                       id="exampleInputFile" aria-describedby="helpTextFile" name="css_certificate"
                                       value="{{old('css_certificate')}}"
                                       onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                                @error('css_certificate')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                                <label class="custom-file-label is-required" for="exampleInputFile">Screenshot for your
                                    CSS Certificate </label>
                                <span class="form-text small text-muted" id="helpTextFile">(.jpg , .jpeg , .png )**Make sure image size less than 2MB  </span>
                            </div>
                            <div class="custom-file pb-3" style="margin-bottom: 50px !important;">
                                <input type="file"
                                       class="custom-file-input @error('js_certificate') is-invalid @enderror"
                                       id="exampleInputFile" aria-describedby="helpTextFile" name="js_certificate"
                                       value="{{old('js_certificate')}}"
                                       onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                                @error('js_certificate')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                                <label class="custom-file-label is-required" for="exampleInputFile">Screenshot for your
                                    Javascript certificate </label>
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
                        <li class="my-2">Go to https:coursat.orange.jo</li>
                        <li class="my-2">Sign up / Create an account</li>
                        <li class="my-2">Once you create your profile, go to “the below courses”</li>
                        <li class="my-2">Add the following 3 courses (and more if you like!):</li>
                        <div class="container marketing my-5">

                            <!-- Three columns of text below the carousel -->
                            <div class="card-deck mt-2">
                                <div class="card">
                                    <a href="https://coursat.orange.jo/course/view.php?id=7">
                                        <img src="https://coursat.orange.jo/pluginfile.php/47/course/overviewfiles/Artboard%2011.png" alt="HTML Development" class="card-img-top w-100"></a>
                                       <div class="card-body">
                                        <h4 class="card-title">
                                            <a class="" href="https://coursat.orange.jo/course/view.php?id=7">HTML Development</a>
                                        </h4>
                                           <p class="card-text">

                                            HTML, in full hypertext markup language,

                                            a formatting system for displaying material retrieved over the Internet. ... HTML markup tags specify document elements such as headings, paragraphs, and tables. They mark up a document for display by a computer program known as a Web browser.

                                       </p>
                                       </div>
                                </div>
                                <div class="card" data-courseid="8" data-type="1"><a
                                        href="https://coursat.orange.jo/course/view.php?id=8"><img
                                            src="https://coursat.orange.jo/pluginfile.php/48/course/overviewfiles/Artboard%2012.png"
                                            alt="CSS Development" class="card-img-top w-100"></a>
                                    <div class="card-body">
                                        <h4 class="card-title"><a class=""
                                                                  href="https://coursat.orange.jo/course/view.php?id=8">CSS
                                                Development</a></h4>
                                        <p class="card-text"></p>
                                        <div class="no-overflow">
                                            Cascading Style Sheets (CSS),

                                            Is a style sheet language used for describing the presentation of a document
                                            written in a markup language such as HTML.

                                        </div>
                                        <p></p></div>
                                </div>
                                <div class="card" data-courseid="5" data-type="1"><a
                                        href="https://coursat.orange.jo/course/view.php?id=5"><img
                                            src="https://coursat.orange.jo/pluginfile.php/45/course/overviewfiles/Artboard%2013.png"
                                            alt="JavaScript" class="card-img-top w-100"></a>
                                    <div class="card-body">
                                        <h4 class="card-title"><a class=""
                                                                  href="https://coursat.orange.jo/course/view.php?id=5">JavaScript</a>
                                        </h4>
                                        <p class="card-text"></p>
                                        <div class="no-overflow">

                                            JavaScript is a dynamic computer programming language.

                                            It is lightweight and most commonly used as a part of web pages, whose
                                            implementations allow client-side script to interact with the user and make
                                            dynamic pages. It is an interpreted programming language with
                                            object-oriented capabilities.

                                        </div>
                                        <p></p></div>
                                </div>
                            </div>
                        </div>
                        <li class="my-2"> Once you have completed the courses, please upload the three certicates </li>
                    </ol>
                    <p>If you have any questions or concerns regarding completing of  courses, please contact
                        us on the following email:

                        <a href="mailto:codingacademy.ojo@orange.com">codingacademy.ojo@orange.com</a> .</p>
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
