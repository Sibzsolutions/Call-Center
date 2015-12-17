<div id="result_sort" class="col-md-9 w_content">						
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
			
			<?php					
		}
		
		?>
		  <div class="grid1_of_4 simpleCart_shelfItem">
				<div class="product_box">
                <a href="<?php echo $this->webroot.'buyshops/product_details/'.$product['id']; //single.html?>">
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
                     </strong>
                     
                     </div>
                     </a>
					<div class="width100 text12_black" style="padding:0 0 7px 0">
					<?php 
					
						echo substr($product['prodscdes'],0,30); //It is a long establishe 
						
					?>
                    </div>
					
					 <div class="pro_price">
						<?php echo '$'.$product['prodprice']; // $187.95 ?>
                        <br />
                        <div style="float: left; width: 100%; text-align: center; text-transform: none; font-size: 17px;">
                        <?php echo 'Discount '.$product['discount'].'%'; // $187.95 ?>
                        <br />
                        <?php echo 'Discounted Price $'.$product['discounted_price']; // $187.95 ?>
                        </div>
                        
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
							 
							 
							 	<?php 
								
								if($product['add_to_cart'] == 0)
								{				

								?>							 
								
								 <div class="size_2">
                                   <div style="width: 65%; float: left; min-height: 37px;">
									<div class="size_2-left"> 
									   <!--<input type="text" class="item_quantity quantity_1" value="1" />-->
									</div>
									<div id="red_buy_<?php echo $product['id']; ?>">
									<div class="size_2-right">
									
									<a href="<?php echo $this->webroot.'buyshops/product_details/'.$product['id']; ?>"><input type="button" class="cancel_item_add add3" id="cancel_item_add_add3_<?php echo $product['id']; ?>" value="" /></a>
									
									<!-- <input type="button" class="cancel_item_add add3" id="cancel_item_add_add3_<?php echo $product['id']; ?>" value="" /> -->
									
									</div>								 

									<input type="hidden" value="<?php echo $product['id']; ?>" id="product_id_<?php echo $product['id']; ?>" />

									</div>
									<div class="clearfix"> </div>
                                    </div>
								 </div>

								 <?php 
								}
								else
								{
																		
								?>												
                                   <div class="product_cart_box">
                                      <div style="width: 100%; float: left; min-height: 37px;">
                                        <div class="size_2-left"> 
                                           <!--<input type="text" class="item_quantity quantity_1" value="1" />-->
                                        </div>
                                        <div id="green_buy_<?php echo $product['id']; ?>">			 
										
										<a href="<?php echo $this->webroot.'buyshops/product_details/'.$product['id']; ?>"><div class="product_box add32 size_2-right"><input type="button" class="item_add add32" value="" /></div></a>
										
                                        <!--<div class="size_2-right"><input type="button" class="item_add add32" value="" /></div>-->
                                        
										</div>
                                      </div>
                                   </div>
								 
								 <?php 
								}
							 ?>
							 
					 
				 </div>
			</div>
			
			<script>
				
				$(document).ready(function(){
					
					$('#item_add_add3_<?php echo $product['id']; ?>').click(function(){
							
						//var product_id = $('#product_id_<?php echo $product['id']; ?>').val();
						
						$.post("<?=$this->webroot?>buyshops/add_to_cart", {product_id: $('#product_id_<?php echo $product['id']; ?>').val()}, function(result){
							
							$("#cart").html(result);
							
							//$("#red_buy_<?php echo $product['id']; ?>").html('<div id="red_buy"><div class="size_2-right"><input type="button" class="item_add add3"></div>');
							
						});
						
						 if($('#red_buy_<?php echo $product['id']; ?>').css('display')!='none'){
							$('#green_buy_<?php echo $product['id']; ?>').html('<div class="size_2-right"><input type="button" class="item_add add32" value="" /></div>').show().siblings('div').hide();
						 }
						 
						 $("#item_add_add3_<?php echo $product['id']; ?>").addClass("add32");
						
						//$('#red_buy_<?php echo $product['id']; ?>').replaceWith($('#green_buy_<?php echo $product['id']; ?>'));						
					});
				});

				</script>
			
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
	?>
	
	
	<?php	
	
	if($this->Session->check('id_first')== 1)
		$id_first = $this->Session->read('id_first');
	
	if(!empty($products))
	{	
	echo "<div class='pagination'>";
		?>		
        
		<?php $this->paginator->options(array('update' => '#result_sort','before' => $this->Js->get('#spinner')->effect('fadeIn', array('buffer' => false)),'complete' => $this->Js->get('#spinner')->effect('fadeOut', array('buffer' => false))));?>
		<!--Showing Page <?php echo $this->paginator->counter(); ?><br />-->
		<?php echo $this->paginator->prev(); ?> – &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo $this->paginator->numbers(array('separator'=>' | ')); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo $this->paginator->next('Next Page'); ?>
		<?php echo $this->Js->writeBuffer();
		echo "</div>";
	}
	
	/*
	if(!empty($products))
	{   
		echo "<div class='pagination'>";
		$this->Paginator->options['url'] = array('controller' => 'Buyshops', 'action' => 'filter_search_type/'.$id_first);
		echo @$this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); 
		echo @$this->Paginator->numbers();
		echo @$this->Paginator->next('Next »', null, null, array('class' => 'disabled')); 
		echo '<div>'.$this->Paginator->counter().'</div>';
		echo "<div class='clear'></div>";
		echo "</div>";
	}
	*/
	}
	else
	{
		echo "No Products Found For This Category";
	}
	
	?>
	
	</div>
	
	<?php
	
	

	
?>
