@extends ('frontend.layouts.app')
@section('content')

 <!-- START SECTION BREADCRUMB -->
 <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="{{asset('assets/images/about_bg.jpg')}}">
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
<!-- START SECTION COURSE DETAIL -->
<section>
	<div class="container">
        <div class="row">
            @if($sectors)
        	<div class="col-lg-9">
               
                    <div class="single_course">

                        
                        <div class="course_img">
                            <a href="#">
                                <img src="{{asset($sectors->image_path)}}" alt="course_img_big">
                            </a>
                        
                        </div>
                        
                        <div class="course_tabs">
                    	<ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="overview-tab1" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="curriculum-tab1" data-toggle="tab" href="#curriculum" role="tab" aria-controls="curriculum" aria-selected="false">Curriculum</a>
                            </li>
                           
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab1">
                               <div class="border radius_all_5 tab_box"> <p>{!!$sectors->content!!}</p></div>
                            </div>
                            <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab1">
                                <div id="accordion" class="accordion">
                                    <div class="card">
                                      <div class="card-header" id="heading-1-One">
                                        <h6 class="mb-0"> <a data-toggle="collapse" href="#collapse-1-One" aria-expanded="true" aria-controls="collapse-1-One">Leap into electronic typesetting <span class="item_meta duration">30 min</span></a></h6>
                                      </div>
                                      <div id="collapse-1-One" class="collapse show" aria-labelledby="heading-1-One" data-parent="#accordion">
                                        <div class="card-body">
                                        	<p>Lorem Ipsu. is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card">
                                      <div class="card-header" id="heading-1-Two">
                                        <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapse-1-Two" aria-expanded="false" aria-controls="collapse-1-Two">Letraset sheets containing <span class="item_meta duration">30 min</span></a> </h6>
                                      </div>
                                      <div id="collapse-1-Two" class="collapse" aria-labelledby="heading-1-Two" data-parent="#accordion">
                                        <div class="card-body">
                                        	<p>Lorem Ipsu. is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card">
                                      <div class="card-header" id="heading-1-Three">
                                        <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapse-1-Three" aria-expanded="false" aria-controls="collapse-1-Three">took a galley of type <span class="item_meta duration">45 min</span></a> </h6>
                                      </div>
                                      <div id="collapse-1-Three" class="collapse" aria-labelledby="heading-1-Three" data-parent="#accordion">
                                        <div class="card-body">
                                        	<p>Lorem Ipsu. is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                           
                            
                        </div>
                    </div>
                        
                    </div>
            </div>
            @endif

           
            <div class="col-lg-3 mt-lg-0 mt-4 pt-3 pt-lg-0">
                @if($projects->isNotEmpty())
            	<div class="sidebar">
                    <div class="widget widget_recent_post">
                    	<h5 class="widget_title">Recent Projects</h5>
                       
                        <ul class="recent_post border_bottom_dash list_none">
                            @foreach($projects as $project) 
                                <li>
                                    <div class="post_footer">
                                        <div class="post_img">
                                            <a href="{{ route('projects.detail', $project->slug) }}"><img src="{{asset($project->image_path)}}" alt="letest_post1"></a>
                                        </div>
                                        <div class="post_content">
                                            <h6><a href="{{ route('projects.detail', $project->slug) }}">{!! $project->title !!}</a></h6>
                                           
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        
                    </div>
                    
                </div>
                @endif


                @if($clients->isNotEmpty())
                <div class="sidebar">

                    <div class="widget widget_recent_clients">
                    	<h5 class="widget_title pt-4">Our Clients</h5>

                        <div class="cat_overlap_box course_categories carousel_slider owl-carousel owl-theme nav_style1" data-margin="15" data-nav="true" data-dots="false" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "576":{"items": "1"}, "1000":{"items": "1"}, "1199":{"items": "1"}}'>
                            @foreach($clients as $client)  
                                <div class="item">
                                    <div class="single_categories">
                                        <a href="#"><img src="{{asset($client->image_path)}}" alt="cl_logo1"/></a>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                    
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- END SECTION COURSE DETAIL -->



@endsection