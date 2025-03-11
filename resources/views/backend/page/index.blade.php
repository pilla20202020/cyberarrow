@extends('backend.layouts.admin.admin')

@section('title', 'Page')

@push('styles')
    <!-- DataTables -->
    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        #customTools {
            position: relative;
            bottom: 30px;
        }
        .headerButton {
            position: relative;
            top: 6px;
        }
        .dataTables_filter {
            text-align: left!important;
        }
        .dataTables_filter {
            display: none;
        }
        @media (max-width: 575.98px) {
            #customTools {
                position: relative;
                bottom: 0;
                padding-bottom: 20px
            }
            .headerButton {
                position: relative;
                left: 0;
                top: 0;
                margin-top: 10px;
            }
        }
        @media (max-width: 1030px) {

            .dataTables_filter {
                text-align: right!important;
            }
            .headerButton {
                position: relative;
                left: 0;
                top: 6px;
            }
        }
    </style>
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head d-flex justify-content-between align-items-center p-4">
                    <header class="text-capitalize">all pages</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction"
                           href="{{ route(substr(Route::currentRouteName(), 0 , strpos(Route::currentRouteName(), '.')) . '.create') }}">
                            Add
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                {{-- Hidden bulk delete form (for selected page IDs) --}}
                                <form id="bulkDeleteForm" method="POST" action="{{ route('pages.bulkDelete') }}">
                                    @csrf
                                </form>

                                <table id="alternative-page-datatable" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selectAll"></th>
                                            <th width="5%">S.N</th>
                                            <th width="15%">Title</th>
                                            <th width="10%">Author</th>
                                            <th width="10%">Category</th>
                                            <th width="20%">Image</th>
                                            <th width="15%">Date</th>
                                            <th width="15%" class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @each('backend.page.partials.table', $pages, 'page')
                                    </tbody>
                                </table>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
        </div>
    </section>

    <!-- Example Delete Confirmation Modal (optional) -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Page</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete "<span id="pageTitle"></span>"?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">
                            Yes, Delete
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@push('scripts')
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

    <script>
        // Open the Delete Modal and set the page title / form action
        function openDeleteModal(pageId, pageTitle) {
            document.getElementById('pageTitle').textContent = pageTitle;
            document.getElementById('deleteForm').action =
                '{{ route('page.destroy', ':id') }}'.replace(':id', pageId);
            $('#deleteModal').modal('show');
        }

        $(document).ready(function () {
            // "Select All" checkbox logic
            $('#selectAll').on('click', function () {
                $('.page-checkbox').prop('checked', this.checked);
            });

            // Initialize DataTable with custom DOM layout
            var table = $('#alternative-page-datatable').DataTable({
                // Adjust or remove 'destroy' if needed
                // destroy: true,

                // The DOM layout string below places:
                // - "Show entries" (l) in col-md-2
                // - Our custom placeholder (#customTools) in col-md-4
                // - The built-in "Search" (f) in col-md-6
                // Then the table (tr), and finally the info (i) & pagination (p).
                dom:
                  "<'row'<'col-sm-12 col-md-2 col-lg-2'l><'col-sm-12 col-md-10 col-lg-10'<'#customTools'>><'col-sm-12 col-md-2 col-lg-2'f>>" +
                  "<'row'<'col-sm-12'tr>>" +
                  "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

                responsive: true,

                initComplete: function() {
                    // Build the custom HTML with Delete, Filter, and Search controls.
                    var customHtml = `
                        <div class="row w-100">
                            <div class="col-md-5 pt-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-primary ink-reaction form-control headerButton"
                                        href="{{ route(substr(Route::currentRouteName(), 0 , strpos(Route::currentRouteName(), '.')) . '.create') }}">
                                            Add Post
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-danger form-control headerButton" id="deleteSelected">
                                            Delete
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <label for="categoryFilter" class="mb-0 d-block">
                                    Filter by Category
                                </label>
                                <select id="categoryFilter" class="form-control">
                                    <option value="">-- All Categories --</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->title }}">
                                            {{ $cat->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="mb-0 d-block">
                                    Search:
                                    <input type="search" class="form-control ml-2" placeholder="Search page" aria-controls="alternative-page-datatable">
                                </label>
                            </div>
                        </div>
                    `;
                    // Inject the custom HTML into #customTools.
                    $("#alternative-page-datatable_wrapper")
                        .find("#customTools")
                        .html(customHtml);

                    // Bind the custom search input to the DataTable search API.
                    $("#alternative-page-datatable_wrapper")
                        .find("#customTools input[type='search']")
                        .on('keyup change', function() {
                            table.search(this.value).draw();
                        });

                    // Category filter logic: filter column index 4 (Category column).
                    $('#categoryFilter').on('change', function() {
                        let val = $.fn.dataTable.util.escapeRegex($(this).val());
                        table.column(4).search(val).draw();
                    });

                    // Bulk delete logic.
                    $('#deleteSelected').on('click', function () {
                        const selected = $('.page-checkbox:checked');

                        if (selected.length > 0) {
                            if (confirm('Are you sure you want to delete the selected pages?')) {
                                const selectedIds = [];
                                selected.each(function() {
                                    selectedIds.push($(this).val());
                                });

                                if (selectedIds.length > 0) {
                                    // Clear old hidden inputs.
                                    $('#bulkDeleteForm input[name="selected_pages[]"]').remove();

                                    // Append new hidden inputs for each selected page.
                                    selectedIds.forEach(function(id) {
                                        $('<input>')
                                        .attr({
                                            type: 'hidden',
                                            name: 'selected_pages[]',
                                            value: id
                                        })
                                        .appendTo('#bulkDeleteForm');
                                    });

                                    // Submit the form.
                                    $('#bulkDeleteForm').submit();
                                }
                            }
                        } else {
                            alert('Please select at least one page to delete.');
                        }
                    });
                }

            });
        });
    </script>
@endpush
