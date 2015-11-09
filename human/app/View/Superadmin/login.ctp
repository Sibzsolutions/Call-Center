<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<style type="text/css">
body {
	background-color: #FFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<link href="<?php echo $this->webroot.'css/local/style.css';?>" rel="stylesheet" type="text/css" />

<link href="<?php echo $this->webroot.'img/local/favicon.ico'; ?>" type="image/x-icon" rel="icon" />

</head>

<body>
<div class="login_box">
  <div class="login_logo"><img src="<?php echo $this->webroot.'img/local/login_logo.jpg';?>" width="403" height="50" alt="login_logo" /></div>
  <div class="login_main_box">

	<?=$this->Session->flash('auth');?>
	<?=$this->Form->create('User');?>

	<div class="login_input_box" style="padding-top:87px;">
      <!--<label>Username:</label>-->
      
	  <?=$this->Form->input('username',array('type'=>'text','required'=>'required','label'=>'Username:','div'=>false));?>
	  <!--<input type="text" name="textfield" id="textfield" />-->
	  
    </div>
    <div class="login_input_box">
      <!--<label>Password:</label>-->
	  
	  <?=$this->Form->input('password',array('type'=>'password','required'=>'required','label'=>'Password:','div'=>false))?>
	  <!--<input type="text" name="textfield" id="textfield" />-->
	  
    </div>
    <div class="login_input_box">
	
	  <?=$this->Form->button('Sign In',array('class'=>'btn-flat login_button', 'style'=>'margin: 0 0 0 312px;'))?>	
	  <!--<input type="submit" name="button" id="button" value="Login" class="login_button" style="margin: 0 0 0 312px;" />-->
	  
	  <?=$this->Form->end()?>
		
	</div>
	
	<div class="login_input_box" style="color: #030303; font-family: arial; font-size: 14px; font-weight: bold; margin: 90px 0 30px; text-align: center;">@2015 ONLYHUMANSPORTSWEAR. ALL RIGHTS RESERVED.</div>
  </div>
</div>
</body>
</html>


<?php 

/*

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo $this->webroot."bootstrap/css/bootstrap.min.css";?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style 
    <link rel="stylesheet" href="<?php //echo $this->webroot."css/temp_first/AdminLTE.min.css";?>">-->
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $this->webroot."plugins/iCheck/square/blue.css";?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        
        <?=$this->Session->flash('auth');?>
        <?=$this->Form->create('User');?>
          <div class="form-group has-feedback">
            <?=$this->Form->input('username',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>''));?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <?=$this->Form->input('password',array('type'=>'password','class'=>'form-control','required'=>'required','label'=>''))?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">              
              <?=$this->Form->button('Sign In',array('class'=>'btn btn-primary btn-block btn-flat'))?>
            </div><!-- /.col -->
          </div>
        <?=$this->Form->end()?>
		
        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

  	<!-- jQuery 2.1.4 -->
    <script src="<?php echo $this->webroot.'plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo $this->webroot.'bootstrap/js/bootstrap.min.js';?>"></script>
    <!-- iCheck -->
    <script src="<?php echo $this->webroot.'plugins/iCheck/icheck.min.js';?>"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    </body>
</html>
<?php 
*/

?>