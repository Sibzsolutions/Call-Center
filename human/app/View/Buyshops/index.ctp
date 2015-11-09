<?php
	
	error_reporting(0);

	App::import('Controller', 'Buyshops');
	$Buyshop = new BuyshopsController;
?>

<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Buy_shop an E-Commerce online Shopping Category Flat Bootstarp responsive Website Template| Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Buy_shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo $this->webroot.'css/buy_shop/bootstrap.css'; ?>" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="<?php echo $this->webroot.'css/buy_shop/style.css'; ?>" rel='stylesheet' type='text/css' />
<script src="<?php echo $this->webroot.'js/buy_shop/simpleCart.min.js'; ?>"> </script>

<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery-1.11.1.min.js'; ?>"></script>
<!-- start menu -->
<link href="<?php echo $this->webroot.'css/buy_shop/megamenu.css'; ?>" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/megamenu.js'; ?>"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>

	<?php //echo $this->Html->charset(); ?>
	<title>
	<?php //echo $cakeDescription ?>:
	<?php //echo $title_for_layout; ?>
	</title>
	
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Index</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo $this->webroot.'css/only_human_userside/style.css'; ?>" rel="stylesheet" type="text/css" />
<style type="text/css">

body {
	background-repeat: repeat;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

</style>

<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo $this->webroot.'js/only_human_userside/jquery-1.9.1.min.js'; ?>"%3E%3C/script%3E'))</script>
<script src="<?php echo $this->webroot.'js/only_human_userside/jquery.mCustomScrollbar.concat.min.js'; ?>"></script>
<script>
	(function($){
		$(window).load(function(){
			$("#content_1").mCustomScrollbar({
				scrollInertia:550,
				horizontalScroll:true,
				mouseWheelPixels:116,
				scrollButtons:{
					enable:true,
					scrollType:"pixels",
					scrollAmount:116
				},
				callbacks:{
					onScroll:function(){ snapScrollbar(); }
				}
			});
			/* toggle buttons scroll type */
			var content=$("#content_1");
			$("a[rel='toggle-buttons-scroll-type']").html("<code>scrollType: \""+content.data("scrollButtons_scrollType")+"\"</code>");
			$("a[rel='toggle-buttons-scroll-type']").click(function(e){
				e.preventDefault();
				var scrollType;
				if(content.data("scrollButtons_scrollType")==="pixels"){
					scrollType="continuous";
				}else{
					scrollType="pixels";
				}
				content.data({"scrollButtons_scrollType":scrollType}).mCustomScrollbar("update");
				$(this).html("<code>scrollType: \""+content.data("scrollButtons_scrollType")+"\"</code>");
			});
			/* snap scrollbar fn */
			var snapTo=[];
			$("#content_1 .images_container img").each(function(){
				var $this=$(this),thisX=$this.position().left;
				snapTo.push(thisX);
			});
			function snapScrollbar(){
				var posX=$("#content_1 .mCSB_container").position().left,closestX=findClosest(Math.abs(posX),snapTo);
				$("#content_1").mCustomScrollbar("scrollTo",closestX,{scrollInertia:350,callbacks:false});
			}
			function findClosest(num,arr){
				var curr=arr[0];
				var diff=Math.abs(num-curr);
				for(var val=0; val<arr.length; val++){
					var newdiff=Math.abs(num-arr[val]);
					if(newdiff<diff){
						diff=newdiff;
						curr=arr[val];
					}
				}
				return curr;
			}
		});
	})(jQuery);
	</script>
	
	<link href="<?php echo $this->webroot.'js/only_human_userside/jquery.mCustomScrollbar.css'; ?>" rel="stylesheet" />
	<!--<link href="js/jquery.mCustomScrollbar.css" rel="stylesheet" />-->

	<!--RESPONSIVE-MENU-->
	<link rel="stylesheet" href="<?php echo $this->webroot.'css/only_human_userside/menu_css.css'; ?>">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>
		$(function() {
			var pull 		= $('#pull');
				menu 		= $('nav ul');
				menuHeight	= menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});

			$(window).resize(function(){
				var w = $(window).width();
				if(w > 320 && menu.is(':hidden')) {
					menu.removeAttr('style');
				}
			});
		});
	</script>
	<!--RESPONSIVE-MENU-->
	
	<?php
		//echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo $this->webroot.'css/buy_shop/bootstrap.css'; ?>" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="<?php echo $this->webroot.'css/buy_shop/style.css'; ?>" rel='stylesheet' type='text/css' />
<script src="<?php echo $this->webroot.'js/buy_shop/simpleCart.min.js'; ?>"> </script>

<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery-1.11.1.min.js'; ?>"></script>
<!-- start menu -->
<link href="<?php echo $this->webroot.'css/buy_shop/megamenu.css'; ?>" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/megamenu.js'; ?>"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>

<link rel="stylesheet" href="<?php echo $this->webroot.'css/home_slider/homepage_slider_style.css';?>" />

<?php

/*

?><title>Buy_shop an E-Commerce online Shopping Category Flat Bootstarp responsive Website Template| Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Buy_shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo $this->webroot.'css/buy_shop/bootstrap.css'; ?>" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="<?php echo $this->webroot.'css/buy_shop/style.css'; ?>" rel='stylesheet' type='text/css' />
<script src="<?php echo $this->webroot.'js/buy_shop/simpleCart.min.js'; ?>"> </script>

<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery-1.11.1.min.js'; ?>"></script>
<!-- start menu -->
<link href="<?php echo $this->webroot.'css/buy_shop/megamenu.css'; ?>" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/megamenu.js'; ?>"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>

<?php 
*/
?>
<link href="<?php echo $this->webroot.'img/local/favicon.ico'; ?>" type="image/x-icon" rel="icon" />
	
</head>
<body>

<?php
		
?>
<?php echo $this->element('buy_shop_header'); 

?>
<div class="clearfix"></div>

<link rel="stylesheet" href="<?php echo $this->webroot.'css/home_slider/homepage_slider_style.css';?>" />

<div id="main" role="main" class="banner">
  <div class="width1220">
  <section class="slider">
    <div class="flexslider">
      <ul class="slides">
        <?php foreach($slider_images as $image) { ?>
        <li style="background-image:url(<?php echo $this->webroot.'img/slider/'.$image['Slider_image']['image_path']; ?>); background-repeat:no-repeat; min-height:565px; width:100%; background-size:cover">
          <div class="main_banner2">
            <div class=slider_box>
              <div class=slider_heading1><?php echo $image['Slider_image']['heading']; ?></div>
              <div class=slider_heading2><?php echo $image['Slider_image']['short_desc']; ?></div>
              <div class=slider_content><?php echo $image['Slider_image']['long_desc']; ?></div>
            </div>
            <div class="slider_img"></div>
          </div>
        </li>
        <?php } ?>
      </ul>
    </div>
  </section>
  </div>
</div>

<?php 

?>
<!--<div class="banner">
	<div class="container">
		<div class="banner_desc">
			<h1>New Season Arrivals.</h1>
			<h2>Check out all the new trends</h2>
			<div class="button">
			      <a href="#" class="hvr-shutter-out-horizontal">Shop Now</a>
			    </div>
		</div>
	</div>
</div>-->
  <div class="middle_content">
    <div class="width1220">
      <div class="blog_box">
        <?php $home_page_data = $home_page_data['Home_page_box'];?>
		<div class="blog_list">
          <div class="blog_list_img"><img src="<?php echo $this->webroot.'img/home_page_box/thumb/small_images/'.$home_page_data['first_imagepath']; ?>" /></div>
          <div class="blog_list_content">
           <?php echo $home_page_data['first_shortdesc']; ?> <!--Elegant--> <br /><span><?php echo $home_page_data['first_longdesc']; ?><!--AND MODERN STYLE--></span>
          </div>
        </div>
        
		<div class="blog_list">
          <div class="blog_list_img"><img src="<?php echo $this->webroot.'img/home_page_box/thumb/small_images/'.$home_page_data['second_imagepath']; ?>" /></div>
          <div class="blog_list_content">
            <?php echo $home_page_data['second_shortdesc']; ?><!--Support--> <br /><span><?php echo $home_page_data['second_longdesc']; ?><!--Top customer accounts <br />and logins--></span>
          </div>
        </div>
      </div>
      
	  <!--<div class="blog_box">
        <div class="heading18"><strong>NEW PRODUCTS</strong></div>
        <div class="width100" id="content_1">
          <div class="product_list">
            <div class="pro_img"><img src="<?php //echo $this->webroot.'img/only_human_userside/prod_img1.jpg';?>" /></div>
            <div class="pro_heading">
              <strong>STYLE 229463 GIRLS' <br />TUMBLE JACKET</strong>
            </div>
            <div class="pro_price"><strong>MSRP: $53.00</strong></div>
          </div>
          <div class="product_list">
            <div class="pro_img"><img src="<?php //echo $this->webroot.'img/only_human_userside/prod_img2.jpg';?>" /></div>
            <div class="pro_heading">
              <strong>STYLE 229463 GIRLS' <br />TUMBLE JACKET</strong>
            </div>
            <div class="pro_price"><strong>MSRP: $53.00</strong></div>
          </div>
          <div class="product_list">
            <div class="pro_img"><img src="<?php //echo $this->webroot.'img/only_human_userside/prod_img3.jpg';?>" /></div>
            <div class="pro_heading">
              <strong>STYLE 229463 GIRLS' <br />TUMBLE JACKET</strong>
            </div>
            <div class="pro_price"><strong>MSRP: $53.00</strong></div>
          </div>
        </div>
      </div>-->
	  
    </div>
  </div>
  
  	<link rel="stylesheet" href="<?php echo $this->webroot.'css/footer_slider/tinycarousel.css'; ?>" type="text/css" media="screen"/>

	<!-- build:js jquery.tinycarousel.js -->
	<script type="text/javascript" src="<?php echo $this->webroot.'js/footer_slider/jquery.tinycarousel.js'; ?>"></script>
    <!-- /build -->
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#slider1').tinycarousel();
		});
	</script>
	
	<div id="slider1">
		<a class="buttons prev" href="#">&#60;</a>
		<div class="viewport">
			<ul class="overview">
				<?php
								
				foreach($product_slider as $product)
				{
					if(isset($product['Produc_master']['images']['Default']['imagepath']))
					{
						?>
						<li>
						<img style="max-width: 190px; max-height: 250px;" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$product['Produc_master']['images']['Default']['imagepath'];?>" class="img-responsive" alt=""/>
						<?php echo $product['Produc_master']['prodname'];?>
						<?php echo $product['Produc_master']['prodprice'];?>
						<?php echo $product['Produc_master']['prodscdesc'];?>
						</li>
						<?php
					}
					else
					{
						?>
						<li>
						<img style="max-width: 190px; max-height: 250px;" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$product['Produc_master']['images']['all']['imagepath'];?>" class="img-responsive" alt=""/>
						<?php echo $product['Produc_master']['prodname'];?>
						<?php echo $product['Produc_master']['prodprice'];?>
						<?php echo $product['Produc_master']['prodscdesc'];?>
						</li>
						<?php
					}
				}
				?>
				
				<!--<li><img src="<?php //echo $this->webroot.'img/footer_slider/picture6.jpg';?>" /></li>
				<li><img src="<?php //echo $this->webroot.'img/footer_slider/picture1.jpg';?>" /></li>-->
				
			</ul>
		</div>
		<a class="buttons next" href="#">&#62;</a>
	</div>

  
<div class="footer">
<?php echo $this->element('buy_shop_footer');?>
</div>

</body>
</html>		

<!--HOME-SLIDER-->
<link rel="stylesheet" href="<?php echo $this->webroot; ?>js/home_slider/flexslider.css" type="text/css" media="screen" />
<script defer src="<?php echo $this->webroot; ?>js/home_slider/jquery.flexslider.js"></script>

<script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
<!--HOME-SLIDER-->