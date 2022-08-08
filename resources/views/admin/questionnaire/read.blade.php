@extends('layouts.admin')
@section('title')
    Questionnaire
@endsection
@section('main')
    <h1 class="text-center mb-3">Questionnaires </h1>
    <div class="content-wrapper">
        <div class="content-body">
            <a href="{{route('questionnaires.create')}}" style="text-decoration: none"><button type="button" class="btn btn-primary glow mr-1 mb-1"><i class="bx bx-plus mb-1"></i>
                    <span class="align-middle ml-25">Add New Questionnaire </span></button></a>
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
                                            <th>Questionnaire</th>
                                            <th>Created At</th>
{{--                                            <th>Is Published</th>--}}
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($count=0)
                                        @foreach($questionnaires as $questionnaire )
                                            @php($count++)
                                            <tr>
                                                <td class="text-bold-600 pr-0 ">{{$count}} </td>
                                                <td>{{$questionnaire->questionnaire}}</td>
                                                <td>{{$questionnaire->created_at->format('d.M.y ')}}</td>
{{--                                                <td class="text-bold-600 ">--}}
{{--                                                    @if( $questionnaire->is_published == 1 )--}}
{{--                                                        <i class="text-bold-600 bx bx-check "--}}
{{--                                                           style="color:limegreen"></i>--}}
{{--                                                    @else--}}
{{--                                                        <i class="text-bold-600 bx bx-x " style="color:red"></i>--}}
{{--                                                    @endif--}}
{{--                                                </td>--}}
                                                <td>
                                                    <a href="{{ route('questionnaires.edit',$questionnaire->id) }}">
                                                        <i class="bx bx-edit-alt"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('questionnaires.destroy',$questionnaire->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="#">
                                                            <i class="bx bx-delete-alt"></i>
                                                        </a>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
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
