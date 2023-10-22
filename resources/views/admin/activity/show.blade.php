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
                        @php
                            $imageArray = json_decode($activity->image);
                        @endphp
                        @if (is_array($imageArray) && count($imageArray) > 1)
                            <div id="activity{{ $activity->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($imageArray as $index => $imagePath)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/image/' . $imagePath) }}" class="d-block w-100"
                                                style="height: 350px;" alt="{{ $activity->activity_name }}">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" type="button"
                                    data-bs-target="#activity{{ $activity->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" type="button"
                                    data-bs-target="#activity{{ $activity->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        @else
                            <div>
                                <img src="{{ asset('storage/image/' . $imageArray[0]) }}" class="w-100"
                                    style="height: 350px;" alt="{{ $activity->activity_name }}">
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
