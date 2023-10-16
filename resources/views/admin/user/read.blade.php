@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('main')
    <div class="d-md-flex flex-md-equal w-100">
        <div class="col-lg-3 mt-1">
            <div class="mt-1 ">
                <form method="post"
                    action="@if (Auth::user()->component == 'digitalcenter') {{ route('ODC.filter') }}
                @elseif (Auth::user()->component == 'fablab')
                    {{ route('fablab.filter') }}
                @elseif (Auth::user()->component == 'bigbyorange')
                    {{ route('big.filter') }} @endif">
                    @csrf
                    <div class="rounded d-flex flex-wrap">
                        {{-- <div class="col-12 col-sm-12 col-lg-6">
                            <label for="submission">Application Status</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="submission" name="status">
                                    <option @if ($status ?? '' == 'All') selected @endif value="">All
                                    </option>
                                    <option @if ($status ?? '' == 'submitted') selected @endif value="submitted">Fully
                                        Submitted
                                    </option>
                                    <option @if ($status ?? '' == 'in_progress') selected @endif value="in_progress">
                                        Partial Submitted
                                    </option>
                                </select>
                            </fieldset>
                        </div> --}}
                        {{-- <div class="col-12 col-sm-12 col-lg-6">
                            <label for="result_1">Results</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="result_1" name="result_1">
                                    <option @if ($result_1 == 'All') selected @endif value="">All
                                    </option>
                                    <option @if ($result_1 == '1. Accepted – 1st Filtration – Orange') selected @endif
                                        value="1. Accepted – 1st Filtration – Orange">1. Accepted – 1st Filtration –
                                        Orange
                                    </option>

                                    <option @if ($result_1 == '2. Maybe – 1st Filtration – Orange') selected @endif
                                        value="2. Maybe – 1st Filtration – Orange">2. Maybe – 1st Filtration – Orange
                                    </option>
                                    <option @if ($result_1 == '3. Rejected – Age – Orange') selected @endif
                                        value="3. Rejected – Age – Orange">
                                        3. Rejected – Age – Orange
                                    </option>

                                    <option @if ($result_1 == '4. Rejected – 1st Filtration – Orange') selected @endif
                                        value="4. Rejected – 1st Filtration – Orange">
                                        4. Rejected – 1st Filtration – Orange
                                    </option>

                                    <option @if ($result_1 == '5. Accepted – Pre Final List – Simplon') selected @endif
                                        value="5. Accepted – Pre Final List – Simplon">
                                        5. Accepted – Pre Final List – Simplon
                                    </option>
                                    <option @if ($result_1 == '6. Accepted – Final List – Simplon') selected @endif
                                        value="6. Accepted – Final List – Simplon">
                                        6. Accepted – Final List – Simplon
                                    </option>
                                    <option @if ($result_1 == '7. Rejected – Test Result (Sololearn + English) ') selected @endif
                                        value="7. Rejected – Test Result (Sololearn + English) ">
                                        7. Rejected – Test Result (Sololearn + English) </option>

                                    <option @if ($result_1 == 'rejected_aqaba') selected @endif
                                        value="8. Rejected – Motivational Qs – Simplon">8. Rejected – Motivational Qs –
                                        Simplon
                                    </option>
                                    <option @if ($result_1 == '9. Accepted – 50 Students After Interviews – Orange') selected @endif
                                        value="9. Accepted – 50 Students After Interviews – Orange">9. Accepted – 50
                                        Students After Interviews – Orange
                                    </option>

                                    <option @if ($result_1 == '10. Maybe – Final List After Interviews - Orange') selected @endif
                                        value="10. Maybe – Final List After Interviews - Orange">
                                        10. Maybe – Final List After Interviews - Orange
                                    </option>
                                    <option @if ($result_1 == '11. Rejected – Final List After Interviews - Orange') selected @endif
                                        value="11. Rejected – Final List After Interviews - Orange">11. Rejected –
                                        Final List After Interviews - Orange
                                    </option>
                                </select>
                            </fieldset>
                        </div> --}}
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="">Nationality</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="" name="nationality">
                                    <option @if ($nationality == 'All') selected @endif value="">
                                        All
                                    </option>
                                    <option @if ($nationality == '1') selected @endif value="Jordanian">
                                        Jordanian
                                    </option>
                                    <option @if ($nationality == '0') selected @endif value="NoneJordanian">
                                        Non
                                        Jordanian
                                    </option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="">Gender</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="" name="gender">
                                    <option @if ($gender == 'All') selected @endif value="">All
                                    </option>
                                    <option @if ($gender == 'male') selected @endif value="1">Male
                                    </option>
                                    <option @if ($gender == 'female') selected @endif value="0">Female
                                    </option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="">Birth Year</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="" name="year">
                                    <option value="">All
                                        @if ($year == 'All')
                                            selected
                                        @endif
                                    </option>
                                    <option value="1989" @if ($year == '1989') selected @endif>1989
                                    </option>
                                    <option value="1990" @if ($year == '1990') selected @endif>1990
                                    </option>
                                    <option value="1991" @if ($year == '1991') selected @endif>1991
                                    </option>
                                    <option value="1992" @if ($year == '1992') selected @endif>1992
                                    </option>
                                    <option value="1993" @if ($year == '1993') selected @endif>1993
                                    </option>
                                    <option value="1994" @if ($year == '1994') selected @endif>1994
                                    </option>
                                    <option value="1995" @if ($year == '1995') selected @endif>1995
                                    </option>
                                    <option value="1996" @if ($year == '1996') selected @endif>1996
                                    </option>
                                    <option value="1997" @if ($year == '1997') selected @endif>1997
                                    </option>
                                    <option value="1998" @if ($year == '1998') selected @endif>1998
                                    </option>
                                    <option value="1999" @if ($year == '1999') selected @endif>1999
                                    </option>
                                    <option value="2000" @if ($year == '2000') selected @endif>2000
                                    </option>
                                    <option value="2001" @if ($year == '2001') selected @endif>2001
                                    </option>
                                    <option value="2002" @if ($year == '2002') selected @endif>2002
                                    </option>
                                    <option value="2003" @if ($year == '2003') selected @endif>2003
                                    </option>
                                    <option value="2004" @if ($year == '2004') selected @endif>2004
                                    </option>
                                    <option value="2005" @if ($year == '2005') selected @endif>2005
                                    </option>
                                </select>
                            </fieldset>
                        </div>
                        {{-- <div class="col-12 col-sm-12 col-lg-6">
                            <label for="">Commitment</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="" name="commitment">
                                    <option @if ($commitment ?? '' == 'All') selected @endif value="">
                                        All
                                    </option>
                                    <option @if ($commitment ?? '' == '1') selected @endif value="1">
                                        Committed
                                    </option>
                                    <option @if ($commitment ?? '' == '0') selected @endif value="0">
                                        Not
                                        Committed
                                    </option>
                                </select>
                            </fieldset>
                        </div> --}}
                        {{-- <div class="col-12 col-sm-12 col-lg-6">
                            <label for="educational_background">Edu. Background</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="educational_background"
                                    name="educational_background">
                                    <option @if ($educational_background == 'All') selected @endif value="">All
                                    </option>
                                    <option @if ($educational_background == 'it_background') selected @endif value="it_background">
                                        It Background
                                    </option>
                                    <option @if ($educational_background == 'non_it_background') selected @endif
                                        value="non_it_background">Non It Background
                                    </option>
                                </select>
                            </fieldset>
                        </div> --}}
                        {{-- <div class="col-12 col-sm-12 col-lg-6">
                            <label for="">Edu. Level</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="" name="educational_level">
                                    <option @if ($educational_level ?? '' == 'All') selected @endif value="">All
                                    </option>
                                    <option @if ($educational_level ?? '' == 'high_school') selected @endif value="high_school">
                                        High School
                                    </option>
                                    <option @if ($educational_level ?? '' == 'diploma') selected @endif value="diploma">Diploma
                                    </option>
                                    <option @if ($educational_level ?? '' == 'high_diploma') selected @endif value="high_diploma">
                                        High Diploma
                                    </option>
                                    <option @if ($educational_level ?? '' == 'bachelor') selected @endif value="bachelor">
                                        Bachelor
                                    </option>
                                    <option @if ($educational_level ?? '' == 'master_degree') selected @endif value="master_degree">
                                        Master Degree
                                    </option>
                                    <option @if ($educational_level ?? '' == 'p.h.d') selected @endif value="p.h.d">P.H.D
                                    </option>
                                </select>
                            </fieldset>
                        </div> --}}
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="">Edu. Level</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="" name="educational_level">
                                    <option @if ($educational_level ?? '' == 'All') selected @endif value="">All
                                    </option>
                                    <option @if ($educational_level ?? '' == 'Below Tawjihi') selected @endif value="Below Tawjihi">
                                        Below Tawjihi
                                    </option>
                                    <option @if ($educational_level ?? '' == 'Tawjihi') selected @endif value="Tawjihi">Tawjihi
                                    </option>
                                    <option @if ($educational_level ?? '' == 'Diploma') selected @endif value="Diploma">
                                        Diploma
                                    </option>
                                    <option @if ($educational_level ?? '' == 'Undergraduate') selected @endif value="Undergraduate">
                                        Undergraduate
                                    </option>
                                    <option @if ($educational_level ?? '' == 'Graduate') selected @endif value="Graduate">
                                        Graduate
                                    </option>
                                </select>
                            </fieldset>
                        </div>
                        {{-- <div class="col-12 col-sm12 col-lg-6">
                            <label>Training Location</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="academy_location">
                                    <option value="">All</option>
                                    <!--	<option value="amman">Amman</option>
    <option value="irbid">Irbid</option>
    <option value="aqaba">Aqaba</option>-->
                                    <option value="zarqa">Zarqa</option>
                                    <option value="balqa">Balqa</option>
                                </select>
                            </fieldset>
                        </div> --}}
                        <div class="col-12 col-sm-12 col-lg-12 d-flex align-items-center justify-content-start">
                            <button type="submit" class="col-12 btn btn-primary btn-block glow mb-0">Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="border my-2">
                <div class="card-body pr-0">
                    <div class=" col-lg-12 col-md-12 col-12 mb-1">
                        <div class="d-flex align-items-center">
                            <div class="avatar bg-rgba-primary m-0 p-25 mr-75 mr-xl-2">
                                <div class="avatar-content">
                                    <i class="bx bx-user text-primary font-medium-2"></i>
                                </div>
                            </div>
                            <div class="total-amount">
                                @if (count($users) > 0)
                                    <h5 class="">Total Users ({{ count($users) }})</h5>
                                @else
                                    No Matched applicants
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-0 col-lg-12 col-md-12 col-12 d-flex flex-wrap ">
                        {{-- <kbd class="text-white mr-2 bg-light mb-1">Application Status:({{ $status ?? '' }})</kbd> --}}
                        @if ($nationality == 'All')
                            <kbd class="text-white mr-2 bg-light mb-1">Nationality:(All)</kbd>
                        @elseif($nationality == 1)
                            <kbd class="text-white mr-2 bg-light mb-1">Nationality:(Jordanian)</kbd>
                        @elseif($nationality == 0)
                            <kbd class="text-white mr-2 bg-light mb-1">Nationality:(Not Jordanian)</kbd>
                        @endif
                        @if ($gender == 'All')
                            <kbd class="text-white mr-2 bg-light mb-1">Gender:(All)</kbd>
                        @elseif($gender == 1)
                            <kbd class="text-white mr-2 bg-light mb-1">Gender:(Male)</kbd>
                        @elseif($gender == 0)
                            <kbd class="text-white mr-2 bg-light mb-1">Gender:(Female)</kbd>
                        @endif
                        <kbd class="text-white mr-2 bg-light mb-1">Year of Birth:({{ $year }})</kbd>
                        {{-- @if ($commitment ?? '' == 'All')
                            <kbd class="text-white mr-2 bg-light mb-1">Committed:(All)</kbd>
                        @elseif($commitment ?? '' == 1)
                            <kbd class="text-white mr-2 bg-light mb-1">Committed:(Yes)</kbd>
                        @elseif($commitment ?? '' == 0)
                            <kbd class="text-white mr-2 bg-light mb-1">Committed:(No)</kbd>
                        @endif --}}
                        {{-- <kbd class="text-white mr-2 bg-light mb-1">Edu.
                            Background:({{ $educational_background }})</kbd> --}}
                        <kbd class="text-white mr-2 bg-light mb-1">Educ. Level:({{ $educational_level ?? '' }}
                            )</kbd>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 app-content content ml-0">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <!-- users list start -->
                    <section class="basic-datatable">
                        <a class="btn btn-success mb-2 mt-2" href="{{ route('file-export') }}">Export data</a>
                        <div class="users-list-table">
                            
                                   
                                        <!-- datatable start -->
                                        <div class="container">
                                            <table id="table" class="display zero-configuration table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First name</th>
                                                        <th>Last name</th>
                                                        <th>Education</th>
                                                        
                                                        <th>Component</th>
                                                        <th>Residence</th>
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
                                                            <td>{{ $user->last_name }}</td>
                                                            <td calss="sorting_1">{{ $user->education }}</td>
                                                           
                                                            <td calss="sorting_1">
                                                                @if ($user->affiliation)
                                                                    FabLab
                                                                @elseif ($user->programming)
                                                                    Digital Center
                                                                    {{-- @elseif ($user->programming)
                                                            Coding Academy --}}
                                                                @elseif ($user->linkedin_profile)
                                                                    Big By Orange
                                                                @endif
                                                            </td>
                                                            <td calss="sorting_1">{{ $user->residence }}</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer dropdown-toggle"
                                                                        data-bs-toggle="dropdown"></span>
                                                                    <div class="dropdown-menu ">
                                                                        @if (Auth::user()->is_super)
                                                                            <a class="dropdown-item "
                                                                                href="{{ route('fablab_users.delete', ['id' => $user->id]) }}">
                                                                                <i
                                                                                    class="bx bx-edit-alt mr-1"></i>Delete
                                                                            </a>
                                                                        @endif
                                                                        <a class="dropdown-item "
                                                                            href="@if (Auth::user()->component == 'digitalcenter') {{ route('admin.user.odc.show', $user->id) }}
                                                                            @elseif (Auth::user()->component == 'fablab')
                                                                                {{ route('admin.user.fablab.show', $user->id) }}
                                                                            @elseif (Auth::user()->component == 'bigbyorange')
                                                                                {{ route('admin.user.big.show', $user->id) }} @endif">
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
                                        <!-- datatable ends -->
                                   
                              
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        var table = $(".zero-configuration").DataTable({
            searchPanes: true,
            columns: [{
                    data: "first_name"
                },
                {
                    data: "last_name"
                },
                {
                    data: "education"
                },
                {
                    data: "component"
                },
                {
                    data: "residence"
                },
                {
                    data:"action"
                }
            ],
            deferRender: true,
            columnDefs: [{
                    targets: [1],
                    render: function(data, type) {
                        console.debug(type);
                        return type === "searchpanes" ?
                            data :
                            '<a href="https://datatables.net/forums/discussion/72109/searchpanes-v2-0-0-viewcount-displays-0-with-orthogonal-data-type-sp">' +
                data +
                "</a>";
                    },
                    searchPanes: {
                        show: true,
                        orthogonal: "searchpanes"
                    }
                },
                {
                    targets: [2],
                    searchPanes: {
                        show: true,
                        orthogonal: "searchpanes"
                    },
                    render: function(data, type) {
                        console.debug(type);
                        return type === "display" ?
                            data :
                            '<a href="https://datatables.net/forums/discussion/72109/searchpanes-v2-0-0-viewcount-displays-0-with-orthogonal-data-type-sp">' +
                data +
                "</a>";
                    }
                }
            ],
            // ajax: "https://datatables.net/examples/ajax/data/data_5k.txt", /* <-- keep loading indefinitely */

        });
        table.searchPanes.container().prependTo(table.table().container());
        table.searchPanes.resizePanes();
    });
</script>
@endsection
