@extends ('frontend.layouts.app')
@section('content')


  <!-- Event -->
<section class="overlay_bg_50">
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Events</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                    <li class="breadcrumb-item active">Events</li>
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
                        <a data-toggle="tab" class="nav-link active" href="#past" role="tab">Past Events</a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" class="nav-link" href="#current" role="tab">Current Events</a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" class="nav-link" href="#upcoming" role="tab">Upcoming Events</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>

        <div class="tab-content">
            <!-- Past Events -->
            <div class="tab-pane active" id="past">
                <div class="causes-wrap row">
                    @forelse($pastEvents as $event)
                        <div class="col-md-4 xs-padding">
                            <a href="{{ route('event.detail', $event->id) }}">
                                <div class="causes-content">
                                    <div class="causes-thumb">
                                        <img src="{{ asset($event->image) }}" alt="Event Image">
                                    </div>
                                    <div class="causes-details">
                                        <h3>{{ $event->title }}</h3>
                                        <p>{{ Str::limit(ucfirst($event->meta_description, 100) }}</p>
                                        <p style="font-size:12px"><i class="ti-calendar"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</p>
                                        <a href="{{ route('event.detail', $event->id) }}" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <p class="text-center">No past events found.</p>
                    @endforelse
                </div>
            </div>

            <!-- Current Events -->
            <div class="tab-pane" id="current">
                <div class="causes-wrap row">
                    @forelse($currentEvents as $event)
                        <div class="col-md-4 xs-padding">
                            <a href="{{ route('event.detail', $event->id) }}">
                                <div class="causes-content">
                                    <div class="causes-thumb">
                                        <img src="{{ asset($event->image) }}" alt="Event Image">
                                    </div>
                                    <div class="causes-details">
                                        <h3>{{ $event->title }}</h3>
                                        <p>{{ Str::limit(ucfirst($event->meta_description, 100) }}</p>
                                        <p style="font-size:12px"><i class="ti-calendar"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</p>
                                        <a href="{{ route('event.detail', $event->id) }}" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <p class="text-center">No current events available.</p>
                    @endforelse
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="tab-pane" id="upcoming">
                <div class="causes-wrap row">
                    @forelse($upcomingEvents as $event)
                        <div class="col-md-4 xs-padding">
                            <a href="{{ route('event.detail', $event->id) }}">
                                <div class="causes-content">
                                    <div class="causes-thumb">
                                        <img src="{{ asset($event->image) }}" alt="Event Image">
                                    </div>
                                    <div class="causes-details">
                                        <h3>{{ $event->title }}</h3>
                                        <p>{{ Str::limit(ucfirst($event->meta_description, 100) }}</p>
                                        <p style="font-size:12px"><i class="ti-calendar"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</p>
                                        <a href="{{ route('event.detail', $event->id) }}" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <p class="text-center">No upcoming events scheduled.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- START SECTION EVENT -->
  <!-- Event -->



@endsection
