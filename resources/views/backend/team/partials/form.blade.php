@csrf
<div class="row">

    <div class="col-sm-9">
        <div class="card">
            <div class="card-head">

                <header>{!! $header !!}</header>
                <div class="tools visible-xs">
                    <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                        <i class="md md-arrow-back"></i>
                        Back
                    </a>
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save Draft">
                    <input type="submit" name="publish" class="btn btn-primary ink-reaction" value="Publish">
                </div>
            </div>
            <div class="card-body tab-content">
                <div class="tab-pane active" id="first2">

                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <strong>Name*</strong>
                                {{ Form::text('title',old('title'),['class'=>'form-control', 'required']) }}
                                <span id="textarea1-error" class="text-danger">{{ $errors->first('title') }}</span>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <strong>Designation*</strong>
                                {{ Form::text('position',old('position'),['class'=>'form-control','placeholder'=>'']) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong>Email</strong>
                                {{ Form::text('email',old('email'),['class'=>'form-control']) }}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong>Facebook</strong>
                                {{ Form::text('facebook',old('facebook'),['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong>Rank*</strong>
                                {{Form::number('rank',old('rank'),['class'=>'form-control','min'=>1])}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label class="text-default-light">Featured Image(Optional) (Dimension: 233*223)</label>
                            @if(isset($team) && $team->image)
                                <input type="file" name="image" class="dropify"
                                    data-default-file="{{ asset($team->thumbnail_path)}}"/>
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
                                <a class="btn btn-default btn-ink" href="{{ route('team.index') }}">
                                    <i class="md md-arrow-back"></i>
                                    Back
                                </a>
                                <input type="submit" name="pageSubmit" class="btn btn-info ink-reaction" value="Save">
                            </div>
                        </div>
                        <div class="card-head">
                            <div class="side-label">
                                <div class="label-head">
                                    <span>Published</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="is_published"
                                           {{ old('is_published', isset($team->is_published) ? $team->is_published : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div>
                            <div class="side-label">
                                <div class="label-head">
                                    <span>Featured</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="is_featured"
                                           {{ old('is_featured', isset($team->is_featured) ? $team->is_featured : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div>
                            {{-- <div class="side-label">
                                <div class="label-head">
                                    <span>Status</span>
                                </div>
                                <div class="label-body">
                                    <input type="checkbox" id="switch_demo_1" name="is_status"
                                           {{ old('is_status', isset($team->is_status) ? $team->is_status : '')=='1' ? 'checked':'' }} data-switchery/>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!--end .panel --><!--end .panel --><!--end .panel --><!--end .panel -->
            </div><!--end .panel-group -->
        </div>
    </div>

  </div>
@push('scripts')


    <script>
        $(document).ready(function(){
            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element){
                // return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element){
                $('input[name=removeimage]').val(1);
            });
        });
    </script>


@endpush



