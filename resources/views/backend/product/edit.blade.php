@extends('backend.layouts.admin.admin')

@section('title', 'product')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('product.update',$product->slug)}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.product.partials.form', ['header' => 'Edit product <span class="text-primary">('.($product->title).')</span>'])
            </form>
        </div>
</section>
@stop

@push('scripts')
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/dropify/dropify.min.js') }}"></script>
@endpush
