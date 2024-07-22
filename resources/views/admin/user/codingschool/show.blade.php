@extends('layouts.admin')
@section('title')
    Applicant
@endsection
@section('main')
    <div class="container">
        <h2>Student Details</h2>
        <div class="row">
            <div class="col-6">
                <p>Name: {{ $student->first_name }} {{ $student->father_name }} {{ $student->grandfather_name }} {{ $student->last_name }}</p>
                <p>Email: {{ $student->email }}</p>
                <p>Mobile: {{ $student->mobile }}</p>
                <p>Birthdate: {{ $student->birthdate }}</p>
                <p>Gender: {{ $student->gender }}</p>
                <p>Major Study: {{ $student->major_study }}</p>
                <p>Employment Status: {{ $student->employment_status }}</p>
                <p>Technologies: {{ $student->technologies }}</p>
                <p>Other Technologies: {{ $student->other_technologies }}</p>
            </div>
            <div class="col-6">
                <p>Reason to Join: {{ $student->reason_to_join }}</p>
                <p>Availability: {{ $student->availability }}</p>
                <p>Affordability: {{ $student->affordability }}</p>
                <p>Program: {{ $student->program }}</p>
                <p>Academic Year: {{ $student->academic_year }}</p>
                <p>University: {{ $student->university }}</p>
                <p>Other Major: {{ $student->other_major }}</p>
                <p>Status: {{ $student->status }}</p>
                <p>Created At: {{ $student->created_at }}</p>
                <p>Updated At: {{ $student->updated_at }}</p>
                <p>Registration ID: {{ $student->registration_id }}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                @if ($student->other_nationalty == null)
                    <p>Nationality: {{ $student->nationality }}</p>
                    @if ($student->nationality == 'Jordanian')
                        <p>National ID: {{ $student->national_id }}</p>
                    @endif
                @else
                    <p>Nationality: {{ $student->other_nationalty }}</p>
                    <p>Passport Number : {{ $student->passport_number }}</p>
                @endif
                <p>Governorate: {{ $student->governorate }}</p>
            </div>
        </div>
        <hr>
        <form action="{{ route('admin.user.codingschool.changeStatus', $student->id) }}" method="POST">
            @csrf
            <label for="new_status">Change Status:</label>
            <select name="new_status" id="new_status" class="form-control mb-3">
                <option value="accepted" @if ($student->status == 'accepted') selected @endif>Accepted</option>
                <option value="pending" @if ($student->status == 'pending') selected @endif>Pending</option>
                <option value="enrolled" @if ($student->status == 'enrolled') selected @endif>Enrolled</option>
                <option value="final acceptance" @if ($student->status == 'final acceptance') selected @endif>Final Acceptance</option>
                <option value="rejected" @if ($student->status == 'rejected') selected @endif>Rejected</option>
            </select>
            <button type="submit" class="btn btn-primary glow mb-0">Change Status</button>
        </form>
    </div>
@endsection
