<div class="grid images_3_of_2" id="product_image_data" style="font-size:12px">
	
	<ul id="etalage" style="display:block;">
		
		<?php 

		foreach($color_images_data as $image)
		{
			$image = $image['Produc_color_image']['image_path'];
			
			?>
			<li>
				<a href="optionallink.html">
					<img class="etalage_thumb_image" style="display:block;height:121px;float:left;width:91px;" src="<?php echo $this->webroot.'img/product/thumb/small_images/'.$image; ?>" class="img-responsive" />
					<img class="etalage_source_image" style="display:block;height:400px;width:300px;float:left;" src="<?php echo $this->webroot.'img/product/thumb/large_images/'.$image; ?>" class="img-responsive" title="" />
				</a>
			</li>
			
			<?php
		}									
		?>
	</ul>
	
	<div class="clearfix"></div>		
	
</div>
	
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