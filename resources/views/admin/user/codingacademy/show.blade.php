@extends('layouts.admin')
@section('title')
    Applicant
@endsection
@section('main')
    <div class="container">
        <h2>Student Details</h2>
        <div class="row">
            <div class="col-6">
                <p>Name: {{ $student->first_name }} {{ $student->second_name }} {{ $student->third_name }}
                    {{ $student->last_name }}</p>
                    <p>Arabic Name: {{ $student->ar_first_name }} {{ $student->ar_second_name }} {{ $student->ar_third_name }}
                        {{ $student->ar_last_name }}</p>
                <p>Email: {{ $student->email }}</p>
                <p>Phone: {{ $student->mobile }}</p>
                <p>Age: {{ $student->birthdate }}</p>
            </div>
            <div class="col-6">
                <p>Gender: {{ $student->gender }}</p>
                <p>Martial Status: {{ $student->martial_status }}</p>
                @if ($student->nationalty == 1)
                    <p>Nationality: Jordanian</p>
                @else
                    <p>Nationality: Non Jordanian</p>
                @endif
                <p>Country: {{ $student->country }}</p>
                @if ($student->nationality == 1)
                    <p>National ID: {{ $student->national_id }}</p>
                @else
                    <p>Passport Number : {{ $student->passport_number }}</p>
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <p>City: {{ $student->city }}</p>
                <p>Address: {{ $student->address }}</p>
                <p>Education: {{ $student->education }}</p>
                <p>Educational Status:{{$student->educational_status}}</p>
                <p>Field:{{$student->field}}</p>
                <p>Educational Background:{{$student->educational_background}}</p>
            </div>
            <div class="col-6">
                <p>AR Writing:{{$student->ar_writing}}</p>
                <p>AR Speaking:{{$student->ar_speaking}}</p>
                <p>EN Writing:{{$student->en_writing}}</p>
                <p>EN Speaking:{{$student->en_speaking}}</p>

            </div>
        </div><hr>
        <div class="row">
            <div class="col-6">
                <p>Relative #1 Name: {{ $student->fullName_1 }}</p>
                <p>Relative #1 Phone: {{ $student->relative_mobile_1 }}</p>
                <p>Relative #1 Relations: {{ $student->relative_relation_1 }}</p>
                <p>Relative #2 Name: {{ $student->fullName_2 }}</p>
                <p>Relative #2 Phone: {{ $student->relative_mobile_2 }}</p>
                <p>Relative #2 Relations: {{ $student->relative_relation_2 }}</p>
            </div>
            <div class="col-6">
                <p>is_committed	:{{$student->is_committed}}</p>
                <p>is_submitted:{{$student->is_submitted}}</p>
                <p>Academy Location:{{$student->academy_location}}</p>

            </div>
        </div>
        <hr>

        <form action="{{ route('admin.user.codingacademy.changeStatus', $student->id) }}" method="POST">
            @csrf
            <label for="new_status">Change Status:</label>
            <select name="new_status" id="new_status" class="form-control mb-3">
                <option value="accepted" @if ($student->status == 'accepted') selected @endif>Accepted</option>
                <option value="pending"@if ($student->status == 'pending') selected @endif>Pending</option>
                <option value="enrolled"@if ($student->status == 'enrolled') selected @endif>Enrolled</option>
                <option value="finall acceptance"@if ($student->status == 'finall acceptance') selected @endif>Finall Acceptance
                </option>
                <option value="rejected"@if ($student->status == 'rejected') selected @endif>Rejected</option>
            </select>
            <button type="submit" class="btn btn-primary glow mb-0">Change Status</button>
        </form>
    </div>
@endsection
