@extends('layouts.admin')
@section('main')
    <!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-2 col-12 "></div>
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <h6><small class="text-muted">Send To: </small></h6>
                            <p>{{$notification->sent_to}}</p>
                        </div>
                        <div class="col-sm-6 col-12">
                            <h6><small class="text-muted">Sent Via:</small></h6>
                            <p>{{$notification->sent_via}}</p>
                        </div>
                        <div class="col-sm-6 col-12">
                            <h6><small class="text-muted">Sent by Admin:</small></h6>
                            <p>{{$notification->admin->fname}}</p>
                        </div>
                        <div class="col-sm-6 col-12">
                            <h6><small class="text-muted">Date:</small></h6>
                            <p>{{$notification->created_at->format('d.M.y')}}</p>
                        </div>
                        <div class="col-12">
                            <h6><small class="text-muted">Notification Body:</small></h6>
                            <p>{{$notification->body}}</p>
                        </div>
                    </div>
                    <button class="btn btn-lg d-none d-sm-block float-right btn-light-primary mb-2" onclick="history.back(-1)">
                        <i class="cursor-pointer bx bx-arrow-back  mr-50"></i><span>Back</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Horizontal form layout section end -->
@endsection
