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
					<?=$this->Form->create('User_address');?>
					 <div>
						<span>First Address<label>*</label></span>
						<?=$this->Form->input('addr1',array('type'=>'textarea', 'style'=>'width:500px', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the First Address'));?>
						
						<!--<input type="text"> -->
					 </div>
					 <div>
						<span>Second Address<label>*</label></span>
						<?=$this->Form->input('addr2',array('type'=>'textarea', 'style'=>'width:500px','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Second Address'));?>
						<!--<input type="text"> -->
					 </div>
					 
					 <div>
						<span>Country<label>*</label></span>
						<?=$this->Form->input('usrcountry',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Country'));?>
						
						<!--<input type="text"> -->
					 </div>
					 
					 <div>
						<span>State<label>*</label></span>
						<?=$this->Form->input('usrstate',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the State'));?>
						<!--<input type="text"> -->
					 </div>
                     
					 <div>
						<span>City<label>*</label></span>
						<?=$this->Form->input('usrcity',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the City'));?>
						<!--<input type="text"> -->
					 </div>
								
					 <div>
						<span>Zip Code<label>*</label></span>
						<?=$this->Form->input('usrzip',array('type'=>'text','class'=>'form-control','maxlength'=>'14','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Zip Code'));?>
						
						<!--<input type="text"> -->
					 </div>			
					<div>
						 <span>Phone Number<label>*</label></span>
						 <?=$this->Form->input('usrphones',array('type'=>'number', 'style'=>'width:560px','maxlength'=>'10','class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Phone Number'));?>
						 <!--<input type="text"> -->
					 </div>
					 
					 <div>
						 <span>Is Main<label>*</label></span>
						 <?=$this->Form->input('ismain',array('type'=>'select', 'style'=>'width:560px','options'=>array(1=>'Yes', 0=>'No'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Select the Is Main'));?>
						 <!--<input type="text"> -->
					 </div>
					 
					 <div>
						 <span>Status<label>*</label></span>
						 <?=$this->Form->input('del_status',array('type'=>'select', 'style'=>'width:560px','options'=>array(0=>'Yes', 1=>'No'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Select the Is Main'));?>
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