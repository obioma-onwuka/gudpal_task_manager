<x-main>

    @section('title', 'Sign In')

    <div class="auth-wrapper d-flex bg-light">
        <div class="col-md-4 m-auto">
            <div class="bg-white shadow-sm">
                <h1 class="border-bottom p-4" style = "color: rgb(99, 99, 186)">Login</h1>
                
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

                <div class="px-4 pt-4">

                    <form method = "POST" action = "{{ route('login.try') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label" style = "color: rgb(99, 99, 186)">Email:</label>
                            <input type="email" class="form-control" name="email" value = "{{old('email')}}" autofocus/>

                            @error('email')
                                <div class="text-danger" role="alert">
                                    <small>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label" style = "color: rgb(99, 99, 186)">Password:</label>
                            <input type="password" class="form-control" name="password" />

                            @error('password')
                                <div class="text-danger" role="alert">
                                    <small>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label text-black-50" for="customCheck1">Remember me</label>
                            </div>
                            <a href="request-reset-password.html" style = "color: rgb(99, 99, 186)">Forgot your password?</a>
                        </div>
                        <div class="mt-4 d-grid">
                            <button type="submit" class="btn btn-primary" style = "background: rgb(99, 99, 186); border-radius: 8px">Submit</button>
                            <div class="text-center py-4 text-muted">
                                Don't have account?
                                <a href="{{ route('register.show') }}" class="font-weight-bold text-decoration-none" style = "color: rgb(99, 99, 186)">Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-main>