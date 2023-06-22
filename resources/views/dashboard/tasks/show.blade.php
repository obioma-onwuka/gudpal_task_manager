<x-main>

    @section('title', $task->title)

    <main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8 mb-3 mt-3">

            @if(session()->has('success'))

                <div class="text-success text-center" role="alert">
                    <small>
                        {{session('success')}}
                    </small>
                </div>

            @endif

          </div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Task Details</strong>
              </div>           
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="title" class="col-md-3 col-form-label">Title</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{$task->title}}</p>
                      </div>
                    </div>
  
                    <div class="form-group row">
                      <label for="created" class="col-md-3 col-form-label">Created</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{date('jS M, Y h:i:s a', strtotime(strip_tags($task->created_at)))}}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="created" class="col-md-3 col-form-label">Due Date:</label>
                        <div class="col-md-9">
                          <p class="form-control-plaintext text-muted">{{date('jS M, Y h:i:s a', strtotime(strip_tags($task->due_date)))}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="created" class="col-md-3 col-form-label">Priority</label>
                        <div class="col-md-9">
                          <p class="form-control-plaintext text-muted">
                            @if ($task->priority == '1') <span class="text-success">High</span>
                            @else <span class="text-danger">Low</span>
                            @endif
                        </p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="created" class="col-md-3 col-form-label">Status</label>
                        <div class="col-md-9">
                            <p class="form-control-plaintext text-muted">
                                @if($task->status == 'pending')
                                    <span class="text-danger">Pending</span>
                                @else
                                    <span class="text-success">Completed</span>
                                @endif
                            </p>
                        </div>
                    </div>
  
  
                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label">Details</label>
                        <div class="col-md-9">
                            <p class="form-control-plaintext text-muted">{{$task->details}}</p>
                        </div>
                    </div>
                    <hr>
                      
                    <div class="form-group row mb-0">
                      <div class="col-md-9 offset-md-3">
                        @if($task->status == 'pending')

                            <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-info" style = "background: rgb(99, 99, 186); border-radius: 8px; border:1px solid rgb(99, 99, 186)">Checkout Task</a>

                        @endif
                        

                          <div style="display: inline-block;">
                            <form method = "POST" action="{{ route('tasks.delete', ['task' => $task->id]) }}" style="border:none" method="POST" id="deleteForm{{$task->id}}">
                              @csrf
                              @method('DELETE')

                              <button type = "submit" class="btn btn-outline-danger" onclick="confirmDelete(event, 'deleteForm{{$task->id}}')">Delete</button>
                            </form>
                          </div>

                          <a href="{{route('tasks.index')}}" class="btn btn-outline-secondary">Back</a>
                      </div>
                    </div>
                  </div>
                </div>
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