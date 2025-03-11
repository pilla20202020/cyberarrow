@extends('backend.layouts.admin.admin')

@section('title', 'Product')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" >
            @include('backend.product.partials.form',['header' => 'Create a Product'])
            </form>
        </div>
    </section>
@stop


@push('scripts')
    <script src="{{ asset('backend/assets/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/libs/dropify/dropify.min.js') }}"></script>
@endpush
