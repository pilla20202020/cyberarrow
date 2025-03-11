@extends ('frontend.layouts.app')
@section('content')

<!-- START SECTION BREADCRUMB -->
<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="assets/images/about_bg.jpg">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-sm-6">
            	<div class="page-title">
            		<h1>Financial Information</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('download') }}">Download Form</a></li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

<!-- START SECTION DOWNLOADS -->

<section class="download">
    <div class="container">
        <div class="row">
            @foreach($downloads as $download)
                <div class="col-12">
                    <div class="download_inner">
                        <div class="download_content">
                            <div class="download_link">
                                 <a href="{{asset($download->document_path)}}" target="_blank">
                                <i class="fas fa-external-link-alt mr-1" style="font-size: 13px;"></i>
                                <span class="download_title">{{$download->title}}</span>
                                </a>
                            </div>
                            <div class="download_icon">
                                <a href="{{asset($download->document_path)}}" download="{{$download->title}}">
                                    <i class="fas fa-download"></i>
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- END SECTION DOWNLOADS -->


@endsection