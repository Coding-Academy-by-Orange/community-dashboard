@extends('layouts.admin')
@section('main')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class=" col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">Activities</h4>
                        </div>
                        <div>
                            <a class="btn btn-primary" href="{{ route('activity.create') }}">Add Activity </a>
                        </div>
                    </div>
                    <div class="px-4">
                        @foreach ($activities as $activity)
                            <div class="card">
                                <div class="card-header">
                                    <h3>{{ $activity->activity_name }}</h3>
                                </div>
                                @if (is_array($activity->image) && count($activity->image) > 1)
                                    <div id="activityCarousel-{{ $activity->id }}" class="carousel slide"
                                        data-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ($activity->image as $index => $imagePath)
                                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                    <img src="{{ asset('storage/image/' . $imagePath) }}" class="w-100"
                                                        style="height: 350px;" alt="{{ $activity->activity_name }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#activityCarousel-{{ $activity->id }}"
                                            role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#activityCarousel-{{ $activity->id }}"
                                            role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                @else
                                    @php
                                        $imageArray = json_decode($activity->image);
                                    @endphp
                                    <div>
                                        <img src="{{ asset('storage/image/' . $imageArray) }}" class="w-100"
                                            style="height: 350px;" alt="{{ $activity->activity_name }}">
                                    </div>
                                @endif

                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <i class='bx bxs-calendar'></i>
                                            {{ date('Y/m/d', strtotime($activity->start_date)) }}
                                            - {{ date('Y/m/d', strtotime($activity->end_date)) }}

                                        </div>
                                        <div></div>
                                    </div>
                                    <p>{{ implode(' ', array_slice(explode(' ', strip_tags($activity->description)), 0, 100)) }}
                                    </p>


                                    <div class="card-footer"><a href="{{ route('activity.show', $activity) }}"
                                            class="btn btn-primary">See More</a></div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
