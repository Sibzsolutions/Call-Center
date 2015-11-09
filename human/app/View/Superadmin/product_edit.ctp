<?php 

	App::import('Controller', 'Admins');
	$Admin = new AdminController;
	//$department_id = 4 ; // put here department ID as per your need
?>
<script src="<?php echo $this->webroot."plugins/jQuery/jQuery-2.1.4.min.js"; ?>"></script>
<script>
                        
	$(document).ready(function(){
		
		$('#att_select').change(function(){
		
		var cat_type_data = $('#att_select').val();
		
		$.post("<?=$this->webroot?>Admin/product_attribute_change_edit", {
												 cat_id : cat_type_data ,
												 product_id : '<?php echo $page_id; ?>'},
		
												 function(result){
 				$('#att_one').html(result);			 
			});
		});
	});

</script>

<!-- form start -->
  <?=$this->Form->create('Produc_master', array('role'=>'form', 'enctype'=>'multipart/form-data'));?>
  <div class="box-body form_box">
    <div class="form-group">
    <label>Parent ID</label>
    <?=$this->Form->input('id',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name', 'value'=>$product_data['id']));?>
    </div>
    
    <div class="form-group">
    <label>Parent Category</label>
    
    <select id="att_select"  name="data[Produc_master][catid]" class="form-control select2" style="width: 100%;">
    <?php
        
        $Admin -> category_tree(0, $product_data['catid']);	
        echo '</select>';
    ?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Product Name</label>
      <?=$this->Form->input('prodname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name', 'value'=>$product_data['prodname']));?>
    </div>
    
    <div id="att_one" class="attribute_box" style="float: left; width: 100%;">
	
	<?php
	  
	foreach($attribute_data as $data)
	{		
	  ?>
	  <div class="form-group" style="width:30%">
	  <label for="exampleInputEmail1"><?php echo $data['Attribute_master']['attname']; ?></label>
	  
      <?php
	  	  
	  foreach($data['Attribute_value'] as $data_att)
	  {
		  $i=0;
		  foreach($product_att_data as $product_select)
		  {
			if($product_select['id'] == $data_att['Attribute_value']['id'])  
			{
			  ?>
                <div class="width100">
              <input  type="checkbox" checked="checked" value="<?php echo $data_att['Attribute_value']['id']; ?>" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][id]" value="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['id']?>][<?php echo $data_att['Attribute_value']['id']; ?>]"/>
              
			  <?php echo $data_att['Attribute_value']['attvalue']; ?>
              <div style="float:right">
              Status
              <select  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][del_status]">
              <?php 
	
				  if($product_select['del_status'] == 1)
				  {
					  ?>
					  <option selected="selected" value="1">Yes</option>
					  <option value="0">No</option>
					  <?php
				  }
				  if($product_select['del_status'] == 0)
				  {
					  ?>
					  <option value="1">Yes</option>
					  <option selected="selected" value="0">No</option>
					  <?php
				  }
				  ?>
                  
		  </select>
          	  </div>

              <div class="width100">
              <input class="form-control" type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][add_cost]" value="<?php echo $product_select['add_cost'] ?>" style="margin-right:5px;"/>
              
              <input class="form-control" type="text"  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][less_cost]" value="<?php echo $product_select['less_cost'] ?>"/>
    		  </div>
              </div>
                        
              <br />
  			  
              <?php
			  
			  $i++;
			  
			  break;
			  
			}
		  }
		  
		  if($i==0)
		  {
			  ?>
              <div class="width100">
			  <input type="checkbox" value="<?php echo $data_att['Attribute_value']['id']; ?>" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][id]" value="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['id']?>][<?php echo $data_att['Attribute_value']['id']; ?>]"/>
			  
			  <?php echo $data_att['Attribute_value']['attvalue']; ?>
			  <div style="float:right">
              Status
              <select  name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][del_status]">
              <?php 
	
				  if($product_select['del_status'] == 1)
				  {
					  ?>
					  <option selected="selected" value="1">Yes</option>
					  <option value="0">No</option>
					  <?php
				  }
				  if($product_select['del_status'] == 0)
				  {
					  ?>
					  <option value="1">Yes</option>
					  <option selected="selected" value="0">No</option>
					  <?php
				  }
				  ?>
                  </select>
                 
              </div>
               <div class="width100">
			  <input type="text" class="form-control" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][add_cost]" style="margin-right:5px;"/>
			  
			  <input type="text" class="form-control" name="data[Produc_master][attribute][<?php echo $data_att['Attribute_value']['attvalue']?>][less_cost]"/>
              </div>
			  
              </div>
			  <br />
			  
			  <?php
		  }
	  }
	  ?>

      </div>
	  <?php
    }
	?>
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
	  <?=$this->Form->input('clearance',array('type'=>'select', 'options'=>array(1=>'Yes', 0=>'No'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    <?php //echo $this->Form->input('clearance',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Clearance'));?>
      <?php //echo $this->Form->input('clearance',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Clearance', 'value'=>$product_data['clearance']));?>
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
  <div class="input_box">
    <?=$this->Form->button('Saved',array('class'=>'login_button'))?>
  </div>
  <?=$this->Form->end()?>
