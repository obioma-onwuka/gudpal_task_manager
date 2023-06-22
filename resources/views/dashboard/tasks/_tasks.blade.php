<tr>
    <th scope="row">{{ $loop->index + 1 }}</th>
    <td class = "text-capitalize">{{$task->title}}</td>
    <td>{{date('d-m-Y h:i a', strtotime(strip_tags($task->created_at)))}}</td>
    <td class = "text-capitalize">{{$task->status}}</td>
    <td class = "text-capitalize">
        @if ( $task->priority == '1') High 
        @else Low 
        @endif
    </td>
    <td>{{date('d-m-Y h:i a', strtotime(strip_tags($task->due_date)))}}</td>
    <td width="200">
        <a href="{{route('tasks.show', $task->id)}}" class="btn btn-sm btn-circle btn-outline-info" title="Show">
            <i class="fa fa-eye"></i>
        </a>
        <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit">
            <i class="fa fa-edit"></i>
        </a>
        <div style="display: inline-block;">
            <form action="{{ route('tasks.delete', ['task' => $task->id]) }}" style="border:none" method="POST" id="deleteForm{{$task->id}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-circle btn-outline-danger" onclick="confirmDelete(event, 'deleteForm{{$task->id}}')"><i class="fa fa-times"></i></button>
            </form>
        </div>
        
    </td>
</tr>