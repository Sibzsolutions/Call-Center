<!-- font-family: 'Metal Mania', cursive; background:skyblue; -->
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery-1.11.1.min.js';?>"></script>
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/megamenu.js';?>"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<link rel="stylesheet" href="<?php echo $this->webroot.'css/buy_shop/etalage.css';?>">
<script src="<?php echo $this->webroot.'js/buy_shop/jquery.etalage.min.js';?>"></script>
<script>
	jQuery(document).ready(function($){

		$('#etalage').etalage({
			thumb_image_width: 300,
			thumb_image_height: 400,
			source_image_width: 900,
			source_image_height: 1200,
			show_hint: true,
			click_callback: function(image_anchor, instance_id){
				//alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
			}
		});

	});
</script>
<!--initiate accordion-->
<script type="text/javascript">
	$(function() {
	
	    var menu_ul = $('.menu_drop > li > ul'),
	           menu_a  = $('.menu_drop > li > a');
	    
	    menu_ul.hide();
	
	    menu_a.click(function(e) {
	        e.preventDefault();
	        if(!$(this).hasClass('active')) {
	            menu_a.removeClass('active');
	            menu_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    });
	
	});
</script>

<style type="text/css">
html {
	padding:0px;
	margin:0px;
	font-size:0px;
}
</style>

<style type="text/css">
.wrap{
	margin:0 auto;
	width:1000px;
	}
.logo h1{
	font-size:200px;
	color:yellow;
	text-align:center;
	margin-bottom:1px;
	text-shadow:1px 1px 6px #555;
	}	
.logo p{
	color:skyblue;
	font-size:20px;
	margin-top:1px;
	text-align:center;}	
.logo p span{
	color:lightgreen;}	
	
.sub a{
	color:yellow;
	background:#06afd8;
	text-decoration:none;
	padding:5px;
	font-size:13px;
	font-family: arial, serif;
	font-weight:bold;
	}	
</style>
<div class="one">
	<div class="wrap">
		<div class="logo">
		  <h1>404</h1>
		  <p>Sorry This was deadlink - Page not Found</p>
		   <div class="sub">
		   
			 <?php 
			 
				if($pre_controller == 'Superadmin')
				{
					?>
					<p><a href="<?php echo $this->webroot.'Superadmin'; ?>">Go Back to Home</a></p>
					<?php
				}
				else
				{
					?>
					<p><a href="<?php echo $this->webroot.'Buyshops'; ?>">Go Back to Home</a></p>
					<?php
				}

			?>

			 </div>
		</div>
	</div>
</div>