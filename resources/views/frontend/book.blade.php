@extends ('frontend.layouts.app')
@section('content')

<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
  <div class="container text-center">
    <div class="row">
      <div class="col-lg-12">
        <h1>Reservation</h1>
      </div>
    </div>
  </div>
</div>
<!-- End All Pages -->

<!-- Start Reservation -->
<div class="reservation-box">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="heading-title text-center">
          <h2>Reservation</h2>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="contact-block">
          @if(Illuminate\Support\Facades\Session::has('success'))
          <div class="alert alert-success">
              {{Illuminate\Support\Facades\Session::get('success')}}
          </div>
           @endif
          <form method="post" name="enq" action="{{route('booking-details')}}">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <h3>Book a table</h3>
                <div class="col-md-12">
                  <div class="form-group">
                    <input id="input_date" placeholder="Date" class="datepicker picker__input form-control" name="date" type="date" value="" equired data-error="Please enter Date">
                    <div class="help-block with-errors"></div>
                  </div>                                 
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input id="input_time" placeholder="Time" class="time form-control picker__input" type="time" name="time" required data-error="Please enter time">
                    <div class="help-block with-errors"></div>
                  </div>                                 
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input id="input_time" placeholder="Number of Person" class="time form-control picker__input" name="partysize" required data-error="Please enter number of person">
                    <div class="help-block with-errors"></div>
                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                <h3>Contact Details</h3>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
                    <div class="help-block with-errors"></div>
                  </div>                                 
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" placeholder="Your Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                    <div class="help-block with-errors"></div>
                  </div> 
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" placeholder="Your Numbar" id="phone" class="form-control" name="phone" required data-error="Please enter your Numbar">
                    <div class="help-block with-errors"></div>
                  </div> 
                </div>
              </div>
              <div class="col-md-12">
                <div class="submit-button text-center">
                  <button class="btn btn-common" id="submit" type="submit">Book Table</button>
                  <div id="msgSubmit" class="h3 text-center hidden"></div> 
                  <div class="clearfix"></div> 
                </div>
              </div>
            </div>            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Reservation -->

@stop
