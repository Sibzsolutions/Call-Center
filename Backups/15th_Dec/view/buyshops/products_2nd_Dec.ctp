<?php ?>
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

<div>
  
<?php //echo $this->element('filter_side_bar'); ?>
  
<link rel="stylesheet" href="<?php echo $this->webroot.'css/home_slider/normalize.css';?>" />
<link rel="stylesheet" href="<?php echo $this->webroot.'css/home_slider/ion.rangeSlider.css';?>" />
<link rel="stylesheet" href="<?php echo $this->webroot.'css/home_slider/ion.rangeSlider.skinFlat.css';?>" />

<script src="<?php echo $this->webroot.'js/home_slider/ion.rangeSlider.js';?>"></script>
<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/home_slider/templatemo_style.css" type="text/css" media="screen" />


<!-- <div class="width1220">  
      <div class="inner_heading" style="padding: 0px">
        <div class="refine_box">
		
          <div class="refine_heading">Refine Your Search</div>
          
		  <div class="width100">
            <a href="#">Basic Color</a>
          </div>
          <div class="width100">
            <a href="#">Number of Colors Available</a>
          </div>
          <div class="width100">
            <a href="#">MSRP Price Range</a>
          </div>
          <div class="width100">
            <a href="#">Shop by Size</a>
          </div>
          <div class="width100">
            <a href="#">Fabric Features</a>
          </div>
          <div class="width100">
            <a href="#">Product Features </a>
          </div>
		  
        </div>
        
      </div>
    </div>-->

<div class="width1220">
<div class="refine_box" style="">
	
		<!-- start sidebar -->
		
		<!--<div class="width100">
				<div class="refine_heading">All</div>
				<div class="width100"><a href="women.html">women</a></div>
				<div class="width100"><a href="#">new arrivals</a></div>
				<div class="width100"><a href="#">trends</a></div>
				<div class="width100"><a href="#">boys</a></div>
				<div class="width100"><a href="#">girls</a></div>
				<div class="width100"><a href="#">sale</a></div>
		
		</div>-->

		<?php 
		
		if(isset($category_att) !='')
		{
		
		$end_arr = end($category_att);         // move the internal pointer to the end of the array
		
		if($end_arr!='')
		$end_key = key($end_arr);
		$i=0;
		foreach($category_att as $key=>$cat_filter)
		{
			if($i==0)
			echo '<div class="refine_heading">filter by</div>';
		
			$i++;
			
			if($key== $end_key)
			{
			
			?>
			<section  class="sky-form" style="float:left; width:100%">

			<div class="left_heading">Price</div>
			<div class="width100">
				<div class="col col-4">

			<div id="ranged-value" style="margin: 1px 6px; width: 95%;"></div>

			<div class="packages_slider">
				<input type="text" id="range" value="" name="range" />
			</div>

			</div>
			
			<script>
			
			$(function () {

				$("#range").ionRangeSlider({
					type: 'double',
					//step: 4,
					//from: 500,

					min: 0,
					max: 1000,

					onFinish: function (data) {
						
						$.post("<?php echo $this->webroot; ?>Buyshops/filter_search_type",
						{length_min:data.from,length_max:data.to},
						function(data,status){
							$('#result_sort').html(data);
						});
					},
				});
			});

			</script>

				</div>
		</section>
				<?php
			}
			?>
			
			<div class="width100 filter_box">
			<div class="left_heading"><?php echo $cat_filter['Attribute_category']['Attribute_master']['attname']; ?></div>
			<div class="width100 filter_list_box">
			<!--<div class="col col-4">
				<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
			</div>-->

			<?php

			foreach($cat_filter['Attribute_category']['Attribute_master']['Attribute_Values'] as $att_element)
			{
				$att_element = $att_element['Attribute_value'];
				
				if($this->Session->check('id_first') == 1)
				{
					$id_first = $this->Session->read('id_first');
				}
				
				?>
				
				<div class="col col-4 filter_list">
					<label class="checkbox"><!--checked="" -->
					<input type="checkbox" id="checkbox_<?php echo $att_element['id'].'_'.$att_element['attid']; ?>" value = "<?php echo $att_element['id']; ?>"><i></i><?php echo $att_element['attvalue']; ?></label>
				</div>
				
				<script>
					  
					$(document).ready(function(){
							
						$( "#checkbox_<?php echo $att_element['id'].'_'.$att_element['attid']; ?>" ).click(function() {
							
							if($(this).is(":checked"))
							{
								var type = 'checkbox_<?php echo $att_element['id'].'_'.$id_first.'_'.$att_element['attid']; ?>';
								
								$.post("<?php echo $this->webroot; ?>Buyshops/filter_search_type/",
								{type:type,checked:1},
								function(data,status){
									
									$("#result_sort").html(data);																
								});									
							}
							else
							{
								var type = 'checkbox_<?php echo $att_element['id'].'_'.$id_first.'_'.$att_element['attid']; ?>';
								
								$.post("<?php echo $this->webroot; ?>Buyshops/filter_search_type/",
								{type:type,checked:0},
								function(data,status){
								
									$("#result_sort").html(data);																
								});									
							}
						});							
					});
					  
				</script>
								
				<?php 
			}

			?>
			
			</div>
			</div>
			
			<?php
			
			}
		}
		?>
		
   </div>
   <div class="inner_banner2"><img src="<?php echo $this->webroot.'img/only_human_userside/inner_banner.jpg';?>" /></div>
	<div class="col-md-9 w_content">
	    <div class="women">
			<a href="#"><h4>
			
			<?php echo $catname; //Enthecwear -  ?>
			<span><?php //echo count($products).' ';itemms ?></span> </h4></a>
			<ul class="w_nav">
			<li>Sort : </li>
			
			<!-- 
			<li class="alphabeticle_list_products" id="1"><a class="active" href="#">alphabeticle</a></li> |
			<li class="new_list_products" id="2"><a href="#">new </a></li> |
			<li class="high_to_low_list_products" id="3"><a href="#">price:High Low</a></li> |
			<li class="low_to_high_list_products" id="4"><a href="#" class="">price: Low High </a></li> 
			-->
			
			<li class="alphabeticle_list_products" id="1">alphabeticle</li> |
			<li class="new_list_products" id="2">new</li> |
			<li class="high_to_low_list_products" id="3">price:High Low</li> |
			<li class="low_to_high_list_products" id="4">price: Low High</li> 
			
			<script>

			$(document).ready(function(){
				
				$('.alphabeticle_list_products').click(function(){
					
					var id = $(this).attr('id');
					
					$.post("<?php echo $this->webroot?>buyshops/sort_products", {type_id:id}, function(result){
						
						$("#result_sort").html(result);
					});								
				});
				
				$('.new_list_products').click(function(){
					
					var id = $(this).attr('id');
				
					$.post("<?php echo $this->webroot?>buyshops/sort_products", {type_id:id}, function(result){
							
						$("#result_sort").html(result);
					});								
				});
				
				$('.high_to_low_list_products').click(function(){
					
					var id = $(this).attr('id');
				
					$.post("<?php echo $this->webroot?>buyshops/sort_products", {type_id:id}, function(result){
							
						$("#result_sort").html(result);
					});								
				});
				
				$('.low_to_high_list_products').click(function(){
					
					var id = $(this).attr('id');
				
					$.post("<?php echo $this->webroot?>buyshops/sort_products", {type_id:id}, function(result){
							
						$(result_sort).html(result);
					});																
				});
				
			});

			</script>

			<div class="clear"></div>	
		     </ul>
		     <div class="clearfix"></div>	
		</div>
		<div id="result_sort">
		<?php 	
			
			$i=1;
			
			$arr_space = range(0, 100, 4); // gives 0, 4, 8, 12
			
			foreach($products as $product)
			{
				if(isset($product['id']))
				{
					?>
					<a class="pro_heading" href="<?php echo $this->webroot.'buyshops/product_details/'.$product['id']; //single.html?>"> 
					<?php
				}
				
				$product = $product['Produc_master'];
				
				if ($i==1) {
					
					?>
					<div class="grids_of_4">						
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
									<img style="max-width: 190px; max-height: 250px;" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$product['images']['Default']['imagepath'];?>" class="img-responsive" alt=""/>
									<?php
								}
								else
								{
									?>
									<img style="max-width: 190px; max-height: 250px;" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$product['images']['all']['imagepath'];?>" class="img-responsive" alt=""/>
									<?php
								}
							?>
							 	<div class="mask1">
									<div class="info"> </div>
								</div>
							  
						   </div>
							
							<strong>
							
							<?php 
							
							//echo $product['prodname']; //Duis autem 

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
							
							</strong></a>
							<div class="width100 text12_black" style="padding:0 0 7px 0">
							<?php 
							
								echo substr($product['prodscdes'],0,30); //It is a long establishe 
								
							?></div>
							
							 <div class="pro_price">
							 
								<strong><?php echo '$'.$product['prodprice']; // $187.95 ?></strong>
								<br>
								<?php 
								
								if(isset($product['discount']))
								{
									?>
									<strong>
									<?php
									echo 'Discount '.$product['discount'].'%'; // $187.95 	
									?>
									</strong>
									<br>
									<br>
									<strong><?php echo 'Discounted Price $'.$product['discounted_price']; // $187.95 ?></strong>
									<?php
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
							  
							 <?php 
								
								if($product['add_to_cart'] == 0)
								{								
								?>							 
								
								 <div class="size_2">
                                   <div style="width: 100%; float: left; min-height: 37px;">
									<div class="size_2-left"> 
									   <!--<input type="text" class="item_quantity quantity_1" value="1" />-->
									</div>
									<div id="red_buy_<?php echo $product['id']; ?>">
									<div class="size_2-right"><input type="button" class="item_add add3" id="item_add_add3_<?php echo $product['id']; ?>" value="" />
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
                                        <div class="size_2-right"><input type="button" class="item_add add32" value="" /></div>
                                        </div>
                                      </div>
                                   </div>
								 </div>
								 <?php 
								}
							 ?>							 
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
				</a>
			<?php

			}		

			if(!empty($products))
			{   
				echo "<div class='pagination'>";
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

		<!-- end grids_of_4 -->
	</div>
</div>	  

  </div>
  
  <!-- start content -->
   <div class="clearfix"></div>
   <!-- end content -->
 </div>

 <?php echo $this->element('featured_slider'); ?>