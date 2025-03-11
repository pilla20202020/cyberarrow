@extends('backend.layouts.admin.admin')

@section('title', 'Client')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('client.update',$client->id)}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.client.partials.form', ['header' => 'Edit client <span class="text-primary">('.($client->title).')</span>'])
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
