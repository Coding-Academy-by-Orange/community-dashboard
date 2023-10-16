@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('main')
    <div class="d-md-flex flex-md-equal w-100">
        <div class="col-lg-3 mt-1">
            <div class="mt-1 ">
                {{-- <form method="post"
                    action="@if (Auth::user()->component == 'digitalcenter') {{ route('ODC.filter') }}
                @elseif (Auth::user()->component == 'fablab')
                    {{ route('fablab.filter') }}
                @elseif (Auth::user()->component == 'bigbyorange')
                    {{ route('big.filter') }} @endif">
                    @csrf --}}


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
                    {{-- <div class="col-12 col-sm-12 col-lg-6">
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
                        </div> --}}
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
                    {{-- <div class="col-12 col-sm-12 col-lg-6">
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
                        </div> --}}
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
                    {{-- <div class="col-12 col-sm-12 col-lg-12 d-flex align-items-center justify-content-start">
                            <button type="submit" class="col-12 btn btn-primary btn-block glow mb-0">Filter
                            </button>
                        </div> --}}
                    <div class="dtsp-verticalPanes"></div>
                </div>
                {{-- </form> --}}
            </div>
            {{-- <div class="border my-2">
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
            {{-- @if ($nationality == 'All')
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
                        <kbd class="text-white mr-2 bg-light mb-1">Year of Birth:({{ $year }})</kbd> --}}
            {{-- @if ($commitment ?? '' == 'All')
                            <kbd class="text-white mr-2 bg-light mb-1">Committed:(All)</kbd>
                        @elseif($commitment ?? '' == 1)
                            <kbd class="text-white mr-2 bg-light mb-1">Committed:(Yes)</kbd>
                        @elseif($commitment ?? '' == 0)
                            <kbd class="text-white mr-2 bg-light mb-1">Committed:(No)</kbd>
                        @endif --}}
            {{-- <kbd class="text-white mr-2 bg-light mb-1">Edu.
                            Background:({{ $educational_background }})</kbd> --}}
            {{-- <kbd class="text-white mr-2 bg-light mb-1">Educ. Level:({{ $educational_level ?? '' }}
                            )</kbd>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="col-lg-9 app-content content ml-0">
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
                                            <th>nationality</th>
                                            <th>Education</th>
                                            <th>major_study</th>
                                            <th>Birthdate</th>
                                            <th>Residence</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Employment</th>
                                            @if (Auth::guard('admin')->user()->component == 'fablab')
                                                <th>Affiliation</th>
                                                <th>Program</th>
                                                <th>Idea Description</th>
                                            @elseif(Auth::guard('admin')->user()->component == 'codingacademy')
                                                <th>Country</th>
                                                <th>Ar First Name</th>
                                                <th>Ar Father Name</th>
                                                <th>Ar Grandfather Name</th>
                                                <th>Ar last Name</th>
                                                <th>Martial Status</th>
                                                <th>Educational Status</th>
                                                <th>Field</th>
                                                <th>Educational Background</th>
                                                <th>AR Writing</th>
                                                <th>AR Speaking</th>
                                                <th>EN Writing</th>
                                                <th>EN Speaking</th>
                                                <th>City</th>
                                                <th>Address</th>
                                                <th>Relative #1 name</th>
                                                <th>Relative #1 relation</th>
                                                <th>Relative #1 mobile</th>
                                                <th>Relative #2 name</th>
                                                <th>Relative #2 relation</th>
                                                <th>Relative #2 mobile</th>
                                                <th>is_committed</th>
                                                <th>is_submitted</th>
                                                <th>academy_location</th>
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
                                                <td> {{ $user->father_name }}
                                                </td>
                                                <td> {{ $user->grandfather_name }}
                                                </td>
                                                <td> {{ $user->last_name }}
                                                </td>
                                                <td calss="sorting_1">{{ $user->gender }}</td>
                                                <td>{{ $user->nationality }}</td>
                                                <td calss="sorting_1">{{ $user->education }}</td>
                                                <td>{{ $user->major_study }}</td>
                                                <td calss="sorting_1">{{ $user->birthdate }}</td>
                                                <td calss="sorting_1">{{ $user->residence }}</td>
                                                <td>{{ $user->mobile }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->employment }}</td>
                                                @if (Auth::guard('admin')->user()->component == 'fablab')
                                                    <td>{{ $user->affiliation }}</td>
                                                    <td>{{ $user->program }}</td>
                                                    <td>{{ $user->idea_description }}</td>
                                                @elseif(Auth::guard('admin')->user()->component == 'codingacademy')
                                                    <td>{{ $user->country }}</td>
                                                    <td>{{ $user->ar_first_name }}</td>
                                                    <td>{{ $user->ar_father_name }}</td>
                                                    <td>{{ $user->ar_grandfather_name }}</td>
                                                    <td>{{ $user->ar_last_name }}</td>
                                                    <td>{{ $user->martial_status }}</td>
                                                    <td>{{ $user->educational_status }}</td>
                                                    <td>{{ $user->field }}</td>
                                                    <td>{{ $user->educational_background }}</td>
                                                    <td>{{ $user->ar_writing }}</td>
                                                    <td>{{ $user->ar_speaking }}</td>
                                                    <td>{{ $user->en_writing }}</td>
                                                    <td>{{ $user->en_speaking }}</td>
                                                    <td>{{ $user->city }}</td>
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
                                                            @if (Auth::user()->is_super)
                                                                <a class="dropdown-item "
                                                                    href="{{ route('fablab_users.delete', ['id' => $user->id]) }}">
                                                                    <i class="bx bx-edit-alt mr-1"></i>Delete
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
@endsection
