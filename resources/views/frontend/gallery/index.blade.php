@extends ('frontend.layouts.app')
@section('content')

  <!-- Event -->
  <section class="overlay_bg_50">
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Gallery</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                    <li class="breadcrumb-item active">Gallery</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- /Page Header -->

	<!-- Start Gallery -->
	<section class="gallery-section bg-grey bd-bottom padding">
        <div class="container">
            <div class="row">
                <ul class="gallery-filter align-center mb-30">
                    <li class="active" data-filter="*">All</li>
                    @foreach ($albums as $album)
                        {{-- <li><a href="#" data-filter=".{{$album->slug}}">{{$album->name}}</a></li> --}}
                        <li data-filter=".{{$album->slug}}">{{$album->name}}</li>
                    @endforeach
                </ul><!-- /.gallery filter -->
            </div>
            <div class="gallery-items row">
                @if($galleries)
                    @foreach($galleries as $gallery)
                        <div class="col-lg-4 col-sm-6 single-item {{$gallery->album->slug}} design">
                            <div class="gallery-wrap">
                                <img src="{{asset($gallery->image)}}" alt="gallery">
                                <div class="hover">
                                    <a class="img-popup" data-gall="galleryimg" href="{{asset($gallery->image)}}"><i class="ti-image"></i></a>
                                </div>
                            </div>
                        </div><!-- /Item-1 -->
                    @endforeach
                @endif
            </div>
        </div>
    </section><!-- /Gallery Section -->
	<!-- End Gallery -->

@endsection
