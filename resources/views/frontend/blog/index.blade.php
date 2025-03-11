@extends ('frontend.layouts.app')
@section('content')


  <!-- blog -->
<section class="overlay_bg_50">
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                @if ($type == "recent-stories")
                    <h2>Recent Stories</h2>
                @elseif ($type == "recent-cause")
                    <h2>Recent Causes</h2>
                @else
                    <h2>Blogs</h2>
                @endif
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                    @if ($type == "recent-stories")
                        <li class="breadcrumb-item active">Recent Stories</li>

                    @elseif ($type == "recent-cause")
                        <li class="breadcrumb-item active">Recent Causes</li>
                    @else
                        <li class="breadcrumb-item active">Blogs</li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- /Page Header -->



<!-- START SECTION blog -->
<!-- Blog Section -->
<section class="blog-section bg-grey bd-bottom padding">
    <div class="container">
        <div class="section-heading text-center mb-40">
            @if ($type == "recent-stories")
                <h2>Recent Stories</h2>
            @elseif ($type == "recent-cause")
                <h2>Recent Causes</h2>
            @else
                <h2>Blogs</h2>
            @endif
            <span class="heading-border"></span>
            <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
        </div><!-- /Section Heading -->
        <div class="row">
            <div class="col-lg-12 xs-padding">
                <div class="blog-items grid-list row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-4 padding-15">
                            <div class="blog-post">
                                <a href="{{route('blog.detail', $blog->id)}}">
                                    <img src="{{asset($blog->image)}}" alt="blog post">
                                    <div class="blog-content">
                                        {{-- <span class="date"><i class="fa fa-clock-o"></i> January 01.2021</span> --}}
                                        <h3><a href="{{route('blog.detail', $blog->id)}}">{{$blog->title}}</a></h3>
                                        <p>{{$blog->short_description}}</p>
                                        <a href="{{route('blog.detail', $blog->id)}}" class="post-meta">Read More</a>
                                    </div>
                                </a>
                            </div>
                        </div><!-- Post 1 -->
                    @endforeach

                </div>
            </div><!-- Blog Posts -->
        </div>
    </div>
</section><!-- Blog Section -->
<!-- START SECTION blog -->
  <!-- blog -->



@endsection
