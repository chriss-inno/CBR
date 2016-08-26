<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>CBR Tool | Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {!! Html::style("assets/global/css/googlefonts.css" ) !!}
    {!! Html::style("assets/global/plugins/font-awesome/css/font-awesome.css" ) !!}
    {!! Html::style("assets/global/plugins/simple-line-icons/simple-line-icons.css" ) !!}
    {!! Html::style("assets/global/plugins/bootstrap/css/bootstrap.css" ) !!}
    {!! Html::style("assets/global/plugins/bootstrap-switch/css/bootstrap-switch.css" ) !!}
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {!! Html::style("assets/global/plugins/select2/css/select2.min.css" ) !!}
    {!! Html::style("assets/global/plugins/select2/css/select2-bootstrap.min.css" ) !!}
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href=" {{ asset("assets/global/css/components.css")}}" rel="stylesheet" id="style_components" type="text/css" />
    {!! Html::style("assets/global/css/plugins.min.css" ) !!}
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! Html::style("assets/pages/css/login.min.css" ) !!}
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{{ asset("favicon.ico")}}" /> </head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="#">
        <img src="{{ asset("assets/pages/img/logo-big.png")}}" alt="logo" /> </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    {!! Form::open(array('url'=>'login','class'=>'login-form','id'=>'login')) !!}

        <h3 class="form-title font-green">Sign In</h3>
    @if($errors->first('username') || $errors->first('password'))
        <div class="alert fade in alert-danger">
            <i class="icon-remove close" data-dismiss="alert"></i>
            Enter any username or password.
        </div>
    @endif
    @if(Session::has('message'))
        <div class="alert fade in alert-danger">
            <i class="icon-remove close" data-dismiss="alert"></i>
            {{Session::get('message')}}
        </div>
    @endif
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Enter any username and password. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase">Login</button>
            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1" />Remember
                <span></span>
            </label>
            <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
        </div>

   {!! Form::close() !!}
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    {!! Form::open(array('url'=>'forgetPassword','class'=>'forget-form','id'=>'forgetPassword')) !!}

        <h3 class="font-green">Forget Password ?</h3>
        <p> Enter your e-mail address below to reset your password. </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
            <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
   {!! Form::close() !!}
    <!-- END FORGOT PASSWORD FORM -->

</div>
<div class="copyright"> {{date("Y")}} &copy; Community Based Rehabilitation Programme (CBR). </div>
<!--[if lt IE 9]>
{!! Html::script("assets/global/plugins/respond.min.js") !!}
{!! Html::script("assets/global/plugins/excanvas.min.js") !!}
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
{!! Html::script("assets/global/plugins/jquery.min.js") !!}
{!! Html::script("assets/global/plugins/bootstrap/js/bootstrap.min.js") !!}
{!! Html::script("assets/global/plugins/js.cookie.min.js") !!}
{!! Html::script("assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js") !!}
{!! Html::script("assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js") !!}
{!! Html::script("assets/global/plugins/jquery.blockui.min.js") !!}
{!! Html::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js") !!}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{!! Html::script("assets/global/plugins/jquery-validation/js/jquery.validate.min.js") !!}
{!! Html::script("assets/global/plugins/jquery-validation/js/additional-methods.min.js") !!}
{!! Html::script("assets/global/plugins/select2/js/select2.full.min.js") !!}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
{!! Html::script("assets/global/scripts/app.min.js") !!}
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{!! Html::script("assets/pages/scripts/login.min.js") !!}
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>