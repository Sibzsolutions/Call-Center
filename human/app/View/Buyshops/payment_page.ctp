<script type="text/javascript" src="<?php echo $this->webroot.'js/buy_shop/jquery-1.11.1.min.js';?>"></script>
<?php
	$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; 
	$paypal_id='shashikant.chobhe-seller@sibzsolutions.com';  // sriniv_1293527277_biz@inbox.com
?>
<form action='<?php echo $paypal_url; ?>' method='post' name='frmPayPal1' id='frmPayPal1'>
							
<input type='text' name='business' value='<?php echo $paypal_id;?>'>
<input type='text' name='cmd' value='_xclick'>

<?php
	
	foreach($product_data as $data)
	{
		?>
		<input type='text' name='item_name' value='<?php echo $data['Produc_master']['prodname']; ?>'>
		<input type='text' name='item_number' value='<?php echo $data['Produc_master']['id']; ?>'>
		
		<?php
	}

?>
<input type='text' name='amount' value='1'>

<?php //echo $price_data; ?>

<input type='text' name='no_shipping' value='1'>
<input type='text' name='currency_code' value='USD'>
<input type='text' name='handling' value='0'>
<input type='text' name='cancel_return' value='http://localhost/pay/paypal/cancel.php'>
<input type='text' name='return' value='<?php echo ' http://localhost'.$this->webroot.'buyshops/success_payment'; ?>'>	<!-- http://localhost/pay/paypal/success.php -->

<input style="font-size:15px"  type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">

</form> 

<script>

	$(document).ready(function(){
		
		alert("shashikant");
		
		$(window).load(function () {
		
			alert("shashikant_load");
			
			$('#frmPayPal1').submit(); 		
		});
	});

</script>