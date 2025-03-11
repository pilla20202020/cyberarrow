<tr>
    <td><input type="checkbox" class="page-checkbox" name="selected_pages[]" value="{{ $page->id }}"></td>
    <td>{{++$key}}</td>
    <td>{{ Str::limit(ucfirst($page->title),47) }}</td>
    <td>{{ Str::limit(ucfirst($page->author),47) }}</td>
    <td>
        {{$page->category->title}}
    </td>


    @if (isset($page->image))
        <td><img src="{{ asset(str_replace('\\', '/', $page->image)) }}" class="img-circle width-1" alt="{{$page->title}}" width="82" height="48"></td>
    @else
        <td><img src="{{ asset('images/noimage.png') }}" class="img-circle width-1" alt="blog_image" width="82" height="48"></td>
    @endif


    <td>
        @if($page->is_published =='1')
            Published
            <p class="mt-2">{{$page->updated_at}}</p>
        @elseif($page->is_published =='0')
         Un-Published
        @endif
    </td>
    <td class="text-right">
        <a href="{{route('page.edit', $page->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="fas fa-edit"></i>
        </a>

        <button class="btn btn-flat btn-danger btn-xs" title="delete" onclick="openDeleteModal({{ $page->id }}, '{{ $page->title }}')">
            <i class="fas fa-trash-alt"></i>
        </button>
    </td>
</tr>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the page titled "<strong id="pageTitle"></strong>"?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" action="" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
