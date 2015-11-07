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
        <div class="blog_list">
          <div class="blog_list_img"><img src="<?php echo $this->webroot.'img/only_human_userside/img1.jpg';?>" /></div>
          <div class="blog_list_content">
            Elegant <br /><span>AND MODERN STYLE</span>
          </div>
        </div>
        <div class="blog_list">
          <div class="blog_list_img"><img src="<?php echo $this->webroot.'img/only_human_userside/img2.jpg';?>" /></div>
          <div class="blog_list_content">
            Support <br /><span>Top customer accounts <br />and logins</span>
          </div>
        </div>
      </div>
      <div class="blog_box">
        <div class="heading18"><strong>NEW PRODUCTS</strong></div>
        <div class="width100" id="content_1">
          <div class="product_list">
            <div class="pro_img"><img src="<?php echo $this->webroot.'img/only_human_userside/prod_img1.jpg';?>" /></div>
            <div class="pro_heading">
              <strong>STYLE 229463 GIRLS' <br />TUMBLE JACKET</strong>
            </div>
            <div class="pro_price"><strong>MSRP: $53.00</strong></div>
          </div>
          <div class="product_list">
            <div class="pro_img"><img src="<?php echo $this->webroot.'img/only_human_userside/prod_img2.jpg';?>" /></div>
            <div class="pro_heading">
              <strong>STYLE 229463 GIRLS' <br />TUMBLE JACKET</strong>
            </div>
            <div class="pro_price"><strong>MSRP: $53.00</strong></div>
          </div>
          <div class="product_list">
            <div class="pro_img"><img src="<?php echo $this->webroot.'img/only_human_userside/prod_img3.jpg';?>" /></div>
            <div class="pro_heading">
              <strong>STYLE 229463 GIRLS' <br />TUMBLE JACKET</strong>
            </div>
            <div class="pro_price"><strong>MSRP: $53.00</strong></div>
          </div>
          <div class="product_list">
            <div class="pro_img"><img src="<?php echo $this->webroot.'img/only_human_userside/prod_img4.jpg';?>" /></div>
            <div class="pro_heading">
              <strong>STYLE 229463 GIRLS' <br />TUMBLE JACKET</strong>
            </div>
            <div class="pro_price"><strong>MSRP: $53.00</strong></div>
          </div>
          <div class="product_list">
            <div class="pro_img"><img src="<?php echo $this->webroot.'img/only_human_userside/prod_img1.jpg';?>" /></div>
            <div class="pro_heading">
              <strong>STYLE 229463 GIRLS' <br />TUMBLE JACKET</strong>
            </div>
            <div class="pro_price"><strong>MSRP: $53.00</strong></div>
          </div>
          <div class="product_list">
            <div class="pro_img"><img src="<?php echo $this->webroot.'img/only_human_userside/prod_img3.jpg';?>" /></div>
            <div class="pro_heading">
              <strong>STYLE 229463 GIRLS' <br />TUMBLE JACKET</strong>
            </div>
            <div class="pro_price"><strong>MSRP: $53.00</strong></div>
          </div>
          <div class="product_list">
            <div class="pro_img"><img src="<?php echo $this->webroot.'img/only_human_userside/prod_img2.jpg';?>" /></div>
            <div class="pro_heading">
              <strong>STYLE 229463 GIRLS' <br />TUMBLE JACKET</strong>
            </div>
            <div class="pro_price"><strong>MSRP: $53.00</strong></div>
          </div>
          <div class="product_list">
            <div class="pro_img"><img src="<?php echo $this->webroot.'img/only_human_userside/prod_img3.jpg';?>" /></div>
            <div class="pro_heading">
              <strong>STYLE 229463 GIRLS' <br />TUMBLE JACKET</strong>
            </div>
            <div class="pro_price"><strong>MSRP: $53.00</strong></div>
          </div>
          <div class="product_list">
            <div class="pro_img"><img src="<?php echo $this->webroot.'img/only_human_userside/prod_img4.jpg';?>" /></div>
            <div class="pro_heading">
              <strong>STYLE 229463 GIRLS' <br />TUMBLE JACKET</strong>
            </div>
            <div class="pro_price"><strong>MSRP: $53.00</strong></div>
          </div>
          <div class="product_list">
            <div class="pro_img"><img src="<?php echo $this->webroot.'img/only_human_userside/prod_img1.jpg';?>" /></div>
            <div class="pro_heading">
              <strong>STYLE 229463 GIRLS' <br />TUMBLE JACKET</strong>
            </div>
            <div class="pro_price"><strong>MSRP: $53.00</strong></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php 
  
  /*
  ?>
<div class="content_top">
	<h3 class="m_1">Latest Products</h3>
	<div class="container">
	   <div class="box_1">
	       <div class="col-md-7">
			    <div class="section group">
						<div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
							<div class="shop-holder">
		                         <div class="product-img">
		                            <a href="single.html">
		                                <img width="225" height="265" src="<?php echo $this->webroot.'img/buy_shop/pic1.jpg'; ?>" class="img-responsive"  alt="item4">		                            </a>
		                            <a href="" class="button item_add"></a>		                         </div>
		                    </div>
		                    <div class="shop-content" style="height: 80px;">
		                            <div><a href="single.html" rel="tag">humour</a></div>
		                            <h3><a href="single.html">Non-charac</a></h3>
		                            <span class="amount item_price">$45.00</span>
		                    </div>
						</div>
						<div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
							<div class="shop-holder">
		                         <div class="product-img">
		                            <a href="single.html">
		                                <img width="225" height="265" src="<?php echo $this->webroot.'img/buy_shop/pic2.jpg'; ?>" class="img-responsive"  alt="item4">		                            </a>
		                            <a href="" class="button item_add"></a>		                         </div>
		                    </div>
		                    <div class="shop-content" style="height: 80px;">
		                            <div><a href="single.html" rel="tag">humour</a></div>
		                            <h3><a href="single.html">Non-charac</a></h3>
		                            <span class="amount item_price">$45.00</span>
		                    </div>
						</div>
						<div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
							<div class="shop-holder">
		                         <div class="product-img">
		                            <a href="single.html">
		                                <img width="225" height="265" src="<?php echo $this->webroot.'img/buy_shop/pic3.jpg'; ?>" class="img-responsive"  alt="item4">		                            </a>
		                           <a href="" class="button item_add"></a>	                         </div>
		                    </div>
		                    <div class="shop-content" style="height: 80px;">
		                            <div><a href="single.html" rel="tag">humour</a></div>
		                            <h3><a href="single.html">Non-charac</a></h3>
		                            <span class="amount item_price">$45.00</span>
		                    </div>
						</div>
						<div class="clearfix"></div> 
				</div>
		</div>
		<div class="col-md-5 row_3">
			<div class="about-block-content">
		       <div class="border-add"></div>
				<h4>About Us</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati beatae quam voluptatibus deleniti ipsa consequatur!</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
				<p>		        	</p></div>
				<img src="<?php echo $this->webroot.'img/buy_shop/pic9.jpg'; ?>" class="img-responsive" alt=""/>
	    </div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="content_bottom">
<div class="container">
	<h2 class="m_3">From the Blog</h2>
	<div class="grid_1">
		<div class="col-md-6 blog_1"><a href="index_single.html">
			<div class="item-inner"> 
				<img src="<?php echo $this->webroot.'img/buy_shop/pic7.jpg'; ?>" class="img-responsive" alt=""/>																	
					<div class="date-comments">
						<div class="time"><span class="date"><span class="word1">14</span> <span class="word2">Jan</span> </span></div>											 
						<div class="comments">
						<span><span class="word1">0</span>
						<span class="word2">comment</span></span>
						</div>
					 </div>
			</div>   
		</a></div>
		<div class="col-md-6 row_2"><a href="index_single.html">
			<div class="item-inner"> 
				<img src="<?php echo $this->webroot.'img/buy_shop/pic8.jpg'; ?>" class="img-responsive" alt=""/>																	
					<div class="date-comments">
						<div class="time"><span class="date"><span class="word1">14</span> <span class="word2">Jan</span> </span></div>											 
						<div class="comments">
						<span><span class="word1">0</span>
						<span class="word2">comment</span></span>
						</div>
					 </div>
			</div>   
	    </a></div>
		<div class="clearfix"></div>
	</div>
</div>	
</div>
<div class="content_bottom-grid">
	<div class="col-md-6 row_4"></div>
	 <div class="col-md-6">
		<div class="row_5">
			<div class="col_1_of_3 span_1_of_3">
				<div class="shop-holder1">
					<a href="single.html"><img src="<?php echo $this->webroot.'img/buy_shop/pic4.jpg'; ?>" class="img-responsive" alt=""/></a>
				</div>
				<div class="shop-content" style="height: 80px;">
						<h3><a href="single.html">Non-charac</a></h3>
						<span><span class="amount">$45.00</span></span>
				</div>
			</div>
			<div class="col_1_of_3 span_1_of_3">
				<div class="shop-holder1">
					<a href="single.html"><img src="<?php echo $this->webroot.'img/buy_shop/pic5.jpg'; ?>" class="img-responsive" alt=""/></a>
				</div>
				<div class="shop-content" style="height: 80px;">
						<h3><a href="single.html">Non-charac</a></h3>
						<span><span class="amount">$45.00</span></span>
				</div>
			</div>
			<div class="col_1_of_3 span_1_of_3">
				<div class="shop-holder1">
					<a href="single.html"><img src="<?php echo $this->webroot.'img/buy_shop/pic6.jpg'; ?>" class="img-responsive" alt=""/></a>
				</div>
				<div class="shop-content" style="height: 80px;">
						<h3><a href="single.html">Non-charac</a></h3>
						<span><span class="amount">$45.00</span></span>
				</div>
			</div>
			<div class="clearfix"></div> 
		</div>
	</div>
	
	<div class="clearfix"> </div>
	
	<?php 
	
	
	?>
	
	<!-- #region Jssor Slider Begin -->

    <!-- Jssor Slider is free under MIT license. -->
    <!-- Development Reference http://www.jssor.com/development. -->
    <!-- Jssor Slider Maker Start At $5 http://www.jssor.com/slider-maker. -->

    <!-- This demo works independently without any other javascript library. -->

    <script type="text/javascript" src="<?php echo $this->webroot.'js/jssor/jssor.slider.min.js';?>"></script>
    <!-- use jssor.slider.debug.js instead for release -->
    <script>
        jssor_1_slider_init = function() {
            
            var jssor_1_options = {
              $AutoPlay: true,
              $AutoPlaySteps: 4,
              $SlideDuration: 160,
              $SlideWidth: 200,
              $SlideSpacing: 3,
              $Cols: 5,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 4
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 1,
                $SpacingY: 1
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 809);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>

    <style>
        
        /* jssor slider bullet navigator skin 03 css */
        /*
        .jssorb03 div           (normal)
        .jssorb03 div:hover     (normal mouseover)
        .jssorb03 .av           (active)
        .jssorb03 .av:hover     (active mouseover)
        .jssorb03 .dn           (mousedown)
        */
        
/*		.jssorb03 {
            position: absolute;
        }
        .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
            position: absolute;
            /* size of bullet elment */
/*            width: 21px;
            height: 21px;
            text-align: center;
            line-height: 21px;
            color: white;
            font-size: 12px;
            background: url('<?php echo $this->webroot.'img/jssor/b03.png';?>') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb03 div { background-position: -5px -4px; }
        .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
        .jssorb03 .av { background-position: -65px -4px; }
        .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }

        /* jssor slider arrow navigator skin 03 css */
        /*
        .jssora03l                  (normal)
        .jssora03r                  (normal)
        .jssora03l:hover            (normal mouseover)
        .jssora03r:hover            (normal mouseover)
        .jssora03l.jssora03ldn      (mousedown)
        .jssora03r.jssora03rdn      (mousedown)
        */
		
/*        .jssora03l, .jssora03r {
            display: block;
            position: absolute;
            /* size of arrow element */
          
/*		  width: 55px;
            height: 55px;
            cursor: pointer;
            background: url('<?php echo $this->webroot.'img/jssor/a03.png';?>') no-repeat;
            overflow: hidden;
        }
        .jssora03l { background-position: -3px -33px; }
        .jssora03r { background-position: -63px -33px; }
        .jssora03l:hover { background-position: -123px -33px; }
        .jssora03r:hover { background-position: -183px -33px; }
        .jssora03l.jssora03ldn { background-position: -243px -33px; }
        .jssora03r.jssora03rdn { background-position: -303px -33px; }
    </style>

    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('<?php echo $this->webroot.'img/jssor/loading.gif';?>') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden;">
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/005.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/006.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/011.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/013.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/014.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/019.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/020.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/021.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/022.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/024.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/025.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/027.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/029.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/030.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/031.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/030.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/034.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/038.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/039.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/043.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/044.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/047.jpg';?>" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="<?php echo $this->webroot.'img/jssor/050.jpg';?>" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb03" style="bottom:10px;right:10px;">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:21px;height:21px;">
                <div data-u="numbertemplate"></div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora03l" style="top:123px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora03r" style="top:123px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <a href="http://www.jssor.com" style="display:none">Jssor Slider</a>
    </div>
    <script>
        jssor_1_slider_init();
    </script>
<?php 
?>	
</div>
<?php
*/
?>

<div class="footer">
<?php echo $this->element('buy_shop_footer');?>
</div>

</body>
</html>		

<?php 

?><!--HOME-SLIDER-->
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