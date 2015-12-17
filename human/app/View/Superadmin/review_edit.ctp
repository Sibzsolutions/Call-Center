<?php 
	/*
	echo "Reviews<pre>";
	print_r($reviews);
	echo "<pre>";
	die();
	*/
	
?>	
 <?=$this->Form->create('Review_master', array("role"=>"form"));?>
  <div class="box-body form_box">
 	
	<?=$this->Form->input('id',array('type'=>'hidden','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Id', 'value'=>$reviews['Review_master']['id']));?>
	
	<?=$this->Form->input('id',array('type'=>'hidden','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Id', 'value'=>$reviews['User']['id']));?>
	
	<?=$this->Form->input('product_name',array('type'=>'hidden','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Id', 'value'=>$reviews['Produc_master']['prodname']));?>
	
	
	<div class="form-group">
      <label for="exampleInputEmail1">To</label>
      <?=$this->Form->input('to',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter First Name', 'value'=>$reviews['User']['email'], 'readonly'=>'readonly'));?>
    </div>
	
	<div class="form-group">
      <label for="exampleInputEmail1">Subject</label>
      <?=$this->Form->input('subject',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter First Name', 'value'=>'Review is disapproved'));?>
    </div>
	
	<div class="form-group" style="clear: both; width: 100%;">
    <label for="exampleInputEmail1">Page Content</label>
    <?=$this->Form->input('page_content',array('type'=>'textarea', 'id'=>'editor1', 'name'=>'editor1', 'rows'=>'10', 'cols'=>'80', 'class'=>'form-control','required'=>'required','label'=>'','div'=>false, 'value'=>'Sorry, we cant approve your review.', 'placeholder'=>'Enter Page Content'));?>
    </div>
	
	<div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <?=$this->Form->input('approval',array('type'=>'select', 'options'=>array(1=>'Approved', 0=>'Disapproved'), 'readonly'=>'readonly', 'class'=>'form-control', 'default'=>0, 'required'=>'required','label'=>'','div'=>false));?>
    </div>
	
	<div class="input_box">
    <?=$this->Form->button('Send Email',array('class'=>'login_button'))?>
  </div>
  <?=$this->Form->end()?>
	
  </div>
<?php

	//die();

?>