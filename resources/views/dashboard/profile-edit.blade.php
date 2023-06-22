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
                            <a href= "{{route('password.edit')}}" class="list-group-item list-group-item-action active">
                                <span>
                                    Change Password
                                </span>
                            </a>
                        </div>

                    </div>
                </div>
    
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Edit Profile</strong>
                        </div>
                        <form method = "POST" action = "{{route('profile.update')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-8">

                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" id="name" class="form-control" value = "{{old('name', $toEdit->name)}}" autofocus>

                                            @error('name')
                                                <div class="text-danger" role="alert">
                                                    <small>
                                                        {{ $message }}
                                                    </small>
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control" value = "{{old('phone', $toEdit->phone)}}" onpaste="return false;"  ondrop="return false;"  onkeypress="return IsNumeric(event);" maxlength = "12">

                                            @error('phone')
                                                <div class="text-danger" role="alert">
                                                    <small>
                                                        {{ $message }}
                                                    </small>
                                                </div>
                                            @enderror
                                        </div>
                        
                                    </div>
                                    <div class="offset-md-1 col-md-3 text-center">
                                        <div class="form-group">
                                            <label for="bio">Profile picture</label>
                                            <div class = "fileinput fileinput-new" data-provides = "fileinput">
                                                <div class = "fileinput-new img-thumbnail" style = "width: 150px; height: 150px;">
                                                    <img src = "img/{{$toEdit->avatar}}" alt = "avatar">
                                                </div>
                                                <div class = "fileinput-preview fileinput-exists img-thumbnail" style = "max-width: 150px; max-height: 150px;"></div>
                                                <div class="mt-2">
                                                    <span class="btn btn-outline-secondary btn-file">
                                                        <span class="fileinput-new">
                                                            Select image
                                                        </span>
                                                        <span class="fileinput-exists">
                                                            Change
                                                        </span>
                                                        <input type="file" name = "profile_dp">
                                                    </span>
                                                    <a href="#" class = "btn btn-outline-secondary fileinput-exists" data-dismiss = "fileinput">
                                                        Remove
                                                    </a>
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
                                                <button type="submit" class="btn btn-success" style = "background: rgb(99, 99, 186); border-radius: 8px; border:1px solid rgb(99, 99, 186)">Save</button>
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
    
    <script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            
            return ret;
        }
    </script>

</x-main>