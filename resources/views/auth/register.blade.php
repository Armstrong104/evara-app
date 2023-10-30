<!doctype html>
<html lang="en" dir="ltr">
<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="keywords" content="">

        <!-- TITLE -->
		<title>Registration</title>

        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}admin/assets/images/brand/favicon.ico" />

        <!-- BOOTSTRAP CSS -->
        <link id="style" href="{{asset('/')}}admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

        <!-- STYLE CSS -->
        <link href="{{asset('/')}}admin/assets/css/style.css" rel="stylesheet" />
        <link href="{{asset('/')}}admin/assets/css/skin-modes.css" rel="stylesheet" />



        <!--- FONT-ICONS CSS -->
        <link href="{{asset('/')}}admin/assets/plugins/icons/icons.css" rel="stylesheet" />

        <!-- INTERNAL Switcher css -->
        <link href="{{asset('/')}}admin/assets/switcher/css/switcher.css" rel="stylesheet">
        <link href="{{asset('/')}}admin/assets/switcher/demo.css" rel="stylesheet">

    </head>


        <body class="ltr login-img">
            <!-- GLOBAL-LOADER -->
            <div id="global-loader">
                <img src="{{asset('/')}}admin/assets/images/loader.svg" class="loader-img" alt="Loader">
            </div>
			<!-- PAGE -->
			<div class="page">
				<div>
				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto text-center">
						<a href="index.html">
							<img src="{{asset('/')}}website/assets/imgs/theme/logo.svg" class="header-brand-img" alt="">
						</a>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-0">
							<div class="card-body">
								<form class="login100-form validate-form" action="{{route('register')}}" method="POST">
                                    @csrf
									<span class="login100-form-title">
										Registration
									</span>
									<div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
										<input class="input100" type="text" name="name" placeholder="User name">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="mdi mdi-account" aria-hidden="true"></i>
										</span>
									</div>
									<div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
										<input class="input100" type="email" name="email" placeholder="Email">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-email" aria-hidden="true"></i>
										</span>
									</div>
									<div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
										<input class="input100" type="password" name="password" placeholder="Password">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
									</div>
									<div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
										<input class="input100" type="password" name="password_confirmation" placeholder="Password">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
									</div>
									<div class="container-login100-form-btn">
										<button type="submit" class="login100-form-btn btn-primary">
											Register
										</button>
									</div>
									<div class="text-center pt-3">
										<p class="text-dark mb-0">Already have account?<a href="{{route('login')}}" class="text-primary ms-1">Sign In</a></p>
									</div>
								</form>
							</div>
							<div class="card-footer">
								<div class="d-flex justify-content-center my-3">
									<a href="javascript:void(0)" class="social-login  text-center me-4">
										<i class="fa fa-google"></i>
									</a>
									<a href="javascript:void(0)" class="social-login  text-center me-4">
										<i class="fa fa-facebook"></i>
									</a>
									<a href="javascript:void(0)" class="social-login  text-center">
										<i class="fa fa-twitter"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
			<!-- END PAGE -->


        <!-- JQUERY JS -->
        <script src="{{asset('/')}}admin/assets/plugins/jquery/jquery.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="{{asset('/')}}admin/assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="{{asset('/')}}admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="{{asset('/')}}admin/assets/plugins/p-scroll/perfect-scrollbar.js"></script>

        <!-- STICKY JS -->
        <script src="{{asset('/')}}admin/assets/js/sticky.js"></script>



        <!-- COLOR THEME JS -->
        <script src="{{asset('/')}}admin/assets/js/themeColors.js"></script>

        <!-- CUSTOM JS -->
        <script src="{{asset('/')}}admin/assets/js/custom.js"></script>

        <!-- SWITCHER JS -->
        <script src="{{asset('/')}}admin/assets/switcher/js/switcher.js"></script>

    </body>


<!-- Mirrored from laravel8.spruko.com/noa/register by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 May 2023 13:13:11 GMT -->
</html>
