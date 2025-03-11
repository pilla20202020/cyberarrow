@extends('backend.layouts.admin.admin')

@section('title', 'Volunteer')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('volunteer.update', $volunteer->slug )}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.volunteer.partials.form', ['header' => 'Edit volunteer <span class="text-primary">('.($volunteer->title).')</span>'])
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
