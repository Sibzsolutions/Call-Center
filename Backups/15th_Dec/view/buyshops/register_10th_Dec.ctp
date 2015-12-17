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
</head>
<body>

<div class="middle_content">
	 <div class="width1220"> 
	     <div class="register">
		  	   <div class="register-top-grid">
					<div class="contact_heading" style="width: 100%; margin: 0px;"><strong>PERSONAL</strong> INFORMATION</div>
					<?=$this->Form->create('User');?>
					 <div>
						<span>First Name<label>*</label></span>
						<?=$this->Form->input('usrfname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
						
						<!--<input type="text"> -->
					 </div>
					 <div>
						<span>Last Name<label>*</label></span>
						<?=$this->Form->input('usrlname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
						<!--<input type="text"> -->
					 </div>
					<div>
						<span>Username<label>*</label></span>
						<?=$this->Form->input('username',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
						
						<!--<input type="text"> -->
					 </div>			
					 <div>
						<span>Password<label>*</label></span>
						<?=$this->Form->input('password',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
						
						<!--<input type="text"> -->
					 </div>			
					<div>
						 <span>Email Address<label>*</label></span>
						 <?=$this->Form->input('email',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
						 <!--<input type="text"> -->
					 </div>
					 <div class="clearfix"> </div>
					   <!--<a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>-->
					 </div>
					 
				     <!--<div class="register-bottom-grid">
						    <h3>LOGIN INFORMATION</h3>
							 <div>
								<span>Password<label>*</label></span>
								<?php //echo $this->Form->input('username',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
								
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<?php //echo $this->Form->input('username',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
								
							 </div>
							 <div class="clearfix"> </div>
					 </div>-->
				<div class="clearfix"> </div>
				<div class="register-but">
				   
				   <input type="submit" value="submit" class="button" style="margin:0px;">
				   <div class="clearfix"> </div>
				   <?=$this->Form->end()?>
				   
				</div>
		   </div>
     </div>
</div>      