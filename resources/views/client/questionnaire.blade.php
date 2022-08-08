@extends('layouts.client')
@section('title') Questionnaire @endsection
@section('links')

@endsection
@section('main')
<style>
@media screen and (max-width: 600px) {
  .o-footer{
    visibility: hidden;
    display: none;
  }
}
</style>
    <div class="getCodeModal modal"  tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Submit your answers</h5>
                    <!-- Boosted mod: using visually hidden text instead of aria-label -->
                    <button type="button" class="close" data-dismiss="modal">
                        <span class="sr-only">Close static modal demo</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Submit your answers?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="redirect">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <main role="main" id="content" class="container ">
        <div class="row d-flex justify-content-between ">
            <nav role="navigation" aria-labelledby="breadcrumb-intro-2 " class="col-12">
                <p class="sr-only" id="breadcrumb-intro-2">You are here:</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('client.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="location">Questionnaire</li>
                </ol>
            </nav>
            <h1 class="mt-3 col-12">Questionnaire Section</h1>
            <div class="p-3 error-alert col-12" hidden>
                <div class="alert alert-lg alert-danger alert-dismissible fade show mb-0" role="alert">
                    <span class="alert-icon"><span class="sr-only">Danger</span></span>
                    <div>
                        <h4 class="alert-heading">Some fields are empty!</h4>
                        <p>Please fill all fields before submission</p>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span class="sr-only">Close alert message</span>
                    </button>
                </div>
            </div>
            <div class="p-3 error-success col-12" hidden>
                <div class="alert alert-lg alert-success alert-dismissible fade show mb-0" role="alert">
                    <span class="alert-icon"><span class="sr-only">Success</span></span>
                    <div>
                        <h4 class="alert-heading">Your Answers have been Saved Successfully!  <a href="{{route('client.dashboard')}}">Back to Home Page</a> </h4>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span class="sr-only">Close alert message</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-12">
                <form class="row mb-4 QuestionnaireAnswer" method="POST" action="javascript:void(0)"
                      accept-charset="utf-8">
                    @csrf
                    @foreach($questionnaires as $questionnaire)
                        <hr class="col-lg-12 mb-5">
                        <div class="col-12 col-lg-4 ">
                            <h4>{{$questionnaire->questionnaire}}</h4>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="form-group required">
                                <textarea name="answer[]" class="form-control"
                                          cols="30" rows="10"

                                >
@if(DB::table('questionnaire_user')->where('user_id', auth()->id())->where('questionnaire_id', $questionnaire->id)->exists()){{DB::table('questionnaire_user')->where('user_id', auth()->id())->where('questionnaire_id', $questionnaire->id)->first()->answer}}@else{{''}}@endif
</textarea>
                            </div>
                            <input type="hidden" value="{{$questionnaire->id}}" name="questionnaire_id[]">

                        </div>

                        @error('answer[]')
                            {{$message}}
                        @enderror

                    @endforeach
                    <div class="col-12 submit my-2 d-flex justify-content-end">
                        <button class="btn btn-primary questionnaire-submit" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script>
        $(".questionnaire-submit").on("click", function () {
            $.ajax({
                url: "{{ route('answers.store')}}",
                type: "POST",
                data: $('.QuestionnaireAnswer').serialize(),
                success: function (res) {
                    window.scrollTo(500,0);
                    $(".error-success").removeAttr('hidden');
                },
                error: function (err) {
                    window.scrollTo(500,0);
                    $(".error-alert").removeAttr('hidden');
                }
            })
        });
        document.getElementById("redirect").onclick = function () {
            location.href = "{{ route('client.dashboard') }}";
        };
    </script>
@endsection
