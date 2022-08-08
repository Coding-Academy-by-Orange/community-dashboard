@extends('layouts.admin')
@section('main')
<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-2 col-12 "></div>
        <div class="col-md-6 col-12">
            <div class="card" >
                <div class="card-header">
                    <h4 class="card-title">Update The Questionnaire</h4>
                </div>
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{route('questionnaires.update', $questionnaire->id )}}" >
                        @csrf
                        @method('PATCH')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-icon">Edit the Questionnaire </label>
                                        <div class="position-relative has-icon-left">
                                            <textarea name="questionnaire" class="form-control @error('questionnaire') is-invalid @enderror" rows="6">{{ $questionnaire->questionnaire }}</textarea>
                                            @error('questionnaire')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="reset" class="btn btn-secondary mr-1">Reset</button>
                                    <button type="submit" class="btn btn-primary ">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Horizontal form layout section end -->
@endsection
