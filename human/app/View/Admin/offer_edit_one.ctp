<?php 
	App::import('Controller', 'Admins');
	$Admin = new AdminController;
	//$department_id = 4 ; // put here department ID as per your need
?>
<!-- form start -->
  <?=$this->Form->create('Produc_master', array('role'=>'form', 'enctype'=>'multipart/form-data'));?>
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
      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(1=>'Active', 0=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
  </div>
  
  <div class="box-body">
  
    <?=$this->Form->input('id',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Page Name', 'value'=>$product_data['id']));?>
    
    <div class="form-group">
    <label>Parent Category</label>
    
    <select name="data[Produc_master][catid]" class="form-control select2" style="width: 100%;">
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
      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(1=>'Active', 0=>'Inactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false, 'value'=>$product_data['del_status']));?>
    </div>
  </div><!-- /.box-body -->
  <div class="box-footer">
    <?=$this->Form->button('Saved',array('class'=>'btn btn-primary'))?>
  </div>
  <?=$this->Form->end()?>
