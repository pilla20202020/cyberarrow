@csrf
<div class="row">
    <div class="col-sm-9">
        <div class="card">
            <div class="card-underline">
                <div class="card-head">
                    <header>{!! $header !!}</header>
                </div>
                <div class="card-body">
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <select name="category_id" class="form-control category_id" required>
                                    <option value="" selected disabled>Select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if(isset($category_search)) @if($category_search->id == $category->id) selected @endif @endif>{{$category->title}}</option>
                                    @endforeach

                                </select>
                                <span id="textarea1-error" class="text-danger">{{ $errors->first('category_id') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" required
                                       value="{{ old('title', isset($product->title) ? $product->title : '') }}"/>

                                <label for="Name">Name</label>
                                <span id="textarea1-error" class="text-danger">{{ $errors->first('title') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="number" name="price" class="form-control" value="{{ old('price', isset($product->price) ? $product->price : '') }}"/>
                                <label for="price" class="control-label">Price</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <strong>Description</strong>
                                <textarea name="description" id=""
                                          class="ckeditor">{{old('description',isset($product->description)?$product->description : '')}}</textarea>

                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="text-default-light">Image</label>
                            @if(isset($product) && $product->image)
                                <input type="file" name="image" class="dropify"
                                    data-default-file="{{ asset($product->thumbnail_path)}}"/>
                            @else
                                <input type="file" name="image" class="dropify"/>
                            @endif
                        </div>


                </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="" data-spy="affix" data-offset-top="50">
            <div class="panel-group" id="accordion1">
                <div class="card panel expanded">
                    <div class="card-head" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-1">
                        <header>Publish</header>
                        <div class="tools">
                            <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                        </div>
                    </div>
                    <div id="accordion1-1" class="collapse in">
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <a class="btn btn-default btn-ink" href="{{ route('product.index') }}">
                                    <i class="md md-arrow-back"></i>
                                    Back
                                </a>
                                <input type="submit" name="pageSubmit" class="btn btn-info ink-reaction" value="Save">
                            </div>
                        </div>
                        <div class="card-head">
                            <div class="side-label">
                                <div class="label-head">
                                    <span>Featured</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="is_featured"
                                           {{ old('is_featured', isset($product->is_featured) ? $product->is_featured : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div>
                             <div class="side-label">
                                <div class="label-head">
                                    <span>Status</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="status"
                                           {{ old('status', isset($product->status) ? $product->status : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div>

                            <div class="side-label">
                                <div class="label-head">
                                    <span>Signature Dish</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="signature"
                                           {{ old('signature', isset($product->signature) ? $product->signature : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div>

                            <div class="side-label">
                                <div class="label-head">
                                    <span>Chef Special</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="chef"
                                           {{ old('chef', isset($product->chef) ? $product->chef : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div>

                            <div class="side-label">
                                <div class="label-head">
                                    <span>Award Winning</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="award"
                                           {{ old('award', isset($product->award) ? $product->award : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div>




                            {{-- <div class="side-label">
                                <div class="label-head">
                                    <span>Popular</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="is_popular"
                                           {{ old('is_popular', isset($product->is_popular) ? $product->is_popular : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!--end .panel --><!--end .panel --><!--end .panel --><!--end .panel -->
                {{--            </div><!--end .panel-group -->--}}
                {{--        <div class="panel-group" id="accordion1">--}}

                <!--end .panel --><!--end .panel --><!--end .panel --><!--end .panel -->
            </div><!--end .panel-group -->
        </div>
    </div>
</div>
@section('scripts')
    <script src="{{ asset('resources/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('resources/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endsection
