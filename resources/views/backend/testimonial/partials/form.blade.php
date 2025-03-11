@csrf
<div class="row">
    <div class="col-sm-9">
        <div class="card">
            <div class="card-underline">
                <div class="card-head p-4">
                    <header>{!! $header !!}</header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" name="title" class="form-control" required
                                       value="{{ old('title', isset($testimonial->title) ? $testimonial->title : '') }}"/>

                                <span id="textarea1-error" class="text-danger">{{ $errors->first('title') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="form-group">
                                <label for="office">Office</label>
                                <input type="text" name="office" class="form-control"
                                       value="{{ old('office', isset($testimonial->office) ? $testimonial->office : '') }}"/>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-3">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="position">Designation</label>
                                    <input type="text" name="position" class="form-control"
                                           value="{{ old('position', isset($testimonial->position) ? $testimonial->position : '') }}"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <strong>Description</strong>
                                <textarea id="elm1" name="content">{{old('content',isset($testimonial->content)?$testimonial->content : '')}}</textarea>

                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-underline">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 mt-3">
                            <div class="form-group">
                                <label class="text-default-light">Category</label>
                                <select name="category_id" class="form-control" id="category_id" required>
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" @if(isset($category_search)) @if($category_search == $category->id) selected @endif @endif>{{$category->title}}</option>
                                        @endforeach
                                </select>
                                <span id="textarea1-error" class="text-danger">{{ $errors->first('category_id') }}</span>
                            </div>
                       </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Name">Author</label>
                                <input type="text" name="author" class="form-control"
                                       value="{{ old('author', isset($testimonial->author) ? $testimonial->author : '') }}"/>

                                <span id="textarea1-error" class="text-danger">{{ $errors->first('author') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <label class="text-default-light">Image</label>
                            @if(isset($testimonial) && $testimonial->image)
                                <input type="file" name="image" class="dropify" id="input-file-events"
                                    data-default-file="{{ asset(str_replace('\\', '/', $testimonial->image)) }}"/>
                            @else
                                <input type="file" name="image" class="dropify"/>
                            @endif
                            <input type="hidden" name="removeimage" id="removeimage" value=""/>
                            <span id="textarea1-error" class="text-danger">{{ $errors->first('image') }}</span>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <span>Published</span>
                            <div class="pt-2">
                                <input type="checkbox" id="switch1" switch="none" name="is_featured"
                                       {{ old('is_featured', isset($testimonial->is_featured) && $testimonial->is_featured == '1' ? 'checked' : '') }}
                                       data-switchery/>
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                            </div>
                        </div>
                    </div>



                    <hr>
                    <div class="mt-3">
                        <div class="d-flex justify-content-center">
                            <input type="submit" name="pageSubmit" class="btn btn-primary waves-effect waves-light me-1">
                            <a class="btn btn-secondary waves-effect" href="{{ route('page.index') }}">
                                Back
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <!-- tinymce js -->
<script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>

<!-- init js -->
<script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>

@endpush
