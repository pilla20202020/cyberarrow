@extends('backend.layouts.admin.admin')

@section('title', 'category')

@section('content')
    <section>
    <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('category.update',$category->slug)}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.category.partials.form', ['header' => 'Edit category <span class="text-primary">('.($category->title).')</span>'])
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
