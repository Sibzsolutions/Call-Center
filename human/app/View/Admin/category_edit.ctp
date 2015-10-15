<?php 
	App::import('Controller', 'Admins');
	$Admin = new AdminController;
	//$department_id = 4 ; // put here department ID as per your need
?>

  <?=$this->Form->create('Category', array("role"=>"form", 'enctype'=>'multipart/form-data'));?>
  <div class="box-body">
    
    <div class="form-group">
      <label for="exampleInputEmail1">Category Id</label>
      <?=$this->Form->input('id',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Id', 'value'=>$category_data['id']));?>
    </div>
    
    <div class="form-group">
    <label>Parent Category</label>
    
    <select name="data[Category][parentid]" class="form-control select2" style="width: 100%;">
    <?php
		
		$Admin -> category_tree(0, $category_data['parentid']);	
		echo '</select>';
		//$this->Form->input('catname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name'));		
		
	?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <?=$this->Form->input('catname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter First Name', 'value'=>$category_data['catname']));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Description</label>
      <?=$this->Form->input('catdesc',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Name', 'value'=>$category_data['catdesc']));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Images</label>
      <?=$this->Form->input('catimg',array('type'=>'file','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Email', 'value'=>$category_data['catimg']));
      echo $category_data['catimg'];
      ?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Url Alias</label>
      <?=$this->Form->input('url_alias',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Login', 'value'=>$category_data['url_alias']));?>
    </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Meta Title</label>
      <?=$this->Form->input('catmtitle',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Login', 'value'=>$category_data['catmtitle']));?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Meta Keywords</label>
      <?=$this->Form->input('catmkeywords',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Login', 'value'=>$category_data['catmkeywords']));?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Meta Description</label>
      <?=$this->Form->input('catmdesc',array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Login', 'value'=>$category_data['catmdesc']));?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Default Canonical Tag</label>
      <?=$this->Form->input('catcanonical',array('type'=>'text', 'class'=>'form-control','label'=>'','div'=>false));?>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(1=>'Active', 0=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
    
    <!--<div class="form-group">
      <label for="exampleInputEmail1">Google Analytics</label>
      <?php //echo $this->Form->input('',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Google Analytics Script'));?>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox"> Check me out
      </label>
    </div>-->
  </div><!-- /.box-body -->

  <div class="box-footer">
    <?=$this->Form->button('Saved',array('class'=>'btn btn-primary'))?>
  </div>
  <?=$this->Form->end()?>
