@extends('backend.layouts.admin.admin')

@section('title', 'Slider')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('slider.update',$slider->id)}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.slider.partials.form', ['header' => 'Edit slider <span class="text-primary">('.($slider->title).')</span>'])
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
