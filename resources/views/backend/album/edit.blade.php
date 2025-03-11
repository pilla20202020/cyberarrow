@extends('backend.layouts.admin.admin')

@section('title', 'Album')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('album.update', $album->slug )}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.album.partials.form', ['header' => 'Edit album <span class="text-primary">('.($album->name).')</span>'])
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
