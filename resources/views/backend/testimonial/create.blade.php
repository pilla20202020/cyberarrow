@extends('backend.layouts.admin.admin')

@section('title', 'Testimonial')

@section('content')
    <section>
        <div class="section-body">
            {{--            {{dd(Route::currentRouteName())}}--}}
            <form action="{{ route(Str::before(Route::currentRouteName(), '.') . '.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="form form-validate"
                role="form"
                >
                @csrf
            @include('backend.testimonial.partials.form', ['header' => 'Create a Testimonial'])
            </form>
        </div>
    </section>
@stop


@push('styles')
    <link href="{{ asset('backend/assets/css/dropify/dropify.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('backend/assets/js/dropify/dropify.min.js') }}"></script>
@endpush
