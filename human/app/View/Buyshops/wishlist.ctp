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
				
			if(isset($products_checkout))
			{
				foreach($products_checkout as $product)
				{
					?>
					<script>
					$(document).ready(function(c) {
						$("#close_<?php echo $product['id']; ?>").on('click', function(c){
							
							var product_id = '<?php echo $product['id']; ?>';
							
							$.post("<?=$this->webroot?>buyshops/remove_from_cart", {product_id: product_id}, function(result){
								
								$("#cart").html(result);
							});
							
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
									<li><p>Size : 5</p></li>
									<li><p>Qty : 1</p></li>
								</ul>
								<div class="delivery">
									 <p>Service Charges : Rs.<?php echo $product['prodprice'];?></p>
									 <span>Delivered in 2-3 bussiness days</span>
									 <div class="clearfix"></div>
								</div>	
							   </div>
							   <div class="clearfix"></div>
						  </div>
					 </div>
			 
					<?php
					
					}				
				?>
			 
		<?php
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
			 
			 <!--<div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 
				 <span class="total1">
				 
				<?php
				
				/*
				$i=0;
				foreach($products_checkout as $product)
				{
					if($i==0)
					$total_price = $product['prodprice'];
					else
					$total_price = ($total_price+$product['prodprice']);

					$i++;
				}
				*/
				?>
				
				
				 <?php 
					
					//echo $total_price;//6200.00
				 
				 ?>
				

				 </span>
				 <span>Discount</span>
				 <span class="total1">---</span>
				 <span>Delivery Charges</span>
				 <span class="total1"> --- </span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price">
			   <span>
			   <?php //echo $total_price; //6350.00  ?>
			   </span></li>
			   <div class="clearfix"> </div>
			 </ul>-->
			
			 <div class="clearfix"></div>
			 <a class="order" href="#<?php //echo $this->webroot.'place_order'; ?>">Place Order</a>
			 
			 <!--<div class="total-item">
				 <h3>OPTIONS</h3>
				 <h4>COUPONS</h4>
				 <a class="cpns" href="#">Apply Coupons</a>
				 <p><a href="#">Log In</a> to use accounts - linked coupons</p>
			 </div>-->

			 </div>
		</div>
		<?php
			}
			
			else
				echo "<br><br><div class='width100' style='border: 2px solid #f0f0f0; color: #ff0000; font-size: 21px; margin: 10px 0; padding: 10px 0; text-align: center;'>Sorry no item found in your cart</div>";
			
		?>
	 </div>
</div>