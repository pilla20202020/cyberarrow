@extends ('frontend.layouts.app')
@section('content')

<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <h1>Staff</h1>
            </div>
        </div>
    </div>
</div>
<!-- End All Pages -->

<!-- Start Stuff -->
<div class="stuff-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Staff</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($teams as $team)
            <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{asset($team->image_path)}}">
                            <ul class="social">
                                <li><a href="{{$team->facebook}}" class="fa fa-facebook"></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h3 class="title">{{$team->title}}</h3>
                            <span class="post">{{$team->position}}</span>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
