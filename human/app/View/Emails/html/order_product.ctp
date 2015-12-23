<?php //die(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.text14_white{
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	color:#ffffff;
	text-decoration:none;
}
.text12_black{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#000000;
	font-weight:normal;
	text-decoration:none;
}
.text18_blue{
	font-family:Arial, Helvetica, sans-serif;
	font-size:18px;
	color:#0165a1;
	font-weight:normal;
	text-decoration:none;
}
.text13_gray{
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	color:#434343;
	font-weight:normal;
	text-decoration:none;
}
</style>
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" style="border:2px solid #ececec">
  <tr>
    <td height="100" align="center" valign="middle"><img src="http://projects.sibzsolutions.net/onlyhuman/human/img/logo.jpg" width="382" height="56" alt="logo" /></td>
  </tr>
  <tr>
    <td height="31" align="center" valign="middle" bgcolor="#0866e4" class="text14_white"><strong>Dear Customer</strong></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
      
	  
	  <?php
  
		$i=0;
		foreach($email_product_data as $data)
		{
			if($i==0)
			{				
				?>
				  <tr>
					<td height="41" align="left" valign="top" class="text18_blue"><strong>Dear <?php echo "".$data['userdata']['usrfname']." ".$data['userdata']['usrlname'];  ?>,</strong>
					
					    <?php echo "<br><br>Thanx for purchasing product."; ?>
					  					  
						<?php echo "<br><br>Your product details given below."; ?>
					  
					</td>
				  </tr>
			  <?php
			}
		  ?>
      
	  <!--<tr>
        <td align="left" valign="top" class="text13_gray">
        Congratulations on booking your Roadtrip on <span style="color:#f2712d">http://test.com.</span> This email is the confirmation of your booking.
		<br />
		<br />
		Your detailed itinerary is attached.  We recommend you print it or save it to your mobile device, so you have access to it throughout your trip.  It includes the details of your hotels, the route, your vehicle and some recommendations of things to do whilst you explore.<br />
		<br />
		<span class="text18_blue"><strong>Your receipt is also attached.</strong></span>

        </td>
      </tr>-->
	  
	  <tr>
        <td align="left" valign="top">&nbsp;<?php echo "<br>Product Name:- ".$data['product_data']['prodname']; ?></td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;<?php echo "<br>Product Short Description:- ".$data['product_data']['prodscdes']; ?></td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;<?php echo "<br>Product Description:- ".$data['product_data']['proddesc']; ?></td>
      </tr>
	  <?php
		
		foreach($data['attributes'] as $attribute)
		{
			foreach($attribute as $key=>$data_att)
			{
				?>
				<tr>
				<td align="left" valign="top">&nbsp;<?php echo "<br>".$key.':- '.$data_att; ?></td>
			    </tr>	  
			  <?php
			}
		}
		
	  ?>
	  <tr>
        <td align="left" valign="top">&nbsp;<?php echo "<br>Discount:- ".$data['product_data']['discount']; ?></td>
      </tr>

	  <tr>
        <td align="left" valign="top">&nbsp;<?php echo "<br>Dicounted Price:- ".$data['product_data']['discounted_price']; ?></td>
      </tr>
      <!--<tr>
        <td align="left" valign="top">&nbsp;<?php //echo "<br>Product Price:- ".$data['product_data']['original_price']; ?></td>
      </tr>-->
	  
	  <?php
	  
	  if(!empty($data['coupon_info_data']))
	  {
		  ?>
		  <tr>
			<td align="left" valign="top">&nbsp;<?php echo "<br>Thanx using the coupon..."; ?></td>
		  </tr>
		  <tr>
			<td align="left" valign="top">&nbsp;<?php echo "<br>Coupon Info :- ".$data['coupon_info_data']; ?></td>
		  </tr>
		  <?php
	  }
	  
	  if(!empty($data['final_price']))
	  {
		  ?>
		  <tr>
			<td align="left" valign="top">&nbsp;<?php echo "<br>Total Price:- ".$data['final_price']; ?></td>
		  </tr>	  
		  <?php
	  }
			
		$i++;
	}	  
	  ?>
	  
	  <tr>
		<td align="left" valign="top">&nbsp;<?php echo "<br>Your product will be deliver shortly."; ?></td>
	  </tr>
	  
	  <tr>
		<td style="color:red" align="left" valign="top">&nbsp;<?php echo "<br>Note:- Prices may br change as per the product attributes(color, size etc)."; ?></td>
	  </tr>
	  
    </table>
    </td>
  </tr>
  
  
  <tr>
   <td align="left" valign="top" class="text13_gray">
		
  </td>
  </tr>
  
  <tr>
    <td align="left" valign="top" bgcolor="#efefef" style="padding:30px 20px; font-size:12px;" class="text12_black">
      This email was sent from a notification-only address that cannot accept incoming email. Please do not reply to this 
message. 
<br />
<br />
If you need to contact us about your order, Please mail us at <span style="color:#4188df">Only Human</span> for any assistance. 
<br />
<br />
Please note that this e-mail only acknowledges that we have received a request for a quotation from you the client. Neither propertypriceindex.com nor any of its affiliates are deemed to have a binding contract with the client at this point.
    </td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#111111" class="text12_black" style="color:#ffffff; padding:10px;">&copy; 2015 onlyhumansportswear. All Rights Reserved.</td>
  </tr>
</table>
</body>
</html>


<?php
	
	/*
	echo "email_product_data<pre>";
	print_r($email_product_data);
	echo "<pre>";	
	
	$i=0;
	foreach($email_product_data as $data)
	{
		if($i==0)
		{
			echo "<br>Hello ".$data['userdata']['usrfname']." ".$data['userdata']['usrlname'];

			echo "<br>Thanx for purchasing product.";
			
			echo "<br>Your product details given below.";
		}
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
		
		$i++;
	}
	
	echo "<br>Your product will be deliver shortly.";
	
	*/
	
	die();
?>
