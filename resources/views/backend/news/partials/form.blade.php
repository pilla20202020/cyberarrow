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
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" name="title" class="form-control" required
                                       value="{{ old('title', isset($news->title) ? $news->title : '') }}"/>

                                <span id="textarea1-error" class="text-danger">{{ $errors->first('title') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" class="form-control" required>
                                    <option value="" selected disabled>Select Type</option>
                                    <option value="news" {{ old('type', isset($news->type) ? $news->type : '') == 'news' ? 'selected' : '' }}>News</option>
                                    <option value="notice" {{ old('type', isset($news->type) ? $news->type : '') == 'notice' ? 'selected' : '' }}>Notice</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="input-group" id="demo-date">
                                    <div class="input-group-content">
                                        <label for= "Date">Date</label>
                                        <input type="date" name="date" class="form-control datetime"
                                               value="{{ old('date', isset($news->date) ? \Carbon\Carbon::parse($news->date)->format('Y-m-d') : '') }}">
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="specialization">Short Description</label>
                                <textarea type="text" name="meta_description" class="form-control">{{old('meta_description',isset($news->meta_description)?$news->meta_description : '')}}</textarea>

                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <strong>Description</strong>
                                <textarea id="elm1" name="content">{{old('content',isset($news->content)?$news->content : '')}}</textarea>

                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-underline">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-sm-12">
                            <label class="text-default-light">Image</label>
                            @if(isset($news) && $news->image)
                                <input type="file" name="image" class="dropify" id="input-file-events"
                                    data-default-file="{{ asset(str_replace('\\', '/', $news->image)) }}"/>
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
                                       {{ old('is_featured', isset($news->is_featured) && $news->is_featured == '1' ? 'checked' : '') }}
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
