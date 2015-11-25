<?php ?>
<form>
<?php
	
	foreach($userdata['Addresses'] as $user_address)
	{
		$user_address = $user_address['User_address'];
		
		?>
		
		<input type="checkbox" name="user_address_id" value="<?php echo $user_address['id'] ?>"/>
		
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
	
	<input type="submit">
	
</form>