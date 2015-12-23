<style type="text/css">
#loading_img{
    background-color: rgba(0, 0, 0, 0.5);
    display: block;
    height: 100%;
    margin: 0;
    padding: 0;
    position: fixed;
    text-align: center;
    top: 0;
    width: 100%;
    z-index: 500;
}
</style>
<div id="loading_img"><div style="color:#ffffff; margin:320px 0 0 0; font-size:14px;">Loading <br /><br /><img src="<?php echo $this->webroot.'img/only_human_userside/loading.gif';?>" /></div></div>
<?php ?>



<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery-1.11.1.min.js';?>"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
	
	$(document).ready(function(){
		
		$('#loading_img').hide();
	
		$('#submit_data').click(function(){
		
			  $('#loading_img').show();			  
		});
	});
	
</script>

<script>
	
	$(document).ready(function(){
		
		$('#user_shipping_id').click(function(){
				
			if($(this).is(":checked"))
			{
			}
			else
				return false;
		});
		
		$('#user_payment_id').click(function(){
				
			if($(this).is(":checked"))
			{
			}
			else
			{
				return false;
			}
		});
		
	});
</script>
<?php
	
	/*
	echo "User Address<pre>";
	print_r($userdata);
	echo "<pre>";
	*/
	
	$address = $userdata['Addresses'];

?>
<div class="placeorder_box width1220">

<div class="width100" style="padding:20px 0px;">
<div>

<?=$this->Form->create('User_address');?>
	<div class="list_box">
	<span>First Address<label>*</label></span>
	<?=$this->Form->input('addr1',array('type'=>'textarea', 'value'=>$address['User_address']['addr1'], 'class'=>'addr1 form-control','label'=>'','div'=>false,'Placeholder'=>'Enter the First Address'));?>
	</div>	
	

	<div class="list_box">
	<span>Second Address<label>*</label></span>
	<?=$this->Form->input('addr2',array('type'=>'textarea', 'value'=>$address['User_address']['addr2'],'class'=>'addr2 form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the First Address'));?>
	</div>	

	<div class="list_box">
	<span>City<label>*</label></span>
	<?=$this->Form->input('usrcity',array('type'=>'text', 'class'=>'usrcity form-control', 'value'=>$address['User_address']['usrcity'], 'required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the City'));?>
 	</div>	

	<div class="list_box">
 	<span>State<label>*</label></span>
	<?=$this->Form->input('usrstate',array('type'=>'text', 'class'=>'usrstate form-control','required'=>'required', 'value'=>$address['User_address']['usrstate'], 'label'=>'','div'=>false,'Placeholder'=>'Enter the State'));?>
 	</div>	

	<div class="list_box">
 	<span>Country<label>*</label></span>
 	<?=$this->Form->input('usrcountry',array('type'=>'text', 'class'=>'usrcountry form-control', 'value'=>$address['User_address']['usrcountry'], 'required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Country'));?>
 	</div>	

	<div class="list_box">
	<span>Zip Code<label>*</label></span>
	<?=$this->Form->input('usrzip',array('type'=>'text','class'=>'usrzip form-control', 'value'=>$address['User_address']['usrzip'], 'required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Zip Code'));?>
	</div>	

	<div class="list_box">
	<span>Phone Number<label>*</label></span>
	<?=$this->Form->input('usrphones',array('type'=>'text','class'=>'usrphones form-control', 'value'=>$address['User_address']['usrphones'], 'required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Phone Number'));?>
	</div>	
 
 	<div class="list_box choose_option" style="clear:both">
	<h3>Choose Payment Option</h3>
    <div class="width100">
	  <label class="add_cart_btm">
	    <span style="float: left; color:#fff; font-size: 15px; text-transform: uppercase;"><?php echo $payment_master['Payment_master']['name'] ?></span>
	    <input type="checkbox"  checked id="user_payment_id" name="user_payment_id" style="float: left; margin: 0px 0px 0px 10px;" value="<?php echo $payment_master['Payment_master']['id'] ?>"/>	
      </label>
	</div>
	<div id="credit_card_data" class="payment_option_box">
 
 <?php
 
 if($this->Session->check('original_price')==1)
	$amount_price = $this->Session->read('original_price');			

 if($this->Session->check('discounted_price')==1)
	$amount_price = $this->Session->read('discounted_price');			

 if($this->Session->check('coupon_discounted_price')==1)
	$amount_price = $this->Session->read('coupon_discounted_price');			

 if($this->Session->check('quantity_data')==1)
	$quantity_data = $this->Session->read('quantity_data');			

if(!empty($original_price))
	$amount_price = $original_price;

if(!empty($discounted_price))
	$amount_price = $discounted_price;
	
 if(!empty($quantity_data))
	$amount_price = ($quantity_data * $amount_price);

 ?>
 
 <div class="list_box">
 <span>Amount<label>*</label></span>
 <input type="text" class="form-control" readonly id="amount" name="example_payment_amuont" value="<?php echo $amount_price; ?>"/>
 
 <?php 
	
	if(!(empty($coupon_info)))
	{
		?>
		<input type="text" id="coupon_info" class="form-control" name="coupon_info" value="<?php echo $coupon_info; ?>"/>
		<?php
	}
	
 ?>

<!-- Amount:- <input type="text" id="amount" name="example_payment_amuont" value="1"  /> -->							

</div>

<div class="list_box">	
 <span>Credit Card Type<label>*</label></span>
 <select name="customer_credit_card_type" class="form-control" id="credit_cart_type">
	<option value="visa">Visa</option>
	<option value="master_card">Master Card</option>
	<option value="discocer">Discover</option>
	<option value="visa">Visa</option>
 </select>
 </div>
 
 <!--<div class="payment_option_inner input_box">
 <span>Credit Card Number:- </span>
 <input type="text" name="customer_credit_card_number" required="required" id="credit_card_number"  value="4111111111111111"/>
 </div>-->
 
 	<div class="list_box">
	<span>Credit Card Number<label>*</label></span>
	<?=$this->Form->input('customer_credit_card_number',array('type'=>'text', 'value'=>'4111111111111111', 'class'=>'form-control','label'=>'','div'=>false,'Placeholder'=>'Enter the credit card number'));?>
	</div>	

 
 
 <div class="list_box"> 
 <span>Exp Date<label>*</label><label>&nbsp;</label> </span>
	<select name="cc_expiration_month" class="form-control" style="width: 95px; margin-right:10px; float:left" id="exp_month">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	</select>
	<select name="cc_expiration_year" class="form-control" style="width: 95px; margin-left: 10px;" id="exp_year">
		<option value="2012">2012</option>
		<option value="2013">2013</option>
		<option value="2014">2014</option>
		<option value="2015">2015</option>
		<option value="2016">2016</option>
		<option value="2017">2017</option>
		<option value="2018">2018</option>
		<option value="2019">2019</option>
		<option selected="selected" value="2020">2020</option>
	</select>
	
 </div>
 
 <div class="list_box">
 <span> CVV<label>*</label></span>
	
 
 <input type="text" class="form-control" name="cc_cvv2_number" value="123"  required="required" id="cvv"/>

 </div>
</div>
	</div>
 
    <div class="list_box">
	<h3>Choose Shipping Option</h3>
	<div class="width100">
        <label class="add_cart_btm">
          <span style="float: left; color:#fff; font-size: 15px; text-transform: uppercase;"><?php echo $shipping_master['Shipping_master']['name'] ?></span>
          <input type="checkbox" id="user_shipping_id" checked name="user_shipping_id" style="float: left; margin: 0px 0px 0px 10px;" value="<?php echo $shipping_master['Shipping_master']['id'] ?>"/>
        </label>
    </div>
	<br>
	<div class="payment_option_box">
    <div class="width100">
      <div class="input_box2">
	<span style="float:left;">Comment </span><br />
    <textarea style="height:100px" id="user_comment" name="user_comment">Please Enter the comment here..</textarea>
    </div>
    </div>
	
	<!--<input type="textarea" id="user_comment" name="user_comment"/>-->
	
	</div>
	
	</div>
    
    <input type="submit" id="submit_data" class="button" style="margin:10px 0px; clear:both">
    
	</form>
    <br />
</div> 
</div> 
</div>

