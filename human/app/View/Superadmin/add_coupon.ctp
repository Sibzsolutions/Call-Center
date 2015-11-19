<?php ?>
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery-1.11.1.min.js';?>"></script>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="<?php echo $this->webroot.'css/buy_shop/style.css';?>" rel='stylesheet' type='text/css' />
<script src="<?php echo $this->webroot.'js/buy_shop/simpleCart.min.js';?>"> </script>
<!-- Custom Theme files -->
<!--webfont-->

<script type="text/javascript" src="js/jquery-1.11.1.min.js';?>"></script>
<!-- start menu -->



<link rel="stylesheet" href="<?php echo $this->webroot.'css/buy_shop/etalage.css';?>">

  <?=$this->Form->create('Coupon_master', array("role"=>"form"));?>
  <div class="box-body form_box">
    <div class="form-group">
	
	
	
    <label for="exampleInputEmail1">Coupon Name</label>
      <?=$this->Form->input('name',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter First Name'));?>
    </div>
    
	<div class="form-group">
      <label for="exampleInputEmail1">Coupon Number</label>
      <?=$this->Form->input('coupon_number',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Name'));?>
    </div>
    
	<div class="form-group">
      <label for="exampleInputEmail1">Discount Type</label>	  
	  <?=$this->Form->input('percnt',array('type'=>'checkbox', 'label'=>'Percent','div'=>false, 'placeholder'=>'Discount in Percent', 'id'=>'discount_prcnt', 'checked'=>'checked'));?>      
	  <?=$this->Form->input('price',array('type'=>'checkbox', 'label'=>'Price','div'=>false, 'placeholder'=>'Discount in Price', 'id'=>'discount_price'));?>	  
    </div>
	
	<div id="prcnt">
	<div class="form-group">      
	  <label for="exampleInputEmail1">Discount Percent</label>
      <?=$this->Form->input('discount_prcnt',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter discount Percent'));?>
    </div>
	</div>
	
	<div id="price">
	<div class="form-group">
      <label for="exampleInputEmail1">Discount Price</label>
      <?=$this->Form->input('discount_price',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Discount Price'));?>
    </div>
	</div>
	
    <div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(0=>'Active', 1=>'Deactive'), 'class'=>'form-control','required'=>'required','label'=>'','div'=>false));?>
    </div>
    
  </div><!-- /.box-body -->

  <div class="input_box">
    <?=$this->Form->button('Saved',array('class'=>'login_button'))?>
  </div>
  <?=$this->Form->end()?>
            
	
<script>
					
	$(document).ready(function(){
		
		$('#price').hide();
		$('#prcnt').show();
		
		$('#discount_price').click(function(){
			
			if($(this).is(":checked"))
			{
				$( "#discount_prcnt" ).prop( "checked", false );
				
				$('#price').show();
				$('#prcnt').hide();
			}
			else
			{	
				$( "#discount_prcnt" ).prop( "checked", true );
				
				$('#price').hide();
				//$('#prcnt').hide();
				
				$('#prcnt').show();
			}			
		});
		
		$('#discount_prcnt').click(function(){
			
			if($(this).is(":checked"))
			{
				$( "#discount_price" ).prop( "checked", false );
				
				var valid_prcnt = 1;
				
				$('#prcnt').show();
				$('#price').hide();				
			}
			else
			{
				$( "#discount_price" ).prop( "checked", true );
				
				var valid_prcnt = 0;
				
				$('#prcnt').hide();
				//$('#price').hide();				
				
				$('#price').show();
			}
		});		
	});

</script>