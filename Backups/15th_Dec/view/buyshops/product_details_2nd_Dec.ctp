<?php ?>
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

<style type="text/css">
html {
	padding:0px;
	margin:0px;
	font-size:0px;
}
</style>

</head>
<body>
<div class="single_top">
	 <div class="width1220 product_details"> 

			<div class="single_grid">
				
				<div class="grid images_3_of_2"  id="product_image_data">

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
						</ul>
						
						<div class="clearfix"></div>		
						
				  </div>
				
				  <div class="desc1 span_3_of_2">
  
					<?php
						
						if($product['wishlist_id'] == 1)
						{
							?>
							<div id="results_wishlist_replacea">
								<div class="size_2-right added_wishlist"><button  class="add_cart_btm">Added to wishlist</button></div>
							</div>							
							<?php
						}
						else
						{
							?>
							<div id="results_wishlist_replace">
								<div class="size_2-right added_wishlist"><button id="add_to_wishlist" class="add_cart_btm">Add to wishlist</button></div>
							</div>							
							<?php
						}
					?>
  
					<script>
						
						$(document).ready(function(){
							
							$('#add_to_wishlist').click(function(){
								
								var product_id = '<?php echo $product['id']; ?>';
								
								//$("#results").html('<img src="<?=$this->webroot?>img/29.gif">');
								
								$.post("<?=$this->webroot?>/buyshops/wishlist_mgt", {
								
																				product_id: product_id,
								
																			}, function(result){									
									if(result == "yes")
										$("#results_wishlist_replace").html('<div class="size_2-right added_wishlist"><button class="add_cart_btm">Added to wishlist</button></div>');	
									else
										$("#results_wishlist_replace").html('<div class="size_2-right added_wishlist"><button class="add_cart_btm">Please login first..!!!</button></div>');									
								});																	
							});
						});

					</script>		
				  
				  	<ul class="back">
					
                	  <li><i class="back_arrow"> </i>Back to <a href="index.html">Men's Clothing</a></li>					  
					  
					</ul>
					
					<h1><?php echo $product['prodname']; //nibh euismod?></h1>
					
					<p><?php echo $product['proddesc']; //Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum ?></p>
				     <div class="dropdown_top" style="margin:10px 0px;">
				       
					   <?php
					   
					   foreach($att_array as $key=>$att)
					   {
							if($key == 'Size')
							{
								?>
								<div class="dropdown_left">
									<?php echo $key; ?>
									<select class="dropdown" tabindex="10" data-settings='{"wrapperClass":"metro1"}'>
									<option value="0">Select size</option>	
									<?php
									
									foreach($att as $key_element=>$att_element)
									{
										$att_element = $att_element['Produc_attribute'];
										?>
										<option value="<?php echo $att_element['att_value_id']; ?>"><?php echo $att_element['att_val_name']; ?></option>	
										
										<!--<option value="1">M</option>
										<option value="2">L</option>
										<option value="3">XL </option>-->
										
										<?php
									}
									?>
									</select>
								</div>
								<?php
							}
							
							if($key == 'Color')
							{	
								echo '<ul class="color_list" style="color:#ffffff; font-size:0px;">';
									
								echo $key;
								echo '<div style="color: #000; float: left; font-size: 14px; padding: 8px 0 0; text-align: right; width: auto;">Color:</div>';
								
								foreach($att as $key_element=>$att_element)
								{
									$att_element = $att_element['Produc_attribute'];
									?>
									
									<li>
                                    <label>
									
                                    <input class="check_class" id="<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>" id="check_box" type="checkbox" />
                                    
									<!--<input type="checkbox" name="<?php //echo $att_element['att_value_id']; ?>">-->
									
									<img src="<?php echo $this->webroot.'img/attribute_value/thumb/small_images/'.$att_element['att_value_img']; //image.gif ?>" >
                                    <img src="<?php echo $this->webroot.'img/only_human_userside/tick.png'; ?>" style="border: 0px none; width: auto; height: auto; padding: 9px; position: relative; margin: 0px 0px 0px -28px; z-index:499" />
                                    </label>
                                    
                                    </li>
									
									<script>
						
										$(document).ready(function(){
											
											//$('#discounted_price').hide();
											
											$('#<?php echo $att_element['att_value_id']; ?>_<?php echo $att_element['prodid']; ?>').click(function(){
												
												var attvid = '<?php echo $att_element['att_value_id']; ?>';
												
												var prodid = '<?php echo $att_element['prodid']; ?>';
												
												if($(this).is(":checked"))
												{
													$.post("<?=$this->webroot?>buyshops/color_change_imgs", {attvid: attvid, prodid: prodid, checkid: 1}, function(result){
													
														$("#product_image_data").html(result);								    
													});								
													
													$( ".check_class" ).prop( "checked", false );
													
													$(this).prop( "checked", true );
												}
												else
												{
													$.post("<?=$this->webroot?>buyshops/color_change_imgs", {attvid: attvid, prodid: prodid, checkid: 0}, function(result){
													
														$("#product_image_data").html(result);								    
													});								
												}
											});
										});
										
									</script>
									
									<!--<li><a href="#"> <span class="color2"> </span></a></li>
									<li><a href="#"> <span class="color3"> </span></a></li>
									<li><a href="#"> <span class="color4"> </span></a></li>-->
									
									<?php
								}		
								
								echo '</ul>';								
							}
							if($key == 'Brand')
							{
								echo '<ul class="brand_box">';
									
								echo $key.':-  ';
								
								foreach($att as $key_element=>$att_element)
								{
									$att_element = $att_element['Produc_attribute'];
									
									echo $att_element['att_val_name'];
									
									?>
									
									<!--<input value="<?php //echo $att_element['att_value_id']; ?>" id="check_box" type="checkbox" />--><?php //echo $att_element['att_val_name']; ?>
									<!--<li><a href="#"> <span class="color2"> </span></a></li>
									<li><a href="#"> <span class="color3"> </span></a></li>
									<li><a href="#"> <span class="color4"> </span></a></li>-->
									
									<?php
								}										
								echo '</ul>';		
							}
							
							if(($key !='Brand') && ($key !='Size') && ($key !='Color'))
							{								
								echo '<div style="width:100px">'; 
								
								echo '<ul class="brand_box">';
								
								?>
								
								<li>
								
								<?php
								
								$att_count = count($att);
								$i=0;
								foreach($att as $key_element=>$att_element)
								{
									if($i==0)
										echo $key;
									
									$i++;
									
									$att_element = $att_element['Produc_attribute'];
									
									?>
									
									<li>
                                    <label>
									<?php 
									
									echo $att_element['att_val_name']; 
									
									if($att_count>1)
									{
										?>
										<input value="<?php echo $att_element['att_value_id']; ?>" id="check_box" type="checkbox" />                                    
										<?php
									}
									else
									{
										echo $att_element['att_value_id'];                                     
									}
									?>
                                    </label>
                                    </li>
									
									<?php
								}		
								
								echo '<div>';
								echo '</ul>';								
							}							
						}
						
					   ?>
						
					<div class="clearfix"></div>
			         </div>
			         <div class="simpleCart_shelfItem">
			         	<div class="price_single">
						  <div class="head">
						  <h2><span class="amount item_price"><?php echo '$'.$product['prodprice'];//$45.00 ?>
							<br>
							<?php echo 'Discount '.$product['discount'].'%'; // $187.95 ?>
							<br>
							<?php echo 'Discounted Price $'.$product['discounted_price']; // $187.95 ?>
							</span></h2>
						  </div>
						  
						  <div class="head_desc">
						  
						  <div id="reviews_show" ><?php echo count($reviews).' ';?>reviews</div>
						  <img src="<?php echo $this->webroot.'img/buy_shop/review.png'; ?>" alt=""/>
						  </li>
						  </div>
					       <div class="clearfix"></div>
					     </div>
						 
						 <div id="added_cart_1">
						 <div class="size_2-right">									
							<button id="added_to_cart" class="add_cart_btm">Added to Cart</button>
						 </div>
						 </div>
									
						 <?php

							if(isset($product['add_to_cart']))
							{
								if($product['add_to_cart'] == 1)
								{
									?>									
									<div id="added_cart">
									<div class="size_2-right">									
									<button id="added_to_cart" class="add_cart_btm">Added to Cart</button>
									</div>
									</div>
									<?php
								}
								else
								{
									?>
									<div id="add_cart_1">
									<div class="size_2-right">									
									<button id="add_to_cart" class="add_cart_btm">Add To Cart</button>
									</div>
									</div>
									<?php
								}
							}
							else
							{
								?>
								<div id="add_cart_2">
								<div class="size_2-right">								
								<button id="add_to_cart"  class="add_cart_btm">Add To Cart</button>
								</div>
								</div>
								<?php
							}
						 ?>`
						
						
						
						<div style="margin-left:100px" class="size_2-right"><a id="add_to_cart_buy" class="add_cart_btm" href="<?php echo $this->webroot.'buyshops/buy_product/'.$product['id']; ?>">Buy</a></div>
						
						<div class="apply_box">
						<div  class="size_2-right"><a id="coupon_btn" class="add_cart_btm" style="float:left; margin-bottom:10px;">Apply Coupon</a></div>
						<input id="coupon_txt" type="text" name="coupon_number" class="apply_input" style="clear:both">
						<button id="coupon_apply_btn"  class="apply_btn">Apply</button>
						
						<button id="discounted_price"  class="apply_btn"></button>
						
						</div>
						
					    <script>
						
						$(document).ready(function(){
							
							$('#discounted_price').hide();
							
							$('#coupon_apply_btn').click(function(){
								
								$('#discounted_price').show();
								
								var product_id = '<?php echo $product['id']; ?>';
								
								var coupon_txt = $('#coupon_txt').val();
								
								$.post("<?=$this->webroot?>buyshops/coupon_mgt", {coupon_txt: coupon_txt, product_id: product_id}, function(result){
								
									$("#discounted_price").html(result);								    
								});								
							});
							
							$('#coupon_apply_btn').hide();
							$('#coupon_txt').hide();
							
							$('#coupon_btn').click(function(){
								
								alert("Coupon_button_click");
								
								//$('#coupon_btn').show();								
								
								$('#coupon_apply_btn').show();
								$('#coupon_txt').show();
							});
							
							$('#added_cart_1').hide();
							
							$('#review_div').hide();
							
							$('#reviews_show').click(function(){
									
								$('#review_div').toggle();
							});
								
							$('#add_to_cart').click(function(){
								
								var page_id = '<?php echo $page_id; ?>';
								
								var product_id = '<?php echo $product['id']?>';
								
								$.post("<?=$this->webroot?>buyshops/add_to_cart", {product_id: product_id, page_id: page_id}, function(result){
								
									$("#cart").html(result);								    
									$('#add_cart_1').hide();
									$('#add_cart_2').hide();
									$('#added_cart_1').show();
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
						<li class="subitem1"><a href="#">
						<?php 
						
						echo "Product Name:- ".$product['prodname'];
						
						echo "<br><br>Short Description:- ".$product['prodscdes'];
						
						echo "<br><br>Long Description:- ".$product['proddesc']."<br><br>"; 
						
					    foreach($att_array as $key=>$att)
					    {
							if(($key !='Brand') && ($key !='Size') && ($key !='Color'))
							{
								$att_count = count($att);
								foreach($att as $key_element=>$att_element)
								{
									$att_element = $att_element['Produc_attribute'];

									if($att_count<=1)
									echo $key.':-  '.$att_element['att_val_name']."<br><br>";                                     ; 
								}		
							}
						}
						
						?>
						
						<!--Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor </a>-->
						
						</li>
						<!--<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>-->
					</ul>
				</li>
				<li class="item1"><a href="#"><img src="<?php echo $this->webroot.'img/buy_shop/product_arrow.png';?>">Additional information</a>
					<ul>
					    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item1"><a href="#"><img src="<?php echo $this->webroot.'img/buy_shop/product_arrow.png';?>"><?php echo 'Reviews ('.count($reviews).')'; ?></a>
					
					<div id="review_div">
					<ul>
						<?php
						if(count($reviews) == 0)
							echo "No Reviews";
						else
						foreach($reviews as $review)
						{
							?>
							<li class="subitem1"><a href="#"><?php echo $review['Review_master']['review_txt']; ?> </a></li>
							<?php
						}
						
						?>
						
						<!--<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor </a></li>
						<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>-->
						
						<li class="subitem3"><textarea id="review_text" style="width:100%; height:70px">Write a Review</textarea></li>
						<li class="subitem3"><input style="width:100px;height:30px" id="button_submit" type="button" value="Submit"></li>
						
						<div id="results_review"></div>

						<li><br><br></li>
						
						<script>
						
							$(document).ready(function(){
								
								$('#button_submit').click(function(){
									
									var review_text = $('#review_text').val();
									
									var product_id = '<?php echo $product['id']; ?>';
									
									//$("#results").html('<img src="<?=$this->webroot?>img/29.gif">');
									
									$.post("<?=$this->webroot?>/buyshops/review_mgt", {
									
																				review_text: review_text,
																				product_id: product_id,
									
																			 }, function(result){
																				 
										if(result == "yes")
										$("#results_review").html('Thank You..your review is in the process of approval...!!!');
										else
										$("#results_review").html('Please logged in first...!!!');
									});									
								});
							});

						</script>		

					</ul>
					</div>
					
				</li>
				<li class="item1"><a href="#"><img src="<?php echo $this->webroot.'img/buy_shop/product_arrow.png';?>">Helpful Links</a>
					<ul>
					    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item1"><a href="#"><img src="<?php echo $this->webroot.'img/buy_shop/product_arrow.png';?>">Make A Gift</a>
					<ul>
						<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor </a></li>
						<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
	 		</ul>
   </div>
   
	<!--<h3 class="m_2">Related Products</h3>-->
   
	     <!--<div class="container">
          		<div class="box_3">
          			<div class="col-md-3">
          				<div class="content_box"><a href="single.html">
			   	          <img src="<?php //echo $this->webroot.'img/buy_shop/pic6.jpg'; ?>" class="img-responsive" alt="">
				   	   </a>
				   </div>
				    <h4><a href="single.html">Contrary to popular belief</a></h4>
				    <p>$ 199</p>
			        </div>
          			<div class="col-md-3">
          				<div class="content_box"><a href="single.html">
			   	          <img src="<?php //echo $this->webroot.'img/buy_shop/pic2.jpg'; ?>" class="img-responsive" alt="">
				   	   </a>
				   </div>
				    <h4><a href="single.html">Contrary to popular belief</a></h4>
				    <p>$ 199</p>
			        </div>
          			<div class="col-md-3">
          				<div class="content_box"><a href="single.html">
			   	          <img src="<?php //echo $this->webroot.'img/buy_shop/pic4.jpg'; ?>" class="img-responsive" alt="">
				   	   </a>
				   </div>
				    <h4><a href="single.html">Contrary to popular belief</a></h4>
				    <p>$ 199</p>
			        </div>
          			<div class="col-md-3">
          				<div class="content_box"><a href="single.html">
			   	          <img src="<?php //echo $this->webroot.'img/buy_shop/pic5.jpg'; ?>" class="img-responsive" alt="">
				   	   </a>
				   </div>
				    <h4><a href="single.html">Contrary to popular belief</a></h4>
				    <p>$ 199</p>
			        </div>
			        <div class="clearfix"> </div>
          		</div>
          	</div>-->
			
		<?php echo $this->element('featured_slider'); ?>
	
        </div>
		
	