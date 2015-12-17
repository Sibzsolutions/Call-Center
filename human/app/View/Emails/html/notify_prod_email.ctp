<?php
	
	echo "<br>This Product is now available. <br><br> You can directly purchase this product with following link";
	
	?>
	
	<a href="<?php echo $this->webroot.'buyshops/product_details/'.$email_unavailable_product['product']['id']; ?>"><?php echo $email_unavailable_product['product']['prodname']; ?></a>
	
	<?php
	
	echo "<br><h4>Product Details</h4>:-";
	
	echo "<br>".$email_unavailable_product['product']['prodname'];
	echo "<br>".$email_unavailable_product['product']['prodscdes'];	
	echo "<br>".$email_unavailable_product['product']['proddesc'];
	
	echo "<br>".$email_unavailable_product['attribute_master']['attname'];
	echo "<br>".$email_unavailable_product['attribute_value']['attvalue'];	
	
?>

