<x-main>

    @section('title', 'Gudpal')
    <!-- content -->
    <div class="py-5 bg-white">
        <div class="px-4 my-5 text-center">
            <h1 class="display-5 fw-bold mt-4">Gudpal Task Manager</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Gudpal gives you everything you need to organize your tasks easily.</p>
                <div class="d-flex justify-content-sm-center">
                    <a href="{{ route('register.show') }}" class="btn btn-primary btn-lg mr-2" style = "background: rgb(99, 99, 186); border-radius: 37px">Register</a>
                    <a href="#how" class="btn btn-outline-secondary btn-lg">How It Works</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5" id = "how">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-title text-center mb-5">
                        <h2>How It Works</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fa fa-edit" style = "font-size:35px; color:rgb(99, 99, 186)"></i>
                <h3 style = "color: rgb(99, 99, 186)">One-time Account</h3>
                <p>Create your one-time account, complete the verification steps by following the instructions sent to the email provided during your registration. </p>
            </div>
            
            <div class="col-lg-4 text-center">
                <i class="fa fa-lock" style = "font-size:35px; color:rgb(99, 99, 186)"></i>
                <h3 style = "color: rgb(99, 99, 186)">Sign In</h3>
                <p>Proceed to sign in to task management panel. You can always modify your account information from the panel.</p>
            </div>

            <div class="col-lg-4 text-center">
                <i class="fa fa-lock" style = "font-size:35px; color:rgb(99, 99, 186)"></i>
                <h3 style = "color: rgb(99, 99, 186)">Create Your Tasks</h3>
                <p>Create new tasks. Manage existing tasks and assign tasks to members for easier management. You can create as many tasks as possible</p>
            </div>
        </div>
    </div>

    <div class="container py-5 bg-white mb-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-title text-center mb-5">
                        <h2>About Gudpal</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="img/about_bg.png" alt="" style = "height: 150px">
            </div>
            
            <div class="col-lg-6 text-center">
                <p class = "lead mb-4">Gudpal is a unique tasks management platform that gives you everything you need to organize your tasks easily.</p>
                <p class = "lead mb-4">From task creation, task assignment to task management, the interface is collectively easy to navigate. Gudpal will help you achieve maximum output per day through easy task managements.</p>
            </div>
        </div>
    </div>

</x-main>