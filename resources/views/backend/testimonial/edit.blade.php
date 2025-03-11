@extends('backend.layouts.admin.admin')

@section('title', 'Testimonial')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('testimonial.update', $testimonial->slug )}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.testimonial.partials.form', ['header' => 'Edit testimonial <span class="text-primary">('.($testimonial->title).')</span>'])
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
