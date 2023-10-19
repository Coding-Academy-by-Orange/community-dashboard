@extends('layouts.admin')
@section('main')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class=" col-4">
                <div>
                    <h4 class="card-title">Activities</h4>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{ route('activity.create') }}">Add Activity </a>
                </div>
                <div class="dtsp-verticalPanes"></div>
            </div>
            <div class="col-8">
                <div class="container table-responsive">
                    <table class="table-sm activity-table table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image </th>
                                <th>name</th>
                                <th>type</th>
                                <th>start date</th>
                                <th>end date</th>
                                <th>publish date</th>
                                <th>location</th>
                                <th>cohort</th>
                                <th>timeline</th>
                                <th>creator</th>
                                <th>creation date</th>
                                <th>action</th>
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
                                            <div id="activityCarousel-{{ $activity->id }}" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach ($imageArray as $index => $imagePath)
                                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                            <img src="{{ asset('storage/image/' . $imagePath) }}"
                                                                class="w-100" width="30" height="30"
                                                                alt="{{ $activity->activity_name }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <img src="{{ asset('storage/image/' . $imageArray[0]) }}" class="w-100"
                                                width="30" height="30" alt="{{ $activity->activity_name }}">
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
                                    <td class="sorting_1">{{ $activity->admin->fname ? $activity->admin->fname : '-' }}
                                        {{ $activity->admin->lname ? $activity->admin->lname : '-' }}</td>
                                    <td>{{ $activity->created_at }}</td>
                                    <td><a href="{{ route('activity.show', $activity) }}" class="btn btn-primary">See More</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var table = $(".activity-table").DataTable({

                searchBuilder: {
                    columns: ':visible',
                },
                searchPanes: true,
                deferRender: true,
                dom: 'Bfrtip',
                pageLength: 10,
                columnDefs: [{
                        targets: [3, 4, 5, 6, 7, 8, 9],
                        searchPanes: {
                            show: true,
                            orthogonal: "searchpanes"
                        },
                        render: function(data, type) {
                            console.debug(type);
                            return type === "display" ?
                                data :
                                data;
                        }
                    },

                    {
                        targets: [-2],

                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                return moment(data, 'YYYY-MM-DD HH:mm:ss').format('YYYY-MM-DD');
                            } else {
                                return data; // Returning the full date for other purposes
                            }
                        }
                    },

                ],

            });
            //hiii
            new $.fn.dataTable.Buttons(table, {
                buttons: [{
                        extend: 'copy',
                        exportOptions: {
                            columns: ':not(:last-child)' // Exclude the last column from export
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':not(:last-child)' // Exclude the last column from export
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':not(:last-child)' // Exclude the last column from export
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':not(:last-child)' // Exclude the last column from export
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':not(:last-child)' // Exclude the last column from export
                        }
                    }
                ]
            });
            new $.fn.dataTable.SearchBuilder(table, {

                searchBuilder: {
                    columns: ':visible',
                },
                buttons: [{

                        columns: ':not(.noVis)'
                    },
                    {
                        extend: 'searchBuilder',
                        config: {
                            depthLimit: 2
                        }
                    }
                ],
                language: {
                    searchBuilder: {
                        button: 'Filter',
                        condition: 'Comparator',
                        data: 'Column',
                    }
                }
            });


            table.buttons().container().appendTo(table.table().container());
            table.searchBuilder.container().prependTo(table.table().container());
            // Append searchPanes container
            $("div.dtsp-verticalPanes").append(table.searchPanes.container());

        });
    </script>
@endsection
