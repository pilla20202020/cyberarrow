@extends ('frontend.layouts.app')
@section('content')

<!-- START SECTION BREADCRUMB -->
<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="assets/images/about_bg.jpg">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-sm-6">
            	<div class="page-title">
            		<h1>Projects</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('projects') }}">Projects</a>
                    </li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

       <!-- START SECTION PROJECT -->
       @if ($projects->isNotEmpty())
       <section class="small_pt">
           <div class="container">
               <div class="row justify-content-center">
                   <div class="col-xl-6 col-lg-8">
                       <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                           <div class="heading_s1 text-center">
                               <h2>Projects</h2>
                           </div>

                       </div>
                   </div>
               </div>
           </div>


           <div class="container">
               <div class="row">
                   <div class="col-md-12 text-center">
                       <ul class="list_none grid_filter">
                           <li><a href="#" class="current" data-filter="*">all</a></li>
                           <li><a href="#" data-filter=".Ongoing">Ongoing</a></li>
                           <li><a href="#" data-filter=".Completed">Completed</a></li>

                       </ul>
                   </div>
               </div>
               <div class="row">
                   <div class="col-md-12">
                       <ul class="grid_container gutter_medium grid_col3">
                           <li class="grid-sizer"></li>
                           <!-- START PORTFOLIO ITEM -->
                           @foreach ($onlineprojects as $projectsData)
                           <li class="grid_item Ongoing">
                               <div class="gallery_item">
                                   <div class="content_box event_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                                       <div class="content_img radius_ltrt_10">
                                            <a href="{{ route('projects.detail', $projectsData->slug) }}"><img src="{{ asset($projectsData->image_path) }}" alt="event_img1"/></a>
                                           <div class="event_date radius_all_5">


                                                    @if($projectsData->type =='Completed')
                                                       <span style="background-color: #419645">{{$projectsData->type ? 'Completed' : 'Ongoing'}}</span>
                                                   @elseif($projectsData->type =='Ongoing')
                                                       <span  style="background-color: #f44336">{{$projectsData->type ? 'Ongoing' : 'Completed'}}</span>
                                                   @endif

                                           </div>
                                       </div>
                                       <div class="content_desc">
                                           <h4 class="content_title"><a href="#"><span> {{ $projectsData->title }}</span></a></h4>

                                               <span>{!! Str::limit(ucfirst($projectsData->content, 200) !!}</span>
                                           </h4>
                                       </div>
                                   </div>

                               </div>
                           </li>
                           @endforeach
                           <!-- END PORTFOLIO ITEM -->
                           <!-- START PORTFOLIO ITEM -->
                           <li class="grid-sizer"></li>
                           <!-- START PORTFOLIO ITEM -->
                           @foreach ($completedprojects as $projectsData)
                           <li class="grid_item Completed">
                               <div class="gallery_item">
                                   <div class="content_box event_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                                       <div class="content_img radius_ltrt_10">
                                            <a href="{{ route('projects.detail', $projectsData->slug) }}"><img src="{{ asset($projectsData->image_path) }}" alt="event_img1"/></a>
                                           <div class="event_date radius_all_5">


                                                    @if($projectsData->type =='Completed')
                                                       <span style="background-color: #419645">{{$projectsData->type ? 'Completed' : 'Ongoing'}}</span>
                                                   @elseif($projectsData->type =='Ongoing')
                                                       <span  style="background-color: #f44336">{{$projectsData->type ? 'Ongoing' : 'Completed'}}</span>
                                                   @endif

                                           </div>
                                       </div>
                                       <div class="content_desc">
                                           <h4 class="content_title"><a href="#"><span> {{ $projectsData->title }}</span></a></h4>

                                               <span>{!! Str::limit(ucfirst($projectsData->content, 200) !!}</span>
                                           </h4>
                                       </div>
                                   </div>

                               </div>
                           </li>
                           @endforeach

                       </ul>
                   </div>
               </div>
           </div>
       </section>
   @endif
    <!-- START SECTION PROJECT -->

@endsection
