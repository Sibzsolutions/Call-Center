<?php 
	App::import('Controller', 'Admins');
	$Superadmin = new SuperadminController;
	//$department_id = 4 ; // put here department ID as per your need
?>

  <?=$this->Form->create('Category', array('role'=>'form', 'enctype'=>'multipart/form-data'));?>
  <div class="box-body form_box">
    <div class="form-group">
    <label>Parent Category</label>
    <select name="data[Category][parentid]" class="form-control select2" style="width: 100%;">
    <option value="0">Main
    </option>
    <?php
		
		$Superadmin -> category_tree(0);	
		echo '</select>';
		//$this->Form->input('catname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name'));		
		
	?>
    </div><!-- /.form-group -->
	
    <div class="form-group">
      <label for="exampleInputEmail1">Category Name</label>
      <?=$this->Form->input('catname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Category Name'));?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Category Description</label>
      <?=$this->Form->input('catdesc',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Category Description'));?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Attributes</label>
      
      <?php 
	  
	  if(isset($att_data))
	  echo $this->Form->input('status',array('type'=>'select', 'options'=>$att_data, 'class'=>'form-control', 'label'=>'','div'=>false, 'multiple'=>'multiple', 'name'=>'data[Category][att]'));?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Category Images</label>
      <?=$this->Form->input('catimg',array('type'=>'file','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Keywords', 'multiple'));//, 'name'=>'data[Category][catimg][]?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">url alias</label>
      <?=$this->Form->input('url_alias',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Description'));?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Meta Title</label>
      <?=$this->Form->input('catmtitle',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Title'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Meta Keywords</label>
      <?=$this->Form->input('catmkeywords',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Kaywords'));?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Meta Description</label>
      <?=$this->Form->input('catmdesc',array('type'=>'textarea','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Meta Decription'));?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Canonnical Url</label>
      <?=$this->Form->input('catcanonical',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Canonnical Url'));?>
    </div>
    
    <!--<div class="form-group">
    <label for="exampleInputEmail1">Page Content</label>
    <?php //echo $this->Form->input('page_content',array('type'=>'textarea', 'id'=>'editor1', 'name'=>'editor1', 'rows'=>'10', 'cols'=>'80', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Content'));?>
    </div>-->
    
    <div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <?=$this->Form->input('status',array('type'=>'select', 'options'=>array(0=>'Active', 1=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
  

	<!--<div class="form-group">
      <label for="exampleInputEmail1">Is Main</label>
      <?php //echo $this->Form->input('is_main',array('type'=>'select', 'options'=>array(0=>'Yes', 1=>'No'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>-->
	
  </div><!-- /.box-body -->
  <div class="input_box">
    <?=$this->Form->button('Saved',array('class'=>'login_button'))?>
  </div>
  <?=$this->Form->end()?>