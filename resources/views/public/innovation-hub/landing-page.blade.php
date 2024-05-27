@extends('layouts.app')
@section('main')
<section>
    <div class="container" id="colorBlock"></div>
    <div class="container-fluid pt-5 bg-dark  ps-0 pe-5 me-0 " id="header">
        <div class="card ">
            <div class="card-img bg-dark">

                <img src="https://assets.isu.pub/document-structure/230706124514-f43572b407f2f49a02862ad3654b9f51/v1/e9f1930f1d9bfd24be9bc0c1081dd6d0.jpeg"
                     class="float-end" style="min-width: 51em; height:65vh" alt="...">
            </div>
            <div class="card-img-overlay  text-primary">
                <div class="container float-start w-50">
                    <p class="breadcrumb text-primary">Innovation Hub</p>
                    <h1 class="text-primary">Innovation Hub</h1>
                    <!-- <h2>Orange Innovation Hub is a place where futuristic ideas and current realities are knit together with cutting-edge technology, to bring new ideas to life. </h2> -->
                    <h4 class="card-text text-white">Orange Innovation Hub is a place where futuristic ideas and
                        current realities are knit together with cutting-edge technology, to bring new ideas to
                        life.</h4>
                    <a href="#joinInnovation" class="btn btn-primary">Become Innovator</a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Section 2: Activities we Offer -->
<section class="my-5">
    <div class="container px-5 center">
        <h2>Activities We Offer</h2>
    </div>

    <div class="container">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <hr>
                    <h3 class="text-primary">Innovation in residence</h3>
                    <p class="lead">Nurturing innovation creative mind will present their innovative idea to an
                        expert panel,
                        evaluating their entrepreneurship potential. Remarkable ideas will earn prospect for growth
                        within Orange Innovation Hub </p>
                </div>
                <div class="col">
                    <img src="../../../../public/assets/img/rocket.png" alt="">
                    <hr>
                    <h3 class="text-primary">Innovation Workshop</h3>
                    <p class="lead">Exploding digital innovation, our workshops inspire participant to idea and
                        craft tech
                        solutions addressing market needs,</p>
                </div>
                <div class="col">
                    <hr>
                    <h3 class="text-primary">Innovation Programs: Hackathon, Bootcamp, Problem Solving and idea
                        generation</h3>
                    <p class="lead">idea exploration and validation, our innovation activities empower participants
                        to create
                        user-centric solutions that are suitable for the Jordanian market , validate them and
                        explore.</p>
                </div>
                <div class="col">
                    <hr>
                    <h3 class="text-primary">technology event</h3>
                    <p class="lead">Spotlighting tech advancements our hub hosts divers' events welcoming tech
                        enthusiasts,
                        researchers, and speakers to unveil the latest innovation and technology</p>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>
<!-- Section 3: Become Innovator -->
<section id="joinInnovation" class="my-5">

    <div class="container px-5 center">
        <h2>Become Innovator</h2>
    </div>

    <!-- Section 2: Activities we Offer -->
    <div class="container">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <a href="{{route('innovation-hub.book-tour')}}">
                        <img class="img-fluid" src="{{asset('/assets/img/innovation-hub.png')}}" alt="a picture of mind">
                        <h3 class="text-primary">Book a Tour</h3>
                    </a>
                    <p class="lead">Nurturing innovation creative mind will present their innovative idea to an
                        expert panel,
                        evaluating their entrepreneurship potential. Remarkable ideas will earn prospect for growth
                        within Orange Innovation Hub </p>
                </div>
                <div class="col">
                    <a href="{{route('innovation-hub.workshops')}}">
                        <img class="img-fluid" src="{{asset('/assets/img/innovation-hub.png')}}" alt="a picture of mind">
                        <h3 class="text-primary">Join an Innovation Workshop</h3>
                    </a>
                    <p class="lead">Exploding digital innovation, our workshops inspire participant to idea and
                        craft tech
                        solutions addressing market needs,</p>
                </div>
                <div class="col">
                    <a href="{{route('innovation-hub.program')}}">
                        <img class="img-fluid" src="{{asset('/assets/img/innovation-hub.png')}}" alt="a picture of mind">
                        <h3 class="text-primary">Join Our Program</h3>
                    </a>
                    <p class="lead">idea exploration and validation, our innovation activities empower participants
                        to create
                        user-centric solutions that are suitable for the Jordanian market , validate them and
                        explore.</p>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
