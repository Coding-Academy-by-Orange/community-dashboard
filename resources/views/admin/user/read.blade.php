@extends('layouts.admin')
@section('title')
    Applicants
@endsection
@section('main')
    <div class="d-md-flex flex-md-equal w-100">
        <div class="col-lg-4 mt-1">
            <div class="mt-1 ">
                <div class="rounded d-flex flex-wrap">
                    <div class="dtsp-verticalPanes"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 app-content content ml-0">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <!-- users list start -->
                    <section class="basic-datatable">
                        <div class="users-list-table">
                            <!-- datatable start -->
                            <div class="container table-responsive">
                                <table id="table" class=" table-sm zero-configuration table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Father Name</th>
                                            <th>Grandfather Name</th>
                                            <th>last Name</th>
                                            <th>Gender</th>
                                            <th>Nationality</th>
                                            <th>Education</th>
                                            <th>Major Study</th>
                                            <th>Birthdate</th>
                                            <th>Residence/City</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Employment</th>
                                            @if (Auth::guard('admin')->user()->component === 'fablab')
                                                <th>Affiliation</th>
                                                <th>Program</th>
                                                <th>Idea Description</th>
                                            @elseif(Auth::guard('admin')->user()->component === 'codingacademy')
                                                <th>Country</th>
                                                <th>Ar First Name</th>
                                                <th>Ar Father Name</th>
                                                <th>Ar Grandfather Name</th>
                                                <th>Ar last Name</th>
                                                <th>Martial Status</th>
                                                <th>Educational Status</th>
                                                <th>Educational Background</th>
                                                <th>AR Writing</th>
                                                <th>AR Speaking</th>
                                                <th>EN Writing</th>
                                                <th>EN Speaking</th>
                                                <th>Address</th>
                                                <th>Relative #1 name</th>
                                                <th>Relative #1 relation</th>
                                                <th>Relative #1 mobile</th>
                                                <th>Relative #2 name</th>
                                                <th>Relative #2 relation</th>
                                                <th>Relative #2 mobile</th>
                                                <th>is_committed</th>
                                                <th>is_submitted</th>
                                                <th>Academy Location</th>
                                            @elseif(Auth::guard('admin')->user()->component == 'digitalcenter')
                                                <th>Whatsapp</th>
                                                <th>Center </th>
                                                <th>Obstacles</th>
                                                <th>Type Of Obstacles</th>
                                                <th>Programming</th>
                                            @elseif(Auth::guard('admin')->user()->component == 'bigbyorange')
                                                <th>Linkedin Profile</th>
                                                <th>Person With Disability</th>
                                                <th>Male Co_Founders</th>
                                                <th>Female Co_Founders</th>
                                                <th>Position</th>
                                                <th>Provide Of Position</th>
                                                <th>Startup</th>
                                                <th>Startup Name</th>
                                                <th>Website</th>
                                                <th>Social Media</th>
                                                <th>Problem </th>
                                                <th>Solution</th>
                                                <th>MVP Demo</th>
                                                <th>Startup Registered</th>
                                                <th>Registration number</th>
                                                <th>startup serve</th>
                                                <th>Funds</th>
                                                <th>Source Funds</th>
                                                <th>Amount of Funds </th>
                                                <th>New Funds</th>
                                                <th>Markets</th>
                                                <th>Revenue</th>
                                                <th>Achievements</th>
                                                <th>Describe the Effect</th>
                                                <th>Business Opportunities</th>
                                                <th>Specify Units</th>
                                                <th>Expectations</th>
                                            @endif
                                            <th>Status</th>
                                            <th>created_at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($count = 0)
                                        @endphp
                                        @foreach ($users as $user)
                                            <tr role="row">
                                                @php($count++)
                                                @endphp
                                                <td class="sorting_1">{{ $user->id }}</td>
                                                <td class="text-capitalize">{{ $user->first_name }}</td>
                                                <td> {{ $user->father_name }} {{ $user->second_name }}
                                                </td>
                                                <td> {{ $user->grandfather_name }} {{ $user->third_name }}
                                                </td>
                                                <td> {{ $user->last_name }}
                                                </td>
                                                <td calss="sorting_1">{{ $user->gender }}</td>
                                                <td>{{ $user->nationality }}</td>
                                                <td calss="sorting_1">{{ $user->education }}</td>
                                                <td>{{ $user->major_study }} {{ $user->field }}</td>
                                                <td calss="sorting_1">{{ $user->birthdate }}</td>
                                                <td calss="sorting_1">{{ $user->residence }} {{ $user->city }}</td>
                                                <td>{{ $user->mobile }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->employment }}</td>
                                                @if (Auth::guard('admin')->user()->component == 'fablab')
                                                    <td>{{ $user->affiliation }}</td>
                                                    <td>{{ $user->program }}</td>
                                                    <td>{{ $user->idea_description }}</td>
                                                @elseif(Auth::guard('admin')->user()->component === 'codingacademy')
                                                    <td>{{ $user->country }}</td>
                                                    <td>{{ $user->ar_first_name }}</td>
                                                    <td>{{ $user->ar_second_name }}</td>
                                                    <td>{{ $user->ar_third_name }}</td>
                                                    <td>{{ $user->ar_last_name }}</td>
                                                    <td>{{ $user->martial_status }}</td>
                                                    <td>{{ $user->educational_status }}</td>
                                                    <td>{{ $user->educational_background }}</td>
                                                    <td>{{ $user->ar_writing }}</td>
                                                    <td>{{ $user->ar_speaking }}</td>
                                                    <td>{{ $user->en_writing }}</td>
                                                    <td>{{ $user->en_speaking }}</td>
                                                    <td>{{ $user->address }}</td>
                                                    <td>{{ $user->fullName_1 }}</td>
                                                    <td>{{ $user->relative_relation_1 }}</td>
                                                    <td>{{ $user->relative_mobile_1 }}</td>
                                                    <td>{{ $user->fullName_2 }}</td>
                                                    <td>{{ $user->relative_relation_2 }}</td>
                                                    <td>{{ $user->relative_mobile_2 }}</td>
                                                    <td>{{ $user->is_submitted }}</td>
                                                    <td>{{ $user->is_committed }}</td>
                                                    <td>{{ $user->academy_location }}</td>
                                                @elseif(Auth::guard('admin')->user()->component == 'digitalcenter')
                                                    <td>{{ $user->whatsapp }}</td>
                                                    <td>{{ $user->center }}</td>
                                                    <td>{{ $user->obstacles }}</td>
                                                    <td>{{ $user->type_of_obstacles }}</td>
                                                    <td>{{ $user->programming }}</td>
                                                @elseif(Auth::guard('admin')->user()->component == 'bigbyorange')
                                                    <td>{{ $user->person_with_disability }}</td>
                                                    <td>{{ $user->linkedin_profile }}</td>
                                                    <td>{{ $user->Male_Co_Founders }}</td>
                                                    <td>{{ $user->Female_Co_Founders }}</td>
                                                    <td>{{ $user->Position }}</td>
                                                    <td>{{ $user->ProvideOfPosition }}</td>
                                                    <td>{{ $user->Startup }}</td>
                                                    <td>{{ $user->Startup_Name }}</td>
                                                    <td>{{ $user->Website }}</td>
                                                    <td>{{ $user->Social_Media }}</td>
                                                    <td>{{ $user->problem_your_startup }}</td>
                                                    <td>{{ $user->describe_your_solution }}</td>
                                                    <td>{{ $user->MVP_Demo }}</td>
                                                    <td>{{ $user->startup_registered }}</td>
                                                    <td>{{ $user->registration_number }}</td>
                                                    <td>{{ $user->startup_serve }}</td>
                                                    <td>{{ $user->Funds }}</td>
                                                    <td>{{ $user->source_funds }}</td>
                                                    <td>{{ $user->amount_of_funds }}</td>
                                                    <td>{{ $user->new_funds }}</td>
                                                    <td>{{ $user->markets }}</td>
                                                    <td>{{ $user->revenue }}</td>
                                                    <td>{{ $user->milestones_and_achievements }}</td>
                                                    <td>{{ $user->describe_the_effect }}</td>
                                                    <td>{{ $user->business_opportunities }}</td>
                                                    <td>{{ $user->specify_units }}</td>
                                                    <td>{{ $user->expectations }}</td>
                                                @endif
                                                <td>{{ $user->status }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <span
                                                            class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer dropdown-toggle"
                                                            data-bs-toggle="dropdown"></span>
                                                        <div class="dropdown-menu ">
                                                            @if (Auth::guard('admin')->user()->is_super)
                                                                <a class="dropdown-item "
                                                                    href="{{ route('fablab_users.delete', ['id' => $user->id]) }}">
                                                                    <i class="bx bx-edit-alt mr-1"></i>Delete
                                                                </a>
                                                            @endif
                                                            <a class="dropdown-item "
                                                                href="
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
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var table = $(".zero-configuration").DataTable({

                searchBuilder: {
                    columns: ':visible',
                },
                searchPanes: true,
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
                            return type === "display" ?
                                data :
                                data;
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
                                    return dateArray[
                                        0
                                    ]; // Extracting the year from the date for filtering purposes
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
                        }
                    @endif

                ],

            });
            // Add buttons configuration
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

            // Place the buttons
            table.buttons().container().appendTo(table.table().container());
            table.searchBuilder.container().prependTo(table.table().container());
            // Append searchPanes container
            $("div.dtsp-verticalPanes").append(table.searchPanes.container());

        });
    </script>
@endsection
