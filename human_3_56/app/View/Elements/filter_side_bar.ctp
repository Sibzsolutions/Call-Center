<?php ?>

<link rel="stylesheet" href="<?php echo $this->webroot.'css/home_slider/normalize.css';?>" />
<link rel="stylesheet" href="<?php echo $this->webroot.'css/home_slider/ion.rangeSlider.css';?>" />
<link rel="stylesheet" href="<?php echo $this->webroot.'css/home_slider/ion.rangeSlider.skinFlat.css';?>" />

<script src="<?php echo $this->webroot.'js/home_slider/ion.rangeSlider.js';?>"></script>
<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/home_slider/templatemo_style.css" type="text/css" media="screen" />

<div class="women_main">
<!-- start sidebar -->
	<div class="col-md-3">
	  <div class="w_sidebar">
		<div class="w_nav1">
			<h4>All</h4>
			<ul>
				<li><a href="women.html">women</a></li>
				<li><a href="#">new arrivals</a></li>
				<li><a href="#">trends</a></li>
				<li><a href="#">boys</a></li>
				<li><a href="#">girls</a></li>
				<li><a href="#">sale</a></li>
			</ul>	
		</div>
		<h3>filter by</h3>
		
		<?php 
		
		foreach($category_att as $cat_filter)
		{
			?>
			
			<section  class="sky-form">
			<h4><?php echo $cat_filter['Attribute_category']['Attribute_master']['attname']; ?></h4>
			<div class="row1 scroll-pane">
			<!--<div class="col col-4">
				<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
			</div>-->
			<?php
			foreach($cat_filter['Attribute_category']['Attribute_master']['Attribute_Values'] as $att_element)
			{
				
				
				$att_element = $att_element['Attribute_value'];
				
				?>

				
				
				
				<div class="col col-4">
					<label class="checkbox">
					<input type="checkbox" id="checkbox_<?php echo $att_element['id'].'_'.$att_element['attid']; ?>" checked="" value = "<?php echo $att_element['id']; ?>"><i></i><?php echo $att_element['attvalue']; ?></label>
				</div>
				
				
				<script>
					  
					$(document).ready(function(){
							
						alert("shashikant");
						
						$( "#checkbox_<?php echo $att_element['id'].'_'.$att_element['attid']; ?>" ).click(function() {
							
							if($(this).is(":checked"))
							{
								var type = 'checkbox_<?php echo $att_element['id'].'_'.$att_element['attid']; ?>';
								
								$.post("<?php echo $this->webroot; ?>Buyshops/filter_search_type/",
								{type:type,checked:1},
								function(data,status){
								
									$("#result").html(data);																
								});									
							}
							else
							{
								/*
								var car_type = type = 'car_type_text_<?php echo $i; ?>';
								
								var type = $('#car_type_text_<?php echo $i; ?>').val();
								
								var id_data_first=$(this).attr('id');					
								$.post("<?php echo $this->webroot; ?>Grt/car_type/",
								{type:type,checked:0,car_type:car_type},
								function(data,status){
								
								$("#result").html(data);
								
								});
								*/									
							}
						});							
					});
					  
				</script>
								
				
				
				
				<?php 
			}
			?>
			</div>
			</section>
			<?php
		}
	
		?>
		
		<section  class="sky-form">

					<h4>Price</h4>
						<div class="row1 scroll-pane">
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

								min: 100,
								max: 10000,
								from: 500,
								
								onFinish: function (data) {
									
									$.post("<?php echo $this->webroot; ?>Grt/rating_search_one",
									{length_min:data.from,length_max:data.to},
									function(data,status){
										$('#one_form').html(data);
									});
								},
							});
						});

						</script>

							</div>
						</div>

		</section>
	  </div>
   </div>
   
   <div id="result">
   </div>