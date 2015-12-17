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
			
			if(isset($products_checkout))
			{
				foreach($products_checkout as $product)
				{
					?>
					<script>
					
					$(document).ready(function(c) {
						
						$("#close_<?php echo $product['id']; ?>").on('click', function(c){
							
							var product_id = '<?php echo $product['id']; ?>';
							
							$(location).attr('href', '<?php echo $this->webroot.'buyshops/remove_from_cart/'.$product['id']; ?>')
							
							/*
							$.post("<?=$this->webroot?>buyshops/remove_from_cart", {product_id: product_id}, function(result){
								
								//alert(result);
								
								$("#cart").html(result);
							});
							*/
							
							$('.cart-header_rmv<?php echo $product['id']; ?>').fadeOut('slow', function(c){
								$('.cart-header_rmv<?php echo $product['id']; ?>').remove();
							});
							});	  							
						});
					
					</script>
					 <div class="cart-header cart-header_rmv<?php echo $product['id']; ?>" >
						 <div class="close1" id="close_<?php echo $product['id']; ?>"> </div>
						 <div class="cart-sec simpleCart_shelfItem">
							<div class="cart-item cyc">
								
							<?php 
									
								if(isset($product['images']['Default']))
								{
									?>
									<img style="max-width: 150px; max-height: 130px;" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$product['images']['Default']['imagepath']; //images/pic1.jpg ?>" class="img-responsive" alt=""/>
									<?php										
								}
								else
								{
									?>
									<img style="max-width: 150px; max-height: 130px;" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$product['images']['all']['imagepath']; //images/pic1.jpg ?>" class="img-responsive" alt=""/>
									<?php
								}											
							?>
							</div>
							<div class="cart-item-info">
							<div class="brand_box"><?php echo $product['prodname']; //Mountain Hopper(XS R034) ?><span>Model No: 3578</span></div>
							<ul class="qty">
								
								<?php 
									
									if(isset($product['att']))
									foreach($product['att'] as $key=>$pro_att)
									{
										if($key == 'Quantity')
										{
											?>
											<li><p><?php echo $key.' : '.$pro_att; ?></p></li>
											<?php
										}
										else
										{
											?>
											<li><p><?php echo $key.' : '.$pro_att['attvalue']; ?></p></li>
											<?php
										}
									}
								?>
								
								<!--<li><p>Qty : 1</p></li>-->
							</ul>
							<div class="delivery">
								<!--<p>Service Charges : Rs.<?php //echo $product['prodprice'];?></p>-->
								 
								<br>
								<br>
								<p><?php echo 'Discount '.$product['discount'].'%'; // $187.95 ?></p>
								<br>
								<br>
								<p><?php echo 'Discounted Price $'.$product['discounted_price']; // $187.95 ?></p>
								
								 </p>
								 <span>Delivered in 2-3 bussiness days</span>
								 <div class="clearfix"></div>
							</div>	
						   </div>
						   <div class="clearfix"></div>
					  </div>
					 </div>
					<?php
				}				
			}
		?>
		</div>
		<?php 
		
		if(isset($products_checkout))
		{
			?>
			<div id="total_update">
			 <div class="col-md-3 cart-total">
			 <a class="continue" href="<?php echo $this->webroot.'buyshops/index'; ?>">Continue to basket</a>
			 
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 
				 <span class="total1">
				 
				<?php
				
				$i=0;
				foreach($products_checkout as $product)
				{
					if($i==0)
					$total_price = $product['discounted_price'];
					else
					$total_price = ($total_price + $product['discounted_price']);

					$i++;
				}
				
				echo $total_price;//6200.00
				 
				?>
				
				 </span>
				 
				 <!--<span>Discount</span>
				 <span class="total1">---</span>-->
				 
				 <span>Delivery Charges</span>
				 <span class="total1"> --- </span>
				 
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price input_box">
			   <span>
			   <?php echo $total_price; //6350.00  ?>
			   
			   <input id="total_price_id" type="hidden" value="<?php echo $total_price; //6350.00  ?>" name="price_data" style="clear: both; width: 90%; font-size: 17px;">
			   
			   </span></li>
			   <div class="clearfix"> </div>
			 </ul>
			
			 <div class="clearfix"></div>

			 
			 <div class="total-item">
				 <!--<h3>OPTIONS</h3>
				 <h4>COUPONS</h4>-->
				 
				 <!--<a class="cpns" href="#">Apply Coupons</a>-->
				 
				  <div class="apply_box" style="padding: 10px 0">
						
					<div  class="size_2-right"><a id="coupon_btn" class="add_cart_btm" style="float:left; margin-bottom:10px;background-color:#3a3a3a">Apply Coupon</a></div>
					
					<input id="coupon_txt" type="text" name="coupon_number" class="apply_input" style="clear:both; width:190px; height:39px;">
					
					<div id="coupon_msg"> </div>
					
					<button id="coupon_apply_btn"  class="apply_btn">Apply</button>
					
					<!--<input type="text" value="<?php //echo $total_price; //6350.00  ?>" name="final_price">-->
					
					<button id="discounted_price"  class="apply_btn"></button>
					
					<input type="hidden" value="" id="coupon_info">
					
					<input type="hidden" value="" id="coupon_price_id">
					
				  </div>
				  
				  <div class="clearfix"></div>
				  
				  <button class="add_cart_btm order" id="place_order">Place Order</button>
				  
				  <!--<a class="order" href="">Place Order</a>-->
				  
				 <script>
						
					$(document).ready(function(){
						
						$('#place_order').click(function(){
							
							var total_price_id = $('#total_price_id').val();
							
							var coupon_price_id = $('#coupon_price_id').val();
							
							var coupon_info = $('#coupon_info').val();
							
							$.post("<?=$this->webroot?>buyshops/place_order_info", {total_price_id: total_price_id, coupon_price_id: coupon_price_id, coupon_info: coupon_info}, function(result){
								
								if(result == 'yes')
								{
									$(location).attr('href','<?php echo $this->webroot.'buyshops/place_order'; ?>');
								}
							});						
							
							//$(location).attr('href','<?php echo $this->webroot.'buyshops/place_order'; ?>/'+total_price_id+'/'+coupon_price_id+'/'+coupon_info);
							
							
						});
						
						$('#discounted_price').hide();
						
						$('#coupon_apply_btn').click(function(){
							
							$('#discounted_price').show();
							
							if($('#coupon_txt').val() == '' )
							{
								$('#coupon_msg').html("Please enter the coupon number");
								return false;
							}	
							
							var total_price = '<?php echo $total_price; ?>';
							
							var coupon_txt = $('#coupon_txt').val();
							
							$.post("<?=$this->webroot?>buyshops/coupon_mgt", {coupon_txt: coupon_txt, total_price: total_price}, function(result){
								
								$("#coupon_price_id").val(result);
								
								if(result == 'Please Logged in first')
									$("#discounted_price").html(result);								    
								else if(result == 0)
									$("#discounted_price").html("Sorry, you entered wrong coupon number/ Already used this coupon.");								    
								else
								{
									$('#coupon_info').val(coupon_txt);
									
									$("#discounted_price").html("Discounted prices is "+result);								    
								}
									
							});								
						});
						
						$('#coupon_apply_btn').hide();
							$('#coupon_txt').hide();
							
							$('#coupon_btn').click(function(){
								
								//alert("Coupon_button_click");
								
								//$('#coupon_btn').show();								
								
								$('#coupon_apply_btn').show();
								$('#coupon_txt').show();
						});
					});
						
				</script> 
				 
				 <!--<p><a href="#">Log In</a> to use accounts - linked coupons</p>-->
			 </div>

			 </div>
		</div>
		<?php
			}
			
			else
				echo "<br><br><div class='width100' style='border: 2px solid #f0f0f0; color: #ff0000; font-size: 21px; margin: 10px 0; padding: 10px 0; text-align: center;'>Sorry no item found in your cart</div>";			
		?>
	 </div>
</div>