<x-main>

    @section('title', 'Register')

    <div class="auth-wrapper d-flex bg-light">
        <div class="col-md-4 m-auto">
            <div class="bg-white shadow-sm">
                <h1 class="border-bottom p-4" style = "color: rgb(99, 99, 186)">Register</h1>
                @if(session()->has('error'))

                    <div class="text-success text-center" role="alert">
                        <small>
                            {{session('error')}}
                        </small>
                    </div>

                @endif

                <div class="px-4 pt-4">

                    <form method = "POST" action = "{{ route('register.try') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label" style = "color: rgb(99, 99, 186)">Name:</label>
                            <input type="text" class="form-control" name="name" value = "{{old('name')}}" autofocus/>

                            @error('name')
                                <div class="text-danger" role="alert">
                                    <small>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label" style = "color: rgb(99, 99, 186)">Email:</label>
                            <input type="email" class="form-control" name="email" value = "{{old('email')}}" />

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
                        <div class="mb-3">
                            <label for="password" class="form-label" style = "color: rgb(99, 99, 186)">Password Confirmation:</label>
                            <input type="password" class="form-control" name="password_confirmation" />

                            @error('password_confirmation')
                                <div class="text-danger" role="alert">
                                    <small>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
                        <div class="mt-4 d-grid">
                            <button type="submit" class="btn btn-primary" style = "background: rgb(99, 99, 186); border-radius: 8px">Submit</button>
                            <div class="text-center py-4 text-muted">
                                Already have account?
                                <a href="{{ route('login.show') }}" class="font-weight-bold text-decoration-none" style = "color: rgb(99, 99, 186)">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-main>