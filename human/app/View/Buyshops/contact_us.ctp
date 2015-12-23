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
<!-- the jScrollPane script -->
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery.jscrollpane.min.js';?>"></script>
<script type="text/javascript" id="sourcecode">
	$(function()
	{      
		$('.scroll-pane').jScrollPane();
	});
</script>

<div class="inner_heading">
  <div class="width1220">Contact Us</div>
</div>
<div class="breadcrumb_box">
  <div class="width1220 text12_black"><!--Home &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contact Us--></div>
</div>
<div class="inner_banner"><img src="<?php echo $this->webroot.'img/only_human_userside/map.jpg';?>" style="max-width: 100%" /></div>
</div>

<div class="middle_content">
<div class="width1220">
  <div class="left_col">
	<div class="contact_box">
	  <div class="error_box"><?=$this->Session->flash();?></div>
	  <div class="contact_heading"><strong>Send</strong> a Message</div>
	  
	  <form name="contact_us" method="post">
	  
	  <div class="input_box">
		<input type="text" id="textfield2" placeholder="Your Name" name="name" required="required" />
	  </div>
	  <div class="input_box">
		<input type="email" id="textfield2" placeholder="Your Email" name="email" required="required"/>
	  </div>
	  <div class="input_box">
		<input type="text" id="textfield2" placeholder="Your Website" name="website"required="required"/>
	  </div>
	  <div class="input_box2">
		<textarea id="textarea" placeholder="Your Message" cols="45" rows="5" style="min-height:200px;" name="message" required="required"></textarea>
	  </div>
	  <div class="input_box">
		<input type="submit" name="button2" id="button2" value="Submit" class="button" />
	  </div>
	  
	  </form>
	  
	</div>
  </div>
  <div class="right_col">
	<div class="contact_box">
	  <div class="contact_heading"><strong>Contact</strong> Us</div>
	  <div class="contact_list">
		<div class="contact_icon"><img src="<?php echo $this->webroot.'img/only_human_userside/contact_icon.jpg';?>" /></div>
		<div class="contact_text">868 Bechole Road, Victory Lorem Ispuse, New York</div>
	  </div>
	  <div class="contact_list">
		<div class="contact_icon"><img src="<?php echo $this->webroot.'img/only_human_userside/contact_icon2.jpg';?>" /></div>
		<div class="contact_text">Phone: (+80) 123 456  Fax: (+80) 123 456</div>
	  </div>
	</div>
  </div>
</div>
</div>