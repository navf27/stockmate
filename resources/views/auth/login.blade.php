<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/azzara.min.css">
</head>

<body class="login">
    @if(session()->has('registered'))
    <script>
        // toastr.options = {
        //     "closeButton": false,
        //     "debug": false,
        //     "newestOnTop": false,
        //     "progressBar": false,
        //     "positionClass": "toast-top-center",
        //     "preventDuplicates": false,
        //     "onclick": null,
        //     "showDuration": "300",
        //     "hideDuration": "1000",
        //     "timeOut": "5000",
        //     "extendedTimeOut": "1000",
        //     "showEasing": "swing",
        //     "hideEasing": "linear",
        //     "showMethod": "fadeIn",
        //     "hideMethod": "fadeOut"
        // }
        toastr.success('User Registered!')
    </script>
    @elseif(session()->has('loginFail'))
    <script>
        toastr.error('Login Failed!')
    </script>
    @endif
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center">Log In</h3>
            <div class="login-form">
                <form action="{{ route('auth.auth') }}" method="POST"> @csrf
                    <div class="form-group">
                        <label for="username" class="form-label"><b>Username</b></label>
                        <input id="username" name="username" type="text"
                            class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
                            required>
                    </div>
                    @error('username')
                    <div class="form-group">
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="password" class="placeholder"><b>Password</b></label>
                        <a href="#" class="link float-right">Forget Password ?</a>
                        <div class="position-relative">
                            <input id="password" name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" required>
                            <div class="show-password">
                                <i class="flaticon-interface"></i>
                            </div>
                        </div>
                    </div>
                    @error('password')
                    <div class="form-group">
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                    <div class="form-action mb-4">
                        <button type="submit" class="btn btn-primary col-md-5 fw-bold">Log In</button>
                    </div>
                    <!-- 				<div class="form-action">
                        <a href="#" class="btn btn-primary btn-rounded btn-login">Sign In</a>
                    </div> -->
                    <div class="login-account">
                        <span class="msg">Don't have an account yet ?</span>
                        <a href="{{ route('auth.register')}}" class="link">Sign Up</a>
                    </div>
            </div>
        </div>
        </form>

    </div>
    <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/ready.js"></script>
</body>

</html>