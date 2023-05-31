<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Register</title>
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

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/azzara.min.css">
</head>

<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center">Sign Up</h3>
            <div class="login-form">
                <form action="{{ route('auth.store') }}" method="POST"> @csrf
                    <div class="form-group">
                        <label for="name" class="placeholder"><b>Fullname</b></label>
                        <input id="name" name="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    </div>
                    @error('name')
                    <div class="form-group">
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="username" class="placeholder"><b>Username</b></label>
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
                        <label for="email" class="placeholder"><b>Email</b></label>
                        <input id="email" name="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            required>
                    </div>
                    @error('email')
                    <div class="form-group">
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="password" class="placeholder"><b>Password</b></label>
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
                    <div class="row form-action">
                        <div class="col-md-6">
                            <a href="{{ route('auth.login') }}" class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary w-100 fw-bold">Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/ready.js"></script>
</body>

</html>