@extends('layouts.admin')
@section('title')
    Questionnaire
@endsection
@section('main')
    <h1 class="text-center mb-3">Notifications </h1>
    <div class="content-wrapper">
        <div class="content-body">
            <a href="{{route('notifications.create')}}" style="text-decoration: none"><button type="button" class="btn btn-primary glow mr-1 mb-1"><i class="bx bx-plus mb-1"></i>
                    <span class="align-middle ml-25">Send New Notification </span></button></a>
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Questionnaires Table </h4>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration text-center">
                                        <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Sent to</th>
                                            <th>Sent via</th>
                                            <th>Sent date</th>
                                            <th>Admin</th>
                                            <th>Show</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($count=0)
                                        @foreach($notifications as $notification )
                                            @php($count++)
                                            <tr>
                                                <td class="text-bold-600 pr-0 ">{{$count}} </td>
                                                <td>{{$notification->sent_to}}</td>
                                                <td>{{$notification->sent_via}}</td>
                                                <td>{{$notification->created_at->format('d.M.y')}}</td>
                                                <td>{{$notification->admin->fname}}</td>
                                                <td>
                                                    <a href="{{ route('notifications.show',$notification->id) }}">
                                                        <i class="bx bx-show"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
