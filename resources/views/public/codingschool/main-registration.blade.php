@extends('layouts.app')
@section('main')
    <div class="container my-lg-5">
        <div class="row">
            @foreach($component_registration as $registration)
                <div class="col-md-4  mb-3">
                    @if($registration->type == 'workshop')
                        <a href="/coding-school/register/workshop/{{$registration->id}}" class="card o-card-link" id="connexion">
                            @elseif($registration->type == 'internship')
                                <a href="/coding-school/register/internship/{{$registration->id}}" class="card o-card-link" id="connexion">
                                @elseif($registration->type == 'training')
                                    <a href="/coding-school/register/training/{{$registration->id}}" class="card o-card-link" id="connexion"
                            @endif
                        <div class="card-img">
                            <img class="img-fluid" src="{{asset('/assets/img/coding-school.png')}}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <div class="card-title
                            ">{{$registration->registration_name}}</div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-md-4  mb-3">
                <a href="" class="card o-card-link" id="connexion">
                    <div class="card-img">
                        <img class="img-fluid" src="{{asset('/assets/img/coding-school.png')}}" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <div class="card-title">Internship Registration</div>
                    </div>
                </a>
            </div>
            <div class="col-md-4  mb-3">
                <a href="" class="card o-card-link" id="connexion">
                    <div class="card-img">
                        <img class="img-fluid" src="{{asset('/assets/img/coding-school.png')}}" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <div class="card-title">Training Registration</div>
                    </div>
                </a>
            </div>
            <div class="col-md-4  mb-3">
                <a href="" class="card o-card-link" id="connexion">
                    <div class="card-img">
                        <img class="img-fluid" src="{{asset('/assets/img/coding-school.png')}}" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <div class="card-title">Workshop Registration</div>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection
