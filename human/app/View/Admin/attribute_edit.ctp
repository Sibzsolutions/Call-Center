<?php 

	
	App::import('Controller', 'Admins');
	$Admin = new AdminController;
?>
<!-- form start -->
  <?=$this->Form->create('Attribute_master', array('role'=>'form', 'enctype'=>'multipart/form-data'));?>
  <div class="box-body">
  
    <?=$this->Form->input('id',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name', 'value'=>$attribute_data['Attribute_master']['id']));?>
    
    <div class="form-group">
    <label>Parent Category</label>
    
    <select name="data[Attribute_master][catid]" class="form-control select2" style="width: 100%;">
    <?php
        
        $Admin -> category_tree(0, $attribute_data['Attribute_category']['catid']);	
        echo '</select>';
        //$this->Form->input('catname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name'));		
        
    ?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Attribute Name</label>
      <?=$this->Form->input('attname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name', 'value'=>$attribute_data['Attribute_master']['attname']));?>
    </div>        
    <div class="form-group">
      <label for="exampleInputEmail1">Attribute Description</label>
      <?=$this->Form->input('attdesc',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Title', 'value'=>$attribute_data['Attribute_master']['attdesc']));?>
    </div>
     <div class="form-group">
      <label for="exampleInputEmail1">Is Main</label>
      <?=$this->Form->input('is_main',array('type'=>'select', 'options'=>array(1=>'Yes', 0=>'No'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
	<div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(1=>'Active', 0=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false, 'value'=>$attribute_data['Attribute_master']['del_status']));?>
    </div>
  </div><!-- /.box-body -->
  <div class="box-footer">
    <?=$this->Form->button('Saved',array('class'=>'btn btn-primary'))?>
  </div>
  <?=$this->Form->end()?>