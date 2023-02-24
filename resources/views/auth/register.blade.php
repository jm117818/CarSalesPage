@extends('')
@section('content')
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }

    </style>

    <div>
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <form action="/register" method="POST">
                                    @csrf
                                    <div class="mb-md-5 mt-md-4 pb-5">
                                        <h2 class="fw-bold mb-2 text-uppercase">CREATE AN ACCOUNT</h2>
                                        <p class="text-white-50 mb-5"></p>


                                        <div class="form-outline form-white mb-4">
                                            <input type="text" name="name" id="typeEmailX"
                                                   class="form-control form-control-lg"/>
                                            <label class="form-label" for="typeEmailX">Username</label>
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="email" name="email" id="typeEmailX"
                                                   class="form-control form-control-lg"/>
                                            <label class="form-label" for="typeEmailX">Email</label>
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="tel" name="phone_number" id="typePhone"
                                                   class="form-control form-control-lg"/>
                                            <label class="form-label" for="typePhone">Phone Number</label>
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="password" name="password" id="typePasswordX"
                                                   class="form-control form-control-lg"/>
                                            <label class="form-label" for="typePasswordX"
                                                   style="margin-left: 0px">Password</label>
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="password" name="password_confirmation"
                                                   id="typePasswordX_confirmation"
                                                   class="form-control form-control-lg"/>
                                            <label class="form-label" for="typePasswordX_confirmation"
                                                   style="margin-left: 0px">Confirm Password</label>
                                        </div>

                                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Register
                                        </button>

                                    </div>
                                </form>
                                <div>
                                    <p class="mb-0">Do you have account?
                                        <a href="{{route('login')}}" class="text-white-50 fw-bold">Sign In</a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

