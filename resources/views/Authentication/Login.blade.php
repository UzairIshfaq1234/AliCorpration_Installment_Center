@include('Resources.HeaderResources')

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">


                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4> Ali Corporation<br> Login</h4>
                            </div>

                            <div class="card-body">
                                @if ($error)
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>&times;</span>
                                            </button>
                                            Incorrect Credential.
                                        </div>
                                    </div>
                                @endif
                                <form method="POST" action="{{ url('/') }}" class="needs-validation"
                                    novalidate="">
                                    @csrf

                                    <div class="form-group">
                                        <label for="Username">UserName</label>
                                        <input type="text" class="form-control" name="Username" tabindex="1"
                                            required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your UserName
                                            @error('Username')
                                                {{ $message }}
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="Password" class="control-label">Password</label>
                                            <div class="float-right">
                                            </div>
                                        </div>
                                        <input type="Password" class="form-control" name="Password" tabindex="2"
                                            required>
                                    </div>
                                    <div class="form-group">

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>





                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>



    @include('Resources.FooterResources')
