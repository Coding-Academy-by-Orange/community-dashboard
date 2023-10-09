@extends('layouts.app')
@section('title')
    Show Activity
@endsection
@section('main')
    <section class="container">
        <div class="row match-height">
            <div class=" col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ $activity->activity_name }}</h4>
                        </div>
                        <div>
                        </div>
                    </div>
                    @php
                        $imageArray = json_decode($activity->image);
                    @endphp
                    <div class="card-body">
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
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#activity{{ $activity->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#activity{{ $activity->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </button>
                            </div>
                        @else
                            <div>
                                <img src="{{ URL::asset('storage/image/' . $imageArray) }}" class="w-100"
                                    style="height: 350px;" alt="{{ $activity->activity_name }}">
                            </div>
                        @endif
                        @php
                            $currentDate = now();
                            $startDate = $activity->start_date;
                            $endDate = $activity->end_date;
                        @endphp
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                @if ($startDate && $endDate)
                                    <div>
                                        <i class="fa-regular fa-calendar"></i>
                                        {{ date('Y/m/d', strtotime($activity->start_date)) }}
                                        - {{ date('Y/m/d', strtotime($activity->end_date)) }}
                                    </div>
                                @endif
                                <div>
                                    <i class="fa-solid fa-location-dot"></i>
                                    {{ $activity->location }}
                                </div>
                            </div>
                            @if ($activity->video)
                                <div>
                                    <i class="fa-solid fa-video"></i>
                                    @foreach (explode(',', $activity->video) as $link)
                                        @php
                                            $linkParts = explode(' ', trim($link));
                                            $url = trim($linkParts[0]);
                                            if (filter_var($url, FILTER_VALIDATE_URL)) {
                                                $text = isset($linkParts[1]) ? trim($linkParts[1]) : 'Video';
                                            } else {
                                                $text = $link;
                                                $url = '#';
                                            }
                                        @endphp
                                        <a href="{{ $url }}" target="_blank">{{ $text }}</a>
                                    @endforeach
                                </div>
                            @endif
                            <p>{{ $activity->description }}</p>
                        </div>
                        <div class="card-footer">

                            @if ($startDate && $endDate && $currentDate >= $startDate && $currentDate <= $endDate)
                                <a href="{{ route('activity.register', ['activity_id' => $activity->id]) }}">Register for
                                    this activity</a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
