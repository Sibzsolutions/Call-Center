<?php 
	App::import('Controller', 'Admins');
	$Admin = new AdminController;
	//$department_id = 4 ; // put here department ID as per your need
?>
<script src="<?php echo $this->webroot."plugins/jQuery/jQuery-2.1.4.min.js"; ?>"></script>
<script>
                        
	$(document).ready(function(){
		
		$('#shashi_select').change(function(){
		
		var cat_type_data = $('#shashi_select').val();
		
		$.post("<?=$this->webroot?>Admin/product_attribute_change", {
												 cat_id : cat_type_data },
		
												 function(result){
 			 
				$('#shashi_one').html(result);			 
			});
		});
	});

</script>

<!-- form start -->
  <?=$this->Form->create('Produc_master', array('role'=>'form', 'enctype'=>'multipart/form-data'));?>
  <div class="box-body">
  
    <?=$this->Form->input('id',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name', 'value'=>$product_data['id']));?>
    
    <div class="form-group">
    <label>Parent Category</label>
    
    <select id="shashi_select"  name="data[Produc_master][catid]" class="form-control select2" style="width: 100%;">
    <?php
        
        $Admin -> category_tree(0, $product_data['catid']);	
        echo '</select>';
        //$this->Form->input('catname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name'));		
        
    ?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Product Name</label>
      <?=$this->Form->input('prodname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name', 'value'=>$product_data['prodname']));?>
    </div>
    
    <div id="shashi_one">
	<?php
	foreach($attribute_data as $data)
	{
	  ?>
	  <div class="form-group">
	  <label for="exampleInputEmail1"><?php echo $data['Attribute_master']['attname']; ?></label>
	  <select multiple="multiple" class="form-control" name="data[Produc_master][attribute][]">
	  <?php
	  foreach($data['Attribute_value'] as $data_att)
	  {
		  $i=0;
		  foreach($product_att_data as $data_select)
	  	  {
			  if($data_select == $data_att['Attribute_value']['id'])
			  {
				  $i++;
				  ?>
				  <option selected="selected" value="<?php echo $data_att['Attribute_value']['id']; ?>"><?php echo $data_att['Attribute_value']['attvalue']; ?></option>
				  <?php  
				  break;
			  }
	  	  }		  
		  if($i==0)
		  {
		  ?>
		  <option value="<?php echo $data_att['Attribute_value']['id']; ?>"><?php echo $data_att['Attribute_value']['attvalue']; ?></option>
		  <?php
		  }
	  }
	  ?>
	  </select>
	  </div>    	
	  <?php
    }
    ?>
    </div>
    
    <?php
	/*
	foreach($attribute_data as $data)
	{
	  ?>
	  <div class="form-group">
      <label for="exampleInputEmail1"><?php echo $data['Attribute_master']['attname']; ?></label>
	  <select multiple="multiple" class="form-control" name="data[Produc_master][attribute][]">
      <?php
	  foreach($data['Attribute_value'] as $data_att)
	  {
		  $i=0;
		  foreach($product_att_data as $att)
		  {
			  if($att == $data_att['Attribute_value']['id'])
			  {
				  ?>
          	  	  <option selected="selected" value="<?php echo $data_att['Attribute_value']['id']; ?>"><?php echo $data_att['Attribute_value']['attvalue']; ?></option>              
			  
			  	  <?php
				  $i++;
				  break;
			  }
		  }
		  if($i==0)
		  {		  
			  ?>
			  <option value="<?php echo $data_att['Attribute_value']['id']; ?>"><?php echo $data_att['Attribute_value']['attvalue']; ?></option>
			  <?php
		  }
	  }
	  ?>
      </select>
      </div>    	
	<?php
    }
	*/
    ?>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Add Cost</label>
      <?=$this->Form->input('add_cost',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Additional Cost'));?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Less Cost</label>
      <?=$this->Form->input('less_cost',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Less Cost'));?>
    </div>
            
    <div class="form-group">
      <label for="exampleInputEmail1">Product Short Description</label>
      <?=$this->Form->input('prodscdes',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Title', 'value'=>$product_data['prodscdes']));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Product Long Description</label>
      <?=$this->Form->input('proddesc',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Title', 'value'=>$product_data['proddesc']));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Product Price</label>
      <?=$this->Form->input('prodprice',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Title', 'value'=>$product_data['prodprice']));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Clearance</label>
      <?=$this->Form->input('clearance',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Clearance', 'value'=>$product_data['clearance']));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Images</label>
      <?=$this->Form->input('produc_images',array('type'=>'file','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Images', 'multiple', 'name'=>'data[Produc_master][produc_images][]'));?>
    </div>
     <div class="form-group">
      <label for="exampleInputEmail1">Url Alias</label>
      <?=$this->Form->input('urlalias',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Url Alias', 'value'=>$product_data['url_alias']));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Meta Title</label>
      <?=$this->Form->input('prodmtitle',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Title', 'value'=>$product_data['prodmtitle']));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Meta Keywords</label>
      <?=$this->Form->input('prodmkeywords',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Kaywords', 'value'=>$product_data['prodmkeywords']));?>
    </div>                
    <div class="form-group">
      <label for="exampleInputEmail1">Meta Description</label>
      <?=$this->Form->input('prodmdesc',array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Decription', 'value'=>$product_data['prodmdesc']));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Canonnical Url</label>
      <?=$this->Form->input('prodcanonical',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Canonnical Url', 'value'=>$product_data['prodmkeywords']));?>
    </div>
    <!--<div class="form-group">
    <label for="exampleInputEmail1">Page Content</label>
    <?php //echo $this->Form->input('page_content',array('type'=>'textarea', 'id'=>'editor1', 'name'=>'editor1', 'rows'=>'10', 'cols'=>'80', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Content'));?>
    </div>-->
    <div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(0=>'Active', 1=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false, 'value'=>$product_data['del_status']));?>
    </div>
  </div><!-- /.box-body -->
  <div class="box-footer">
    <?=$this->Form->button('Saved',array('class'=>'btn btn-primary'))?>
  </div>
  <?=$this->Form->end()?>
