@extends('layouts.client')
@section('title') Questionnaire @endsection
@section('links')

@endsection
@section('main')

    <main role="main" id="content" class="container mt-3">
    <h1>Questionnaire Section </h1>

    <form class="row" action="{{ route('answers.store') }}" id="PostAdminEditForm" method="POST" accept-charset="utf-8">
        @csrf
        <div class="col-12 col-lg-4 mt-4 ">
            <h3>{{$questionnaire->questionnaire}}</h3>
        </div>
        <div class="col-12 col-lg-8">
            <div class="form-group required">
                <label for="PostContent" class="is-required">Your Answer: </label>
                <textarea name="answer" class="form-control  @error('answer') is-invalid @enderror" cols="30" rows="10" id="PostContent">{{$answer}}{{old('answer')}}</textarea>
                @error('answer')
                <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                @enderror
            </div>
            <input type="hidden" value="{{$questionnaire->id}}" name="questionnaire_id">
            <div class="submit mt-2 d-flex justify-content-end">
                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
            </div>
        </div>
    </form>
    </main>
@endsection
