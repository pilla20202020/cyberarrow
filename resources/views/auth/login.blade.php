@extends('backend.layouts.admin.admin')

@section('title', 'Login')

@section('guest')
    <!-- BEGIN LOGIN SECTION -->
    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-4">
                    <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                        <div class="w-100">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <div>
                                        <div class="text-center">
                                            <div>
                                                <a href="{{route('homepage')}}" class="auth-logo">
                                                    <img src="{{asset('backend/assets/images/logo.jfif')}}" alt="" height="80" class=" logo-dark mx-auto">
                                                    <img src="{{asset('backend/assets/images/logo.jfif')}}" alt="" height="80" class=" logo-light mx-auto">
                                                </a>
                                            </div>

                                            <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                            <p class="text-muted">Sign in to continue to Dashboard.</p>
                                        </div>

                                        <div class="p-2 mt-5">
                                            <form class="form form-validate" role="form" style="text-align:left;" method="POST"
                                                action="{{ url('/login') }}" autocomplete="off" >
                                                {!! csrf_field() !!}
                                                <div class="form-group">
                                                    <label for="email"
                                                        class="text col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                    {{--<div class="col-md-6">--}}
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" style="height: 57px"
                                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                    {{--</div>--}}
                                                </div>
                                                {{--<div class="form-group">--}}
                                                {{--<input type="text" class="form-control" style="height: 57px" id="email" name="email"--}}
                                                {{--value="{{ old('email') }}" required>--}}
                                                {{--<label for="login">Email</label>--}}
                                                {{--</div>--}}
                                                <div class="form-group mt-3">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" style="height: 57px" id="password"
                                                        name="password" required>
                                                </div>
                                                <br/>

                                                <div class="form-group row">
                                                    {{--<div class="form-group row">--}}

                                                    {{--</div>--}}


                                                    {{--<div class="col-xs-6 text-left">--}}
                                                    {{--<div class="checkbox checkbox-inline checkbox-styled">--}}
                                                    {{--<label>--}}
                                                    {{--<span>Remember me</span>--}}
                                                    {{--</label>--}}
                                                    {{--</div>--}}
                                                    {{--</div><!--end .col -->--}}
                                                    <div class="col-xs-6 text-right">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                                    </div><!--end .col -->
                                                </div><!--end .row -->
                                            </form>
                                        </div>

                                        {{-- <div class="mt-5 text-center">
                                            <p>Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary"> Register </a> </p>
                                            <p>© <script>document.write(new Date().getFullYear())</script> Stexo. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="authentication-bg">
                        <div class="bg-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style type="text/css">
        .logo {
            margin-top: 60px;
            margin-bottom: 15px;
        }
    </style>
@endpush
<!-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->
