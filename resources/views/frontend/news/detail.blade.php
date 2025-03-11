@extends ('frontend.layouts.app')
@section('content')



    <!-- Event -->
    <section class="overlay_bg_50">
        <div class="pager-header">
            <div class="container">
                <div class="page-content">
                    <h2>News and Notices</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                        <li class="breadcrumb-item active">{{$newsDetail->title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- /Page Header -->
  <!-- Event -->

  <section class="blog-section bg-grey padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 sm-padding">
                <div class="blog-items single-post row">
                    <img src="{{asset($newsDetail->image)}}" alt="{{$newsDetail->title}}" class="img-fluid">
                    <h2>{{$newsDetail->title}}</h2>
                    <div class="container mt-3">
                        <div class="row">
                            <p>{!!$newsDetail->content!!}</p>
                        </div>
                    </div>

                </div>
            </div><!-- Blog Posts -->
            <div class="col-lg-3 sm-padding">
                <div class="sidebar-wrap">
                    <div class="sidebar-widget mb-50">
                        <h4>News and Noticies</h4>
                        <ul class="recent-posts">
                            @if (isset($news))
                                @foreach ($news as $data)
                                    <li>
                                        <img src="{{asset($data->image)}}" alt="{{$data->title}}">
                                        <div>
                                            <h4><a href="{{route('news.detail', $data->id)}}">{{$data->title}}</a></h4>
                                            <span class="date" style="font-size: 12px"><i class="ti-calendar"></i> {{ \Carbon\Carbon::parse($data->date)->format('M d, Y') }}</span>
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
