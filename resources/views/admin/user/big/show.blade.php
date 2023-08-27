@extends('layouts.admin')
@section('title')
    Show
@endsection
@section('main')
<div class="container">
    <h2>student Details</h2>
    <p>Name: {{ $student->name }}</p>
    <p>Email: {{ $student->email }}</p>
    <p>Status: {{ $student->status }}</p>
    
    <form action="{{ route('admin.user.big.changeStatus', $student->id) }}" method="POST">
        @csrf
        <label for="new_status">Change Status:</label>
        <select name="new_status" id="new_status">
            <option value="accepted">Accepted</option>
            <option value="pending">Pending</option>
            <option value="rejected">Rejected</option>
        </select>
        <button type="submit">Change Status</button>
    </form>
</div>
 


@endsection
