<x-main>

    @section('title', $task->title)

    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8 mb-3 mt-3">

                    @if(session()->has('error'))

                        <div class="text-danger text-center" role="alert">
                            <small>
                                {{session('error')}}
                            </small>
                        </div>

                    @endif

                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Checkout Task</strong>
                        </div>           
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method = "POST" action = "{{route('tasks.update', $task->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label for="title" class="col-md-3 col-form-label">Title</label>
                                            <div class="col-md-9">
                                                <input type="text" name="title" id="title" class="form-control" value = "{{old('title', $task->title)}}" readonly>

                                            </div>
                                        </div>
  
                                        <div class="form-group row">
                                            <label for="name" class="col-md-3 col-form-label">Checkout</label>
                                            <div class="col-md-9">
                                                <select class="form-control form-control-lg form-control-title" id="status" name="status">
                                                    
                                                    <option value="completed">Completed</option>

                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-9 offset-md-3">
                                                <button type="submit" class="btn btn-primary" style = "background: rgb(99, 99, 186); border-radius: 8px; border:1px solid rgb(99, 99, 186)">Save Checkout</button>
                                                <a href="{{route('tasks.show', $task->id)}}" class="btn btn-outline-secondary">Back</a>
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