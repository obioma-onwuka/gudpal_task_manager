<x-main>
    @section('title', 'Dashboard')

    <main class="py-5">
        <div class="container">
            <h1 class="h5 mb-3">
                Welcome
                <small class="text-capitalize text-success">{{auth()->user()->name}} 🤝</small>
            </h1>
            <div class="row">
                <div class="col-md-12 mb-5">
                    <div class="card">
                        <div class="card-header bg-white">
                            How it works
                        </div>
                        <div class="card-body">
                            <div >
                                <p><span class="text-success"># &nbsp;</span> Create your tasks. Example: Laundry, Cooking, Working out, Car Repairs etc.</p>

                                <p><span class="text-success"># &nbsp;</span> Set the due date for the task created. Ensure to <span class="text-success">CHECKOUT</span> your task after completion. This will help for easy task management and organization.</p>
                                <p><span class="text-success"># &nbsp;</span> To checkout a task, click on either <span class = "btn btn-sm btn-circle btn-outline-info"><i class="fa fa-eye" style = 'color:#222'></i></span> or the <span class="btn btn-sm btn-circle btn-outline-secondary"><i class="fa fa-edit" style = "color:#222"></i></span> icons</p>

                                <p><span class="text-success"># &nbsp;</span> You can only checkout a task once</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-white">
                            All Tasks
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center">
                                <h3 class="h1">{{$get_tasks}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-white">
                            Pending Tasks
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center">
                                <h3 class="h1">{{$get_pending_tasks}}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-white">
                            Completed Tasks
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center">
                                <h3 class="h1">{{$get_completed_tasks}}</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </main>

</x-main>