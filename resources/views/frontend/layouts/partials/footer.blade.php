	<!-- Start Footer -->

    <section class="widget-section padding">
        <div class="container">
            <div class="widget-wrap row">
                <div class="col-md-4 xs-padding">
                    <div class="widget-content">
                        <img src="{{asset('backend/assets/images/logo.jfif')}}" alt="SERAP LEE FOUNDATION" class="img-fluid footer_logo_img">
                        <p>The secret to happiness lies in helping others. Never underestimate the difference YOU can make in the lives of the poor</p>
                        <ul class="social-icon">
                            @if(setting('facebook') !=null)
                                <li><a href="{{setting('facebook')}}"><i class="ti-facebook"></i></a></li>
                            @endif

                            @if(setting('twitter') !=null)
                                <li><a href="{{setting('twitter')}}"><i class="ti-twitter-alt"></i></a></li>
                            @endif

                            @if(setting('instagram') !=null)
                                <li><a href="{{setting('instagram')}}"><i class="ti-instagram"></i></a></li>
                            @endif

                            @if(setting('youtube') !=null)
                                <li><a href="{{setting('youtube')}}"><i class="ti-youtube"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 xs-padding">
                    <div class="widget-content">
                        <h3>Quick Links</h3>
                        <ul class="quick-links">
                            <li><a href="{{ route('homepage') }}"><i class="ti-minus"></i>Home</a></li>
                            <li><a href="{{ route('about') }}"><i class="ti-minus"></i>About Us</a></li>
                            <li><a href="{{ route('events') }}"><i class="ti-minus"></i>Services</a></li>
                            <li><a href="{{ route('gallery') }}"><i class="ti-minus"></i>Gallery</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 xs-padding">
                    <div class="widget-content">
                        <h3>Charitify Location</h3>
                        <ul class="address">
                            @if(setting('email') !=null)
                                <li><i class="ti-email"></i> {{setting('email')}}</li>
                            @endif

                            @if(setting('phone') !=null)
                                <li><i class="ti-mobile"></i> {{setting('phone')}}</li>
                            @endif

                            @if(setting('domain') !=null)
                                <li><i class="ti-world"></i> {{setting('domain')}}</li>
                            @endif

                            @if(setting('address') !=null)
                                <li><i class="ti-location-pin"></i> {{setting('address')}}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- ./Widget Section -->

    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 sm-padding">
                    <div class="copyright"> 2025 Serap Lee Foundation Powered by <a href=" https://www.shubhamtec.com" target="_blank">Shubham Tech </a> </div>
                </div>
                <div class="col-md-6 sm-padding">
                    <ul class="footer-social">
                        <li><a href="{{route('page.detail','orders')}}">Orders</a></li>
                        <li><a href="{{route('page.detail','terms')}}">Terms</a></li>
                        <li><a href="{{route('page.detail','report-problem')}}">Report Problem</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!-- /Footer Section -->
	<!-- End Footer -->




