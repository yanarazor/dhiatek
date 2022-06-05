<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>{{ config('product.name')}} | {{ config('product.client_name')}}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #4 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        
        <!-- BEGIN : LOGIN PAGE 5-2 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 login-container bs-reset">
                    <img class="login-logo login-6" src="/assets/img/logodhiatek.png" width="100px" />
                    <div class="login-content">
                        <h1>Admin Login</h1>
                        <p> Silahkan masukan username dan password admin </p>
                        <form action="/login" class="login-form" method="post">
                            @csrf
                            @if(session()->has('LoginError'))
                                <div class="alert alert-danger">
                                    <button class="close" data-close="alert"></button>
                                    <span>{{ session('LoginError') }} </span>
                                </div>
                            @endif
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Enter any username and password. </span>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" autofocus value="{{ old('email') }}" placeholder="email" name="email" required/> </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required/> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="rememberme mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" name="remember" value="1" /> Remember me
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <div class="forgot-password">
                                        <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                                    </div>
                                    <button class="btn blue" type="submit">Sign In</button>
                                </div>
                            </div>
                        </form>
                        <!-- BEGIN FORGOT PASSWORD FORM -->
                        <form class="forget-form" action="javascript:;" method="post">
                            <h3>Forgot Password ?</h3>
                            <p> Enter your e-mail address below to reset your password. </p>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                            <div class="form-actions">
                                <button type="button" id="back-btn" class="btn blue btn-outline">Back</button>
                                <button type="submit" class="btn blue uppercase pull-right">Submit</button>
                            </div>
                        </form>
                        <!-- END FORGOT PASSWORD FORM -->
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-5 bs-reset">
                                <ul class="login-social">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-7 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>Copyright &copy; {{ config('product.client_name')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 bs-reset">
                    <div class="login-bg"> </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-2 -->
        <!--[if lt IE 9]>
<script src="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/respond.min.js"></script>
<script src="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/excanvas.min.js"></script> 
<script src="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        @stack("custom-script")
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    </body>

</html>