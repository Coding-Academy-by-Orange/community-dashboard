@extends('layouts.admin')
@section('title')
    Activity
@endsection
@section('main')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class=" col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h3 class="card-title">{{ $activity->activity_name }}</h3>
                        </div>

                    </div>
                    <div class="card-body">

                        @if ($activity->images->count() > 1)
                            <div id="activity{{ $activity->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($activity->images as $image)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/image/' . $image->image) }}" class="d-block w-100"
                                                style="height: 350px;" alt="{{ $activity->activity_name }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="card-body">
                            <p>{{ $activity->description }}
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            @if ($activity->start_date && $activity->end_date)
                                <div>
                                    <a class ="btn btn-secondary mb-1"
                                        href="{{ route('admin.activity.register.create', ['activity_id' => $activity->id]) }}">Register
                                        for this activity</a><br>
                                    <a class ="btn btn-secondary "
                                        href="{{ route('admin.activity.register.index', ['activity_id' => $activity->id]) }}">View
                                        Participants</a>
                                </div>
                            @endif
                            <div>
                                <a class="btn btn-primary m-1" href="{{ route('activity.edit', $activity) }}">Edit Activity
                                </a>
                                <br>
                                @if (Auth::id() == $activity->admin_id || Auth::user()->is_super == 1)
                                    <form method="POST" action="{{ route('activity.destroy', $activity) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete Activity</button>
                                    </form>
                                @endif
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
