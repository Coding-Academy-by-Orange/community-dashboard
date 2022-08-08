@extends('layouts.admin')
@section('main')
    <!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-2 col-12 "></div>
        <div class="col-md-6 col-12">
            <div class="card" >
                <div class="card-header">
                    <h4 class="card-title">Create New Questionnaire</h4>
                </div>
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{route('questionnaires.store')}}" >
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-icon">Write your Questionnaire </label>
                                        <div class="position-relative has-icon-left">
                                            <textarea name="questionnaire" class="form-control @error('questionnaire') is-invalid @enderror" rows="6">{{ old('questionnaire') }}</textarea>
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
