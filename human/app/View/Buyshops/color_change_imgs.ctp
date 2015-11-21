<div class="grid images_3_of_2" id="product_image_data" style="font-size:12px">
	
	<ul id="etalage" style="display:block;">
		
		<?php 

		foreach($color_images_data as $image)
		{
			$image = $image['Produc_color_image']['image_path'];
			
			?>
			<li>
				<a href="optionallink.html">
					<img class="etalage_thumb_image" style="display:block;height:121px;float:left;width:91px;" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$image; ?>" class="img-responsive" />
					<img class="etalage_source_image" style="display:block;height:400px;width:300px;float:left;" src="<?php echo $this->webroot.'img/product/thumb/large_images/'.$image; ?>" class="img-responsive" title="" />
				</a>
			</li>
			
			<?php
		}									
		?>
	</ul>
	
	<div class="clearfix"></div>		
	
</div>
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

<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery-1.11.1.min.js';?>"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--<link href="<?php echo $this->webroot.'css/buy_shops/bootstrap.css';?>" rel='stylesheet' type='text/css' />-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="<?php echo $this->webroot.'css/buy_shop/style.css';?>" rel='stylesheet' type='text/css' />
<script src="<?php echo $this->webroot.'js/buy_shop/simpleCart.min.js';?>"> </script>
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js';?>"></script>
<!-- start menu -->
<script src="<?php echo $this->webroot.'js/buy_shop/jquery.easydropdown.js';?>"></script>
<link href="<?php echo $this->webroot.'css/buy_shop/megamenu.css';?>" rel="stylesheet" type="text/css" media="all" />
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

