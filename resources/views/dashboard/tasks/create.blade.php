<x-main>

    @section('title', 'Create Task')

    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8 mb-3 mt-3">

                    @if(session()->has('error'))

                        <div class="text-error text-center" role="alert">
                            <small>
                                {{session('error')}}
                            </small>
                        </div>

                    @endif

                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Add Task</strong>
                        </div>           
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method = "POST" action = "{{route('task.try')}}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="title" class="col-md-3 col-form-label">Title</label>
                                            <div class="col-md-9">
                                                <input type="text" name="title" id="title" class="form-control" value = "{{old('title')}}" autofocus>

                                                @error('title')
                                                    <div class="text-danger" role="alert">
                                                        <small>
                                                            {{ $message }}
                                                        </small>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
  
                                        <div class="form-group row">
                                            <label for="name" class="col-md-3 col-form-label">Details</label>
                                            <div class="col-md-9">
                                                <textarea name="details" id="address" rows="3" class="form-control" style = "height: 150px">{{old('details')}}</textarea>

                                                @error('details')
                                                    <div class="text-danger" role="alert">
                                                        <small>
                                                            {{ $message }}
                                                        </small>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="name" class="col-md-3 col-form-label">Set Priority:</label>
                                            <div class="col-md-9">
                                                <select name="priority" id="" class="form-control" value = "{{old('priority')}}">

                                                    <option value="1">High</option>
                                                    <option value="0">Low</option>

                                                </select>

                                                @error('priority')
                                                    <div class="text-danger" role="alert">
                                                        <small>
                                                            {{ $message }}
                                                        </small>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

  
                                        <div class="form-group row">
                                            <label for="name" class="col-md-3 col-form-label">Due Date:</label>
                                            <div class="col-md-9">
                                                <input type="date" name="due_date" id="" class="form-control" value = "{{old('due_date')}}">

                                                @error('due_date')
                                                    <div class="text-danger" role="alert">
                                                        <small>
                                                            {{ $message }}
                                                        </small>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-9 offset-md-3">
                                                <button type="submit" class="btn btn-primary" style = "background: rgb(99, 99, 186); border-radius: 8px; border:none">Save</button>
                                                <a href="{{route('tasks.index')}}" class="btn btn-outline-secondary">Back</a>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-main>