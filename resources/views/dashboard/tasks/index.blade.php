<x-main>
    @section('title', 'Tasks')

    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3 mt-3">

                    @if(session()->has('success'))

                        <div class="text-success text-center" role="alert">
                            <small>
                                {{session('success')}}
                            </small>
                        </div>

                    @endif

                    @if(session()->has('error'))

                        <div class="text-danger text-center" role="alert">
                            <small>
                                {{session('error')}}
                            </small>
                        </div>

                    @endif

                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0">Tasks</h2>
                            <div class="ml-auto">
                                <a href="{{route('task.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Activate Another</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6"></div>
                            @include('dashboard._tablepartials')
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tasks as $index => $task)
                                    
                                    <tr>
                                        <th scope="row">{{ $serialNumbers++ }}</th>
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

                                @empty

                                    @include('dashboard._empty')
                                    
                                @endforelse
                                
                      
                            </tbody>
                        </table> 
  
                        {{ $tasks->appends(request()->except('page'))->links('pagination::bootstrap-4') }}

                    </div>
                </div>
            </div>
          </div>
        </div>
    </main>

    <script>
        function confirmDelete(event, formId) {
            event.preventDefault(); // Prevent form submission
    
            // Display confirmation box
            if (confirm('Are you sure you want to delete this task?')) {
                document.getElementById(formId).submit(); // Submit the form
            } else {
                // Do nothing
            }
        }
    </script>

</x-main>