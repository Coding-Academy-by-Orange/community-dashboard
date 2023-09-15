@extends('layouts.admin')

@section('main')
    <section id="basic-horizontal-layouts">
        <section id="table-success">
            <div class="card">
                <!-- datatable start -->
                <div class="table-responsive">
                    <table id="table-extended-success" class="table mb-0">
                        <thead>
                            <tr>
                                <!-- Define table headers here -->
                                <th>Number</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th>Birthdate</th>
                                <th>Residence</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                            @php($count = 0)

                            @foreach ($participants as $participant)
                                @php($count++)
                                <tr>
                                    <!-- Populate table rows with participant data -->
                                    <td>{{ $count }}</td>
                                    <td>{{ $participant->first_name }} {{ $participant->father_name }} {{ $participant->grandfather_name }} {{ $participant->last_name }}</td>
                                    <td>{{ $participant->email }}</td>
                                    <td>{{ $participant->mobile }}</td>
                                    <td>{{ $participant->gender }}</td>
                                    <td>{{ $participant->birthday }}</td>
                                    <td>{{ $participant->residence }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                role="menu"></span>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                
                                                        <form action="{{ route('admin.activity.register.destroy', $participant->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item " type="submit">Delete</button>
                                                        </form>
                                                        
                                                       
                                                        
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
    </section>
@endsection
