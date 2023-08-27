@extends('layouts.admin')
@section('title')
    Show
@endsection
@section('main')
    <div class="container">
        <h2>Student Details</h2>
        <div class="row">
            <div class="col-6">
                <p>Name: {{ $student->first_name }} {{ $student->father_name }} {{ $student->grandfather_name }}
                    {{ $student->last_name }}</p>
                <p>Email: {{ $student->email }}</p>
                <p>Phone: {{ $student->mobile }}</p>
                <p>WhatsApp: {{ $student->whatsapp }}</p>
            </div>
            <div class="col-6">
                <p>Age: {{ $student->age }}</p>
                <p>Gender: {{ $student->gender }}</p>
                @if ($student->other_nationalty == null)
                    <p>Nationality: {{ $student->nationality }}</p>
                    @if ($student->nationality == 'Jordanian')
                        <p>National ID: {{ $student->national_id }}</p>
                    @endif
                @else
                    <p>Nationality: {{ $student->other_nationalty }}</p>
                    <p>Passport Number : {{ $student->passport_number }}</p>
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <p>Residence: {{ $student->residence }}</p>
                <p>Education: {{ $student->education }}</p>
                <p>Employment: {{ $student->employment }}</p>
                <p>Major Study: {{ $student->major_study }}</p>
            </div>
            <div class="col-6">
                <p>Affiliation: {{ $student->affiliation }}</p>
                <p>Idea Description: {{ $student->idea_description }}</p>
               
            </div>
        </div>
        <hr>

        <form action="{{ route('admin.user.fablab.changeStatus', $student->id) }}" method="POST">
            @csrf
            <label for="new_status">Change Status:</label>
            <select name="new_status" id="new_status" class="form-control mb-3">
                <option value="accepted" @if ($student->status == 'accepted') selected @endif>Accepted</option>
                <option value="pending"@if ($student->status == 'pending') selected @endif>Pending</option>
                <option value="rejected"@if ($student->status == 'rejected') selected @endif>Rejected</option>
            </select>
            <button type="submit">Change Status</button>
        </form>
    </div>



@endsection
