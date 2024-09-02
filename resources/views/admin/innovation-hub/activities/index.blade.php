@extends('layouts.innovation-hub.admin')
@section('title', 'Manage Applicants')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title
                        ">Manage Activities</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>Activity Name</th>
                                    <th>Location</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($activities as $activity)
                                    <tr>
                                        <td>{{ $activity->name }}</td>
                                        <td>{{ $activity->location->name }}</td>
                                        <td>{{ $activity->start_date }}</td>
                                        <td>{{ $activity->end_date }}</td>
                                        <td>
                                            <a href="{{ route('admin.innovation-hub.activities.edit', $activity->id) }}"
                                               class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('admin.innovation-hub.activities.delete', $activity->id) }}"
                                               class="btn btn-danger btn-sm">Delete</a>
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
    </div>
@endsection
