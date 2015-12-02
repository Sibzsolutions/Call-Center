<?php ?>

<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery-1.11.1.min.js';?>"></script>

<!-- start menu -->
<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/megamenu.js';?>"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- end menu -->

<form id="submit_target" action="" method="post">
<h3>Choose Address Option</h3>
<?php
	
	foreach($userdata['Addresses'] as $user_address)
	{
		$user_address = $user_address['User_address'];
		
		?>
		
		<input type="checkbox" class="user_address_id" id="user_address_id_<?php echo $user_address['id'] ?>" name="user_address_id_<?php echo $user_address['id'] ?>" value="<?php echo $user_address['id'] ?>"/>
		
		<script>
		
		$(document).ready(function(){
			
			$('#submit_data').click(function(){
				
				var address_data = 0;	
				var user_payment_id = 0;
				var user_shipping_id = 0;									
				var user_comment = 0;									
				
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
					$("#addr_div").html('Please select the address.');								    
					
					$("#submit_target").submit(function(e){
						return false;
					});					
				}					
				else if(user_payment_id == 0)
				{
					$("#addr_div").html('Please select the payment option.');								    
					
					$("#submit_target").submit(function(e){
						return false;
					});					
				}					
				else if(user_shipping_id == 0)
				{
					$("#addr_div").html('Please select the shipping type.');								    
					
					$("#submit_target").submit(function(e){
						return false;
					});					
				}	
				else if(user_comment == 0)
				{
					$("#addr_div").html('Please enter the comment.');								    
					
					$("#submit_target").submit(function(e){
						return false;
					});					
				}	
				else
				{
					alert("submit_shashikant");
					$("#submit_target").submit(function(e){
						
					});		
				}
			});								
		});								

		</script>
		
		<?php
		
		echo "<br>Addr1:- ".$user_address['addr1'];
		echo "<br>Addr2:- ".$user_address['addr2'];
		echo "<br>User City:- ".$user_address['usrcity'];
		echo "<br>User State:- ".$user_address['usrstate'];
		echo "<br>User Country:- ".$user_address['usrcountry'];
		echo "<br>User Zip:- ".$user_address['usrzip'];
		echo "<br>User Phones:- ".$user_address['usrphones'];
		echo "<br>Is main:- ".$user_address['ismain'];
		echo "<br>Status:- ".$user_address['del_status'];
		
		echo "<br><br><br>";		
	}
	
	?>
	<div id="aaddr_div"> 
	</div> 

	<div id="addr_div"> 
	</div> 
	
	<br>
	<h3>Choose Payment Option</h3>
	<?php echo $payment_master['Payment_master']['name'] ?>
	<input type="checkbox" id="user_payment_id" name="user_payment_id" value="<?php echo $payment_master['Payment_master']['id'] ?>"/>	
	
	<br>
	
	<h3>Choose Shipping Option</h3>
	<?php echo $shipping_master['Shipping_master']['name'] ?>
	<input type="checkbox" id="user_shipping_id" name="user_shipping_id" value="<?php echo $shipping_master['Shipping_master']['id'] ?>"/>
	
	<br>
	<textarea style="width:200px;height:" id="user_comment" name="user_comment"></textarea>
	<!--<input type="textarea" id="user_comment" name="user_comment"/>-->
	
	<br>
	<br>
	
	<button id="submit_data">submit</button>
	
	<!--<input type="submit" id="submit_data">-->
</form>