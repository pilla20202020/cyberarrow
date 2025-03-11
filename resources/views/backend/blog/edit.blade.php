@extends('backend.layouts.admin.admin')

@section('title', 'Blog')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('blog.update', $blog->slug )}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.blog.partials.form', ['header' => 'Edit blog <span class="text-primary">('.($blog->title).')</span>'])
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
