<!DOCTYPE html>
<html>


<!-- Mirrored from www.einfosoft.com/templates/admin/smart/source/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 May 2022 10:59:35 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Smart University | Bootstrap Responsive Admin Template</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
        type="text/css" />
    <!-- icons -->
    <link rel="stylesheet" href="./leave_report/assets/plugins/iconic/css/material-design-iconic-font.min.css">
    <!-- bootstrap -->
    <link href="./leave_report/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme Styles -->
    <link href="./leave_report/assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components"
        type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="./leave_report/assets/css/pages/login.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="https://www.einfosoft.com/templates/admin/smart/source/assets/img/favicon.ico" />
</head>

<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="./leave_report/assets/img/pages/signin.jpg" alt="sing up image"></figure>
                        <a href="/signup" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        @include('flash.flash')
                        <form method="POST" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <div class="">
                                    <input name="email" type="email" value="{{ old('email') }}" placeholder="Email"
                                        class="form-control input-height" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <input name="password" type="password" placeholder="Password"
                                        class="form-control input-height" />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                    me</label>
                            </div>
                            <div class="form-group form-button">
                                <button class="btn btn-round btn-primary" type="submit" name="signin" id="signin">Login</button>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- start js include path -->
    <script src="./leave_report/assets/plugins/jquery/jquery.min.js"></script>
    <!-- bootstrap -->
    <script src="./leave_report/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- end js include path -->
</body>


<!-- Mirrored from www.einfosoft.com/templates/admin/smart/source/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 May 2022 10:59:35 GMT -->

</html>