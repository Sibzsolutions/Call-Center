<?php
	
	/*
	echo "email_product_data<pre>";
	print_r($email_product_data);
	echo "<pre>";
	*/
	
	//die();
	
	foreach($email_product_data as $data)
	{
		echo "<br>Product Name:- ".$data['product_data']['prodname'];
		echo "<br>Product Short Description:- ".$data['product_data']['prodscdes'];
		echo "<br>Product Description:- ".$data['product_data']['proddesc'];
		echo "<br>Product Price:- ".$data['product_data']['original_price'];
		echo "<br>Dicounted Price:- ".$data['product_data']['discounted_price'];
		echo "<br>Discount:- ".$data['product_data']['discount'];
		
		foreach($data['attributes'] as $attribute)
		{
			foreach($attribute as $key=>$data_att)
				echo "<br>".$key.':- '.$data_att;
		}
		
		if(!empty($data['coupon_info_data']))
			echo "<br>Coupon Info :- ".$data['coupon_info_data'];
		
		if(!empty($data['final_price']))
			echo "<br>Total Price:- ".$data['final_price'];
		
		echo "<br><br>";
	}
	
	die();
?>

