<x-main>

    @section('title', 'Settings')

    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('profile.show')}}">Back To Account</a>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href= "{{route('profile.edit')}}" class="list-group-item list-group-item-action active">
                                <span>
                                    Other Settings
                                </span>
                            </a>
                        </div>

                    </div>
                </div>
    
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Change Password</strong>
                        </div>

                        

                            @if(session()->has('success'))

                                <div class="text-success text-center mt-3 mb-3" role="alert">
                                    <small>
                                        {{session('success')}}
                                    </small>
                                </div>

                            @endif

                            @if(session()->has('error'))

                                <div class="text-danger text-center mt-3 mb-3" role="alert">
                                    <small>
                                        {{session('error')}}
                                    </small>
                                </div>

                            @endif

                        
                        <form method = "POST" action = "{{route('password.try')}}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="current-password" class="col-md-4 col-form-label">Current Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name = "current_password" id = "current-password">

                                        @error('current_password')
                                            <div class="text-danger" role="alert">
                                                <small>
                                                    {{ $message }}
                                                </small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label">New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="new_password" id = "password">

                                        @error('new_password')
                                            <div class="text-danger" role="alert">
                                                <small>
                                                    {{ $message }}
                                                </small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirmation" class="col-md-4 col-form-label">Password
                                        Confirmation</label>
                                    <div class="col-md-8">
                                        <input type="password" class = "form-control" name = "new_password_confirmation" id = "password-confirmation">

                                        @error('new_password_confirmation')
                                            <div class="text-danger" role="alert">
                                                <small>
                                                    {{ $message }}
                                                </small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                        
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-6">
                                                <button type="submit" class="btn btn-success" style = "background: rgb(99, 99, 186); border-radius: 8px; border:none">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    

</x-main>