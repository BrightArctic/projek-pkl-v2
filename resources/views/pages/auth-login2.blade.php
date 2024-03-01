    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
            name="viewport">
        <title>Login</title>
        <link rel="shortcut icon" href="img/pnj.ico" type="image/x-icon">

        <!-- General CSS Files -->
        <link rel="stylesheet"
            href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer" />

        <!-- CSS Libraries -->
        <link rel="stylesheet"
            href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">

        <!-- Template CSS -->
        <link rel="stylesheet"
            href="{{ asset('css/style.css') }}">
        <link rel="stylesheet"
            href="{{ asset('css/components.css') }}">

            <style>
            .btn.disabled, .btn.disabled:hover {
                pointer-events: none;
            }
            </style>
    </head>

    <body>
        <div id="app">
            <section class="section">
                <div class="d-flex align-items-stretch flex-wrap">
                    <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                        <div class="m-3 p-4">
                            <img src="{{ asset('img/pnj.ico') }}"
                                alt="logo"
                                width="80"
                                class="shadow-light rounded-circle mb-5 mt-2">
                            <h2 class="text-dark font-weight-normal">Sarpras</h2>
                            <p class="text-muted">Before you get started, you must login or register if you don't already
                                have an account.</p>
                                <div id="lockoutMessage" class="alert alert-danger d-none">
                                    Too many login attempts. Please try again after <span id="lockoutDuration"></span> seconds.
                                </div>
                                <hr>
                                @if(session('error'))
                                <div class="alert alert-danger">
                                    <b>Opps!</b> {{session('error')}}
                                </div>
                                @endif
                                @if(session('logout'))
                                <div class="alert alert-success">
                                    {{session('logout')}}
                                </div>
                                @endif
                            <form method="POST"
                                action="{{route('loginproses')}}"
                                class="needs-validation"
                                novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input id="email"
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        tabindex="1"
                                        required
                                        autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password"
                                            class="control-label">Password <span class="text-danger">*</span></label>
                                    </div>
                                    <input id="password"
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        tabindex="2"
                                        required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                            name="remember"
                                            class="custom-control-input"
                                            tabindex="3"
                                            id="remember-me">
                                        <label class="custom-control-label"
                                            for="remember-me">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    {{-- <a href="auth-forgot-password"
                                        class="float-left mt-3">
                                        Forgot Password?
                                    </a> --}}
                                    <button type="submit"
                                        class="btn btn-primary btn-lg btn-icon icon-right"
                                        tabindex="4">
                                        Login
                                    </button>
                                </div>

                                <div class="mt-5 text-center">
                                    Don't have an account? <a href="{{route("register")}}">Create new one</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12 order-lg-2 min-vh-100 position-relative overlay-gradient-bottom order-1 "
                        style="background-size: cover; background-position: center; overflow-y: hidden;"
                        data-background="{{ asset('img/unsplash/pnj.jpg') }}">
                        {{-- <div class="absolute-bottom-left index-2">
                            <div class="text-light p-5 pb-2">
                                <div class="mb-5 pb-3">
                                    <h1 class="display-4 font-weight-bold mb-2">Good Morning</h1>
                                    <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
                                </div> --}}
                                {{-- Photo by <a class="text-light bb"
                                    target="_blank"
                                    href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a
                                    class="text-light bb"
                                    target="_blank"
                                    href="https://unsplash.com">Unsplash</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- General JS Scripts -->
        <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
        <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
        <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('js/stisla.js') }}"></script>

        <!-- JS Libraies -->

        <!-- Page Specific JS File -->

        <!-- Template JS File -->
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>

        <script>
            $(document).ready(function () {
                // Function to refresh the page every 10 seconds
                function refreshPage() {
                    setTimeout(function () {
                        location.reload();
                    }, 4000); // 10000 milliseconds = 10 seconds
                }

                // Check if the lockout message should be displayed
                @if(session()->has('lockout_until') && now()->lt(session()->get('lockout_until')))
                    var lockoutDuration = {{ now()->diffInSeconds(session()->get('lockout_until')) }};
                    $('#lockoutMessage').removeClass('d-none');
                    $('#lockoutDuration').text(lockoutDuration);

                    // Hide the login button
                    $('.btn.btn-primary').hide();

                    // Show the login button again after lockout duration
                    setTimeout(function () {
                        $('#lockoutMessage').addClass('d-none');
                        $('.btn.btn-primary').show();
                    }, lockoutDuration * 1000); // Convert seconds to milliseconds

                    // Refresh the page every 10 seconds while locked out
                    refreshPage();
                @endif
            });
            </script>


    </body>

    </html>
