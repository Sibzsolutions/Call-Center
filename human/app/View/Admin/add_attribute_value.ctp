<?php 
	
	App::import('Controller', 'Admins');
	$Admin = new AdminController;
?>
  <?=$this->Form->create('Attribute_value', array('role'=>'form', 'enctype'=>'multipart/form-data'));?>
  <div class="box-body">    
    <div class="form-group">
    <label>Parent Category</label>
    <select name="data[Attribute_value][attid]" class="form-control select2" style="width: 100%;" multiple="multiple">
    <?php    
    $Admin -> attribute_tree(0);	
    echo '</select>';
    //$this->Form->input('catname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name'));		        
    ?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Attribute Value Name</label>
      <?=$this->Form->input('attvalue',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Attribute Name'));?>
    </div>        
    <div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(1=>'Active', 0=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
    
  </div><!-- /.box-body -->
  <div class="box-footer">
    <?=$this->Form->button('Saved',array('class'=>'btn btn-primary'))?>
  </div>
  <?=$this->Form->end()?>