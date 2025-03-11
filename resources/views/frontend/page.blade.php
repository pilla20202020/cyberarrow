
@extends ('frontend.layouts.app')
@section('content')


  <!-- Event -->
  <section class="overlay_bg_50">
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>{{$page->title}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                    <li class="breadcrumb-item active">{{$page->title}}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- /Page Header -->


    	<!-- About Section Start -->
        <section class="blog-section bg-grey padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 sm-padding">
                        <div class="blog-items single-post row">
                            @if ($page->image)
                                <img src="{{asset($page->image)}}" alt="{{$page->title}}" class="img-fluid">
                            @endif
                            <h2>{{$page->title}}</h2>
                            <div class="container mt-3">
                                <div class="row">
                                    <p>{!!$page->content!!}</p>
                                </div>
                            </div>

                        </div>
                    </div><!-- Blog Posts -->

                    <div class="col-lg-3 sm-padding">
                        <div class="sidebar-wrap">
                            <div class="sidebar-widget mb-50">
                                <h4>Events</h4>
                                <ul class="recent-posts">
                                    @if (isset($events))
                                        @foreach ($events as $event)
                                            <li>
                                                <img src="{{asset($event->image)}}" alt="{{$event->title}}">
                                                <div>
                                                    <h4><a href="{{route('event.detail', $event->id)}}">{{$event->title}}</a></h4>
                                                    <span class="date" style="font-size: 12px"><i class="ti-calendar"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif


                                </ul>
                            </div><!-- Recent Posts -->

                        </div><!-- /Sidebar Wrapper -->

                        <div class="sidebar-wrap">
                            <div class="sidebar-widget mb-50">
                                <h4>News & Notices</h4>
                                <ul class="recent-posts">
                                    @if (isset($news))
                                        @foreach ($news as $data)
                                            <li>
                                                <img src="{{asset($data->image)}}" alt="{{$data->title}}">
                                                <div>
                                                    <h4><a href="{{route('news.detail', $data->id)}}">{{$data->title}}</a></h4>
                                                    <span class="date" style="font-size: 12px"><i class="ti-calendar"></i> {{ \Carbon\Carbon::parse($data->event_date)->format('M d, Y') }}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif


                                </ul>
                            </div><!-- Recent Posts -->

                        </div><!-- /Sidebar Wrapper -->
                    </div>
                </div>
            </div>
        </section>


@endsection
