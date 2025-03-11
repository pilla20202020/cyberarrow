@extends('backend.layouts.admin.admin')

@section('title', 'Gallery')

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
        <div class="section-body">
            <div class="card">
                <div class="card-head d-flex justify-content-between align-items-center p-4">
                    <header class="text-capitalize">Gallery</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route(substr(Route::currentRouteName(), 0 , strpos(Route::currentRouteName(), '.')) . '.create') }}">
                            Add
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="alternative-page-datatable" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th width="5%">S.N</th>
                                            <th width="25%">Image</th>
                                            <th width="15%">Album</th>
                                            <th width="15%">Is Published</th>
                                            <th width="15%" class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @each('backend.gallery.partials.table', $gallery, 'gallery')
                                    </tbody>
                                </table>

                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </section>
@stop

@push('scripts')
    <script>
        function openDeleteGalleryModal(galleryId, galleryTitle) {
            // Set the gallery title in the modal
            document.getElementById('galleryTitle').textContent = galleryTitle;

            // Set the form action to the delete URL for the selected gallery
            document.getElementById('deleteForm').action = '{{ route('gallery.destroy', ':id') }}'.replace(':id', galleryId);
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
