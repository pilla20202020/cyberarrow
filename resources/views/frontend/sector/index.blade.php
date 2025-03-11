@extends ('frontend.layouts.app')
@section('content')

<!-- START SECTION BREADCRUMB -->

<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="assets/images/about_bg.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>Sectors</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('sectors') }}">Sectors</a></li>
                    </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BANNER -->
@if ($sectors->isNotEmpty())


    <!-- START SECTION FEATURE -->

        <section class="bg_gray">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                        <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                            <div class="heading_s1 text-center">
                                <h2>Sectors</h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row sectorslider">
                    <div class="col-12 animation">
                        <div class="cat_overlap_box course_categories carousel_slider owl-carousel owl-theme nav_style1 icon_box text-center icon_box_style2 radius_all_10 animation" data-margin="15" data-nav="true" data-dots="false" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "1"}, "380":{"items": "2"}, "576":{"items": "3"}, "1000":{"items": "3"}, "1199":{"items": "3"}}'>
                            @foreach ($sectors as $sectorsData)
                            <a href="{{ route('sectors.detail', $sectorsData->slug) }}">
                                <div class="sectorsdetail">
                                    <div class="single_categories">
                                        <div class="sectorsdetailimage mb-6">
                                            <img src="{{asset($sectorsData->icon_path)}}" />
                                        </div>
                                        <div class="sectorsdetailintro_desc">
                                            <h6 class="mb-1 mt-1">{{$sectorsData->title}}</h6>
                                            <span class="text-center"> {!! Str::limit(ucfirst($sectorsData->content, 130) !!}  </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            </div>
        </section>

    <!-- END SECTION FEATURE -->
@endif
@stop
