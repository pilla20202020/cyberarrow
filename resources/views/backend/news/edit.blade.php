@extends('backend.layouts.admin.admin')

@section('title', 'News')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('news.update', $news->slug )}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.news.partials.form', ['header' => 'Edit news <span class="text-primary">('.($news->title).')</span>'])
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
