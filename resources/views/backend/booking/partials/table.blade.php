<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit(ucfirst($booking->name), 47) }}</td>
    <td>{{ Str::limit(ucfirst($booking->email), 47) }}</td>
    <td>{{$booking->phone}}</td>
    <td>{{$booking->partysize}}</td>
    <td>{{$booking->time}}</td>
    <td>{{$booking->date}}</td>
    <td class="text-right">
        <a href="{{ route('booking.destroy', $booking->id) }}">
            <button type="button"
                class="btn btn-flat btn-danger btn-xs item-delename="delete">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
        </a>
    </td>
</tr>

