@extends ('frontend.layouts.app')
@section('content')

  <!-- Event -->
  <section class="overlay_bg_50">
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Contact Us</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                    <li class="breadcrumb-item active">Contact Us</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- /Page Header -->

<section class="contact-section padding">
    <div class="container">
        <div class="section-heading text-center mb-40">
            <h2>Contact Us</h2>
        </div>
        <div class="row contact-wrap">
            <div class="col-md-6 xs-padding">
                <div class="map-container">
                    @if(setting('maps') !=null)
                        <iframe src="{{setting('maps')}}" width="500" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                        <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d70583.66518626417!2d85.31122492561778!3d27.690618824853658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m5!1s0x39eb199612ca0981%3A0xb87d3af41b8cf943!2sNabil%20Bank%20Ltd%2C%20M8QP%2BM6G%2C%20Devkota%20Sadak%2C%20Kathmandu%2044600!3m2!1d27.6892061!2d85.3355338!4m0!5e1!3m2!1sen!2snp!4v1739691700279!5m2!1sen!2snp" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    @endif
                </div>
            </div>
            <div class="col-md-6 xs-padding">
                @if(Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success" id="alert-success">
                    {{Illuminate\Support\Facades\Session::get('success')}}
                </div>
                @endif
                <div class="contact-form">
                    <h3>Drop us a line</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <form action="{{route('send-contact')}}" method="POST">
                        @csrf
                        <div class="form-group colum-row row">
                            <div class="col-sm-6">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-sm-6 mt-2">
                                <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea id="message" name="message" cols="30" rows="5" class="form-control message" placeholder="Enter The Message" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button id="submit" class="default-btn" type="submit">Send Message</button>
                            </div>
                        </div>
                        <div id="form-messages" class="alert" role="alert"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Contact Section -->

@endsection

@push('scripts')
    <script>
        setTimeout(function(){
            $('#alert-success').hide();
        }, 3000);
    </script>
@endpush



