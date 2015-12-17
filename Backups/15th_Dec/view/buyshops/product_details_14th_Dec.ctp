<!--<div id="shashi">shashikant</div>-->
<?php ?>
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
							<div id="results_wishlist_replace">
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
								
								var quantity_data = $('#quantity_data').val();
								
								var checked = 1;
								
								var key = 'Quantity';
								
								var val = quantity_data+'_<?php echo $product['id']?>';
								
								$.post("<?=$this->webroot?>buyshops/att_cart", {val: val, checked: checked, key: key}, function(result){
									
									//$("#shashi").html(result);								    		
								});
								
								var mm=0;
								<?php
								foreach($att_array as $key=>$att_arr)
								{
									?>
									var key = '<?php echo $key; ?>';
									
									if(!(key == 'Material' || key == 'Brand'))
									{
										if($('.<?php echo $key; ?>').is(":checked"))
										{
											
										}
										else
										{
											var mm=1;
											$("#one_msg").html('Please fill up the field <?php echo $key; ?>');								    									
											return false;
										}
									}
									<?php
								}
								?>
								
								if(mm==0)
								{
									var product_id = '<?php echo $product['id']?>';
									
									var quantity_data = $('#quantity_data').val();
									
									$.post("<?=$this->webroot?>/buyshops/wishlist_mgt", {
									
																					product_id: product_id,
																					quantity_data: quantity_data,
									
																				}, function(result){									
										//$("#shashi").html(result);
										
										if(result == "yes")
											$("#results_wishlist_replace").html('<div class="size_2-right added_wishlist"><button class="add_cart_btm">Added to wishlist</button></div>');	
										else
											$("#results_wishlist_replace").html('<div class="size_2-right added_wishlist"><button class="add_cart_btm">Please login first..!!!</button></div>');																		
										
									});
								}						
							});
						});
							
					</script>		
				    
				  	<ul class="back" style="float:right">
					
                	  <li><i class="back_arrow"> </i>Back to <a href="<?php echo $this->webroot.'buyshops/index'; ?>">Clothing</a></li>					  
					  
					</ul>
					
                    <div style="float:left; width:100%">
					<h1><?php echo $product['prodname']; //nibh euismod?></h1>
					
					<p><?php echo $product['proddesc']; //Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum ?></p>
				     <div class="dropdown_top" style="margin:10px 0px;">
				       
					   <?php
					   
					   foreach($att_array as $key=>$att)
					   {
							if($key == 'Size')
							{
								?>
								<div class="size_box">
									<?php echo $key; ?>:&nbsp;&nbsp;
									
									<?php
										
									foreach($att as $key_element=>$att_element)
									{
										echo $att_element['Produc_attribute']['att_val_name'].' ';
											$att_element = $att_element['Produc_attribute'];
											
											/*
											if(isset($att_element['selected']))
											{
												?>												
												<input class="<?php echo $key; ?> check_class_<?php echo $att_element['Attribute_master']; ?>" id="<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>" id="check_box" type="checkbox" value="<?php echo $att_element['att_val_name']; ?>" checked="checked" />&nbsp;&nbsp;
												<?php
											}
											else
											{
												*/
												?>
												<input class="<?php echo $key; ?> check_class_<?php echo $att_element['Attribute_master']; ?>" id="<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>" id="check_box" type="checkbox" value="<?php echo $att_element['att_val_name']; ?>"/>&nbsp;&nbsp;
												<?php
											//}											
										?>
										
										<script>
										
											$(document).ready(function(){
											
											$('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').click(function(){
												
												if($(this).is(":checked"))
												{
													var val = $('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').attr('id');
													
													var key = '<?php echo $key; ?>';
													
													var checked = 1;
													
													$( ".check_class_<?php echo $att_element['Attribute_master']; ?>" ).prop( "checked", false );
													
													$(this).prop( "checked", true );
													
													$.post("<?=$this->webroot?>buyshops/att_cart", {val: val, checked: checked, key: key}, function(result){
										
														//$("#shashi").html(result);								    
														
													});
												}
												else
												{
													var val = $('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').attr('id')
													
													var key = '<?php echo $key; ?>';
													
													var checked = 0;
													
													$.post("<?=$this->webroot?>buyshops/att_cart", {val: val, checked: checked, key: key}, function(result){
													
														//$("#shashi").html(result);								    
													});
												}
													
												});
											});
										
										</script>
										
										<?php
										unset($att_element);										
									}
									
									?>
								</div>
								<?php
							}
							
							if($key == 'Color')
							{
								echo '<ul class="color_list" style="color:#ffffff; font-size:0px;">';
									
								echo $key;
								echo '<div style="color: #000; float: left; font-size: 19px; padding: 8px 0 0; text-align: right; width: auto;">Color:</div>';
								
								foreach($att as $key_element=>$att_element)
								{
									$att_element = $att_element['Produc_attribute'];
									
									?>
									
									<li>
                                    <label>
									
									<?php
									
									/*
									if(isset($att_element['selected']))
									{
										?>
										<input value="<?php echo $att_element['att_val_name']; ?>" class="<?php echo $key; ?> check_class_<?php echo $att_element['Attribute_master']; ?>" id="<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>" id="check_box" type="checkbox" checked="checked"/>
										<?php										
									}
									else
									{
										*/
										
										?>
										<input value="<?php echo $att_element['att_val_name']; ?>" class="<?php echo $key; ?> check_class_<?php echo $att_element['Attribute_master']; ?>" id="<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>" id="check_box" type="checkbox" />
										<?php
									//}
									
									?>
                                    
									<img src="<?php echo $this->webroot.'img/attribute_value/thumb/small_images/'.$att_element['att_value_img']; //image.gif ?>" >
                                    <img src="<?php echo $this->webroot.'img/only_human_userside/tick.png'; ?>" style="border: 0px none; width: auto; height: auto; padding: 9px; position: relative; margin: 0px 0px 0px -28px; z-index:499" />
                                    </label>
                                    
                                    </li>
									
									<script>
									
									$(document).ready(function(){
										
										$('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').click(function(){
										
											var val = $('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').attr('id')
											
											//alert("val"+val);								
									
										});
										
										$('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').click(function(){
											
											if($(this).is(":checked"))
											{
												var val = $('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').attr('id')
												
												var key = '<?php echo $key; ?>';
												
												var checked = 1;
												
												$.post("<?=$this->webroot?>buyshops/att_cart", {val: val, checked: checked, key: key}, function(result){
									
													//alert(result);
													
													//$("#shashi").html(result);								    													
												});
												
												$( ".check_class_<?php echo $att_element['Attribute_master']; ?>" ).prop( "checked", false );
												
												$(this).prop( "checked", true );												
											}
											else
											{
												var val = $('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').attr('id')
												
												var key = '<?php echo $key; ?>';
												
												var checked = 0;
												
												$.post("<?=$this->webroot?>buyshops/att_cart", {val: val, checked: checked, key: key}, function(result){
												
													//alert(result);
													
													//$("#shashi").html(result);								    
													
												});
											}													
										});			

										$('#<?php echo $att_element['att_value_id']; ?>_<?php echo $att_element['prodid']; ?>').click(function(){
												
											var attvid = '<?php echo $att_element['att_value_id']; ?>';
											
											var prodid = '<?php echo $att_element['prodid']; ?>';
											
											if($(this).is(":checked"))
											{
												$.post("<?=$this->webroot?>buyshops/color_change_imgs", {attvid: attvid, prodid: prodid, checkid: 1}, function(result){
													
													//$("#shashi").html(result);								    
													
													$("#product_image_data").html("PRICE IS CHANGE AS PER PRODUCT COLOR. NEW PRICE IS "+result);								    
												});								
												
												$( ".check_class_<?php echo $att_element['Attribute_master']; ?>" ).prop( "checked", false );
												
												$(this).prop( "checked", true );
											}
											else
											{
												$.post("<?=$this->webroot?>buyshops/color_change_imgs", {attvid: attvid, prodid: prodid, checkid: 0}, function(result){
													
													//$("#discounted_price").val('<?php echo $product['prodprice']; ?>');								    
													
													//$("#shashi").html(result);								    
													$("#product_image_data").html("PRICE IS CHANGE AS PER PRODUCT COLOR. NEW PRICE IS "+result);								    
												});								
											}
											
											
											if($(this).is(":checked"))
											{
												$.post("<?=$this->webroot?>buyshops/price_changed", {attvid: attvid, prodid: prodid, checkid: 1}, function(result){
													$("#discounted_price_msg").show();								    
													//alert(result);
													
													//$("#shashi").html(result);								    
													//$("#original_price").html(result);								    
													//$("#product_image_data").html(result);								    													
													
													$("#discounted_price").val(result);								    
													
													$("#discounted_price_msg").html("Price is change as per product color. New price is " +result);								    													
													
													//alert(result);
													
													if(result == "N/A")
													{
														$("#discounted_price_msg").html("Sorry, this product is unavailable. whenever available we will contact you..!!");								    													
														$('#place_order').hide();														
													}													
												});								
												
												$( ".check_class_<?php echo $att_element['Attribute_master']; ?>" ).prop( "checked", false );
												
												$(this).prop( "checked", true );
											}
											else
											{
												$("#discounted_price").val('<?php echo $product['prodprice']; ?>');								    
												
												$("#discounted_price_msg").hide();								    
												/*
												$('#place_order').show();														
												$.post("<?=$this->webroot?>buyshops/price_changed", {attvid: attvid, prodid: prodid, checkid: 0}, function(result){
												
													$("#shashi").html(result);								    
													
													$("#discounted_price").val(result);								    
													
													$("#discounted_price_msg").html("Price is change as per product color. New price is " +result);								    
													
													if(result == "N/A")
													{
														$('#place_order').hide();														
													}													
													
													//$("#product_image_data").html(result);								    
												});								
												*/
											}
											
										});																				
									});
								
									</script>

									<?php
								}		
								
								echo '</ul>';								
							}
							if(($key == 'Brand') || ($key == 'Material'))
							{
								echo '<ul class="brand_box">';
									
								echo $key.':-  ';
								
								foreach($att as $key_element=>$att_element)
								{
									$att_element = $att_element['Produc_attribute'];
									
									echo $att_element['att_val_name'];
									
									?>
									
									<input id="<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>"  type="hidden" class="<?php echo $key; ?> check_class_<?php echo $att_element['Attribute_master']; ?>" value="<?php echo $att_element['att_val_name']; ?>">
									
									<script>
					
										$(document).ready(function(){
										
											$('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').click(function(){
											
												var val = $('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').attr('id')
												
												//alert("val"+val);								
											});
											
											
											$('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').click(function(){
												
												if($(this).is(":checked"))
												{
													var val = $('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').attr('id')
													
													var key = '<?php echo $key; ?>';
													
													var checked = 1;
													
													$.post("<?=$this->webroot?>buyshops/att_cart", {val: val, checked: checked, key: key}, function(result){
										
														//alert(result);
													});
													
													$( ".check_class_<?php echo $att_element['Attribute_master']; ?>" ).prop( "checked", false );
													
													$(this).prop( "checked", true );
													
												}
												else
												{
													var val = $('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').attr('id')
													
													var key = '<?php echo $key; ?>';
													
													var checked = 0;
													
													$.post("<?=$this->webroot?>buyshops/att_cart", {val: val, checked: checked, key: key}, function(result){
													
														//alert(result);
													});
												}													
											});											
										});
									
									</script>
									
									<?php
								}										
								echo '</ul>';		
							}
							
							/*
							if(($key !='Brand') && ($key !='Size') && ($key !='Color'))							
							{
								echo '<ul class="brand_box">';
									
								echo $key.':-  ';
								
								foreach($att as $key_element=>$att_element)
								{
									$att_element = $att_element['Produc_attribute'];
									
									echo $att_element['att_val_name'];
									
									?>
									
									<input id="<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>"  type="hidden" class="<?php echo $key; ?> check_class_<?php echo $att_element['Attribute_master']; ?>" value="<?php echo $att_element['att_val_name']; ?>">
									
									<script>
					
										$(document).ready(function(){
										
											$('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').click(function(){
											
												var val = $('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').attr('id')
												
												//alert("val"+val);								
											});
											
											
											$('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').click(function(){
												
												if($(this).is(":checked"))
												{
													var val = $('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').attr('id')
													
													var key = '<?php echo $key; ?>';
													
													var checked = 1;
													
													$.post("<?=$this->webroot?>buyshops/att_cart", {val: val, checked: checked, key: key}, function(result){
										
														//alert(result);
													});
													
													$( ".check_class_<?php echo $att_element['Attribute_master']; ?>" ).prop( "checked", false );
													
														$(this).prop( "checked", true );
													
												}
												else
												{
													var val = $('#<?php echo $att_element['att_value_id'].'_'.$att_element['prodid']; ?>').attr('id')
													
													var key = '<?php echo $key; ?>';
													
													var checked = 0;
													
													$.post("<?=$this->webroot?>buyshops/att_cart", {val: val, checked: checked, key: key}, function(result){
													
														//alert(result);
													});
												}													
											});											
										});
									
									</script>
																		
									<?php
								}										
								echo '</ul>';		
							}
							*/
							?>						
					<?php
							
						}						
					?>
					<div class="quantity_box">
					Quantity:
					<select name="quantity_data" id="quantity_data" class="quantity_data" style="width:100px;">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					</select>
					</div>
					<div class="clearfix"></div>
			         </div>
			         <div class="simpleCart_shelfItem">
			         	<div class="price_single">
						  <div class="head">
                          <span class="amount item_price" style="width:100%; float: left; padding-bottom: 30px;">
						    <div style="float: left; width: 200px; padding:20px 0 0 0">
                              <div class="usd_price">USD: <?php echo '$'.$product['prodprice'];//$45.00 ?></div>
							  <div class="discount_price">Discounted Price <br /><span style="color: #f18c00; font-size: 34px;"><?php echo ' $'.$product['discounted_price']; // $187.95 ?></span></div>
                            </div>
                            <div class="discount_box">Discount<br /><span style="font-size: 31px;"><?php echo ' '.$product['discount'].'%'; // $187.95 ?></span></div>
						  </span>
                          
						  </div>
						  
						  <div class="head_desc">
						  
						  <!--<div id="reviews_show" ><?php //echo count($reviews).' ';?>reviews</div>-->
						  <!--<img src="<?php //echo $this->webroot.'img/buy_shop/review.png'; ?>" alt=""/>-->
						  </li>
						  </div>
					       <div class="clearfix"></div>
					     </div>
						 
						 <div id="added_cart_1">
						 <div class="size_2-right">									
							<button id="added_to_cart" class="add crt add_cart_btm">Added to Cart</button>
						 </div>
						 </div>
									
						 <?php

							if(isset($product['add_to_cart']))
							{
								if($product['add_to_cart'] == 1)
								{
									?>									
									<div id="added_cart">
									<div class="size_2-right" style="width:100%">									
									<button id="added_to_cart" class="add crt add_cart_btm">Added to Cart</button>
									<div id="one_msg" class="error_mess">Please Insert the all attributes</div>
									</div>
									</div>
									<?php
								}
								else
								{
									?>
									<div id="add_cart_1">
									<div class="size_2-right" style="width:100%">									
									<button id="add_to_cart" class="add crt add_cart_btm">Add To Cart</button>
									<div id="one_msg" class="error_mess">Please Insert the all attributes</div>
									</div>
									</div>
									<?php
								}
							}
							else
							{
								?>
								<div id="add_cart_1">
								<div class="size_2-right" style="width:100%">								
								<button id="add_to_cart"  class="add crt add_cart_btm">Add To Cart</button>
								<div id="one_msg" class="error_mess">Please insert the all attributes</div>
								</div>
								</div>
								<?php
							}
						?>
						
						<div style="margin-left:100px" class="size_2-right">
						
						</div>
						
						<?php
						
						$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; 
						
						$paypal_id = 'shashikant.chobhe-seller@sibzsolutions.com';  // sriniv_1293527277_biz@inbox.com

						?>
						
						<div class="apply_box">
						<div style="background-color: #fefefe; border: 1px solid #ccc; float: left; padding: 10px; width: 100%; margin:0 0 20px 0">
						<div  class="size_2-right" style="margin:0px;"><a id="coupon_btn" class="first_apply add_cart_btm" style="float:left; background-color:#3a3a3a">Apply Coupon</a></div>
						
						<div>
                          <input id="coupon_txt" type="text" name="coupon_number" class="apply_input">
	  					  <button id="coupon_apply_btn"  class="apply_btn" style="padding:5px 20px;">Apply</button>
						</div>
                        </div>
                        <br />
						<input type="hidden" id="original_price" value="<?php echo $product['prodprice']; ?>">
						
						<input type="hidden" id="original_price" value="<?php echo $product['prodprice']; ?>">
						
						<input type="hidden" id="discounted_price" value="<?php echo $product['discounted_price']; // $187.95 ?>">
						
						<input type="hidden" id="coupon_info" value="">
						
						<button id="discounted_price_msg"  class="apply_btn" style="padding: 0px"></button>
						<br />
                        <button class="add_cart_btm" id="place_order" style="font-size: 20px; padding: 10px 30px; clear: both; float: left; margin: 10px 0px 0px;">Buy</button>
                        
						</div>
						
					    <script>
						
						$(document).ready(function(){
							
							$('.first_apply').click(function(){
								
								//alert("shashikant is in the apply button");
								
								var quantity_data = $('#quantity_data').val();
							
								var checked = 1;
								
								var key = 'Quantity';
								
								var val = quantity_data+'_<?php echo $product['id']?>';
								
								$.post("<?=$this->webroot?>buyshops/att_cart", {val: val, checked: checked, key: key}, function(result){
									
									$("#shashi").html(result);								    		
								});
								
								var mm=0;
								
								<?php
								foreach($att_array as $key=>$att_arr)
								{
									?>
									var key = '<?php echo $key; ?>';
									
									if(!(key == 'Material' || key == 'Brand'))
									{
										if($('.<?php echo $key; ?>').is(":checked"))
										{
											
										}
										else
										{
											var mm=1;
											$("#one_msg").html('Please fill up the field <?php echo $key; ?>');								    									
											return false;
										}
									}
									<?php
								}
								?>
								
								if(mm==0)
								{
									$('#coupon_apply_btn').show();
									$('#coupon_txt').show();
								}									
							});
							
							$('#place_order').click(function(){
								
								var quantity_data = $('#quantity_data').val();
							
								var checked = 1;
								
								var key = 'Quantity';
								
								var val = quantity_data+'_<?php echo $product['id']?>';
								
								$.post("<?=$this->webroot?>buyshops/att_cart", {val: val, checked: checked, key: key}, function(result){
									
									$("#shashi").html(result);								    		
								});
								
								var mm=0;
								<?php
								foreach($att_array as $key=>$att_arr)
								{
									?>
									var key = '<?php echo $key; ?>';
									
									//alert(key);
									
									if(!(key == 'Material' || key == 'Brand'))
									{
										if($('.<?php echo $key; ?>').is(":checked"))
										{
											
										}
										else
										{
											var mm=1;
											$("#one_msg").html('Please fill up the field <?php echo $key; ?>');								    									
											return false;
										}
									}
									<?php
								}
								?>
								
								var product_id = '<?php echo $product['id']; ?>';
								
								var quantity_data = $('#quantity_data').val();
								
								var product_price = '<?php echo $product['prodprice']; ?>';
								
								var product_discounted_price = $('#discounted_price').val();
								
								//var product_discounted_price = '<?php echo $product['discounted_price']; ?>';
								
								var total_price_id = $('#original_price').val();
								
								var coupon_price_id = $('#discounted_price').val();
								
								var coupon_info = $('#coupon_info').val();
								
								$(location).attr('href','<?php echo $this->webroot.'buyshops/buy_product/'; ?>'+product_id+'/'+quantity_data+'/'+total_price_id+'/'+product_discounted_price+'/'+coupon_price_id+'/'+coupon_info);														
								
							});
							
							
							$('#discounted_price').hide();
							
							
							$('#coupon_apply_btn').click(function(){
								
								
								
								
								$('#discounted_price').show();
								
								var product_id = '<?php echo $product['id']; ?>';
								
								var coupon_txt = $('#coupon_txt').val();
								
								var discounted_price = $('#discounted_price').val();
								
								//var discounted_price = '<?php echo $product['discounted_price']; ?>';
								
								var quantity_data = $('#quantity_data').val();
								
								var product_discounted_price = '<?php echo $product['discounted_price']; ?>';
								
								$.post("<?=$this->webroot?>buyshops/coupon_mgt", {coupon_txt: coupon_txt, product_id: product_id, discounted_price:discounted_price, quantity_data: quantity_data}, function(result){
									
									$("#discounted_price").val(result);								    
									
									$("#shashi").html(result);								    
									
									//$("#discounted_price").html(result);								    
									
									if(result == 0)										
										$("#discounted_price_msg").html("Sorry, you entered wrong coupon number / Already used this coupon");								    
									else
									{
										$('#coupon_info').val(coupon_txt);
										$('#add_to_cart').hide();
										$("#discounted_price_msg").html("Discounted prices is "+result);								    									
									}										
								});								
							});
							
							$('#coupon_apply_btn').hide();
							$('#coupon_txt').hide();
							
							$('#coupon_btn').click(function(){
								
								//$('#coupon_btn').show();								
																
							});
							
							$('#added_cart_1').hide();
							
							$('#review_div').hide();
							
							$('#reviews_show').click(function(){
									
								$('#review_div').toggle();
							});
							
							$('#cancel_add_to_cart').click(function(){
								
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
					  
					<script>
					$(document).ready(function(){
						
						$('#add_to_cart').click(function(){
							
							var quantity_data = $('#quantity_data').val();
							
							var checked = 1;
							
							var key = 'Quantity';
							
							var val = quantity_data+'_<?php echo $product['id']?>';
							
							var discounted_price = $('#discounted_price').val();
							
							$.post("<?=$this->webroot?>buyshops/att_cart", {val: val, checked: checked, key: key, discounted_price:discounted_price}, function(result){
								
								$("#shashi").html(result);								    		
							});
							
							var mm=0;
							<?php
							foreach($att_array as $key=>$att_arr)
							{
								?>
								var key = '<?php echo $key; ?>';
								
								//alert(key);
								
								if(!(key == 'Material' || key == 'Brand'))
								{
									if($('.<?php echo $key; ?>').is(":checked"))
									{
										
									}
									else
									{
										var mm=1;
										$("#one_msg").html('Please fill up the field <?php echo $key; ?>');								    									
										return false;
									}
								}
								<?php
							}
							?>
							
							if(mm==0)
							{
								//var page_id = '<?php echo $page_id; ?>';
									
								var product_id = '<?php echo $product['id']?>';
								
								var quantity_data = $('#quantity_data').val();
								
								//, page_id: page_id
								
								$.post("<?=$this->webroot?>buyshops/add_to_cart", {product_id: product_id, quantity_data: quantity_data, discounted_price: discounted_price}, function(result){
									
									//$("#shashi").html(result);								    
									
									$("#cart").html(result);								    
									$('#add_cart_1').hide();
									$('#add_cart_2').hide();
									$('#added_cart_1').show();
								});
							}						
						});
					});
					
					</script>
			        
					</div>
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
						</li>						
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
                    <li>
                    <a>
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
												
						<li class="subitem3 input_box2"><textarea id="review_text" style="width:100%; height:70px">Write a Review</textarea></li>
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
                    </a>
                    </li>
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
		<?php echo $this->element('featured_slider'); ?>
	
        </div>
		
	