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

	<div class="width1220">
    <div id="slider1">
      <div class="women" style="float:left; width:100%; margin:10px 0 10px 0">
			<a href="#"><h4>Featured Product<span></span> </h4></a>
			
		     	
		</div>
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
						<a class="pro_heading" href="<?php echo $this->webroot.'buyshops/product_details/'.$product['Produc_master']['id']; //single.html?>"> 
						<span><img style="max-width: 200px; max-height: 230px; display:inline" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$product['Produc_master']['images']['Default']['imagepath'];?>" class="img-responsive" alt=""/></span>
						<?php
					}
					else
					{
						?>
						<li>
						<a class="pro_heading" href="<?php echo $this->webroot.'buyshops/product_details/'.$product['Produc_master']['id']; //single.html?>"> 
						<span><img style="max-width: 200px; max-height: 230px; display:inline" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$product['Produc_master']['images']['all']['imagepath'];?>" class="img-responsive" alt=""/></span>
						<?php
					}
					?>
					<div class="pro_heading">
					<strong>
					
					<?php 
					
					  if(strlen($product['Produc_master']['prodname'])<=40)
					  {
						echo $product['Produc_master']['prodname'];
					  }
					  else
					  {
						$page_content = substr($product['Produc_master']['prodname'],0,40) . '...';
						echo $page_content;
					  }
					
					?>
					
					</strong></div>
					<div class="pro_price">
					<?php 
					
					  /*
					  
					  if(strlen($product['Produc_master']['prodprice'])<=40)
					  {
						echo "$".$product['Produc_master']['prodprice'];
					  }
					  else
					  {
						$page_content = substr($product['Produc_master']['prodprice'],0,40) . '...';
						echo "$".$page_content;
					  }
					  
					  */
						
						echo "$".$product['Produc_master']['prodprice'];
					  
						if(isset($product['Produc_master']['discount']))
						{
							if($product['Produc_master']['discount'] == 0)
							{
								?>
								<strong style="color:#f18c00">
								<?php
								echo '<br>Discount N/A';
								?>
								</strong>
								<?php
							}
							else
							{
								?>
								<div style="float: left; width: 100%; text-align: center; text-transform: none; font-size: 17px;">
								<?php
								echo 'Discount '.$product['Produc_master']['discount'].'%'; // $187.95 	

								echo '<br>Discounted Price $'.$product['Produc_master']['discounted_price']; // $187.95 ?>
                                </div>
								<?php
							}									
						}								
					?>
					</div>
					<?php 
						if(isset($product['Produc_master']['prodscdesc']))
						{
													  
					  if(strlen($product['Produc_master']['prodscdesc'])<=40)
					  {
						echo $product['Produc_master']['prodscdesc'];
					  }
					  else
					  {
						$page_content = substr($product['Produc_master']['prodscdesc'],0,40) . '...';
						echo $page_content;
					  }
						}
					
					?>
					</a>
					</li>
				<?php
				}
				?>
				
				<!--<li><img src="<?php //echo $this->webroot.'img/footer_slider/picture6.jpg';?>" /></li>
				<li><img src="<?php //echo $this->webroot.'img/footer_slider/picture1.jpg';?>" /></li>-->
				
			</ul>
		</div>
		<a class="buttons next" href="#">&#62;</a>
	</div>
    </div>