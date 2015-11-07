<?php 	
			
	$i=1;
	
	$arr_space = range(0, 100, 4); // gives 0, 4, 8, 12
	
	if(isset($products))
	{
	
	foreach($products as $product)
	{
		$product = $product['Produc_master'];
		
		if ($i==1) {
			
			?>
			<div id="result_sort" class="grids_of_4">						
			<?php					
		}
		
		?>
		  <div class="grid1_of_4 simpleCart_shelfItem">
				<div class="content_box"><a href="<?php echo $this->webroot.'buy_shops/product_details/'.$product['id']; //single.html?>">
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
					<h5><a href="<?php echo $this->webroot.'buy_shops/product_details/'.$product['id']; //single.html?>"> <?php echo $product['prodname']; //Duis autem ?></a></h5>
					<h6>
					<?php 
					
						echo substr($product['prodscdes'],0,30); //It is a long establishe 
						
					?></h6>
					
					 <div class="size_1">
								<span class="item_price"><?php echo $product['prodprice']; // $187.95 ?></span>
							   <!--<select class="item_Size">
								<option value="Small">L</option>
								<option value="Medium">S</option>
								<option value="Large">M</option>	
								<option value="Large">XL</option>	
								</select>-->
								<div class="clearfix"></div>
							  </div>
							  <!--<div class="size_2">
								<div class="size_2-left"> 
								   <input type="text" class="item_quantity quantity_1" value="1" />
								</div>
								<div class="size_2-right"><input type="button" class="item_add add3" id="item_add_add3_<?php //echo $product['id']; ?>" value="" />
								<input type="hidden" value="<?php //echo $product['id']; ?>" id="product_id_<?php //echo $product['id']; ?>" />
								</div>
								<div class="clearfix"> </div>
							 </div>-->
							 
					 
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
		
		?>
		
		<script>
		
		$(document).ready(function(){
			
			$('#item_add_add3_<?php echo $product['id']; ?>').click(function(){
					
				//var product_id = $('#product_id_<?php echo $product['id']; ?>').val();
				
				$.post("<?=$this->webroot?>buyshops/add_to_cart", {product_id: $('#product_id_<?php echo $product['id']; ?>').val()}, function(result){
				
					$("#cart").html(result);
				});
			});
		});

		</script>
		
		<?php				
	}
		echo $this->element('pagination_view');
	}
	else
	{
			echo "No Products Found For This Category";
	}
	
?>
</div>