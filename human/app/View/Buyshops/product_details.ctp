<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo $this->webroot.'css/buy_shops/bootstrap.css';?>" rel='stylesheet' type='text/css' />
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
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
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
</head>
<body>

<div class="single_top">
	 <div class="container"> 
	      <div class="single_grid">
				<div class="grid images_3_of_2">
						<ul id="etalage">
							
							<?php 
							
								foreach($product['images'] as $image)
								{
									$image = $image['Produc_image']['imagepath'];
									
									?>
									<li>
										<a href="optionallink.html">
											<img class="etalage_thumb_image" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$image; ?>" class="img-responsive" />
											<img class="etalage_source_image" src="<?php echo $this->webroot.'img/product/thumb/large_images/'.$image; ?>" class="img-responsive" title="" />
										</a>
									</li>
									<?php
								}							
							?>
							
							<!--<li>
								<img class="etalage_thumb_image" src="<?php //echo $this->webroot.'img/buy_shop/s2.jpg'; ?>" class="img-responsive" />
								<img class="etalage_source_image" src="<?php //echo $this->webroot.'img/buy_shop/s2.jpg'; ?>" class="img-responsive" title="" />
							</li>
							
							<li>
								<img class="etalage_thumb_image" src="<?php //echo $this->webroot.'img/buy_shop/s3.jpg'; ?>" class="img-responsive"  />
								<img class="etalage_source_image" src="<?php //echo $this->webroot.'img/buy_shop/s3.jpg'; ?>"class="img-responsive"  />
							</li>
						    <li>
								<img class="etalage_thumb_image" src="<?php //echo $this->webroot.'img/buy_shop/s4.jpg';?>" class="img-responsive"  />
								<img class="etalage_source_image" src="<?php //echo $this->webroot.'img/buy_shop/s4.jpg';?>"class="img-responsive"  />
							</li>-->
							
						</ul>
						 <div class="clearfix"></div>		
				  </div> 
				  <div class="desc1 span_3_of_2">
				  	<ul class="back">
                	  <li><i class="back_arrow"> </i>Back to <a href="index.html">Men's Clothing</a></li>
                    </ul>
					<h1><?php echo $product['prodname']; //nibh euismod?></h1>
					<p><?php echo $product['proddesc']; //Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum ?></p>
				     <div class="dropdown_top">
				       <div class="dropdown_left">
					     <select class="dropdown" tabindex="10" data-settings='{"wrapperClass":"metro1"}'>
	            			<option value="0">Select size</option>	
							<option value="1">M</option>
							<option value="2">L</option>
							<option value="3">XL </option>
							<option value="4">Fs</option>
							<option value="5">S </option>
							<option value="5"></option>
							<option value="5"></option>
			             </select>
			            </div>
			            <ul class="color_list">
							<li><a href="#"> <span class="color1"> </span></a></li>
							<li><a href="#"> <span class="color2"> </span></a></li>
							<li><a href="#"> <span class="color3"> </span></a></li>
							<li><a href="#"> <span class="color4"> </span></a></li>
							<li><a href="#"> <span class="color5"> </span></a></li>
						</ul>
						 <div class="clearfix"></div>
			         </div>
			         <div class="simpleCart_shelfItem">
			         	<div class="price_single">
						  <div class="head"><h2><span class="amount item_price"><?php echo $product['prodprice'];//$45.00 ?></span></h2></div>
						  <div class="head_desc"><a href="#">12 reviews</a><img src="<?php echo $this->webroot.'img/buy_shop/review.png'; ?>" alt=""/></li></div>
					       <div class="clearfix"></div>
					     </div>
						  <div id="cart">
						  <?php 						  
						  if($count_add_to_cart>0)
						  {
							  ?>
							  <div class="size_2-right"><a href="#" class="item_add item_add1 btn_5" value="" />Added to Cart </a></div>
							  <?php
						  }
						  else
						  {
							  ?>
							  <div class="size_2-right"><a href="#" id="add_to_cart" class="item_add item_add1 btn_5" value="" />Add to Cart </a></div>
							  <?php
						  }
						  ?>
						  </div>
					  <script>
				
						$(document).ready(function(){
							
							$('#add_to_cart').click(function(){
								
								var product_id = '<?php echo $product['id']?>';
								
								$.post("<?=$this->webroot?>buyshops/add_to_cart", {product_id: product_id}, function(result){
								
									$("#cart").html('<div id="cart"><div class="size_2-right"><a href="#" class="item_add item_add1 btn_5" value="" />Added</a></div></div>');
								
								});
							});
						});
						
					</script>
					  
			         </div>
				</div>
          	    <div class="clearfix"></div>
          	   </div>
          	 <div class="single_social_top">   
          	  <ul class="single_social">
				  <li><a href="#"> <i class="s_fb"> </i> <div class="social_desc">Share<br> on facebook</div><div class="clearfix"> </div></a></li>
				  <li><a href="#"> <i class="s_twt"> </i> <div class="social_desc">Tweet<br> this product</div><div class="clearfix"> </div></a></li>
				  <li><a href="#"> <i class="s_google"> </i><div class="social_desc">Google+<br> this product</div><div class="clearfix"> </div></a></li>
				  <li class="last"><a href="#"> <i class="s_email"> </i><div class="social_desc">Email<br> a Friend</div><div class="clearfix"> </div></a></li>
			  </ul>
			 </div>
			 <ul class="menu_drop">
				<li class="item1"><a href="#"><img src="<?php echo $this->webroot.'img/buy_shop/product_arrow.png'; ?>">Description</a>
					<ul>
						<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor </a></li>
						<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item2"><a href="#"><img src="<?php echo $this->webroot.'img/buy_shop/product_arrow.png';?>">Additional information</a>
					<ul>
					    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item3"><a href="#"><img src="<?php echo $this->webroot.'img/buy_shop/product_arrow.png';?>">Reviews (10)</a>
					<ul>
						<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor </a></li>
						<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item4"><a href="#"><img src="<?php echo $this->webroot.'img/buy_shop/product_arrow.png';?>">Helpful Links</a>
					<ul>
					    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item5"><a href="#"><img src="<?php echo $this->webroot.'img/buy_shop/product_arrow.png';?>">Make A Gift</a>
					<ul>
						<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor </a></li>
						<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
	 		</ul>
   </div>
   <h3 class="m_2">Related Products</h3>
	     <div class="container">
          		<div class="box_3">
          			<div class="col-md-3">
          				<div class="content_box"><a href="single.html">
			   	          <img src="<?php echo $this->webroot.'img/buy_shop/pic6.jpg'; ?>" class="img-responsive" alt="">
				   	   </a>
				   </div>
				    <h4><a href="single.html">Contrary to popular belief</a></h4>
				    <p>$ 199</p>
			        </div>
          			<div class="col-md-3">
          				<div class="content_box"><a href="single.html">
			   	          <img src="<?php echo $this->webroot.'img/buy_shop/pic2.jpg'; ?>" class="img-responsive" alt="">
				   	   </a>
				   </div>
				    <h4><a href="single.html">Contrary to popular belief</a></h4>
				    <p>$ 199</p>
			        </div>
          			<div class="col-md-3">
          				<div class="content_box"><a href="single.html">
			   	          <img src="<?php echo $this->webroot.'img/buy_shop/pic4.jpg'; ?>" class="img-responsive" alt="">
				   	   </a>
				   </div>
				    <h4><a href="single.html">Contrary to popular belief</a></h4>
				    <p>$ 199</p>
			        </div>
          			<div class="col-md-3">
          				<div class="content_box"><a href="single.html">
			   	          <img src="<?php echo $this->webroot.'img/buy_shop/pic5.jpg'; ?>" class="img-responsive" alt="">
				   	   </a>
				   </div>
				    <h4><a href="single.html">Contrary to popular belief</a></h4>
				    <p>$ 199</p>
			        </div>
			        <div class="clearfix"> </div>
          		</div>
          	</div>
        </div>