<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo $this->webroot.'css/buy_shop/bootstrap.css';?>" rel='stylesheet' type='text/css' />
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
<!-- the jScrollPane script -->
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery.jscrollpane.min.js';?>"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
</script>

<div class="container">
  
  <?=$this->element('filter_side_bar')?>
  
	<div class="col-md-9 w_content">
	    <div class="women">
			<a href="#"><h4>Enthecwear - <span>4449 itemms</span> </h4></a>
			<ul class="w_nav">
						<li>Sort : </li>
		     			<li><a class="active" href="#">popular</a></li> |
		     			<li><a href="#">new </a></li> |
		     			<li><a href="#">discount</a></li> |
		     			<li><a href="#">price: Low High </a></li> 
		     			<div class="clear"></div>	
		     </ul>
		     <div class="clearfix"></div>	
		</div>
		<?php 	
			
			$i=1;
			
			$arr_space = range(0, 100, 4); // gives 0, 4, 8, 12
			
			foreach($products as $product)
			{
				$product = $product['Produc_master'];
				
				if ($i==1) {
					
					?>
					<div class="grids_of_4">						
					<?php
					
					}
					
				?>
						
				  <div class="grid1_of_4 simpleCart_shelfItem">
						<div class="content_box"><a href="<?php echo $this->webroot.'buy_shops/single/'.$product['id']; //single.html?>">
						  <div class="view view-fifth">
							
							<?php
								if(isset($product['images']['Default']['imagepath']))
								{
									?>
									<img src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$product['images']['Default']['imagepath'];?>" class="img-responsive" alt=""/>
									<?php
								}
								else
								{
									?>
									<img src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$product['images']['all']['imagepath'];?>" class="img-responsive" alt=""/>
									<?php
								}
							?>
						  
							 	<div class="mask1">
									<div class="info"> </div>
								</div>
							  </a>
						   </div>
							<h5><a href="<?php echo $this->webroot.'buy_shops/single'; //single.html?>"> <?php echo $product['prodname']; //Duis autem ?></a></h5>
							<h6>
							<?php 
							
								echo substr($product['prodscdes'],0,30); //It is a long establishe 
								
							?></h6>
							 <div class="size_1">
								<span class="item_price"><?php echo $product['prodprice']; // $187.95 ?></span>
							   <select class="item_Size">
								<option value="Small">L</option>
								<option value="Medium">S</option>
								<option value="Large">M</option>	
								<option value="Large">XL</option>	
								</select>
								<div class="clearfix"></div>
							  </div>
							  <div class="size_2">
								<div class="size_2-left"> 
								   <input type="text" class="item_quantity quantity_1" value="1" />
								</div>
								<div class="size_2-right"><input type="button" class="item_add add3" value="" /></div>
								<div class="clearfix"> </div>
							 </div>
						 </div>
					</div>
					<?php
					
					if (in_array($i, $arr_space)) {
						
						?>
						<div class="clearfix"></div>
						</div>
						<div class="grids_of_4">						
						<?php
					}
					
				$i++;
			}		
		?>
		
		<!-- end grids_of_4 -->
	</div>
	
	<!-- start content -->
   <div class="clearfix"></div>
   <!-- end content -->
 </div>
</div>
