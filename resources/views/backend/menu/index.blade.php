@extends('backend.layouts.admin.admin')

@section('title', 'Menu')

@push('styles')
    <style>
        #menu-accordion .card-head {
            cursor: pointer;
        }
        .custom-accordion .card-header {
            height: 66px;
        }
    </style>
@endpush

@section('content')
    {{-- For New backend menu bar --}}
    <section>
        <div class="section-body">
            <div class="row">
                <form action="{{ route('menu.update') }}" method="POST" enctype="multipart/form-data" class="form form-validation" >
                    @csrf
                    @method('PUT')
                    <div class="tab-content">
                        <div class="tab-pane active" id="first2">
                            <div class="col-md-10  d-flex">
                                <article class="margin-bottom-xxl ms-auto">
                                    <button class="btn btn-primary ink-reaction" data-bs-toggle="modal" data-bs-target="#addMenu" type="button">
                                        <i class="fas fa-plus"></i>
                                        Add
                                    </button>
                                    <button class="btn btn-primary ink-reaction" type="submit">
                                        <i class="fas fa-save"></i>
                                        Save
                                    </button>
                                </article>
                            </div>
                            <div class="col-md-10 col-md-offset-2 mt-4">
                                <div class="panel-group" id="menu-accordion" data-sortable="true">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Menu</h4>
                                            <p class="card-title-desc">Manage your menu items using the collapsible accordion structure.</p>

                                            <div id="menu-accordion" class="custom-accordion">
                                                @foreach ($menus as $key => $menu)
                                                    <div class="card mb-1 shadow-none">
                                                        <div class="card-header d-flex justify-content-between align-items-center" id="heading-menu-{{ $key }}">
                                                            <a href="#collapse-menu-{{ $key }}" class="text-reset flex-grow-1" data-bs-toggle="collapse"
                                                                aria-expanded="{{ session('collapse_in') == $menu->slug ? 'true' : 'false' }}"
                                                                aria-controls="collapse-menu-{{ $key }}">
                                                                <h6 class="m-0">
                                                                    {{ $menu->name }}
                                                                    <i class="fas fa-angle-down float-end accor-plus-icon" style="font-size: 22px;padding-right:20px"></i>
                                                                </h6>
                                                            </a>

                                                            <div class="d-flex gap-2">
                                                                <a href="{{route('menu.edit',$menu->id)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <button type="button" class="btn btn-primary btn-add-sub-menu" data-url="{{ route('menu.subMenu.component.modal', $menu->id) }}">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                                @unless($menu->is_primary)
                                                                    <a class="btn btn-danger btn-sm btn-delete" data-url="{{ route('menu.destroy', $menu->id) }}">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </a>
                                                                @endunless
                                                            </div>
                                                        </div>

                                                        <div id="collapse-menu-{{ $key }}" class="collapse {{ session('collapse_in') == $menu->slug ? 'show' : '' }}"
                                                            aria-labelledby="heading-menu-{{ $key }}" data-bs-parent="#menu-accordion">
                                                            <div class="card-body">
                                                                <div class="custom-accordion mt-2">
                                                                    @foreach ($menu->subMenus->sortBy('order') as $subKey => $subMenu)
                                                                        <div class="card mb-1 shadow-none">
                                                                            <div class="card-header d-flex justify-content-between align-items-center" id="heading-submenu-{{ $subKey }}">
                                                                                <a href="#collapse-submenu-{{ $subKey }}" class="text-reset flex-grow-1" data-bs-toggle="collapse"
                                                                                    aria-expanded="false" aria-controls="collapse-submenu-{{ $subKey }}">
                                                                                    <h6 class="m-0">
                                                                                        {{ $subMenu->name }}

                                                                                    </h6>
                                                                                </a>


                                                                            </div>

                                                                            <div id="collapse-submenu-{{ $subKey }}" class="collapse"
                                                                                aria-labelledby="heading-submenu-{{ $subKey }}" data-bs-parent="#collapse-menu-{{ $key }}">
                                                                                <div class="card-body">
                                                                                    <div class="mt-2">
                                                                                        @foreach ($subMenu->childsubMenus->sortBy('order') as $childSubKey => $childsubMenu)
                                                                                            <p>{{ $childsubMenu->name }}</p>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div id="subMenuModal"></div>

    <div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="addMenuLabel">
        <form action="{{ route('menu.store') }}" method="POST" class="form">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="addMenuLabel">Add Menu</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="page ">Page</label>
                            <select class="form-control select2 mt-2" name="page">
                                <option value="" selected disabled>Select a page or leave blank (#)</option>
                                @foreach ($pages as $page)
                                    <option value="{{ $page->slug }}">{{ $page->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label class="name">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required placeholder="(same as page title)">
                        </div>
                        <div class="form-group mt-2">
                            <label for="order">Order</label>
                            <input type="number" name="order" class="form-control" value="{{ old('order') }}" min="1">
                        </div>
                        <div class="form-group mt-2">
                            <label for="url">URL</label>
                            <input type="text" name="url" class="form-control" value="{{ old('url') }}">
                        </div>
                        <div class="form-group mt-2">
                            <label for="icon">Icon</label>
                            <input type="text" name="icon" class="form-control" value="{{ old('icon') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')

    <script src="{{ asset('backend/assets/js/nestable/jquery.nestable.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootbox/bootbox.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.nestable-list').nestable();
            $(document).on("click", ".btn-add-sub-menu", function (e) {
                e.stopPropagation();
                var $button = $(this);
                $.ajax({
                    type: "GET",
                    url: $button.data("url"),
                    beforeSend: function () {
                        $button.button('loading');
                    },
                    complete: function () {
                        $button.button('reset');
                    },
                    success: function (response) {
                        $("#subMenuModal").html(response);
                        $("#subMenuModal").find(".modal").modal("show");
                    },
                    error: function () {
                        bootbox.alert("Error fetching modal!");
                    }
                });
            });
            $(".btn-delete").on("click", function (e) {
                e.stopPropagation();
                var $button = $(this);
                bootbox.confirm("Are you sure?", function (response) {
                    if (response)
                        $.ajax({
                            type: "POST",
                            url: $button.data("url"),
                            data: {
                                _method: "DELETE"
                            },
                            success: function (response) {
                                if (response.Menu) {
                                    $button.closest(".panel").detach();
                                } else if (response.SubMenu) {
                                    $button.closest(".subpanel").detach();
                                } else if (response.ChildSubMenu) {
                                    $button.closest(".childsubpanel").detach();
                                } else {
                                    $button.closest(".dd-item").detach();
                                }

                                setTimeout(function () {
                                    location.reload();
                                }, 400);
                            },
                            error: function () {
                                bootbox.alert("Error deleting menu!");
                            }
                        });
                });
            });
        });
    </script>
@endpush
