@extends ('frontend.layouts.app')
@section('content')
    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Special Menu</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    <!-- Start Menu -->
    <div class="menu-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Special Menu</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                    </div>
                </div>
            </div>

            <div class="row inner-menu-box">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                            aria-controls="v-pills-home" aria-selected="true">All</a>
                        @foreach ($categories as $category)
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                href="#{{ $category->slug }}" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">{{ $category->title }}
                            </a>
                        @endforeach

                        {{-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                            role="tab" aria-controls="v-pills-messages" aria-selected="false">Lunch</</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                                role="tab" aria-controls="v-pills-settings" aria-selected="false">Dinner</a> --}}
                    </div>
                </div>

                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-lg-4 col-md-6 special-grid drinks">
                                        <div class="gallery-single fix">
                                            <img src="{{ asset($product->image_path) }}" class="img-fluid"
                                                alt="Image">
                                            <div class="why-text">
                                                <h4>{{ $product->title }}</h4>
                                                <h5>Rs.{{ $product->price }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @foreach ($categories as $category)
                            <div class="tab-pane fade" id="{{ $category->slug }}" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <div class="row">
                                    @foreach ($products as $product)
                                        @if ($product->category->slug == $category->slug)
                                            <div class="col-lg-4 col-md-6 special-grid drinks">
                                                <div class="gallery-single fix">
                                                    <img src="{{ asset($product->image_path) }}" class="img-fluid"
                                                        alt="Image">
                                                    <div class="why-text">
                                                        <h4>{{ $product->title }}</h4>
                                                        <h5>Rs.{{ $product->price }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Menu -->
@endsection
