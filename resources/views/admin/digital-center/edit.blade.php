@extends('layouts.admin')

@section('title')
    Edit Trainer
@endsection

@section('main')
<div class="container my-5">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Trainer</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('digital-center.update', $trainer->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="trainer_name">Trainer Name</label>
                                            <input type="text" class="form-control" id="trainer_name" name="trainer_name" value="{{ old('trainer_name', $trainer->trainer_name) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="trainer_phone">Trainer Phone</label>
                                            <input type="text" class="form-control" id="trainer_phone" name="trainer_phone" value="{{ old('trainer_phone', $trainer->trainer_phone) }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="trainer_email">Trainer Email</label>
                                            <input type="email" class="form-control" id="trainer_email" name="trainer_email" value="{{ old('trainer_email', $trainer->trainer_email) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="organization">Organization</label>
                                            <input type="text" class="form-control" id="organization" name="organization" value="{{ old('organization', $trainer->organization) }}" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add more fields as needed -->
                                <button type="submit" class="btn btn-primary">Update Trainer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection