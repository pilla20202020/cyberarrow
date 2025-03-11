@extends ('frontend.layouts.app')
@section('content')

<!-- START PROJECT DETAIL -->
<section>
	<div class="container">
        <div class="row">
          @if($projects)
            <div class="col-lg-9">
                
                      <div class="single_course">
                          
                          <div class="course_img">
                              <a href="#">
                                  <img src="{{asset($projects->image_path)}}" alt="course_img_big">
                              </a>
                          
                          </div>

                          
                          
                          <div class="course_tabs">
                        <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item">
                                  <a class="nav-link active" id="overview-tab1" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                              </li>
                              

                              <li class="nav-item">
                                <a class="nav-link" id="url-tab1" data-toggle="tab" href="#url" role="tab" aria-controls="url" aria-selected="false">URL Link</a>
                            </li>
                            
                          </ul>
                          <div class="tab-content">
                              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab1">
                                <div class="border radius_all_5 tab_box"> <p>{!!$projects->content!!}</p></div>
                              </div>
                             
                              
                              
                                <div class="tab-pane fade" id="url" role="tabpanel" aria-labelledby="url-tab1">
                                  <iframe width="720" height="315" src="{{$projects->link_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              </div>
                            
                            
                              
                          </div>
                      </div>
                          
                      
            </div>
          @endif

           
            
        </div>

        <div class="col-lg-3 mt-lg-0 mt-4 pt-3 pt-lg-0">
          <div class="sidebar">

                  <div class="widget widget_recent_post ">
                      <h5 class="widget_title">Sectors</h5>

                      <ul lass="recent_post border_bottom_dash list_none">
                          @foreach($sectors as $sector) 
                              <li>
                                  <div class="post_footer mb-3">
                                      <div class="post_img">
                                          <a href="{{route('sectors.detail',$sector->slug)}}"><img src="{{asset($sector->thumbnail_path)}}"
                                                           alt="{{$sector->title}}"></a>
                                      </div>
                                      <div class="post_content">
                                          <h6><a href="{{route('sectors.detail',$sector->slug)}}">{{$sector->title}}</a></h6>
                                      </div>
                                  </div>
                              </li>
                          @endforeach
              
                      </ul>
                  </div>
       
                  <div class="widget widget_recent_post mt-5 ">
                      <h5 class="widget_title">Recent Projects</h5>
                      <ul class="recent_post border_bottom_dash list_none">
                          
                           @foreach($projectses as $projects)
                              <li>
                                  <div class="post_footer">
                                      <div class="post_img">
                                          <a href="{{route('projects.detail',$projects->slug)}}"><img src="{{asset($projects->thumbnail_path)}}"
                                                          ></a>
                                      </div>
                                      <div class="post_content">
                                          <h6><a href="{{route('projects.detail',$projects->slug)}}">{{$projects->title}}</a></h6>
                                          @if(!empty($events->events_date))
                                          <span class="post_date">{{$events->events_date->format('M d, Y')}}</span>
                                              @endif
                                      </div>
                                  </div>
                              </li>
                          @endforeach
                      </ul>
                  </div>
         
          </div>
      </div>
    </div>
</section>
<!-- END PROJECT DETAIL -->



@endsection