<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit(ucfirst($team->title,15) }}</td>
    <td>{{ Str::limit(ucfirst($team->position,35) }}</td>
    <td class="text-center">
        @if($team->is_featured =='1')
            <span class="badge" style="background-color: #419645">{{$team->is_featured ? 'Yes' : 'No'}}</span>
        @elseif($team->is_featured =='0')
            <span class="badge" style="background-color: #f44336">{{$team->is_featured ? 'Yes' : 'No'}}</span>
        @endif    </td>

    <td class="text-right">
        <a href="{{route('team.edit', $team->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="{{ route('team.destroy', $team->id) }}">
        <button type="button"
            class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
            <i class="glyphicon glyphicon-trash"></i>
        </button>
    </td>
</tr>
