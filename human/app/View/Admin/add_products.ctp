<?php 
		
	App::import('Controller', 'Admins');
	$Admin = new AdminController;
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
  <?=$this->Form->create('Produc_master', array('role'=>'form', 'enctype'=>'multipart/form-data'));?>
  <div class="box-body">
    <div class="form-group">
    <label>Parent Category</label>
    <select  id="att_select" name="data[Produc_master][catid]" class="form-control select2" style="width: 100%;">
    <option value="N/A">Choose Parent Category</option>
	<?php
    
    $Admin -> category_tree(0, 0);	
    echo '</select>';
    //$this->Form->input('catname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name'));		
        
    ?>
    </div>
    <div id="required">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Product Name</label>
      <?=$this->Form->input('prodname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Product Name'));?>
    </div>
    
    <div id="att_one">
	<?php
	foreach($attribute_data as $data)
	{
	  ?>
	  <div class="form-group">
	  <label for="exampleInputEmail1"><?php echo $data['Attribute_master']['attname']; ?></label>
	  
      <!--<select multiple="multiple" class="form-control" name="data[Produc_master][attribute][]">-->
	  <?php
	  foreach($data['Attribute_value'] as $data_att)
	  {
		  ?>
          <input type="checkbox" value="<?php echo $data_att['Attribute_value']['id']; ?>" name="data[Produc_master][attribute]["<?php echo $data_att['Attribute_value']['attvalue']?>"][]"/>
          <?php echo $data_att['Attribute_value']['attvalue']; ?>
          
          <input type="text"  name="data[Produc_master][attribute]["<?php echo $data_att['Attribute_value']['attvalue']?>"][]"/>
          
          <br />
		  <!--<option value="<?php //echo $data_att['Attribute_value']['id']; ?>"><?php //echo $data_att['Attribute_value']['attvalue'][]; ?></option>-->
		  <?php
	  }
	  ?>
	  </select>
      
      
      
	  </div>
	  <?php
    }
	?>
    </div>
    
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
      <?=$this->Form->input('prodscdes',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Short Desription'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Product Long Description</label>
      <?=$this->Form->input('proddesc',array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Logn Description'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Product Images</label><!-- 'class'=>'form-control', -->
      <?=$this->Form->input('prodimg',array('type'=>'file','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Select Product Images', 'multiple', 'name'=>'data[Produc_master][catimg][]'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Product Price</label>
      <?=$this->Form->input('prodprice',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Product Price'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Clearance</label>
            <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(0=>'Yes', 1=>'No'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
      <?php //echo $this->Form->input('clearance',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Clearance'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Url Alias</label>
      <?=$this->Form->input('url_alias',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Url Alias'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Meta Title</label>
      <?=$this->Form->input('prodmtitle',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Title'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Meta Keywords</label>
      <?=$this->Form->input('prodmkeywords',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Kaywords'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Meta Description</label>
      <?=$this->Form->input('prodmdesc',array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Decription'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Canonnical Url</label>
      <?=$this->Form->input('prodcanonical',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Canonnical Url'));?>
    </div>
    <!--<div class="form-group">
    <label for="exampleInputEmail1">Page Content</label>
    <?php //echo $this->Form->input('page_content',array('type'=>'textarea', 'id'=>'editor1', 'name'=>'editor1', 'rows'=>'10', 'cols'=>'80', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Content'));?>
    </div>-->
    <div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(0=>'Active', 1=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
  </div><!-- /.box-body -->
  <div class="box-footer">
    <?=$this->Form->button('Saved',array('id'=>'saved_btn', 'class'=>'btn btn-primary'))?>
  </div>
  <?=$this->Form->end()?>