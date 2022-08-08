@extends('layouts.admin')
@section('main')
    <script src="https://cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>

    <!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-2 col-12 "></div>
        <div class="col-md-6 col-12">
            <div class="card" >
                <div class="card-header">
                    <h4 class="card-title">Create New Notification</h4>
                </div>
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{route('notifications.store')}}" >
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-6">
                                    <label for="sent_to">Send to </label>
                                    <select class="custom-select @error('sent_to') is-invalid @enderror" id="sent_to" name="sent_to">
                                        <option selected="" value="">Choose..</option>
                                        <option value="submitted">Fully Submit</option>
                                        <option value="in_progress">Partial Submit</option>
                                        <option value="accepted">Accepted</option>
                                        <option value="maybe">Maybe</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                    @error('sent_to')
                                    <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="sent_via">Send via </label>
                                    <select class="custom-select @error('sent_via') is-invalid @enderror" id="sent_via" name="sent_via">
                                        <option selected="" value="">Choose..</option>
                                        <option value="email">Email</option>
                                        <option value="sms">SMS</option>
                                    </select>
                                    @error('sent_via')
                                    <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-icon">Notification Body</label>
                                        <div class="position-relative has-icon-left">
                                            <textarea name="body" id="applicatns" class="form-control @error('body') is-invalid @enderror" rows="6">{{ old('body') }}</textarea>
                                            @error('body')
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
    <script>
        CKEDITOR.replace( 'body' );
    </script>
@endsection

