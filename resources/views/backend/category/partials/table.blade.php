<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit(ucfirst($category->title), 47) }}</td>


    {{-- <td class="text-center">
        @if($category->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$category->is_published ? 'Yes' : 'No'}}</span>
        @elseif($category->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$category->is_published ? 'Yes' : 'No'}}</span>
        @endif
    </td> --}}
    <td class="text-right">
        <a href="{{route('category.edit', $category->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="fas fa-edit"></i>
        </a>

        <button class="btn btn-flat btn-danger btn-xs" title="delete" onclick="openDeleteModal({{ $category->id }}, '{{ $category->title }}')">
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
                Are you sure you want to delete the category titled "<strong id="categoryTitle"></strong>"?
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
