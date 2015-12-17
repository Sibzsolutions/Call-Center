<?php 
	
	App::import('Controller', 'Admins');
	$Superadmin = new AdminController;
?>
  <?=$this->Form->create('Attribute_value', array('role'=>'form', 'enctype'=>'multipart/form-data'));?>
  <div class="box-body form_box">    
    <div class="form-group">
    <label>Parent Category</label>
    <select name="data[Attribute_value][attid]" class="form-control select2" style="width: 100%;" multiple="multiple">
    <?php    
    $Superadmin -> attribute_tree(0, $id);	
    echo '</select>';
    //$this->Form->input('catname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name'));		        
    ?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Attribute Value Name</label>
      <?=$this->Form->input('attvalue',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Attribute Name'));?>
    </div>        
	
	<div class="form-group" style="clear:both; float:left;">
      <label for="exampleInputEmail1">Attribute Image</label>
      <?=$this->Form->input('att_value_img',array('type'=>'file', 'label'=>'','div'=>false,  'placeholder'=>'Enter Attribute Image', 'multiple'));//, 'name'=>'data[Category][catimg][]?>
    </div>
	
    <div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(0=>'Active', 1=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
    
  </div><!-- /.box-body -->
  <div class="input_box">
    <?=$this->Form->button('Saved',array('class'=>'login_button'))?>
  </div>
  <?=$this->Form->end()?>