<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo $this->webroot.'css/buy_shop/bootstrap.css';?>" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="<?php echo $this->webroot.'css/buy_shop/style.css';?>" rel='stylesheet' type='text/css' />
<script src="<?php echo $this->webroot.'js/buy_shop/simpleCart.min.js';?>"> </script>
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery-1.11.1.min.js';?>"></script>
<!-- start menu -->
<link href="<?php echo $this->webroot.'css/buy_shop/megamenu.css';?>" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/megamenu.js';?>"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>

<!--<style type="text/css">
html {
	padding:0px;
	margin:0px;
	font-size:0px;
}
</style>-->

</head>
<body>
<div class="middle_content">
	 <div class="width1220"> 
	    <div class="register">
			  <div class="col-md-6 login-right">
			  	<div class="contact_heading"><strong>REGISTERED</strong> CUSTOMERS</div>
				<div class="width100 text14_black" style="padding:0 0 20px 0">If you have an account with us, please log in.</div>
				
				
				<?=$this->Session->flash('auth');?>
				<?=$this->Form->create('User');?>
				  <div>
					<span>Username<label>*</label></span>
					
					<?=$this->Form->input('username',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
					
				  </div>
				  <div>
					<span>Password<label>*</label></span>
					
					<?=$this->Form->input('password',array('type'=>'password','class'=>'form-control','required'=>'required','label'=>'','div'=>false))?>
					
				  </div>
				  <!--<a class="forgot" href="#">Forgot Your Password?</a>-->
				  <input type="submit" value="Login" class="button" style="margin:0px;">
			    <?=$this->Form->end()?>
			   </div>
			    <div class="col-md-6 login-left">
			  	 <div class="contact_heading"><strong>NEW</strong> CUSTOMERS</div>
				 <div class="width100 text14_black" style="padding:0 0 20px 0">By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</div>
				 <a class="button" href="<?php echo $this->webroot.'buyshops/register' ?>">Create an Account</a>
			   </div>	
			   <div class="clearfix"> </div>
		</div>
     </div>
</div>      