@extends('backend.layouts.admin.admin')

@section('title', 'team')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($team, ['route' =>['team.update', $team->slug],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('backend.team.partials.form', ['header' => 'Edit Member <span class="text-primary">('.($team->title).')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop
@push('styles')
<link href="{{ asset('backend/css/libs/dropify/dropify.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('backend/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('backend/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('backend/js/libs/dropify/dropify.min.js') }}"></script>
@endpush
