<?php 

	App::import('Controller', 'Admins');
	$Admin = new AdminController;
	//$department_id = 4 ; // put here department ID as per your need
?>
  <?=$this->Form->create('Offer_master', array('role'=>'form', 'enctype'=>'multipart/form-data'));?>
  <div class="box-body">
    
    <div class="form-group">
      <label for="exampleInputEmail1">Offer Name</label>
      <?=$this->Form->input('offername',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Offer Name'));?>
    </div>
    
    <div class="form-group">
    <label>Offer Categories</label>
    <select multiple="multiple" name="data[Offer_master][catid][]" class="form-control select2" style="width: 100%;">
    <option value="0">All</option>
	<?php
    
    $Admin -> category_tree(0);	
    echo '</select>';
    //$this->Form->input('catname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name'));		
    ?>
    </div>
    
    <div class="form-group">
    <label>Offer Products</label>
    <select multiple="multiple" name="data[Offer_master][productid][]" class="form-control select2" style="width: 100%;">
    <option value="0">All</option>
	<?php
    
    $Admin -> product_tree(0);	
    echo '</select>';
    //$this->Form->input('catname',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name'));		
    ?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Offer Description</label>
      <?=$this->Form->input('offerdesc',array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Offer Description'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Discount</label><!-- 'class'=>'form-control', -->
      <?=$this->Form->input('discount',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Offer Discount'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Free Shipping</label>
            <?=$this->Form->input('free_shipping',array('type'=>'select', 'options'=>array(1=>'Yes', 0=>'No'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>

    </div>
 
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script>
	  $(document).ready(
	
		  function () {
	
				$( "#datepicker_first" ).datepicker({
				  changeMonth: true,//this option for allowing user to select month
				  changeYear: true //this option for allowing user to select from year range
				});
				
				$( "#datepicker_second" ).datepicker({
				  changeMonth: true,//this option for allowing user to select month
				  changeYear: true //this option for allowing user to select from year range
				});
			  }
		);
  </script>  
    
    <div class="form-group">
      <label for="exampleInputEmail1">Offer Start Date</label>
      <?=$this->Form->input('start_date',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Offer Start date','id'=>'datepicker_first'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Offer End Date</label>
      <?=$this->Form->input('end_date',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Offer End Date','id'=>'datepicker_second'));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(0=>'Active', 1=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
  </div><!-- /.box-body -->
  <div class="box-footer">
    <?=$this->Form->button('Saved',array('class'=>'btn btn-primary'))?>
  </div>
  <?=$this->Form->end()?>