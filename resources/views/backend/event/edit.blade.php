@extends('backend.layouts.admin.admin')

@section('title', 'Event')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('event.update', $event->slug )}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.event.partials.form', ['header' => 'Edit event <span class="text-primary">('.($event->title).')</span>'])
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
