<?php ?>

<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery-1.11.1.min.js';?>"></script>

<!-- start menu -->
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/megamenu.js';?>"></script>

<script>
		
	$(document).ready(function(){
		
		var addr_add = '<?php echo count($userdata['Addresses']); ?>';
		
		if(addr_add<=0)
		{
			$('#submit_data').hide();
			
			$('#addr_div').html("Please add the new address");
		}
		
		$('#credit_card_data').hide();
		
		$('.register-top-grid').hide();
		
		$('#user_payment_id').click(function()
		{
			$('#credit_card_data').show();
		});
		
		$('#add_new_addr').click(function(){
			
			$('.register-top-grid').show();				
			
			$('#add_new_addr').hide();							
		});				
		
		$('#submit_addr_data').click(function(){
			
			var validate = 0;
			
			var addr1 = $('.addr1').val();
			var addr2 = $('.addr2').val();
			var usrcity = $('.usrcity').val();
			var usrstate = $('.usrstate').val();
			var usrcountry = $('.usrcountry').val();
			var usrzip = $('.usrzip').val();
			var usrphones = $('.usrphones').val();
			var ismain = $('.ismain').val();
			
			if(addr1 == '')
			{
				var validate =1;
				$('.msg_addr1').html("Please enter the first address");
			}
				
			if(addr2 == '')
			{
				var validate =1;
				$('.msg_addr2').html("Please enter the second address");
			}
				
			if(usrcity == '')
			{
				var validate =1;
				$('.msg_city').html("Please enter the city");
			}
				
			if(usrstate == '')
			{
				var validate =1;
				$('.msg_state').html("Please enter the state");
			}
		
			if(usrcountry == '')
			{
				var validate =1;
				$('.msg_country').html("Please enter the country");
			}
				
			if(usrzip == '')
			{
				var validate =1;
				$('.msg_zip').html("Please enter the zip code");
			}
				
			if(usrphones == '')
			{
				var validate =1;
				$('.msg_phones').html("Please enter the phone number");
			}
			
			if(ismain == '')
			{
				var validate = 1;
				$('.msg_ismain').html("Is this main address");
			}
			
			if(validate == 0)	
			{
				$.post("<?=$this->webroot?>buyshops/add_new_addr", {addr1: addr1, addr2: addr2, usrcity: usrcity, usrstate: usrstate, usrcountry: usrcountry, usrzip: usrzip, usrphones: usrphones, ismain: ismain}, function(result){
						
					if(result == 'yes')
						 location.reload();
					else
						$('.msg_new_addr').html("Sorry, Something went wrong...!!!");
				});
			}
		});
	});

</script>


<!-- end menu -->

<div style="float:left; width:100%" class="placeorder_box">
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<div class="width1220">

<button class="add_new_addr add_cart_btm" id="add_new_addr" style="margin:10px 0 0 0">Add New Address</button>

<form id="submit_target" action="" method="post">

<h1>Choose Address Option</h1>

<div class="width100">
<?php
	
	$i=0;
	foreach($userdata['Addresses'] as $user_address)
	{
		echo '<div class="address_box">';
		$user_address = $user_address['User_address'];
		
		?>
		
        <label style="width:100%">
		<input type="checkbox" class="user_address_id" id="user_address_id_<?php echo $user_address['id'] ?>" name="user_address_id_<?php echo $user_address['id'] ?>" value="<?php echo $user_address['id'] ?>"/>
		
		<script>
		
		$(document).ready(function()
		{
			var a = '<?php echo count($user_address['User_address']); ?>';
			
			alert(a);
			
			$('#user_address_id_<?php echo $user_address['id'] ?>').click(function(){
					
				$( ".user_address_id" ).prop( "checked", false );
											
				$(this).prop( "checked", true );												
			});
			
			$('#submit_data').click(function()
			{
				var address_data = 0;	
				var user_payment_id = 0;
				var user_shipping_id = 0;									
				var user_comment = 0;									
				
				var validate_one = 0;
				
				var amount = $('#amount').val();
				var exp_year = $('#exp_year').val();
				var exp_month = $('#exp_month').val();
				var credit_card_type = $('#credit_card_type').val();
				var credit_card_number = $('#credit_card_number').val();
				var cvv = $('#cvv').val();
				
				var val_check = $('.user_address_id:checked').map(function() {
						address_data = 1;						
				}).get();
				
				/*
				if($('#user_address_id_<?php echo $user_address['id'] ?>').is(":checked"))
					var address_data = 1;					
				else				
					var address_data = 0;					
				*/
				
				if($('#user_payment_id').is(":checked"))
					user_payment_id = 1;					
				
				if($('#user_shipping_id').is(":checked"))
					user_shipping_id = 1;					
				
				var user_comment = $('#user_comment').val();
				
				if(user_comment ==='')
					user_comment = 0;										
				else				
					user_comment = 1;					
				
				if(address_data == 0)
				{
					user_comment = 1;					

					$("#addr_div").html('Please select the address.');								    
					
					return false;					
				}					
				else if(user_payment_id == 0)
				{
					$("#addr_div").html('Please select the payment option.');								    
					
					return false;					
				}					
				else if(user_shipping_id == 0)
				{
					$("#addr_div").html('Please select the shipping type.');								    
					
					return false;
				}	
				else if(user_comment == 0)
				{
					$("#addr_div").html('Please enter the comment.');								    
					
					return false;
				}
				else if(amount == '')
				{
					alert("amount" +amount);
					$('.msg_amount').html("Please enter the first amount");
					return false;
				}
				else if(credit_card_type == '')
				{
					alert("credit_card_type" +credit_card_type);
					$('.msg_credit_card_type').html("Please enter the credit card type");
					return false;
				}
				else if(credit_card_number == '')
				{
					alert("credit_card_number"+credit_card_number);
					$('.msg_credit_card_number').html("Please enter the credit card number");
					return false;
				}
				else if(exp_month == '')
				{
					alert("exp_month" +exp_month);
					$('.msg_exp_month').html("Please enter the expiration month");
					return false;
				}
				else if(exp_year == '')
				{
					alert("exp_year"+exp_year);
					$('.msg_exp_year').html("Please enter the expiration year");
					return false;
				}
				else if(cvv == '')
				{
					alert("cvv"+cvv);
					$('.msg_cvv').html("Please enter the cvv number");
					return false;
				}
				else
				{				
					$("#submit_target").submit();
				}
			});								
		});								

		</script>
		
		<?php
		echo '<div class="address_option">';
		echo "Addr1:- ".$user_address['addr1'];
		echo "<br>Addr2:- ".$user_address['addr2'];
		echo "<br>User City:- ".$user_address['usrcity'];
		echo "<br>User State:- ".$user_address['usrstate'];
		echo "<br>User Country:- ".$user_address['usrcountry'];
		echo "<br>User Zip:- ".$user_address['usrzip'];
		echo "<br>User Phones:- ".$user_address['usrphones'];
		echo "<br>Is main:- ".$user_address['ismain'];
		echo "<br>Status:- ".$user_address['del_status'];
		echo '</div>';
		echo '</div>';
			
		}	
		?>
        </label>
</div>        

	<div id="aaddr_div"> 
	</div> 

	 
	
	<div class="width100">
	<h3>Choose Payment Option</h3>
    <div class="width100">
	  <label class="add_cart_btm">
	    <span style="float: left; font-size: 15px; text-transform: uppercase;"><?php echo $payment_master['Payment_master']['name'] ?></span>
	    <input type="checkbox" id="user_payment_id" name="user_payment_id" style="float: left; margin: 0px 0px 0px 10px;" value="<?php echo $payment_master['Payment_master']['id'] ?>"/>	
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
 <div class="payment_option_inner input_box">
 <span>Amount:- </span>
 <input type="text" id="amount" name="example_payment_amuont" value="<?php echo $amount_price; ?>"/>
 
<?php 
	
	if(!(empty($coupon_info)))
	{
		?>
		<input type="text" id="coupon_info" name="coupon_info" value="<?php echo $coupon_info; ?>"/>
		<?php
	}
	
?>

<!-- Amount:- <input type="text" id="amount" name="example_payment_amuont" value="1"  /> -->							
 <div class="msg_type" id="msg_new_addr"></div>	
</div>

<div class="payment_option_inner input_box">	
 <span>Credit Card:- </span>
 <select name="customer_credit_card_type" id="credit_cart_type">
	<option value="visa">Visa</option>
	<option value="master_card">Master Card</option>
	<option value="discocer">Discover</option>
	<option value="visa">Visa</option>
 </select>
 <div class="msg_credit_card_type" id="msg_new_addr"></div>	
 </div>
 
 <div class="payment_option_inner input_box">
 <span>Credit Card Number:- </span>
 <input type="text" name="customer_credit_card_number" required="required" id="credit_card_number"  value="4111111111111111"/>
 <div class="msg_credit_card_number" id="msg_new_addr"></div>	
 </div>
 
 <div class="payment_option_inner input_box"> 
 <span>Exp Date:-  </span>
	<select name="cc_expiration_month" style="width: 95px;" id="exp_month">
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
	<div class="msg_exp_month" id="msg_new_addr"></div>	
	
	<select name="cc_expiration_year" style="width: 95px; margin-left: 10px;" id="exp_year">
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
	<div class="msg_exp_year" id="msg_new_addr"></div>	
 
 </div>
 
 <div class="payment_option_inner input_box">
 <span> CVV:- </span>
 <input type="text" name="cc_cvv2_number" value="123"  required="required" id="cvv"/>
 <div class="msg_cvv" id="msg_new_addr"></div>	
 </div>
</div>
	</div>
	<br>
    <div class="width100">
	<h3>Choose Shipping Option</h3>
	<div class="width100">
      <div class="input_box">
      <?php echo $shipping_master['Shipping_master']['name'] ?>
      <input type="checkbox" id="user_shipping_id" name="user_shipping_id" value="<?php echo $shipping_master['Shipping_master']['id'] ?>"/>
      </div>
    </div>
	<br>
	
    <div class="width100">
      <div class="input_box2">
	<span style="float:left;">Comment </span><br />
    <textarea style="height:100px" id="user_comment" name="user_comment">Please Enter the comment here..</textarea>
    </div>
    </div>
	<!--<input type="textarea" id="user_comment" name="user_comment"/>-->
	
	</div>
    <div id="addr_div"> 
	</div>
	<button id="submit_data" class="button" style="margin:10px 0px;">submit</button>
    <br />
	
	<!--<input type="submit" id="submit_data">-->
	
</form>

<div class="register-top-grid" style="clear:both">

 <div>
	<span>First Address<label>*</label></span>
	<?=$this->Form->input('addr1',array('type'=>'textarea', 'style'=>'width:500px', 'class'=>'addr1 form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the First Address'));?>
	
	<div class="msg_addr1" id="msg_new_addr">
	</div>	
 </div>
 <div>
	<span>Second Address<label>*</label></span>
	<?=$this->Form->input('addr2',array('type'=>'textarea', 'style'=>'width:500px', 'class'=>'addr2 form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the First Address'));?>
	
	<div class="msg_addr2" id="msg_new_addr">
	</div>	
 </div>
 <div>
	<span>City<label>*</label></span>
	<?=$this->Form->input('usrcity',array('type'=>'text','class'=>'usrcity form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the City'));?>
 	
	<div class="msg_city" id="msg_new_addr">
	</div>	
 </div>
 <div>
 	<span>State<label>*</label></span>
	<?=$this->Form->input('usrstate',array('type'=>'text','class'=>'usrstate form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the State'));?>
 	
 	<div class="msg_state" id="msg_new_addr">
 	</div>	
 </div>
 <div>
 	<span>Country<label>*</label></span>
 	<?=$this->Form->input('usrcountry',array('type'=>'text','class'=>'usrcountry form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Country'));?>
 	
 	<div class="msg_country" id="msg_new_addr">
 	</div>	
 </div>			
 <div>
	<span>Zip Code<label>*</label></span>
	<?=$this->Form->input('usrzip',array('type'=>'text','class'=>'usrzip form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Zip Code'));?>
	
	<div class="msg_zip" id="msg_new_addr">
	</div>	
 </div>			
 <div>
	 <span>Phone Number<label>*</label></span>
	 <?=$this->Form->input('usrphones',array('type'=>'number', 'style'=>'width:560px','class'=>'usrphones form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Enter the Phone Number'));?>
	 
	 <div class="msg_phones" id="msg_new_addr">
	</div>	
 </div>
 <div>
	 <span>Is Main<label>*</label></span>
	 <?=$this->Form->input('ismain',array('type'=>'select', 'style'=>'width:560px','options'=>array(1=>'Yes', 0=>'No'), 'class'=>'ismain form-control','required'=>'required','label'=>'','div'=>false,'Placeholder'=>'Select the Is Main'));?>
	 
	 <div class="msg_ismain" id="msg_new_addr">
	</div>	
 </div>					 

 <div class="msg_new_addr" id="msg_new_addr">
 </div>	
 <div>
	 <button id="submit_addr_data" class="button" style="margin:0px;">submit</button>
 </div>
 <div class="clearfix"> </div>
   <!--<a class="news-letter" href="#">
	 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
   </a>-->
 </div>
 
 <!--<button class="add_new_addr" id="add_new_addr">Add New Address</button>-->
</div>
</div>