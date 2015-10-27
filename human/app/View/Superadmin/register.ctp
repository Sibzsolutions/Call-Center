<?php ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo $this->webroot.'bootstrap/css/bootstrap.min.css';?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $this->webroot.'css/temp_first/AdminLTE.min.css';?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $this->webroot.'plugins/iCheck/square/blue.css';?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <?=$this->Session->flash('auth');?>
        <?=$this->Form->create('User');?>
        
          <div class="form-group has-feedback">          
          	<?=$this->Form->input('usrfname',array( "type"=>"text", "class"=>"form-control", "placeholder"=>"Enter First name",'required'=>'required','label'=>'','div'=>false));?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          
          <div class="form-group has-feedback">
          	<?=$this->Form->input('usrlname',array('type'=>'text', 'class'=>'form-control', 'placeholder'=>'Enter Last name','required'=>'required','label'=>'','div'=>false));?>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
          	<?=$this->Form->input('username',array("type"=>"text", "class"=>"form-control", "placeholder"=>"Enter Username",'required'=>'required','label'=>'','div'=>false));?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          
          <div class="form-group has-feedback">
          	<?=$this->Form->input('email',array("type"=>"email", "class"=>"form-control", "placeholder"=>"Enter Email",'required'=>'required','label'=>'','div'=>false));?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          
          <div class="form-group has-feedback">
          	<?=$this->Form->input('password',array('type'=>'password', 'class'=>'form-control', 'placeholder'=>'Retype password','required'=>'required','label'=>'','div'=>false));?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        <?=$this->Form->end()?>
        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
        </div>

        <a href="login.html" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

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
