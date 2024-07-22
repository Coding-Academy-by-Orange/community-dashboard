@extends('layouts.admin')
@section('title')
    Applicants
@endsection
@section('main')
    <div class="container my-5">
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="display-3">Applicants</h3>
                    </div>
                </div>
                <div class="col-2 ">
                    <div class="mt-1">
                        <div class="rounded d-flex flex-wrap">
                            <div class="dtsp-verticalPanes"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 app-content content ml-0">
                    <div class="content-wrapper">
                        <div class="content-header row">
                        </div>
                        <div class="content-body">
                            <section class="basic-datatable">
                                <div class="users-list-table">
                                    <div class="container table-responsive">
                                        <table id="table" class="table-sm zero-configuration table table-striped">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Father Name</th>
                                                <th>Grandfather Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Birthdate</th>
                                                <th>Gender</th>
                                                <th>Major Study</th>
                                                <th>Employment Status</th>
                                                <th>Technologies</th>
                                                <th>Other Technologies</th>
                                                <th>Reason to Join</th>
                                                <th>Availability</th>
                                                <th>Affordability</th>
                                                <th>Program</th>
                                                <th>Academic Year</th>
                                                <th>University</th>
                                                <th>Other Major</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Registration ID</th>
                                                <th>Nationality</th>
                                                <th>Governorate</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($users as $user)
                                                <tr role="row">
                                                    <td class="sorting_1">{{ $user->id }}</td>
                                                    <td class="text-capitalize">{{ $user->first_name }}</td>
                                                    <td>{{ $user->father_name }}</td>
                                                    <td>{{ $user->grandfather_name }}</td>
                                                    <td>{{ $user->last_name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->mobile }}</td>
                                                    <td>{{ $user->birthdate }}</td>
                                                    <td>{{ $user->gender }}</td>
                                                    <td>{{ $user->major_study }}</td>
                                                    <td>{{ $user->employment_status }}</td>
                                                    <td>{{ $user->technologies }}</td>
                                                    <td>{{ $user->other_technologies }}</td>
                                                    <td>{{ $user->reason_to_join }}</td>
                                                    <td>{{ $user->availability }}</td>
                                                    <td>{{ $user->affordability }}</td>
                                                    <td>{{ $user->program }}</td>
                                                    <td>{{ $user->academic_year }}</td>
                                                    <td>{{ $user->university }}</td>
                                                    <td>{{ $user->other_major }}</td>
                                                    <td>{{ $user->status }}</td>
                                                    <td>{{ $user->created_at }}</td>
                                                    <td>{{ $user->updated_at }}</td>
                                                    <td>{{ $user->registration_id }}</td>
                                                    <td>{{ $user->nationality }}</td>
                                                    <td>{{ $user->governorate }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer dropdown-toggle" data-bs-toggle="dropdown"></span>
                                                            <div class="dropdown-menu">
                                                                @if (Auth::guard('admin')->user()->is_super)
                                                                    <a class="dropdown-item" href="{{ route('fablab_users.delete', ['id' => $user->id]) }}">
                                                                        <i class="bx bx-edit-alt mr-1"></i>Delete
                                                                    </a>
                                                                @endif
                                                                <a class="dropdown-item" href="
                                                                        @if (Auth::guard('admin')->user()->component == 'digitalcenter') {{ route('admin.user.odc.show', $user->id) }}
                                                                        @elseif (Auth::guard('admin')->user()->component == 'fablab')
                                                                            {{ route('admin.user.fablab.show', $user->id) }}
                                                                        @elseif (Auth::guard('admin')->user()->component == 'bigbyorange')
                                                                            {{ route('admin.user.big.show', $user->id) }}
                                                                        @elseif (Auth::guard('admin')->user()->component == 'codingschool')
                                                                            {{ route('admin.user.codingschool.show', $user->id) }}
                                                                        @elseif (Auth::guard('admin')->user()->component == 'codingacademy')
                                                                            {{ route('admin.user.codingacademy.show', $user->id) }} @endif">
                                                                    <i class="bx bx-edit-alt mr-1"></i>Edit
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var table = $(".zero-configuration").DataTable({
                searchBuilder: true,
                searchPanes: {
                    columns: [5, 6, 7, 10, -3, -2]
                },
                deferRender: true,
                dom: 'Bfrtip',
                pageLength: 10,
                columnDefs: [{
                    targets: [5, 6, 7, 10, -3, -2],
                    searchPanes: {
                        show: true,
                        orthogonal: "searchpanes"
                    },
                    render: function(data, type) {
                        console.debug(type);
                        return type === "display" ? data : data;
                    }
                },
                    {
                        targets: [9], // Assuming birthdate is the 9th column
                        searchPanes: {
                            show: true,
                            orthogonal: 'searchpanes'
                        },
                        render: function(data, type, row, meta) {
                            if (type === 'searchpanes') {
                                var dateArray = data.split("-");
                                if (dateArray.length > 0) {
                                    return dateArray[0]; // Extracting the year from the date for filtering purposes
                                }
                                return data;
                            } else {
                                return data; // Returning the full date for other purposes
                            }
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
                        @if (Auth::guard('admin')->user()->component == 'fablab')
                    {
                        targets: [-4], // Assuming birthdate is the 9th column
                        visible: false,
                    },
                        @endif
                        @if (Auth::guard('admin')->user()->component == 'bigbyorange')
                    {
                        targets: [24, 25, -4, -5, -6, -7, -8], // Assuming birthdate is the 9th column
                        visible: false,
                    }
                    @endif
                ],
            });

            new $.fn.dataTable.Buttons(table, {
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
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
            $("div.dtsp-verticalPanes").append(table.searchPanes.container());
        });
    </script>
@endsection
