@extends('backend.layouts.admin.admin')

@section('title', 'Menu')

@section('content')
<section>
    <div class="section-body">
        <form class="form form-validate floating-label" action="{{ route('menu.update-menu', $menu->id) }}" method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-underline">
                            <div class="card-head p-4">
                                <header>Edit Menu <span class="text text-danger font-weight-bolder">({{ $menu->name }})</span></header>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Name">Name</label>
                                            <input type="text" name="name" class="form-control" required value="{{ old('name', isset($menu->name) ? $menu->name : '') }}" />
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="order">Order</label>
                                            <input type="number" name="order" class="form-control" required value="{{ old('order', isset($menu->order) ? $menu->order : '') }}" />
                                            <span class="text-danger">{{ $errors->first('order') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="mt-3">
                                    <div class="d-flex justify-content-center">
                                        <input type="submit" name="pageSubmit" class="btn btn-primary waves-effect waves-light me-1" value="Update">
                                        <a class="btn btn-secondary waves-effect" href="{{ route('menu.index') }}">
                                            Back
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@stop

@push('scripts')
    <!-- Add any required scripts here -->
@endpush
