@extends('layouts.admin')
    @section('main')
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class=" col-12">
@if($registrations->count() > 0)
    <a class="btn btn-primary" href="{{route('registration.create')}}">Create new registration</a>
        <table class="table ">
            <tr>
                <th>Title</th>
                <th>Number</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            @foreach ($registrations as $registration)
                <tr>
                    <td>{{ $registration->registration_name }}</td>
                    <td>{{ $registration->cohort }}</td>
                    <td>{{$registration->start_date}}</td>
                    <td>{{$registration->end_date}}</td>
                    <td>{{ $registration->status }}</td>
                    <td>
                        <a href="{{ route('registration.edit', $registration->id) }}">Edit</a>
                        <a href="{{ route('registration.delete', $registration->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No registrations found</p><a href="{{route('registration.create')}}">Create new registration</a>
    @endif
                        </div>
                    </div>
        </section>
@endsection
