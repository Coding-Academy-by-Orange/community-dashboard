@extends('layouts.admin')
@section('title')
    Applicant
@endsection
@section('main')
    <div class="container">
        <h2>Student Details</h2>
        <div class="row">
            <div class="col-6">
                <p>Name: {{ $student->full_name }}</p>
                <p>Email: {{ $student->email }}</p>
                <p>Phone: {{ $student->phone_number }}</p>
                
               
            </div>
            <div class="col-6">
                <p>Age: {{ $student->age }}</p>
                <p>Gender: {{ $student->gender }}</p>
                <p>Residence: {{ $student->residence }}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
               
                <p>Education: {{ $student->education }}</p>
                <p>Major Study: {{ $student->specialization }}</p>
                <p>Have Disability: {{ $student->disability ? 'Yes' : 'No' }}</p>
                <p>Disability Type: {{ $student->disability_type ? $student->disability_type : 'N/A' }}</p>
            </div>
          
        </div>
        <hr>

        <form action="{{ route('admin.user.fiberacademy.changeStatus', $student->id) }}" method="POST">
            @csrf
            <label for="new_status">Change Status:</label>
            <select name="new_status" id="new_status" class="form-control mb-3">
                <option value="accepted" @if ($student->status == 'accepted') selected @endif>Accepted</option>
                <option value="pending"@if ($student->status == 'pending') selected @endif>Pending</option>
                <option value="rejected"@if ($student->status == 'rejected') selected @endif>Rejected</option>
            </select>
            <button type="submit" class="btn btn-primary glow mb-0">Change Status</button>
        </form>
    </div>
@endsection
