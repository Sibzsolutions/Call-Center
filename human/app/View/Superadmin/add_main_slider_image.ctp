<?php 
		
	App::import('Controller', 'Admins');
	$Superadmin = new SuperadminController;
	//$department_id = 4 ; // put here department ID as per your need

?>
<script src="<?php echo $this->webroot."plugins/jQuery/jQuery-2.1.4.min.js"; ?>"></script>
<script>
                        
	$(document).ready(function(){
		
		$('#saved_btn').click(function(){
			
			var cat_type_data = $('#att_select').val();
			
			if(cat_type_data == 'N/A')
			{
				$('#required').html("Please Choose the category");
				return false;			 			
			}
		});
		
		$('#att_select').change(function(){
		
		var cat_type_data = $('#att_select').val();
		
		$.post("<?=$this->webroot?>Admin/product_attribute_change", {
												 cat_id : cat_type_data },
		
												 function(result){ 			 
				$('#att_one').html(result);			 
			});
		});
	});
  
</script>
  
  <?=$this->Form->create('Slider_image', array('role'=>'form', 'enctype'=>'multipart/form-data'));?>
  <div class="box-body form_box">
    <div class="form-group">
      <label for="exampleInputEmail1">Image Heading </label>
      <?=$this->Form->input('heading',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Image Heading'));?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Image Short Description</label>
      <?=$this->Form->input('short_desc',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Image Short Desription'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Image Long Description</label>
      <?=$this->Form->input('long_desc',array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Image Long Description'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Slider Images</label><!-- 'class'=>'form-control', -->
      <?=$this->Form->input('image_path',array('type'=>'file','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Select Slider Images', 'name'=>'data[Slider_image][image]'));?>
    </div>
	
	<div class="form-group" style="clear:both;">
      <label for="exampleInputEmail1">Category</label><!-- 'class'=>'form-control', -->
      <?=$this->Form->input('Category',array('id'=>'category_click','type'=>'checkbox', 'label'=>'','div'=>false));?>
      
      <div class="form-group" id="categories_dropdown_div" style="float:left; width:100%">
      <label for="exampleInputEmail1">Categories</label>
      <?=$this->Form->input('category_id',array('type'=>'select', 'options'=>$categories_dropdown, 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
      
    </div>
	
	<div class="form-group">
      <label for="exampleInputEmail1">Product</label><!-- 'class'=>'form-control', -->
      <?=$this->Form->input('Product',array('id'=>'product_click','type'=>'checkbox','label'=>'','div'=>false));?>
      <div class="form-group" id="products_dropdown_div" style="float:left; width:100%">
      <label for="exampleInputEmail1">Products</label>
      <?=$this->Form->input('product_id',array('type'=>'select', 'options'=>$products_dropdown, 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
    </div>
	
	
	<div class="form-group" style="clear:both">
      <label for="exampleInputEmail1">Priority</label>
		<?=$this->Form->input('picture_order',array('type'=>'select', 'options'=>$count_slider, 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>	
	</div><!-- /.box-body -->
	
	
    <div class="form-group" style="clear:both">
      <label for="exampleInputEmail1">Status</label>
      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(0=>'Active', 1=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
  
  </div><!-- /.box-body -->
  
  <div class="input_box">
    <?=$this->Form->button('Saved',array('id'=>'saved_btn', 'class'=>'login_button'))?>
  </div>
  <?=$this->Form->end()?>
  
<script>

	$(document).ready(function(){
		
		$("#categories_dropdown_div").hide();				
		$("#products_dropdown_div").hide();								
		
		$('#category_click').click(function(){
			
			if($('#category_click').prop("checked") == true)
				$("#categories_dropdown_div").show();					
			else if($('#category_click').prop("checked") == false)
				$("#categories_dropdown_div").hide();				
		});
		
		$('#product_click').click(function(){
			
			if($('#product_click').prop("checked") == true)
				$("#products_dropdown_div").show();						
			else if($('#product_click').prop("checked") == false)
				$("#products_dropdown_div").hide();				
		});		
	});
	
</script>