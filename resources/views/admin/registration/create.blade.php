@extends('layouts.admin')
@section('main')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class=" col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title
                        ">Create New Registration</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('registration.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 col-12">
                                    <label for="registration_name" class="is-required">Registration Name<span class="sr-only">
                                            (required)</span></label>
                                    <input name="registration_name" required type="text"
                                        class="form-control @error('registration_name') is-invalid @enderror " id="registration_name"
                                        value="{{ old('registration_name') }}">
                                    @if ($errors->has('registration_name'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('registration_name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group
                            ">
                                <label for="registration_description" class="is-required">Registration Description<span class="sr-only">
                                        (required)</span></label>
                                <textarea name="registration_description" required
                                    class="form-control @error('registration_description') is-invalid @enderror " id="registration_description"
                                    rows="3">{{ old('registration_description') }}</textarea>
                                @if ($errors->has('registration_description'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('registration_description') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group
                            ">
                                <label for="status" class="is-required">Registration Status<span class="sr-only">
                                        (required)</span></label>
                                <select name="status" required
                                    class="form-control @error('status') is-invalid @enderror " id="status">
                                    <option value="Active" @if (old('status') == 'Active') selected @endif>Active</option>
                                    <option value="Inactive" @if (old('status') == 'Inactive') selected @endif>Inactive</option>
                                </select>
                                @if ($errors->has('registration_status'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('registration_status') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group
                            ">
                                <label for="type" class="is-required">Registration Type<span class="sr-only">
                                        (required)</span></label>
                                <select name="type" required
                                    class="form-control @error('type') is-invalid @enderror " id="type">
                                    <option value="cohort" @if (old('type') == 'Cohort') selected @endif>Cohort</option>
                                    <option value="workshop" @if (old('type') == 'WorkShop') selected @endif>Workshop</option>
                                    <option value="internship" @if (old('type') == 'WorkShop') selected @endif>Internship</option>
                                    <option value="training" @if (old('type') == 'WorkShop') selected @endif>Training</option>
                                </select>
                                @if ($errors->has('registration_type'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('registration_type') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group
                            ">
                                <label for="cohort_number" class="is-required">Registration Cohort<span class="sr-only">
                                        (required)</span></label>
                                <input name="cohort_number" required type="number" class="form-control @error('cohort') is-invalid @enderror "
                                    id="registration_cohort" value="{{ old('cohort') }}">
                                @if ($errors->has('cohort'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('cohort') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-12">
                                    <label for="start_date" class="is-required">Registration Start Date<span class="sr-only">
                                            (required)</span></label>
                                    <input name="start_date" required type="date"
                                        class="form-control @error('registration_start_date') is-invalid @enderror " id="registration_start_date"
                                        value="{{ old('start_date') }}">
                                    @if ($errors->has('start_date'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('registration_start_date') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6 col-12">
                                    <label for="end_date" class="is-required">Registration End Date<span class="sr-only">
                                            (required)</span></label>
                                    <input name="end_date" required type="date"
                                        class="form-control @error('end_date') is-invalid @enderror " id="end_date"
                                        value="{{ old('end_date') }}">
                                    @if ($errors->has('end_date'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('end_date') }}
                                        </div>
                                    @endif
                                    <input type="submit" class="btn btn-primary mt-2" value="Create Registration">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
