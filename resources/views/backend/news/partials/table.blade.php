<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit(ucfirst($news->title), 47) }}</td>
    @if (isset($news->image))
        <td><img src="{{ asset(str_replace('\\', '/', $news->image)) }}" class="img-circle width-1" alt="{{$news->title}}" width="82" height="48"></td>
    @else
        <td><img src="{{ asset('images/noimage.png') }}" class="img-circle width-1" alt="blog_image" width="82" height="48"></td>
    @endif
    <td>{{ $news->date ? \Carbon\Carbon::parse($news->date)->format('Y-m-d') : 'N/A' }}</td>
    <td>
        @if ($news->type == 'news')
            <span class="badge rounded-pill text-bg-warning">News</span>
        @else
            <span class="badge rounded-pill text-bg-info">Notice</span>
        @endif
    </td>
    <td>
        @if($news->is_featured =='1')
            Published
            <p class="mt-2">{{$news->updated_at}}</p>
        @elseif($news->is_featured =='0')
            Un-Published
        @endif
    </td>
    <td class="text-right">
        <a href="{{route('news.edit', $news->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="fas fa-edit"></i>
        </a>

        <button class="btn btn-flat btn-danger btn-xs" title="delete" onclick="openDeleteModal({{ $news->id }}, '{{ $news->title }}')">
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
                Are you sure you want to delete the news titled "<strong id="newsTitle"></strong>"?
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
