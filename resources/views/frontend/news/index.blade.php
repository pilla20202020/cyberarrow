@extends ('frontend.layouts.app')
@section('content')


  <!-- Event -->
<section class="overlay_bg_50">
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>News & Notices</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                    <li class="breadcrumb-item active">News & Notices</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- /Page Header -->



<!-- START SECTION EVENT -->
<section class="events-section bg-grey bd-bottom padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a data-toggle="tab" class="nav-link active" href="#news" role="tab">News</a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" class="nav-link" href="#notices" role="tab">Notices</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>

        <div class="tab-content">
            <!-- News -->
            <div class="tab-pane active" id="news">
                <div class="causes-wrap row">
                    @forelse($allNews as $data)
                        <div class="col-md-4 xs-padding">
                            <a href="{{ route('news.detail', $data->id) }}">
                                <div class="causes-content">
                                    <div class="causes-thumb">
                                        <img src="{{ asset($data->image) }}" alt="News Image">
                                    </div>
                                    <div class="causes-details">
                                        <h3>{{ $data->title }}</h3>
                                        <p>{{ Str::limit(ucfirst($data->meta_description, 100) }}</p>
                                        <p style="font-size:12px"><i class="ti-calendar"></i> {{ \Carbon\Carbon::parse($data->event_date)->format('M d, Y') }}</p>
                                        <a href="{{ route('news.detail', $data->id) }}" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <p class="text-center">No news found.</p>
                    @endforelse
                </div>
            </div>

            <!-- Notices -->
            <div class="tab-pane" id="notices">
                <div class="causes-wrap row">
                    @forelse($allNoticies as $data)
                        <div class="col-md-4 xs-padding">
                            <a href="{{ route('news.detail', $data->id) }}">
                                <div class="causes-content">
                                    <div class="causes-thumb">
                                        <img src="{{ asset($data->image) }}" alt="data Image">
                                    </div>
                                    <div class="causes-details">
                                        <h3>{{ $data->title }}</h3>
                                        <p>{{ Str::limit(ucfirst($data->meta_description, 100) }}</p>
                                        <p style="font-size:12px"><i class="ti-calendar"></i> {{ \Carbon\Carbon::parse($data->data_date)->format('M d, Y') }}</p>
                                        <a href="{{ route('news.detail', $data->id) }}" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <p class="text-center">No notices available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- START SECTION EVENT -->
  <!-- Event -->



@endsection
