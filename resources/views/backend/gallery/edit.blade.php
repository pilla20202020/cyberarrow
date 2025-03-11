@extends('backend.layouts.admin.admin')

@section('title', 'Gallery')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('gallery.update',$gallery->id)}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.gallery.partials.form', ['header' => 'Edit gallery <span class="text-primary">('.($gallery->album->name).')</span>'])
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
