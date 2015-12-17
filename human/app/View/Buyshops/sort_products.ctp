<div id="result_sort">

<?php 	
			
	$i=1;
	
	$arr_space = range(0, 100, 4); // gives 0, 4, 8, 12
	
	foreach($products as $product)
	{
		$product = $product['Produc_master'];
		
		if ($i==1) {
			
			?>
			<div id="result_sort" class="col-md-9">						
			<?php					
		}
		
		?>
		  <div class="grid1_of_4 simpleCart_shelfItem">
				<div class="product_box"><a href="<?php echo $this->webroot.'buyshops/product_details/'.$product['id']; //single.html?>">
				  <div class="view view-fifth">
					
					<?php
						if(isset($product['images']['Default']['imagepath']))
						{
							?>
							<img style="max-width: 190px; max-height: 250px; display:inline" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$product['images']['Default']['imagepath'];?>" class="img-responsive" alt=""/>
							<?php
						}
						else
						{
							?>
							<img style="max-width: 190px; max-height: 250px; display:inline" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$product['images']['all']['imagepath'];?>" class="img-responsive" alt=""/>
							<?php
						}
					?>
						<div class="mask1">
							<div class="info"> </div>
						</div>
					  
				   </div>
					<div class="pro_heading"><strong>
					<?php //echo $product['prodname']; //Duis autem 
                     if(strlen($product['prodname'])<=40)
							  {
								echo $product['prodname'];
							  }
							  else
							  {
								$page_content = substr($product['prodname'],0,40) . '...';
								echo $page_content;
							  }
							  ?>

                    </strong></div>
                    </a>
					<div class="width100 text12_black" style="padding:0 0 7px 0">
					<?php 
					
						echo substr($product['prodscdes'],0,30); //It is a long establishe 
						
					?>
                    </div>
					
					 <div class="size_1">
					 
						<div class="pro_price">
						<strong><?php echo '$'.$product['prodprice']; // $187.95 ?></strong>
						
							<!--<span class="item_price"><?php //echo 'MSRP: $'.$product['prodprice']; // $187.95 ?></span>-->

						<br />
						<?php 
						
						if(isset($product['discount']))
						{
							if($product['discount'] == 0)
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
								echo 'Discount '.$product['discount'].'%'; // $187.95 	
								?>
                                <br />
								<?php echo 'Discounted Price $'.$product['discounted_price']; // $187.95 ?>
                                </div>
								<?php
							}
							
						}
						
						?>
						
					   <!--<select class="item_Size">
						<option value="Small">L</option>
						<option value="Medium">S</option>
						<option value="Large">M</option>	
						<option value="Large">XL</option>	
						</select>-->
						<div class="clearfix"></div>
					  
					  </div>
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

	if(!empty($products))
	   {   
			if($this->Session->check('id_first')== 1)
				$id_first = $this->Session->read('id_first');
			
			echo "<div class='pagination'>";
			$this->Paginator->options['url'] = array('controller' => 'Buyshops', 'action' => 'products/'.$id_first);
			echo @$this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); 
			echo @$this->Paginator->numbers();
			echo @$this->Paginator->next('Next »', null, null, array('class' => 'disabled')); 
			echo '<div>'.$this->Paginator->counter().'</div>';
			echo "<div class='clear'></div>";
			echo "</div>";
		}
	
?>

</div>
</div>