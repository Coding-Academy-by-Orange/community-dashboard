@extends('layouts.admin')
@section('title')
    Activities
@endsection
@section('main')
    <div class="container my-5">
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="display-3">Activities</h3>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('activity.create') }}">Add Activity</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table-sm activity-table table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Publish Date</th>
                                <th>Location</th>
                                <th>Cohort</th>
                                <th>Timeline</th>
                                <th>Creator</th>
                                <th>Creation Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($activities as $activity)
                                <tr role="row">
                                    <td class="sorting_1">{{ $activity->id }}</td>
                                    @php
                                        $imageArray = json_decode($activity->image);
                                    @endphp
                                    <td>
                                        @if (is_array($imageArray) && count($imageArray) > 1)
                                            <div id="activityCarousel-{{ $activity->id }}" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach ($imageArray as $index => $imagePath)
                                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                            <img src="{{ asset('storage/image/' . $imagePath) }}" class="w-100" width="30" height="30" alt="{{ $activity->activity_name }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <img src="{{ asset('storage/image/' . $imageArray[0]) }}" class="w-100" width="30" height="30" alt="{{ $activity->activity_name }}">
                                        @endif
                                    </td>
                                    <td class="text-capitalize">{{ $activity->activity_name }}</td>
                                    <td>{{ $activity->activity_type }}</td>
                                    <td>{{ $activity->start_date ? $activity->start_date : '-' }}</td>
                                    <td>{{ $activity->end_date ? $activity->end_date : '-' }}</td>
                                    <td>{{ $activity->publication_date ? $activity->publication_date : '-' }}</td>
                                    <td class="sorting_1">{{ $activity->location->name }}</td>
                                    <td>{{ $activity->cohort ? $activity->cohort : '-' }}</td>
                                    <td class="sorting_1">{{ $activity->timeline }}</td>
                                    <td class="sorting_1">{{ $activity->admin->fname ? $activity->admin->fname : '-' }} {{ $activity->admin->lname ? $activity->admin->lname : '-' }}</td>
                                    <td>{{ $activity->created_at }}</td>
                                    <td><a href="{{ route('activity.show', $activity) }}" class="btn btn-primary btn-sm">See More</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var table = $(".activity-table").DataTable({
                searchBuilder: true,
                searchPanes: {
                    columns: [2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                columnDefs: [
                    {
                        targets: [-2],
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                return moment(data, 'YYYY-MM-DD HH:mm:ss').format('YYYY-MM-DD');
                            } else {
                                return data; // Returning the full date for other purposes
                            }
                        }
                    }
                ]
            });

            table.buttons().container().appendTo(table.table().container());
            table.searchBuilder.container().prependTo(table.table().container());
            $("div.dtsp-verticalPanes").append(table.searchPanes.container());
        });
    </script>
@endsection
