@csrf
<div class="row">
    <div class="col-sm-9">
        <div class="card">
            <div class="card-underline">
                <div class="card-head p-4">
                    <header>{!! $header !!}</header>
                </div>
                <div class="card-body">


                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" name="title" class="form-control" required
                                       value="{{ old('title', isset($page->title) ? $page->title : '') }}"/>

                                <span id="textarea1-error" class="text-danger">{{ $errors->first('title') }}</span>
                            </div>
                        </div>
                    </div>



                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="specialization">Short Description</label>
                                <textarea type="text" name="meta_description" class="form-control">{{old('meta_description',isset($page->meta_description)?$page->meta_description : '')}}</textarea>

                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <strong>Description</strong>
                                <textarea id="elm1" name="content">{{old('content',isset($page->content)?$page->content : '')}}</textarea>

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
                                       value="{{ old('author', isset($page->author) ? $page->author : '') }}"/>

                                <span id="textarea1-error" class="text-danger">{{ $errors->first('author') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <label class="text-default-light">Image</label>
                            @if(isset($page) && $page->image)
                                <input type="file" name="image" class="dropify" id="input-file-events"
                                    data-default-file="{{ asset(str_replace('\\', '/', $page->image)) }}"/>
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
                                <input type="checkbox" id="switch1" switch="none" name="is_published"
                                       {{ old('is_published', isset($page->is_published) && $page->is_published == '1' ? 'checked' : '') }}
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

                    <!-- New Accordion -->
                    {{-- <div class="mt-4">
                        <h4 class="card-title">Accordion Example</h4>
                        <p class="card-title-desc">Extend the default collapse behavior to create an accordion.</p>

                        <div id="accordion" class="custom-accordion">
                            <div class="card mb-1 shadow-none">
                                <a href="#collapseOne" class="text-reset" data-bs-toggle="collapse"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    <div class="card-header" id="headingOne">
                                        <h6 class="m-0">
                                            Collapsible Group Item #1
                                            <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                        </h6>
                                    </div>
                                </a>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-1 shadow-none">
                                <a href="#collapseTwo" class="text-reset collapsed" data-bs-toggle="collapse"
                                   aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="card-header" id="headingTwo">
                                        <h6 class="m-0">
                                            Collapsible Group Item #2
                                            <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                        </h6>
                                    </div>
                                </a>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                                    <div class="card-body">
                                        Sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-0 shadow-none">
                                <a href="#collapseThree" class="text-reset collapsed" data-bs-toggle="collapse"
                                   aria-expanded="false" aria-controls="collapseThree">
                                    <div class="card-header" id="headingThree">
                                        <h6 class="m-0">
                                            Collapsible Group Item #3
                                            <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                        </h6>
                                    </div>
                                </a>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- End Accordion -->

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
