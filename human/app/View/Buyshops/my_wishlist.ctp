<div id="shashi"></div>

<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
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
<div class="width1220 checkout_box">
	<div class="" style="float:left; width:100%;">	 
		<div class="col-md-9 cart-items">
			<h1>My Shopping Bag</h1>
				
			<?php
			
			if(isset($wishlist))
			{
				foreach($wishlist as $product)
				{
					?>					
					<script>
					
						$(document).ready(function(c) {
							
							$("#close_<?php echo $product['Wishlist_master']['id']; ?>").on('click', function(c){
								
								var wishlist_master_id = '<?php echo $product['Wishlist_master']['id']; ?>';
								
								$(location).attr('href', '<?php echo $this->webroot.'buyshops/remove_from_wishlist/'.$product['Wishlist_master']['id']; ?>')
								
								/*
								$.post("<?=$this->webroot?>buyshops/remove_from_wishlist", {wishlist_master_id: wishlist_master_id}, function(result){
									
									//alert(result);
									
									//$("#cart").html(result);
								});
								*/
								
								$('.cart-header_rmv<?php echo $product['Wishlist_master']['id']; ?>').fadeOut('slow', function(c){
									//$('.cart-header_rmv<?php echo $product['Wishlist_master']['id']; ?>').remove();
								});
							});	  
						});
						
					</script>
					
					<div class="cart-header cart-header_rmv<?php echo $product['Wishlist_master']['id']; ?>" >
						 <div class="close1" id="close_<?php echo $product['Wishlist_master']['id']; ?>"> </div>
						 <div class="cart-sec simpleCart_shelfItem">
							<div class="cart-item cyc">
								
							<?php 
									
								if(isset($product['Wishlist_detail']['images']['Default']))
								{
									?>
									<img style="max-width: 150px; max-height: 130px;" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$product['Wishlist_detail']['images']['Default']['imagepath']; //images/pic1.jpg ?>" class="img-responsive" alt=""/>
									<?php										
								}
								else
								{
									?>
									<img style="max-width: 150px; max-height: 130px;" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$product['Wishlist_detail']['images']['all']['imagepath']; //images/pic1.jpg ?>" class="img-responsive" alt=""/>
									<?php
								}																		
							?>
								</div>
								<div class="cart-item-info">
								<div class="brand_box">
								<?php
								
								if(isset($product['Wishlist_detail']['prod_details']['prodname']))
								echo $product['Wishlist_detail']['prod_details']['prodname'];//['prodname'] //Mountain Hopper(XS R034) 
								
								?>
								<span>Model No: 3578</span></div>
								<ul class="qty">
									
									<?php 
									
									if(isset($product['Wishlist_master']['att']))
									foreach($product['Wishlist_master']['att'] as $keya=>$data)
									{
										?>
										<li><p><?php echo $keya; ?> : <?php echo $data; ?></p></li>
										<?php
									}
									
									?>
								
									<!--<li><p>Size : 5</p></li>-->
									<li><p>Qty : <?php echo $product['Wishlist_detail']['prodqty']; ?></p></li>
									
								</ul>
								<div class="delivery">
									 <p>Service Charges : Rs.
									 <?php 
									 if(isset($product['Wishlist_detail']['prod_details']['prodprice']))
									 echo $product['Wishlist_detail']['prod_details']['prodprice'];//['prodprice'];
									 ?>
									 </p>
									 
									<br>
									<br>
									<p><?php echo 'Discount '.$product['Wishlist_detail']['prod_details']['discount'].'%'; // $187.95 ?></p>
									<br>
									<br>
									<p><?php echo 'Discounted Price $'.$product['Wishlist_detail']['prod_details']['discounted_price']; // $187.95 ?></p>
									 
									 <span>Delivered in 2-3 bussiness days</span>
									 <div class="clearfix"></div>
								</div>	
								<?php
									
									if(isset($product['Wishlist_detail']['prod_details']['add_to_cart']))
									if($product['Wishlist_detail']['prod_details']['add_to_cart'] == 1 )
									{
										?>
										<div id="results_wishlist_replace_<?php echo $product['Wishlist_master']['id']; ?>" class="size_2-right added_cart"><button class="add_cart_btm">Added to cart</button></div>
										<?php
									}
									else
									{
										?>
										<div id="results_wishlist_replace_<?php echo $product['Wishlist_master']['id']; ?>" class="size_2-right added_cart"><button id="add_to_cart_<?php echo $product['Wishlist_detail']['prod_details']['id'];; ?>" class="add_cart_btm">Add to cart</button></div>
										<?php
									}
								?>
								
								<script>
						
									$(document).ready(function(){
										
										$('#add_to_cart_<?php echo $product['Wishlist_detail']['prod_details']['id'];; ?>').click(function(){
											
											var product_id = '<?php echo $product['Wishlist_detail']['prod_details']['id'];; ?>';
											
											//$("#results").html('<img src="<?=$this->webroot?>img/29.gif">');
											
											$.post("<?=$this->webroot?>/buyshops/add_to_cart", {
											
																							product_id: product_id,
																							
																							quantity_data: '<?php echo $product['Wishlist_detail']['prodqty']; ?>',
											
																						}, function(result){									
												$("#results_wishlist_replace_<?php echo $product['Wishlist_master']['id']; ?>").html('<div class="size_2-right added_wishlist"><button class="add_cart_btm">Added to cart</button></div>');
												
												//$("#shashi").html(result);												
												
												$("#cart").html(result);																								
											});																				
										});
									});

								</script>		
								
							   </div>
							   <div class="clearfix"></div>
						  </div>
					 </div>
			 
					<?php
					
					}				
				?>
			 			 
			 <!--<script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
							$('.cart-header2').fadeOut('slow', function(c){
						$('.cart-header2').remove();
					});
					});	  
					});
			 </script>
			 
			 <div class="cart-header2">
				 <div class="close2"> </div>
				  <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="images/pic2.jpg" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						<h3><a href="#">Mountain Hopper(XS R034)</a><span>Model No: 3578</span></h3>
						<ul class="qty">
							<li><p>Size : 5</p></li>
							<li><p>Qty : 1</p></li>
						</ul>
							 <div class="delivery">
							 <p>Service Charges : Rs.100.00</p>
							 <span>Delivered in 2-3 bussiness days</span>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			  </div>	
		-->
		<?php
		}
		?>
		</div>
	 </div>
</div>