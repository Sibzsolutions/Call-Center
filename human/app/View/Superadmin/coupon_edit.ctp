<?php ?>
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery-1.11.1.min.js';?>"></script>
  <?=$this->Form->create('Coupon_master', array("role"=>"form"));?>
  <div class="box-body form_box">
  
    <?=$this->Form->input('id',array('type'=>'hidden','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Id', 'value'=>$coupon_data['id']));?>
	
	<div class="form-group">
      <label for="exampleInputEmail1">Coupon Name</label>
      <?=$this->Form->input('name',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter First Name', 'value'=>$coupon_data['name']));?>
    </div>
	
	<div class="form-group">
      <label for="exampleInputEmail1">Coupon Number</label>
      <?php echo $this->Form->input('coupon_number',array('type'=>'text', 'disabled',  'class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Coupon Number', 'value'=>$coupon_data['coupon_number']));?>
    </div>
    
	<div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <?=$this->Form->input('del_status',array('type'=>'select', 'options'=>array(0=>'Active', 1=>'Deactive'), 'class'=>'form-control', 'default'=>$coupon_data['del_status'], 'required'=>'required','label'=>'','div'=>false));?>
    </div>
	
	<!--<div class="form-group">
      <label for="exampleInputEmail1">Discount Percentage</label>
      <?php //echo $this->Form->input('discount_prcnt',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Last Name', 'value'=>$coupon_data['discount_prcnt']));?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Discount Price</label>
      <?php //echo $this->Form->input('discount_price',array('type'=>'text','class'=>'form-control','required'=>'required','label'=>'','div'=>false,  'placeholder'=>'Enter Email', 'value'=>$coupon_data['discount_price']));?>
    </div>-->
	
	
	<div class="form-group">
      <label for="exampleInputEmail1">Discount Type</label>	  
	  
	  <?php
		
		if($coupon_data['discount_prcnt'] !='')
		{
			?>
			<script>
					
			$(document).ready(function(){
			
				$('#price').hide();
				$('#prcnt').show();
			
			});
			</script>
			
			<?=$this->Form->input('percnt',array('type'=>'checkbox', 'label'=>'Percent','div'=>false, 'placeholder'=>'Discount in Percent', 'id'=>'discount_prcnt', 'checked'=>'checked'));?>      
			<?=$this->Form->input('price',array('type'=>'checkbox', 'label'=>'Price','div'=>false, 'placeholder'=>'Discount in Price', 'id'=>'discount_price'));?>	  
			<?php
		}
		else
		{
			?>
			<script>
					
			$(document).ready(function(){
			
				$('#price').show();
				$('#prcnt').hide();
			
			});
			</script>
			<?=$this->Form->input('percnt',array('type'=>'checkbox', 'label'=>'Percent','div'=>false, 'placeholder'=>'Discount in Percent', 'id'=>'discount_prcnt'));?>      
			<?=$this->Form->input('price',array('type'=>'checkbox', 'label'=>'Price','div'=>false, 'placeholder'=>'Discount in Price', 'id'=>'discount_price', 'checked'=>'checked'));?>	  
			<?php
		}
	  
	  ?>
	  
	  
	  
	  
	  
    </div>
	
	<div id="prcnt">
	<div class="form-group">      
	  <label for="exampleInputEmail1">Discount Percent</label>
      <?=$this->Form->input('discount_prcnt',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter discount Percent', 'value'=>$coupon_data['discount_prcnt']));?>
    </div>
	</div>
	
	<div id="price">
	<div class="form-group">
      <label for="exampleInputEmail1">Discount Price</label>
      <?=$this->Form->input('discount_price',array('type'=>'text','class'=>'form-control','label'=>'','div'=>false,  'placeholder'=>'Enter Discount Price', 'value'=>$coupon_data['discount_price']));?>
    </div>
	</div>
	
	
    
  </div><!-- /.box-body -->

  <div class="input_box">
    <?=$this->Form->button('Saved',array('class'=>'login_button'))?>
  </div>
  <?=$this->Form->end()?>
            
			
	<script>
					
		$(document).ready(function(){
			
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
			