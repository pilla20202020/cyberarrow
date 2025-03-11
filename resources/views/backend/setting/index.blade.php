@extends('backend.layouts.admin.admin')

@section('title', 'Slider')

@push('styles')

<!-- DataTables -->
<link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('content')
    <section>
        <form action="{{ route('setting.update') }}" method="POST" class="form form-validate" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-head d-flex justify-content-between align-items-center p-3">
                            <header>General Settings</header>
                            <input type="submit" class="btn btn-primary ms-auto" value="Save All">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-head">
                                        <header class="p-3">General</header>
                                    </div>
                                    <div class="card-body tab-content">
                                        <div class="tab-pane active" id="first2">
                                            <div class="form-group">
                                                <label class="pt-3" for="setting[donation]">Make Donation</label>
                                                <textarea name="setting[donation]" class="form-control" rows="2" >{{ old('setting.donation', setting('donation')) }}</textarea>
                                                <label class="pt-3" for="setting[fundraising]">Fundraising</label>
                                                <textarea name="setting[fundraising]" class="form-control" rows="2" >{{ old('setting.fundraising', setting('fundraising')) }}</textarea>
                                                <label class="pt-3" for="setting[become_volunteer]">Become a become_Volunteer</label>
                                                <textarea name="setting[become_volunteer]" class="form-control" rows="2" >{{ old('setting.become_volunteer', setting('become_volunteer')) }}</textarea>

                                                {{-- <label class="pt-3" for="setting[footer_content]">Footer Content</label>
                                                <textarea name="setting[footer_content]" class="form-control" rows="2" >{{ old('setting.footer_content', setting('footer_content')) }}</textarea> --}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-head">
                                        <header class="p-3">General Information</header>
                                    </div>
                                    <div class="card-body tab-content">
                                        <div class="tab-pane active" id="first2">
                                            <div class="form-group">
                                                <label class="pt-3" for="setting[profile]">Profile</label>
                                                <textarea name="setting[profile]" class="form-control" rows="2" >{{ old('setting.profile', setting('profile')) }}</textarea>
                                            </div>
                                            <label class="pt-3" for="setting[history]">Our History</label>
                                            <textarea name="setting[history]" class="form-control" rows="2" >{{ old('setting.history', setting('history')) }}</textarea>
                                            <label class="pt-3" for="setting[mission]">Our Mission</label>
                                            <textarea name="setting[mission]" class="form-control" rows="2" >{{ old('setting.mission', setting('mission')) }}</textarea>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-head">
                                        <header class="p-3">Page Counter</header>
                                    </div>
                                    <div class="card-body tab-content">
                                        <div class="tab-pane active" id="first2">
                                            <div class="tab-pane active" id="first2">
                                                <div class="form-group">
                                                    <label class="pt-3" for="setting[money]">Money Donated</label>
                                                    <input type="text" name="setting[money]" class="form-control"  value="{{ old('setting.money', setting('money')) }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="pt-3" for="setting[volunteer]">Volunteer around the world</label>
                                                    <input type="text" name="setting[volunteer]" class="form-control" value="{{ old('setting.volunteer', setting('volunteer')) }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="pt-3" for="setting[people]">People Impacted</label>
                                                    <input type="text" name="setting[people]" class="form-control" value="{{ old('setting.people', setting('people')) }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="pt-3" for="setting[positive]">Positive Feedback</label>
                                                    <input type="text" name="setting[positive]" class="form-control" value="{{ old('setting.positive', setting('positive')) }}">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-head">
                                        <header class="p-3">Contacts</header>
                                    </div>
                                    <div class="card-body tab-content">
                                        <div class="tab-pane active" id="first3">
                                            <div class="form-group">
                                                <label class="pt-3" for="setting[phone]">Phone</label>
                                                <input type="text" name="setting[phone]" class="form-control"  value="{{ old('setting.phone', setting('phone')) }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="pt-3" for="setting[email]">Email</label>
                                                <input type="email" name="setting[email]" class="form-control"  value="{{ old('setting.email', setting('email')) }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="pt-3" for="setting[domain]">Domain</label>
                                                <input type="text" name="setting[domain]" class="form-control"  value="{{ old('setting.domain', setting('domain')) }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="pt-3" for="setting[address]">Address</label>
                                                <input type="text" name="setting[address]" class="form-control"  value="{{ old('setting.address', setting('address')) }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="pt-3" for="setting[maps]">Maps IFrame</label>
                                                <input type="text" name="setting[maps]" class="form-control"  value="{{ old('setting.maps', setting('maps')) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-head">
                                        <header class="p-3">Social Links</header>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="pt-3" for="setting[facebook]">Facebook</label>
                                            <input type="text" name="setting[facebook]" class="form-control"  value="{{ old('setting.facebook', setting('facebook')) }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="pt-3" for="setting[twitter]">Twitter</label>
                                            <input type="text" name="setting[twitter]" class="form-control"  value="{{ old('setting.twitter', setting('twitter')) }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="pt-3" for="setting[youtube]">Youtube</label>
                                            <input type="text" name="setting[youtube]" class="form-control"  value="{{ old('setting.youtube', setting('youtube')) }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="pt-3" for="setting[instagram]">Instagram</label>
                                            <input type="text" name="setting[instagram]" class="form-control"  value="{{ old('setting.instagram', setting('instagram')) }}">
                                        </div>

                                        <div class="form-group">
                                            <label class="pt-3" for="setting[video_link]">Embed Video Links</label>
                                            <input type="text" name="setting[video_link]" class="form-control"  value="{{ old('setting.video_link', setting('video_link')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    @stop

@push('scripts')
    <script>
        function openDeleteSliderModal(sliderId, sliderTitle) {
            // Set the slider title in the modal
            document.getElementById('sliderTitle').textContent = sliderTitle;

            // Set the form action to the delete URL for the selected slider
            document.getElementById('deleteForm').action = '{{ route('slider.destroy', ':id') }}'.replace(':id', sliderId);
            // Show the modal
            $('#deleteModal').modal('show');
        }
    </script>

    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>

@endpush
