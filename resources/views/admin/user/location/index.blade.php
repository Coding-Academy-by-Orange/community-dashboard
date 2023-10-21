@extends('layouts.admin')
@section('title')
    Read Admins
@endsection
@section('main')
    <h1 class="text-center mb-3">Locations</h1>
    <div class="content-wrapper">
        <div class="content-body">
            <a href="{{ route('location.create') }}"><button type="button" class="btn btn-primary glow mr-1 mb-1"><i
                        class="bx bx-plus"></i>
                    <span class="align-middle ml-25">Add New Location </span></button></a>
            <!-- table success start -->
            <section id="table-success">
                <div class="card">
                    <!-- datatable start -->
                    <div class="table-responsive">
                        <table id="table-extended-success" class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Location</th>
                                    <th>Governorate</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($count = 0)
                                @foreach ($locations as $location)
                                    @php($count++)
                                    <tr>
                                        <td>{{ $count }} </td>
                                        <td class="text-capitalize">{{ $location->name }}</td>
                                        <td>{{ $location->governorate }}</td>
                                        <td><a href="{{ route('location.edit', $location) }}"
                                                class="btn btn-primary">Edit</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- datatable ends -->
                </div>
            </section>
            <!-- table success ends -->
        </div>
    </div>
@endsection
