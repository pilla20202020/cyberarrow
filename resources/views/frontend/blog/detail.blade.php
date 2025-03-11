@extends ('frontend.layouts.app')
@section('content')


  <!-- blog -->

    <!-- Event -->
<section class="overlay_bg_50">
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>{{$blog->title}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                    <li class="breadcrumb-item active">{{$blog->title}}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- /Page Header -->

  <section class="blog-section bg-grey padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 sm-padding">
                <div class="blog-items single-post row">
                    <img src="{{asset($blog->image)}}" alt="{{$blog->title}}" class="img-fluid">
                    <h2>{{$blog->title}}</h2>
                    <div class="container mt-3">
                        <div class="row">
                            <p>{!!$blog->content!!}</p>
                        </div>
                    </div>

                </div>
            </div><!-- Blog Posts -->
            <div class="col-lg-3 sm-padding">
                <div class="sidebar-wrap">
                    <div class="sidebar-widget mb-50">
                        <h4>Other Post</h4>
                        <ul class="recent-posts">
                            @if (isset($blogs))
                                @foreach ($blogs as $blog)
                                    <li>
                                        <img src="{{asset($blog->image)}}" alt="{{$blog->title}}">
                                        <div>
                                            <h4><a href="{{route('blog.detail', $blog->id)}}">{{$blog->title}}</a></h4>
                                            <span class="date" style="font-size: 12px"><i class="ti-calendar"></i> {{ \Carbon\Carbon::parse($blog->blog_date)->format('M d, Y') }}</span>
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
