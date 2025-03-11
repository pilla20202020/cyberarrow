<form action="{{ route('menu.subMenu.store', $menu->id) }}" method="POST" class="form">
    @csrf
    <div class="modal fade" id="addSubMenu"  data-bs-target="#addSubMenu" tabindex="-1" role="dialog" aria-labelledby="addSubMenuLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addSubMenuLabel">Add Sub Menu ({{ $menu->name }})</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="page" class="page">Page</label>
                        <select class="form-control select2" name="page" id="page">
                            <option value="" selected disabled>Select a page or leave blank (#)</option>
                            @foreach($pages as $page)
                                <option value="{{ $page->slug }}">{{ $page->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="name" class="name">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" required placeholder="(same as page title)" id="name">
                    </div>
                    <div class="form-group mt-2">
                        <label for="custom_url" class="name">Custom URL</label>
                        <input type="text" name="custom_url" value="{{ old('custom_url') }}" class="form-control" placeholder="(enter your custom URL here..)" id="custom_url">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Sub Menu</button>
                </div>
            </div>
        </div>
    </div>
</form>
