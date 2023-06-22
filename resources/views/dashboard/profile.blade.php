<x-main>

    @section('title', $isLogged->name)

    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="card">
                        <div class="card-header card-title">
                            Welcome <strong class = "text-capitalize"> {{$isLogged->name}} </strong>
                        </div>
                        <div class="card-body">
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
    
                                        <div class="text-success text-center" role="alert">
                                            <small>
                                                {{session('error')}}
                                            </small>
                                        </div>
    
                                    @endif
    
                                </div>

                                <div class="col-md-8">
                                    
                                    <div class="form-group row">
                                        <label for="first_name" class="col-md-3 col-form-label">Name</label>
                                        <div class="col-md-9">
                                          <p class="form-control-plaintext text-muted text-capitalize">{{$isLogged->name}}</p>
                                        </div>
                                    </div>
                  
                                    <div class="form-group row">
                                        <label for="email" class="col-md-3 col-form-label">Email</label>
                                        <div class="col-md-9">
                                          <p class="form-control-plaintext text-muted">{{$isLogged->email}}</p>
                                        </div>
                                    </div>
                  
                                    <div class="form-group row">
                                        <label for="phone" class="col-md-3 col-form-label">Phone</label>
                                        <div class="col-md-9">
                                          <p class="form-control-plaintext text-muted">
                                            @empty($isLogged->phone)
                                                No record
                                            @else
                                                {{$isLogged->phone}}
                                            @endempty
                                          </p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-md-3 col-form-label">Tasks</label>
                                        <div class="col-md-9">
                                          <p class="form-control-plaintext text-muted">0</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="offset-md-1 col-md-3 text-center">
                                    <div class="form-group">
                                        <label for="bio text-center">Profile Picture</label>
                                        <div class= "fileinput fileinput-new" data-provides = "fileinput">
                                            <div class = "fileinput-new img-thumbnail" >
                                                <img src = "img/{{$isLogged->avatar}}" alt = "avatar" style = "width: 150px; height: 150px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-6">
                                            <a class="btn btn-success" href="{{route('profile.edit')}}" style = "background: rgb(99, 99, 186); border-radius: 8px; border:none">Update Settings</a>
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

</x-main>