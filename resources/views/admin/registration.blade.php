
<!doctype html>
<html lang="en">
<head>
    <title>Login/Register Modal by Creative Tim</title>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<style>body{padding-top: 60px;}</style>

    <link href="{{ asset('public/assets/css/bootstrap.css')}}" rel="stylesheet" />

	<link href="{{ asset('public/assets/css/login-register.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<script src="{{ asset('public/assets/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
	<script src="{{ asset('public/assets/js/bootstrap.js')}}" type="text/javascript"></script>
	<script src="{{ asset('public/assets/js/login-register.js')}}" type="text/javascript"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                 <!-- <a class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log in</a> -->
                 <!-- <a class="btn big-register" data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Register</a></div> -->
            <div class="col-sm-4"></div>
        </div>


		 <div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Login with</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                             <div class="content">
                                <div class="social">
                                    <a class="circle github" href="#">
                                        <i class="fa fa-github fa-fw"></i>
                                    </a>
                                    <a id="google_login" class="circle google" href="#">
                                        <i class="fa fa-google-plus fa-fw"></i>
                                    </a>
                                    <a id="facebook_login" class="circle facebook" href="#">
                                        <i class="fa fa-facebook fa-fw"></i>
                                    </a>
                                </div>
                                <div class="division">
                                    <div class="line l"></div>
                                      <span>or</span>
                                    <div class="line r"></div>
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form accept-charset="UTF-8">
                                    
                                    <input id="admin-email" class="form-control" type="text" placeholder="Email" name="admin_email">
                                    <input id="admin-password" class="form-control" type="password" placeholder="Password" name="admin_password">
                                    <input class="btn btn-default btn-login" type="button" id="login" value="Login" onclick="loginAjax()">
                                    </form>
                                </div>
                             </div>
                        </div>
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form html="{:multipart=>true}" data-remote="true" accept-charset="UTF-8">
                                	{{ csrf_field() }}
                                    <input id="full_name" class="form-control" type="text" placeholder="Full name" name="full_name">
	                                
                                    <input id="user_name" class="form-control" type="text" placeholder="user name" name="user_name">
                                    
                                    <input id="emails" class="form-control" type="text" placeholder="Email" name="email">
                                    
                                    <input id="contact" class="form-control" type="text" placeholder="Contact No." name="contact">
                                    
	                                <input id="passwords" class="form-control" type="password" placeholder="Password" name="password">
                                    
                                    <input id="address" class="form-control" type="text" placeholder="Address" name="address">
                                    
                                    <div class="form-group">
                                      <select class="form-control" id="status">
                                            <option selected="">Status</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                      </select>
                                    </div>
	                                
	                                <input class="btn btn-default btn-register" type="button" value="Create account" onclick="PostForRegister()" name="commit">
	                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Looking to
                                 <a href="javascript: showRegisterForm();">create an account</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Already have an account?</span>
                             <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>
    		      </div>
		      </div>
		  </div>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        openLoginModal();
    });
    
</script>


</body>
</html>