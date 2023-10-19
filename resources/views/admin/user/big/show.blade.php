@extends('layouts.admin')
@section('title')
    Applicant
@endsection
@section('main')
    <div class="container">
        <h2>Student Details</h2>
        <div class="row">
            <div class="col-6">
                <p>Name: {{ $student->first_name }} {{ $student->father_name }} {{ $student->grandfather_name }}
                    {{ $student->last_name }}</p>
                <p>Email: {{ $student->email }}</p>
                <p>Phone: {{ $student->mobile }}</p>
                <p>Birthday: {{ $student->birthday }}</p>
            </div>
            <div class="col-6">
                <p>Linkedin: <a href="{{ $student->linkedin_profile }}"> Profile Link</a></p>
                <p>Gender: {{ $student->gender }}</p>
                @if ($student->other_nationalty == null)
                    <p>Nationality: {{ $student->nationality }}</p>
                    @if ($student->nationality == 'Jordanian')
                        <p>National ID: {{ $student->national_id }}</p>
                    @endif
                @else
                    <p>Nationality: {{ $student->other_nationalty }}</p>
                    <p>Passport Number : {{ $student->passport_number }}</p>
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <p>Residence: {{ $student->residence }}</p>
                <p>Education: {{ $student->education }}</p>
                <p>Employment: {{ $student->employment }}</p>
                <p>Major Study: {{ $student->major_study }}</p>
            </div>
            <div class="col-6">
                <p>Position: {{ $student->Position }}</p>
                <p>Male Co Founders: {{ $student->Male_Co_Founders }}</p>
                <p>Female Co Founders: {{ $student->Female_Co_Founders }}</p>
                <p>Position of Co Owners and Linkedin: <a href="{{ $student->ProvideOfPosition }}"> Profile Link</a></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <p>StartUp Name: {{ $student->Startup_Name }}</p>
                @php
                    $array = unserialize($student->Startup);
                @endphp
                <p>StartUp: @foreach ($array ?? '' as $item)
                        {{ $item }} ,
                    @endforeach
                </p>
                <p>Website: <a href="{{ $student->Website }}">Website Link</a></p>
                <p>Social Media: <a href="{{ $student->Social_Media }}">Social Media</a></p>
            </div>
            <div class="col-6">
                @php
                    $unserializedData = unserialize($student->problem_your_startup);
                @endphp
                <p>Problems the StartUp Solves:
                    {{ $unserializedData }}
                </p>
                <p>Describe the Solutions:
                    {{ $student->describe_your_solution }}
                </p>
                <p>MVP Demo: <a href="{{ $student->MVP_Demo }}">Demo Link</a></p>
                @php
                    $startup_registered = unserialize($student->startup_registered);
                @endphp
                <p>Startup Registered In:
                    @foreach ($startup_registered as $item)
                        {{ $item }} ,
                    @endforeach
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                @php
                    $service = unserialize($student->startup_serve);
                @endphp
                <p>StartUp Service: @foreach ($service ?? '' as $item)
                        {{ $item }} ,
                    @endforeach
                </p>
                @php
                    $Funds = unserialize($student->Funds);
                @endphp
                <p>Funds: {{ $Funds }}
                </p>
                @php
                    $source_funds = unserialize($student->source_funds);
                @endphp
                <p>Source Funds: @foreach ($source_funds ?? '' as $item)
                        {{ $item }} ,
                    @endforeach
                </p>
                <p>Amount Of Funds: {{ $student->amount_of_funds }}</p>
            </div>

            <div class="col-6">
                <p>New Funds:
                    {{ $student->new_funds }}
                </p>
                @php
                    $markets = unserialize($student->markets);
                @endphp
                <p>Markets:
                    @foreach ($markets ?? '' as $item)
                        {{ $item }} ,
                    @endforeach
                </p>
                <p>Revenue: {{ $student->revenue }}</p>
                @php
                    $milestones_and_achievements = unserialize($student->milestones_and_achievements);
                @endphp
                <p>milestones_and_achievements :
                    {{ $milestones_and_achievements }}
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                @php
                    $describe_the_effect = unserialize($student->describe_the_effect);
                @endphp
                <p>Describe The Effect :
                    {{ $describe_the_effect }}
                </p>
                <p>Business Opportunities :
                    {{ $student->business_opportunities }}
                </p>
                @php
                    $specify_units = unserialize($student->specify_units);
                @endphp
                <p>Specify Units:
                    {{ $specify_units }}
                </p>
                <p>Expectations:
                    {{ $student->expectations }}
                </p>
            </div>
        </div>

        <form action="{{ route('admin.user.big.changeStatus', $student->id) }}" method="POST">
            @csrf
            <label for="new_status">Change Status:</label>
            <select name="new_status" id="new_status" class="form-control mb-3">
                <option value="accepted" @if ($student->status == 'accepted') selected @endif>Accepted</option>
                <option value="pending"@if ($student->status == 'pending') selected @endif>Pending</option>
                <option value="enrolled"@if ($student->status == 'enrolled') selected @endif>Enrolled</option>
                <option value="finall acceptance"@if ($student->status == 'finall acceptance') selected @endif>Finall Acceptance
                </option>
                <option value="rejected"@if ($student->status == 'rejected') selected @endif>Rejected</option>
            </select>
            <button type="submit"class="btn btn-primary glow mb-0">Change Status</button>
        </form>

    </div>
@endsection
