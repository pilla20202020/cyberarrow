<form action="{{ route('menu.subMenu.childsubMenu.store', $subMenu->id) }}" method="POST" class="form">
    @csrf
    <div class="modal fade" id="addSubMenu" tabindex="-1" role="dialog" aria-labelledby="addChildSubMenuLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addChildSubMenuLabel">Add Child Sub Menu ({{ $subMenu->name }})</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="page">Page</label>
                        <select class="form-control select2" name="page">
                            <option value="" selected disabled>Select a page or leave blank (#)</option>
                            @foreach($pages as $page)
                                <option value="{{ $page->slug }}">{{ $page->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="(same as page title)">
                    </div>
                    <div class="form-group">
                        <label for="custom_url">Custom URL</label>
                        <input type="text" name="custom_url" value="{{ old('custom_url') }}" class="form-control" placeholder="(enter your custom URL here...)">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Child Sub Menu</button>
                </div>
            </div>
        </div>
    </div>
</form>
